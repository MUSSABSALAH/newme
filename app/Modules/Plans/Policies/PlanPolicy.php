<?php

declare(strict_types=1);

namespace App\Modules\Plans\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Plans\Models\Plan;

final class PlanPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::PlansView->value);
    }

    public function view(User $user, Plan $plan): bool
    {
        return $user->can(PermissionName::PlansView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::PlansManage->value);
    }

    public function update(User $user, Plan $plan): bool
    {
        return $user->can(PermissionName::PlansManage->value);
    }

    public function delete(User $user, Plan $plan): bool
    {
        return $user->can(PermissionName::PlansManage->value);
    }
}
