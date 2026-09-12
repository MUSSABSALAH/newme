<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Models\Recipe;
use App\Modules\Cms\Support\HomepageContentRegistry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class WebsiteCmsContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_page_renders_active_articles_and_recipes(): void
    {
        $article = Article::factory()->create([
            'slug' => 'test-lupin',
            'title' => ['ar' => 'مقال الترمس', 'en' => 'Lupin Article'],
            'is_active' => true,
        ]);
        Article::factory()->inactive()->create([
            'title' => ['ar' => 'مخفي', 'en' => 'Hidden Article'],
        ]);

        $recipe = Recipe::factory()->create([
            'slug' => 'test-toast',
            'title' => ['ar' => 'وصفة التوست', 'en' => 'Toast Recipe'],
            'is_active' => true,
        ]);
        Recipe::factory()->inactive()->create([
            'title' => ['ar' => 'وصفة مخفية', 'en' => 'Hidden Recipe'],
        ]);

        $this->get(route('website.blog'))
            ->assertOk()
            ->assertSee('مقال الترمس', false)
            ->assertSee('وصفة التوست', false)
            ->assertSee('article-test-lupin', false)
            ->assertSee('recipe-test-toast', false)
            ->assertSee(route('website.article', ['article' => 'test-lupin']), false)
            ->assertSee(route('website.recipe', ['recipe' => 'test-toast']), false)
            ->assertDontSee('مخفي', false)
            ->assertDontSee('وصفة مخفية', false);

        $this->assertNotNull($article->id);
        $this->assertNotNull($recipe->id);
    }

    public function test_article_page_renders_active_article(): void
    {
        $article = Article::factory()->create([
            'slug' => 'lupin-detail',
            'title' => ['ar' => 'مقال الترمس', 'en' => 'Lupin Detail Title'],
            'body_1' => ['ar' => 'الفقرة الأولى.', 'en' => 'Detail first paragraph.'],
            'is_active' => true,
        ]);

        $this->get(route('website.article', ['article' => $article->slug]))
            ->assertOk()
            ->assertSee('مقال الترمس', false)
            ->assertSee('الفقرة الأولى.', false)
            ->assertSee('kit-entry', false)
            ->assertSee('kit-post', false)
            ->assertSee('website-iphone.css', false);
    }

    public function test_inactive_article_is_not_found(): void
    {
        $article = Article::factory()->inactive()->create([
            'slug' => 'hidden-article',
        ]);

        $this->get(route('website.article', ['article' => $article->slug]))
            ->assertNotFound();
    }

    public function test_recipe_page_renders_active_recipe(): void
    {
        $recipe = Recipe::factory()->create([
            'slug' => 'toast-detail',
            'title' => ['ar' => 'وصفة التوست', 'en' => 'Toast Detail Title'],
            'ingredients' => ['ar' => ['بيض'], 'en' => ['Eggs']],
            'steps' => ['ar' => ['اخبز'], 'en' => ['Bake it']],
            'is_active' => true,
        ]);

        $this->get(route('website.recipe', ['recipe' => $recipe->slug]))
            ->assertOk()
            ->assertSee('وصفة التوست', false)
            ->assertSee('بيض', false)
            ->assertSee('اخبز', false)
            ->assertSee('kit-entry', false)
            ->assertSee('kit-rcols', false)
            ->assertSee('website-iphone.css', false);
    }

    public function test_inactive_recipe_is_not_found(): void
    {
        $recipe = Recipe::factory()->inactive()->create([
            'slug' => 'hidden-recipe',
        ]);

        $this->get(route('website.recipe', ['recipe' => $recipe->slug]))
            ->assertNotFound();
    }

    public function test_main_page_shows_home_teasers_from_database(): void
    {
        Article::factory()->create([
            'slug' => 'home-article',
            'title' => ['ar' => 'مقال الرئيسية', 'en' => 'Home Article Title'],
            'excerpt' => ['ar' => 'مقتطف', 'en' => 'Home excerpt text'],
            'is_active' => true,
            'sort_order' => 0,
        ]);

        Recipe::factory()->create([
            'slug' => 'home-recipe',
            'title' => ['ar' => 'وصفة الرئيسية', 'en' => 'Home Recipe Title'],
            'excerpt' => ['ar' => 'مقتطف وصفة', 'en' => 'Home recipe excerpt'],
            'is_active' => true,
            'sort_order' => 0,
        ]);

        $this->get(route('website.main'))
            ->assertOk()
            ->assertSee('مقال الرئيسية', false)
            ->assertSee('وصفة الرئيسية', false)
            ->assertSee('article-home-article', false)
            ->assertSee('recipe-home-recipe', false);
    }

    public function test_main_page_leads_with_free_delivery_over_200(): void
    {
        $this->get(route('website.main'))
            ->assertOk()
            ->assertSee(__('website.site.announce.shipping'), false)
            ->assertSee(__('website.site.announce.partners'), false)
            ->assertSee(__('website.site.announce.consult'), false)
            ->assertSee('ship-announce', false);
    }

    public function test_main_page_shows_saved_announce_shipping_text(): void
    {
        PageContent::query()->create([
            'page' => HomepageContentRegistry::PAGE,
            'key' => HomepageContentRegistry::ANNOUNCE_SHIPPING,
            'value' => [
                'ar' => 'التوصيل مجاني فوق <b>350 ريال</b>',
                'en' => 'Free delivery on orders over <b>SAR 350</b>',
            ],
        ]);

        PageContent::query()->create([
            'page' => HomepageContentRegistry::PAGE,
            'key' => HomepageContentRegistry::ANNOUNCE_PARTNERS,
            'value' => [
                'ar' => 'شركاء محدثون',
                'en' => 'Updated partners line',
            ],
        ]);

        $this->get(route('website.main'))
            ->assertOk()
            ->assertSee('التوصيل مجاني فوق <b>350 ريال</b>', false)
            ->assertSee('شركاء محدثون', false)
            ->assertSee(__('website.site.announce.consult'), false)
            ->assertSee('ship-announce', false);
    }
}
