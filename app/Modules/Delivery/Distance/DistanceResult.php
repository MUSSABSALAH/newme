<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

/**
 * A measured delivery distance and how it was obtained.
 *
 * $fellBack is true when Google was asked for but Haversine answered instead.
 */
final readonly class DistanceResult
{
    public float $km;

    public function __construct(
        float $km,
        public DistanceMethod $method,
        public bool $fellBack = false,
    ) {
        $this->km = round(max(0.0, $km), 3);
    }

    public function meters(): int
    {
        return (int) round($this->km * 1000);
    }
}
