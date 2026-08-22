<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class DeliveryBoardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_a_guest_is_sent_to_login(): void
    {
        $this->get(route('admin.deliveries.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_staff_without_the_permission_cannot_open_the_board(): void
    {
        $this->actingAs($this->staff(RoleName::Accountant))
            ->get(route('admin.deliveries.index'))
            ->assertForbidden();
    }

    public function test_a_shipping_officer_opens_todays_board(): void
    {
        $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index'))
            ->assertOk()
            ->assertSee(__('deliveries.title'))
            ->assertSee(__('deliveries.board.today'))
            ->assertSee(__('deliveries.board.empty_title'));
    }

    public function test_todays_board_lists_store_orders_and_subscription_stops(): void
    {
        $order = $this->openOrder('Sara Ali', 'Riyadh', OrderStatus::Confirmed);
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah', 'Grilled salmon');

        Order::factory()->status(OrderStatus::Pending)->create();
        $this->stopOn(now()->addDay()->toDateString(), 'Tomorrow customer', 'Dammam');

        $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index'))
            ->assertOk()
            ->assertSee('Sara Ali')
            ->assertSee($order->reference())
            ->assertSee('Riyadh')
            ->assertSee('Lina Fahad')
            ->assertSee($subscription->reference())
            ->assertSee('Jeddah')
            ->assertSee('Grilled salmon')
            ->assertDontSee('Tomorrow customer')
            ->assertSee(__('deliveries.sections.orders'))
            ->assertSee(__('deliveries.sections.subscriptions'));
    }

    public function test_a_paused_day_is_left_off_the_board(): void
    {
        $this->pausedStopForToday('Frozen customer');

        $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index'))
            ->assertOk()
            ->assertDontSee('Frozen customer')
            ->assertSee(__('deliveries.board.empty_title'));
    }

    public function test_a_past_day_shows_what_was_handed_over_not_the_open_queue(): void
    {
        $yesterday = now()->subDay();
        $openCustomer = User::factory()->customer()->create(['name' => 'Open queue']);
        $handedCustomer = User::factory()->customer()->create(['name' => 'Already delivered']);

        Order::factory()->for($openCustomer)->status(OrderStatus::Confirmed)->create([
            'shipping_address' => $this->address('Open queue', 'Riyadh'),
        ]);

        $handed = Order::factory()->for($handedCustomer)->status(OrderStatus::Delivered)->create([
            'shipping_address' => $this->address('Already delivered', 'Jeddah'),
            'delivered_at' => $yesterday,
        ]);

        $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index', ['date' => $yesterday->toDateString()]))
            ->assertOk()
            ->assertSee('Already delivered')
            ->assertSee($handed->reference())
            ->assertDontSee('Open queue');
    }

    public function test_the_officer_can_dispatch_and_deliver_a_subscription_stop(): void
    {
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah');
        $officer = $this->officer();
        $today = now()->toDateString();

        $this->actingAs($officer)
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => $today,
                'status' => DeliveryStatus::Dispatched->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('subscription_deliveries', [
            'subscription_id' => $subscription->getKey(),
            'status' => DeliveryStatus::Dispatched->value,
            'handled_by' => $officer->getKey(),
        ]);

        $this->actingAs($officer)
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => $today,
                'status' => DeliveryStatus::Delivered->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'));

        $this->assertSame(
            DeliveryStatus::Delivered,
            SubscriptionDelivery::query()->where('subscription_id', $subscription->getKey())->first()?->status,
        );
    }

    public function test_a_failed_stop_needs_a_reason(): void
    {
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah');

        $this->actingAs($this->officer())
            ->from(route('admin.deliveries.index'))
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => now()->toDateString(),
                'status' => DeliveryStatus::Failed->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'))
            ->assertSessionHasErrors('reason');

        $this->actingAs($this->officer())
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => now()->toDateString(),
                'status' => DeliveryStatus::Failed->value,
                'reason' => 'Customer not home',
            ])
            ->assertRedirect(route('admin.deliveries.index'));

        $this->assertDatabaseHas('subscription_deliveries', [
            'subscription_id' => $subscription->getKey(),
            'status' => DeliveryStatus::Failed->value,
            'failure_reason' => 'Customer not home',
        ]);
    }

    public function test_an_unscheduled_date_cannot_be_recorded(): void
    {
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah');

        $this->actingAs($this->officer())
            ->from(route('admin.deliveries.index'))
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => now()->addWeek()->toDateString(),
                'status' => DeliveryStatus::Delivered->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'))
            ->assertSessionHasErrors('date');
    }

    public function test_the_officer_can_take_a_store_order_onto_the_road_and_hand_it_over(): void
    {
        $order = $this->openOrder('Sara Ali', 'Riyadh', OrderStatus::Preparing);
        $officer = $this->officer();

        $this->actingAs($officer)
            ->patch(route('admin.deliveries.orders.update', $order), [
                'date' => now()->toDateString(),
                'status' => OrderStatus::OutForDelivery->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'))
            ->assertSessionHas('success');

        $this->assertSame(OrderStatus::OutForDelivery, $order->refresh()->status);

        $this->actingAs($officer)
            ->patch(route('admin.deliveries.orders.update', $order), [
                'date' => now()->toDateString(),
                'status' => OrderStatus::Delivered->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'));

        $this->assertSame(OrderStatus::Delivered, $order->refresh()->status);
        $this->assertNotNull($order->delivered_at);
    }

    public function test_the_board_will_not_cancel_an_order(): void
    {
        $order = $this->openOrder('Sara Ali', 'Riyadh', OrderStatus::Confirmed);

        $this->actingAs($this->officer())
            ->from(route('admin.deliveries.index'))
            ->patch(route('admin.deliveries.orders.update', $order), [
                'status' => OrderStatus::Cancelled->value,
            ])
            ->assertRedirect(route('admin.deliveries.index'))
            ->assertSessionHasErrors('status');

        $this->assertSame(OrderStatus::Confirmed, $order->refresh()->status);
    }

    public function test_cash_on_delivery_orders_are_flagged_to_collect(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'COD customer']);

        Order::factory()->for($customer)->status(OrderStatus::Preparing)->create([
            'shipping_address' => $this->address('COD customer', 'Riyadh'),
            'payment_method' => PaymentMethod::CashOnDelivery,
            'payment_status' => PaymentStatus::Pending,
        ]);

        $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index'))
            ->assertOk()
            ->assertSee('COD customer')
            ->assertSee(__('deliveries.fields.collect_cash'));
    }

    public function test_a_shipping_officer_does_not_get_order_or_subscription_admin_links(): void
    {
        $order = $this->openOrder('Sara Ali', 'Riyadh');
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah');

        $page = $this->actingAs($this->officer())
            ->get(route('admin.deliveries.index'))
            ->assertOk()
            ->assertSee($order->reference())
            ->assertSee($subscription->reference());

        $page->assertDontSee(route('admin.orders.show', $order), false);
        $page->assertDontSee(route('admin.subscriptions.show', $subscription), false);
    }

    public function test_an_accountant_cannot_record_a_hand_over(): void
    {
        $subscription = $this->stopForToday('Lina Fahad', 'Jeddah');

        $this->actingAs($this->staff(RoleName::Accountant))
            ->patch(route('admin.deliveries.stops.update', $subscription), [
                'date' => now()->toDateString(),
                'status' => DeliveryStatus::Delivered->value,
            ])
            ->assertForbidden();
    }

    private function officer(): User
    {
        return $this->staff(RoleName::ShippingOfficer);
    }

    private function staff(RoleName $role): User
    {
        $user = User::factory()->create();
        $user->assignRole($role->value);

        return $user;
    }

    private function openOrder(string $name, string $city, OrderStatus $status = OrderStatus::Confirmed): Order
    {
        $customer = User::factory()->customer()->create(['name' => $name]);

        return Order::factory()->for($customer)->status($status)->create([
            'shipping_address' => $this->address($name, $city),
        ]);
    }

    private function stopForToday(string $name, string $city, string $dish = 'Grilled chicken'): Subscription
    {
        return $this->stopOn(now()->toDateString(), $name, $city, $dish);
    }

    private function stopOn(string $date, string $name, string $city, string $dish = 'Grilled chicken'): Subscription
    {
        $customer = User::factory()->customer()->create(['name' => $name]);

        return Subscription::factory()
            ->for($customer)
            ->status(SubscriptionStatus::Active)
            ->create([
                'start_date' => $date,
                'shipping_address' => $this->address($name, $city),
                'meal_schedule' => [
                    [
                        'date' => $date,
                        'meals' => [MealType::Lunch->value => $dish],
                    ],
                ],
            ]);
    }

    private function pausedStopForToday(string $name): Subscription
    {
        $today = now()->toDateString();
        $customer = User::factory()->customer()->create(['name' => $name]);

        return Subscription::factory()
            ->for($customer)
            ->status(SubscriptionStatus::Paused)
            ->create([
                'start_date' => $today,
                'meal_schedule' => [],
                'paused_schedule' => [
                    [
                        'date' => $today,
                        'meals' => [MealType::Lunch->value => 'Frozen meal'],
                    ],
                ],
            ]);
    }

    /**
     * @return array<string, string|null>
     */
    private function address(string $name, string $city): array
    {
        return [
            'label' => 'Home',
            'recipient_name' => $name,
            'phone' => '0500000000',
            'city' => $city,
            'district' => 'Al Olaya',
            'street' => 'King Road 12',
            'national_address' => null,
            'details' => null,
        ];
    }
}
