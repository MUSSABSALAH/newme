<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Modules\Plans\Models\PlanVersion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin PlanVersion
 */
final class PlanVersionResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $version = $this->resource;

        if (! $version instanceof PlanVersion) {
            return [];
        }

        return [
            'version_number' => $version->version_number,
            'status' => $version->status->value,
            'published_at' => $version->published_at?->toIso8601String(),
        ];
    }
}
