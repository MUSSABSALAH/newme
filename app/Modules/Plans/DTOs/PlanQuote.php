<?php

declare(strict_types=1);

namespace App\Modules\Plans\DTOs;

use App\Modules\Plans\Enums\DurationUnit;
use App\Support\Money\Money;

/**
 * Immutable result of a pricing calculation.
 *
 * All monetary figures are {@see Money} value objects (integer minor units);
 * the server is the single source of truth for every line of the breakdown.
 *
 * `discount` is the plan's duration discount and `couponDiscount` is a redeemed
 * coupon; they are separate lines and both apply before delivery and tax.
 */
final readonly class PlanQuote
{
    /**
     * @param  list<string>  $mealTypes
     * @param  list<int>  $selectedDays
     */
    public function __construct(
        public int $planId,
        public string $planPublicId,
        public int $planVersionId,
        public array $mealTypes,
        public DurationUnit $durationUnit,
        public int $durationLength,
        public int $totalDays,
        public Money $subtotal,
        public string $discountPercent,
        public Money $discount,
        public Money $afterDiscount,
        public ?string $couponCode,
        public Money $couponDiscount,
        public Money $afterCoupon,
        public Money $deliveryFee,
        public string $taxRate,
        public bool $pricesIncludeTax,
        public Money $taxable,
        public Money $tax,
        public Money $total,
        public Money $perDay,
        public bool $requiresDaySelection,
        public int $minDeliveryDaysPerWeek,
        public array $selectedDays,
    ) {}
}
