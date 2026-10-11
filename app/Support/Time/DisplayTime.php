<?php

declare(strict_types=1);

namespace App\Support\Time;

use App\Modules\Settings\Services\SettingsService;
use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Support\Carbon;
use Throwable;

/**
 * Bridges UTC storage and the operator's wall clock.
 *
 * Timestamps are stored in UTC, but admin forms exchange bare "Y-m-dTH:i"
 * strings that carry no offset. Those must be read in the business timezone
 * from {@see SettingsRegistry} ("localization.timezone"), otherwise a window
 * typed as 11:57 is silently stored three hours late.
 */
final class DisplayTime
{
    private const SETTING = 'localization.timezone';

    public static function timezone(): string
    {
        try {
            $timezone = app(SettingsService::class)->get(self::SETTING);
        } catch (Throwable) {
            // Settings table may be unavailable (fresh install, migrations).
            $timezone = null;
        }

        if (is_string($timezone) && $timezone !== '') {
            return $timezone;
        }

        $default = SettingsRegistry::find(self::SETTING)?->default;

        return is_string($default) && $default !== '' ? $default : 'UTC';
    }

    /**
     * The current moment on the business clock.
     */
    public static function now(): Carbon
    {
        return Carbon::now(self::timezone());
    }

    /**
     * Today's business date, as midnight in the app timezone (UTC).
     *
     * The app clock stays on UTC, so between midnight and 03:00 in Riyadh a
     * plain Carbon::today() is still yesterday. Midnight in the app timezone
     * keeps it comparable with dates parsed from "Y-m-d" strings.
     */
    public static function today(): Carbon
    {
        return Carbon::parse(self::now()->toDateString());
    }

    public static function isToday(Carbon $date): bool
    {
        return $date->toDateString() === self::now()->toDateString();
    }

    /**
     * Read operator-entered wall time as a UTC instant.
     */
    public static function parse(string $value): Carbon
    {
        return Carbon::parse($value, self::timezone())->utc();
    }

    /**
     * Render a stored instant for a datetime-local input.
     */
    public static function forInput(?Carbon $at): string
    {
        return self::format($at, 'Y-m-d\TH:i') ?? '';
    }

    public static function format(?Carbon $at, string $format = 'Y-m-d H:i'): ?string
    {
        return $at?->copy()->setTimezone(self::timezone())->format($format);
    }
}
