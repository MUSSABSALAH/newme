<?php

declare(strict_types=1);

namespace App\Modules\Cms\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Cms\DTOs\ArticleData;
use App\Modules\Cms\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class ArticleService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(ArticleData $data): Article
    {
        return DB::transaction(function () use ($data): Article {
            $article = new Article;
            $this->fill($article, $data);
            $article->save();

            $this->audit->log(AuditAction::ArticleCreated, $article, [], $this->snapshot($article));

            return $article;
        });
    }

    public function update(Article $article, ArticleData $data): Article
    {
        return DB::transaction(function () use ($article, $data): Article {
            $old = $this->snapshot($article);

            $this->fill($article, $data);
            $article->save();

            $this->audit->log(AuditAction::ArticleUpdated, $article, $old, $this->snapshot($article->fresh() ?? $article));

            return $article;
        });
    }

    public function delete(Article $article): void
    {
        DB::transaction(function () use ($article): void {
            $old = $this->snapshot($article);

            $article->delete();

            $this->audit->log(AuditAction::ArticleArchived, $article, $old);
        });
    }

    private function fill(Article $article, ArticleData $data): void
    {
        $article->slug = $this->uniqueSlug($data->slug, $article->exists ? $article->id : null);
        $article->setTranslations('category', $data->category);
        $article->setTranslations('title', $data->title);
        $article->setTranslations('excerpt', $data->excerpt);
        $article->setTranslations('author', $data->author);
        $article->setTranslations('read_time', $data->readTime);
        $article->setTranslations('body_1', $data->body1);
        $article->setTranslations('body_2', $data->body2);
        $article->setTranslations('highlight', $data->highlight);
        $article->setTranslations('body_3', $data->body3);
        $article->setTranslations('cta_label', $data->ctaLabel);
        $article->cta_url = $data->ctaUrl;
        $article->is_active = $data->isActive;
        $article->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $article->image_path = $data->imagePath;
        }
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug) ?: 'article';
        $candidate = $base;
        $i = 2;

        while (
            Article::query()
                ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->where('slug', $candidate)
                ->exists()
        ) {
            $candidate = $base.'-'.$i;
            $i++;
        }

        return $candidate;
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Article $article): array
    {
        return [
            'slug' => $article->slug,
            'title' => $article->getTranslations('title'),
            'is_active' => $article->is_active,
            'sort_order' => $article->sort_order,
        ];
    }
}
