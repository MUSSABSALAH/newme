<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Support\Dto\Data;

/**
 * Card input for a single charge attempt.
 *
 * These values are never persisted: only the brand and last four digits are
 * kept on the payment record once the gateway answers.
 */
final class CardDetails extends Data
{
    public function __construct(
        public readonly string $number,
        public readonly string $holder,
        public readonly int $expiryMonth,
        public readonly int $expiryYear,
        public readonly string $cvv,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        return new self(
            number: preg_replace('/\D/', '', (string) ($attributes['number'] ?? '')) ?? '',
            holder: trim((string) ($attributes['holder'] ?? '')),
            expiryMonth: (int) ($attributes['expiry_month'] ?? 0),
            expiryYear: self::fullYear((int) ($attributes['expiry_year'] ?? 0)),
            cvv: preg_replace('/\D/', '', (string) ($attributes['cvv'] ?? '')) ?? '',
        );
    }

    public function last4(): string
    {
        return substr($this->number, -4);
    }

    public function brand(): string
    {
        if (str_starts_with($this->number, '4')) {
            return 'visa';
        }

        // Saudi mada BINs overlap with Mastercard's 5x range in this simulation.
        if (str_starts_with($this->number, '5')) {
            return 'mada';
        }

        return 'card';
    }

    public function hasExpired(): bool
    {
        $lastDayOfMonth = mktime(23, 59, 59, $this->expiryMonth + 1, 0, $this->expiryYear);

        return $lastDayOfMonth === false || $lastDayOfMonth < time();
    }

    private static function fullYear(int $year): int
    {
        return $year < 100 ? 2000 + $year : $year;
    }
}
