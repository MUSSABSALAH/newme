<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Moves active subscriptions whose last delivery day has passed to expired.
 *
 * The last day lives in the meal schedule JSON, so it cannot be filtered in
 * SQL. A sweep runs at most once per business day, triggered by the scheduler
 * when it runs or by the first page that lists subscriptions.
 */
final class SubscriptionExpiry
{
    public function sweepIfDue(): void
    {
        if (Cache::add('subscriptions:expiry-sweep:'.DisplayTime::today()->toDateString(), true, now()->addDay())) {
            $this->sweep();
        }
    }

    public function sweep(): int
    {
        $today = DisplayTime::today()->toDateString();
        $expired = 0;

        Subscription::query()
            ->where('status', SubscriptionStatus::Active->value)
            ->whereDate('start_date', '<', $today)
            ->orderBy('id')
            ->chunkById(200, function (Collection $subscriptions) use (&$expired): void {
                foreach ($subscriptions as $subscription) {
                    if ($subscription instanceof Subscription && $this->expireIfEnded($subscription)) {
                        $expired++;
                    }
                }
            });

        return $expired;
    }

    public function expireIfEnded(Subscription $subscription): bool
    {
        if ($subscription->status !== SubscriptionStatus::Active || ! $subscription->hasEnded()) {
            return false;
        }

        $subscription->status = SubscriptionStatus::Expired;
        $subscription->save();

        return true;
    }
}
