<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class RoleManagementTest extends TestCase
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

    public function test_user_without_permission_cannot_view_roles(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.roles.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_roles_index(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.roles.index'))
            ->assertOk()
            ->assertSee(__('roles.names.'.RoleName::SuperAdmin->value));
    }

    public function test_admin_can_create_a_role_with_permissions(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.roles.store'), [
                'display_name' => ['ar' => 'محرر', 'en' => 'Editor'],
                'permissions' => [
                    PermissionName::UsersView->value,
                    PermissionName::UsersCreate->value,
                ],
            ])
            ->assertRedirect(route('admin.roles.index'));

        $role = Role::findByName('editor');

        $this->assertSame('Editor', $role->label('en'));
        $this->assertSame('محرر', $role->label('ar'));
        $this->assertTrue($role->hasPermissionTo(PermissionName::UsersView->value));
        $this->assertTrue($role->hasPermissionTo(PermissionName::UsersCreate->value));
        $this->assertFalse($role->hasPermissionTo(PermissionName::AuditView->value));
    }

    public function test_create_role_requires_a_name(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.roles.create'))
            ->post(route('admin.roles.store'), ['permissions' => []])
            ->assertRedirect(route('admin.roles.create'))
            ->assertSessionHasErrors(['display_name.ar', 'display_name.en']);
    }

    public function test_admin_can_update_role_permissions(): void
    {
        $role = Role::create(['name' => 'editor', 'guard_name' => 'web']);
        $role->syncPermissions([PermissionName::UsersView->value]);

        $this->actingAs($this->admin())
            ->put(route('admin.roles.update', $role), [
                'display_name' => ['ar' => 'محرر', 'en' => 'Editor'],
                'permissions' => [PermissionName::UsersUpdate->value],
            ])
            ->assertRedirect(route('admin.roles.index'));

        $role->refresh();

        $this->assertSame('محرر', $role->label('ar'));
        $this->assertTrue($role->hasPermissionTo(PermissionName::UsersUpdate->value));
        $this->assertFalse($role->hasPermissionTo(PermissionName::UsersView->value));
    }

    public function test_super_admin_permissions_cannot_be_changed(): void
    {
        $superAdmin = Role::findByName(RoleName::SuperAdmin->value);

        $this->actingAs($this->admin())
            ->put(route('admin.roles.update', $superAdmin), [
                'display_name' => ['ar' => 'المدير العام', 'en' => 'Super Admin'],
                'permissions' => [PermissionName::UsersView->value],
            ])
            ->assertRedirect(route('admin.roles.index'));

        $superAdmin->refresh();

        // Still holds every permission, not just the one submitted.
        $this->assertTrue($superAdmin->hasPermissionTo(PermissionName::AuditView->value));
    }

    public function test_system_roles_cannot_be_deleted(): void
    {
        $role = Role::findByName(RoleName::Driver->value);

        $this->actingAs($this->admin())
            ->delete(route('admin.roles.destroy', $role))
            ->assertSessionHas('error');

        $this->assertDatabaseHas('roles', ['name' => RoleName::Driver->value]);
    }

    public function test_custom_role_can_be_deleted(): void
    {
        $role = Role::create(['name' => 'Temp', 'guard_name' => 'web']);

        $this->actingAs($this->admin())
            ->delete(route('admin.roles.destroy', $role))
            ->assertRedirect(route('admin.roles.index'));

        $this->assertDatabaseMissing('roles', ['name' => 'Temp']);
    }

    public function test_role_assigned_to_users_cannot_be_deleted(): void
    {
        $role = Role::create(['name' => 'Temp', 'guard_name' => 'web']);
        $member = User::factory()->create();
        $member->assignRole($role);

        $this->actingAs($this->admin())
            ->delete(route('admin.roles.destroy', $role))
            ->assertSessionHas('error');

        $this->assertDatabaseHas('roles', ['name' => 'Temp']);
    }
}
