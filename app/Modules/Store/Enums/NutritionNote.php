<?php

declare(strict_types=1);

namespace App\Modules\Store\Enums;

/**
 * Provenance of a product's nutrition figures.
 */
enum NutritionNote: string
{
    case Estimated = 'est';
    case Official = 'real';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $note): string => $note->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('products.notes.'.$this->value);
    }
}
