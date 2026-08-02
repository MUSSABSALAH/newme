<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Modules\Payments\Enums\PaymentMethod;
use App\Support\Money\Money;

final readonly class ChargeRequest
{
    public function __construct(
        public Money $amount,
        public PaymentMethod $method,
        public string $reference,
        public string $description,
        public ?CardDetails $card = null,
    ) {}
}
