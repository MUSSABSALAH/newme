<?php

declare(strict_types=1);

namespace App\Modules\Checkout\DTOs;

use App\Support\Money\Money;

/**
 * Store checkout quotes for delivery vs branch pickup.
 */
final readonly class StoreFulfillmentQuote
{
    public function __construct(
        public int $goodsMinor,
        public int $deliveryFeeMinor,
        public int $thresholdMinor,
        public string $branchAddress,
    ) {}

    public function deliveryTotalMinor(): int
    {
        return $this->goodsMinor + $this->deliveryFeeMinor;
    }

    public function pickupTotalMinor(): int
    {
        return $this->goodsMinor;
    }

    public function feeDisplay(): string
    {
        return $this->deliveryFeeMinor === 0
            ? (string) __('checkout.summary.free')
            : Money::fromMinor($this->deliveryFeeMinor)->format();
    }

    public function deliveryTotalDisplay(): string
    {
        return Money::fromMinor($this->deliveryTotalMinor())->format();
    }

    public function pickupTotalDisplay(): string
    {
        return Money::fromMinor($this->pickupTotalMinor())->format();
    }
}
