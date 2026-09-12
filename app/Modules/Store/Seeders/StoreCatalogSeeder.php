<?php

declare(strict_types=1);

namespace App\Modules\Store\Seeders;

use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Support\Money\Money;
use Illuminate\Database\Seeder;

/**
 * Imports store categories and the September 2026 product catalog
 * (database/data/store-catalog-2026.json) with official nutrition and photos.
 */
class StoreCatalogSeeder extends Seeder
{
    /**
     * Current store categories, in display order. All are top-level.
     *
     * @var array<string, array{ar: string, en: string}>
     */
    private array $catalog = [
        'bakery' => ['ar' => 'المخبوزات', 'en' => 'Bakery'],
        'shabura' => ['ar' => 'الشابورة', 'en' => 'Shabura'],
        'crackers' => ['ar' => 'المقرمشات', 'en' => 'Crackers'],
        'samosa' => ['ar' => 'السمبوسه', 'en' => 'Samosa'],
        'flour' => ['ar' => 'دقيق ومعكرونة', 'en' => 'Flour & Pasta'],
        'sandwiches' => ['ar' => 'الساندويشات', 'en' => 'Sandwiches'],
        'hot_dishes' => ['ar' => 'أطباق ساخنة', 'en' => 'Hot dishes'],
        'salads' => ['ar' => 'السلطات', 'en' => 'Salads'],
        'fermented' => ['ar' => 'مخمرات', 'en' => 'Pickles'],
        'sweets' => ['ar' => 'الحلى', 'en' => 'Sweets'],
        'pantry' => ['ar' => 'المؤن', 'en' => 'Pantry'],
    ];

    /**
     * Legacy slugs that should be renamed before upsert.
     *
     * @var array<string, string>
     */
    private array $slugAliases = [
        'rusk' => 'shabura',
        'others' => 'pantry',
    ];

    public function run(): void
    {
        $this->renameAliasedSlugs();

        $categories = [];
        $sort = 0;
        foreach ($this->catalog as $slug => $name) {
            $categories[$slug] = $this->upsertCategory(
                slug: $slug,
                name: $name,
                parentId: null,
                sortOrder: $sort++,
            );
        }

        $this->retireUnknownCategories($categories);
        $imported = $this->importCatalogProducts($categories);
        $this->command?->info("Updated {$imported} catalog products.");
    }

    /**
     * @param  array<string, Category>  $categories
     */
    private function importCatalogProducts(array $categories): int
    {
        $path = database_path('data/store-catalog-2026.json');
        if (! is_file($path)) {
            throw new \RuntimeException('Missing store catalog JSON: '.$path);
        }

        /** @var array{products?: list<array<string, mixed>>} $payload */
        $payload = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        $items = is_array($payload['products'] ?? null) ? $payload['products'] : [];
        $keep = [];

        foreach ($items as $item) {
            if (! is_array($item) || empty($item['slug'])) {
                continue;
            }

            $slug = (string) $item['slug'];
            $keep[] = $slug;
            $category = $categories[(string) ($item['category'] ?? '')] ?? $categories['pantry'] ?? null;
            if ($category === null) {
                continue;
            }

            $name = is_array($item['name'] ?? null) ? $item['name'] : [];
            $serving = is_string($item['serving'] ?? null) ? $item['serving'] : null;

            Product::withTrashed()->updateOrCreate(
                ['slug' => $slug],
                [
                    'category_id' => $category->id,
                    'name' => [
                        'ar' => (string) ($name['ar'] ?? $slug),
                        'en' => (string) ($name['en'] ?? $slug),
                    ],
                    'description' => [
                        'ar' => $serving !== null ? 'الحصة: '.$serving : '',
                        'en' => $serving !== null ? 'Serving: '.$serving : '',
                    ],
                    'image_path' => $this->stringOrNull($item['image'] ?? null),
                    'external_url' => null,
                    'price' => $this->toMinor($item['price'] ?? null),
                    'calories' => $this->intOrZero($item['calories'] ?? null),
                    'serving_size' => $this->stringOrNull($item['serving_size'] ?? null),
                    'protein_g' => $this->decimalOrZero($item['protein_g'] ?? null),
                    'carbs_g' => $this->decimalOrZero($item['carbs_g'] ?? null),
                    'fat_g' => $this->decimalOrZero($item['fat_g'] ?? null),
                    'nutrition_note' => $this->stringOrNull($item['nutrition_note'] ?? null),
                    'flag' => null,
                    'is_featured' => false,
                    'is_active' => true,
                    'sort_order' => (int) ($item['n'] ?? 0),
                    'deleted_at' => null,
                ],
            );
        }

        if ($keep !== []) {
            Product::query()->whereNotIn('slug', $keep)->update(['is_active' => false]);
        }

        return count($keep);
    }

    /**
     * @param  array<string, Category>  $keep
     */
    private function retireUnknownCategories(array $keep): void
    {
        $fallback = $keep['bakery'] ?? $keep['pantry'] ?? null;
        $keepIds = array_map(static fn (Category $category): int => $category->id, $keep);

        Category::query()
            ->whereNotIn('id', $keepIds)
            ->get()
            ->each(function (Category $category) use ($fallback): void {
                if ($fallback instanceof Category) {
                    Product::withTrashed()
                        ->where('category_id', $category->id)
                        ->update(['category_id' => $fallback->id]);
                }

                $category->delete();
            });
    }

    private function renameAliasedSlugs(): void
    {
        foreach ($this->slugAliases as $from => $to) {
            $source = Category::withTrashed()->where('slug', $from)->first();
            $target = Category::withTrashed()->where('slug', $to)->first();

            if ($source === null) {
                continue;
            }

            if ($target === null) {
                $source->slug = $to;
                $source->parent_id = null;
                $source->save();

                continue;
            }

            if ($source->id === $target->id) {
                continue;
            }

            Product::withTrashed()
                ->where('category_id', $source->id)
                ->update(['category_id' => $target->id]);

            if (! $source->trashed()) {
                $source->delete();
            }
        }
    }

    /**
     * @param  array<string, string>  $name
     */
    private function upsertCategory(string $slug, array $name, ?int $parentId, int $sortOrder): Category
    {
        $category = Category::withTrashed()->updateOrCreate(
            ['slug' => $slug],
            [
                'parent_id' => $parentId,
                'name' => $name,
                'is_active' => true,
                'sort_order' => $sortOrder,
            ],
        );

        if ($category->trashed()) {
            $category->restore();
        }

        return $category->refresh();
    }

    /**
     * @param  mixed  $value
     */
    private function stringOrNull($value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = (string) $value;

        return trim($value) === '' ? null : $value;
    }

    /**
     * Missing macros still persist as 0 so every catalog row is complete.
     *
     * @param  mixed  $value
     */
    private function decimalOrZero($value): string
    {
        if ($value === null || $value === '' || ! is_numeric($value)) {
            return '0';
        }

        return (string) $value;
    }

    /**
     * @param  mixed  $value
     */
    private function intOrZero($value): int
    {
        if ($value === null || $value === '' || ! is_numeric($value)) {
            return 0;
        }

        return (int) $value;
    }

    /**
     * Missing prices still persist as 0 so the product is imported.
     *
     * @param  mixed  $value
     */
    private function toMinor($value): int
    {
        if ($value === null || $value === '' || ! is_numeric($value)) {
            return 0;
        }

        return Money::fromMajor((string) $value)->toMinor();
    }
}
