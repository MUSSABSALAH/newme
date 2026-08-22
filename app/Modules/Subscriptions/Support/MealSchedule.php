<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Plans\Enums\MealType;
use Illuminate\Support\Carbon;

/**
 * Normalizes the per-day dish picks the customer makes in the wizard.
 *
 * Stored shape (list, ordered by date):
 *   [ ['date' => 'Y-m-d', 'meals' => ['lunch' => 'Dish name'|null, ...]], ... ]
 *
 * An empty dish name means "chef’s pick" for that slot.
 */
final class MealSchedule
{
    /**
     * How many delivery days the subscribe wizard asks the customer to pick.
     * Remaining days stay chef’s pick until they finish them in the account.
     */
    public const CHECKOUT_PICK_DAYS = 2;

    /**
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public static function normalize(mixed $raw): array
    {
        if (! is_array($raw)) {
            return [];
        }

        $days = [];

        foreach ($raw as $row) {
            if (! is_array($row)) {
                continue;
            }

            $date = self::date($row['date'] ?? null);

            if ($date === null) {
                continue;
            }

            $mealsRaw = $row['meals'] ?? [];

            if (! is_array($mealsRaw)) {
                continue;
            }

            $meals = [];

            foreach ($mealsRaw as $type => $dish) {
                if (! is_string($type) || MealType::tryFrom($type) === null) {
                    continue;
                }

                $name = is_string($dish) ? trim($dish) : '';
                $meals[$type] = $name === '' ? null : mb_substr($name, 0, 255);
            }

            if ($meals === []) {
                continue;
            }

            $days[$date] = [
                'date' => $date,
                'meals' => $meals,
            ];
        }

        ksort($days);

        return array_values($days);
    }

    /**
     * Delivery-day skeleton when the wizard did not persist dish picks.
     *
     * @param  list<int>  $selectedDays  Weekdays 0=Sunday..6=Saturday.
     * @param  list<string>  $mealTypes
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public static function skeleton(
        ?string $startDate,
        array $selectedDays,
        int $totalDays,
        array $mealTypes,
    ): array {
        $meals = [];

        foreach ($mealTypes as $type) {
            if (is_string($type) && MealType::tryFrom($type) !== null) {
                $meals[$type] = null;
            }
        }

        if ($meals === [] || $totalDays < 1) {
            return [];
        }

        $weekdays = array_values(array_unique(array_map(
            static fn ($day): int => (int) $day,
            $selectedDays,
        )));

        $cursor = $startDate === null || trim($startDate) === ''
            ? SubscriptionStartRules::earliestDate()
            : Carbon::parse($startDate)->startOfDay();

        $out = [];
        $guard = 0;

        while (count($out) < $totalDays && $guard < 800) {
            $guard++;

            if ($weekdays === [] || in_array($cursor->dayOfWeek, $weekdays, true)) {
                $out[] = [
                    'date' => $cursor->toDateString(),
                    'meals' => $meals,
                ];
            }

            $cursor = $cursor->copy()->addDay();
        }

        return $out;
    }

    /**
     * Expand a (possibly partial) wizard payload onto the full delivery calendar.
     * Matching dates keep the customer’s picks; the rest stay chef’s pick.
     *
     * @param  list<int>  $selectedDays
     * @param  list<string>  $mealTypes
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public static function complete(
        mixed $stored,
        ?string $startDate,
        array $selectedDays,
        int $totalDays,
        array $mealTypes,
    ): array {
        $skeleton = self::skeleton($startDate, $selectedDays, $totalDays, $mealTypes);
        $picks = [];

        foreach (self::normalize($stored) as $day) {
            $picks[$day['date']] = $day['meals'];
        }

        if ($skeleton === []) {
            return self::normalize($stored);
        }

        foreach ($skeleton as $index => $day) {
            if (! isset($picks[$day['date']])) {
                continue;
            }

            $skeleton[$index]['meals'] = array_merge($day['meals'], $picks[$day['date']]);
        }

        return $skeleton;
    }

    /**
     * Prefer saved dish picks; otherwise build the calendar from the plan choices.
     *
     * @param  list<int>  $selectedDays
     * @param  list<string>  $mealTypes
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public static function resolve(
        mixed $stored,
        ?string $startDate,
        array $selectedDays,
        int $totalDays,
        array $mealTypes,
    ): array {
        $normalized = self::normalize($stored);

        if ($normalized !== []) {
            return $normalized;
        }

        return self::skeleton($startDate, $selectedDays, $totalDays, $mealTypes);
    }

    /**
     * Shape the schedule for Blade / PDF: weekday label + typed meal rows.
     *
     * @param  list<array{date: string, meals: array<string, string|null>}>  $schedule
     * @return list<array{date: string, weekday: string, label: string, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}>
     */
    public static function present(array $schedule): array
    {
        $weekdays = array_values(__('website.subscribe.days'));
        $presented = [];

        foreach ($schedule as $day) {
            $date = Carbon::parse($day['date']);
            $meals = [];

            foreach ($day['meals'] as $type => $dish) {
                $mealType = MealType::tryFrom($type);

                if ($mealType === null) {
                    continue;
                }

                $meals[] = [
                    'type' => $type,
                    'label' => $mealType->label(),
                    'dish' => $dish ?? (string) __('subscriptions.schedule.chef_choice'),
                    'is_chef' => $dish === null,
                ];
            }

            if ($meals === []) {
                continue;
            }

            $presented[] = [
                'date' => $day['date'],
                'weekday' => (string) ($weekdays[$date->dayOfWeek] ?? $date->translatedFormat('l')),
                'label' => $date->translatedFormat('d M Y'),
                'meals' => $meals,
            ];
        }

        return $presented;
    }

    /**
     * Split a schedule into days kept before the pause date and days frozen from it.
     *
     * @param  list<array{date: string, meals: array<string, string|null>}>  $schedule
     * @return array{kept: list<array{date: string, meals: array<string, string|null>}>, frozen: list<array{date: string, meals: array<string, string|null>}>}
     */
    public static function splitFromDate(array $schedule, string $pauseFrom): array
    {
        $kept = [];
        $frozen = [];

        foreach (self::normalize($schedule) as $day) {
            if ($day['date'] < $pauseFrom) {
                $kept[] = $day;
            } else {
                $frozen[] = $day;
            }
        }

        return ['kept' => $kept, 'frozen' => $frozen];
    }

    /**
     * Re-date frozen days starting at $fromDate, keeping weekday selection and meal picks.
     *
     * @param  list<array{date: string, meals: array<string, string|null>}>  $days
     * @param  list<int>  $selectedDays
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public static function rescheduleFrom(array $days, string $fromDate, array $selectedDays): array
    {
        if ($days === []) {
            return [];
        }

        $weekdays = array_values(array_unique(array_map(
            static fn ($day): int => (int) $day,
            $selectedDays,
        )));

        $cursor = Carbon::parse($fromDate)->startOfDay();
        $out = [];
        $guard = 0;

        foreach ($days as $day) {
            while ($guard < 800) {
                $guard++;

                if ($weekdays === [] || in_array($cursor->dayOfWeek, $weekdays, true)) {
                    $out[] = [
                        'date' => $cursor->toDateString(),
                        'meals' => $day['meals'],
                    ];
                    $cursor = $cursor->copy()->addDay();
                    break;
                }

                $cursor = $cursor->copy()->addDay();
            }
        }

        return $out;
    }

    private static function date(mixed $value): ?string
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        try {
            return Carbon::parse($value)->toDateString();
        } catch (\Throwable) {
            return null;
        }
    }
}
