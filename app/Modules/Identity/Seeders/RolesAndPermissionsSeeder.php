<?php

declare(strict_types=1);

namespace App\Modules\Identity\Seeders;

use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

final class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (PermissionName::values() as $permission) {
            Permission::findOrCreate($permission);
        }

        foreach (RoleName::values() as $role) {
            Role::findOrCreate($role);
        }

        // Super Admin holds every permission that currently exists.
        Role::findOrCreate(RoleName::SuperAdmin->value)
            ->syncPermissions(Permission::all());
    }
}
