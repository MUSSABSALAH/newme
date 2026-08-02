<?php

declare(strict_types=1);

namespace App\Modules\Store\DTOs;

use App\Modules\Store\Enums\NutritionNote;
use App\Modules\Store\Enums\ProductFlag;
use App\Modules\Store\Enums\ServingSize;
use App\Support\Dto\Data;
use App\Support\Money\Money;

final class ProductData extends Data
{
    /**
     * @param  array<string, string>  $name  Locale-keyed product names.
     * @param  array<string, string>  $description  Locale-keyed descriptions.
     */
    public function __construct(
        public readonly int $categoryId,
        public readonly string $slug,
        public readonly array $name,
        public readonly array $description,
        public readonly ?string $imagePath,
        public readonly ?string $externalUrl,
        public readonly int $price,
        public readonly ?int $calories,
        public readonly ?ServingSize $servingSize,
        public readonly ?string $proteinG,
        public readonly ?string $carbsG,
        public readonly ?string $fatG,
        public readonly ?NutritionNote $nutritionNote,
        public readonly ?ProductFlag $flag,
        public readonly bool $isFeatured,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $image = $attributes['image_path'] ?? null;
        $url = $attributes['external_url'] ?? null;
        $serving = $attributes['serving_size'] ?? null;
        $note = $attributes['nutrition_note'] ?? null;
        $flag = $attributes['flag'] ?? null;

        return new self(
            categoryId: (int) ($attributes['category_id'] ?? 0),
            slug: (string) ($attributes['slug'] ?? ''),
            name: self::localeStrings($attributes['name'] ?? []),
            description: self::localeStrings($attributes['description'] ?? []),
            imagePath: is_string($image) && $image !== '' ? $image : null,
            externalUrl: is_string($url) && trim($url) !== '' ? trim($url) : null,
            price: self::toMinor($attributes['price'] ?? null),
            calories: self::nullableInt($attributes['calories'] ?? null),
            servingSize: self::toEnum(ServingSize::class, $serving),
            proteinG: self::nullableDecimal($attributes['protein_g'] ?? null),
            carbsG: self::nullableDecimal($attributes['carbs_g'] ?? null),
            fatG: self::nullableDecimal($attributes['fat_g'] ?? null),
            nutritionNote: self::toEnum(NutritionNote::class, $note),
            flag: self::toEnum(ProductFlag::class, $flag),
            isFeatured: (bool) ($attributes['is_featured'] ?? false),
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

    /**
     * @param  mixed  $value
     */
    private static function toMinor($value): int
    {
        if ($value === null || $value === '') {
            return 0;
        }

        if (is_int($value)) {
            return $value >= 0 ? $value : 0;
        }

        return Money::fromMajor((string) $value)->toMinor();
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableInt($value): ?int
    {
        return $value === null || $value === '' ? null : (int) $value;
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableDecimal($value): ?string
    {
        return $value === null || $value === '' ? null : (string) $value;
    }

    /**
     * @template T of \BackedEnum
     *
     * @param  class-string<T>  $enum
     * @param  mixed  $value
     * @return T|null
     */
    private static function toEnum(string $enum, $value): ?object
    {
        if ($value instanceof $enum) {
            return $value;
        }

        if ($value === null || $value === '') {
            return null;
        }

        return $enum::tryFrom((string) $value);
    }
}
