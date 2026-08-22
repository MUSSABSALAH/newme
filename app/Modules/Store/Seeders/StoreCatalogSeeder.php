<?php

declare(strict_types=1);

namespace App\Modules\Store\Seeders;

use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Support\Money\Money;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Imports the static store catalog (config/website_store.php + lang copy)
 * into the categories/products tables.
 */
class StoreCatalogSeeder extends Seeder
{
    /**
     * Top-level categories, in display order.
     *
     * @var list<string>
     */
    private array $topCategories = ['bakery', 'sweets', 'others'];

    /**
     * Bakery subcategories, in display order.
     *
     * @var list<string>
     */
    private array $bakerySubs = ['bread', 'croissant', 'crackers', 'rusk', 'pies', 'crumbs'];

    public function run(): void
    {
        /** @var array<string, mixed> $catalog */
        $catalog = config('website_store', ['products' => []]);
        $products = is_array($catalog['products'] ?? null) ? $catalog['products'] : [];

        $tabs = $this->translations('website.store.tabs');
        $subs = $this->translations('website.store.subs');
        $names = $this->translations('website.store.products');

        // Category slug => Category model (cache to attach products).
        $categories = [];

        // Top-level categories.
        $sort = 0;
        foreach ($this->topCategories as $slug) {
            $categories[$slug] = $this->upsertCategory(
                slug: $slug,
                name: $this->localePair($tabs, $slug, $slug),
                parentId: null,
                sortOrder: $sort++,
            );
        }

        // Soft-delete the temporary flat "flour" category if it exists.
        Category::withTrashed()
            ->where('slug', 'flour')
            ->get()
            ->each(function (Category $category): void {
                if ($category->trashed()) {
                    return;
                }
                $category->delete();
            });

        // Bakery subcategories.
        $sort = 0;
        foreach ($this->bakerySubs as $slug) {
            $categories[$slug] = $this->upsertCategory(
                slug: $slug,
                name: $this->localePair($subs, $slug, $slug),
                parentId: $categories['bakery']->id,
                sortOrder: $sort++,
            );
        }

        // Products.
        foreach ($products as $index => $item) {
            if (! is_array($item) || empty($item['id'])) {
                continue;
            }

            $cat = (string) ($item['cat'] ?? 'others');
            $sub = (string) ($item['sub'] ?? '');
            $leafSlug = $cat === 'bakery'
                ? ($sub !== '' ? $sub : 'bakery')
                : $cat;

            $category = $categories[$leafSlug] ?? $categories['others'] ?? null;
            if ($category === null) {
                continue;
            }

            $id = (string) $item['id'];

            Product::withTrashed()->updateOrCreate(
                ['slug' => $id],
                [
                    'category_id' => $category->id,
                    'name' => $this->localePair($names, $id, Str::headline($id)),
                    'description' => ['ar' => '', 'en' => ''],
                    'image_path' => $this->storeImage($this->stringOrNull($item['img'] ?? null)),
                    'external_url' => $this->stringOrNull($item['href'] ?? null),
                    'price' => $this->toMinor($item['price'] ?? '0'),
                    'calories' => isset($item['kcal']) ? (int) $item['kcal'] : null,
                    'serving_size' => $this->stringOrNull($item['serving'] ?? null),
                    'protein_g' => $this->stringOrNull($item['protein'] ?? null),
                    'carbs_g' => $this->stringOrNull($item['carbs'] ?? null),
                    'fat_g' => $this->stringOrNull($item['fat'] ?? null),
                    'nutrition_note' => $this->stringOrNull($item['note'] ?? null),
                    'flag' => $this->stringOrNull($item['flag'] ?? null),
                    'is_featured' => (bool) ($item['feat'] ?? false),
                    'is_active' => true,
                    'sort_order' => (int) $index,
                    'deleted_at' => null,
                ],
            );
        }
    }

    /**
     * @param  array{ar: array<string, mixed>, en: array<string, mixed>}  $source
     * @return array<string, string>
     */
    private function localePair(array $source, string $key, string $fallback): array
    {
        return [
            'ar' => (string) ($source['ar'][$key] ?? $fallback),
            'en' => (string) ($source['en'][$key] ?? $fallback),
        ];
    }

    /**
     * Load a translation group for both locales.
     *
     * @return array{ar: array<string, mixed>, en: array<string, mixed>}
     */
    private function translations(string $key): array
    {
        return [
            'ar' => (array) App::make('translator')->get($key, [], 'ar'),
            'en' => (array) App::make('translator')->get($key, [], 'en'),
        ];
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
     * Copy a static product image from public/assets/images into the public
     * storage disk (store/products) so admin-managed and seeded images share
     * the same location, and return the storage-relative path.
     */
    private function storeImage(?string $filename): ?string
    {
        if ($filename === null || trim($filename) === '') {
            return null;
        }

        $target = 'store/products/'.$filename;
        $source = public_path('assets/images/'.$filename);

        if (! Storage::disk('public')->exists($target) && is_file($source)) {
            Storage::disk('public')->put($target, (string) file_get_contents($source));
        }

        // Prefer the storage-relative path whenever the file is available under
        // either the public disk or the committed public/storage tree.
        if (
            Storage::disk('public')->exists($target)
            || is_file(public_path('storage/'.$target))
        ) {
            return $target;
        }

        // Last resort: keep pointing at the static assets folder.
        return is_file($source) ? $filename : null;
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
     * @param  mixed  $value
     */
    private function toMinor($value): int
    {
        if ($value === null || $value === '') {
            return 0;
        }

        return Money::fromMajor((string) $value)->toMinor();
    }
}
