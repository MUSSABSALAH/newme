<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Listeners;

use App\Modules\Delivery\Walim\WalimShipmentService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Events\OrderStatusChanged;

/**
 * Staff cancelling an order also takes its task off Walim.
 */
final class CancelWalimShipment
{
    public function __construct(private readonly WalimShipmentService $shipments) {}

    public function handle(OrderStatusChanged $event): void
    {
        if ($event->actor === null || $event->order->status !== OrderStatus::Cancelled) {
            return;
        }

        $this->shipments->cancelForOrder($event->order);
    }
}
