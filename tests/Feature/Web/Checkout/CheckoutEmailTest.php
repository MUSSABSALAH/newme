<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Checkout;

use App\Models\User;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Notifications\OrderConfirmationNotification;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Notifications\SubscriptionConfirmationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

/**
 * The confirmation emails a customer receives after buying.
 */
final class CheckoutEmailTest extends TestCase
{
    use PlacesCheckout, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function customerWithCart(int $priceMinor = 10_000): User
    {
        $customer = User::factory()->customer()->create();
        $product = Product::factory()->create(['is_active' => true, 'price' => $priceMinor]);

        $this->withSession(['store_cart' => [$product->id => 1]]);

        return $customer;
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

    private function subscribe(User $customer, Plan $plan): void
    {
        $this->actingAs($customer)
            ->postJson(route('website.checkout.subscription'), [
                'plan_public_id' => $plan->public_id,
                'meal_types' => [MealType::Breakfast->value, MealType::Lunch->value],
                'duration_unit' => 'week',
                'duration_length' => 4,
                'health' => ['birth_date' => now()->subYears(32)->toDateString()],
            ])
            ->assertOk();
    }

    public function test_placing_an_order_emails_the_customer(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();

        $this->placeOrder($customer)->assertRedirect();

        Notification::assertSentTo(
            $customer,
            OrderConfirmationNotification::class,
            function (OrderConfirmationNotification $notification) use ($customer): bool {
                return $notification->order->user_id === $customer->getKey()
                    && $notification->via($customer) === ['mail'];
            },
        );
    }

    public function test_subscribing_emails_the_customer(): void
    {
        Notification::fake();

        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->subscribe($customer, $plan);
        $this->placeOrder($customer, $address)->assertRedirect();

        Notification::assertSentTo(
            $customer,
            SubscriptionConfirmationNotification::class,
            function (SubscriptionConfirmationNotification $notification) use ($plan): bool {
                return $notification->subscription->plan_id === $plan->getKey();
            },
        );
    }

    public function test_a_declined_card_emails_nobody(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();

        $this->placeOrder($customer, null, ['card_number' => self::DECLINED_CARD])
            ->assertRedirect();

        Notification::assertNothingSent();
    }

    public function test_the_confirmation_emails_are_queued(): void
    {
        $order = Order::factory()->create();
        $subscription = Subscription::factory()->create();

        $this->assertInstanceOf(ShouldQueue::class, new OrderConfirmationNotification($order));
        $this->assertInstanceOf(ShouldQueue::class, new SubscriptionConfirmationNotification($subscription));
    }

    public function test_a_queued_confirmation_carries_the_language_the_customer_was_browsing_in(): void
    {
        Notification::fake();

        $customer = $this->customerWithCart();
        $this->withSession(['locale' => 'ar']);

        $this->placeOrder($customer)->assertRedirect();

        Notification::assertSentTo(
            $customer,
            OrderConfirmationNotification::class,
            static fn (OrderConfirmationNotification $notification): bool => $notification->locale === 'ar',
        );
    }

    public function test_the_order_email_lists_what_was_bought(): void
    {
        $customer = $this->customerWithCart(25_000);

        $this->placeOrder($customer)->assertRedirect();

        $order = Order::query()->firstOrFail();
        $mail = (new OrderConfirmationNotification($order))->toMail($customer);
        $body = implode("\n", $mail->introLines)."\n".implode("\n", $mail->outroLines);

        $this->assertStringContainsString($order->reference(), $mail->subject ?? '');
        $this->assertStringContainsString($customer->name, $mail->greeting ?? '');
        $this->assertStringContainsString($order->items->first()->name, $body);
        $this->assertStringContainsString($order->totalDisplay(), $body);
        $this->assertSame('mail.operations.order-confirmation', $mail->view);
        $this->assertSame(route('website.account.order', $order), $mail->actionUrl);
    }

    /**
     * A missing key renders as its own dotted name rather than throwing, so the
     * only way to catch one is to look for it in the finished email.
     */
    public function test_both_emails_render_in_both_languages_without_a_missing_phrase(): void
    {
        $customer = $this->customerWithCart();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->placeOrder($customer, $address)->assertRedirect();
        $this->subscribe($customer, $plan);
        $this->placeOrder($customer, $address)->assertRedirect();

        $order = Order::query()->firstOrFail();
        $subscription = Subscription::query()->firstOrFail();

        foreach (['en', 'ar'] as $locale) {
            $this->app->setLocale($locale);

            foreach ([
                (new OrderConfirmationNotification($order))->toMail($customer),
                (new SubscriptionConfirmationNotification($subscription))->toMail($customer),
            ] as $mail) {
                $html = (string) $mail->render();

                $this->assertStringNotContainsString('orders.mail.', $html);
                $this->assertStringNotContainsString('subscriptions.mail.', $html);
                $this->assertStringNotContainsString('invoices.pdf.', $html);
                $this->assertStringNotContainsString('payments.methods.', $html);
            }
        }
    }

    public function test_the_subscription_email_states_the_plan_and_the_price(): void
    {
        $customer = User::factory()->customer()->create();
        $plan = $this->publishedPlan();
        $address = $this->addressFor($customer);

        $this->subscribe($customer, $plan);
        $this->placeOrder($customer, $address, ['payment_method' => PaymentMethod::Visa->value])
            ->assertRedirect();

        $subscription = Subscription::query()->firstOrFail();
        $mail = (new SubscriptionConfirmationNotification($subscription))->toMail($customer);
        $body = implode("\n", $mail->introLines)."\n".implode("\n", $mail->outroLines);

        $this->assertStringContainsString($subscription->plan_name, $mail->subject ?? '');
        $this->assertStringContainsString($subscription->reference(), $body);
        $this->assertStringContainsString($subscription->totalDisplay(), $body);
        $this->assertSame('mail.operations.subscription-confirmation', $mail->view);
        $this->assertSame(route('website.account.subscription', $subscription), $mail->actionUrl);
    }
}
