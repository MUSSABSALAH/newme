<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use Illuminate\Support\Carbon;

/**
 * Builds month grids for the customer meal calendar UI.
 */
final class MealCalendarPresenter
{
    /**
     * @param  list<array{date: string, weekday: string, label: string, editable: bool, meals: list<array<string, mixed>>}>  $scheduleDays
     * @return list<array{key: string, label: string, weekdays: list<string>, weeks: list<list<array{day: int|null, delivery: array<string, mixed>|null}>>}>
     */
    public static function months(array $scheduleDays): array
    {
        if ($scheduleDays === []) {
            return [];
        }

        $weekdayNames = array_values(__('website.subscribe.days'));
        $byMonth = [];

        foreach ($scheduleDays as $index => $day) {
            $date = Carbon::parse($day['date']);
            $key = $date->format('Y-m');

            if (! isset($byMonth[$key])) {
                $byMonth[$key] = [
                    'key' => $key,
                    'label' => $date->translatedFormat('F Y'),
                    'weekdays' => $weekdayNames,
                    'deliveries' => [],
                ];
            }

            $byMonth[$key]['deliveries'][$day['date']] = [
                ...$day,
                'index' => $index,
                'day_num' => (int) $date->format('j'),
            ];
        }

        ksort($byMonth);

        $months = [];

        foreach ($byMonth as $month) {
            $first = Carbon::parse($month['key'].'-01')->startOfMonth();
            $daysInMonth = (int) $first->daysInMonth;
            $weeks = [];
            $week = [];

            for ($offset = 0; $offset < $first->dayOfWeek; $offset++) {
                $week[] = ['day' => null, 'delivery' => null];
            }

            for ($dayNum = 1; $dayNum <= $daysInMonth; $dayNum++) {
                $iso = $first->copy()->day($dayNum)->toDateString();
                $week[] = [
                    'day' => $dayNum,
                    'delivery' => $month['deliveries'][$iso] ?? null,
                ];

                if (count($week) === 7) {
                    $weeks[] = $week;
                    $week = [];
                }
            }

            if ($week !== []) {
                while (count($week) < 7) {
                    $week[] = ['day' => null, 'delivery' => null];
                }
                $weeks[] = $week;
            }

            $months[] = [
                'key' => $month['key'],
                'label' => $month['label'],
                'weekdays' => $month['weekdays'],
                'weeks' => $weeks,
            ];
        }

        return $months;
    }
}
