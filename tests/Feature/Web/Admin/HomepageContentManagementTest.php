<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Support\HomepageContentRegistry;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class HomepageContentManagementTest extends TestCase
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
     * @return array<string, array<string, string>>
     */
    private function payload(array $overrides = []): array
    {
        return array_replace_recursive([
            'announce_shipping' => [
                'ar' => 'التوصيل مجاني فوق <b>300 ريال</b>',
                'en' => 'Free delivery on orders over <b>SAR 300</b>',
            ],
            'announce_partners' => [
                'ar' => 'شركاء نعتمدهم: دايت سنتر',
                'en' => 'Partners we trust: Diet Center',
            ],
            'announce_consult' => [
                'ar' => 'استشارة أولى <b>مجانية</b>',
                'en' => 'First consult is <b>free</b>',
            ],
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_homepage_content(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.homepage.edit'))
            ->assertForbidden();
    }

    public function test_admin_can_view_homepage_content_form(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.homepage.edit'))
            ->assertOk()
            ->assertSee(__('homepage.title'))
            ->assertSee(__('homepage.sections.announce'))
            ->assertSee(__('homepage.slides.announce_partners'))
            ->assertSee(__('homepage.slides.announce_consult'))
            ->assertSee('200 ريال', false)
            ->assertSee('SAR 200', false)
            ->assertSee('Diet Center', false)
            ->assertSee('مجانية', false);
    }

    public function test_content_editor_can_update_announce_shipping_text(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::ContentEditor->value);

        $this->actingAs($user)
            ->put(route('admin.homepage.update'), $this->payload())
            ->assertRedirect(route('admin.homepage.edit'));

        $row = PageContent::query()
            ->where('page', HomepageContentRegistry::PAGE)
            ->where('key', HomepageContentRegistry::ANNOUNCE_SHIPPING)
            ->firstOrFail();

        $this->assertSame('Free delivery on orders over <b>SAR 300</b>', $row->getTranslation('value', 'en'));
        $this->assertSame('التوصيل مجاني فوق <b>300 ريال</b>', $row->getTranslation('value', 'ar'));

        $partners = PageContent::query()
            ->where('key', HomepageContentRegistry::ANNOUNCE_PARTNERS)
            ->firstOrFail();
        $this->assertSame('Partners we trust: Diet Center', $partners->getTranslation('value', 'en'));

        $consult = PageContent::query()
            ->where('key', HomepageContentRegistry::ANNOUNCE_CONSULT)
            ->firstOrFail();
        $this->assertSame('First consult is <b>free</b>', $consult->getTranslation('value', 'en'));

        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::HomepageContentUpdated->value]);
    }

    public function test_announce_html_is_limited_to_safe_tags(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.homepage.update'), $this->payload([
                'announce_shipping' => [
                    'ar' => 'توصيل <b onclick="alert(1)">مجاني</b> <script>alert(1)</script>',
                    'en' => 'Free <b onclick="alert(1)">delivery</b> <script>alert(1)</script>',
                ],
            ]))
            ->assertRedirect(route('admin.homepage.edit'));

        $row = PageContent::query()
            ->where('key', HomepageContentRegistry::ANNOUNCE_SHIPPING)
            ->firstOrFail();

        $this->assertSame('Free <b>delivery</b>', $row->getTranslation('value', 'en'));
        $this->assertSame('توصيل <b>مجاني</b>', $row->getTranslation('value', 'ar'));
    }
}
