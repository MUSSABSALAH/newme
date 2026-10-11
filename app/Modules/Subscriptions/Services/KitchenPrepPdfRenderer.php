<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * The kitchen prep sheet as a PDF: a one-glance cooking list, then each dish
 * with the customers it goes to.
 */
final class KitchenPrepPdfRenderer
{
    public function __construct(private readonly KitchenPrepService $prep) {}

    public function render(Carbon $date): string
    {
        $rtl = app()->getLocale() !== 'en';
        $generatedAt = now()->translatedFormat('d M Y — H:i');

        $html = View::make('admin.kitchen.pdf', [
            'date' => $date,
            'prep' => $this->prep->forDate($date),
            'rtl' => $rtl,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 10,
            'margin_top' => 24,
            'margin_bottom' => 18,
            'margin_left' => 12,
            'margin_right' => 12,
            'margin_header' => 8,
            'margin_footer' => 8,
            'directionality' => $rtl ? 'rtl' : 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            // Move a dish to the next page instead of shrinking it to squeeze it in.
            'shrink_tables_to_fit' => 1,
        ]);

        $pdf->SetTitle(__('kitchen.pdf.title', ['date' => $date->toDateString()]));
        $pdf->SetAuthor((string) config('app.name'));
        $pdf->SetCreator((string) config('app.name'));
        $pdf->SetHTMLHeader(View::make('admin.kitchen.pdf-header', ['date' => $date, 'rtl' => $rtl])->render());
        $pdf->SetHTMLFooter(View::make('subscriptions.meal-schedule-pdf-footer', ['rtl' => $rtl, 'generatedAt' => $generatedAt])->render());
        $pdf->WriteHTML($html);

        return (string) $pdf->Output('', Destination::STRING_RETURN);
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
