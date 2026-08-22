<?php

declare(strict_types=1);

namespace Tests\Unit\Invoices;

use App\Modules\Invoices\Support\ZatcaQr;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

final class ZatcaQrTest extends TestCase
{
    public function test_it_encodes_the_five_phase_one_tlv_tags(): void
    {
        $issued = Carbon::parse('2026-08-19 12:30:00', 'UTC');

        $payload = ZatcaQr::payload(
            sellerName: 'نيو مي',
            vatNumber: '310000000000003',
            issuedAt: $issued,
            totalWithVat: '115.00',
            vatAmount: '15.00',
        );

        $tags = self::decodeTlv($payload);

        $this->assertSame('نيو مي', $tags[1]);
        $this->assertSame('310000000000003', $tags[2]);
        $this->assertSame('2026-08-19T12:30:00Z', $tags[3]);
        $this->assertSame('115.00', $tags[4]);
        $this->assertSame('15.00', $tags[5]);
    }

    public function test_it_normalises_the_timestamp_to_utc(): void
    {
        $issued = Carbon::parse('2026-08-19 15:30:00', 'Asia/Riyadh');

        $tags = self::decodeTlv(ZatcaQr::payload(
            sellerName: 'New Me',
            vatNumber: '310000000000003',
            issuedAt: $issued,
            totalWithVat: '230.00',
            vatAmount: '30.00',
        ));

        $this->assertSame('2026-08-19T12:30:00Z', $tags[3]);
    }

    /**
     * @return array<int, string>
     */
    private static function decodeTlv(string $payload): array
    {
        $binary = base64_decode($payload, true);

        if ($binary === false) {
            self::fail('ZATCA payload is not valid base64.');
        }

        $tags = [];
        $offset = 0;
        $length = strlen($binary);

        while ($offset < $length) {
            $tag = ord($binary[$offset]);
            $size = ord($binary[$offset + 1]);
            $tags[$tag] = substr($binary, $offset + 2, $size);
            $offset += 2 + $size;
        }

        return $tags;
    }
}
