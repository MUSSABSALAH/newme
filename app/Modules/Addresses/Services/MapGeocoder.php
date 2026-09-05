<?php

declare(strict_types=1);

namespace App\Modules\Addresses\Services;

use App\Modules\Addresses\Support\RiyadhDelivery;
use Illuminate\Support\Facades\Http;
use Throwable;

final class MapGeocoder
{
    public function __construct(private readonly NationalAddressClient $national) {}

    /**
     * @return array{allowed: bool, city: string, district: string, street: string, national_address: string, message: string|null}
     */
    public function lookup(float $lat, float $lng): array
    {
        $inBounds = RiyadhDelivery::inCityBounds($lat, $lng);
        $address = $this->reverse($lat, $lng) ?? [];

        $country = strtolower((string) ($address['country_code'] ?? ''));
        if ($country !== '' && $country !== 'sa') {
            return $this->blocked();
        }

        $namedCity = $this->first($address, ['city', 'town', 'village']);
        if (RiyadhDelivery::isOtherCity($namedCity)) {
            return $this->blocked();
        }

        if ($inBounds || RiyadhDelivery::looksLikeRiyadh($namedCity)) {
            return $this->allowed(
                RiyadhDelivery::cityLabel(),
                $this->district($address),
                $this->street($address),
                $this->national->lookup($lat, $lng),
            );
        }

        return $this->blocked();
    }

    /**
     * @return array<string, mixed>|null
     */
    private function reverse(float $lat, float $lng): ?array
    {
        try {
            $response = Http::timeout(6)
                ->withUserAgent('NewMe/1.0 (address-lookup; https://newme.sa)')
                ->acceptJson()
                ->get('https://nominatim.openstreetmap.org/reverse', [
                    'lat' => $lat,
                    'lon' => $lng,
                    'format' => 'jsonv2',
                    'addressdetails' => 1,
                    'accept-language' => app()->getLocale() === 'ar' ? 'ar,en' : 'en,ar',
                ]);
        } catch (Throwable) {
            return null;
        }

        if (! $response->successful()) {
            return null;
        }

        $address = $response->json('address');

        return is_array($address) ? $address : null;
    }

    /**
     * @param  array<string, mixed>  $address
     */
    private function district(array $address): string
    {
        return $this->first($address, ['neighbourhood', 'suburb', 'quarter', 'city_district', 'residential']) ?? '';
    }

    /**
     * @param  array<string, mixed>  $address
     */
    private function street(array $address): string
    {
        $road = $this->first($address, ['road', 'pedestrian', 'footway', 'path']);
        $number = $this->first($address, ['house_number']);

        return trim(implode(' ', array_filter([$road, $number])));
    }

    /**
     * @param  array<string, mixed>  $address
     * @param  list<string>  $keys
     */
    private function first(array $address, array $keys): ?string
    {
        foreach ($keys as $key) {
            $value = trim((string) ($address[$key] ?? ''));
            if ($value !== '') {
                return $value;
            }
        }

        return null;
    }

    /**
     * @param  array{national_address: string, district: string, street: string}|null  $national
     * @return array{allowed: bool, city: string, district: string, street: string, national_address: string, message: string|null}
     */
    private function allowed(string $city, string $district, string $street, ?array $national): array
    {
        return [
            'allowed' => true,
            'city' => $city,
            'district' => ($national['district'] ?? '') !== '' ? $national['district'] : $district,
            'street' => ($national['street'] ?? '') !== '' ? $national['street'] : $street,
            'national_address' => $national['national_address'] ?? '',
            'message' => null,
        ];
    }

    /**
     * @return array{allowed: bool, city: string, district: string, street: string, national_address: string, message: string|null}
     */
    private function blocked(): array
    {
        return [
            'allowed' => false,
            'city' => '',
            'district' => '',
            'street' => '',
            'national_address' => '',
            'message' => (string) __('addresses.errors.outside_riyadh'),
        ];
    }
}
