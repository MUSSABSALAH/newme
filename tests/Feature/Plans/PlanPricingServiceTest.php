<?php

declare(strict_types=1);

namespace Tests\Feature\Plans;

use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Exceptions\InvalidDeliveryDaysException;
use App\Modules\Plans\Exceptions\PlanNotAvailableException;
use App\Modules\Plans\Exceptions\PricingRuleNotFoundException;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanPricingService;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PlanPricingServiceTest extends TestCase
{
    use RefreshDatabase;

    private function publishedPlan(array $planOverrides = [], array $ruleOverrides = []): Plan
    {
        $plan = Plan::factory()->create(array_merge([
            'requires_day_selection' => false,
            'delivery_fee' => 0,
        ], $planOverrides));

        $version = PlanVersion::factory()->published()->create([
            'plan_id' => $plan->id,
            'version_number' => 1,
        ]);

        PlanPricingRule::factory()->create(array_merge([
            'plan_version_id' => $version->id,
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'meal_types_key' => MealType::key([MealType::Breakfast->value, MealType::Lunch->value]),
            'duration_unit' => 'week',
            'duration_length' => 4,
            'price' => 40000,
            'discount_percent' => '10.00',
        ], $ruleOverrides));

        return $plan->refresh();
    }

    private function service(): PlanPricingService
    {
        return app(PlanPricingService::class);
    }

    private function request(array $overrides = []): PlanQuoteRequestData
    {
        return PlanQuoteRequestData::fromArray(array_merge([
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'selected_days' => [],
        ], $overrides));
    }

    public function test_quote_computes_tax_exclusive_breakdown(): void
    {
        $plan = $this->publishedPlan();

        $quote = $this->service()->quote($plan, $this->request());

        $this->assertSame(40000, $quote->subtotal->toMinor());
        $this->assertSame(4000, $quote->discount->toMinor());
        $this->assertSame(36000, $quote->afterDiscount->toMinor());
        $this->assertSame(5400, $quote->tax->toMinor());
        $this->assertSame(41400, $quote->total->toMinor());
        $this->assertSame(28, $quote->totalDays);
        $this->assertSame(1286, $quote->perDay->toMinor());
    }

    public function test_quote_includes_delivery_fee(): void
    {
        $plan = $this->publishedPlan(['delivery_fee' => 1500]);

        $quote = $this->service()->quote($plan, $this->request());

        // (36000 + 1500) taxable, +15% tax.
        $this->assertSame(37500, $quote->taxable->toMinor());
        $this->assertSame(5625, $quote->tax->toMinor());
        $this->assertSame(43125, $quote->total->toMinor());
    }

    public function test_quote_supports_tax_inclusive_pricing(): void
    {
        app(SettingsService::class)->update(['finance.prices_include_tax' => true]);

        $plan = $this->publishedPlan();

        $quote = $this->service()->quote($plan, $this->request());

        $this->assertSame(36000, $quote->total->toMinor());
        $this->assertSame(
            $quote->total->toMinor(),
            $quote->taxable->toMinor() + $quote->tax->toMinor(),
        );
    }

    public function test_quote_enforces_minimum_delivery_days(): void
    {
        $plan = $this->publishedPlan(['requires_day_selection' => true, 'min_delivery_days_per_week' => 5]);

        $this->expectException(InvalidDeliveryDaysException::class);

        $this->service()->quote($plan, $this->request(['selected_days' => [0, 1, 2]]));
    }

    public function test_quote_accepts_enough_delivery_days(): void
    {
        $plan = $this->publishedPlan(['requires_day_selection' => true, 'min_delivery_days_per_week' => 5]);

        $quote = $this->service()->quote($plan, $this->request(['selected_days' => [0, 1, 2, 3, 4]]));

        $this->assertSame([0, 1, 2, 3, 4], $quote->selectedDays);
    }

    public function test_quote_throws_when_no_matching_rule(): void
    {
        $plan = $this->publishedPlan();

        $this->expectException(PricingRuleNotFoundException::class);

        $this->service()->quote($plan, $this->request(['meal_types' => [MealType::Dinner->value]]));
    }

    public function test_quote_throws_for_unpublished_plan(): void
    {
        $plan = Plan::factory()->create();
        PlanVersion::factory()->create(['plan_id' => $plan->id, 'version_number' => 1]);

        $this->expectException(PlanNotAvailableException::class);

        $this->service()->quote($plan->refresh(), $this->request());
    }
}
