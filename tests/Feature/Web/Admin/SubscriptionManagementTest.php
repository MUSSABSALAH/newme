<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SubscriptionManagementTest extends TestCase
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

    public function test_a_user_without_permission_cannot_view_subscriptions(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.subscriptions.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_the_subscriptions_index(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'Omar Nasser']);
        $subscription = Subscription::factory()->for($customer)->create(['plan_name' => 'Balanced plan']);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index'))
            ->assertOk()
            ->assertSee(__('subscriptions.title'))
            ->assertSee('Omar Nasser')
            ->assertSee('Balanced plan')
            ->assertSee(strtoupper(substr($subscription->public_id, -6)));
    }

    public function test_the_index_shows_an_empty_state(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index'))
            ->assertOk()
            ->assertSee(__('subscriptions.no_subscriptions'));
    }

    public function test_the_index_can_be_filtered_by_status(): void
    {
        $active = Subscription::factory()->status(SubscriptionStatus::Active)->create();
        $cancelled = Subscription::factory()->status(SubscriptionStatus::Cancelled)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index', ['status' => SubscriptionStatus::Active->value]))
            ->assertOk()
            ->assertSee(strtoupper(substr($active->public_id, -6)))
            ->assertDontSee(strtoupper(substr($cancelled->public_id, -6)));
    }

    public function test_admin_can_view_a_subscription_detail(): void
    {
        $customer = User::factory()->customer()->create(['name' => 'Omar Nasser']);
        $subscription = Subscription::factory()->for($customer)->create([
            'plan_name' => 'Balanced plan',
            'meal_types' => ['breakfast', 'lunch', 'dinner'],
            'selected_days' => [0, 1, 2, 3, 4],
            'shipping_address' => [
                'label' => 'Home',
                'recipient_name' => 'Omar Nasser',
                'phone' => '0500000000',
                'city' => 'Jeddah',
                'district' => 'Al Rawdah',
                'street' => 'King Road 12',
                'national_address' => 'JEDD1234',
                'details' => null,
            ],
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee('Balanced plan')
            ->assertSee('Omar Nasser')
            ->assertSee('Jeddah')
            ->assertSee(__('subscriptions.show.meals'))
            ->assertSee(__('meals.types.breakfast'))
            ->assertSee(__('meals.types.lunch'))
            ->assertSee(__('meals.types.dinner'))
            ->assertSee(__('website.subscribe.days')[0])
            ->assertSee(__('subscriptions.show.pricing'))
            ->assertSee(__('subscriptions.show.delivery'));
    }

    public function test_the_detail_page_shows_the_health_profile(): void
    {
        $birthDate = now()->subYears(46)->subMonth();

        $subscription = Subscription::factory()->create([
            'health_birth_date' => $birthDate->toDateString(),
            'health_allergies' => 'Shellfish',
            'health_medications' => 'Insulin',
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.show.health'))
            ->assertSee($birthDate->translatedFormat('d M Y'))
            ->assertSee(__('subscriptions.show.age_years', ['n' => 46]))
            ->assertSee('Shellfish')
            ->assertSee('Insulin');
    }

    public function test_the_detail_page_says_when_no_health_details_were_shared(): void
    {
        $subscription = Subscription::factory()->create([
            'health_birth_date' => null,
            'health_allergies' => null,
            'health_medications' => null,
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.show.no_health'));
    }

    public function test_the_detail_page_shows_the_coupon_discount(): void
    {
        $subscription = Subscription::factory()->create([
            'coupon_code' => 'SUMMER20',
            'coupon_discount_minor' => 5_000,
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee('SUMMER20')
            ->assertSee(__('subscriptions.fields.coupon'));
    }

    public function test_a_subscription_is_resolved_by_its_public_id(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', 'does-not-exist'))
            ->assertNotFound();
    }

    public function test_the_sidebar_links_to_subscriptions(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee(route('admin.subscriptions.index'), false)
            ->assertSee(__('messages.nav.subscriptions'), false);
    }

    /**
     * Staff who may read the ledger but not work it.
     */
    private function viewer(): User
    {
        $user = User::factory()->create();
        $user->givePermissionTo(PermissionName::SubscriptionsView->value);

        return $user;
    }

    public function test_a_new_subscription_starts_unhandled(): void
    {
        $subscription = Subscription::factory()->create();

        $this->assertSame(HandlingStatus::New, $subscription->handling_status);
        $this->assertTrue($subscription->needsHandling());
        $this->assertNull($subscription->handled_by);
    }

    public function test_the_index_highlights_rows_that_still_need_handling(): void
    {
        Subscription::factory()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index'))
            ->assertOk()
            ->assertSee('row--attention', false)
            ->assertSee(HandlingStatus::New->label());
    }

    public function test_the_index_does_not_highlight_handled_rows(): void
    {
        Subscription::factory()->handling(HandlingStatus::Handled, $this->admin())->create();

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index'))
            ->assertOk()
            ->assertDontSee('row--attention', false);
    }

    public function test_the_index_can_be_filtered_by_handling_state(): void
    {
        $open = Subscription::factory()->create();
        $done = Subscription::factory()->handling(HandlingStatus::Handled, $this->admin())->create();

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index', ['handling' => HandlingStatus::New->value]))
            ->assertOk()
            ->assertSee($open->reference())
            ->assertDontSee($done->reference());

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.index', ['handling' => HandlingStatus::Handled->value]))
            ->assertOk()
            ->assertSee($done->reference())
            ->assertDontSee($open->reference());
    }

    public function test_the_index_names_whoever_handled_the_request(): void
    {
        $staff = $this->admin();
        $staff->update(['name' => 'Sara Handler']);

        Subscription::factory()->handling(HandlingStatus::Contacted, $staff)->create();

        $this->actingAs($staff)
            ->get(route('admin.subscriptions.index'))
            ->assertOk()
            ->assertSee('Sara Handler')
            ->assertSee(HandlingStatus::Contacted->label());
    }

    public function test_admin_can_move_the_handling_state_along(): void
    {
        $staff = $this->admin();
        $subscription = Subscription::factory()->create();

        $this->actingAs($staff)
            ->from(route('admin.subscriptions.show', $subscription))
            ->patch(route('admin.subscriptions.handling', $subscription), [
                'handling_status' => HandlingStatus::Contacted->value,
            ])
            ->assertRedirect(route('admin.subscriptions.show', $subscription))
            ->assertSessionHas('success', __('subscriptions.messages.handling_updated'));

        $subscription->refresh();

        $this->assertSame(HandlingStatus::Contacted, $subscription->handling_status);
        $this->assertSame($staff->id, $subscription->handled_by);
        $this->assertNotNull($subscription->handled_at);

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditAction::SubscriptionHandlingUpdated->value,
            'auditable_id' => $subscription->id,
        ]);
    }

    public function test_reselecting_the_current_state_changes_nothing(): void
    {
        $subscription = Subscription::factory()->create();

        $this->actingAs($this->admin())
            ->patch(route('admin.subscriptions.handling', $subscription), [
                'handling_status' => HandlingStatus::New->value,
            ])
            ->assertRedirect();

        $this->assertNull($subscription->refresh()->handled_by);
        $this->assertDatabaseMissing('audit_logs', [
            'action' => AuditAction::SubscriptionHandlingUpdated->value,
        ]);
    }

    public function test_an_unknown_handling_state_is_rejected(): void
    {
        $subscription = Subscription::factory()->create();

        $this->actingAs($this->admin())
            ->patch(route('admin.subscriptions.handling', $subscription), [
                'handling_status' => 'archived',
            ])
            ->assertSessionHasErrors('handling_status');

        $this->assertSame(HandlingStatus::New, $subscription->refresh()->handling_status);
    }

    public function test_view_only_staff_cannot_change_the_handling_state(): void
    {
        $subscription = Subscription::factory()->create();

        $this->actingAs($this->viewer())
            ->patch(route('admin.subscriptions.handling', $subscription), [
                'handling_status' => HandlingStatus::Handled->value,
            ])
            ->assertForbidden();

        $this->assertSame(HandlingStatus::New, $subscription->refresh()->handling_status);
    }

    public function test_view_only_staff_are_not_offered_the_handling_form(): void
    {
        $subscription = Subscription::factory()->create();

        $this->actingAs($this->viewer())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.handling.untouched'))
            ->assertDontSee(__('subscriptions.handling.change'));
    }

    public function test_the_detail_page_reports_who_acted_and_when(): void
    {
        $staff = $this->admin();
        $staff->update(['name' => 'Sara Handler']);

        $subscription = Subscription::factory()->handling(HandlingStatus::Handled, $staff)->create();

        $this->actingAs($staff)
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.handling.title'))
            ->assertSee('Sara Handler')
            ->assertDontSee(__('subscriptions.handling.untouched'));
    }

    public function test_the_detail_page_shows_the_dish_calendar(): void
    {
        $subscription = Subscription::factory()->withMealSchedule()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.schedule.title'))
            ->assertSee('Oatmeal bowl')
            ->assertSee(__('subscriptions.schedule.chef_choice'))
            ->assertSee('Grilled chicken')
            ->assertSee(route('admin.subscriptions.meals-pdf', $subscription), false);
    }

    public function test_the_detail_page_builds_a_calendar_when_dishes_were_not_saved(): void
    {
        $subscription = Subscription::factory()->create([
            'meal_schedule' => null,
            'start_date' => '2026-08-03',
            'total_days' => 5,
            'selected_days' => [1, 2, 3, 4, 5],
            'meal_types' => ['lunch', 'dinner'],
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.show', $subscription))
            ->assertOk()
            ->assertSee(__('subscriptions.schedule.title'))
            ->assertDontSee(__('subscriptions.schedule.empty'))
            ->assertSee(__('meals.types.lunch'))
            ->assertSee(__('meals.types.dinner'))
            ->assertSee(__('subscriptions.schedule.chef_choice'))
            ->assertSee('03 Aug 2026');
    }

    public function test_admin_can_download_the_meal_schedule_pdf(): void
    {
        $subscription = Subscription::factory()->withMealSchedule()->create();

        $response = $this->actingAs($this->admin())
            ->get(route('admin.subscriptions.meals-pdf', $subscription));

        $response->assertOk();
        $this->assertStringStartsWith('%PDF', $response->getContent());
        $response->assertHeader('content-type', 'application/pdf');
    }

    public function test_a_user_without_permission_cannot_download_the_meal_schedule_pdf(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);
        $subscription = Subscription::factory()->withMealSchedule()->create();

        $this->actingAs($user)
            ->get(route('admin.subscriptions.meals-pdf', $subscription))
            ->assertForbidden();
    }
}
