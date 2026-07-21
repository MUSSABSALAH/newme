<?php

declare(strict_types=1);

namespace App\Modules\Plans\DTOs;

use App\Modules\Plans\Enums\MealType;
use App\Support\Dto\Data;

final class MealData extends Data
{
    /**
     * @param  array<string, string>  $name  Locale-keyed meal names.
     */
    public function __construct(
        public readonly MealType $mealType,
        public readonly array $name,
        public readonly ?int $calories,
        public readonly ?int $proteinG,
        public readonly ?int $carbsG,
        public readonly ?int $fatG,
        public readonly ?string $imagePath,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $mealType = $attributes['meal_type'] ?? MealType::Breakfast->value;
        $name = $attributes['name'] ?? [];
        $image = $attributes['image_path'] ?? null;

        return new self(
            mealType: $mealType instanceof MealType ? $mealType : MealType::from((string) $mealType),
            name: array_filter(
                is_array($name) ? $name : [],
                static fn ($value): bool => is_string($value) && trim($value) !== '',
            ),
            calories: self::nullableInt($attributes['calories'] ?? null),
            proteinG: self::nullableInt($attributes['protein_g'] ?? null),
            carbsG: self::nullableInt($attributes['carbs_g'] ?? null),
            fatG: self::nullableInt($attributes['fat_g'] ?? null),
            imagePath: is_string($image) && $image !== '' ? $image : null,
            isActive: (bool) ($attributes['is_active'] ?? false),
            sortOrder: (int) ($attributes['sort_order'] ?? 0),
        );
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableInt($value): ?int
    {
        return $value === null || $value === '' ? null : (int) $value;
    }
}
