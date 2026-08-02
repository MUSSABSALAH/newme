<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Checkout;

use App\Models\User;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\SubscriptionStartRules;
use App\Support\Time\DisplayTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class SubscriptionCheckoutTest extends TestCase
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
     * @return array<string, mixed>
     */
    private function draft(Plan $plan): array
    {
        return [
            'plan_public_id' => $plan->public_id,
            'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'mode' => 'flex',
        ];
    }

    public function test_a_guest_leaving_the_wizard_is_sent_to_sign_in_with_the_draft_kept(): void
    {
        $plan = $this->publishedPlan();

        $this->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk()
            ->assertJson(['redirect' => route('website.login', ['next' => 'checkout'])]);

        $this->assertSame($plan->public_id, session('checkout_subscription_draft.plan_public_id'));
    }

    public function test_the_subscribe_page_exposes_the_configured_earliest_start_date(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.subscription_min_start_days' => 3]);
        $this->publishedPlan();

        $this->get(route('website.subscribe'))
            ->assertOk()
            ->assertSee('min_start_date', false)
            ->assertSee('2026-08-05', false);

        Carbon::setTestNow();
    }

    public function test_a_start_date_before_the_configured_minimum_is_rejected(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.subscription_min_start_days' => 2]);

        $plan = $this->publishedPlan();

        $this->postJson(route('website.checkout.subscription'), [
            ...$this->draft($plan),
            'start_date' => '2026-08-03',
        ])
            ->assertUnprocessable()
            ->assertJsonPath('error.code', 'VALIDATION_FAILED')
            ->assertJsonStructure(['error' => ['details' => ['start_date']]]);

        Carbon::setTestNow();
    }

    public function test_a_start_date_on_or_after_the_configured_minimum_is_accepted(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.subscription_min_start_days' => 2]);

        $plan = $this->publishedPlan();
        $earliest = SubscriptionStartRules::earliestDateString();

        $this->postJson(route('website.checkout.subscription'), [
            ...$this->draft($plan),
            'start_date' => $earliest,
        ])->assertOk();

        $this->assertSame($earliest, session('checkout_subscription_draft.start_date'));

        Carbon::setTestNow();
    }

    public function test_a_signed_in_customer_goes_straight_to_checkout(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk()
            ->assertJson(['redirect' => route('website.checkout')]);
    }

    public function test_a_guest_who_signs_in_lands_on_the_checkout_with_the_plan_intact(): void
    {
        $plan = $this->publishedPlan();
        User::factory()->customer()->create(['email' => 'sara@example.com']);

        $this->postJson(route('website.checkout.subscription'), $this->draft($plan))->assertOk();

        $this->get(route('website.login', ['next' => 'checkout']))->assertOk();

        $this->post(route('website.login'), [
            'email' => 'sara@example.com',
            'password' => 'password',
        ])->assertRedirect(route('website.checkout'));

        $this->get(route('website.checkout'))
            ->assertOk()
            ->assertSee($plan->label())
            ->assertSee(__('checkout.summary.total'));
    }

    public function test_the_checkout_prices_the_subscription_server_side(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        // 400.00 less the 10% plan discount, plus 15% VAT.
        $this->actingAs($customer)
            ->get(route('website.checkout'))
            ->assertOk()
            ->assertSee('414.00');
    }

    public function test_placing_a_subscription_charges_it_and_activates_it(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        $this->placeOrder($customer, $address)->assertRedirect();

        $subscription = Subscription::query()->firstOrFail();

        $this->assertSame(41400, $subscription->total_minor);
        $this->assertSame(SubscriptionStatus::Active, $subscription->status);
        $this->assertSame(PaymentStatus::Paid, $subscription->payment_status);
        $this->assertSame(PaymentMethod::Visa, $subscription->payment_method);
        $this->assertSame($address->id, $subscription->address_id);
        $this->assertSame($address->city, $subscription->deliveryAddress()?->city);

        $payment = Payment::query()->firstOrFail();

        $this->assertSame(Subscription::class, $payment->payable_type);
        $this->assertSame(41400, $payment->amount_minor);
        $this->assertSame(PaymentStatus::Paid, $payment->status);

        // The draft is spent, so a refresh cannot subscribe twice.
        $this->assertNull(session('checkout_subscription_draft'));
    }

    public function test_the_daily_dish_picks_are_kept_on_the_subscription(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);
        $schedule = [
            [
                'date' => now()->addDays(3)->toDateString(),
                'meals' => [
                    MealType::Breakfast->value => 'Oatmeal bowl',
                    MealType::Lunch->value => '',
                ],
            ],
            [
                'date' => now()->addDays(4)->toDateString(),
                'meals' => [
                    MealType::Breakfast->value => 'Shakshuka',
                    MealType::Lunch->value => 'Grilled chicken',
                ],
            ],
        ];

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), [
                ...$this->draft($plan),
                'meal_schedule' => $schedule,
            ])
            ->assertOk();

        $this->placeOrder($customer, $address)->assertRedirect();

        $subscription = Subscription::query()->firstOrFail();

        $this->assertTrue($subscription->hasMealSchedule());
        $this->assertSame('Oatmeal bowl', $subscription->meal_schedule[0]['meals']['breakfast']);
        $this->assertNull($subscription->meal_schedule[0]['meals']['lunch']);
        $this->assertSame('Grilled chicken', $subscription->meal_schedule[1]['meals']['lunch']);
    }

    public function test_a_declined_card_leaves_no_subscription_and_keeps_the_draft(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        $this->placeOrder($customer, $address, ['card_number' => self::DECLINED_CARD])
            ->assertRedirect()
            ->assertSessionHas('error', __('payments.declines.card_declined'));

        $this->assertDatabaseCount('subscriptions', 0);
        $this->assertDatabaseCount('payments', 0);
        $this->assertSame($plan->public_id, session('checkout_subscription_draft.plan_public_id'));
    }

    public function test_the_subscription_draft_takes_priority_over_the_cart(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();

        $this->actingAs($customer)
            ->withSession(['store_cart' => [1 => 2]])
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        $this->actingAs($customer)
            ->get(route('website.checkout'))
            ->assertOk()
            ->assertSee(__('checkout.sources.subscription'));
    }

    public function test_abandoning_the_draft_returns_to_the_wizard(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        $this->actingAs($customer)
            ->delete(route('website.checkout.subscription.destroy'))
            ->assertRedirect(route('website.subscribe'));

        $this->assertNull(session('checkout_subscription_draft'));
    }

    public function test_the_subscription_page_shows_the_address_and_the_payment(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), $this->draft($plan))
            ->assertOk();

        $this->placeOrder($customer, $address)->assertRedirect();

        $subscription = Subscription::query()->firstOrFail();

        $this->actingAs($customer)
            ->get(route('website.account.subscription', ['subscription' => $subscription->public_id]))
            ->assertOk()
            ->assertSee(__('account.delivery.address'))
            ->assertSee($address->city)
            ->assertSee(PaymentMethod::Visa->label());
    }
}
