<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Enums;

/**
 * How a store order reaches the customer.
 *
 * Subscriptions always deliver; only the store cart offers a branch pickup.
 */
enum FulfillmentMethod: string
{
    case Delivery = 'delivery';
    case Pickup = 'pickup';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $method): string => $method->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('checkout.fulfillment.'.$this->value);
    }

    public function requiresAddress(): bool
    {
        return $this === self::Delivery;
    }
}
