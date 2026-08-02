<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Enums;

use App\Support\Money\Money;

/**
 * Why a submitted coupon code could not be applied.
 *
 * `NotFound` deliberately covers both a missing code and a deactivated one so
 * the customer-facing message never confirms that a code exists.
 */
enum CouponRejection: string
{
    case NotFound = 'not_found';
    case NotStarted = 'not_started';
    case Expired = 'expired';
    case Exhausted = 'exhausted';
    case AlreadyUsed = 'already_used';
    case BelowMinimum = 'below_minimum';
    case ScopeMismatch = 'scope_mismatch';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $reason): string => $reason->value, self::cases());
    }

    public function message(?Money $minimum = null): string
    {
        if ($this === self::BelowMinimum && $minimum instanceof Money) {
            return (string) __('coupons.rejections.below_minimum', [
                'amount' => $minimum->format(),
            ]);
        }

        return (string) __('coupons.rejections.'.$this->value);
    }
}
