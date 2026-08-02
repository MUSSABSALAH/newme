<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Models\OrderItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class OrderManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::SuperAdmin->value);

        return $user;
    }

    public function test_a_user_without_permission_cannot_view_orders(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.orders.index'))
            ->assertForbidden();
    }

    public function test_a_customer_cannot_reach_the_admin_orders_page(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->get(route('admin.orders.index'))
            ->assertRedirect();
    }

    public function test_admin_can_view_the_orders_index(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'Sara Ali']);
        $order = Order::factory()->for($customer)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.index'))
            ->assertOk()
            ->assertSee(__('orders.title'))
            ->assertSee('Sara Ali')
            ->assertSee(strtoupper(substr($order->public_id, -6)))
            ->assertSee($order->status->label());
    }

    public function test_the_index_shows_an_empty_state(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.orders.index'))
            ->assertOk()
            ->assertSee(__('orders.no_orders'));
    }

    public function test_the_index_can_be_filtered_by_status(): void
    {
        $pending = Order::factory()->status(OrderStatus::Pending)->create();
        $cancelled = Order::factory()->status(OrderStatus::Cancelled)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.index', ['status' => OrderStatus::Cancelled->value]))
            ->assertOk()
            ->assertSee(strtoupper(substr($cancelled->public_id, -6)))
            ->assertDontSee(strtoupper(substr($pending->public_id, -6)));
    }

    public function test_an_unknown_status_filter_is_ignored(): void
    {
        $order = Order::factory()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.index', ['status' => 'nonsense']))
            ->assertOk()
            ->assertSee(strtoupper(substr($order->public_id, -6)));
    }

    public function test_admin_can_view_an_order_with_its_items_and_delivery(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'Sara Ali']);
        $address = Address::factory()->for($customer)->create(['city' => 'Riyadh']);

        $order = Order::factory()->for($customer)->create([
            'address_id' => $address->id,
            'shipping_address' => [
                'label' => $address->label,
                'recipient_name' => $address->recipient_name,
                'phone' => $address->phone,
                'city' => $address->city,
                'district' => $address->district,
                'street' => $address->street,
                'national_address' => $address->national_address,
                'details' => null,
            ],
            'note' => 'Leave at reception',
        ]);

        OrderItem::factory()->for($order)->create(['name' => 'Herb crackers', 'quantity' => 2]);

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee('Sara Ali')
            ->assertSee('Herb crackers')
            ->assertSee('Riyadh')
            ->assertSee('Leave at reception')
            ->assertSee(__('orders.show.delivery'));
    }

    public function test_the_detail_page_shows_the_coupon_discount(): void
    {
        $order = Order::factory()->discounted('WELCOME10', 1_500)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee('WELCOME10')
            ->assertSee(__('orders.fields.discount'));
    }

    public function test_the_detail_page_hides_the_discount_row_when_there_is_none(): void
    {
        $order = Order::factory()->create();

        // The label itself also appears in the sidebar ("Discount codes"), so
        // assert on the negated amount that only the discount row renders.
        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertDontSee('−');
    }

    public function test_an_order_is_resolved_by_its_public_id(): void
    {
        $order = Order::factory()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', 'does-not-exist'))
            ->assertNotFound();
    }

    public function test_the_sidebar_links_to_orders(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(route('admin.orders.index'), false)
            ->assertSee(__('messages.nav.orders'), false);
    }

    public function test_admin_can_move_an_order_along_the_delivery_path(): void
    {
        $order = Order::factory()->create(['status' => OrderStatus::Confirmed]);

        $this->actingAs($this->admin())
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::Preparing->value,
            ])
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertSame(OrderStatus::Preparing, $order->refresh()->status);

        $this->actingAs($this->admin())
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::OutForDelivery->value,
            ])
            ->assertRedirect();

        $this->assertSame(OrderStatus::OutForDelivery, $order->refresh()->status);

        $this->actingAs($this->admin())
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::Delivered->value,
            ])
            ->assertRedirect();

        $this->assertSame(OrderStatus::Delivered, $order->refresh()->status);
    }

    public function test_an_invalid_status_jump_is_rejected(): void
    {
        $order = Order::factory()->create(['status' => OrderStatus::Confirmed]);

        $this->actingAs($this->admin())
            ->from(route('admin.orders.show', $order))
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::Delivered->value,
            ])
            ->assertRedirect(route('admin.orders.show', $order))
            ->assertSessionHasErrors('status');

        $this->assertSame(OrderStatus::Confirmed, $order->refresh()->status);
    }

    public function test_admin_can_cancel_a_confirmed_order(): void
    {
        $order = Order::factory()->create(['status' => OrderStatus::Confirmed]);

        $this->actingAs($this->admin())
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::Cancelled->value,
            ])
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertSame(OrderStatus::Cancelled, $order->refresh()->status);
    }

    public function test_view_only_staff_cannot_change_order_status(): void
    {
        $viewer = User::factory()->create();
        $viewer->givePermissionTo(PermissionName::OrdersView->value);

        $order = Order::factory()->create(['status' => OrderStatus::Confirmed]);

        $this->actingAs($viewer)
            ->patch(route('admin.orders.status', $order), [
                'status' => OrderStatus::Preparing->value,
            ])
            ->assertForbidden();

        $this->assertSame(OrderStatus::Confirmed, $order->refresh()->status);
    }

    public function test_the_detail_page_offers_status_controls(): void
    {
        $order = Order::factory()->create(['status' => OrderStatus::Confirmed]);

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee(__('orders.show.fulfillment'))
            ->assertSee(__('orders.show.change_status'))
            ->assertSee(__('orders.statuses.preparing'))
            ->assertDontSee(__('orders.statuses.out_for_delivery'));
    }
}
