<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SidebarNavTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_rail_renders_groups_with_their_nested_links(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertOk();

        // One rail entry per group, each expanding into a flyout.
        $this->assertSame(5, substr_count($response->getContent(), 'data-nav-trigger'));
        $this->assertSame(5, substr_count($response->getContent(), 'data-nav-flyout'));

        foreach ([
            __('messages.nav.groups.catalog'),
            __('messages.nav.groups.subscriptions'),
            __('messages.nav.groups.cms'),
            __('messages.nav.groups.people'),
            __('messages.nav.groups.system'),
        ] as $label) {
            $response->assertSee($label, false);
        }

        // Every previously top-level destination is still reachable.
        foreach ([
            'admin.orders.index',
            'admin.products.index',
            'admin.categories.index',
            'admin.subscriptions.index',
            'admin.plans.index',
            'admin.meals.index',
            'admin.articles.index',
            'admin.recipes.index',
            'admin.deliveries.index',
            'admin.customers.index',
            'admin.consultations.index',
            'admin.users.index',
            'admin.roles.index',
            'admin.invoices.index',
            'admin.settings.edit',
            'admin.audit.index',
        ] as $route) {
            $response->assertSee(route($route), false);
        }
    }

    public function test_group_holding_the_current_page_is_marked_active(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.roles.index'));

        $response->assertOk();
        $this->assertStringContainsString(
            'sidebar__item--group is-active',
            (string) $response->getContent(),
        );
    }

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::SuperAdmin->value);

        return $user;
    }
}
