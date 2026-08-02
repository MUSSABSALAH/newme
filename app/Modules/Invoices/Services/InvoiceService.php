<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Invoices\DTOs\InvoiceDraft;
use App\Modules\Invoices\DTOs\InvoiceLine;
use App\Modules\Invoices\DTOs\InvoiceParty;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Notifications\InvoiceIssuedNotification;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Models\Payment;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Money\Money;
use App\Support\Money\Rounding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Throwable;

/**
 * Issues the tax invoice for a paid order or subscription.
 *
 * The charged total is the one figure taken as given: VAT and the taxable
 * amount are derived from it so the invoice can always be reconciled against
 * the payment. Store prices are treated as VAT-inclusive (the customer paid the
 * shelf price), while a subscription already carries its own tax line.
 *
 * Issuing is idempotent — a payable has at most one invoice, enforced by a
 * unique index — so retries and double confirmations are harmless.
 */
final class InvoiceService
{
    private const DEFAULT_TAX_RATE_BPS = 1500;

    public function __construct(
        private readonly SettingsService $settings,
        private readonly InvoiceNumberGenerator $numbers,
        private readonly AuditService $audit,
    ) {}

    public function find(Model $payable): ?Invoice
    {
        return Invoice::query()
            ->where('invoiceable_type', $payable::class)
            ->where('invoiceable_id', $payable->getKey())
            ->first();
    }

    /**
     * Issue the invoice for a settled payment, then email it to the customer.
     */
    public function issueFor(Order|Subscription $payable, ?Payment $payment = null): Invoice
    {
        $existing = $this->find($payable);

        if ($existing instanceof Invoice) {
            return $existing;
        }

        $invoice = $this->write($payable, $payment);

        $this->audit->log(AuditAction::InvoiceIssued, $invoice, [], [
            'number' => $invoice->number,
            'invoiceable_type' => $invoice->invoiceable_type,
            'invoiceable_id' => $invoice->invoiceable_id,
            'total_minor' => $invoice->total_minor,
            'tax_minor' => $invoice->tax_minor,
        ]);

        $this->deliver($invoice, $payable);

        return $invoice;
    }

    /**
     * Send (or resend) the invoice to the customer it belongs to.
     */
    public function deliver(Invoice $invoice, Order|Subscription $payable): void
    {
        $customer = $payable->user;

        if (! $customer instanceof User || $customer->email === '') {
            return;
        }

        try {
            $customer->notify(new InvoiceIssuedNotification($invoice));
        } catch (Throwable $e) {
            // The invoice is already on record; a mail failure must not undo a
            // confirmed payment.
            Log::error('Failed to email invoice '.$invoice->number, ['exception' => $e]);
        }
    }

    private function write(Order|Subscription $payable, ?Payment $payment): Invoice
    {
        $draft = $payable instanceof Order
            ? $this->draftFromOrder($payable)
            : $this->draftFromSubscription($payable);

        $seller = $this->seller();
        $buyer = $this->buyer($payable);
        $issuedAt = $payment?->paid_at ?? now();

        // A concurrent issue can only lose the race on the number, and only
        // once: re-reading the sequence is enough to settle it.
        foreach ([1, 2, 3] as $attempt) {
            try {
                return DB::transaction(function () use ($payable, $payment, $draft, $seller, $buyer, $issuedAt): Invoice {
                    $invoice = new Invoice;
                    $invoice->number = $this->numbers->next($issuedAt);
                    $invoice->user_id = $payable->user_id;
                    $invoice->invoiceable_type = $payable::class;
                    $invoice->invoiceable_id = (int) $payable->getKey();
                    $invoice->payment_id = $payment?->getKey();
                    $invoice->issued_at = $issuedAt;
                    $invoice->currency = $payable->currency;
                    $invoice->tax_rate_bps = $draft->taxRateBps;
                    $invoice->lines_total_minor = $draft->linesTotalMinor;
                    $invoice->discount_minor = $draft->discountMinor;
                    $invoice->net_minor = $draft->netMinor;
                    $invoice->tax_minor = $draft->taxMinor;
                    $invoice->total_minor = $draft->totalMinor;
                    $invoice->seller = $seller->toArray();
                    $invoice->buyer = $buyer->toArray();
                    $invoice->lines = array_map(
                        static fn (InvoiceLine $line): array => $line->toArray(),
                        $draft->lines,
                    );
                    $invoice->save();

                    return $invoice;
                });
            } catch (UniqueConstraintViolationException $e) {
                // Another writer got there first with this payable, not just
                // this number: hand back their invoice instead of retrying.
                $existing = $this->find($payable);

                if ($existing instanceof Invoice) {
                    return $existing;
                }

                if ($attempt === 3) {
                    throw $e;
                }
            }
        }

        throw new InvalidArgumentException('Unable to allocate an invoice number.');
    }

    /**
     * Store prices are quoted VAT-inclusive, so the tax is extracted from what
     * was charged rather than added on top.
     */
    private function draftFromOrder(Order $order): InvoiceDraft
    {
        $bps = $this->taxRateBps();
        $total = $order->total_minor;

        $tax = Rounding::divide($total * $bps, 10000 + $bps);
        $net = $total - $tax;

        $discount = $order->discount_minor === 0
            ? 0
            : Rounding::divide($order->discount_minor * 10000, 10000 + $bps);

        $linesTotal = $net + $discount;

        $items = $order->items()->orderBy('id')->get();
        $weights = $items->map(static fn ($item): int => (int) $item->line_total_minor)->all();
        $amounts = $this->allocate($linesTotal, array_values($weights));

        $lines = [];

        foreach ($items->values() as $index => $item) {
            $quantity = max(1, (int) $item->quantity);
            $lineTotal = $amounts[$index] ?? 0;

            $lines[] = new InvoiceLine(
                description: (string) $item->name,
                quantity: $quantity,
                unitPriceMinor: Rounding::divide($lineTotal, $quantity),
                lineTotalMinor: $lineTotal,
            );
        }

        return new InvoiceDraft(
            lines: $lines,
            linesTotalMinor: $linesTotal,
            discountMinor: $discount,
            netMinor: $net,
            taxMinor: $tax,
            totalMinor: $total,
            taxRateBps: $bps,
        );
    }

    /**
     * A subscription is already priced net with its VAT on a separate line, so
     * its own figures carry straight onto the invoice.
     */
    private function draftFromSubscription(Subscription $subscription): InvoiceDraft
    {
        $total = $subscription->total_minor;
        $tax = $subscription->tax_minor;
        $net = $total - $tax;
        $discount = $subscription->discount_minor + $subscription->coupon_discount_minor;
        $linesTotal = $net + $discount;

        $lines = [
            new InvoiceLine(
                description: $this->subscriptionLabel($subscription),
                quantity: 1,
                unitPriceMinor: $subscription->subtotal_minor,
                lineTotalMinor: $subscription->subtotal_minor,
            ),
        ];

        if ($subscription->delivery_fee_minor > 0) {
            $lines[] = new InvoiceLine(
                description: (string) __('invoices.pdf.delivery_line'),
                quantity: 1,
                unitPriceMinor: $subscription->delivery_fee_minor,
                lineTotalMinor: $subscription->delivery_fee_minor,
            );
        }

        return new InvoiceDraft(
            lines: $lines,
            linesTotalMinor: $linesTotal,
            discountMinor: $discount,
            netMinor: $net,
            taxMinor: $tax,
            totalMinor: $total,
            taxRateBps: $this->taxRateBps(),
        );
    }

    private function subscriptionLabel(Subscription $subscription): string
    {
        return (string) __('invoices.pdf.subscription_line', [
            'plan' => $subscription->plan_name,
            'days' => $subscription->total_days,
        ]);
    }

    /**
     * Split a target amount across weighted lines so the parts sum exactly.
     *
     * Rounding drift lands on the heaviest line, where it is proportionally
     * least visible.
     *
     * @param  list<int>  $weights
     * @return list<int>
     */
    private function allocate(int $target, array $weights): array
    {
        $count = count($weights);

        if ($count === 0) {
            return [];
        }

        $totalWeight = array_sum($weights);

        if ($totalWeight <= 0) {
            $weights = array_fill(0, $count, 1);
            $totalWeight = $count;
        }

        $amounts = [];
        $running = 0;

        foreach ($weights as $weight) {
            $amount = Rounding::divide($target * $weight, $totalWeight);
            $amounts[] = $amount;
            $running += $amount;
        }

        $drift = $target - $running;

        if ($drift !== 0) {
            $heaviest = (int) array_search(max($weights), $weights, true);
            $amounts[$heaviest] += $drift;
        }

        return $amounts;
    }

    private function seller(): InvoiceParty
    {
        $locale = app()->getLocale();
        $name = (string) ($this->settings->get('company.name_'.($locale === 'en' ? 'en' : 'ar')) ?? '');
        $address = $this->settings->get('company.address_'.($locale === 'en' ? 'en' : 'ar'));

        return new InvoiceParty(
            name: $name !== '' ? $name : (string) config('app.name'),
            taxNumber: $this->stringSetting('company.tax_number'),
            email: $this->stringSetting('company.email'),
            phone: $this->stringSetting('company.phone'),
            address: is_string($address) && trim($address) !== '' ? trim($address) : null,
        );
    }

    private function buyer(Order|Subscription $payable): InvoiceParty
    {
        $customer = $payable->user;
        $snapshot = $payable->deliveryAddress();

        return new InvoiceParty(
            name: $snapshot?->recipientName ?: (string) ($customer?->name ?? ''),
            taxNumber: null,
            email: $customer?->email,
            phone: $snapshot?->phone ?: $customer?->phone,
            address: $snapshot?->oneLine(),
        );
    }

    /**
     * The configured VAT rate as basis points (15% becomes 1500).
     */
    private function taxRateBps(): int
    {
        $rate = $this->settings->get('finance.tax_rate');

        if (! is_string($rate) && ! is_int($rate)) {
            return self::DEFAULT_TAX_RATE_BPS;
        }

        try {
            // A percentage with two decimals scales exactly like a minor unit.
            return Money::fromMajor((string) $rate)->toMinor();
        } catch (InvalidArgumentException) {
            return self::DEFAULT_TAX_RATE_BPS;
        }
    }

    private function stringSetting(string $key): ?string
    {
        $value = $this->settings->get($key);

        if (! is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
