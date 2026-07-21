<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

final class UserManagementTest extends TestCase
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

    public function test_user_without_permission_cannot_view_users(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.users.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_users_index(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertSee($admin->name);
    }

    public function test_admin_can_update_a_user(): void
    {
        $user = User::factory()->create(['name' => 'Old Name']);
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($this->admin())
            ->put(route('admin.users.update', $user), [
                'name' => 'New Name',
                'email' => $user->email,
                'status' => UserStatus::Inactive->value,
                'roles' => [RoleName::Accountant->value],
            ])
            ->assertRedirect(route('admin.users.index'));

        $user->refresh();

        $this->assertSame('New Name', $user->name);
        $this->assertSame(UserStatus::Inactive, $user->status);
        $this->assertTrue($user->hasRole(RoleName::Accountant->value));
        $this->assertFalse($user->hasRole(RoleName::Driver->value));
    }

    public function test_updating_without_password_keeps_the_existing_one(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('original-secret'),
        ]);
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($this->admin())
            ->put(route('admin.users.update', $user), [
                'name' => $user->name,
                'email' => $user->email,
                'status' => UserStatus::Active->value,
                'roles' => [RoleName::Driver->value],
            ])
            ->assertRedirect(route('admin.users.index'));

        $user->refresh();

        $this->assertTrue(Hash::check('original-secret', (string) $user->password));
    }

    public function test_updating_a_user_requires_at_least_one_role(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($this->admin())
            ->from(route('admin.users.edit', $user))
            ->put(route('admin.users.update', $user), [
                'name' => $user->name,
                'email' => $user->email,
                'status' => UserStatus::Active->value,
                'roles' => [],
            ])
            ->assertRedirect(route('admin.users.edit', $user))
            ->assertSessionHasErrors('roles');
    }

    public function test_admin_can_deactivate_and_activate_a_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($this->admin())
            ->post(route('admin.users.deactivate', $user))
            ->assertRedirect(route('admin.users.index'));

        $this->assertSame(UserStatus::Inactive, $user->refresh()->status);

        $this->actingAs($this->admin())
            ->post(route('admin.users.activate', $user))
            ->assertRedirect(route('admin.users.index'));

        $this->assertSame(UserStatus::Active, $user->refresh()->status);
    }

    public function test_user_cannot_deactivate_themselves(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->post(route('admin.users.deactivate', $admin))
            ->assertSessionHas('error');

        $this->assertTrue($admin->refresh()->isActive());
    }

    public function test_last_active_super_admin_cannot_be_deactivated(): void
    {
        $actor = $this->managerWith([
            PermissionName::UsersView->value,
            PermissionName::UsersDeactivate->value,
        ]);

        $superAdmin = User::factory()->create();
        $superAdmin->assignRole(RoleName::SuperAdmin->value);

        $this->actingAs($actor)
            ->post(route('admin.users.deactivate', $superAdmin))
            ->assertSessionHas('error');

        $this->assertTrue($superAdmin->refresh()->isActive());
    }

    public function test_super_admin_role_cannot_be_removed_from_last_super_admin(): void
    {
        $actor = $this->managerWith([
            PermissionName::UsersView->value,
            PermissionName::UsersUpdate->value,
        ]);

        $superAdmin = User::factory()->create();
        $superAdmin->assignRole(RoleName::SuperAdmin->value);

        $this->actingAs($actor)
            ->put(route('admin.users.update', $superAdmin), [
                'name' => $superAdmin->name,
                'email' => $superAdmin->email,
                'status' => UserStatus::Active->value,
                'roles' => [RoleName::Accountant->value],
            ])
            ->assertSessionHas('error');

        $this->assertTrue($superAdmin->refresh()->hasRole(RoleName::SuperAdmin->value));
    }

    /**
     * @param  list<string>  $permissions
     */
    private function managerWith(array $permissions): User
    {
        $role = Role::create(['name' => 'manager', 'guard_name' => 'web']);
        $role->syncPermissions($permissions);

        $user = User::factory()->create();
        $user->assignRole($role);

        return $user;
    }
}
