<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

/**
 * Today's shipping workload, as seen from the admin home screen.
 */
final class DeliveriesPanelData
{
    public function __construct(
        public readonly int $total,
        public readonly int $remaining,
        public readonly int $done,
        public readonly int $stops,
        public readonly int $orders,
    ) {}
}
