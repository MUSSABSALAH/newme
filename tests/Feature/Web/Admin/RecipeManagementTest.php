<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Cms\Models\Recipe;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class RecipeManagementTest extends TestCase
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
            'slug' => 'sample-recipe',
            'category' => ['ar' => 'إفطار', 'en' => 'Breakfast'],
            'title' => ['ar' => 'وصفة تجريبية', 'en' => 'Sample Recipe'],
            'excerpt' => ['ar' => 'مقتطف', 'en' => 'Excerpt'],
            'meta_title' => ['ar' => 'عنوان فرعي', 'en' => 'Subtitle'],
            'time_label' => ['ar' => '10 دقائق', 'en' => '10 min'],
            'kcal_label' => ['ar' => '300 kcal', 'en' => '300 kcal'],
            'protein_label' => ['ar' => '20غ', 'en' => '20g'],
            'servings_label' => ['ar' => 'حصة', 'en' => '1 serving'],
            'ingredients' => [
                'ar' => "مكون ١\nمكون ٢",
                'en' => "Ingredient 1\nIngredient 2",
            ],
            'steps' => [
                'ar' => "خطوة ١\nخطوة ٢",
                'en' => "Step 1\nStep 2",
            ],
            'cta_label' => ['ar' => 'تسوّق ←', 'en' => 'Shop →'],
            'cta_url' => '/store',
            'is_active' => '1',
            'sort_order' => '0',
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_recipes(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.recipes.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_recipes_index(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.recipes.index'))
            ->assertOk()
            ->assertSee(__('recipes.title'));
    }

    public function test_admin_can_create_a_recipe(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.recipes.store'), $this->payload(['title' => ['ar' => 'اسم', 'en' => 'Created Recipe']]))
            ->assertRedirect(route('admin.recipes.index'));

        $recipe = Recipe::query()->firstOrFail();

        $this->assertSame('Created Recipe', $recipe->getTranslation('title', 'en'));
        $this->assertSame(['Ingredient 1', 'Ingredient 2'], $recipe->getTranslation('ingredients', 'en'));
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::RecipeCreated->value]);
    }

    public function test_admin_can_update_a_recipe(): void
    {
        $this->actingAs($this->admin())->post(route('admin.recipes.store'), $this->payload());
        $recipe = Recipe::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->put(route('admin.recipes.update', $recipe), $this->payload([
                'title' => ['ar' => 'محدث', 'en' => 'Updated Recipe'],
            ]))
            ->assertRedirect(route('admin.recipes.index'));

        $this->assertSame('Updated Recipe', $recipe->refresh()->getTranslation('title', 'en'));
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::RecipeUpdated->value]);
    }

    public function test_admin_can_archive_a_recipe(): void
    {
        $this->actingAs($this->admin())->post(route('admin.recipes.store'), $this->payload());
        $recipe = Recipe::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->delete(route('admin.recipes.destroy', $recipe))
            ->assertRedirect(route('admin.recipes.index'));

        $this->assertSoftDeleted('recipes', ['id' => $recipe->id]);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::RecipeArchived->value]);
    }
}
