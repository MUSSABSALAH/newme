<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Services;

use App\Modules\Delivery\DTOs\DeliveryBoard;
use App\Modules\Delivery\DTOs\SubscriptionStop;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Support\ScheduledDay;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Builds the day sheet the shipping team works from.
 *
 * Store orders and subscription days are gathered separately because they are
 * scheduled differently: an order sits in the queue from the moment it is
 * confirmed until someone hands it over, while a subscription day belongs to a
 * fixed date on the customer's calendar.
 */
final class DeliveryBoardService
{
    /** Order states that still owe the customer a hand-over. */
    public const OPEN_ORDER_STATUSES = [
        OrderStatus::Confirmed,
        OrderStatus::Preparing,
        OrderStatus::OutForDelivery,
    ];

    public function forDate(Carbon $date): DeliveryBoard
    {
        $day = $date->copy()->startOfDay();

        return new DeliveryBoard(
            date: $day,
            stops: $this->stops($day),
            orders: $this->orders($day),
        );
    }

    /**
     * Subscription days scheduled on this date, paused days left out.
     *
     * The schedule lives as JSON on the subscription, so the day is matched in
     * PHP after a coarse SQL filter; only subscriptions that can still deliver
     * (active, or paused with days kept from before the pause) are considered.
     *
     * @return list<SubscriptionStop>
     */
    private function stops(Carbon $date): array
    {
        $key = $date->toDateString();

        $subscriptions = Subscription::query()
            ->with('user')
            ->whereIn('status', [SubscriptionStatus::Active->value, SubscriptionStatus::Paused->value])
            ->where(fn ($query) => $query
                ->whereNull('start_date')
                ->orWhereDate('start_date', '<=', $key))
            ->get();

        $records = SubscriptionDelivery::query()
            ->with('handler')
            ->whereDate('delivery_date', $key)
            ->get()
            ->keyBy('subscription_id');

        $stops = [];

        foreach ($subscriptions as $subscription) {
            $meals = ScheduledDay::mealsFor($subscription, $key);

            if ($meals === null) {
                continue;
            }

            $stops[] = new SubscriptionStop(
                subscription: $subscription,
                date: $date->copy(),
                meals: $meals,
                record: $records->get($subscription->getKey()),
            );
        }

        // Grouping by area first turns the sheet into something close to a route.
        usort($stops, static function (SubscriptionStop $a, SubscriptionStop $b): int {
            return [$a->address()?->city ?? '', $a->customerName()]
                <=> [$b->address()?->city ?? '', $b->customerName()];
        });

        return $stops;
    }

    /**
     * Orders to hand over on this date.
     *
     * Orders have no delivery date of their own: the open queue belongs to
     * today, and any other date shows what was actually handed over then.
     *
     * @return Collection<int, Order>
     */
    private function orders(Carbon $date): Collection
    {
        $open = array_map(
            static fn (OrderStatus $status): string => $status->value,
            self::OPEN_ORDER_STATUSES,
        );

        return Order::query()
            ->with('user')
            ->withCount('items')
            ->where(function ($query) use ($date, $open): void {
                $query->whereDate('delivered_at', $date);

                if ($date->isToday()) {
                    $query->orWhereIn('status', $open);
                }
            })
            ->orderBy('placed_at')
            ->orderBy('id')
            ->get();
    }
}
