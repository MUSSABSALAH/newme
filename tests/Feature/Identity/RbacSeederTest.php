<?php

declare(strict_types=1);

namespace Tests\Feature\Identity;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

final class RbacSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_roles_and_permissions(): void
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        $this->assertSame(count(RoleName::cases()), Role::query()->count());
        $this->assertSame(count(PermissionName::cases()), Permission::query()->count());
    }

    public function test_super_admin_has_every_permission(): void
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        $user = User::factory()->create();
        $user->assignRole(RoleName::SuperAdmin->value);

        $this->assertTrue($user->can(PermissionName::UsersView->value));
        $this->assertTrue($user->can(PermissionName::RolesManage->value));
        $this->assertTrue($user->can(PermissionName::AuditView->value));
    }

    public function test_a_role_without_permissions_denies_access(): void
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->assertFalse($user->can(PermissionName::UsersView->value));
    }
}
