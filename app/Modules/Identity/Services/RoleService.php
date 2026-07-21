<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\DTOs\RoleData;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Exceptions\RoleInUseException;
use App\Modules\Identity\Exceptions\SystemRoleException;
use App\Modules\Identity\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

final class RoleService
{
    private const GUARD = 'web';

    public function __construct(private readonly AuditService $audit) {}

    public function create(RoleData $data): Role
    {
        return DB::transaction(function () use ($data): Role {
            $role = new Role([
                'name' => $this->uniqueSlug($this->baseName($data)),
                'guard_name' => self::GUARD,
            ]);
            $role->setTranslations('display_name', $data->displayName);
            $role->save();

            $role->syncPermissions($data->permissions);

            $this->audit->log(AuditAction::RoleCreated, $role, [], [
                'name' => $role->name,
                'display_name' => $role->getTranslations('display_name'),
                'permissions' => $data->permissions,
            ]);

            $this->flushCache();

            return $role;
        });
    }

    /**
     * The machine identifier is fixed after creation. The Super Admin role keeps
     * every permission; system role display names are managed by the platform and
     * are not editable, while their permissions may still be adjusted.
     */
    public function update(Role $role, RoleData $data): Role
    {
        return DB::transaction(function () use ($role, $data): Role {
            $old = [
                'display_name' => $role->getTranslations('display_name'),
                'permissions' => $role->permissions->pluck('name')->all(),
            ];

            if (! $this->isSystemRole($role)) {
                $role->setTranslations('display_name', $data->displayName);
                $role->save();
            }

            if (! $this->isSuperAdmin($role)) {
                $role->syncPermissions($data->permissions);
            }

            $this->audit->log(AuditAction::RoleUpdated, $role, $old, [
                'display_name' => $role->getTranslations('display_name'),
                'permissions' => $role->fresh()?->permissions->pluck('name')->all() ?? [],
            ]);

            $this->flushCache();

            return $role;
        });
    }

    /**
     * @throws SystemRoleException
     * @throws RoleInUseException
     */
    public function delete(Role $role): void
    {
        if ($this->isSystemRole($role)) {
            throw new SystemRoleException;
        }

        if ($role->users()->count() > 0) {
            throw new RoleInUseException;
        }

        DB::transaction(function () use ($role): void {
            $old = [
                'name' => $role->name,
                'display_name' => $role->getTranslations('display_name'),
            ];

            $role->delete();

            $this->audit->log(AuditAction::RoleDeleted, $role, $old);

            $this->flushCache();
        });
    }

    public function isSystemRole(Role $role): bool
    {
        return in_array($role->name, RoleName::values(), true);
    }

    public function isSuperAdmin(Role $role): bool
    {
        return $role->name === RoleName::SuperAdmin->value;
    }

    private function baseName(RoleData $data): string
    {
        if (isset($data->displayName['en'])) {
            return $data->displayName['en'];
        }

        if (isset($data->displayName['ar'])) {
            return $data->displayName['ar'];
        }

        return array_values($data->displayName)[0] ?? '';
    }

    private function uniqueSlug(string $value): string
    {
        $base = Str::slug($value, '_');

        if ($base === '') {
            $base = 'role';
        }

        $slug = $base;
        $suffix = 2;

        while (Role::query()->where('name', $slug)->where('guard_name', self::GUARD)->exists()) {
            $slug = $base.'_'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function flushCache(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
