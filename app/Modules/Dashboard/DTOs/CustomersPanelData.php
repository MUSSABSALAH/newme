<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Models\User;
use Illuminate\Support\Collection;

final class CustomersPanelData
{
    /**
     * @param  Collection<int, User>  $recent
     */
    public function __construct(
        public readonly int $total,
        public readonly int $newToday,
        public readonly int $newMonth,
        public readonly Collection $recent,
    ) {}
}
