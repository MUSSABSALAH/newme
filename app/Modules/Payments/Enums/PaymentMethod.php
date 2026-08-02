<?php

declare(strict_types=1);

namespace App\Modules\Payments\Enums;

enum PaymentMethod: string
{
    case Mada = 'mada';
    case Visa = 'visa';
    case ApplePay = 'apple_pay';
    case CashOnDelivery = 'cash_on_delivery';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $method): string => $method->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('payments.methods.'.$this->value);
    }

    /**
     * Card-based methods collect card details and settle immediately.
     */
    public function requiresCard(): bool
    {
        return in_array($this, [self::Mada, self::Visa], true);
    }

    /**
     * Methods settled after delivery leave the payment pending.
     */
    public function isDeferred(): bool
    {
        return $this === self::CashOnDelivery;
    }
}
