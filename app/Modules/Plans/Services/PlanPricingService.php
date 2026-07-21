<?php

declare(strict_types=1);

namespace App\Modules\Plans\Services;

use App\Modules\Plans\DTOs\PlanQuote;
use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Exceptions\InvalidDeliveryDaysException;
use App\Modules\Plans\Exceptions\PlanNotAvailableException;
use App\Modules\Plans\Exceptions\PricingRuleNotFoundException;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;

/**
 * The single source of truth for plan pricing.
 *
 * Clients submit only their choices (meal types + duration); every monetary
 * figure is computed here from the plan's published pricing version and the
 * platform finance settings, using integer minor units throughout.
 */
final class PlanPricingService
{
    public function __construct(private readonly SettingsService $settings) {}

    /**
     * @throws PlanNotAvailableException
     * @throws PricingRuleNotFoundException
     * @throws InvalidDeliveryDaysException
     */
    public function quote(Plan $plan, PlanQuoteRequestData $data): PlanQuote
    {
        if (! $plan->is_active) {
            throw new PlanNotAvailableException;
        }

        $version = $plan->publishedVersion();

        if (! $version instanceof PlanVersion) {
            throw new PlanNotAvailableException;
        }

        $rule = $this->findRule($version, $data);

        $selectedDays = $this->validatedDays($plan, $data);

        return $this->build($plan, $version, $rule, $selectedDays);
    }

    /**
     * Distinct meal-type combinations offered by a version, in order.
     *
     * @return list<array{key: string, meal_types: list<string>}>
     */
    public function mealTypeOptions(PlanVersion $version): array
    {
        $options = [];

        foreach ($version->pricingRules()->where('is_active', true)->get() as $rule) {
            $options[$rule->meal_types_key] ??= [
                'key' => $rule->meal_types_key,
                'meal_types' => $rule->meal_types,
            ];
        }

        return array_values($options);
    }

    /**
     * Active pricing rules grouped by meal-type combination key.
     *
     * @return array<string, list<PlanPricingRule>>
     */
    public function matrix(PlanVersion $version): array
    {
        $matrix = [];

        foreach ($version->pricingRules()->where('is_active', true)->get() as $rule) {
            $matrix[$rule->meal_types_key][] = $rule;
        }

        return $matrix;
    }

    private function findRule(PlanVersion $version, PlanQuoteRequestData $data): PlanPricingRule
    {
        $rule = $version->pricingRules()
            ->where('is_active', true)
            ->where('meal_types_key', $data->mealTypesKey())
            ->where('duration_unit', $data->durationUnit->value)
            ->where('duration_length', $data->durationLength)
            ->first();

        if (! $rule instanceof PlanPricingRule) {
            throw new PricingRuleNotFoundException;
        }

        return $rule;
    }

    /**
     * @return list<int>
     */
    private function validatedDays(Plan $plan, PlanQuoteRequestData $data): array
    {
        $days = array_values(array_filter(
            $data->selectedDays,
            static fn (int $day): bool => $day >= 0 && $day <= 6,
        ));

        if ($plan->requires_day_selection && count($days) < $plan->min_delivery_days_per_week) {
            throw new InvalidDeliveryDaysException($plan->min_delivery_days_per_week);
        }

        return $days;
    }

    /**
     * @param  list<int>  $selectedDays
     */
    private function build(
        Plan $plan,
        PlanVersion $version,
        PlanPricingRule $rule,
        array $selectedDays,
    ): PlanQuote {
        $subtotal = $rule->priceMoney();
        $discount = $subtotal->percentage($rule->discountBasisPoints());
        $afterDiscount = $subtotal->subtract($discount);
        $deliveryFee = Money::fromMinor($plan->delivery_fee);

        $taxRate = $this->taxRate();
        $taxBasisPoints = (int) round($taxRate * 100);
        $pricesIncludeTax = (bool) $this->settings->get('finance.prices_include_tax');

        $gross = $afterDiscount->add($deliveryFee);

        if ($pricesIncludeTax) {
            $taxable = $gross->multiply(10000, 10000 + $taxBasisPoints);
            $tax = $gross->subtract($taxable);
            $total = $gross;
        } else {
            $taxable = $gross;
            $tax = $taxable->percentage($taxBasisPoints);
            $total = $taxable->add($tax);
        }

        $totalDays = max(1, $rule->totalDays());
        $perDay = $afterDiscount->multiply(1, $totalDays);

        return new PlanQuote(
            planId: $plan->id,
            planPublicId: $plan->public_id,
            planVersionId: $version->id,
            mealTypes: $rule->meal_types,
            durationUnit: $rule->duration_unit,
            durationLength: $rule->duration_length,
            totalDays: $totalDays,
            subtotal: $subtotal,
            discountPercent: (string) $rule->discount_percent,
            discount: $discount,
            afterDiscount: $afterDiscount,
            deliveryFee: $deliveryFee,
            taxRate: number_format($taxRate, 2, '.', ''),
            pricesIncludeTax: $pricesIncludeTax,
            taxable: $taxable,
            tax: $tax,
            total: $total,
            perDay: $perDay,
            requiresDaySelection: $plan->requires_day_selection,
            minDeliveryDaysPerWeek: $plan->min_delivery_days_per_week,
            selectedDays: $selectedDays,
        );
    }

    private function taxRate(): float
    {
        $rate = $this->settings->get('finance.tax_rate');

        return is_numeric($rate) ? (float) $rate : 0.0;
    }
}
