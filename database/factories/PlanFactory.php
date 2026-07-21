<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Plans\Enums\PlanGoal;
use App\Modules\Plans\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Plan>
 */
class PlanFactory extends Factory
{
    /**
     * @var class-string<Plan>
     */
    protected $model = Plan::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = (string) fake()->unique()->words(2, true);

        return [
            'public_id' => (string) Str::ulid(),
            'goal' => fake()->randomElement(PlanGoal::cases())->value,
            'name' => ['en' => ucfirst($name), 'ar' => 'باقة '.$name],
            'description' => ['en' => fake()->sentence(), 'ar' => 'وصف الباقة'],
            'features' => ['en' => ['Fresh meals', 'Free delivery'], 'ar' => ['وجبات طازجة', 'توصيل مجاني']],
            'image_path' => null,
            'requires_day_selection' => true,
            'min_delivery_days_per_week' => 5,
            'delivery_fee' => 0,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }
}
