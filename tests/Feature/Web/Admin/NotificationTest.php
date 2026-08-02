<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Notifications\NewOrderNotification;
use App\Modules\Notifications\Notifications\NewSubscriptionNotification;
use App\Modules\Orders\Models\Order;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\Concerns\PlacesCheckout;
use Tests\TestCase;

final class NotificationTest extends TestCase
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

    /**
     * Give the signed-in user one stored notification about a real order.
     */
    private function notify(User $staff, ?Order $order = null): Order
    {
        $order ??= Order::factory()->create();

        $staff->notify(new NewOrderNotification($order));

        return $order;
    }

    public function test_placing_an_order_notifies_staff_who_can_see_orders(): void
    {
        $admin = $this->admin();
        $customer = $this->customerWithCart();

        $this->placeOrder($customer)->assertRedirect();

        $this->assertSame(1, $admin->unreadNotifications()->count());

        $payload = $admin->notifications()->sole()->data;

        $this->assertSame(NotificationEvent::OrderPlaced->value, $payload['event']);
        $this->assertSame($customer->name, $payload['customer']);
    }

    public function test_staff_without_the_orders_permission_are_not_notified(): void
    {
        $driver = User::factory()->create();
        $driver->assignRole(RoleName::Driver->value);
        $this->assertFalse($driver->can(PermissionName::OrdersView->value));

        $customer = $this->customerWithCart();
        $this->placeOrder($customer)->assertRedirect();

        $this->assertSame(0, $driver->notifications()->count());
    }

    public function test_the_buying_customer_is_not_notified(): void
    {
        $this->admin();
        $customer = $this->customerWithCart();

        $this->placeOrder($customer)->assertRedirect();

        $this->assertSame(0, $customer->notifications()->count());
    }

    public function test_an_inactive_staff_member_is_not_notified(): void
    {
        $inactive = User::factory()->inactive()->create();
        $inactive->assignRole(RoleName::SuperAdmin->value);

        $customer = $this->customerWithCart();
        $this->placeOrder($customer)->assertRedirect();

        $this->assertSame(0, $inactive->notifications()->count());
    }

    public function test_a_declined_payment_produces_no_notification(): void
    {
        $admin = $this->admin();
        $customer = $this->customerWithCart();

        $this->placeOrder($customer, null, ['card_number' => self::DECLINED_CARD]);

        $this->assertSame(0, $admin->notifications()->count());
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_the_bell_shows_the_unread_count_and_the_latest_entries(): void
    {
        $admin = $this->admin();
        $order = $this->notify($admin);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(NotificationEvent::OrderPlaced->title())
            ->assertSee($order->reference())
            ->assertSee('icon-btn__badge', false)
            ->assertSee(route('admin.notifications.index'), false);
    }

    public function test_the_bell_is_empty_without_notifications(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(__('messages.ui.no_notifications'))
            ->assertDontSee('icon-btn__badge', false);
    }

    public function test_the_inbox_lists_notifications(): void
    {
        $admin = $this->admin();
        $order = $this->notify($admin);

        $this->actingAs($admin)
            ->get(route('admin.notifications.index'))
            ->assertOk()
            ->assertSee(__('notifications.title'))
            ->assertSee($order->reference())
            ->assertSee(__('notifications.status.unread'));
    }

    public function test_the_inbox_only_shows_the_signed_in_users_notifications(): void
    {
        $admin = $this->admin();
        $colleague = $this->admin();

        $mine = $this->notify($admin);
        $theirs = $this->notify($colleague);

        $this->actingAs($admin)
            ->get(route('admin.notifications.index'))
            ->assertOk()
            ->assertSee($mine->reference())
            ->assertDontSee($theirs->reference());
    }

    public function test_the_inbox_can_be_filtered_by_read_state(): void
    {
        $admin = $this->admin();
        $openOrder = $this->notify($admin);
        $seenOrder = $this->notify($admin);

        $open = $this->noteAbout($admin, $openOrder);
        $seen = $this->noteAbout($admin, $seenOrder);
        $seen->markAsRead();

        // Assert on the listing itself: the topbar bell always shows both.
        $this->assertSame([$open->id], $this->listedIds($admin, 'unread'));
        $this->assertSame([$seen->id], $this->listedIds($admin, 'read'));
        $this->assertCount(2, $this->listedIds($admin, 'all'));
    }

    /**
     * The stored notification about a given order. The primary key is a uuid,
     * so rows are located by their subject rather than by insertion order.
     */
    private function noteAbout(User $staff, Order $order): DatabaseNotification
    {
        /** @var DatabaseNotification $note */
        $note = $staff->notifications()
            ->where('data', 'like', '%'.$order->public_id.'%')
            ->sole();

        return $note;
    }

    /**
     * Notification ids the inbox lists under a given filter.
     *
     * @return list<string>
     */
    private function listedIds(User $staff, string $filter): array
    {
        $response = $this->actingAs($staff)
            ->get(route('admin.notifications.index', ['filter' => $filter]))
            ->assertOk();

        /** @var LengthAwarePaginator<int, array{id: string}> $paginator */
        $paginator = $response->viewData('notifications');

        return collect($paginator->items())->pluck('id')->values()->all();
    }

    public function test_opening_a_notification_marks_it_read_and_lands_on_the_order(): void
    {
        $admin = $this->admin();
        $order = $this->notify($admin);
        $notification = $admin->notifications()->sole();

        $this->actingAs($admin)
            ->post(route('admin.notifications.read', $notification->id))
            ->assertRedirect(route('admin.orders.show', $order->public_id));

        $this->assertSame(0, $admin->unreadNotifications()->count());
    }

    public function test_a_subscription_notification_lands_on_the_subscription(): void
    {
        $admin = $this->admin();
        $subscription = Subscription::factory()->create();

        $admin->notify(new NewSubscriptionNotification($subscription));

        $this->actingAs($admin)
            ->post(route('admin.notifications.read', $admin->notifications()->sole()->id))
            ->assertRedirect(route('admin.subscriptions.show', $subscription->public_id));
    }

    public function test_a_user_cannot_read_someone_elses_notification(): void
    {
        $admin = $this->admin();
        $colleague = $this->admin();

        $this->notify($colleague);
        $notification = $colleague->notifications()->sole();

        $this->actingAs($admin)
            ->post(route('admin.notifications.read', $notification->id))
            ->assertNotFound();

        $this->assertSame(1, $colleague->unreadNotifications()->count());
    }

    public function test_marking_all_as_read_clears_the_badge(): void
    {
        $admin = $this->admin();
        $this->notify($admin);
        $this->notify($admin);

        $this->actingAs($admin)
            ->from(route('admin.notifications.index'))
            ->post(route('admin.notifications.read-all'))
            ->assertRedirect(route('admin.notifications.index'))
            ->assertSessionHas('success', __('notifications.messages.all_read'));

        $this->assertSame(0, $admin->unreadNotifications()->count());
        $this->assertSame(2, $admin->notifications()->whereNotNull('read_at')->count());
    }

    public function test_a_guest_cannot_reach_the_inbox(): void
    {
        $this->get(route('admin.notifications.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_an_unknown_event_does_not_break_the_inbox(): void
    {
        $admin = $this->admin();
        $this->notify($admin);

        $admin->notifications()->sole()->update(['data' => ['event' => 'legacy.event']]);

        $this->actingAs($admin)
            ->get(route('admin.notifications.index'))
            ->assertOk()
            ->assertSee(__('notifications.unknown_event'));
    }
}
