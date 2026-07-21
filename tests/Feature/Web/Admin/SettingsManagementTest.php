<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SettingsManagementTest extends TestCase
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
     * A complete, valid settings payload (all required keys present).
     *
     * @param  array<string, mixed>  $overrides
     * @return array<string, array<string, mixed>>
     */
    private function payload(array $overrides = []): array
    {
        return [
            'settings' => array_merge([
                'company__name_ar' => 'نيو مي',
                'company__name_en' => 'New Me',
                'localization__default_locale' => 'ar',
                'localization__timezone' => 'Asia/Riyadh',
                'finance__currency' => 'SAR',
                'finance__tax_rate' => '15.00',
                'finance__prices_include_tax' => '0',
                'operations__stock_reservation_minutes' => '30',
                'operations__payment_timeout_minutes' => '30',
                'operations__subscription_cutoff_hours' => '24',
            ], $overrides),
        ];
    }

    public function test_user_without_permission_cannot_view_settings(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.settings.edit'))
            ->assertForbidden();
    }

    public function test_admin_can_view_settings_page(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.settings.edit'))
            ->assertOk()
            ->assertSee(__('settings.fields.company.name_en'))
            ->assertSee(__('settings.groups.finance'));
    }

    public function test_admin_can_update_settings(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'company__name_en' => 'New Me Foods',
                'finance__tax_rate' => '10.50',
            ]))
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('settings', ['key' => 'company.name_en', 'value' => 'New Me Foods']);

        $settings = app(SettingsService::class);
        $this->assertSame('New Me Foods', $settings->get('company.name_en'));
        $this->assertSame('10.50', $settings->get('finance.tax_rate'));
    }

    public function test_boolean_setting_is_stored_and_typed(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'finance__prices_include_tax' => '1',
            ]))
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertSame(true, app(SettingsService::class)->get('finance.prices_include_tax'));
    }

    public function test_integer_setting_is_typed(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'operations__stock_reservation_minutes' => '45',
            ]))
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertSame(45, app(SettingsService::class)->get('operations.stock_reservation_minutes'));
    }

    public function test_settings_update_is_audited(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.settings.update'), $this->payload([
                'company__name_en' => 'Audited Co',
            ]));

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditAction::SettingsUpdated->value,
            'actor_id' => $admin->getKey(),
            'auditable_type' => null,
        ]);
    }

    public function test_tax_rate_is_validated(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $this->payload([
                'finance__tax_rate' => '200',
            ]))
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('settings.finance__tax_rate');
    }

    public function test_invalid_locale_is_rejected(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $this->payload([
                'localization__default_locale' => 'fr',
            ]))
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('settings.localization__default_locale');
    }

    public function test_service_returns_registry_defaults_when_unset(): void
    {
        $settings = app(SettingsService::class);

        $this->assertSame('15.00', $settings->get('finance.tax_rate'));
        $this->assertSame(30, $settings->get('operations.payment_timeout_minutes'));
        $this->assertSame(false, $settings->get('finance.prices_include_tax'));
        $this->assertSame('SAR', $settings->get('finance.currency'));
    }
}
