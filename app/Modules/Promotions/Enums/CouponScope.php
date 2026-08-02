<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Enums;

/**
 * Where a coupon may be redeemed.
 *
 * `All` matches both channels; the other cases restrict a code to a single one.
 */
enum CouponScope: string
{
    case Store = 'store';
    case Subscriptions = 'subscriptions';
    case All = 'all';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $scope): string => $scope->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('coupons.scopes.'.$this->value);
    }

    /**
     * Whether a coupon carrying this scope can be used in the given channel.
     */
    public function covers(self $channel): bool
    {
        return $this === self::All || $this === $channel;
    }
}
