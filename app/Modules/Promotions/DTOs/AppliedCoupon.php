<?php

declare(strict_types=1);

namespace App\Modules\Promotions\DTOs;

use App\Modules\Promotions\Models\Coupon;
use App\Support\Money\Money;

/**
 * A validated coupon together with the discount it produces for one basket.
 *
 * The discount is always recomputed by the server; it is never accepted from a
 * client and never cached across requests.
 */
final readonly class AppliedCoupon
{
    public function __construct(
        public Coupon $coupon,
        public Money $discount,
    ) {}

    public function code(): string
    {
        return $this->coupon->code;
    }
}
