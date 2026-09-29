<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

use App\Modules\Addresses\Models\Address;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Support\Facades\Log;

/**
 * Kitchen-to-address distance, measured with the method chosen in settings.
 *
 * Results are kept on the address with a fingerprint of the inputs (kitchen
 * pin, method, road factor, address pin) and only re-measured when one of
 * those changes. A Google failure never blocks checkout: Haversine answers
 * instead and Google is retried after RETRY_AFTER_MINUTES.
 */
final class DeliveryDistance
{
    public const RETRY_AFTER_MINUTES = 60;

    private const FALLBACK_PREFIX = 'fallback:';

    public function __construct(
        private readonly SettingsService $settings,
        private readonly HaversineDistance $haversine,
        private readonly GoogleRoutesDistance $google,
    ) {}

    public function origin(): ?GeoPoint
    {
        return GeoPoint::tryFrom(
            $this->settings->get('shipping.origin_lat'),
            $this->settings->get('shipping.origin_lng'),
        );
    }

    public function method(): DistanceMethod
    {
        return DistanceMethod::tryFrom((string) $this->settings->get('shipping.distance_method'))
            ?? DistanceMethod::Haversine;
    }

    /**
     * The address's distance from the kitchen, re-measured only when stale.
     */
    public function forAddress(Address $address): ?DistanceResult
    {
        $origin = $this->origin();
        $destination = $address->point();

        if (! $origin instanceof GeoPoint || ! $destination instanceof GeoPoint) {
            return null;
        }

        $method = $this->method();
        $fingerprint = $this->fingerprint($method, $origin, $destination);
        $cached = $this->cached($address, $fingerprint);

        if ($cached instanceof DistanceResult) {
            return $cached;
        }

        $result = $this->measure($origin, $destination, $method);
        $this->remember($address, $result, $result->fellBack ? self::FALLBACK_PREFIX.$fingerprint : $fingerprint);

        return $result;
    }

    /**
     * Measure between two points, falling back to Haversine if Google fails.
     */
    public function measure(GeoPoint $origin, GeoPoint $destination, ?DistanceMethod $method = null): DistanceResult
    {
        $method ??= $this->method();

        if ($method === DistanceMethod::Google) {
            try {
                return new DistanceResult($this->googleKm($origin, $destination), DistanceMethod::Google);
            } catch (DistanceUnavailableException $e) {
                Log::warning('Delivery distance: Google Routes unavailable, using Haversine.', [
                    'reason' => $e->getMessage(),
                ]);

                return new DistanceResult($this->roadKm($origin, $destination), DistanceMethod::Haversine, fellBack: true);
            }
        }

        return new DistanceResult($this->roadKm($origin, $destination), DistanceMethod::Haversine);
    }

    /**
     * Both methods side by side for the admin "test" button. Never falls back.
     *
     * A key, road factor or route options passed in (typed but not yet saved)
     * win over settings.
     *
     * @return array{haversine_km: float, straight_km: float, road_factor: float, google_km: float|null, google_minutes: float|null, google_routes: list<array{km: float, minutes: float}>, google_error: string|null}
     */
    public function compare(
        GeoPoint $origin,
        GeoPoint $destination,
        ?string $apiKey = null,
        ?float $roadFactor = null,
        ?GoogleRouteOptions $options = null,
    ): array {
        $routes = [];
        $chosen = null;
        $googleError = null;
        $options ??= $this->routeOptions();
        $factor = $roadFactor !== null && $roadFactor >= 1.0 ? $roadFactor : $this->roadFactor();
        $straight = $this->haversine->km($origin, $destination);

        try {
            $routes = array_map(
                static fn (array $route): array => ['km' => round($route['km'], 3), 'minutes' => $route['minutes']],
                $this->google->routes($origin, $destination, $this->googleKey($apiKey), $options),
            );
            $chosen = $this->google->pick($routes, $options);
        } catch (DistanceUnavailableException $e) {
            $googleError = $e->getMessage();
        }

        return [
            'haversine_km' => round($straight * $factor, 3),
            'straight_km' => round($straight, 3),
            'road_factor' => $factor,
            'google_km' => $chosen['km'] ?? null,
            'google_minutes' => $chosen['minutes'] ?? null,
            'google_routes' => $routes,
            'google_error' => $googleError,
        ];
    }

    public function routeOptions(): GoogleRouteOptions
    {
        return new GoogleRouteOptions(
            preference: (string) $this->settings->get('shipping.google_route_preference'),
            trafficAware: $this->settings->get('shipping.google_traffic') === 'aware',
            avoidHighways: (bool) $this->settings->get('shipping.google_avoid_highways'),
            avoidTolls: (bool) $this->settings->get('shipping.google_avoid_tolls'),
        );
    }

    public function roadFactor(): float
    {
        $raw = $this->settings->get('shipping.road_factor');
        $factor = is_numeric($raw) ? (float) $raw : 1.0;

        return $factor >= 1.0 ? $factor : 1.0;
    }

    private function roadKm(GeoPoint $origin, GeoPoint $destination): float
    {
        return $this->haversine->km($origin, $destination) * $this->roadFactor();
    }

    /**
     * @throws DistanceUnavailableException
     */
    private function googleKm(GeoPoint $origin, GeoPoint $destination): float
    {
        return $this->google->km($origin, $destination, $this->googleKey(), $this->routeOptions());
    }

    /**
     * @throws DistanceUnavailableException
     */
    private function googleKey(?string $typed = null): string
    {
        $key = $typed !== null && trim($typed) !== ''
            ? $typed
            : $this->settings->get('shipping.google_maps_key');

        if (! is_string($key) || trim($key) === '') {
            throw new DistanceUnavailableException('No Google Maps API key is configured.');
        }

        return trim($key);
    }

    private function fingerprint(DistanceMethod $method, GeoPoint $origin, GeoPoint $destination): string
    {
        return sha1(implode('|', [
            $method->value,
            $origin->key(),
            $destination->key(),
            $method === DistanceMethod::Haversine ? sprintf('%.2f', $this->roadFactor()) : $this->routeOptions()->key(),
        ]));
    }

    private function cached(Address $address, string $fingerprint): ?DistanceResult
    {
        $stored = $address->distance_fingerprint;
        $method = DistanceMethod::tryFrom((string) $address->distance_method);

        if ($address->distance_km === null || ! $method instanceof DistanceMethod || $stored === null) {
            return null;
        }

        if ($stored === $fingerprint) {
            return new DistanceResult((float) $address->distance_km, $method);
        }

        $retryDue = $address->distance_measured_at === null
            || $address->distance_measured_at->lt(now()->subMinutes(self::RETRY_AFTER_MINUTES));

        if ($stored === self::FALLBACK_PREFIX.$fingerprint && ! $retryDue) {
            return new DistanceResult((float) $address->distance_km, $method, fellBack: true);
        }

        return null;
    }

    private function remember(Address $address, DistanceResult $result, string $fingerprint): void
    {
        $values = [
            'distance_km' => $result->km,
            'distance_method' => $result->method->value,
            'distance_fingerprint' => $fingerprint,
            'distance_measured_at' => now(),
        ];

        if ($address->exists) {
            // Direct update: a cache refresh is not an edit, so no timestamps or events.
            Address::query()->whereKey($address->getKey())->update($values);
        }

        $address->forceFill($values)->syncOriginalAttributes(array_keys($values));
    }
}
