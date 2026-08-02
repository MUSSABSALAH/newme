<?php

declare(strict_types=1);

namespace App\Modules\Invoices\DTOs;

use App\Support\Money\Money;

/**
 * One billed row on an invoice, frozen at issue time.
 *
 * Amounts are net of VAT: the tax is broken out once at the invoice level so a
 * reader can always check that the lines add up to the taxable amount.
 */
final readonly class InvoiceLine
{
    public function __construct(
        public string $description,
        public int $quantity,
        public int $unitPriceMinor,
        public int $lineTotalMinor,
    ) {}

    /**
     * @param  array<string, mixed>  $values
     */
    public static function fromArray(array $values): self
    {
        return new self(
            description: (string) ($values['description'] ?? ''),
            quantity: (int) ($values['quantity'] ?? 1),
            unitPriceMinor: (int) ($values['unit_price_minor'] ?? 0),
            lineTotalMinor: (int) ($values['line_total_minor'] ?? 0),
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'quantity' => $this->quantity,
            'unit_price_minor' => $this->unitPriceMinor,
            'line_total_minor' => $this->lineTotalMinor,
        ];
    }

    public function unitPriceDisplay(): string
    {
        return Money::fromMinor($this->unitPriceMinor)->format();
    }

    public function lineTotalDisplay(): string
    {
        return Money::fromMinor($this->lineTotalMinor)->format();
    }
}
