<?php

declare(strict_types=1);

namespace App\Modules\Store\Enums;

/**
 * Serving size a product's nutrition figures refer to.
 */
enum ServingSize: string
{
    public const CUSTOM_CHOICE = '__other__';

    case Per30g = 'per_30g';
    case Per45g = 'per_45g';
    case PerServing = 'per_serving';
    case Per2Pieces = 'per_2_pieces';
    case PerPiece = 'per_piece';
    case PerSlice = 'per_slice';
    case PerHalf = 'per_half';
    case PerLoaf = 'per_loaf';
    case Per100g = 'per_100g';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $size): string => $size->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('products.servings.'.$this->value);
    }

    /**
     * Known option label, or the stored custom text as-is.
     */
    public static function labelFor(?string $value): string
    {
        if ($value === null || trim($value) === '') {
            return '';
        }

        return self::tryFrom($value)?->label() ?? $value;
    }

    /**
     * @return list<string>
     */
    public static function choiceValues(): array
    {
        return array_merge(self::values(), [self::CUSTOM_CHOICE]);
    }
}
