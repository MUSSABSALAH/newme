<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Models\Order;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class CustomerAuthTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_customer_can_register(): void
    {
        $response = $this->post(route('website.register'), [
            'name' => 'Sara Customer',
            'email' => 'sara@example.com',
            'phone' => '0551234567',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('website.account'));

        $user = User::query()->where('email', 'sara@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->isCustomer());
        $this->assertTrue($user->hasRole('customer'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_customer_can_log_in(): void
    {
        $user = User::factory()->customer()->create([
            'email' => 'sara@example.com',
        ]);

        $this->post(route('website.login'), [
            'email' => 'sara@example.com',
            'password' => 'password',
        ])->assertRedirect(route('website.account'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_staff_cannot_log_in_on_the_website(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'type' => UserType::Staff->value,
        ]);

        $this->from(route('website.login'))
            ->post(route('website.login'), [
                'email' => 'admin@example.com',
                'password' => 'password',
            ])
            ->assertRedirect(route('website.login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_customer_cannot_log_in_to_admin(): void
    {
        User::factory()->customer()->create([
            'email' => 'sara@example.com',
        ]);

        $this->from(route('admin.login'))
            ->post(route('admin.login'), [
                'email' => 'sara@example.com',
                'password' => 'password',
            ])
            ->assertRedirect(route('admin.login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_guest_is_redirected_from_checkout_to_login(): void
    {
        $this->get(route('website.checkout'))
            ->assertRedirect(route('website.login'));
    }

    public function test_customer_can_checkout_cart_into_an_order(): void
    {
        $customer = User::factory()->customer()->create();
        $product = Product::factory()->create(['is_active' => true, 'price' => 1500]);

        $this->withSession(['store_cart' => [$product->id => 2]]);

        $this->placeOrder($customer)->assertRedirect();

        $order = Order::query()->where('user_id', $customer->id)->first();

        $this->assertNotNull($order);
        $this->assertSame(3000, $order->total_minor);
        $this->assertCount(1, $order->items);
        $this->assertSame([], session('store_cart', []));
    }

    public function test_admin_customers_index_lists_only_customers(): void
    {
        $staff = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff-only@example.com',
        ]);
        $customer = User::factory()->customer()->create([
            'name' => 'Customer User',
            'email' => 'customer-only@example.com',
        ]);

        $staff->givePermissionTo(['customers.view', 'users.view']);

        // Customers page shows the customer; staff email only appears in the topbar chip.
        $this->actingAs($staff)
            ->get(route('admin.customers.index'))
            ->assertOk()
            ->assertSee('Customer User')
            ->assertSee('customer-only@example.com');

        // Staff users page never lists the customer account.
        $this->actingAs($staff)
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertSee('staff-only@example.com')
            ->assertDontSee('customer-only@example.com')
            ->assertDontSee('Customer User');
    }
}
