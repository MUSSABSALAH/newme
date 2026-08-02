<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Collection;

/**
 * Numbers and lists the admin dashboard needs in one trip.
 *
 * Sales figures are taken from issued invoices so only confirmed money is
 * counted — a cash-on-delivery order waiting for collection stays out.
 */
final class DashboardSnapshot
{
    /**
     * @param  array<string, int>  $ordersByStatus
     * @param  array<string, int>  $subscriptionsByStatus
     * @param  Collection<int, Order>  $recentOrders
     * @param  Collection<int, Subscription>  $recentSubscriptions
     */
    public function __construct(
        public readonly int $salesTodayMinor,
        public readonly int $salesMonthMinor,
        public readonly int $ordersToday,
        public readonly int $ordersMonth,
        public readonly int $ordersPending,
        public readonly int $subscriptionsActive,
        public readonly int $subscriptionsNeedingAttention,
        public readonly int $invoicesMonth,
        public readonly array $ordersByStatus,
        public readonly array $subscriptionsByStatus,
        public readonly Collection $recentOrders,
        public readonly Collection $recentSubscriptions,
    ) {}
}
