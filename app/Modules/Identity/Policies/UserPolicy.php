<?php

declare(strict_types=1);

namespace App\Modules\Identity\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;

final class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::UsersView->value);
    }

    public function view(User $user, User $target): bool
    {
        return $user->can(PermissionName::UsersView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::UsersCreate->value);
    }

    public function update(User $user, User $target): bool
    {
        return $user->can(PermissionName::UsersUpdate->value);
    }

    public function deactivate(User $user, User $target): bool
    {
        return $user->can(PermissionName::UsersDeactivate->value);
    }

    public function delete(User $user, User $target): bool
    {
        if ((int) $user->getKey() === (int) $target->getKey()) {
            return false;
        }

        if ($target->isStaff() && $this->isLastSuperAdmin($target)) {
            return false;
        }

        if ($target->isStaff()) {
            return $user->can(PermissionName::UsersDelete->value);
        }

        if ($target->isCustomer()) {
            return $user->can(PermissionName::CustomersDelete->value);
        }

        return false;
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(PermissionName::UsersDelete->value);
    }

    public function deleteAnyCustomer(User $user): bool
    {
        return $user->can(PermissionName::CustomersDelete->value);
    }

    public function invite(User $user): bool
    {
        return $user->can(PermissionName::UsersInvite->value);
    }

    private function isLastSuperAdmin(User $target): bool
    {
        if (! $target->hasRole(RoleName::SuperAdmin->value)) {
            return false;
        }

        return User::query()->role(RoleName::SuperAdmin->value)->count() <= 1;
    }
}
