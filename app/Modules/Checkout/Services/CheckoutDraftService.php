<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Modules\Checkout\DTOs\SubscriptionDraft;
use App\Modules\Checkout\Enums\CheckoutSource;

/**
 * Keeps the pending subscribe-wizard selection in the session.
 *
 * The store cart already survives a sign-in round trip this way; a subscription
 * draft gets the same treatment so a guest can be sent to the login page and
 * come back without losing their choices.
 */
final class CheckoutDraftService
{
    private const SESSION_KEY = 'checkout_subscription_draft';

    public function putSubscription(SubscriptionDraft $draft): void
    {
        session()->put(self::SESSION_KEY, $draft->toArray());
    }

    public function subscription(): ?SubscriptionDraft
    {
        $stored = session()->get(self::SESSION_KEY);

        if (! is_array($stored) || ($stored['plan_public_id'] ?? '') === '') {
            return null;
        }

        return SubscriptionDraft::fromArray($stored);
    }

    public function hasSubscription(): bool
    {
        return $this->subscription() instanceof SubscriptionDraft;
    }

    public function forgetSubscription(): void
    {
        session()->forget(self::SESSION_KEY);
    }

    /**
     * A parked subscription always wins: the customer left the wizard for it.
     */
    public function source(): CheckoutSource
    {
        return $this->hasSubscription() ? CheckoutSource::Subscription : CheckoutSource::Cart;
    }
}
