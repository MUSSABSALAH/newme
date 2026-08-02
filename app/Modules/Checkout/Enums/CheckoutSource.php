<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Enums;

/**
 * What the customer is paying for in the current checkout.
 */
enum CheckoutSource: string
{
    case Cart = 'cart';
    case Subscription = 'subscription';

    public function label(): string
    {
        return (string) __('checkout.sources.'.$this->value);
    }
}
