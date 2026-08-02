<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Subscriptions\Models\Subscription;

final class SubscriptionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::SubscriptionsView->value);
    }

    public function view(User $user, Subscription $subscription): bool
    {
        return $user->can(PermissionName::SubscriptionsView->value);
    }

    public function update(User $user, Subscription $subscription): bool
    {
        return $user->can(PermissionName::SubscriptionsManage->value);
    }
}
