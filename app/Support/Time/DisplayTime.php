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
