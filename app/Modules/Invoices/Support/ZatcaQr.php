<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Support;

use Carbon\CarbonInterface;
use InvalidArgumentException;

/**
 * Builds the base64 TLV payload printed as a QR code on a simplified tax
 * invoice, following the ZATCA (Saudi e-invoicing) phase-one specification.
 *
 * The payload is a concatenation of five tag-length-value triplets, in order:
 * seller name, VAT registration number, invoice timestamp, total including
 * VAT, and the VAT amount. Lengths are byte counts, not character counts, so
 * Arabic seller names encode correctly.
 */
final class ZatcaQr
{
    private const MAX_VALUE_BYTES = 255;

    public static function payload(
        string $sellerName,
        string $vatNumber,
        CarbonInterface $issuedAt,
        string $totalWithVat,
        string $vatAmount,
    ): string {
        $tlv = self::tag(1, $sellerName)
            .self::tag(2, $vatNumber)
            .self::tag(3, $issuedAt->copy()->utc()->format('Y-m-d\TH:i:s\Z'))
            .self::tag(4, $totalWithVat)
            .self::tag(5, $vatAmount);

        return base64_encode($tlv);
    }

    private static function tag(int $tag, string $value): string
    {
        if ($tag < 1 || $tag > 255) {
            throw new InvalidArgumentException("Invalid TLV tag: {$tag}");
        }

        // A single length byte caps each value; truncate on the byte boundary
        // rather than emit a payload no reader can parse.
        if (strlen($value) > self::MAX_VALUE_BYTES) {
            $value = mb_strcut($value, 0, self::MAX_VALUE_BYTES);
        }

        return chr($tag).chr(strlen($value)).$value;
    }
}
