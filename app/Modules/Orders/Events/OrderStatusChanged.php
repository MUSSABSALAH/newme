<?php

declare(strict_types=1);

namespace App\Modules\Orders\Events;

use App\Models\User;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;

/**
 * An order moved to a new fulfillment status. The actor is null when the
 * courier reported the change rather than a member of staff.
 */
final readonly class OrderStatusChanged
{
    public function __construct(
        public Order $order,
        public OrderStatus $previous,
        public ?User $actor,
    ) {}
}
