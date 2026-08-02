<?php

declare(strict_types=1);

namespace App\Modules\Checkout\DTOs;

use App\Modules\Checkout\Enums\CheckoutSource;
use App\Support\Money\Money;

/**
 * What the customer is about to pay for, rendered the same way whether it came
 * from the store cart or the subscribe wizard.
 */
final readonly class CheckoutSummary
{
    /**
     * @param  list<array{label: string, value: string}>  $items  What is being bought.
     * @param  list<array{label: string, value: string}>  $lines  The price breakdown.
     */
    public function __construct(
        public CheckoutSource $source,
        public string $title,
        public array $items,
        public array $lines,
        public Money $total,
        public ?string $couponCode,
    ) {}

    public function totalDisplay(): string
    {
        return $this->total->format();
    }
}
