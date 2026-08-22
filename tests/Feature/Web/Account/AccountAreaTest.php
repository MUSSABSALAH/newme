<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Models\Order;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\MealChangeRules;
use App\Modules\Subscriptions\Support\SubscriptionPauseRules;
use App\Support\Time\DisplayTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

final class AccountAreaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_customer_can_update_their_profile(): void
    {
        $customer = User::factory()->customer()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
            'phone' => '0500000000',
            'password' => Hash::make('password'),
        ]);

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => 'New Name',
                'email' => 'new@example.com',
                'phone' => '0511111111',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'profile']))
            ->assertSessionHas('success');

        $customer->refresh();

        $this->assertSame('New Name', $customer->name);
        $this->assertSame('new@example.com', $customer->email);
        $this->assertSame('0511111111', $customer->phone);
    }

    public function test_customer_can_update_their_health_details(): void
    {
        $customer = User::factory()->customer()->create(['medications' => 'Insulin']);
        $birthDate = now()->subYears(29)->toDateString();

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => '0511111111',
                'birth_date' => $birthDate,
                'allergies' => ' Shellfish ',
                'medications' => '',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'profile']));

        $customer->refresh();

        $this->assertSame($birthDate, $customer->birth_date?->toDateString());
        $this->assertSame('Shellfish', $customer->allergies);
        $this->assertNull($customer->medications);
    }

    public function test_an_impossible_date_of_birth_is_rejected(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => '0511111111',
                'birth_date' => now()->addYear()->toDateString(),
            ])
            ->assertSessionHasErrors('birth_date');
    }

    public function test_customer_can_manage_addresses(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->post(route('website.account.addresses.store'), [
                'label' => 'Home',
                'recipient_name' => 'Sara',
                'phone' => '0501234567',
                'city' => 'Riyadh',
                'district' => 'Olaya',
                'street' => 'King Fahd Rd',
                'national_address' => 'RRRD2929',
                'details' => null,
                'is_default' => '1',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'addresses']));

        $address = Address::query()->firstOrFail();
        $this->assertSame($customer->id, $address->user_id);
        $this->assertTrue($address->is_default);
        $this->assertSame('RRRD2929', $address->national_address);

        $this->actingAs($customer)
            ->put(route('website.account.addresses.update', $address), [
                'label' => 'Work',
                'recipient_name' => 'Sara',
                'phone' => '0501234567',
                'city' => 'Jeddah',
                'district' => 'Rawdah',
                'street' => 'Street 1',
                'national_address' => 'JEDD1234',
                'details' => 'Apt 4',
                'is_default' => '1',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'addresses']));

        $this->assertSame('Work', $address->refresh()->label);
        $this->assertSame('Jeddah', $address->city);
        $this->assertSame('JEDD1234', $address->national_address);
    }

    public function test_account_hub_lists_orders_subscriptions_and_addresses(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'Omar']);
        Address::factory()->for($customer)->create(['label' => 'Home']);
        $order = Order::factory()->for($customer)->create();
        Subscription::factory()->for($customer)->create(['plan_name' => 'Balance']);

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'orders']))
            ->assertOk()
            ->assertSee(__('account.tabs.profile'))
            ->assertSee(__('account.order.ref'))
            ->assertSee($order->reference());

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'subscriptions']))
            ->assertOk()
            ->assertSee('Balance');

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'addresses']))
            ->assertOk()
            ->assertSee('Home');
    }

    public function test_account_hub_lists_consultations_for_customer_email(): void
    {
        $customer = User::factory()->customer()->create([
            'email' => 'sara@example.com',
        ]);

        $mine = \App\Modules\Consultations\Models\Consultation::factory()->create([
            'customer_email' => 'sara@example.com',
            'customer_name' => 'سارة',
            'goal' => 'خسارة الوزن',
        ]);

        \App\Modules\Consultations\Models\Consultation::factory()->create([
            'customer_email' => 'other@example.com',
            'customer_name' => 'Other',
        ]);

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'consultations']))
            ->assertOk()
            ->assertSee(__('account.tabs.consultations'))
            ->assertSee($mine->reference())
            ->assertSee('خسارة الوزن')
            ->assertDontSee('Other');
    }

    public function test_order_page_shows_invoice_download_when_present(): void
    {
        $customer = User::factory()->customer()->create();
        $order = Order::factory()->for($customer)->create();
        $invoice = Invoice::factory()->for($customer)->payable($order)->create([
            'number' => 'INV-2026-000042',
        ]);

        $this->actingAs($customer)
            ->get(route('website.account.order', $order))
            ->assertOk()
            ->assertSee('INV-2026-000042')
            ->assertSee(route('website.account.invoice', $invoice), false);
    }

    public function test_customer_can_edit_meals_outside_the_lead_window(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.meal_change_lead_days' => 1]);

        $customer = User::factory()->customer()->create();
        $locked = MealChangeRules::earliestEditableDate()->copy()->subDay()->toDateString();
        $open = MealChangeRules::earliestEditableDateString();

        $subscription = Subscription::factory()->for($customer)->create([
            'meal_types' => [MealType::Lunch->value],
            'selected_days' => [0, 1, 2, 3, 4, 5, 6],
            'total_days' => 2,
            'start_date' => $locked,
            'meal_schedule' => [
                [
                    'date' => $locked,
                    'meals' => [MealType::Lunch->value => 'Old locked'],
                ],
                [
                    'date' => $open,
                    'meals' => [MealType::Lunch->value => 'Old open'],
                ],
            ],
        ]);

        $this->actingAs($customer)
            ->put(route('website.account.subscriptions.meals', $subscription), [
                'meal_schedule' => [
                    [
                        'date' => $locked,
                        'meals' => [MealType::Lunch->value => 'Hacked locked'],
                    ],
                    [
                        'date' => $open,
                        'meals' => [MealType::Lunch->value => 'New open'],
                    ],
                ],
            ])
            ->assertRedirect(route('website.account.subscription', $subscription))
            ->assertSessionHas('success');

        $subscription->refresh();

        $this->assertSame('Old locked', $subscription->meal_schedule[0]['meals']['lunch']);
        $this->assertSame('New open', $subscription->meal_schedule[1]['meals']['lunch']);

        Carbon::setTestNow();
    }

    public function test_subscriptions_tab_shows_pause_and_resume_actions(): void
    {
        $customer = User::factory()->customer()->create();
        Subscription::factory()->for($customer)->create([
            'status' => SubscriptionStatus::Active,
            'plan_name' => 'Active Plan',
        ]);
        Subscription::factory()->for($customer)->create([
            'status' => SubscriptionStatus::Paused,
            'plan_name' => 'Paused Plan',
            'pause_started_on' => now()->toDateString(),
            'paused_schedule' => [
                ['date' => now()->addDays(3)->toDateString(), 'meals' => [MealType::Lunch->value => 'Frozen']],
            ],
        ]);

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'subscriptions']))
            ->assertOk()
            ->assertSee('Active Plan')
            ->assertSee('Paused Plan')
            ->assertSee(__('account.subscription.pause_action'))
            ->assertSee(__('account.subscription.resume_action'))
            ->assertSee(__('account.subscription.pause_notice', [
                'days' => SubscriptionPauseRules::leadDays(),
            ]), false);
    }

    public function test_customer_can_pause_and_resume_a_subscription(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update([
            'operations.subscription_pause_lead_days' => 1,
            'operations.subscription_resume_lead_days' => 2,
        ]);

        $customer = User::factory()->customer()->create();
        $pauseFrom = SubscriptionPauseRules::earliestPausableDateString();
        $before = Carbon::parse($pauseFrom)->subDay()->toDateString();
        $later = Carbon::parse($pauseFrom)->addDay()->toDateString();
        $resumeFrom = SubscriptionPauseRules::earliestResumableDateString();

        $subscription = Subscription::factory()->for($customer)->create([
            'status' => SubscriptionStatus::Active,
            'meal_types' => [MealType::Lunch->value],
            'selected_days' => [0, 1, 2, 3, 4, 5, 6],
            'total_days' => 3,
            'start_date' => $before,
            'meal_schedule' => [
                ['date' => $before, 'meals' => [MealType::Lunch->value => 'Day A']],
                ['date' => $pauseFrom, 'meals' => [MealType::Lunch->value => 'Day B']],
                ['date' => $later, 'meals' => [MealType::Lunch->value => 'Day C']],
            ],
        ]);

        $this->actingAs($customer)
            ->post(route('website.account.subscriptions.pause', $subscription), [
                'pause_from' => $pauseFrom,
            ])
            ->assertRedirect(route('website.account', ['tab' => 'subscriptions']))
            ->assertSessionHas('success');

        $subscription->refresh();

        $this->assertTrue($subscription->isPaused());
        $this->assertSame($pauseFrom, $subscription->pause_started_on?->toDateString());
        $this->assertCount(1, $subscription->meal_schedule);
        $this->assertSame($before, $subscription->meal_schedule[0]['date']);
        $this->assertCount(2, $subscription->paused_schedule);
        $this->assertSame('Day B', $subscription->paused_schedule[0]['meals']['lunch']);

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'subscriptions']))
            ->assertOk()
            ->assertSee(__('account.subscription.resume_action'))
            ->assertSee(__('account.subscription.resume_hint', [
                'days' => SubscriptionPauseRules::resumeLeadDays(),
            ]), false);

        $this->actingAs($customer)
            ->post(route('website.account.subscriptions.resume', $subscription))
            ->assertRedirect(route('website.account', ['tab' => 'subscriptions']))
            ->assertSessionHas('success');

        $subscription->refresh();

        $this->assertSame(SubscriptionStatus::Active, $subscription->status);
        $this->assertNull($subscription->paused_schedule);
        $this->assertNull($subscription->pause_started_on);
        $this->assertCount(3, $subscription->meal_schedule);
        $this->assertSame($before, $subscription->meal_schedule[0]['date']);
        $this->assertSame('Day B', $subscription->meal_schedule[1]['meals']['lunch']);
        $this->assertSame('Day C', $subscription->meal_schedule[2]['meals']['lunch']);
        $this->assertTrue($subscription->meal_schedule[1]['date'] >= $resumeFrom);
        $this->assertTrue($subscription->endDate()?->toDateString() >= $later);

        Carbon::setTestNow();
    }

    public function test_customer_cannot_pause_when_plan_disallows_it(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.subscription_pause_lead_days' => 1]);

        $customer = User::factory()->customer()->create();
        $plan = \App\Modules\Plans\Models\Plan::factory()->withoutPause()->create();
        $pauseFrom = SubscriptionPauseRules::earliestPausableDateString();

        $subscription = Subscription::factory()->for($customer)->create([
            'plan_id' => $plan->id,
            'status' => SubscriptionStatus::Active,
            'meal_types' => [MealType::Lunch->value],
            'selected_days' => [0, 1, 2, 3, 4, 5, 6],
            'total_days' => 2,
            'start_date' => $pauseFrom,
            'meal_schedule' => [
                ['date' => $pauseFrom, 'meals' => [MealType::Lunch->value => 'Soon']],
                ['date' => Carbon::parse($pauseFrom)->addDay()->toDateString(), 'meals' => [MealType::Lunch->value => 'Later']],
            ],
        ]);

        $this->actingAs($customer)
            ->from(route('website.account', ['tab' => 'subscriptions']))
            ->post(route('website.account.subscriptions.pause', $subscription), [
                'pause_from' => $pauseFrom,
            ])
            ->assertRedirect(route('website.account', ['tab' => 'subscriptions']))
            ->assertSessionHasErrors('pause_from');

        $this->assertSame(SubscriptionStatus::Active, $subscription->refresh()->status);
        $this->assertFalse($subscription->allowsPause());

        Carbon::setTestNow();
    }

    public function test_customer_cannot_pause_inside_the_lead_window(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-08-02 12:00:00', DisplayTime::timezone()));
        app(SettingsService::class)->update(['operations.subscription_pause_lead_days' => 2]);

        $customer = User::factory()->customer()->create();
        $tooSoon = Carbon::now(DisplayTime::timezone())->addDay()->toDateString();

        $subscription = Subscription::factory()->for($customer)->create([
            'status' => SubscriptionStatus::Active,
            'meal_types' => [MealType::Lunch->value],
            'selected_days' => [0, 1, 2, 3, 4, 5, 6],
            'total_days' => 2,
            'start_date' => $tooSoon,
            'meal_schedule' => [
                ['date' => $tooSoon, 'meals' => [MealType::Lunch->value => 'Soon']],
                ['date' => Carbon::parse($tooSoon)->addDay()->toDateString(), 'meals' => [MealType::Lunch->value => 'Later']],
            ],
        ]);

        $this->actingAs($customer)
            ->from(route('website.account', ['tab' => 'subscriptions']))
            ->post(route('website.account.subscriptions.pause', $subscription), [
                'pause_from' => $tooSoon,
            ])
            ->assertRedirect(route('website.account', ['tab' => 'subscriptions']))
            ->assertSessionHasErrors('pause_from');

        $this->assertSame(SubscriptionStatus::Active, $subscription->refresh()->status);

        Carbon::setTestNow();
    }
}
