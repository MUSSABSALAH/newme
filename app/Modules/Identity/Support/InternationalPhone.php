<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

/**
 * Builds and recognises E.164 numbers from a country dial code plus a
 * national number the customer typed without the prefix.
 */
final class InternationalPhone
{
    /**
     * @return non-empty-string|null
     */
    public static function fromParts(string $dial, string $national): ?string
    {
        $dial = preg_replace('/\D/', '', $dial) ?? '';
        $national = preg_replace('/\D/', '', $national) ?? '';

        if (str_starts_with($national, '00')) {
            $national = substr($national, 2);
        }

        if ($dial !== '' && str_starts_with($national, $dial)) {
            $national = substr($national, strlen($dial));
        }

        if (str_starts_with($national, '0')) {
            $national = substr($national, 1);
        }

        if ($dial === '' || $national === '' || strlen($national) < 6 || strlen($national) > 14) {
            return null;
        }

        if (! CountryCallingCodes::isKnown($dial)) {
            return null;
        }

        return '+'.$dial.$national;
    }

    /**
     * @return array{dial: string, national: string}
     */
    public static function split(?string $phone): array
    {
        $digits = preg_replace('/\D/', '', (string) $phone) ?? '';

        if ($digits === '') {
            return ['dial' => CountryCallingCodes::DEFAULT_DIAL, 'national' => ''];
        }

        $dials = CountryCallingCodes::dials();
        usort($dials, static fn (string $a, string $b): int => strlen($b) <=> strlen($a));

        foreach ($dials as $dial) {
            if (str_starts_with($digits, $dial)) {
                return [
                    'dial' => $dial,
                    'national' => substr($digits, strlen($dial)),
                ];
            }
        }

        $saudi = SaudiMobileNumber::e164((string) $phone);

        if ($saudi !== null) {
            return [
                'dial' => CountryCallingCodes::DEFAULT_DIAL,
                'national' => substr($saudi, 4),
            ];
        }

        return ['dial' => CountryCallingCodes::DEFAULT_DIAL, 'national' => $digits];
    }

    public static function e164(string $phone): ?string
    {
        $trimmed = trim($phone);

        if (preg_match('/^\+\d{8,15}$/', $trimmed) === 1) {
            return $trimmed;
        }

        $fromSaudi = SaudiMobileNumber::e164($trimmed);

        return $fromSaudi;
    }

    /**
     * @return list<string>
     */
    public static function lookupValues(string $phone): array
    {
        $e164 = self::e164($phone);
        $parts = self::split($phone);

        if ($e164 === null) {
            $e164 = self::fromParts($parts['dial'], $parts['national']);
        }

        if ($e164 === null) {
            return array_values(array_unique(array_filter([$phone])));
        }

        $digits = substr($e164, 1);
        $parts = self::split($e164);
        $national = $parts['national'];

        return array_values(array_unique(array_filter([
            $e164,
            $digits,
            $national,
            '0'.$national,
            $phone,
        ])));
    }
}
