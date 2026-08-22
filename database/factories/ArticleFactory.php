<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Cms\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * @var class-string<Article>
     */
    protected $model = Article::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $slug = Str::slug(fake()->unique()->words(3, true));

        return [
            'public_id' => (string) Str::ulid(),
            'slug' => $slug,
            'category' => ['ar' => 'تغذية', 'en' => 'Nutrition'],
            'title' => ['ar' => 'مقال '.$slug, 'en' => 'Article '.$slug],
            'excerpt' => ['ar' => 'مقتطف قصير.', 'en' => 'A short excerpt.'],
            'author' => ['ar' => 'فريق نيومي', 'en' => 'New Me team'],
            'read_time' => ['ar' => '4 دقائق قراءة', 'en' => '4 min read'],
            'body_1' => ['ar' => 'الفقرة الأولى.', 'en' => 'First paragraph.'],
            'body_2' => ['ar' => 'الفقرة الثانية.', 'en' => 'Second paragraph.'],
            'highlight' => ['ar' => 'نقطة بارزة.', 'en' => 'A highlight.'],
            'body_3' => ['ar' => 'الفقرة الثالثة.', 'en' => 'Third paragraph.'],
            'cta_label' => ['ar' => 'اعرف المزيد ←', 'en' => 'Learn more →'],
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
