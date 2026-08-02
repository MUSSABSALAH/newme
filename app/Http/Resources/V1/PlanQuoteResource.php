<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Modules\Plans\DTOs\PlanQuote;
use App\Support\Http\Responses\MoneyPresenter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin PlanQuote
 */
final class PlanQuoteResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quote = $this->resource;

        if (! $quote instanceof PlanQuote) {
            return [];
        }

        return [
            'plan_id' => $quote->planPublicId,
            'plan_version' => $quote->planVersionId,
            'selection' => [
                'meal_types' => $quote->mealTypes,
                'duration_unit' => $quote->durationUnit->value,
                'duration_length' => $quote->durationLength,
                'total_days' => $quote->totalDays,
                'selected_days' => $quote->selectedDays,
                'requires_day_selection' => $quote->requiresDaySelection,
                'min_delivery_days_per_week' => $quote->minDeliveryDaysPerWeek,
            ],
            'breakdown' => [
                'subtotal' => MoneyPresenter::toArray($quote->subtotal),
                'discount_percent' => $quote->discountPercent,
                'discount' => MoneyPresenter::toArray($quote->discount),
                'after_discount' => MoneyPresenter::toArray($quote->afterDiscount),
                'coupon_code' => $quote->couponCode,
                'coupon_discount' => MoneyPresenter::toArray($quote->couponDiscount),
                'after_coupon' => MoneyPresenter::toArray($quote->afterCoupon),
                'delivery_fee' => MoneyPresenter::toArray($quote->deliveryFee),
                'taxable' => MoneyPresenter::toArray($quote->taxable),
                'tax_rate' => $quote->taxRate,
                'prices_include_tax' => $quote->pricesIncludeTax,
                'tax' => MoneyPresenter::toArray($quote->tax),
                'total' => MoneyPresenter::toArray($quote->total),
                'per_day' => MoneyPresenter::toArray($quote->perDay),
            ],
        ];
    }
}
