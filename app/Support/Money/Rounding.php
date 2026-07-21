<?php

declare(strict_types=1);

namespace App\Support\Money;

use DivisionByZeroError;

/**
 * Central, deterministic rounding for all money arithmetic.
 *
 * Uses integer-only math with half-up rounding on the magnitude, so results are
 * identical across web, API, and any recalculation. No floating point is used.
 */
final class Rounding
{
    private function __construct() {}

    /**
     * Divide two integers, rounding half away from zero (half-up on magnitude).
     */
    public static function divide(int $numerator, int $denominator): int
    {
        if ($denominator === 0) {
            throw new DivisionByZeroError('Cannot divide by zero.');
        }

        $negative = ($numerator < 0) !== ($denominator < 0);

        $absNumerator = abs($numerator);
        $absDenominator = abs($denominator);

        $quotient = intdiv($absNumerator, $absDenominator);
        $remainder = $absNumerator % $absDenominator;

        if ($remainder * 2 >= $absDenominator) {
            $quotient++;
        }

        return $negative ? -$quotient : $quotient;
    }
}
