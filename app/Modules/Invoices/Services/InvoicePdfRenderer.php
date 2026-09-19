<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Support\ZatcaQr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use Mpdf\QrCode\Output\Png;
use Mpdf\QrCode\QrCode;

/**
 * Renders an invoice to PDF bytes on the New Me letterhead.
 *
 * The branded template is a full-page watermark. The ZATCA Phase-1 QR (TLV
 * seller / VAT / timestamp / totals) is drawn over the printed code on the
 * letterhead so a reader app can verify the tax invoice.
 */
final class InvoicePdfRenderer
{
    private const QR_SIZE_PX = 360;

    private const LETTERHEAD = 'images/invoices/letterhead.jpg';

    private const RENEW_STRIP = 'images/invoices/renew-strip.png';

    private const PAGE_WIDTH_MM = 210.0;

    private const PAGE_HEIGHT_MM = 297.0;

    /**
     * Slim official gradient, flush to the right edge and full page height.
     * Text is drawn on top (Cairo), not baked into the image.
     */
    private const STRIP_WIDTH_MM = 13.63;

    private const LETTERHEAD_STRIP_X_MM = 184.0;

    /**
     * Footer geometry, in millimetres from the page origin.
     *
     * The ZATCA QR sits on the same top edge as the brand block.
     */
    private const FOOTER_BRAND_Y_MM = 247.8;

    private const FOOTER_RULE_Y_MM = 265.2;

    private const FOOTER_CONTACTS_Y_MM = 266.4;

    private const FOOTER_RULE_X1_MM = 16.0;

    private const FOOTER_RULE_X2_MM = 136.0;

    private const QR_X_MM = 160.5;

    private const QR_SIZE_MM = 23.5;

    private const QR_Y_MM = self::FOOTER_BRAND_Y_MM;

    private const ORIGIN_X_MM = 154.3;

    private const ORIGIN_Y_MM = self::QR_Y_MM + self::QR_SIZE_MM + 0.5;

    public function render(Invoice $invoice): string
    {
        $invoice->loadMissing(['payment', 'invoiceable']);

        $html = View::make('invoices.pdf', [
            'invoice' => $invoice,
        ])->render();

        $pdf = $this->createPdf();

        $letterhead = resource_path(self::LETTERHEAD);

        if (is_file($letterhead)) {
            $pdf->SetWatermarkImage($letterhead, 1, [210, 297], [0, 0]);
            $pdf->showWatermarkImage = true;
            $pdf->watermarkImgBehind = true;
        }

        $pdf->SetTitle($invoice->number);
        $pdf->SetAuthor($invoice->sellerParty()->name);
        $pdf->SetCreator((string) config('app.name'));
        $pdf->SetDisplayMode('fullpage');
        $pdf->WriteHTML($html);

        $qrPath = $this->writeQrPng($invoice);

        try {
            $this->paintLetterheadOverlay($pdf, $invoice, $qrPath);

            return (string) $pdf->Output('', Destination::STRING_RETURN);
        } finally {
            if ($qrPath !== null) {
                File::delete($qrPath);
            }
        }
    }

    /**
     * Replace the low-resolution letterhead footer with live text and the
     * ZATCA QR, so the contact block stays sharp when the PDF is zoomed.
     */
    private function paintLetterheadOverlay(Mpdf $pdf, Invoice $invoice, ?string $qrPath): void
    {
        $pages = $pdf->page;
        $icons = [
            'phone' => resource_path('images/invoices/icon-phone.svg'),
            'email' => resource_path('images/invoices/icon-email.svg'),
            'web' => resource_path('images/invoices/icon-web.svg'),
            'social' => resource_path('images/invoices/icon-social.svg'),
        ];
        $footer = View::make('invoices.pdf-footer', [
            'seller' => $invoice->sellerParty(),
        ])->render();
        $contacts = View::make('invoices.pdf-contacts', [
            'icons' => $icons,
        ])->render();
        $origin = View::make('invoices.pdf-origin')->render();

        $pdf->SetAutoPageBreak(false, 0);

        for ($page = 1; $page <= $pages; $page++) {
            $pdf->page = $page;

            // Hide the printed footer and the letterhead's wide baked-in bar.
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Rect(0, 246.5, self::PAGE_WIDTH_MM - self::STRIP_WIDTH_MM, 50.5, 'F');
            $pdf->Rect(self::LETTERHEAD_STRIP_X_MM, 0, self::PAGE_WIDTH_MM - self::LETTERHEAD_STRIP_X_MM, self::PAGE_HEIGHT_MM, 'F');

            $pdf->WriteFixedPosHTML($footer, 16, self::FOOTER_BRAND_Y_MM, 128, 18, 'hidden');

            $pdf->SetDrawColor(34, 34, 34);
            $pdf->SetLineWidth(0.16);
            $pdf->Line(self::FOOTER_RULE_X1_MM, self::FOOTER_RULE_Y_MM, self::FOOTER_RULE_X2_MM, self::FOOTER_RULE_Y_MM);

            $pdf->WriteFixedPosHTML($contacts, 16, self::FOOTER_CONTACTS_Y_MM, 128, 22, 'hidden');

            if ($qrPath !== null) {
                $pdf->Image($qrPath, self::QR_X_MM, self::QR_Y_MM, self::QR_SIZE_MM, self::QR_SIZE_MM, 'png');
            }

            $pdf->WriteFixedPosHTML($origin, self::ORIGIN_X_MM, self::ORIGIN_Y_MM, 36, 12, 'hidden');

            $this->paintRenewStrip($pdf);
        }

        if ($pdf->page > $pages) {
            $pdf->DeletePages($pages + 1);
        }
    }

    private function paintRenewStrip(Mpdf $pdf): void
    {
        $stripX = self::PAGE_WIDTH_MM - self::STRIP_WIDTH_MM;
        $strip = resource_path(self::RENEW_STRIP);

        if (is_file($strip)) {
            $pdf->Image(
                $strip,
                $stripX,
                0,
                self::STRIP_WIDTH_MM,
                self::PAGE_HEIGHT_MM,
                'png',
                '',
                true,
                false,
            );
        }

        $cx = $stripX + (self::STRIP_WIDTH_MM / 2);
        $cy = self::PAGE_HEIGHT_MM / 2;
        $boxW = 70.0;
        $lineH = 4.3;

        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('cairo', '', 8);
        $pdf->Rotate(90, $cx, $cy);
        $pdf->SetXY($cx - ($boxW / 2), $cy - $lineH);
        $pdf->SetDirectionality('rtl');
        $pdf->WriteCell($boxW, $lineH, 'جدد حياتك', 0, 2, 'C');
        $pdf->SetDirectionality('ltr');
        $pdf->SetFont('cairo', '', 6.2);
        $pdf->SetX($cx - ($boxW / 2));
        $pdf->WriteCell($boxW, $lineH, 'PREP - BAKE - RENEW', 0, 0, 'C');
        $pdf->Rotate(0);
        $pdf->SetTextColor(26, 26, 26);
    }

    /**
     * Write the ZATCA payload as a PNG. Null when the seller has no VAT number,
     * because a Phase-1 code without it is not a valid tax invoice QR.
     */
    private function writeQrPng(Invoice $invoice): ?string
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

        $png = (new Png)->output(new QrCode($payload, 'M'), self::QR_SIZE_PX);
        $path = $this->tempDir().DIRECTORY_SEPARATOR.'zatca-'.$invoice->public_id.'.png';
        File::put($path, $png);

        return $path;
    }

    private function createPdf(): Mpdf
    {
        $fontDirs = (new ConfigVariables)->getDefaults()['fontDir'];
        $fontData = (new FontVariables)->getDefaults()['fontdata'];

        return new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'fontDir' => array_merge($fontDirs, [resource_path('fonts/cairo')]),
            'fontdata' => $fontData + [
                'cairo' => [
                    'R' => 'Cairo-Regular.ttf',
                    'B' => 'Cairo-Bold.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ],
            ],
            'default_font' => 'cairo',
            'default_font_size' => 9,
            'margin_top' => 36,
            'margin_bottom' => 52,
            'margin_left' => 16,
            'margin_right' => 26,
            'directionality' => 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => false,
        ]);
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
