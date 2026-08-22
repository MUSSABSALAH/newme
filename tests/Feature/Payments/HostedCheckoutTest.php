<?php

declare(strict_types=1);

namespace Tests\Feature\Payments;

use App\Models\User;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Notifications\OrderConfirmationNotification;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Gateways\PayTabs\PayTabsGateway;
use App\Modules\Payments\Models\Payment;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\Concerns\PlacesCheckout;
use Tests\Fakes\FakeHostedGateway;
use Tests\TestCase;

final class HostedCheckoutTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);

        config()->set('payments.driver', 'fake_hosted');
        config()->set('payments.gateways.fake_hosted', FakeHostedGateway::class);
    }

    private function customerWithCart(): User
    {
        $customer = User::factory()->customer()->create();
        $product = Product::factory()->create(['is_active' => true, 'price' => 10000]);

        $this->withSession(['store_cart' => [$product->id => 1]]);

        return $customer;
    }

    public function test_the_container_resolves_the_hosted_gateway(): void
    {
        $this->assertInstanceOf(FakeHostedGateway::class, app(PaymentGateway::class));
        $this->assertTrue(app(PaymentGateway::class)->usesHostedCheckout());
    }

    public function test_the_paytabs_driver_is_registered(): void
    {
        config()->set('payments.driver', 'paytabs');

        $this->assertInstanceOf(PayTabsGateway::class, app(PaymentGateway::class));
        $this->assertTrue(app(PaymentGateway::class)->usesHostedCheckout());
    }

    public function test_checkout_does_not_collect_a_card_on_site(): void
    {
        $customer = $this->customerWithCart();
        $this->addressFor($customer);

        $this->actingAs($customer)
            ->get(route('website.checkout'))
            ->assertOk()
            ->assertSee(__('checkout.payment.hosted_note'))
            ->assertDontSee(__('checkout.payment.simulated_note'))
            ->assertDontSee('id="card_number"', false)
            ->assertSee(__('checkout.review.pay'));
    }

    public function test_placing_an_order_redirects_to_the_hosted_page_and_leaves_payment_pending(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, [
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ])->assertRedirect(FakeHostedGateway::REDIRECT_URL);

        $order = Order::query()->firstOrFail();
        $payment = Payment::query()->firstOrFail();

        $this->assertSame(OrderStatus::Pending, $order->status);
        $this->assertSame(PaymentStatus::Pending, $order->payment_status);
        $this->assertSame(PaymentStatus::Pending, $payment->status);
        $this->assertSame(FakeHostedGateway::TRAN_REF, $payment->gateway_reference);
        $this->assertSame([], session('store_cart', []));
        $this->assertSame(0, Invoice::query()->count());

        Notification::assertNothingSent();
    }

    public function test_card_details_are_not_required_for_a_card_method(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address, [
            'card_number' => null,
            'card_cvv' => null,
        ])->assertRedirect(FakeHostedGateway::REDIRECT_URL);
    }

    public function test_a_successful_return_settles_the_order_and_issues_the_invoice(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $this->placeOrder($customer, $this->addressFor($customer), [
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ]);

        $order = Order::query()->firstOrFail();
        $payment = Payment::query()->firstOrFail();

        $this->actingAs($customer)
            ->get(route('website.payments.paytabs.return', [
                'cart_id' => $payment->public_id,
                'paid' => 1,
            ]))
            ->assertRedirect(route('website.account.order', ['order' => $order->public_id]))
            ->assertSessionHas('success', __('payments.messages.paid'));

        $order->refresh();
        $payment->refresh();

        $this->assertSame(OrderStatus::Confirmed, $order->status);
        $this->assertSame(PaymentStatus::Paid, $order->payment_status);
        $this->assertSame(PaymentStatus::Paid, $payment->status);
        $this->assertNotNull($payment->paid_at);
        $this->assertSame(1, Invoice::query()->count());

        Notification::assertSentTo($customer, OrderConfirmationNotification::class);
    }

    public function test_a_second_return_does_not_issue_another_invoice(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $this->placeOrder($customer, $this->addressFor($customer), [
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ]);

        $payment = Payment::query()->firstOrFail();
        $url = route('website.payments.paytabs.return', [
            'cart_id' => $payment->public_id,
            'paid' => 1,
        ]);

        $this->actingAs($customer)->get($url)->assertRedirect();
        $this->actingAs($customer)->get($url)->assertRedirect();

        $this->assertSame(1, Invoice::query()->count());
        Notification::assertSentToTimes($customer, OrderConfirmationNotification::class, 1);
    }

    public function test_a_failed_return_marks_the_payment_failed(): void
    {
        $customer = $this->customerWithCart();
        $this->placeOrder($customer, $this->addressFor($customer), [
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ]);

        $order = Order::query()->firstOrFail();
        $payment = Payment::query()->firstOrFail();

        $this->actingAs($customer)
            ->get(route('website.payments.paytabs.return', [
                'cart_id' => $payment->public_id,
                'paid' => 0,
            ]))
            ->assertRedirect(route('website.account.order', ['order' => $order->public_id]))
            ->assertSessionHas('error', __('payments.messages.return_failed'));

        $this->assertSame(PaymentStatus::Failed, $payment->refresh()->status);
        $this->assertSame(OrderStatus::Pending, $order->refresh()->status);
        $this->assertSame(PaymentStatus::Failed, $order->payment_status);
        $this->assertSame(0, Invoice::query()->count());
    }

    public function test_cash_on_delivery_still_places_without_a_redirect(): void
    {
        $customer = $this->customerWithCart();
        $address = $this->addressFor($customer);

        $response = $this->placeOrder($customer, $address, [
            'payment_method' => PaymentMethod::CashOnDelivery->value,
            'card_number' => null,
            'card_holder' => null,
            'card_expiry_month' => null,
            'card_expiry_year' => null,
            'card_cvv' => null,
        ]);

        $order = Order::query()->firstOrFail();

        $response->assertRedirect(route('website.account.order', ['order' => $order->public_id]));

        $this->assertSame(OrderStatus::Pending, $order->status);
        $this->assertSame(PaymentStatus::Pending, $order->payment_status);
        $this->assertNull(Payment::query()->firstOrFail()->gateway_reference);
    }
}
