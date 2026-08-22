<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Identity\Models\BodyMeasurement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<BodyMeasurement>
 */
class BodyMeasurementFactory extends Factory
{
    protected $model = BodyMeasurement::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'user_id' => User::factory()->customer(),
            'measured_on' => fake()->dateTimeBetween('-6 months', 'today')->format('Y-m-d'),
            'weight_kg' => fake()->randomFloat(1, 55, 110),
            'height_cm' => fake()->randomFloat(1, 150, 195),
            'waist_cm' => fake()->randomFloat(1, 65, 120),
            'hip_cm' => fake()->randomFloat(1, 80, 130),
            'chest_cm' => fake()->randomFloat(1, 80, 130),
            'arm_cm' => fake()->randomFloat(1, 24, 45),
            'neck_cm' => fake()->randomFloat(1, 32, 48),
            'body_fat_percent' => fake()->randomFloat(1, 10, 40),
            'notes' => null,
        ];
    }
}
