<?php

declare(strict_types=1);

namespace App\Modules\Promotions\DTOs;

use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Models\Coupon;
use App\Support\Dto\Data;
use App\Support\Money\Money;
use App\Support\Time\DisplayTime;
use Illuminate\Support\Carbon;

final class CouponData extends Data
{
    /**
     * @param  array<string, string>  $name  Locale-keyed campaign names.
     */
    public function __construct(
        public readonly string $code,
        public readonly array $name,
        public readonly CouponType $type,
        public readonly CouponScope $scope,
        public readonly ?string $percentOff,
        public readonly ?int $amountOffMinor,
        public readonly int $minSubtotalMinor,
        public readonly ?int $maxDiscountMinor,
        public readonly ?int $maxRedemptions,
        public readonly ?int $maxRedemptionsPerUser,
        public readonly ?Carbon $startsAt,
        public readonly ?Carbon $expiresAt,
        public readonly bool $isActive,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $type = self::type($attributes['type'] ?? null);

        // Only the column matching the chosen type is kept, so switching a
        // coupon's type never leaves a stale amount behind.
        $percentage = $type === CouponType::Percentage;

        return new self(
            code: Coupon::normalizeCode((string) ($attributes['code'] ?? '')),
            name: self::localeStrings($attributes['name'] ?? []),
            type: $type,
            scope: self::scope($attributes['scope'] ?? null),
            percentOff: $percentage ? self::decimal($attributes['percent_off'] ?? null) : null,
            amountOffMinor: $percentage ? null : self::toMinor($attributes['amount_off'] ?? null),
            minSubtotalMinor: self::toMinor($attributes['min_subtotal'] ?? null) ?? 0,
            maxDiscountMinor: $percentage ? self::toMinor($attributes['max_discount'] ?? null) : null,
            maxRedemptions: self::nullableInt($attributes['max_redemptions'] ?? null),
            maxRedemptionsPerUser: self::nullableInt($attributes['max_redemptions_per_user'] ?? null),
            startsAt: self::date($attributes['starts_at'] ?? null),
            expiresAt: self::date($attributes['expires_at'] ?? null),
            isActive: (bool) ($attributes['is_active'] ?? false),
        );
    }

    /**
     * @param  mixed  $value
     */
    private static function type($value): CouponType
    {
        if ($value instanceof CouponType) {
            return $value;
        }

        return CouponType::tryFrom((string) $value) ?? CouponType::Percentage;
    }

    /**
     * @param  mixed  $value
     */
    private static function scope($value): CouponScope
    {
        if ($value instanceof CouponScope) {
            return $value;
        }

        return CouponScope::tryFrom((string) $value) ?? CouponScope::All;
    }

    /**
     * @param  mixed  $value
     * @return array<string, string>
     */
    private static function localeStrings($value): array
    {
        return array_filter(
            is_array($value) ? $value : [],
            static fn ($item): bool => is_string($item) && trim($item) !== '',
        );
    }

    /**
     * @param  mixed  $value
     */
    private static function toMinor($value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_int($value)) {
            return max(0, $value);
        }

        return max(0, Money::fromMajor((string) $value)->toMinor());
    }

    /**
     * @param  mixed  $value
     */
    private static function decimal($value): ?string
    {
        return $value === null || $value === '' ? null : (string) $value;
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableInt($value): ?int
    {
        return $value === null || $value === '' ? null : max(0, (int) $value);
    }

    /**
     * @param  mixed  $value
     */
    private static function date($value): ?Carbon
    {
        if ($value instanceof Carbon) {
            return $value->copy()->utc();
        }

        if ($value === null || $value === '') {
            return null;
        }

        return DisplayTime::parse((string) $value);
    }
}
