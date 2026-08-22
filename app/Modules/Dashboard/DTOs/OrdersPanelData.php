<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Orders\Models\Order;
use Illuminate\Support\Collection;

final class OrdersPanelData
{
    /**
     * @param  array<string, int>  $byStatus
     * @param  Collection<int, Order>  $recent
     */
    public function __construct(
        public readonly int $today,
        public readonly int $month,
        public readonly int $pending,
        public readonly array $byStatus,
        public readonly Collection $recent,
    ) {}
}
