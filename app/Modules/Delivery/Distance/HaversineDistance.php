<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

/**
 * Great-circle distance on a spherical Earth.
 */
final class HaversineDistance
{
    private const EARTH_RADIUS_KM = 6371.0088;

    public function km(GeoPoint $from, GeoPoint $to): float
    {
        $lat1 = deg2rad($from->lat);
        $lat2 = deg2rad($to->lat);
        $dLat = $lat2 - $lat1;
        $dLng = deg2rad($to->lng - $from->lng);

        $a = sin($dLat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dLng / 2) ** 2;

        return 2 * self::EARTH_RADIUS_KM * asin(min(1.0, sqrt($a)));
    }
}
