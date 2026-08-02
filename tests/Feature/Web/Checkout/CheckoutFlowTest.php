<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Checkout;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class CheckoutFlowTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function customerWithCart(int $priceMinor = 10000, int $quantity = 1): User
    {
        $customer = User::factory()->customer()->create();
        $product = Product::factory()->create(['is_active' => true, 'price' => $priceMinor]);

        $this->withSession(['store_cart' => [$product->id => $quantity]]);

        return $customer;
    }

    public function test_a_guest_is_sent_to_sign_in_before_reaching_checkout(): void
    {
        $this->get(route('website.checkout'))
            ->assertRedirect(route('website.login'));
    }

    public function test_the_checkout_page_shows_the_cart_the_address_and_the_payment_methods(): void
    {
        $customer = $this->customerWithCart();
        $this->addressFor($customer);

        $this->actingAs($customer)
            ->get(route('website.checkout'))
            ->assertOk()
            ->assertSee(__('checkout.address.heading'))
            ->assertSee(__('checkout.payment.heading'))
            ->assertSee(__('checkout.review.place'))
            ->assertSee(PaymentMethod::Mada->label())
            ->assertSee(PaymentMethod::CashOnDelivery->label());
    }

    public function test_checkout_with_an_empty_cart_goes_back_to_the_cart(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->get(route('website.checkout'))
            ->assertRedirect(route('website.cart'))
            ->assertSessionHas('error', __('checkout.errors.nothing_to_checkout'));
    }

    public function test_a_customer_can_save_an_address_from_the_checkout(): void
    {
        $customer = $this->customerWithCart();

        $this->actingAs($customer)
            ->post(route('website.checkout.address.store'), [
                'label' => 'Home',
                'recipient_name' => 'Sara Customer',
                'phone' => '0555555555',
                'city' => 'Riyadh',
                'district' => 'Al Olaya',
                'street' => 'King Fahd Rd 12',
                'national_address' => 'RRRD2929',
                'details' => 'Floor 3',
                'is_default' => '1',
            ])
            ->assertRedirect(route('website.checkout'))
            ->assertSessionHas('success', __('checkout.messages.address_saved'));

        $address = Address::query()->where('user_id', $customer->id)->firstOrFail();

        $this->assertSame('Riyadh', $address->city);
        $this->assertSame('RRRD2929', $address->national_address);
        $this->assertTrue($address->is_default);
    }

    public function test_the_first_saved_address_becomes_the_default(): void
    {
        $customer = User::factory()->customer()->create();

        $first = Address::factory()->create(['user_id' => $customer->id, 'is_default' => false]);
        $second = Address::factory()->create(['user_id' => $customer->id, 'is_default' => true]);

        $this->assertFalse($first->refresh()->is_default);
        $this->assertTrue($second->refresh()->is_default);
    }

    public function test_placing_an_order_charges_the_card_and_confirms_the_order(): void
    {
        $customer = $this->customerWithCart(10000, 2);
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address)->assertRedirect();

        $order = Order::query()->firstOrFail();

        $this->assertSame(20000, $order->total_minor);
        $this->assertSame(OrderStatus::Confirmed, $order->status);
        $this->assertSame(PaymentStatus::Paid, $order->payment_status);
        $this->assertSame(PaymentMethod::Visa, $order->payment_method);
        $this->assertSame($address->id, $order->address_id);
        $this->assertSame($address->city, $order->deliveryAddress()?->city);

        $payment = Payment::query()->firstOrFail();

        $this->assertSame(PaymentStatus::Paid, $payment->status);
        $this->assertSame(20000, $payment->amount_minor);
        $this->assertSame('4242', $payment->card_last4);
        $this->assertSame('visa', $payment->card_brand);
        $this->assertNotNull($payment->paid_at);
        $this->assertSame(Order::class, $payment->payable_type);
        $this->assertSame($order->id, $payment->payable_id);
    }

    public function test_the_delivery_address_is_snapshotted_onto_the_order(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address)->assertRedirect();

        $order = Order::query()->firstOrFail();
        $address->delete();

        $snapshot = $order->refresh()->deliveryAddress();

        $this->assertNotNull($snapshot);
        $this->assertSame($address->street, $snapshot->street);
        $this->assertSame($address->national_address, $snapshot->nationalAddress);
    }

    public function test_a_declined_card_leaves_no_order_behind(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, ['card_number' => self::DECLINED_CARD])
            ->assertRedirect()
            ->assertSessionHas('error', __('payments.declines.card_declined'));

        $this->assertDatabaseCount('orders', 0);
        $this->assertDatabaseCount('payments', 0);

        // The cart survives so the customer can retry with another card.
        $this->assertNotSame([], session('store_cart', []));
    }

    public function test_cash_on_delivery_places_the_order_with_the_payment_still_pending(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, [
            'payment_method' => PaymentMethod::CashOnDelivery->value,
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ])->assertRedirect();

        $order = Order::query()->firstOrFail();

        $this->assertSame(OrderStatus::Pending, $order->status);
        $this->assertSame(PaymentStatus::Pending, $order->payment_status);

        $payment = Payment::query()->firstOrFail();

        $this->assertSame(PaymentStatus::Pending, $payment->status);
        $this->assertNull($payment->paid_at);
        $this->assertNull($payment->gateway_reference);
    }

    public function test_the_terms_must_be_accepted(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, ['terms' => null])
            ->assertSessionHasErrors('terms');

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_card_details_are_required_for_a_card_method(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, ['card_number' => null, 'card_cvv' => null])
            ->assertSessionHasErrors(['card_number', 'card_cvv']);

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_a_customer_cannot_deliver_to_someone_elses_address(): void
    {
        $customer = $this->customerWithCart();
        $other = Address::factory()->create([
            'user_id' => User::factory()->customer()->create()->id,
        ]);

        $this->placeOrder($customer, $other)->assertNotFound();

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_the_order_page_shows_the_address_and_the_payment(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address)->assertRedirect();

        $order = Order::query()->firstOrFail();

        $this->actingAs($customer)
            ->get(route('website.account.order', ['order' => $order->public_id]))
            ->assertOk()
            ->assertSee(__('account.delivery.address'))
            ->assertSee($address->city)
            ->assertSee(PaymentMethod::Visa->label())
            ->assertSee(PaymentStatus::Paid->label());
    }
}
