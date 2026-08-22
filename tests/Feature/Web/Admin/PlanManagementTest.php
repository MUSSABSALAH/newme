<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PlanManagementTest extends TestCase
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
            'goal' => 'weight_loss',
            'name' => ['ar' => 'باقة تجريبية', 'en' => 'Sample Plan'],
            'requires_day_selection' => '1',
            'allows_pause' => '1',
            'min_delivery_days_per_week' => '5',
            'delivery_fee' => '0',
            'is_active' => '1',
            'sort_order' => '0',
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_plans(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.plans.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_plans_index(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.plans.index'))
            ->assertOk()
            ->assertSee(__('plans.title'));
    }

    public function test_admin_can_create_a_plan_with_a_draft_version(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.plans.store'), $this->payload(['name' => ['ar' => 'اسم', 'en' => 'Created Plan']]))
            ->assertRedirect();

        $plan = Plan::query()->firstOrFail();

        $this->assertSame('Created Plan', $plan->getTranslation('name', 'en'));
        $this->assertSame(1, $plan->versions()->count());
        $this->assertTrue($plan->draftVersion()?->isDraft() ?? false);

        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::PlanCreated->value]);
    }

    public function test_admin_can_create_a_plan_with_pricing_and_meals_inline(): void
    {
        $meals = Meal::factory()->count(2)->create();

        $this->actingAs($this->admin())
            ->post(route('admin.plans.store'), $this->payload([
                'rules' => [
                    ['meal_types' => [MealType::Breakfast->value, MealType::Lunch->value], 'duration_unit' => 'day', 'duration_length' => 30, 'price' => '300.00', 'discount_percent' => '0'],
                ],
                'meals' => [$meals[0]->id, $meals[1]->id],
            ]))
            ->assertRedirect();

        $plan = Plan::query()->firstOrFail();
        $draft = $plan->draftVersion();

        $this->assertNotNull($draft);
        $this->assertDatabaseHas('plan_pricing_rules', [
            'plan_version_id' => $draft->id,
            'meal_types_key' => 'breakfast,lunch',
            'price' => 30000,
        ]);
        $this->assertEqualsCanonicalizing(
            [$meals[0]->id, $meals[1]->id],
            $plan->meals()->pluck('meals.id')->all(),
        );
    }

    public function test_admin_can_update_a_plan(): void
    {
        $this->actingAs($this->admin())->post(route('admin.plans.store'), $this->payload());
        $plan = Plan::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->put(route('admin.plans.update', $plan), $this->payload(['name' => ['ar' => 'محدث', 'en' => 'Updated Plan']]))
            ->assertRedirect(route('admin.plans.edit', $plan));

        $this->assertSame('Updated Plan', $plan->refresh()->getTranslation('name', 'en'));
    }

    public function test_admin_can_archive_a_plan(): void
    {
        $this->actingAs($this->admin())->post(route('admin.plans.store'), $this->payload());
        $plan = Plan::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->delete(route('admin.plans.destroy', $plan))
            ->assertRedirect(route('admin.plans.index'));

        $this->assertSoftDeleted('plans', ['id' => $plan->id]);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::PlanArchived->value]);
    }

    public function test_admin_can_save_pricing_and_publish_a_version(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin)->post(route('admin.plans.store'), $this->payload());
        $plan = Plan::query()->firstOrFail();
        $draft = $plan->draftVersion();

        $this->actingAs($admin)
            ->put(route('admin.plans.versions.pricing.update', $draft), [
                'rules' => [
                    ['meal_types' => [MealType::Breakfast->value, MealType::Lunch->value], 'duration_unit' => 'week', 'duration_length' => 4, 'price' => '400.00', 'discount_percent' => '10'],
                ],
            ])
            ->assertRedirect(route('admin.plans.show', $plan));

        $this->assertDatabaseHas('plan_pricing_rules', [
            'plan_version_id' => $draft->id,
            'meal_types_key' => 'breakfast,lunch',
            'price' => 40000,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.plans.versions.publish', $draft))
            ->assertRedirect(route('admin.plans.show', $plan));

        $this->assertSame(PlanVersionStatus::Published, $draft->refresh()->status);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::PlanVersionPublished->value]);
    }

    public function test_published_version_pricing_cannot_be_edited(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin)->post(route('admin.plans.store'), $this->payload());
        $plan = Plan::query()->firstOrFail();
        $draft = $plan->draftVersion();

        $this->actingAs($admin)->put(route('admin.plans.versions.pricing.update', $draft), [
            'rules' => [
                ['meal_types' => [MealType::Breakfast->value, MealType::Lunch->value], 'duration_unit' => 'week', 'duration_length' => 4, 'price' => '400.00', 'discount_percent' => '0'],
            ],
        ]);
        $this->actingAs($admin)->post(route('admin.plans.versions.publish', $draft));

        $this->actingAs($admin)
            ->from(route('admin.plans.show', $plan))
            ->put(route('admin.plans.versions.pricing.update', $draft->refresh()), [
                'rules' => [
                    ['meal_types' => [MealType::Dinner->value], 'duration_unit' => 'week', 'duration_length' => 4, 'price' => '900.00', 'discount_percent' => '0'],
                ],
            ])
            ->assertRedirect(route('admin.plans.show', $plan))
            ->assertSessionHas('error');

        $this->assertDatabaseMissing('plan_pricing_rules', ['meal_types_key' => 'dinner']);
    }

    public function test_new_version_clones_published_pricing(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin)->post(route('admin.plans.store'), $this->payload());
        $plan = Plan::query()->firstOrFail();
        $draft = $plan->draftVersion();

        $this->actingAs($admin)->put(route('admin.plans.versions.pricing.update', $draft), [
            'rules' => [
                ['meal_types' => [MealType::Breakfast->value, MealType::Lunch->value], 'duration_unit' => 'week', 'duration_length' => 4, 'price' => '400.00', 'discount_percent' => '0'],
            ],
        ]);
        $this->actingAs($admin)->post(route('admin.plans.versions.publish', $draft));

        $this->actingAs($admin)
            ->post(route('admin.plans.versions.store', $plan))
            ->assertRedirect(route('admin.plans.show', $plan));

        $newDraft = $plan->refresh()->draftVersion();

        $this->assertNotNull($newDraft);
        $this->assertSame(2, $newDraft->version_number);
        $this->assertSame(1, $newDraft->pricingRules()->count());
    }
}
