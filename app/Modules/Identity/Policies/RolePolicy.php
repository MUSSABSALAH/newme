<?php

declare(strict_types=1);

namespace App\Modules\Identity\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use Spatie\Permission\Models\Role;

final class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::RolesView->value);
    }

    public function view(User $user, Role $role): bool
    {
        return $user->can(PermissionName::RolesView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::RolesManage->value);
    }

    public function update(User $user, Role $role): bool
    {
        return $user->can(PermissionName::RolesManage->value);
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->can(PermissionName::RolesManage->value);
    }
}
