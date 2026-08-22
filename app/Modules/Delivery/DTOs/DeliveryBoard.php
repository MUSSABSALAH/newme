<?php

declare(strict_types=1);

namespace App\Modules\Delivery\DTOs;

use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Everything the shipping team has to hand over on one day.
 *
 * Two sources feed the same board: store orders, which carry their own
 * fulfillment status, and subscription delivery days, which are schedule
 * entries with a delivery record attached once they are worked on.
 */
final class DeliveryBoard
{
    /**
     * @param  list<SubscriptionStop>  $stops
     * @param  Collection<int, Order>  $orders
     */
    public function __construct(
        public readonly Carbon $date,
        public readonly array $stops,
        public readonly Collection $orders,
    ) {}

    public function isEmpty(): bool
    {
        return $this->stops === [] && $this->orders->isEmpty();
    }

    public function total(): int
    {
        return count($this->stops) + $this->orders->count();
    }

    /**
     * Still to be handed over — the number the officer works down to zero.
     */
    public function remaining(): int
    {
        return $this->stopsRemaining() + $this->ordersRemaining();
    }

    public function done(): int
    {
        return $this->total() - $this->remaining();
    }

    public function stopsRemaining(): int
    {
        return count(array_filter(
            $this->stops,
            static fn (SubscriptionStop $stop): bool => ! $stop->isSettled(),
        ));
    }

    public function ordersRemaining(): int
    {
        return $this->orders
            ->reject(static fn (Order $order): bool => $order->status->isTerminal())
            ->count();
    }

    /**
     * Orders already on the road, worth calling out separately from the queue.
     */
    public function ordersOnTheRoad(): int
    {
        return $this->orders
            ->where('status', OrderStatus::OutForDelivery)
            ->count();
    }
}
