<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Money\Money;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class DashboardTest extends TestCase
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

    public function test_the_dashboard_shows_sales_orders_and_subscriptions(): void
    {
        $order = Order::factory()->status(OrderStatus::Pending)->create([
            'total_minor' => 12_500,
            'placed_at' => now(),
        ]);
        Order::factory()->status(OrderStatus::Confirmed)->create([
            'placed_at' => now()->subDays(2),
        ]);

        Invoice::factory()->payable($order)->create([
            'user_id' => $order->user_id,
            'total_minor' => 12_500,
            'issued_at' => now(),
        ]);

        $open = Subscription::factory()
            ->status(SubscriptionStatus::Active)
            ->handling(HandlingStatus::New)
            ->create(['plan_name' => 'Balance plan']);

        Subscription::factory()
            ->status(SubscriptionStatus::Active)
            ->handling(HandlingStatus::Handled, $this->admin())
            ->create();

        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(__('dashboard.kpi.sales_today'))
            ->assertSee(__('dashboard.kpi.sales_month'))
            ->assertSee(Money::fromMinor(12_500)->format())
            ->assertSee(__('dashboard.kpi.orders_pending'))
            ->assertSee(__('dashboard.kpi.needs_handling'))
            ->assertSee($order->reference())
            ->assertSee($open->reference())
            ->assertSee('Balance plan')
            ->assertSee(route('admin.orders.index'), false)
            ->assertSee(route('admin.subscriptions.index'), false);
    }

    public function test_the_dashboard_shows_empty_states_when_there_is_no_activity(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(__('dashboard.sections.empty_orders'))
            ->assertSee(__('dashboard.sections.empty_subscriptions'))
            ->assertSee(Money::fromMinor(0)->format());
    }

    public function test_a_guest_is_sent_to_login(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_sales_only_count_confirmed_invoices(): void
    {
        // An unpaid COD order must not inflate the sales figure.
        Order::factory()->create([
            'total_minor' => 99_000,
            'placed_at' => now(),
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(__('dashboard.kpi.sales_hint'))
            ->assertSee(Money::fromMinor(0)->format());
    }
}
