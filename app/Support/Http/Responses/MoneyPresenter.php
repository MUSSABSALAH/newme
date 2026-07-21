<?php

declare(strict_types=1);

namespace App\Support\Http\Responses;

use App\Support\Money\Money;

/**
 * Renders a {@see Money} value object for API output without losing precision.
 *
 * Both the integer minor amount (authoritative) and a formatted decimal string
 * (display only) are returned, alongside the currency code.
 */
final class MoneyPresenter
{
    /**
     * @return array{minor: int, amount: string, currency: string}
     */
    public static function toArray(Money $money): array
    {
        return [
            'minor' => $money->toMinor(),
            'amount' => $money->format(),
            'currency' => $money->currency->code,
        ];
    }
}
