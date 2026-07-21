<?php

declare(strict_types=1);

namespace App\Support\Money;

/**
 * Immutable currency descriptor.
 *
 * The minor unit exponent defines how many integer minor units make up one
 * major unit (e.g. 2 for SAR, where 100 halalas = 1 riyal).
 */
final readonly class Currency
{
    public function __construct(
        public string $code,
        public int $minorUnitExponent,
    ) {}

    public static function sar(): self
    {
        return new self('SAR', 2);
    }

    public function equals(self $other): bool
    {
        return $this->code === $other->code
            && $this->minorUnitExponent === $other->minorUnitExponent;
    }
}
