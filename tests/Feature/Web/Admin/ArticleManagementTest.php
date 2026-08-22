<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Cms\Models\Article;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ArticleManagementTest extends TestCase
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
            'slug' => 'sample-article',
            'category' => ['ar' => 'تغذية', 'en' => 'Nutrition'],
            'title' => ['ar' => 'مقال تجريبي', 'en' => 'Sample Article'],
            'excerpt' => ['ar' => 'مقتطف', 'en' => 'Excerpt'],
            'author' => ['ar' => 'كاتب', 'en' => 'Author'],
            'read_time' => ['ar' => '3 دقائق', 'en' => '3 min'],
            'body_1' => ['ar' => 'فقرة ١', 'en' => 'Para 1'],
            'body_2' => ['ar' => 'فقرة ٢', 'en' => 'Para 2'],
            'highlight' => ['ar' => 'إبراز', 'en' => 'Highlight'],
            'body_3' => ['ar' => 'فقرة ٣', 'en' => 'Para 3'],
            'cta_label' => ['ar' => 'اقرأ ←', 'en' => 'Read →'],
            'cta_url' => '/store',
            'is_active' => '1',
            'sort_order' => '0',
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_articles(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.articles.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_articles_index(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.articles.index'))
            ->assertOk()
            ->assertSee(__('articles.title'));
    }

    public function test_admin_can_create_an_article(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.articles.store'), $this->payload(['title' => ['ar' => 'اسم', 'en' => 'Created Article']]))
            ->assertRedirect(route('admin.articles.index'));

        $article = Article::query()->firstOrFail();

        $this->assertSame('Created Article', $article->getTranslation('title', 'en'));
        $this->assertSame('sample-article', $article->slug);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::ArticleCreated->value]);
    }

    public function test_admin_can_update_an_article(): void
    {
        $this->actingAs($this->admin())->post(route('admin.articles.store'), $this->payload());
        $article = Article::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->put(route('admin.articles.update', $article), $this->payload([
                'title' => ['ar' => 'محدث', 'en' => 'Updated Article'],
            ]))
            ->assertRedirect(route('admin.articles.index'));

        $this->assertSame('Updated Article', $article->refresh()->getTranslation('title', 'en'));
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::ArticleUpdated->value]);
    }

    public function test_admin_can_archive_an_article(): void
    {
        $this->actingAs($this->admin())->post(route('admin.articles.store'), $this->payload());
        $article = Article::query()->firstOrFail();

        $this->actingAs($this->admin())
            ->delete(route('admin.articles.destroy', $article))
            ->assertRedirect(route('admin.articles.index'));

        $this->assertSoftDeleted('articles', ['id' => $article->id]);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::ArticleArchived->value]);
    }
}
