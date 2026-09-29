<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

/**
 * How Google should pick the driving route a distance is read from.
 */
final readonly class GoogleRouteOptions
{
    public const SHORTEST = 'shortest';

    public const FASTEST = 'fastest';

    public string $preference;

    public function __construct(
        string $preference = self::SHORTEST,
        public bool $trafficAware = false,
        public bool $avoidHighways = false,
        public bool $avoidTolls = false,
    ) {
        $this->preference = $preference === self::FASTEST ? self::FASTEST : self::SHORTEST;
    }

    /**
     * Stable summary for cache fingerprints.
     */
    public function key(): string
    {
        return implode(',', [
            $this->preference,
            $this->trafficAware ? 'traffic' : 'no-traffic',
            $this->avoidHighways ? 'no-highways' : 'highways',
            $this->avoidTolls ? 'no-tolls' : 'tolls',
        ]);
    }
}
