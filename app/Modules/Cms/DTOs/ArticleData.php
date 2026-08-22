<?php

declare(strict_types=1);

namespace App\Modules\Cms\DTOs;

use App\Support\Dto\Data;
use Illuminate\Support\Str;

final class ArticleData extends Data
{
    /**
     * @param  array<string, string>  $category
     * @param  array<string, string>  $title
     * @param  array<string, string>  $excerpt
     * @param  array<string, string>  $author
     * @param  array<string, string>  $readTime
     * @param  array<string, string>  $body1
     * @param  array<string, string>  $body2
     * @param  array<string, string>  $highlight
     * @param  array<string, string>  $body3
     * @param  array<string, string>  $ctaLabel
     */
    public function __construct(
        public readonly string $slug,
        public readonly array $category,
        public readonly array $title,
        public readonly array $excerpt,
        public readonly array $author,
        public readonly array $readTime,
        public readonly array $body1,
        public readonly array $body2,
        public readonly array $highlight,
        public readonly array $body3,
        public readonly array $ctaLabel,
        public readonly ?string $ctaUrl,
        public readonly ?string $imagePath,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $title = self::localeStrings($attributes['title'] ?? []);
        $slug = trim((string) ($attributes['slug'] ?? ''));

        if ($slug === '') {
            $slug = Str::slug($title['en'] ?? $title['ar'] ?? 'article');
        }

        $image = $attributes['image_path'] ?? null;
        $ctaUrl = $attributes['cta_url'] ?? null;

        return new self(
            slug: $slug,
            category: self::localeStrings($attributes['category'] ?? []),
            title: $title,
            excerpt: self::localeStrings($attributes['excerpt'] ?? []),
            author: self::localeStrings($attributes['author'] ?? []),
            readTime: self::localeStrings($attributes['read_time'] ?? []),
            body1: self::localeStrings($attributes['body_1'] ?? []),
            body2: self::localeStrings($attributes['body_2'] ?? []),
            highlight: self::localeStrings($attributes['highlight'] ?? []),
            body3: self::localeStrings($attributes['body_3'] ?? []),
            ctaLabel: self::localeStrings($attributes['cta_label'] ?? []),
            ctaUrl: is_string($ctaUrl) && $ctaUrl !== '' ? $ctaUrl : null,
            imagePath: is_string($image) && $image !== '' ? $image : null,
            isActive: (bool) ($attributes['is_active'] ?? false),
            sortOrder: (int) ($attributes['sort_order'] ?? 0),
        );
    }

    /**
     * @param  mixed  $value
     * @return array<string, string>
     */
    private static function localeStrings($value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $out = [];
        foreach ($value as $locale => $text) {
            if (is_string($locale) && is_string($text) && trim($text) !== '') {
                $out[$locale] = $text;
            }
        }

        return $out;
    }
}
