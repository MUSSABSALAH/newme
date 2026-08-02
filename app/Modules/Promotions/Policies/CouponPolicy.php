<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Promotions\Models\Coupon;

final class CouponPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::CouponsView->value);
    }

    public function view(User $user, Coupon $coupon): bool
    {
        return $user->can(PermissionName::CouponsView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::CouponsCreate->value);
    }

    public function update(User $user, Coupon $coupon): bool
    {
        return $user->can(PermissionName::CouponsUpdate->value);
    }

    public function delete(User $user, Coupon $coupon): bool
    {
        return $user->can(PermissionName::CouponsDelete->value);
    }
}
