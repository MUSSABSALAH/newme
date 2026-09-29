<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

/**
 * A latitude/longitude pair in decimal degrees.
 */
final readonly class GeoPoint
{
    public function __construct(
        public float $lat,
        public float $lng,
    ) {}

    /**
     * Null unless both values are numeric, in range and not the 0,0 placeholder.
     */
    public static function tryFrom(mixed $lat, mixed $lng): ?self
    {
        if (! is_numeric($lat) || ! is_numeric($lng)) {
            return null;
        }

        $lat = (float) $lat;
        $lng = (float) $lng;

        if ($lat < -90 || $lat > 90 || $lng < -180 || $lng > 180) {
            return null;
        }

        if ($lat === 0.0 && $lng === 0.0) {
            return null;
        }

        return new self($lat, $lng);
    }

    public function key(): string
    {
        return sprintf('%.6f,%.6f', $this->lat, $this->lng);
    }
}
