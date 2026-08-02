<?php

declare(strict_types=1);

namespace App\Modules\Store\Enums;

/**
 * Serving size a product's nutrition figures refer to.
 */
enum ServingSize: string
{
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
}
