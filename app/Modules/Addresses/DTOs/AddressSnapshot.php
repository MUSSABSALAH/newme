<?php

declare(strict_types=1);

namespace App\Modules\Addresses\DTOs;

/**
 * The frozen delivery address stored on an order or subscription.
 *
 * Reading it through a value object keeps views free of array lookups and
 * survives an address later being edited or removed.
 */
final readonly class AddressSnapshot
{
    public function __construct(
        public string $label,
        public string $recipientName,
        public string $phone,
        public string $city,
        public string $district,
        public string $street,
        public ?string $nationalAddress,
        public ?string $details,
    ) {}

    /**
     * @param  array<string, mixed>|null  $values
     */
    public static function fromArray(?array $values): ?self
    {
        if ($values === null || $values === []) {
            return null;
        }

        $national = isset($values['national_address']) && $values['national_address'] !== ''
            ? (string) $values['national_address']
            : null;

        return new self(
            label: (string) ($values['label'] ?? ''),
            recipientName: (string) ($values['recipient_name'] ?? ''),
            phone: (string) ($values['phone'] ?? ''),
            city: (string) ($values['city'] ?? ''),
            district: (string) ($values['district'] ?? ''),
            street: (string) ($values['street'] ?? ''),
            nationalAddress: $national,
            details: isset($values['details']) && $values['details'] !== '' ? (string) $values['details'] : null,
        );
    }

    /**
     * @return list<string>
     */
    public function lines(): array
    {
        return array_values(array_filter([
            $this->recipientName,
            implode(' · ', array_filter([$this->city, $this->district])),
            $this->street,
            $this->details ?? '',
            $this->phone,
        ], static fn (string $line): bool => $line !== ''));
    }

    public function oneLine(): string
    {
        return implode(' · ', array_filter([
            $this->city,
            $this->district,
            $this->street,
            $this->nationalAddress,
        ]));
    }
}
