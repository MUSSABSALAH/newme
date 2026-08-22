<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Modules\Payments\Models\Payment;

/**
 * The recorded charge plus, for hosted gateways, where the customer should go next.
 */
final readonly class ChargeAttempt
{
    public function __construct(
        public Payment $payment,
        public ?string $redirectUrl = null,
    ) {}

    public function requiresRedirect(): bool
    {
        return is_string($this->redirectUrl) && $this->redirectUrl !== '';
    }
}
