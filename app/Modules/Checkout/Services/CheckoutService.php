<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Analytics\Support\EcommerceDataLayer;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Checkout\DTOs\CheckoutSummary;
use App\Modules\Checkout\DTOs\DeliveryQuote;
use App\Modules\Checkout\DTOs\StoreFulfillmentQuote;
use App\Modules\Checkout\DTOs\SubscriptionDraft;
use App\Modules\Checkout\Enums\CheckoutSource;
use App\Modules\Checkout\Enums\FulfillmentMethod;
use App\Modules\Checkout\Exceptions\NothingToCheckoutException;
use App\Modules\Checkout\Support\VatBreakdown;
use App\Modules\Identity\Services\CustomerProfileService;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Notifications\Services\AdminNotifier;
use App\Modules\Notifications\Services\CustomerNotifier;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use App\Modules\Payments\DTOs\CardDetails;
use App\Modules\Payments\DTOs\PayerDetails;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Exceptions\PaymentDeclinedException;
use App\Modules\Payments\Models\Payment;
use App\Modules\Payments\Services\PaymentService;
use App\Modules\Plans\DTOs\PlanQuote;
use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\PlanPricingService;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Store\Services\CartService;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\SubscriptionService;
use App\Support\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Drives the shared checkout: confirm an address, pay, then place.
 *
 * The customer either has a store cart or a parked subscription draft; both are
 * priced here from server-side sources only. An unfinished subscription is
 * dropped the moment they use the store cart, so shopping never reopens the
 * wizard. Placing and charging happen in one transaction, so a declined card
 * leaves no half-finished order behind — the refused attempt is recorded in
 * the audit trail afterwards instead.
 */
final class CheckoutService
{
    private ?string $hostedRedirectUrl = null;

    public function __construct(
        private readonly CheckoutDraftService $drafts,
        private readonly CartService $cart,
        private readonly OrderService $orders,
        private readonly SubscriptionService $subscriptions,
        private readonly PlanPricingService $pricing,
        private readonly PaymentService $payments,
        private readonly AuditService $audit,
        private readonly AdminNotifier $notifier,
        private readonly CustomerNotifier $customerNotifier,
        private readonly InvoiceService $invoices,
        private readonly CustomerProfileService $profiles,
        private readonly StoreDeliveryFee $storeDelivery,
        private readonly SettingsService $settings,
        private readonly EcommerceDataLayer $analytics,
    ) {}

    public function source(): CheckoutSource
    {
        return $this->drafts->source();
    }

    /**
     * What the customer is about to pay for.
     *
     * @param  iterable<Address>  $addresses  The customer's saved addresses, priced one by one in distance mode.
     *
     * @throws NothingToCheckoutException
     */
    public function summary(iterable $addresses = [], ?Address $selected = null): CheckoutSummary
    {
        $draft = $this->drafts->subscription();

        if ($draft instanceof SubscriptionDraft) {
            return $this->subscriptionSummary($draft);
        }

        if ($this->cart->items()->isEmpty()) {
            throw new NothingToCheckoutException;
        }

        return $this->cartSummary($addresses, $selected);
    }

    /**
     * Place the order or subscription and charge it.
     *
     * @throws NothingToCheckoutException
     * @throws PaymentDeclinedException
     */
    public function place(
        User $user,
        ?Address $address,
        PaymentMethod $method,
        ?CardDetails $card = null,
        ?string $note = null,
        FulfillmentMethod $fulfillment = FulfillmentMethod::Delivery,
    ): Order|Subscription|null {
        $this->hostedRedirectUrl = null;
        $draft = $this->drafts->subscription();

        if ($draft instanceof SubscriptionDraft && ! $address instanceof Address) {
            throw new NothingToCheckoutException;
        }

        if ($this->payments->usesHostedCheckout() && ! $method->isDeferred()) {
            $this->startHosted($user, $address, $method, $draft, $note, $fulfillment);

            return null;
        }

        try {
            if ($draft instanceof SubscriptionDraft) {
                [$placed, $this->hostedRedirectUrl] = $this->placeSubscription($user, $draft, $address, $method, $card);
            } else {
                [$placed, $this->hostedRedirectUrl] = $this->placeOrder($user, $address, $method, $card, $note, $fulfillment);
            }
        } catch (PaymentDeclinedException $e) {
            // The transaction rolled back with the payment row, so keep a trace
            // of the refusal outside it.
            $this->audit->log(AuditAction::PaymentDeclined, null, [], [
                'source' => $this->source()->value,
                'method' => $method->value,
                'reason' => $e->reason->value,
                'user_id' => $user->getKey(),
            ]);

            throw $e;
        }

        if ($placed instanceof Subscription) {
            $this->drafts->forgetSubscription();
        } else {
            $this->cart->clear();
        }

        if ($this->hostedRedirectUrl !== null) {
            return $placed;
        }

        if ($placed instanceof Subscription) {
            $this->notifier->subscriptionStarted($placed);
            $this->customerNotifier->subscriptionStarted($placed);
        } else {
            $this->notifier->orderPlaced($placed);
            $this->customerNotifier->orderPlaced($placed);
        }

        $this->invoiceIfPaid($placed);

        return $placed;
    }

    /**
     * Park the cart (or subscription draft) and send the customer to PayTabs.
     *
     * Nothing is written to orders/subscriptions until the gateway confirms.
     */
    private function startHosted(
        User $user,
        ?Address $address,
        PaymentMethod $method,
        ?SubscriptionDraft $draft,
        ?string $note,
        FulfillmentMethod $fulfillment = FulfillmentMethod::Delivery,
    ): void {
        $payer = PayerDetails::fromCustomer($user, $address);

        if ($draft instanceof SubscriptionDraft) {
            if (! $address instanceof Address) {
                throw new NothingToCheckoutException;
            }

            $plan = $this->plan($draft);
            $quote = $this->quote($plan, $draft);
            $intent = [
                'source' => CheckoutSource::Subscription->value,
                'address_id' => $address->getKey(),
                'method' => $method->value,
                'draft' => $draft->toArray(),
            ];

            $attempt = $this->payments->startHostedCheckout(
                $user,
                $method,
                $quote->total,
                $payer,
                'Subscription checkout',
                $intent,
            );
        } else {
            if ($this->cart->items()->isEmpty()) {
                throw new NothingToCheckoutException;
            }

            [$subtotal, $discount, , $fee, $total, $delivery] = $this->storeCharge($fulfillment, $address);

            $intent = [
                'source' => CheckoutSource::Cart->value,
                'address_id' => $address?->getKey(),
                'method' => $method->value,
                'note' => $note,
                'fulfillment' => $fulfillment->value,
                'subtotal_minor' => $subtotal,
                'discount_minor' => $discount,
                'delivery_fee_minor' => $fee,
                'delivery_distance_km' => $delivery->distance?->km,
                'delivery_distance_method' => $delivery->distance?->method->value,
                'total_minor' => $total,
                'coupon_code' => $this->cart->couponCode(),
                'items' => $this->cart->items()->map(static fn (array $item): array => [
                    'product_id' => $item['id'],
                    'name' => $item['name'],
                    'unit_price_minor' => $item['unit_price'],
                    'quantity' => $item['qty'],
                    'line_total_minor' => $item['line_total'],
                ])->values()->all(),
            ];

            $attempt = $this->payments->startHostedCheckout(
                $user,
                $method,
                Money::fromMinor($total),
                $payer,
                'Store checkout',
                $intent,
            );
        }

        $this->hostedRedirectUrl = $attempt->redirectUrl;
    }

    /**
     * Off-site URL after a hosted charge, or null when settlement was immediate.
     */
    public function hostedRedirectUrl(): ?string
    {
        return $this->hostedRedirectUrl;
    }

    /**
     * Bill the customer for what they just paid for.
     *
     * Deferred methods such as cash on delivery are skipped here: their invoice
     * waits until the money is confirmed in the admin panel.
     */
    private function invoiceIfPaid(Order|Subscription $placed): void
    {
        $payment = $placed->payments()
            ->where('status', PaymentStatus::Paid)
            ->latest('id')
            ->first();

        if ($payment instanceof Payment) {
            $this->invoices->issueFor($placed, $payment);
        }
    }

    /**
     * @return array{0: Order, 1: ?string}
     */
    private function placeOrder(
        User $user,
        ?Address $address,
        PaymentMethod $method,
        ?CardDetails $card,
        ?string $note,
        FulfillmentMethod $fulfillment = FulfillmentMethod::Delivery,
    ): array {
        return DB::transaction(function () use ($user, $address, $method, $card, $note, $fulfillment): array {
            [, , , $fee, , $delivery] = $this->storeCharge($fulfillment, $address);

            $order = $this->orders->placeFromCart(
                $user,
                $this->cart,
                $address,
                $method,
                $note,
                $fulfillment,
                $fee,
                $delivery->distance,
            );

            $attempt = $this->payments->charge(
                $order,
                $user,
                $method,
                Money::fromMinor($order->total_minor),
                $card,
                PayerDetails::fromCustomer($user, $address),
            );

            return [
                $this->orders->settle($order, $attempt->payment),
                $attempt->requiresRedirect() ? $attempt->redirectUrl : null,
            ];
        });
    }

    /**
     * @return array{0: Subscription, 1: ?string}
     */
    private function placeSubscription(
        User $user,
        SubscriptionDraft $draft,
        Address $address,
        PaymentMethod $method,
        ?CardDetails $card,
    ): array {
        $plan = $this->plan($draft);
        $quote = $this->quote($plan, $draft);

        return DB::transaction(function () use ($user, $plan, $quote, $draft, $address, $method, $card): array {
            $subscription = $this->subscriptions->createFromQuote(
                $user,
                $plan,
                $quote,
                $draft->startDate,
                $draft->health,
                $address,
                $method,
                $draft->mealSchedule,
            );

            $this->profiles->rememberHealth($user, $draft->health);

            $attempt = $this->payments->charge(
                $subscription,
                $user,
                $method,
                Money::fromMinor($subscription->total_minor),
                $card,
                PayerDetails::fromCustomer($user, $address),
            );

            return [
                $this->subscriptions->settle($subscription, $attempt->payment),
                $attempt->requiresRedirect() ? $attempt->redirectUrl : null,
            ];
        });
    }

    /**
     * Whether distance pricing needs this store-delivery address pinned first.
     */
    public function addressNeedsPin(?Address $address): bool
    {
        return $this->storeDelivery->needsPin($address);
    }

    /**
     * @return array{0: int, 1: int, 2: int, 3: int, 4: int, 5: DeliveryQuote}
     */
    private function storeCharge(FulfillmentMethod $fulfillment, ?Address $address): array
    {
        $subtotal = $this->cart->subtotalMinor();
        $discount = $this->cart->discountMinor();
        $goods = max(0, $subtotal - $discount);
        $delivery = $this->storeDelivery->quoteFor($fulfillment, $goods, $address);
        $vat = VatBreakdown::forCharge($goods, $delivery->feeMinor, $this->settings);

        return [$subtotal, $discount, $goods, $delivery->feeMinor, $vat->grossMinor, $delivery];
    }

    /**
     * Delivery figures per saved address, for switching addresses without a reload.
     *
     * Only filled in distance mode; a fixed fee is the same for every address.
     *
     * @param  iterable<Address>  $addresses
     * @return array<string, array{fee: string, charged: bool, subtotal: string, tax: string, total: string}>
     */
    private function addressQuotes(iterable $addresses, int $goods, ?Address $selected, DeliveryQuote $selectedQuote): array
    {
        if (! $this->storeDelivery->profile()->usesDistance()) {
            return [];
        }

        $quotes = [];

        foreach ($addresses as $address) {
            if (! $address->isDeliverable() || ! $address->hasPin()) {
                continue;
            }

            $quote = $selected instanceof Address && $address->is($selected)
                ? $selectedQuote
                : $this->storeDelivery->quoteFor(FulfillmentMethod::Delivery, $goods, $address);
            $vat = VatBreakdown::forCharge($goods, $quote->feeMinor, $this->settings);

            $quotes[$address->public_id] = [
                'fee' => $vat->exclusiveFeeMinor === 0
                    ? (string) __('checkout.summary.free')
                    : Money::fromMinor($vat->exclusiveFeeMinor)->format(),
                'charged' => $vat->exclusiveFeeMinor > 0,
                'subtotal' => Money::fromMinor($vat->exclusiveMinor)->format(),
                'tax' => Money::fromMinor($vat->taxMinor)->format(),
                'total' => Money::fromMinor($vat->grossMinor)->format(),
            ];
        }

        return $quotes;
    }

    /**
     * @param  iterable<Address>  $addresses
     */
    private function cartSummary(iterable $addresses = [], ?Address $selected = null): CheckoutSummary
    {
        $items = $this->cart->items();
        $subtotal = $this->cart->subtotalMinor();
        $discount = $this->cart->discountMinor();
        $goods = max(0, $subtotal - $discount);
        $delivery = $this->storeDelivery->quoteFor(FulfillmentMethod::Delivery, $goods, $selected);
        $fee = $delivery->feeMinor;
        $deliveryVat = VatBreakdown::forCharge($goods, $fee, $this->settings);
        $pickupVat = VatBreakdown::forCharge($goods, 0, $this->settings);

        $weights = $items->map(static fn (array $item): int => (int) $item['line_total'])->values()->all();
        $exclusiveLines = $deliveryVat->allocateGoods($weights);

        $code = $this->cart->appliedCoupon()?->code();

        $lines = [];

        $lines[] = [
            'key' => 'delivery',
            'label' => __('checkout.summary.delivery'),
            'value' => $deliveryVat->exclusiveFeeMinor === 0
                ? (string) __('checkout.summary.free')
                : Money::fromMinor($deliveryVat->exclusiveFeeMinor)->format(),
        ];

        $lines[] = [
            'key' => 'subtotal',
            'label' => __('checkout.summary.subtotal'),
            'value' => Money::fromMinor($deliveryVat->exclusiveMinor)->format(),
        ];

        $lines[] = [
            'key' => 'taxable',
            'label' => __('checkout.summary.taxable'),
            'value' => Money::fromMinor($deliveryVat->exclusiveMinor)->format(),
        ];

        if ($deliveryVat->taxRateBps > 0) {
            $lines[] = [
                'key' => 'tax',
                'label' => __('checkout.summary.tax', ['rate' => $deliveryVat->rateLabel]),
                'value' => Money::fromMinor($deliveryVat->taxMinor)->format(),
            ];
        }

        $quote = new StoreFulfillmentQuote(
            goodsMinor: $goods,
            deliveryFeeMinor: $deliveryVat->exclusiveFeeMinor,
            thresholdMinor: $this->storeDelivery->thresholdMinor(),
            branchAddress: $this->storeDelivery->branchAddress(),
            deliverySubtotalDisplay: Money::fromMinor($deliveryVat->exclusiveMinor)->format(),
            pickupSubtotalDisplay: Money::fromMinor($pickupVat->exclusiveMinor)->format(),
            deliveryTaxDisplay: Money::fromMinor($deliveryVat->taxMinor)->format(),
            pickupTaxDisplay: Money::fromMinor($pickupVat->taxMinor)->format(),
            deliveryTotalMinor: $deliveryVat->grossMinor,
            pickupTotalMinor: $pickupVat->grossMinor,
            requiresPin: $this->storeDelivery->profile()->usesDistance(),
            addressQuotes: $this->addressQuotes($addresses, $goods, $selected, $delivery),
        );

        return new CheckoutSummary(
            source: CheckoutSource::Cart,
            title: (string) __('checkout.summary.cart_title', ['count' => $items->count()]),
            items: $items->values()->map(static function (array $item, int $index) use ($exclusiveLines): array {
                $qty = (int) $item['qty'];
                $line = $exclusiveLines[$index] ?? (int) $item['line_total'];

                return [
                    'label' => (string) $item['name'].' × '.$qty,
                    'value' => Money::fromMinor($line)->format(),
                ];
            })->all(),
            lines: $lines,
            total: Money::fromMinor($deliveryVat->grossMinor),
            couponCode: $code,
            storeQuote: $quote,
            beginCheckout: $this->analytics->beginCheckoutForCart($items, $deliveryVat, $code),
        );
    }

    private function subscriptionSummary(SubscriptionDraft $draft): CheckoutSummary
    {
        $plan = $this->plan($draft);
        $quote = $this->quote($plan, $draft);

        $lines = [
            ['label' => __('checkout.summary.subtotal'), 'value' => $quote->subtotal->format()],
        ];

        if (! $quote->discount->isZero()) {
            $lines[] = [
                'label' => __('checkout.summary.plan_discount', ['percent' => $quote->discountPercent]),
                'value' => '−'.$quote->discount->format(),
            ];
        }

        if (! $quote->couponDiscount->isZero()) {
            $lines[] = [
                'label' => __('checkout.summary.discount'),
                'value' => '−'.$quote->couponDiscount->format(),
            ];
        }

        if (! $quote->deliveryFee->isZero()) {
            $lines[] = [
                'label' => __('checkout.summary.delivery'),
                'value' => $quote->deliveryFee->format(),
            ];
        }

        if (! $quote->tax->isZero()) {
            $lines[] = [
                'label' => __('checkout.summary.tax', ['rate' => $quote->taxRate]),
                'value' => $quote->tax->format(),
            ];
        }

        return new CheckoutSummary(
            source: CheckoutSource::Subscription,
            title: $plan->label(),
            items: [
                [
                    'label' => (string) __('checkout.summary.meals'),
                    'value' => implode(' · ', array_map(
                        static fn (string $type): string => (string) __('meals.types.'.$type),
                        $quote->mealTypes,
                    )),
                ],
                [
                    'label' => (string) __('checkout.summary.duration'),
                    'value' => (string) __('checkout.summary.days', ['count' => $quote->totalDays]),
                ],
            ],
            lines: $lines,
            total: $quote->total,
            couponCode: $quote->couponCode,
            beginCheckout: $this->analytics->beginCheckoutForPlan($plan, $quote),
        );
    }

    private function plan(SubscriptionDraft $draft): Plan
    {
        return Plan::query()
            ->where('public_id', $draft->planPublicId)
            ->firstOrFail();
    }

    private function quote(Plan $plan, SubscriptionDraft $draft): PlanQuote
    {
        return $this->pricing->quote($plan, PlanQuoteRequestData::fromArray($draft->toArray()));
    }

    /**
     * Where to send the customer once the payable exists.
     */
    public function confirmationRoute(Model $placed): string
    {
        if ($placed instanceof Subscription) {
            return route('website.account.subscription', ['subscription' => $placed->public_id]);
        }

        /** @var Order $placed */
        return route('website.account.order', ['order' => $placed->public_id]);
    }
}
