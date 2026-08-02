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

    public function charge(ChargeRequest $request): ChargeResult;
}
