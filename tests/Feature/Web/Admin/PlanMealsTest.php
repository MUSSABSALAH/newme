<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PlanMealsTest extends TestCase
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

    public function test_admin_can_sync_available_meals_for_a_plan(): void
    {
        $plan = Plan::factory()->create();
        $meals = Meal::factory()->count(3)->create();

        $this->actingAs($this->admin())
            ->put(route('admin.plans.meals.update', $plan), [
                'meals' => [$meals[0]->id, $meals[1]->id],
            ])
            ->assertRedirect(route('admin.plans.show', ['plan' => $plan, 'tab' => 'meals']));

        $this->assertEqualsCanonicalizing(
            [$meals[0]->id, $meals[1]->id],
            $plan->refresh()->meals()->pluck('meals.id')->all(),
        );

        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::PlanMealsUpdated->value]);
    }

    public function test_syncing_replaces_previous_selection(): void
    {
        $plan = Plan::factory()->create();
        $meals = Meal::factory()->count(3)->create();
        $plan->meals()->sync([$meals[0]->id, $meals[1]->id]);

        $this->actingAs($this->admin())
            ->put(route('admin.plans.meals.update', $plan), [
                'meals' => [$meals[2]->id],
            ])
            ->assertRedirect();

        $this->assertSame([$meals[2]->id], $plan->refresh()->meals()->pluck('meals.id')->all());
    }

    public function test_clearing_meals_removes_all(): void
    {
        $plan = Plan::factory()->create();
        $meals = Meal::factory()->count(2)->create();
        $plan->meals()->sync($meals->pluck('id')->all());

        $this->actingAs($this->admin())
            ->put(route('admin.plans.meals.update', $plan), [])
            ->assertRedirect();

        $this->assertCount(0, $plan->refresh()->meals);
    }

    public function test_user_without_permission_cannot_update_plan_meals(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->put(route('admin.plans.meals.update', $plan), ['meals' => []])
            ->assertForbidden();
    }
}
