<?php

declare(strict_types=1);

namespace App\Modules\Plans\DTOs;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Support\Dto\Data;
use App\Support\Money\Money;

final class PricingRuleData extends Data
{
    /**
     * @param  list<string>  $mealTypes  Sorted, validated meal-type values.
     * @param  int  $price  Package price in integer minor units.
     * @param  string  $discountPercent  Discount as a decimal string (e.g. "10.00").
     */
    public function __construct(
        public readonly array $mealTypes,
        public readonly DurationUnit $durationUnit,
        public readonly int $durationLength,
        public readonly int $price,
        public readonly string $discountPercent,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $unit = $attributes['duration_unit'] ?? DurationUnit::Day->value;
        $price = $attributes['price'] ?? '0';
        $discount = $attributes['discount_percent'] ?? '0';
        $mealTypes = $attributes['meal_types'] ?? [];

        $mealTypesKey = MealType::key(array_map(
            static fn ($value): string => (string) $value,
            is_array($mealTypes) ? $mealTypes : [],
        ));

        return new self(
            mealTypes: $mealTypesKey === '' ? [] : explode(',', $mealTypesKey),
            durationUnit: $unit instanceof DurationUnit ? $unit : DurationUnit::from((string) $unit),
            durationLength: max(1, (int) ($attributes['duration_length'] ?? 1)),
            price: is_string($price) ? Money::fromMajor($price === '' ? '0' : $price)->toMinor() : (int) $price,
            discountPercent: number_format((float) $discount, 2, '.', ''),
            isActive: (bool) ($attributes['is_active'] ?? true),
            sortOrder: (int) ($attributes['sort_order'] ?? 0),
        );
    }

    public function mealTypesKey(): string
    {
        return implode(',', $this->mealTypes);
    }

    /**
     * @return array<string, mixed>
     */
    public function toAttributes(): array
    {
        return [
            'meal_types' => $this->mealTypes,
            'meal_types_key' => $this->mealTypesKey(),
            'duration_unit' => $this->durationUnit->value,
            'duration_length' => $this->durationLength,
            'price' => $this->price,
            'discount_percent' => $this->discountPercent,
            'is_active' => $this->isActive,
            'sort_order' => $this->sortOrder,
        ];
    }
}
