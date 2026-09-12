<?php

declare(strict_types=1);

namespace Tests\Feature\Store;

use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Modules\Store\Seeders\StoreCatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class StoreCatalogSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_imports_the_pdf_catalog_with_exact_image_filenames(): void
    {
        $this->seed(StoreCatalogSeeder::class);

        $payload = json_decode(
            (string) file_get_contents(database_path('data/store-catalog-2026.json')),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );
        $items = is_array($payload['products'] ?? null) ? $payload['products'] : [];

        $this->assertCount(78, $items);
        $this->assertSame(78, Product::query()->where('is_active', true)->count());
        $this->assertTrue(Category::query()->where('slug', 'pantry')->exists());
        $this->assertFalse(Category::query()->where('slug', 'others')->exists());

        foreach ($items as $item) {
            $this->assertIsArray($item);
            $product = Product::query()->where('slug', $item['slug'])->first();
            $this->assertNotNull($product, 'Missing product '.$item['slug']);
            $this->assertSame($item['image'], $product->image_path);
            $this->assertSame($item['category'], $product->category?->slug);
        }

        $this->assertSame(
            'store/products/Zaatar-Croissant.jpg',
            Product::query()->where('slug', 'zaatar-croissant')->value('image_path'),
        );
        $this->assertSame(
            'store/products/DATE-MAAMOUL-.jpg',
            Product::query()->where('slug', 'date-maamoul')->value('image_path'),
        );
    }

    public function test_the_store_page_lists_the_seeded_catalog(): void
    {
        $this->seed(StoreCatalogSeeder::class);

        $this->get(route('website.store'))
            ->assertOk()
            ->assertSee('data-cat="pantry"', false)
            ->assertSee('خبز عربي', false)
            ->assertSee('كيكة ماربل', false)
            ->assertSee('المؤن', false)
            ->assertSee('Zaatar-Croissant.jpg', false);
    }
}
