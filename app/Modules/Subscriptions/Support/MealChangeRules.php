<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

/**
 * When a customer may still change dishes for a delivery day.
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
        return Carbon::now(DisplayTime::timezone())->startOfDay()->addDays(self::leadDays());
    }

    public static function earliestEditableDateString(): string
    {
        return self::earliestEditableDate()->toDateString();
    }

    public static function isEditable(string $date): bool
    {
        try {
            return Carbon::parse($date)->startOfDay()->gte(self::earliestEditableDate());
        } catch (\Throwable) {
            return false;
        }
    }
}
