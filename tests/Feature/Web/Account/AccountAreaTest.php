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
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\MealChangeRules;
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

    public function test_subscription_page_shows_the_meal_calendar(): void
    {
        $customer = User::factory()->customer()->create();
        $subscription = Subscription::factory()->for($customer)->withMealSchedule()->create();

        $this->actingAs($customer)
            ->get(route('website.account.subscription', $subscription))
            ->assertOk()
            ->assertSee(__('account.subscription.schedule'))
            ->assertSee('Oatmeal bowl')
            ->assertSee('meal-cal-grid', false)
            ->assertSee(__('account.subscription.legend_editable'));
    }
}
