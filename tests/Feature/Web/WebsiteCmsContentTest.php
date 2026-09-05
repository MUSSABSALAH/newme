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
            ->assertSee(route('website.article', ['article' => 'test-lupin']), false)
            ->assertSee(route('website.recipe', ['recipe' => 'test-toast']), false)
            ->assertDontSee('Hidden Article', false)
            ->assertDontSee('Hidden Recipe', false);

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
            ->assertSee('Lupin Detail Title', false)
            ->assertSee('Detail first paragraph.', false);
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
            ->assertSee('Toast Detail Title', false)
            ->assertSee('Eggs', false)
            ->assertSee('Bake it', false);
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
            ->assertSee('Home Article Title', false)
            ->assertSee('Home Recipe Title', false)
            ->assertSee('article-home-article', false)
            ->assertSee('recipe-home-recipe', false);
    }
}
