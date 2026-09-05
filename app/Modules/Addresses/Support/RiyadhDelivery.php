<?php

declare(strict_types=1);

namespace App\Modules\Addresses\Support;

/**
 * Delivery is limited to the city of Riyadh — not the wider region.
 */
final class RiyadhDelivery
{
    public const MIN_LAT = 24.400;

    public const MAX_LAT = 25.080;

    public const MIN_LNG = 46.300;

    public const MAX_LNG = 47.120;

    public const CENTER_LAT = 24.7136;

    public const CENTER_LNG = 46.6753;

    /**
     * @var list<string>
     */
    private const CITY_NAMES = [
        'الرياض',
        'مدينة الرياض',
        'riyadh',
        'ar riyadh',
        'al riyadh',
        'arriyadh',
        'riyadh city',
        'city of riyadh',
        'ar riyad',
        'riyad',
        'امانة الرياض',
        'أمانة الرياض',
        'riyadh municipality',
        'riyadh governorate',
        'محافظة الرياض',
    ];

    /**
     * @var list<string>
     */
    private const STATE_NAMES = [
        'الرياض',
        'منطقة الرياض',
        'riyadh',
        'riyadh region',
        'ar riyadh',
        'al riyadh region',
        'riyadh governorate',
        'محافظة الرياض',
    ];

    /**
     * @var list<string>
     */
    private const OTHER_CITIES = [
        'جدة', 'jeddah', 'jiddah', 'jaddah',
        'الدمام', 'dammam',
        'الخبر', 'khobar', 'al khobar',
        'مكة', 'مكة المكرمة', 'makkah', 'mecca',
        'المدينة', 'المدينة المنورة', 'madinah', 'medina',
        'الخرج', 'al kharj', 'alkharj',
        'الطائف', 'taif', 'at taif',
        'بريدة', 'buraidah', 'buraydah',
        'أبها', 'abha',
        'تبوك', 'tabuk',
        'حائل', 'hail',
        'الجبيل', 'jubail',
        'ينبع', 'yanbu',
        'نجران', 'najran',
        'جازان', 'jazan', 'jizan',
    ];

    public static function isRiyadhCity(?string $name): bool
    {
        $normalized = self::normalize($name);

        return $normalized !== '' && in_array($normalized, self::CITY_NAMES, true);
    }

    public static function isRiyadhState(?string $name): bool
    {
        $normalized = self::normalize($name);

        return $normalized !== '' && in_array($normalized, self::STATE_NAMES, true);
    }

    public static function looksLikeRiyadh(?string $name): bool
    {
        if (self::isRiyadhCity($name)) {
            return true;
        }

        $normalized = self::normalize($name);

        return $normalized !== ''
            && (str_contains($normalized, 'الرياض') || str_contains($normalized, 'riyadh') || str_contains($normalized, 'riyad'));
    }

    public static function isOtherCity(?string $name): bool
    {
        $normalized = self::normalize($name);

        return $normalized !== '' && in_array($normalized, self::OTHER_CITIES, true);
    }

    public static function inCityBounds(float $lat, float $lng): bool
    {
        return $lat >= self::MIN_LAT
            && $lat <= self::MAX_LAT
            && $lng >= self::MIN_LNG
            && $lng <= self::MAX_LNG;
    }

    public static function cityLabel(): string
    {
        return app()->getLocale() === 'ar' ? 'الرياض' : 'Riyadh';
    }

    public static function normalize(?string $name): string
    {
        $name = trim((string) $name);
        $name = preg_replace('/\s+/u', ' ', $name) ?? $name;
        $name = preg_replace('/[\x{064B}-\x{065F}\x{0670}]/u', '', $name) ?? $name;

        return mb_strtolower($name);
    }
}
