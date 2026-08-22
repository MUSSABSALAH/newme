<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Cms\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * @var class-string<Recipe>
     */
    protected $model = Recipe::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $slug = Str::slug(fake()->unique()->words(3, true));

        return [
            'public_id' => (string) Str::ulid(),
            'slug' => $slug,
            'category' => ['ar' => 'إفطار', 'en' => 'Breakfast'],
            'title' => ['ar' => 'وصفة '.$slug, 'en' => 'Recipe '.$slug],
            'excerpt' => ['ar' => 'مقتطف قصير.', 'en' => 'A short excerpt.'],
            'meta_title' => ['ar' => 'وصفة '.$slug, 'en' => 'Recipe '.$slug],
            'time_label' => ['ar' => '15 دقيقة', 'en' => '15 min'],
            'kcal_label' => ['ar' => '320 kcal', 'en' => '320 kcal'],
            'protein_label' => ['ar' => '21غ بروتين', 'en' => '21g protein'],
            'servings_label' => ['ar' => 'حصة واحدة', 'en' => '1 serving'],
            'ingredients' => [
                'ar' => ['مكون ١', 'مكون ٢'],
                'en' => ['Ingredient 1', 'Ingredient 2'],
            ],
            'steps' => [
                'ar' => ['خطوة ١', 'خطوة ٢'],
                'en' => ['Step 1', 'Step 2'],
            ],
            'cta_label' => ['ar' => 'تسوّق المكونات ←', 'en' => 'Shop ingredients →'],
            'cta_url' => '/store',
            'image_path' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }
}
