<?php

declare(strict_types=1);

namespace App\Modules\Orders\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Orders\Models\Order;

final class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::OrdersView->value);
    }

    public function view(User $user, Order $order): bool
    {
        return $user->can(PermissionName::OrdersView->value);
    }

    public function update(User $user, Order $order): bool
    {
        return $user->can(PermissionName::OrdersUpdate->value);
    }
}
