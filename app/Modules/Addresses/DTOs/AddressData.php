<?php

declare(strict_types=1);

namespace App\Modules\Addresses\DTOs;

use App\Support\Dto\Data;

final class AddressData extends Data
{
    public function __construct(
        public readonly string $label,
        public readonly string $recipientName,
        public readonly string $phone,
        public readonly string $city,
        public readonly string $district,
        public readonly string $street,
        public readonly string $nationalAddress,
        public readonly ?string $details,
        public readonly bool $isDefault,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        return new self(
            label: self::text($attributes['label'] ?? null),
            recipientName: self::text($attributes['recipient_name'] ?? null),
            phone: self::text($attributes['phone'] ?? null),
            city: self::text($attributes['city'] ?? null),
            district: self::text($attributes['district'] ?? null),
            street: self::text($attributes['street'] ?? null),
            nationalAddress: self::text($attributes['national_address'] ?? null),
            details: self::nullableText($attributes['details'] ?? null),
            isDefault: (bool) ($attributes['is_default'] ?? false),
        );
    }

    /**
     * @param  mixed  $value
     */
    private static function text($value): string
    {
        return trim((string) ($value ?? ''));
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableText($value): ?string
    {
        $text = self::text($value);

        return $text === '' ? null : $text;
    }
}
