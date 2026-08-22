<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Checkout\DTOs\CheckoutSummary;
use App\Modules\Checkout\DTOs\SubscriptionDraft;
use App\Modules\Checkout\Enums\CheckoutSource;
use App\Modules\Checkout\Exceptions\NothingToCheckoutException;
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
 * priced here from server-side sources only. Placing and charging happen in one
 * transaction, so a declined card leaves no half-finished order behind — the
 * refused attempt is recorded in the audit trail afterwards instead.
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
    ) {}

    public function source(): CheckoutSource
    {
        return $this->drafts->source();
    }

    /**
     * What the customer is about to pay for.
     *
     * @throws NothingToCheckoutException
     */
    public function summary(): CheckoutSummary
    {
        $draft = $this->drafts->subscription();

        if ($draft instanceof SubscriptionDraft) {
            return $this->subscriptionSummary($draft);
        }

        if ($this->cart->items()->isEmpty()) {
            throw new NothingToCheckoutException;
        }

        return $this->cartSummary();
    }

    /**
     * Place the order or subscription and charge it.
     *
     * @throws NothingToCheckoutException
     * @throws PaymentDeclinedException
     */
    public function place(
        User $user,
        Address $address,
        PaymentMethod $method,
        ?CardDetails $card = null,
        ?string $note = null,
    ): Order|Subscription {
        $this->hostedRedirectUrl = null;
        $draft = $this->drafts->subscription();

        try {
            if ($draft instanceof SubscriptionDraft) {
                [$placed, $this->hostedRedirectUrl] = $this->placeSubscription($user, $draft, $address, $method, $card);
            } else {
                [$placed, $this->hostedRedirectUrl] = $this->placeOrder($user, $address, $method, $card, $note);
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

        // Hosted checkout: the payable is parked pending until the gateway
        // confirms. Clear the cart now so the customer cannot place twice, but
        // wait for the return/IPN before invoicing or mailing.
        if ($placed instanceof Subscription) {
            $this->drafts->forgetSubscription();
        } else {
            $this->cart->clear();
        }

        if ($this->hostedRedirectUrl !== null) {
            return $placed;
        }

        // Only notify once the transaction has committed, so neither staff nor
        // the customer hears about an order that was rolled back.
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
        Address $address,
        PaymentMethod $method,
        ?CardDetails $card,
        ?string $note,
    ): array {
        return DB::transaction(function () use ($user, $address, $method, $card, $note): array {
            $order = $this->orders->placeFromCart($user, $this->cart, $address, $method, $note);

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

    private function cartSummary(): CheckoutSummary
    {
        $items = $this->cart->items();
        $subtotal = $this->cart->subtotalMinor();
        $discount = $this->cart->discountMinor();

        $lines = [
            ['label' => __('checkout.summary.subtotal'), 'value' => Money::fromMinor($subtotal)->format()],
        ];

        $code = $this->cart->appliedCoupon()?->code();

        if ($discount > 0) {
            $lines[] = [
                'label' => __('checkout.summary.discount'),
                'value' => '−'.Money::fromMinor($discount)->format(),
            ];
        }

        return new CheckoutSummary(
            source: CheckoutSource::Cart,
            title: (string) __('checkout.summary.cart_title', ['count' => $items->count()]),
            items: $items->map(static fn (array $item): array => [
                'label' => (string) $item['name'].' × '.$item['qty'],
                'value' => (string) $item['line_total_display'],
            ])->values()->all(),
            lines: $lines,
            total: Money::fromMinor($this->cart->totalMinor()),
            couponCode: $code,
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
