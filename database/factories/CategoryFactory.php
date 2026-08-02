<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Store\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * @var class-string<Category>
     */
    protected $model = Category::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = (string) fake()->unique()->words(2, true);

        return [
            'public_id' => (string) Str::ulid(),
            'parent_id' => null,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 99999),
            'name' => ['en' => ucfirst($name), 'ar' => 'فئة '.$name],
            'description' => null,
            'image_path' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function child(Category $parent): static
    {
        return $this->state(fn (array $attributes): array => ['parent_id' => $parent->id]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }
}
