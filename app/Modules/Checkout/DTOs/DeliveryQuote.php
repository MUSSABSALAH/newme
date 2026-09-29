<?php

declare(strict_types=1);

namespace App\Modules\Checkout\DTOs;

use App\Modules\Delivery\Distance\DistanceResult;

/**
 * A store delivery fee and, in distance mode, the distance it was priced on.
 */
final readonly class DeliveryQuote
{
    public function __construct(
        public int $feeMinor,
        public ?DistanceResult $distance = null,
    ) {}
}
