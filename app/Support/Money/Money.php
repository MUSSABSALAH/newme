<?php

declare(strict_types=1);

namespace App\Support\Money;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use InvalidArgumentException;

/**
 * Immutable money value object stored as integer minor units.
 *
 * Floating-point amounts are prohibited: there are no float parameters and no
 * float return values. Multiplication is expressed as an integer ratio (or
 * basis points) and all rounding is delegated to {@see Rounding}.
 */
final readonly class Money
{
    private function __construct(
        public int $minor,
        public Currency $currency,
    ) {}

    public static function fromMinor(int $amount, ?Currency $currency = null): self
    {
        return new self($amount, $currency ?? Currency::sar());
    }

    /**
     * Build from a decimal string such as "12.50", "12.5", "12" or "-3.20".
     */
    public static function fromMajor(string $amount, ?Currency $currency = null): self
    {
        $currency ??= Currency::sar();
        $trimmed = trim($amount);

        if (preg_match('/^-?\d+(\.\d+)?$/', $trimmed) !== 1) {
            throw new InvalidArgumentException("Invalid money amount: {$amount}");
        }

        $negative = str_starts_with($trimmed, '-');
        $unsigned = ltrim($trimmed, '-');

        $exponent = $currency->minorUnitExponent;
        $segments = explode('.', $unsigned);
        $integerPart = $segments[0];
        $fractionPart = $segments[1] ?? '';

        if (strlen($fractionPart) > $exponent) {
            throw new InvalidArgumentException(
                "Amount {$amount} has more fraction digits than {$currency->code} allows."
            );
        }

        $fractionPart = str_pad($fractionPart, $exponent, '0');
        $minor = (int) ($integerPart.$fractionPart);

        return new self($negative ? -$minor : $minor, $currency);
    }

    public static function zero(?Currency $currency = null): self
    {
        return new self(0, $currency ?? Currency::sar());
    }

    public function add(self $other): self
    {
        $this->assertSameCurrency($other);

        return new self($this->minor + $other->minor, $this->currency);
    }

    public function subtract(self $other): self
    {
        $this->assertSameCurrency($other);

        return new self($this->minor - $other->minor, $this->currency);
    }

    /**
     * Multiply by an integer ratio (numerator / denominator), rounded centrally.
     */
    public function multiply(int $numerator, int $denominator = 1): self
    {
        if ($denominator === 0) {
            throw new InvalidArgumentException('Denominator cannot be zero.');
        }

        return new self(Rounding::divide($this->minor * $numerator, $denominator), $this->currency);
    }

    /**
     * Apply a percentage expressed in basis points (10000 bps = 100%).
     */
    public function percentage(int $basisPoints): self
    {
        return $this->multiply($basisPoints, 10000);
    }

    public function isZero(): bool
    {
        return $this->minor === 0;
    }

    public function isNegative(): bool
    {
        return $this->minor < 0;
    }

    public function equals(self $other): bool
    {
        return $this->minor === $other->minor
            && $this->currency->equals($other->currency);
    }

    public function greaterThan(self $other): bool
    {
        $this->assertSameCurrency($other);

        return $this->minor > $other->minor;
    }

    public function lessThan(self $other): bool
    {
        $this->assertSameCurrency($other);

        return $this->minor < $other->minor;
    }

    public function toMinor(): int
    {
        return $this->minor;
    }

    /**
     * Render as a decimal string for display (never used for calculation).
     */
    public function format(): string
    {
        $exponent = $this->currency->minorUnitExponent;
        $sign = $this->minor < 0 ? '-' : '';
        $absolute = (string) abs($this->minor);

        if ($exponent === 0) {
            return $sign.$absolute;
        }

        $absolute = str_pad($absolute, $exponent + 1, '0', STR_PAD_LEFT);
        $integerPart = substr($absolute, 0, -$exponent);
        $fractionPart = substr($absolute, -$exponent);

        return $sign.$integerPart.'.'.$fractionPart;
    }

    private function assertSameCurrency(self $other): void
    {
        if (! $this->currency->equals($other->currency)) {
            throw new DomainException(
                ApiErrorCode::CURRENCY_MISMATCH,
                422,
                'Cannot operate on money values with different currencies.',
            );
        }
    }
}
