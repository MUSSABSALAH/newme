<?php

declare(strict_types=1);

namespace App\Modules\Store\DTOs;

use App\Support\Dto\Data;

final class CategoryData extends Data
{
    /**
     * @param  array<string, string>  $name  Locale-keyed category names.
     * @param  array<string, string>  $description  Locale-keyed descriptions.
     */
    public function __construct(
        public readonly ?int $parentId,
        public readonly string $slug,
        public readonly array $name,
        public readonly array $description,
        public readonly ?string $imagePath,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $parentId = $attributes['parent_id'] ?? null;
        $image = $attributes['image_path'] ?? null;

        return new self(
            parentId: $parentId === null || $parentId === '' ? null : (int) $parentId,
            slug: (string) ($attributes['slug'] ?? ''),
            name: self::localeStrings($attributes['name'] ?? []),
            description: self::localeStrings($attributes['description'] ?? []),
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
        return array_filter(
            is_array($value) ? $value : [],
            static fn ($item): bool => is_string($item) && trim($item) !== '',
        );
    }
}
