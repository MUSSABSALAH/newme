<?php

declare(strict_types=1);

namespace App\Modules\Addresses\Services;

use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * Official Saudi National Address reverse-geocode (SPL / address.gov.sa).
 */
final class NationalAddressClient
{
    /**
     * @return array{national_address: string, district: string, street: string}|null
     */
    public function lookup(float $lat, float $lng): ?array
    {
        $key = trim((string) config('services.saudi_address.key'));
        if ($key === '') {
            return null;
        }

        try {
            $response = Http::timeout(8)
                ->acceptJson()
                ->get(rtrim((string) config('services.saudi_address.url'), '/').'/address/address-geocode', [
                    'language' => app()->getLocale() === 'ar' ? 'A' : 'E',
                    'format' => 'JSON',
                    'encode' => 'utf8',
                    'lat' => $lat,
                    'long' => $lng,
                    'api_key' => $key,
                ]);
        } catch (Throwable) {
            return null;
        }

        if (! $response->successful()) {
            return null;
        }

        $row = $this->firstAddress($response->json());
        if ($row === null) {
            return null;
        }

        $national = $this->nationalCode($row);
        if ($national === '') {
            return null;
        }

        $building = $this->pick($row, ['BuildingNumber', 'buildingNumber']);
        $streetName = $this->localized($this->pick($row, ['Street', 'street']));

        return [
            'national_address' => $national,
            'district' => $this->localized($this->pick($row, ['District', 'district'])),
            'street' => trim(implode(' ', array_filter([$streetName, $building]))),
        ];
    }

    /**
     * @param  mixed  $payload
     * @return array<string, mixed>|null
     */
    private function firstAddress(mixed $payload): ?array
    {
        if (! is_array($payload)) {
            return null;
        }

        $addresses = $payload['Addresses'] ?? $payload['addresses'] ?? null;
        if (! is_array($addresses) || $addresses === []) {
            return null;
        }

        $first = $addresses[0] ?? null;

        return is_array($first) ? $first : null;
    }

    /**
     * @param  array<string, mixed>  $row
     */
    private function nationalCode(array $row): string
    {
        $short = strtoupper($this->pick($row, [
            'ShortAddress',
            'ShortAddressCode',
            'shortAddress',
            'short_address',
        ]));
        $short = preg_replace('/[^A-Z0-9]/', '', $short) ?? $short;
        if (preg_match('/^[A-Z]{4}\d{4}$/', $short) === 1) {
            return $short;
        }

        $building = $this->pick($row, ['BuildingNumber', 'buildingNumber']);
        $postcode = $this->pick($row, ['PostCode', 'postCode', 'ZipCode']);
        $additional = $this->pick($row, ['AdditionalNumber', 'additionalNumber']);

        $parts = array_values(array_filter([$building, $postcode, $additional], static fn (string $part): bool => $part !== ''));

        return $parts === [] ? '' : implode(' ', $parts);
    }

    /**
     * @param  array<string, mixed>  $row
     * @param  list<string>  $keys
     */
    private function pick(array $row, array $keys): string
    {
        foreach ($keys as $key) {
            $value = trim((string) ($row[$key] ?? ''));
            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }

    private function localized(string $value): string
    {
        if ($value === '') {
            return '';
        }

        $value = preg_replace('/\s+Dist\.?/i', '', $value) ?? $value;
        $parts = array_values(array_filter(array_map('trim', preg_split('/[,\/|]/', $value) ?: [])));
        if ($parts === []) {
            return trim($value);
        }

        $arabic = array_values(array_filter($parts, static fn (string $part): bool => (bool) preg_match('/\p{Arabic}/u', $part)));
        $latin = array_values(array_filter($parts, static fn (string $part): bool => ! preg_match('/\p{Arabic}/u', $part)));

        $chosen = app()->getLocale() === 'ar'
            ? ($arabic[0] ?? $parts[0])
            : ($latin[0] ?? $parts[0]);

        return trim($chosen);
    }
}
