<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

use App\Modules\Identity\Models\BodyMeasurement;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Turns a measurement history into a plottable weight series.
 *
 * Weight is the one number every reading carries, so it is the only line drawn;
 * the rest of the tape stays in the history list. A series with a single point
 * is dropped because one dot draws no trend.
 */
final class MeasurementTrend
{
    private const MIN_POINTS = 2;

    /**
     * Oldest reading first.
     *
     * @param  Collection<int, BodyMeasurement>  $measurements
     * @return list<array{date: Carbon, value: float}>
     */
    public static function weight(Collection $measurements): array
    {
        $points = $measurements
            ->sortBy(fn (BodyMeasurement $measurement): string => $measurement->measured_on->toDateString())
            ->map(fn (BodyMeasurement $measurement): array => [
                'date' => $measurement->measured_on,
                'value' => (float) $measurement->weight_kg,
            ])
            ->values()
            ->all();

        return count($points) >= self::MIN_POINTS ? $points : [];
    }
}
