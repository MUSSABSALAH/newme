<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Notifications\InvoiceIssuedNotification;
use App\Modules\Invoices\Services\InvoicePdfRenderer;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Notifications\OrderConfirmationNotification;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class InvoiceTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

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

    private function customerWithCart(int $priceMinor = 10_000): User
    {
        $customer = User::factory()->customer()->create();
        $product = Product::factory()->create(['is_active' => true, 'price' => $priceMinor]);

        $this->withSession(['store_cart' => [$product->id => 1]]);

        return $customer;
    }

    public function test_a_paid_card_checkout_issues_an_invoice_and_emails_the_customer(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $this->placeOrder($customer)->assertRedirect();

        $order = Order::query()->sole();
        $invoice = Invoice::query()->sole();

        $this->assertSame($order->id, $invoice->invoiceable_id);
        $this->assertSame(Order::class, $invoice->invoiceable_type);
        $this->assertSame($customer->id, $invoice->user_id);
        $this->assertSame($order->total_minor, $invoice->total_minor);

        Notification::assertSentTo($customer, InvoiceIssuedNotification::class);
    }

    public function test_cash_on_delivery_does_not_issue_an_invoice_until_confirmed(): void
    {
        Notification::fake();

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

        $this->assertDatabaseCount('invoices', 0);

        // The order itself is still confirmed by email; only the invoice waits.
        Notification::assertSentTo($customer, OrderConfirmationNotification::class);
        Notification::assertNotSentTo($customer, InvoiceIssuedNotification::class);

        $order = Order::query()->sole();
        $payment = Payment::query()->sole();
        $admin = $this->admin();

        $this->actingAs($admin)
            ->from(route('admin.orders.show', $order))
            ->post(route('admin.payments.confirm', $payment))
            ->assertRedirect(route('admin.orders.show', $order))
            ->assertSessionHas('success', __('payments.messages.confirmed'));

        $invoice = Invoice::query()->sole();

        $this->assertSame($order->id, $invoice->invoiceable_id);
        $this->assertSame(PaymentStatus::Paid, $payment->refresh()->status);

        Notification::assertSentTo($customer, InvoiceIssuedNotification::class);
    }

    public function test_issuing_twice_for_the_same_order_is_idempotent(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $this->placeOrder($customer)->assertRedirect();

        $order = Order::query()->sole();
        $payment = Payment::query()->sole();
        $service = app(InvoiceService::class);

        $first = $service->issueFor($order, $payment);
        $second = $service->issueFor($order, $payment);

        $this->assertTrue($first->is($second));
        $this->assertDatabaseCount('invoices', 1);
    }

    public function test_staff_without_permission_cannot_view_invoices(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.invoices.index'))
            ->assertForbidden();
    }

    public function test_admin_can_browse_and_download_invoices(): void
    {
        $admin = $this->admin();
        $invoice = Invoice::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.invoices.index'))
            ->assertOk()
            ->assertSee(__('invoices.title'))
            ->assertSee($invoice->number);

        $this->actingAs($admin)
            ->get(route('admin.invoices.download', $invoice))
            ->assertOk()
            ->assertHeader('content-type', 'application/pdf');
    }

    public function test_the_pdf_is_a_simplified_zatca_tax_invoice(): void
    {
        $invoice = Invoice::factory()->create();

        $html = view('invoices.pdf', ['invoice' => $invoice])->render();

        $this->assertStringContainsString('فاتورة ضريبية مبسطة', $html);
        $this->assertStringContainsString('Simplified Tax Invoice', $html);
        $this->assertStringContainsString('310000000000003', $html);
        $this->assertStringContainsString($invoice->number, $html);
        $this->assertStringContainsString($invoice->sellerParty()->name, $html);

        $this->assertStringContainsString('dir="rtl"', $html);
        $this->assertLessThan(
            strpos($html, 'إلى / To:'),
            strpos($html, 'بيانات الفاتورة'),
            'Invoice details stay on the left; the recipient stays on the right.',
        );
        $this->assertLessThan(
            strpos($html, 'البيان / Item Descriptions'),
            strpos($html, 'المبلغ'),
            'Amounts stay on the left; the item description stays on the right.',
        );

        $pdf = app(InvoicePdfRenderer::class)->render($invoice);

        $this->assertSame('%PDF', substr($pdf, 0, 4));
        $this->assertGreaterThan(20_000, strlen($pdf));
        $this->assertSame(1, preg_match_all('/\/Type\s*\/Page[^s]/', $pdf));
    }

    public function test_the_order_page_links_to_the_invoice_pdf(): void
    {
        $admin = $this->admin();
        $order = Order::factory()->create();
        $invoice = Invoice::factory()->payable($order)->create([
            'user_id' => $order->user_id,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee($invoice->number)
            ->assertSee(route('admin.invoices.download', $invoice), false)
            ->assertSee(__('invoices.download'));
    }

    public function test_the_subscription_page_links_to_the_invoice_pdf(): void
    {
        $admin = $this->admin();
        $subscription = Subscription::factory()->create();
        $invoice = Invoice::factory()->payable($subscription)->create([
            'user_id' => $subscription->user_id,
            'invoiceable_type' => Subscription::class,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee($invoice->number)
            ->assertSee(route('admin.invoices.download', $invoice), false);
    }

    public function test_an_unpaid_order_shows_the_pending_invoice_hint(): void
    {
        $order = Order::factory()->create([
            'payment_status' => PaymentStatus::Pending,
            'payment_method' => PaymentMethod::CashOnDelivery,
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee(__('invoices.pending'));
    }

    public function test_the_order_page_offers_cod_confirmation_to_staff_who_can_confirm(): void
    {
        Notification::fake();

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

        $order = Order::query()->sole();

        $this->actingAs($this->admin())
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee(__('payments.actions.confirm'));
    }

    public function test_view_only_staff_do_not_see_the_cod_confirm_button(): void
    {
        Notification::fake();

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

        $viewer = User::factory()->create();
        $viewer->givePermissionTo([
            PermissionName::OrdersView->value,
            PermissionName::InvoicesView->value,
        ]);

        $this->actingAs($viewer)
            ->get(route('admin.orders.show', Order::query()->sole()))
            ->assertOk()
            ->assertDontSee(__('payments.actions.confirm'));
    }

    public function test_the_sidebar_links_to_invoices(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(route('admin.invoices.index'), false)
            ->assertSee(__('messages.nav.invoices'), false);
    }

    public function test_the_index_can_be_filtered_by_source(): void
    {
        $orderInvoice = Invoice::factory()->create();
        $subscription = Subscription::factory()->create();
        $subscriptionInvoice = Invoice::factory()->payable($subscription)->create([
            'user_id' => $subscription->user_id,
            'invoiceable_type' => Subscription::class,
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.invoices.index', ['source' => 'subscription']))
            ->assertOk()
            ->assertSee($subscriptionInvoice->number)
            ->assertDontSee($orderInvoice->number);
    }
}
