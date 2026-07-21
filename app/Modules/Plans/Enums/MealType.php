<?php

declare(strict_types=1);

namespace App\Modules\Plans\Enums;

/**
 * A meal slot within a plan (breakfast, lunch, dinner, snack).
 *
 * Meal types drive both the pricing matrix (each price applies to a chosen set
 * of meal types) and the plan's available-meals catalog.
 */
enum MealType: string
{
    case Breakfast = 'breakfast';
    case Lunch = 'lunch';
    case Dinner = 'dinner';
    case Snack = 'snack';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $type): string => $type->value, self::cases());
    }

    /**
     * Normalize a set of meal-type values into a stable, sorted key.
     *
     * @param  list<string>  $values
     */
    public static function key(array $values): string
    {
        $valid = array_values(array_unique(array_filter(
            $values,
            static fn (string $value): bool => in_array($value, self::values(), true),
        )));

        usort($valid, static function (string $a, string $b): int {
            return array_search($a, self::values(), true) <=> array_search($b, self::values(), true);
        });

        return implode(',', $valid);
    }

    public function label(): string
    {
        return (string) __('meals.types.'.$this->value);
    }
}
