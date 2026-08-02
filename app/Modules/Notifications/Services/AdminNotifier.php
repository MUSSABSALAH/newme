<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Services;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Notifications\Notifications\NewOrderNotification;
use App\Modules\Notifications\Notifications\NewSubscriptionNotification;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;

/**
 * Fans store activity out to the staff who are allowed to act on it.
 *
 * Recipients are derived from permissions rather than roles, so granting a new
 * role "orders.view" is enough to start receiving order notifications.
 */
final class AdminNotifier
{
    public function orderPlaced(Order $order): void
    {
        $recipients = $this->recipients(PermissionName::OrdersView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new NewOrderNotification($order));
        }
    }

    public function subscriptionStarted(Subscription $subscription): void
    {
        $recipients = $this->recipients(PermissionName::SubscriptionsView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new NewSubscriptionNotification($subscription));
        }
    }

    /**
     * Active staff holding the given permission, directly or through a role.
     *
     * @return Collection<int, User>
     */
    private function recipients(PermissionName $permission): Collection
    {
        return User::query()
            ->staff()
            ->where('status', UserStatus::Active->value)
            ->permission($permission->value)
            ->get();
    }
}
