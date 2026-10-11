<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

/**
 * When the kitchen starts preparing a delivery day, customers can no longer
 * change it.
 *
 * Changes for a day close a set number of hours before that day begins: with
 * 6 hours, meals for 12 Oct are locked from 18:00 on 11 Oct (business time).
 * 0 turns the cutoff off, leaving only the day-based rules.
 */
final class MealPrepCutoff
{
    public static function hours(): int
    {
        $hours = app(SettingsService::class)->get('operations.meal_change_cutoff_hours');

        return max(0, (int) ($hours ?? 0));
    }

    public static function enabled(): bool
    {
        return self::hours() > 0;
    }

    /**
     * The business-time moment changes to this delivery day close.
     */
    public static function closesAt(string $date): Carbon
    {
        return Carbon::parse($date, DisplayTime::timezone())->startOfDay()->subHours(self::hours());
    }

    public static function isOpen(string $date): bool
    {
        return ! self::enabled() || DisplayTime::now()->lt(self::closesAt($date));
    }

    /**
     * The first day from tomorrow on that the kitchen has not locked yet.
     */
    public static function firstOpenDate(): string
    {
        $day = DisplayTime::today()->addDay();

        for ($guard = 0; $guard < 10 && ! self::isOpen($day->toDateString()); $guard++) {
            $day->addDay();
        }

        return $day->toDateString();
    }

    /**
     * Pushes a day-based earliest date past the cutoff when it is enabled.
     */
    public static function atLeastFirstOpen(Carbon $earliest): Carbon
    {
        if (! self::enabled() || $earliest->toDateString() >= self::firstOpenDate()) {
            return $earliest;
        }

        return Carbon::parse(self::firstOpenDate(), $earliest->getTimezone())->startOfDay();
    }
}
