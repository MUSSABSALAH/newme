<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Consultations\Models\Consultation;
use Illuminate\Support\Collection;

final class ConsultationsPanelData
{
    /**
     * @param  array<string, int>  $byStatus
     * @param  Collection<int, Consultation>  $upcoming
     */
    public function __construct(
        public readonly int $pending,
        public readonly int $today,
        public readonly int $week,
        public readonly array $byStatus,
        public readonly Collection $upcoming,
    ) {}
}
