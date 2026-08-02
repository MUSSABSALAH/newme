<?php

declare(strict_types=1);

namespace App\Modules\Payments\Enums;

/**
 * Why a gateway refused a charge. Kept as an enum so the wording lives in the
 * translation files and a real gateway only has to map its own codes onto these.
 */
enum PaymentDecline: string
{
    case CardDeclined = 'card_declined';
    case InsufficientFunds = 'insufficient_funds';
    case ExpiredCard = 'expired_card';
    case InvalidCard = 'invalid_card';
    case GatewayError = 'gateway_error';

    public function message(): string
    {
        return (string) __('payments.declines.'.$this->value);
    }
}
