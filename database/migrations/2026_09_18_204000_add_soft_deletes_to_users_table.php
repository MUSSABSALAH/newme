<?php

declare(strict_types=1);

use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->softDeletes();
        });

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach ([PermissionName::UsersDelete, PermissionName::CustomersDelete] as $permission) {
            Permission::findOrCreate($permission->value);
        }

        $superAdmin = Role::query()
            ->where('name', RoleName::SuperAdmin->value)
            ->first();

        if ($superAdmin instanceof Role) {
            $superAdmin->givePermissionTo([
                PermissionName::UsersDelete->value,
                PermissionName::CustomersDelete->value,
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropSoftDeletes();
        });
    }
};
