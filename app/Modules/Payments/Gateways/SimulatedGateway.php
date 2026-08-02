<?php

declare(strict_types=1);

namespace App\Modules\Payments\Gateways;

use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\DTOs\CardDetails;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\Enums\PaymentDecline;
use Illuminate\Support\Str;

/**
 * Stand-in provider used until a real gateway is wired up.
 *
 * Outcomes are deterministic so demos and tests behave the same way. Card
 * numbers whose last four digits match a configured pattern are declined:
 *
 *   0002 → card declined      0069 → expired card
 *   0119 → insufficient funds 0127 → invalid card
 *
 * Anything else that passes the Luhn check and is not past its expiry is
 * approved.
 */
final class SimulatedGateway implements PaymentGateway
{
    /**
     * @var array<string, PaymentDecline>
     */
    private const DECLINE_SUFFIXES = [
        '0002' => PaymentDecline::CardDeclined,
        '0069' => PaymentDecline::ExpiredCard,
        '0119' => PaymentDecline::InsufficientFunds,
        '0127' => PaymentDecline::InvalidCard,
    ];

    public function name(): string
    {
        return 'simulated';
    }

    public function charge(ChargeRequest $request): ChargeResult
    {
        $reference = 'SIM_'.Str::upper(Str::random(16));

        if (! $request->method->requiresCard()) {
            return ChargeResult::approved($reference);
        }

        $card = $request->card;

        if (! $card instanceof CardDetails) {
            return ChargeResult::declined($reference, PaymentDecline::InvalidCard);
        }

        $forced = self::DECLINE_SUFFIXES[$card->last4()] ?? null;

        if ($forced instanceof PaymentDecline) {
            return ChargeResult::declined($reference, $forced);
        }

        if ($card->hasExpired()) {
            return ChargeResult::declined($reference, PaymentDecline::ExpiredCard);
        }

        if (! $this->passesLuhn($card->number)) {
            return ChargeResult::declined($reference, PaymentDecline::InvalidCard);
        }

        return ChargeResult::approved($reference);
    }

    private function passesLuhn(string $number): bool
    {
        $digits = array_map('intval', str_split(strrev($number)));
        $sum = 0;

        foreach ($digits as $index => $digit) {
            if ($index % 2 === 1) {
                $digit *= 2;

                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        return $sum > 0 && $sum % 10 === 0;
    }
}
