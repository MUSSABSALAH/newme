<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Meal>
 */
class MealFactory extends Factory
{
    /**
     * @var class-string<Meal>
     */
    protected $model = Meal::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = (string) fake()->unique()->words(2, true);

        return [
            'public_id' => (string) Str::ulid(),
            'meal_type' => fake()->randomElement(MealType::cases())->value,
            'name' => ['en' => ucfirst($name), 'ar' => 'وجبة '.$name],
            'calories' => fake()->numberBetween(200, 900),
            'protein_g' => fake()->numberBetween(10, 60),
            'carbs_g' => fake()->numberBetween(20, 120),
            'fat_g' => fake()->numberBetween(5, 40),
            'image_path' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function ofType(MealType $type): static
    {
        return $this->state(fn (array $attributes): array => ['meal_type' => $type->value]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }
}
