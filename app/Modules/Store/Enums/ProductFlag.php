<?php

declare(strict_types=1);

namespace App\Modules\Store\Enums;

/**
 * Optional promotional badge shown on a product card.
 */
enum ProductFlag: string
{
    case Sale = 'sale';
    case Bestseller = 'bestseller';
    case Occasions = 'occasions';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $flag): string => $flag->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('products.flags.'.$this->value);
    }
}
