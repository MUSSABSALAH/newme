<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Modules\Payments\Enums\PaymentDecline;

final readonly class ChargeResult
{
    private function __construct(
        public bool $approved,
        public string $gatewayReference,
        public ?PaymentDecline $decline = null,
    ) {}

    public static function approved(string $gatewayReference): self
    {
        return new self(true, $gatewayReference);
    }

    public static function declined(string $gatewayReference, PaymentDecline $decline): self
    {
        return new self(false, $gatewayReference, $decline);
    }
}
