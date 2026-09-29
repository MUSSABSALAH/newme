<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * Driving distance from the Google Routes API (computeRoutes).
 *
 * Alternatives are always requested, then the shortest or the fastest route
 * is used as the options say. Only the two coordinates leave the server.
 */
final class GoogleRoutesDistance
{
    public const ENDPOINT = 'https://routes.googleapis.com/directions/v2:computeRoutes';

    /**
     * @throws DistanceUnavailableException
     */
    public function km(GeoPoint $origin, GeoPoint $destination, string $apiKey, ?GoogleRouteOptions $options = null): float
    {
        $options ??= new GoogleRouteOptions;

        return $this->pick($this->routes($origin, $destination, $apiKey, $options), $options)['km'];
    }

    /**
     * The route the options select out of those offered.
     *
     * @param  non-empty-list<array{km: float, minutes: float}>  $routes
     * @return array{km: float, minutes: float}
     */
    public function pick(array $routes, GoogleRouteOptions $options): array
    {
        $field = $options->preference === GoogleRouteOptions::FASTEST ? 'minutes' : 'km';

        usort($routes, static fn (array $a, array $b): int => $a[$field] <=> $b[$field]);

        return $routes[0];
    }

    /**
     * Every route Google offered, in its order (the default route first).
     *
     * @return non-empty-list<array{km: float, minutes: float}>
     *
     * @throws DistanceUnavailableException
     */
    public function routes(GeoPoint $origin, GeoPoint $destination, string $apiKey, GoogleRouteOptions $options): array
    {
        $body = [
            'origin' => $this->waypoint($origin),
            'destination' => $this->waypoint($destination),
            'travelMode' => 'DRIVE',
            'routingPreference' => $options->trafficAware ? 'TRAFFIC_AWARE' : 'TRAFFIC_UNAWARE',
            'computeAlternativeRoutes' => true,
        ];

        $modifiers = array_filter([
            'avoidHighways' => $options->avoidHighways,
            'avoidTolls' => $options->avoidTolls,
        ]);

        if ($modifiers !== []) {
            $body['routeModifiers'] = $modifiers;
        }

        try {
            $response = Http::timeout(5)
                ->connectTimeout(2)
                ->acceptJson()
                ->withHeaders([
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => 'routes.distanceMeters,routes.duration',
                ])
                ->post(self::ENDPOINT, $body);
        } catch (Throwable $e) {
            throw new DistanceUnavailableException('Google Routes request failed: '.$e->getMessage(), 0, $e);
        }

        if (! $response->successful()) {
            $reason = $response->json('error.message');

            throw new DistanceUnavailableException(sprintf(
                'Google Routes returned HTTP %d%s',
                $response->status(),
                is_string($reason) && $reason !== '' ? ': '.$reason : '',
            ));
        }

        $routes = [];

        foreach ((array) $response->json('routes') as $route) {
            if (! is_array($route)) {
                continue;
            }

            // Zero-valued fields are omitted from the JSON, so a missing distance is 0 m.
            $meters = $route['distanceMeters'] ?? 0;

            if (! is_numeric($meters)) {
                continue;
            }

            $routes[] = [
                'km' => (float) $meters / 1000,
                'minutes' => $this->minutes($route['duration'] ?? null),
            ];
        }

        if ($routes === []) {
            throw new DistanceUnavailableException('Google Routes found no driving route.');
        }

        return $routes;
    }

    /**
     * Google sends durations as seconds with an "s" suffix, e.g. "1587s".
     */
    private function minutes(mixed $duration): float
    {
        $seconds = is_string($duration) ? (float) rtrim($duration, 's') : 0.0;

        return round($seconds / 60, 1);
    }

    /**
     * @return array{location: array{latLng: array{latitude: float, longitude: float}}}
     */
    private function waypoint(GeoPoint $point): array
    {
        return ['location' => ['latLng' => ['latitude' => $point->lat, 'longitude' => $point->lng]]];
    }
}
