<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Enums;

/**
 * Who delivers store orders, and so which fee settings apply.
 */
enum DeliveryProvider: string
{
    case Internal = 'internal';
    case Walim = 'walim';

    /**
     * Prefix of this provider's fee settings in the registry.
     */
    public function feeSettingsPrefix(): string
    {
        return match ($this) {
            self::Internal => 'delivery',
            self::Walim => 'delivery_walim',
        };
    }
}
