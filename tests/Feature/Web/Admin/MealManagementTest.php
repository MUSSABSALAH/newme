<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class MealManagementTest extends TestCase
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

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'meal_type' => MealType::Lunch->value,
            'name' => ['ar' => 'وجبة تجريبية', 'en' => 'Sample Meal'],
            'calories' => '450',
            'protein_g' => '30',
            'carbs_g' => '40',
            'fat_g' => '15',
            'is_active' => '1',
            'sort_order' => '0',
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_meals(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.meals.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_meals_index(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.meals.index'))
            ->assertOk()
            ->assertSee(__('meals.title'));
    }

    public function test_admin_can_create_a_meal(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.meals.store'), $this->payload(['name' => ['ar' => 'اسم', 'en' => 'Created Meal']]))
            ->assertRedirect(route('admin.meals.index'));

        $meal = Meal::query()->firstOrFail();

        $this->assertSame('Created Meal', $meal->getTranslation('name', 'en'));
        $this->assertSame(MealType::Lunch, $meal->meal_type);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::MealCreated->value]);
    }

    public function test_admin_can_update_a_meal(): void
    {
        $this->actingAs($this->admin())->post(route('admin.meals.store'), $this->payload());
        $meal = Meal::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->put(route('admin.meals.update', $meal), $this->payload(['name' => ['ar' => 'محدث', 'en' => 'Updated Meal']]))
            ->assertRedirect(route('admin.meals.index'));

        $this->assertSame('Updated Meal', $meal->refresh()->getTranslation('name', 'en'));
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::MealUpdated->value]);
    }

    public function test_admin_can_archive_a_meal(): void
    {
        $this->actingAs($this->admin())->post(route('admin.meals.store'), $this->payload());
        $meal = Meal::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->delete(route('admin.meals.destroy', $meal))
            ->assertRedirect(route('admin.meals.index'));

        $this->assertSoftDeleted('meals', ['id' => $meal->id]);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::MealArchived->value]);
    }

    public function test_create_requires_a_valid_meal_type(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.meals.create'))
            ->post(route('admin.meals.store'), $this->payload(['meal_type' => 'brunch']))
            ->assertRedirect(route('admin.meals.create'))
            ->assertSessionHasErrors('meal_type');
    }
}
