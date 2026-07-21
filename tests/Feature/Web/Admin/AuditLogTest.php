<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Models\AuditLog;
use App\Modules\Identity\DTOs\InvitationData;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Identity\Services\InvitationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class AuditLogTest extends TestCase
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

    public function test_role_creation_is_audited(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->post(route('admin.roles.store'), [
                'display_name' => ['ar' => 'محرر', 'en' => 'Editor'],
                'permissions' => [PermissionName::UsersView->value],
            ])
            ->assertRedirect(route('admin.roles.index'));

        $log = AuditLog::query()->where('action', AuditAction::RoleCreated->value)->firstOrFail();

        $this->assertSame($admin->getKey(), $log->actor_id);
        $this->assertSame(Role::class, $log->auditable_type);
        $this->assertSame('editor', $log->new_values['name'] ?? null);
    }

    public function test_user_deactivation_is_audited(): void
    {
        $admin = $this->admin();
        $target = User::factory()->create();
        $target->assignRole(RoleName::Driver->value);

        $this->actingAs($admin)
            ->post(route('admin.users.deactivate', $target))
            ->assertRedirect();

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditAction::UserDeactivated->value,
            'actor_id' => $admin->getKey(),
            'auditable_type' => User::class,
            'auditable_id' => $target->getKey(),
        ]);
    }

    public function test_invitation_acceptance_is_audited_without_an_actor(): void
    {
        $inviter = $this->admin();

        $invitation = app(InvitationService::class)->invite(
            InvitationData::fromArray([
                'name' => 'Sara Ali',
                'email' => 'sara@newme.sa',
                'roles' => [RoleName::Driver->value],
            ]),
            $inviter,
        );

        // Mirror InvitationService::issue with a known plaintext token.
        $token = 'known-plaintext-audit-token';
        $invitation->token_hash = hash('sha256', $token);
        $invitation->save();

        app(InvitationService::class)->accept($token, 'secret-password');

        $log = AuditLog::query()->where('action', AuditAction::InvitationAccepted->value)->firstOrFail();

        $this->assertNull($log->actor_id);
        $this->assertSame(User::class, $log->auditable_type);
    }

    public function test_user_without_permission_cannot_view_audit_log(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.audit.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_audit_log(): void
    {
        app(\App\Modules\Audit\Services\AuditService::class)->log(
            AuditAction::UserActivated,
            $this->admin(),
        );

        $this->actingAs($this->admin())
            ->get(route('admin.audit.index'))
            ->assertOk()
            ->assertSee(__('audit.actions.'.AuditAction::UserActivated->value));
    }

    public function test_audit_log_can_be_filtered_by_action(): void
    {
        $admin = $this->admin();
        $activatedUser = User::factory()->create();
        $deactivatedUser = User::factory()->create();
        $audit = app(\App\Modules\Audit\Services\AuditService::class);

        $this->actingAs($admin);
        $audit->log(AuditAction::UserActivated, $activatedUser);
        $audit->log(AuditAction::UserDeactivated, $deactivatedUser);

        // Filtered rows are distinguished by their target line ("User #id"),
        // since every action label also appears in the filter dropdown.
        $keep = __('audit.target_line', ['type' => __('audit.targets.user'), 'id' => $activatedUser->getKey()]);
        $drop = __('audit.target_line', ['type' => __('audit.targets.user'), 'id' => $deactivatedUser->getKey()]);

        $this->actingAs($admin)
            ->get(route('admin.audit.index', ['action' => AuditAction::UserActivated->value]))
            ->assertOk()
            ->assertSee($keep)
            ->assertDontSee($drop);
    }

    public function test_dedicated_permission_grants_audit_access(): void
    {
        $role = Role::create(['name' => 'auditor', 'guard_name' => 'web']);
        $role->syncPermissions([PermissionName::AuditView->value]);

        $user = User::factory()->create();
        $user->assignRole($role);

        $this->actingAs($user)
            ->get(route('admin.audit.index'))
            ->assertOk();
    }
}
