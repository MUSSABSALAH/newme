<?php

declare(strict_types=1);

namespace App\Modules\Identity\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;

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

    public function invite(User $user): bool
    {
        return $user->can(PermissionName::UsersInvite->value);
    }
}
