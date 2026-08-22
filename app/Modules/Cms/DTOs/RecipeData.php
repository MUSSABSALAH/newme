<?php

declare(strict_types=1);

namespace App\Modules\Cms\DTOs;

use App\Support\Dto\Data;
use Illuminate\Support\Str;

final class RecipeData extends Data
{
    /**
     * @param  array<string, string>  $category
     * @param  array<string, string>  $title
     * @param  array<string, string>  $excerpt
     * @param  array<string, string>  $metaTitle
     * @param  array<string, string>  $timeLabel
     * @param  array<string, string>  $kcalLabel
     * @param  array<string, string>  $proteinLabel
     * @param  array<string, string>  $servingsLabel
     * @param  array<string, list<string>>  $ingredients
     * @param  array<string, list<string>>  $steps
     * @param  array<string, string>  $ctaLabel
     */
    public function __construct(
        public readonly string $slug,
        public readonly array $category,
        public readonly array $title,
        public readonly array $excerpt,
        public readonly array $metaTitle,
        public readonly array $timeLabel,
        public readonly array $kcalLabel,
        public readonly array $proteinLabel,
        public readonly array $servingsLabel,
        public readonly array $ingredients,
        public readonly array $steps,
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
            $slug = Str::slug($title['en'] ?? $title['ar'] ?? 'recipe');
        }

        $image = $attributes['image_path'] ?? null;
        $ctaUrl = $attributes['cta_url'] ?? null;

        return new self(
            slug: $slug,
            category: self::localeStrings($attributes['category'] ?? []),
            title: $title,
            excerpt: self::localeStrings($attributes['excerpt'] ?? []),
            metaTitle: self::localeStrings($attributes['meta_title'] ?? []),
            timeLabel: self::localeStrings($attributes['time_label'] ?? []),
            kcalLabel: self::localeStrings($attributes['kcal_label'] ?? []),
            proteinLabel: self::localeStrings($attributes['protein_label'] ?? []),
            servingsLabel: self::localeStrings($attributes['servings_label'] ?? []),
            ingredients: self::localeLists($attributes['ingredients'] ?? []),
            steps: self::localeLists($attributes['steps'] ?? []),
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

    /**
     * Accepts either locale => list, or locale => newline-separated string (from forms).
     *
     * @param  mixed  $value
     * @return array<string, list<string>>
     */
    private static function localeLists($value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $out = [];
        foreach ($value as $locale => $items) {
            if (! is_string($locale)) {
                continue;
            }

            if (is_string($items)) {
                $items = preg_split('/\r\n|\r|\n/', $items) ?: [];
            }

            if (! is_array($items)) {
                continue;
            }

            $list = [];
            foreach ($items as $item) {
                if (is_string($item) && trim($item) !== '') {
                    $list[] = trim($item);
                }
            }

            if ($list !== []) {
                $out[$locale] = $list;
            }
        }

        return $out;
    }
}
