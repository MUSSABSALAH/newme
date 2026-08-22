<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * @var class-string<Consultation>
     */
    protected $model = Consultation::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'customer_name' => fake()->name(),
            'customer_email' => fake()->unique()->safeEmail(),
            'goal' => fake()->optional()->sentence(3),
            'scheduled_on' => now()->addDays(2)->toDateString(),
            'starts_at' => '10:00',
            'ends_at' => '11:00',
            'status' => ConsultationStatus::Pending->value,
            'notes' => null,
        ];
    }

    public function confirmed(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => ConsultationStatus::Confirmed->value,
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => ConsultationStatus::Cancelled->value,
        ]);
    }
}
