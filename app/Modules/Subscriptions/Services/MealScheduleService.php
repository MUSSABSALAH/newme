<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\MealChangeRules;
use App\Modules\Subscriptions\Support\MealSchedule;

/**
 * Updates a subscription's per-day dish picks, honouring the meal-change cutoff.
 */
final class MealScheduleService
{
    /**
     * @param  list<array{date?: mixed, meals?: mixed}>  $submitted
     */
    public function update(Subscription $subscription, array $submitted): Subscription
    {
        $current = MealSchedule::resolve(
            $subscription->meal_schedule,
            $subscription->start_date?->toDateString(),
            is_array($subscription->selected_days) ? $subscription->selected_days : [],
            (int) $subscription->total_days,
            is_array($subscription->meal_types) ? $subscription->meal_types : [],
        );

        $byDate = [];

        foreach ($current as $day) {
            $byDate[$day['date']] = $day;
        }

        $incoming = MealSchedule::normalize($submitted);
        $allowedTypes = is_array($subscription->meal_types) ? $subscription->meal_types : [];

        foreach ($incoming as $day) {
            $date = $day['date'];

            if (! isset($byDate[$date]) || ! MealChangeRules::isEditable($date)) {
                continue;
            }

            $meals = [];

            foreach ($allowedTypes as $type) {
                if (! is_string($type)) {
                    continue;
                }

                $meals[$type] = array_key_exists($type, $day['meals'])
                    ? $day['meals'][$type]
                    : ($byDate[$date]['meals'][$type] ?? null);
            }

            if ($meals === []) {
                continue;
            }

            $byDate[$date] = [
                'date' => $date,
                'meals' => $meals,
            ];
        }

        ksort($byDate);

        $subscription->meal_schedule = array_values($byDate);
        $subscription->save();

        return $subscription->refresh();
    }
}
