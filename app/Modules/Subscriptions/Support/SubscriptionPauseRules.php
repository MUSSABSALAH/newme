<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

/**
 * When a customer may still pause/freeze a subscription, and when resumed
 * deliveries may start again.
 */
final class SubscriptionPauseRules
{
    public static function leadDays(): int
    {
        $days = app(SettingsService::class)->get('operations.subscription_pause_lead_days');

        return max(0, (int) ($days ?? 1));
    }

    public static function resumeLeadDays(): int
    {
        $days = app(SettingsService::class)->get('operations.subscription_resume_lead_days');

        return max(0, (int) ($days ?? 1));
    }

    public static function earliestPausableDate(): Carbon
    {
        return Carbon::now(DisplayTime::timezone())->startOfDay()->addDays(self::leadDays());
    }

    public static function earliestPausableDateString(): string
    {
        return self::earliestPausableDate()->toDateString();
    }

    public static function isPausable(string $date): bool
    {
        try {
            return Carbon::parse($date)->startOfDay()->gte(self::earliestPausableDate());
        } catch (\Throwable) {
            return false;
        }
    }

    public static function earliestResumableDate(): Carbon
    {
        return Carbon::now(DisplayTime::timezone())->startOfDay()->addDays(self::resumeLeadDays());
    }

    public static function earliestResumableDateString(): string
    {
        return self::earliestResumableDate()->toDateString();
    }

    public static function isResumableFrom(string $date): bool
    {
        try {
            return Carbon::parse($date)->startOfDay()->gte(self::earliestResumableDate());
        } catch (\Throwable) {
            return false;
        }
    }
}
