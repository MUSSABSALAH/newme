<?php

declare(strict_types=1);

namespace App\Modules\Checkout\DTOs;

/**
 * One provider's delivery fee settings, in minor units and metres.
 *
 * Distance mode: up to the included distance costs the included price; each
 * metre beyond adds a prorated share of the per-km price, rounded to the halala.
 */
final readonly class DeliveryFeeProfile
{
    public const MODE_FIXED = 'fixed';

    public const MODE_DISTANCE = 'distance';

    public function __construct(
        public string $mode,
        public int $freeAboveMinor,
        public int $fixedMinor,
        public int $includedMeters,
        public int $includedPriceMinor,
        public int $perKmMinor,
    ) {}

    public function usesDistance(): bool
    {
        return $this->mode === self::MODE_DISTANCE;
    }

    public function isFreeFor(int $goodsMinor): bool
    {
        return $this->freeAboveMinor > 0 && $goodsMinor >= $this->freeAboveMinor;
    }

    /**
     * The fee for a delivery of $meters, ignoring the free-above threshold.
     */
    public function distanceFeeMinor(int $meters): int
    {
        $extraMeters = max(0, $meters - $this->includedMeters);

        return $this->includedPriceMinor + intdiv($extraMeters * $this->perKmMinor + 500, 1000);
    }
}
