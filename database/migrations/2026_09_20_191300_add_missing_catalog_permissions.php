<?php

declare(strict_types=1);

use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

/**
 * The roles form lists every PermissionName, including ones added after the
 * first seed. Live servers that only git-pull + migrate never received
 * delivery.* (and any later catalog rows), so saving a role threw
 * PermissionDoesNotExist.
 */
return new class extends Migration
{
    public function up(): void
    {
        foreach (PermissionName::values() as $name) {
            Permission::findOrCreate($name, 'web');
        }

        $superAdmin = Role::findOrCreate(RoleName::SuperAdmin->value, 'web');
        $superAdmin->syncPermissions(Permission::query()->where('guard_name', 'web')->get());

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function down(): void
    {
        // Keep catalog rows; removing them would break roles already using them.
    }
};
