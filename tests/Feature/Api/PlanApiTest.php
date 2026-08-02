<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Promotions\Models\Coupon;
use App\Support\Enums\ApiErrorCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PlanApiTest extends TestCase
{
    use RefreshDatabase;

    private function publishedPlan(array $planOverrides = []): Plan
    {
        $plan = Plan::factory()->create(array_merge([
            'requires_day_selection' => false,
        ], $planOverrides));

        $version = PlanVersion::factory()->published()->create([
            'plan_id' => $plan->id,
            'version_number' => 1,
        ]);

        PlanPricingRule::factory()->create([
            'plan_version_id' => $version->id,
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'meal_types_key' => MealType::key([MealType::Breakfast->value, MealType::Lunch->value]),
            'duration_unit' => 'week',
            'duration_length' => 4,
            'price' => 40000,
            'discount_percent' => '10.00',
        ]);

        return $plan->refresh();
    }

    public function test_index_returns_only_active_published_plans(): void
    {
        $published = $this->publishedPlan();

        // Inactive plan (with published version) is excluded.
        $this->publishedPlan(['is_active' => false]);

        // Draft-only plan is excluded.
        $draftPlan = Plan::factory()->create();
        PlanVersion::factory()->create(['plan_id' => $draftPlan->id, 'version_number' => 1]);

        $response = $this->getJson('/api/v1/plans');

        $response->assertOk()
            ->assertJsonStructure(['data' => [['id', 'goal', 'name', 'meals', 'pricing']], 'meta' => ['request_id']]);

        $this->assertCount(1, $response->json('data'));
        $this->assertSame($published->public_id, $response->json('data.0.id'));
    }

    public function test_show_returns_plan_pricing(): void
    {
        $plan = $this->publishedPlan();

        $this->getJson('/api/v1/plans/'.$plan->public_id)
            ->assertOk()
            ->assertJsonPath('data.id', $plan->public_id)
            ->assertJsonPath('data.pricing.0.meal_types', [MealType::Breakfast->value, MealType::Lunch->value]);
    }

    public function test_show_returns_404_for_unpublished_plan(): void
    {
        $plan = Plan::factory()->create();
        PlanVersion::factory()->create(['plan_id' => $plan->id, 'version_number' => 1]);

        $this->getJson('/api/v1/plans/'.$plan->public_id)
            ->assertStatus(404)
            ->assertJsonPath('error.code', ApiErrorCode::NOT_FOUND->value);
    }

    public function test_quote_returns_full_breakdown(): void
    {
        $plan = $this->publishedPlan();

        $this->postJson('/api/v1/plans/'.$plan->public_id.'/quote', [
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
        ])
            ->assertOk()
            ->assertJsonPath('data.breakdown.subtotal.minor', 40000)
            ->assertJsonPath('data.breakdown.total.minor', 41400)
            ->assertJsonPath('data.selection.total_days', 28);
    }

    public function test_quote_applies_a_coupon_code(): void
    {
        $plan = $this->publishedPlan();
        Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->postJson('/api/v1/plans/'.$plan->public_id.'/quote', [
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'coupon_code' => 'save10',
        ])
            ->assertOk()
            ->assertJsonPath('data.breakdown.coupon_code', 'SAVE10')
            ->assertJsonPath('data.breakdown.coupon_discount.minor', 3600)
            ->assertJsonPath('data.breakdown.after_coupon.minor', 32400)
            ->assertJsonPath('data.breakdown.total.minor', 37260);
    }

    public function test_quote_reports_no_coupon_for_an_unusable_code(): void
    {
        $plan = $this->publishedPlan();
        Coupon::factory()->code('GONE')->expired()->create();

        $this->postJson('/api/v1/plans/'.$plan->public_id.'/quote', [
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'coupon_code' => 'GONE',
        ])
            ->assertOk()
            ->assertJsonPath('data.breakdown.coupon_code', null)
            ->assertJsonPath('data.breakdown.coupon_discount.minor', 0)
            ->assertJsonPath('data.breakdown.total.minor', 41400);
    }

    public function test_quote_validation_error_returns_envelope(): void
    {
        $plan = $this->publishedPlan();

        $this->postJson('/api/v1/plans/'.$plan->public_id.'/quote', [])
            ->assertStatus(422)
            ->assertJsonPath('error.code', ApiErrorCode::VALIDATION_FAILED->value);
    }

    public function test_quote_enforces_delivery_days(): void
    {
        $plan = $this->publishedPlan([
            'requires_day_selection' => true,
            'min_delivery_days_per_week' => 5,
        ]);

        $this->postJson('/api/v1/plans/'.$plan->public_id.'/quote', [
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'selected_days' => [0, 1, 2],
        ])
            ->assertStatus(422)
            ->assertJsonPath('error.code', ApiErrorCode::VALIDATION_FAILED->value);
    }
}
