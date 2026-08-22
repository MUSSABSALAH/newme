<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Policies;

use App\Models\User;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Identity\Enums\PermissionName;

/**
 * Guards the shipping board.
 *
 * Reading the day sheet and recording a hand-over are separate rights: a
 * coordinator watching the run should not be able to close deliveries they did
 * not make.
 */
final class SubscriptionDeliveryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::DeliveryView->value);
    }

    public function view(User $user, SubscriptionDelivery $delivery): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Record a hand-over, before any particular day exists as a record.
     */
    public function record(User $user): bool
    {
        return $user->can(PermissionName::DeliveryUpdate->value);
    }

    public function update(User $user, SubscriptionDelivery $delivery): bool
    {
        return $this->record($user);
    }
}
