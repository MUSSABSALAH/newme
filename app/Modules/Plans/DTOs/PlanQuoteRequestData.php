<?php

declare(strict_types=1);

namespace App\Modules\Plans\DTOs;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Support\Dto\Data;

final class PlanQuoteRequestData extends Data
{
    /**
     * @param  list<string>  $mealTypes  Chosen meal types (sorted, normalized).
     * @param  list<int>  $selectedDays  Chosen delivery weekdays (0=Sunday..6=Saturday).
     */
    public function __construct(
        public readonly array $mealTypes,
        public readonly DurationUnit $durationUnit,
        public readonly int $durationLength,
        public readonly array $selectedDays,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $unit = $attributes['duration_unit'] ?? DurationUnit::Day->value;
        $days = $attributes['selected_days'] ?? [];
        $mealTypes = $attributes['meal_types'] ?? [];

        $mealTypesKey = MealType::key(array_map(
            static fn ($value): string => (string) $value,
            is_array($mealTypes) ? $mealTypes : [],
        ));

        return new self(
            mealTypes: $mealTypesKey === '' ? [] : explode(',', $mealTypesKey),
            durationUnit: $unit instanceof DurationUnit ? $unit : DurationUnit::from((string) $unit),
            durationLength: max(1, (int) ($attributes['duration_length'] ?? 1)),
            selectedDays: array_values(array_unique(array_map(
                static fn ($day): int => (int) $day,
                is_array($days) ? $days : [],
            ))),
        );
    }

    public function mealTypesKey(): string
    {
        return implode(',', $this->mealTypes);
    }
}
