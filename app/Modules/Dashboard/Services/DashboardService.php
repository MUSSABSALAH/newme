<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\Services;

use App\Modules\Dashboard\DTOs\DashboardSnapshot;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Assembles the figures shown on the admin home screen.
 *
 * Every query is scoped to the current calendar day / month in the app
 * timezone so the numbers match what staff expect when they say "today".
 */
final class DashboardService
{
    public function snapshot(?Carbon $now = null): DashboardSnapshot
    {
        $now ??= Carbon::now();
        $startOfDay = $now->copy()->startOfDay();
        $startOfMonth = $now->copy()->startOfMonth();

        return new DashboardSnapshot(
            salesTodayMinor: $this->salesSince($startOfDay),
            salesMonthMinor: $this->salesSince($startOfMonth),
            ordersToday: Order::query()->where('placed_at', '>=', $startOfDay)->count(),
            ordersMonth: Order::query()->where('placed_at', '>=', $startOfMonth)->count(),
            ordersPending: Order::query()->where('status', OrderStatus::Pending->value)->count(),
            subscriptionsActive: Subscription::query()->where('status', SubscriptionStatus::Active->value)->count(),
            subscriptionsNeedingAttention: Subscription::query()
                ->where('handling_status', '!=', HandlingStatus::Handled->value)
                ->count(),
            invoicesMonth: Invoice::query()->where('issued_at', '>=', $startOfMonth)->count(),
            ordersByStatus: $this->statusCounts(Order::query()->toBase(), 'status', OrderStatus::values()),
            subscriptionsByStatus: $this->statusCounts(Subscription::query()->toBase(), 'status', SubscriptionStatus::values()),
            recentOrders: Order::query()
                ->with('user')
                ->latest('placed_at')
                ->latest('id')
                ->limit(5)
                ->get(),
            recentSubscriptions: Subscription::query()
                ->with(['user', 'handler'])
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function salesSince(Carbon $since): int
    {
        return (int) Invoice::query()
            ->where('issued_at', '>=', $since)
            ->sum('total_minor');
    }

    /**
     * @param  list<string>  $keys
     * @return array<string, int>
     */
    private function statusCounts(\Illuminate\Database\Query\Builder $query, string $column, array $keys): array
    {
        $counts = $query
            ->select($column, DB::raw('COUNT(*) as aggregate'))
            ->groupBy($column)
            ->pluck('aggregate', $column)
            ->all();

        $result = [];

        foreach ($keys as $key) {
            $result[$key] = (int) ($counts[$key] ?? 0);
        }

        return $result;
    }
}
