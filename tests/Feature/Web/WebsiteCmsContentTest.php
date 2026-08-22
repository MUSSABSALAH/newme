<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Models\Recipe;
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
            ->assertSee('Lupin Article', false)
            ->assertSee('Toast Recipe', false)
            ->assertSee('article-test-lupin', false)
            ->assertSee('recipe-test-toast', false)
            ->assertDontSee('Hidden Article', false)
            ->assertDontSee('Hidden Recipe', false);

        $this->assertNotNull($article->id);
        $this->assertNotNull($recipe->id);
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
            ->assertSee('Home Article Title', false)
            ->assertSee('Home Recipe Title', false)
            ->assertSee('article-home-article', false)
            ->assertSee('recipe-home-recipe', false);
    }
}
