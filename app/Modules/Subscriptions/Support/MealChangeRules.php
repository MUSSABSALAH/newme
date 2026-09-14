<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

/**
 * A rolling window of upcoming calendar days the customer may still change.
 *
 * The setting is how many days ahead are open, starting tomorrow — not a
 * cutoff after which every later delivery stays editable. Today is never
 * included: 2 on 14 Sep opens 15 Sep and 16 Sep; 3 also opens 17 Sep.
 */
final class MealChangeRules
{
    public static function leadDays(): int
    {
        $days = app(SettingsService::class)->get('operations.meal_change_lead_days');

        return max(0, (int) ($days ?? 1));
    }

    public static function earliestEditableDate(): Carbon
    {
        return self::today()->addDay();
    }

    public static function latestEditableDate(): Carbon
    {
        return self::today()->addDays(self::leadDays());
    }

    public static function earliestEditableDateString(): string
    {
        return self::earliestEditableDate()->toDateString();
    }

    public static function latestEditableDateString(): string
    {
        return self::latestEditableDate()->toDateString();
    }

    public static function isEditable(string $date): bool
    {
        if (self::leadDays() < 1) {
            return false;
        }

        try {
            $day = Carbon::parse($date, DisplayTime::timezone())->startOfDay();
        } catch (\Throwable) {
            return false;
        }

        return $day->gte(self::earliestEditableDate()) && $day->lte(self::latestEditableDate());
    }

    private static function today(): Carbon
    {
        return Carbon::now(DisplayTime::timezone())->startOfDay();
    }
}
