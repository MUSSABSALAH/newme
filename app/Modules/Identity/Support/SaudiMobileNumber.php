<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

/**
 * Turns the mobile numbers customers actually type into the E.164 form every
 * SMS provider expects.
 *
 * Customers enter 0501234567, 501234567, +966 50 123 4567 and 00966501234567
 * interchangeably. A provider will reject most of those, and a rejected OTP
 * reads to the customer as "login is broken", so the number is normalised at
 * the one point every message passes through.
 */
final class SaudiMobileNumber
{
    private const COUNTRY_CODE = '966';

    /**
     * The number as +966XXXXXXXXX, or null when it cannot be one.
     *
     * Returns null rather than guessing: sending to a wrong number is worse
     * than not sending, and the caller can log the reason.
     */
    public static function e164(string $phone): ?string
    {
        $digits = preg_replace('/\D/', '', $phone) ?? '';

        // 00966… is the international prefix typed the old way.
        if (str_starts_with($digits, '00'.self::COUNTRY_CODE)) {
            $digits = substr($digits, 2);
        }

        if (str_starts_with($digits, self::COUNTRY_CODE)) {
            $national = substr($digits, strlen(self::COUNTRY_CODE));
        } elseif (str_starts_with($digits, '0')) {
            $national = substr($digits, 1);
        } else {
            $national = $digits;
        }

        // Saudi mobile numbers are nine digits and always start with 5.
        if (strlen($national) !== 9 || ! str_starts_with($national, '5')) {
            return null;
        }

        return '+'.self::COUNTRY_CODE.$national;
    }
}
