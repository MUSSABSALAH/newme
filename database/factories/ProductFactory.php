<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Store\Enums\NutritionNote;
use App\Modules\Store\Enums\ProductFlag;
use App\Modules\Store\Enums\ServingSize;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * @var class-string<Product>
     */
    protected $model = Product::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = (string) fake()->unique()->words(2, true);

        return [
            'public_id' => (string) Str::ulid(),
            'category_id' => Category::factory(),
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 99999),
            'name' => ['en' => ucfirst($name), 'ar' => 'منتج '.$name],
            'description' => null,
            'image_path' => null,
            'external_url' => null,
            'price' => fake()->numberBetween(500, 30000),
            'calories' => fake()->numberBetween(50, 500),
            'serving_size' => fake()->randomElement(ServingSize::cases())->value,
            'protein_g' => fake()->randomFloat(1, 0, 30),
            'carbs_g' => fake()->randomFloat(1, 0, 60),
            'fat_g' => fake()->randomFloat(1, 0, 30),
            'nutrition_note' => fake()->randomElement(NutritionNote::cases())->value,
            'flag' => fake()->optional()->randomElement(ProductFlag::cases())?->value,
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function inCategory(Category $category): static
    {
        return $this->state(fn (array $attributes): array => ['category_id' => $category->id]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }
}
