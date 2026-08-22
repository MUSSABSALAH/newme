<?php

declare(strict_types=1);

namespace App\Modules\Payments\Contracts;

use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;

/**
 * The seam a real payment provider plugs into.
 *
 * Implementations answer with a {@see ChargeResult} instead of throwing, so the
 * caller treats a decline as a normal outcome rather than an error.
 */
interface PaymentGateway
{
    public function name(): string;

    /**
     * Hosted providers send the customer off-site instead of taking a card here.
     */
    public function usesHostedCheckout(): bool;

    public function charge(ChargeRequest $request): ChargeResult;
}
