<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Collection;

final class SubscriptionsPanelData
{
    /**
     * @param  array<string, int>  $byStatus
     * @param  Collection<int, Subscription>  $recent
     */
    public function __construct(
        public readonly int $active,
        public readonly int $paused,
        public readonly int $needingAttention,
        public readonly int $newMonth,
        public readonly array $byStatus,
        public readonly Collection $recent,
    ) {}
}
