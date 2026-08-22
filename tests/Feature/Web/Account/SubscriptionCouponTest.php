<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class SubscriptionCouponTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function publishedPlan(): Plan
    {
        $plan = Plan::factory()->create([
            'requires_day_selection' => false,
            'delivery_fee' => 0,
        ]);

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

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function payload(Plan $plan, array $overrides = []): array
    {
        return array_merge([
            'plan_public_id' => $plan->public_id,
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'health' => ['birth_date' => now()->subYears(32)->toDateString()],
        ], $overrides);
    }

    /**
     * Park a wizard selection then pay for it, the way the site does.
     *
     * @param  array<string, mixed>  $overrides
     */
    private function subscribe(User $customer, Plan $plan, array $overrides = []): void
    {
        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->payload($plan, $overrides))
            ->assertOk();

        $this->placeOrder($customer)->assertRedirect();
    }

    public function test_a_subscription_stores_the_coupon_discount_and_records_the_redemption(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $coupon = Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->subscribe($customer, $plan, ['coupon_code' => 'save10']);

        $subscription = Subscription::query()->firstOrFail();

        $this->assertSame(40000, $subscription->subtotal_minor);
        $this->assertSame(4000, $subscription->discount_minor);
        $this->assertSame(3600, $subscription->coupon_discount_minor);
        $this->assertSame(37260, $subscription->total_minor);
        $this->assertSame('SAVE10', $subscription->coupon_code);
        $this->assertSame($coupon->id, $subscription->coupon_id);

        $this->assertDatabaseHas('coupon_redemptions', [
            'coupon_id' => $coupon->id,
            'user_id' => $customer->id,
            'redeemable_type' => Subscription::class,
            'redeemable_id' => $subscription->id,
            'discount_minor' => 3600,
        ]);

        $this->assertSame(1, $coupon->refresh()->redemptions_count);
    }

    public function test_the_subscribe_wizard_renders_the_coupon_field(): void
    {
        $this->publishedPlan();

        $this->get(route('website.subscribe'))
            ->assertOk()
            ->assertSee('couponInput', false)
            ->assertSee(__('website.subscribe.sum_coupon'));
    }

    public function test_a_store_only_code_is_ignored_on_a_subscription(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        Coupon::factory()->code('STOREONLY')->scope(CouponScope::Store)->create();

        $this->subscribe($customer, $plan, ['coupon_code' => 'STOREONLY']);

        $subscription = Subscription::query()->firstOrFail();

        $this->assertSame(0, $subscription->coupon_discount_minor);
        $this->assertNull($subscription->coupon_code);
        $this->assertSame(41400, $subscription->total_minor);
        $this->assertDatabaseCount('coupon_redemptions', 0);
    }

    public function test_a_customer_cannot_reuse_a_single_use_code(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        Coupon::factory()->code('ONCE')->percentage(10)->create([
            'max_redemptions_per_user' => 1,
        ]);

        $this->subscribe($customer, $plan, ['coupon_code' => 'ONCE']);
        $this->subscribe($customer, $plan, ['coupon_code' => 'ONCE']);

        $second = Subscription::query()->orderByDesc('id')->firstOrFail();

        $this->assertSame(0, $second->coupon_discount_minor);
        $this->assertSame(41400, $second->total_minor);
        $this->assertDatabaseCount('coupon_redemptions', 1);
    }

    public function test_the_subscription_detail_page_shows_the_coupon_line(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->subscribe($customer, $plan, ['coupon_code' => 'SAVE10']);

        $subscription = Subscription::query()->firstOrFail();

        $this->actingAs($customer)
            ->get(route('website.account.subscription', ['subscription' => $subscription->public_id]))
            ->assertOk()
            ->assertSee('SAVE10');
    }
}
