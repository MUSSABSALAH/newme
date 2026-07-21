<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PlanVersion>
 */
class PlanVersionFactory extends Factory
{
    /**
     * @var class-string<PlanVersion>
     */
    protected $model = PlanVersion::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_id' => Plan::factory(),
            'version_number' => 1,
            'status' => PlanVersionStatus::Draft->value,
            'published_at' => null,
            'created_by' => null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => PlanVersionStatus::Published->value,
            'published_at' => now(),
        ]);
    }
}
