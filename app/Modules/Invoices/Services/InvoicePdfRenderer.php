<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Support\ZatcaQr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
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

    /**
     * Footer geometry, in millimetres from the page origin.
     *
     * The rule between the VAT line and the contact list is the alignment
     * guide: the ZATCA QR is centred on that same Y so the line cuts
     * through the middle of the code.
     */
    private const FOOTER_BRAND_Y_MM = 247.8;

    private const FOOTER_RULE_Y_MM = 265.2;

    private const FOOTER_CONTACTS_Y_MM = 266.4;

    private const FOOTER_RULE_X1_MM = 16.0;

    private const FOOTER_RULE_X2_MM = 136.0;

    private const QR_X_MM = 147.8;

    private const QR_SIZE_MM = 23.5;

    private const QR_Y_MM = self::FOOTER_RULE_Y_MM - (self::QR_SIZE_MM / 2);

    private const ORIGIN_X_MM = 141.5;

    private const ORIGIN_Y_MM = self::QR_Y_MM + self::QR_SIZE_MM + 0.5;

    public function render(Invoice $invoice): string
    {
        $invoice->loadMissing(['payment', 'invoiceable']);

        $html = View::make('invoices.pdf', [
            'invoice' => $invoice,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 9,
            'margin_top' => 36,
            'margin_bottom' => 52,
            'margin_left' => 16,
            'margin_right' => 26,
            'directionality' => 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);

        $letterhead = resource_path(self::LETTERHEAD);

        if (is_file($letterhead)) {
            $pdf->SetWatermarkImage($letterhead, 1, [210, 297], [0, 0]);
            $pdf->showWatermarkImage = true;
            $pdf->watermarkImgBehind = true;
        }

        $pdf->SetTitle($invoice->number);
        $pdf->SetAuthor($invoice->sellerParty()->name);
        $pdf->SetCreator((string) config('app.name'));
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

            // Hide the printed footer (and its dummy QR) without covering the sidebar.
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Rect(0, 246.5, 184.6, 50.5, 'F');

            $pdf->WriteFixedPosHTML($footer, 16, self::FOOTER_BRAND_Y_MM, 128, 18, 'hidden');

            $pdf->SetDrawColor(34, 34, 34);
            $pdf->SetLineWidth(0.16);
            $pdf->Line(self::FOOTER_RULE_X1_MM, self::FOOTER_RULE_Y_MM, self::FOOTER_RULE_X2_MM, self::FOOTER_RULE_Y_MM);

            $pdf->WriteFixedPosHTML($contacts, 16, self::FOOTER_CONTACTS_Y_MM, 128, 22, 'hidden');

            if ($qrPath !== null) {
                $pdf->Image($qrPath, self::QR_X_MM, self::QR_Y_MM, self::QR_SIZE_MM, self::QR_SIZE_MM, 'png');
            }

            $pdf->WriteFixedPosHTML($origin, self::ORIGIN_X_MM, self::ORIGIN_Y_MM, 36, 12, 'hidden');
        }

        if ($pdf->page > $pages) {
            $pdf->DeletePages($pages + 1);
        }
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

    private function tempDir(): string
    {
        $path = storage_path('app/mpdf');

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        return $path;
    }
}
