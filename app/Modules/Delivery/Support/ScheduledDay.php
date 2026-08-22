<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Support;

use App\Modules\Subscriptions\Models\Subscription;

/**
 * Reads one day out of a subscription's delivery calendar.
 *
 * Shared by the board (which lists the day) and the request that records a
 * hand-over (which refuses a date the customer is not expecting a delivery on).
 */
final class ScheduledDay
{
    /**
     * The meals due on this date, or null when nothing is due — either the day
     * is not on the calendar at all, or it is frozen by a pause.
     *
     * @return list<array{type: string, label: string, dish: string, is_chef: bool}>|null
     */
    public static function mealsFor(Subscription $subscription, string $date): ?array
    {
        foreach ($subscription->scheduleDaysWithPauseState() as $day) {
            if ($day['date'] !== $date) {
                continue;
            }

            return $day['paused'] ? null : $day['meals'];
        }

        return null;
    }

    public static function exists(Subscription $subscription, string $date): bool
    {
        return self::mealsFor($subscription, $date) !== null;
    }
}
