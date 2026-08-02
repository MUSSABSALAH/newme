<?php

declare(strict_types=1);

namespace App\Modules\Invoices\DTOs;

/**
 * A seller or buyer as printed on the invoice.
 *
 * Both sides are snapshotted when the invoice is issued so that renaming the
 * company or deleting a customer address never rewrites history.
 */
final readonly class InvoiceParty
{
    public function __construct(
        public string $name,
        public ?string $taxNumber = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?string $address = null,
    ) {}

    /**
     * @param  array<string, mixed>  $values
     */
    public static function fromArray(array $values): self
    {
        return new self(
            name: (string) ($values['name'] ?? ''),
            taxNumber: self::nullableString($values['tax_number'] ?? null),
            email: self::nullableString($values['email'] ?? null),
            phone: self::nullableString($values['phone'] ?? null),
            address: self::nullableString($values['address'] ?? null),
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'tax_number' => $this->taxNumber,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }

    private static function nullableString(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $string = trim((string) $value);

        return $string === '' ? null : $string;
    }
}
