<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ConsultationManagementTest extends TestCase
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

    public function test_user_without_permission_cannot_view_consultations(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.consultations.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_consultations_index_and_show(): void
    {
        $consultation = Consultation::factory()->create([
            'customer_name' => 'Visible Guest',
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.consultations.index'))
            ->assertOk()
            ->assertSee(__('consultations.title'))
            ->assertSee('Visible Guest', false);

        $this->actingAs($this->admin())
            ->get(route('admin.consultations.show', $consultation))
            ->assertOk()
            ->assertSee('Visible Guest', false)
            ->assertSee($consultation->customer_email, false);
    }

    public function test_admin_can_update_consultation_status(): void
    {
        $consultation = Consultation::factory()->create([
            'status' => ConsultationStatus::Pending->value,
        ]);

        $this->actingAs($this->admin())
            ->patch(route('admin.consultations.status', $consultation), [
                'status' => ConsultationStatus::Confirmed->value,
                'notes' => 'تم التواصل لتأكيد الموعد',
            ])
            ->assertRedirect();

        $consultation->refresh();
        $this->assertSame(ConsultationStatus::Confirmed, $consultation->status);
        $this->assertSame('تم التواصل لتأكيد الموعد', $consultation->notes);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::ConsultationStatusUpdated->value]);
    }

    public function test_admin_can_mark_confirmed_consultation_as_no_show(): void
    {
        $consultation = Consultation::factory()->confirmed()->create();

        $this->actingAs($this->admin())
            ->patch(route('admin.consultations.status', $consultation), [
                'status' => ConsultationStatus::NoShow->value,
                'notes' => 'لم يرد على الاتصال',
            ])
            ->assertRedirect();

        $consultation->refresh();
        $this->assertSame(ConsultationStatus::NoShow, $consultation->status);
        $this->assertSame('لم يرد على الاتصال', $consultation->notes);
    }

    public function test_admin_can_update_notes_on_terminal_consultation(): void
    {
        $consultation = Consultation::factory()->create([
            'status' => ConsultationStatus::Completed->value,
            'notes' => null,
        ]);

        $this->actingAs($this->admin())
            ->patch(route('admin.consultations.status', $consultation), [
                'notes' => 'تمت التوصية بخطة التوازن',
            ])
            ->assertRedirect();

        $this->assertSame('تمت التوصية بخطة التوازن', $consultation->refresh()->notes);
        $this->assertSame(ConsultationStatus::Completed, $consultation->status);
    }

    public function test_admin_can_complete_pending_consultation_directly(): void
    {
        $consultation = Consultation::factory()->create([
            'status' => ConsultationStatus::Pending->value,
        ]);

        $this->actingAs($this->admin())
            ->patch(route('admin.consultations.status', $consultation), [
                'status' => ConsultationStatus::Completed->value,
                'notes' => 'انتهت الاستشارة بنجاح',
            ])
            ->assertRedirect();

        $consultation->refresh();
        $this->assertSame(ConsultationStatus::Completed, $consultation->status);
        $this->assertSame('انتهت الاستشارة بنجاح', $consultation->notes);
    }

    public function test_admin_can_mark_pending_consultation_as_no_show(): void
    {
        $consultation = Consultation::factory()->create([
            'status' => ConsultationStatus::Pending->value,
        ]);

        $this->actingAs($this->admin())
            ->patch(route('admin.consultations.status', $consultation), [
                'status' => ConsultationStatus::NoShow->value,
            ])
            ->assertRedirect();

        $this->assertSame(ConsultationStatus::NoShow, $consultation->refresh()->status);
    }

    public function test_invalid_status_transition_is_rejected(): void
    {
        $consultation = Consultation::factory()->create([
            'status' => ConsultationStatus::Completed->value,
        ]);

        $this->actingAs($this->admin())
            ->from(route('admin.consultations.show', $consultation))
            ->patch(route('admin.consultations.status', $consultation), [
                'status' => ConsultationStatus::Pending->value,
            ])
            ->assertRedirect(route('admin.consultations.show', $consultation))
            ->assertSessionHasErrors('status');

        $this->assertSame(ConsultationStatus::Completed, $consultation->refresh()->status);
    }
}
