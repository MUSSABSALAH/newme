<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Support\ZatcaQr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use Mpdf\QrCode\Output\Svg;
use Mpdf\QrCode\QrCode;

/**
 * Renders an invoice to PDF bytes.
 *
 * mPDF is used because it shapes and joins Arabic text out of the box; the
 * document is laid out right-to-left whenever the active locale is Arabic. The
 * QR code is produced as an inline SVG so no image extension is required.
 */
final class InvoicePdfRenderer
{
    private const QR_SIZE_PX = 320;

    public function render(Invoice $invoice): string
    {
        $rtl = app()->getLocale() !== 'en';

        $html = View::make('invoices.pdf', [
            'invoice' => $invoice,
            'qr' => $this->qrCode($invoice),
            'rtl' => $rtl,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 9.5,
            'margin_top' => 14,
            'margin_bottom' => 16,
            'margin_left' => 14,
            'margin_right' => 14,
            'directionality' => $rtl ? 'rtl' : 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);

        $pdf->SetTitle($invoice->number);
        $pdf->SetAuthor($invoice->sellerParty()->name);
        $pdf->SetCreator((string) config('app.name'));
        $pdf->WriteHTML($html);

        return (string) $pdf->Output('', Destination::STRING_RETURN);
    }

    /**
     * The ZATCA payload as an inline SVG data URI, or null when the company has
     * no VAT number on file and the code would carry nothing meaningful.
     */
    private function qrCode(Invoice $invoice): ?string
    {
        $seller = $invoice->sellerParty();

        if ($seller->taxNumber === null) {
            return null;
        }

        $payload = ZatcaQr::payload(
            sellerName: $seller->name,
            vatNumber: $seller->taxNumber,
            issuedAt: $invoice->issued_at,
            totalWithVat: $invoice->totalDisplay(),
            vatAmount: $invoice->taxDisplay(),
        );

        $svg = (new Svg)->output(new QrCode($payload), self::QR_SIZE_PX);

        return 'data:image/svg+xml;base64,'.base64_encode((string) $svg);
    }

    private function tempDir(): string
    {
        $path = storage_path('app/mpdf');

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        return $path;
    }
}
