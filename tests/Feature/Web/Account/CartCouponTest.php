<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Models\Order;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class CartCouponTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function product(int $priceMinor = 10000): Product
    {
        return Product::factory()->create(['price' => $priceMinor]);
    }

    public function test_a_guest_can_apply_a_coupon_and_see_the_discount(): void
    {
        $product = $this->product(10000);
        Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->postJson(route('website.cart.coupon.store'), ['code' => 'save10'])
            ->assertOk()
            ->assertJson([
                'subtotal' => '100.00',
                'discount' => '10.00',
                'total' => '90.00',
                'coupon_code' => 'SAVE10',
            ]);

        $this->get(route('website.cart'))
            ->assertOk()
            ->assertSee('SAVE10');
    }

    public function test_the_cart_offers_a_coupon_field_when_no_code_is_applied(): void
    {
        $product = $this->product();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->get(route('website.cart'))
            ->assertOk()
            ->assertSee(__('website.cart.coupon_apply'))
            ->assertSee(route('website.cart.coupon.store'));
    }

    public function test_a_fixed_coupon_takes_a_flat_amount_off(): void
    {
        $product = $this->product(10000);
        Coupon::factory()->code('FLAT25')->fixed(2500)->create();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->postJson(route('website.cart.coupon.store'), ['code' => 'FLAT25'])
            ->assertOk()
            ->assertJson(['discount' => '25.00', 'total' => '75.00']);
    }

    public function test_an_invalid_code_is_rejected_without_changing_totals(): void
    {
        $product = $this->product(10000);

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->postJson(route('website.cart.coupon.store'), ['code' => 'NOPE'])
            ->assertStatus(422)
            ->assertJson([
                'total' => '100.00',
                'coupon_code' => null,
                'message' => __('coupons.rejections.not_found'),
            ]);
    }

    public function test_a_subscriptions_only_code_is_rejected_in_the_store(): void
    {
        $product = $this->product(10000);
        Coupon::factory()->code('SUBSONLY')->scope(CouponScope::Subscriptions)->create();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->postJson(route('website.cart.coupon.store'), ['code' => 'SUBSONLY'])
            ->assertStatus(422)
            ->assertJson(['message' => __('coupons.rejections.scope_mismatch')]);
    }

    public function test_a_coupon_can_be_removed(): void
    {
        $product = $this->product(10000);
        Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);
        $this->postJson(route('website.cart.coupon.store'), ['code' => 'SAVE10']);

        $this->deleteJson(route('website.cart.coupon.destroy'))
            ->assertOk()
            ->assertJson(['discount' => '0.00', 'total' => '100.00', 'coupon_code' => null]);
    }

    public function test_a_coupon_stops_applying_when_the_basket_falls_below_its_minimum(): void
    {
        $product = $this->product(10000);
        Coupon::factory()->code('BIG')->percentage(10)->create(['min_subtotal_minor' => 15000]);

        $this->post(route('website.cart.store'), ['product_id' => $product->id, 'quantity' => 2]);
        $this->postJson(route('website.cart.coupon.store'), ['code' => 'BIG'])->assertOk();

        // Down to 100.00, under the 150.00 minimum: the discount quietly lapses.
        $this->patchJson(route('website.cart.update', $product), ['quantity' => 1])
            ->assertOk()
            ->assertJson(['total' => '100.00', 'discount' => '0.00', 'coupon_code' => null]);
    }

    public function test_checkout_stores_the_discount_and_records_the_redemption(): void
    {
        $customer = User::factory()->customer()->create();
        $product = $this->product(10000);
        $coupon = Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->actingAs($customer);
        $this->post(route('website.cart.store'), ['product_id' => $product->id]);
        $this->postJson(route('website.cart.coupon.store'), ['code' => 'SAVE10'])->assertOk();

        $this->placeOrder($customer)->assertRedirect();

        $order = Order::query()->firstOrFail();

        $this->assertSame(10000, $order->subtotal_minor);
        $this->assertSame(1000, $order->discount_minor);
        $this->assertSame(9000, $order->total_minor);
        $this->assertSame('SAVE10', $order->coupon_code);
        $this->assertSame($coupon->id, $order->coupon_id);

        $this->assertDatabaseHas('coupon_redemptions', [
            'coupon_id' => $coupon->id,
            'user_id' => $customer->id,
            'redeemable_type' => Order::class,
            'redeemable_id' => $order->id,
            'discount_minor' => 1000,
        ]);

        $this->assertSame(1, $coupon->refresh()->redemptions_count);
    }

    public function test_a_customer_cannot_use_a_single_use_code_twice(): void
    {
        $customer = User::factory()->customer()->create();
        $product = $this->product(10000);
        Coupon::factory()->code('ONCE')->percentage(10)->create([
            'max_redemptions_per_user' => 1,
        ]);

        $this->actingAs($customer);
        $this->post(route('website.cart.store'), ['product_id' => $product->id]);
        $this->postJson(route('website.cart.coupon.store'), ['code' => 'ONCE'])->assertOk();
        $this->placeOrder($customer)->assertRedirect();

        $this->post(route('website.cart.store'), ['product_id' => $product->id]);

        $this->postJson(route('website.cart.coupon.store'), ['code' => 'ONCE'])
            ->assertStatus(422)
            ->assertJson(['message' => __('coupons.rejections.already_used')]);
    }

    public function test_the_coupon_is_cleared_from_the_session_after_checkout(): void
    {
        $customer = User::factory()->customer()->create();
        $product = $this->product(10000);
        Coupon::factory()->code('SAVE10')->percentage(10)->create();

        $this->actingAs($customer);
        $this->post(route('website.cart.store'), ['product_id' => $product->id]);
        $this->postJson(route('website.cart.coupon.store'), ['code' => 'SAVE10'])->assertOk();
        $this->placeOrder($customer);

        $this->assertNull(session('store_coupon'));
    }
}
