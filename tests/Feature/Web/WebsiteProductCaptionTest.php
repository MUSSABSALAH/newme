<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Modules\Store\Enums\ServingSize;
use App\Modules\Store\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class WebsiteProductCaptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_product_caption_is_one_line_on_the_product_store_and_home_pages(): void
    {
        $product = Product::factory()->create([
            'slug' => 'seed-bread',
            'name' => ['ar' => 'خبز البذور', 'en' => 'Seed bread'],
            'description' => [
                'ar' => "الحصة: 150 جرام\nلكل حصة 150 جرام",
                'en' => "Serving: 150 grams\nPer serving 150 grams",
            ],
            'serving_size' => ServingSize::PerServing,
            'is_active' => true,
            'is_featured' => true,
        ]);

        $oneLine = 'الحصة: 150 جرام · لكل حصة 150 جرام';

        $this->get(route('website.product.show', $product))
            ->assertOk()
            ->assertSee($oneLine, false)
            ->assertDontSee("الحصة: 150 جرام\nلكل حصة 150 جرام", false);

        $this->get(route('website.store'))
            ->assertOk()
            ->assertSee($oneLine, false);

        $this->get(route('website.main'))
            ->assertOk()
            ->assertSee($oneLine, false);
    }

    public function test_the_caption_does_not_repeat_the_serving_size_label(): void
    {
        $product = Product::factory()->create([
            'slug' => 'cheese-pie-caption',
            'name' => ['ar' => 'فطيرة جبن', 'en' => 'Cheese pie'],
            'description' => [
                'ar' => 'الحصة: 40 جرام — قطعة واحدة',
                'en' => 'Serving: 40 g — 1 piece',
            ],
            'serving_size' => ServingSize::PerPiece,
            'is_active' => true,
            'is_featured' => true,
        ]);

        $this->get(route('website.store'))
            ->assertOk()
            ->assertSee('الحصة: 40 جرام — قطعة واحدة', false)
            ->assertDontSee('الحصة: 40 جرام — قطعة واحدة · لكل قطعة', false);

        $this->get(route('website.product.show', $product))
            ->assertOk()
            ->assertSee('الحصة: 40 جرام — قطعة واحدة', false)
            ->assertDontSee('الحصة: 40 جرام — قطعة واحدة · لكل قطعة', false);
    }
}
