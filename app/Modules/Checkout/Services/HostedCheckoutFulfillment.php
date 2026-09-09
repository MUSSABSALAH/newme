<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Checkout\DTOs\SubscriptionDraft;
use App\Modules\Checkout\Enums\CheckoutSource;
use App\Modules\Identity\Services\CustomerProfileService;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Models\Payment;
use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\PlanPricingService;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\SubscriptionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Turns a paid hosted checkout into an order or subscription.
 *
 * The payable is created only after the gateway confirms the money, so a
 * declined or abandoned PayTabs page never leaves an unpaid order in admin.
 */
final class HostedCheckoutFulfillment
{
    public function __construct(
        private readonly OrderService $orders,
        private readonly SubscriptionService $subscriptions,
        private readonly PlanPricingService $pricing,
        private readonly CustomerProfileService $profiles,
    ) {}

    public function fulfill(Payment $payment): Order|Subscription
    {
        if ($payment->payable instanceof Order || $payment->payable instanceof Subscription) {
            return $payment->payable;
        }

        $intent = $payment->checkout_intent;

        if (! is_array($intent) || $intent === []) {
            throw (new ModelNotFoundException)->setModel(Payment::class, [(string) $payment->public_id]);
        }

        $user = $payment->user;
        $address = $this->address($user, $intent);
        $method = PaymentMethod::tryFrom((string) ($intent['method'] ?? $payment->method->value))
            ?? $payment->method;

        $placed = (($intent['source'] ?? '') === CheckoutSource::Subscription->value)
            ? $this->fulfillSubscription($user, $address, $method, $intent)
            : $this->orders->placeFromSnapshot($user, $address, $method, $intent);

        $payment->payable()->associate($placed);
        $payment->checkout_intent = null;
        $payment->save();

        return $placed;
    }

    /**
     * @param  array<string, mixed>  $intent
     */
    private function fulfillSubscription(
        User $user,
        Address $address,
        PaymentMethod $method,
        array $intent,
    ): Subscription {
        $draft = SubscriptionDraft::fromArray(is_array($intent['draft'] ?? null) ? $intent['draft'] : []);
        $plan = Plan::query()->where('public_id', $draft->planPublicId)->firstOrFail();
        $quote = $this->pricing->quote($plan, PlanQuoteRequestData::fromArray($draft->toArray()));

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

        return $subscription;
    }

    /**
     * @param  array<string, mixed>  $intent
     */
    private function address(User $user, array $intent): Address
    {
        $address = Address::query()
            ->where('user_id', $user->getKey())
            ->whereKey((int) ($intent['address_id'] ?? 0))
            ->first();

        if (! $address instanceof Address) {
            throw (new ModelNotFoundException)->setModel(Address::class);
        }

        return $address;
    }
}
