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
                'authentication__sms_otp' => '0',
                'authentication__email_otp' => '0',
                'operations__stock_reservation_minutes' => '30',
                'operations__payment_timeout_minutes' => '30',
                'operations__subscription_min_start_days' => '1',
                'operations__meal_change_lead_days' => '1',
                'operations__subscription_pause_lead_days' => '1',
                'operations__subscription_resume_lead_days' => '1',
                'operations__consultation_working_days' => ['sun', 'mon', 'tue', 'wed', 'thu'],
                'operations__consultation_hours_start' => '10:00',
                'operations__consultation_hours_end' => '20:00',
                'operations__consultation_duration_minutes' => '60',
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
            ->assertSee(__('settings.groups.finance'))
            ->assertSee(__('settings.groups.authentication'))
            ->assertSee(__('settings.fields.authentication.sms_otp'))
            ->assertSee(__('settings.fields.authentication.email_otp'));
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

    public function test_otp_toggles_are_stored_and_typed(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'authentication__sms_otp' => '1',
                'authentication__email_otp' => '1',
            ]))
            ->assertRedirect(route('admin.settings.edit'));

        $settings = app(SettingsService::class);

        $this->assertSame(true, $settings->get('authentication.sms_otp'));
        $this->assertSame(true, $settings->get('authentication.email_otp'));
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

    public function test_subscription_lead_time_settings_are_typed(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'operations__subscription_min_start_days' => '2',
                'operations__meal_change_lead_days' => '3',
                'operations__subscription_pause_lead_days' => '4',
                'operations__subscription_resume_lead_days' => '5',
            ]))
            ->assertRedirect(route('admin.settings.edit'));

        $settings = app(SettingsService::class);

        $this->assertSame(2, $settings->get('operations.subscription_min_start_days'));
        $this->assertSame(3, $settings->get('operations.meal_change_lead_days'));
        $this->assertSame(4, $settings->get('operations.subscription_pause_lead_days'));
        $this->assertSame(5, $settings->get('operations.subscription_resume_lead_days'));
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
        $this->assertSame(1, $settings->get('operations.subscription_min_start_days'));
        $this->assertSame(1, $settings->get('operations.meal_change_lead_days'));
        $this->assertSame(1, $settings->get('operations.subscription_pause_lead_days'));
        $this->assertSame(1, $settings->get('operations.subscription_resume_lead_days'));
        $this->assertSame(['sun', 'mon', 'tue', 'wed', 'thu'], $settings->get('operations.consultation_working_days'));
        $this->assertSame('10:00', $settings->get('operations.consultation_hours_start'));
        $this->assertSame('20:00', $settings->get('operations.consultation_hours_end'));
        $this->assertSame(60, $settings->get('operations.consultation_duration_minutes'));
        $this->assertSame(false, $settings->get('finance.prices_include_tax'));
        $this->assertSame(false, $settings->get('authentication.sms_otp'));
        $this->assertSame(false, $settings->get('authentication.email_otp'));
        $this->assertSame('SAR', $settings->get('finance.currency'));
    }

    public function test_consultation_schedule_settings_are_typed(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'operations__consultation_working_days' => ['sun', 'mon', 'wed'],
                'operations__consultation_hours_start' => '09:00',
                'operations__consultation_hours_end' => '12:00',
                'operations__consultation_duration_minutes' => '30',
            ]))
            ->assertRedirect(route('admin.settings.edit'));

        $settings = app(SettingsService::class);

        $this->assertSame(['sun', 'mon', 'wed'], $settings->get('operations.consultation_working_days'));
        $this->assertSame('09:00', $settings->get('operations.consultation_hours_start'));
        $this->assertSame('12:00', $settings->get('operations.consultation_hours_end'));
        $this->assertSame(30, $settings->get('operations.consultation_duration_minutes'));

        $schedule = app(\App\Modules\Settings\Support\ConsultationSchedule::class);
        $this->assertSame([
            ['start' => '09:00', 'end' => '09:30'],
            ['start' => '09:30', 'end' => '10:00'],
            ['start' => '10:00', 'end' => '10:30'],
            ['start' => '10:30', 'end' => '11:00'],
            ['start' => '11:00', 'end' => '11:30'],
            ['start' => '11:30', 'end' => '12:00'],
        ], $schedule->slots());
    }

    public function test_consultation_working_days_require_at_least_one(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $this->payload([
                'operations__consultation_working_days' => [],
            ]))
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('settings.operations__consultation_working_days');
    }

    public function test_consultation_end_must_be_after_start(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $this->payload([
                'operations__consultation_hours_start' => '15:00',
                'operations__consultation_hours_end' => '10:00',
            ]))
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('settings.operations__consultation_hours_end');
    }

    public function test_consult_page_receives_schedule_from_settings(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.settings.update'), $this->payload([
                'operations__consultation_working_days' => ['tue', 'thu'],
                'operations__consultation_hours_start' => '11:00',
                'operations__consultation_hours_end' => '13:00',
                'operations__consultation_duration_minutes' => '60',
            ]));

        $this->actingAs(User::factory()->customer()->create())
            ->get(route('website.consult'))
            ->assertOk()
            ->assertSee('"working_days":["tue","thu"]', false)
            ->assertSee('"duration_minutes":60', false)
            ->assertSee('"days_ahead":30', false)
            ->assertSee('"start":"11:00","end":"12:00"', false)
            ->assertSee('"start":"12:00","end":"13:00"', false);
    }
}
