<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

/**
 * Earliest allowed subscription start date from operations settings.
 */
final class SubscriptionStartRules
{
    public static function minStartDays(): int
    {
        $days = app(SettingsService::class)->get('operations.subscription_min_start_days');

        return max(0, (int) ($days ?? 1));
    }

    public static function earliestDate(): Carbon
    {
        return Carbon::now(DisplayTime::timezone())->startOfDay()->addDays(self::minStartDays());
    }

    public static function earliestDateString(): string
    {
        return self::earliestDate()->toDateString();
    }
}
