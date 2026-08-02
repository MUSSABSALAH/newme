<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * Renders the customer's daily dish calendar as a printable PDF.
 */
final class MealSchedulePdfRenderer
{
    public function render(Subscription $subscription): string
    {
        $rtl = app()->getLocale() !== 'en';

        $html = View::make('subscriptions.meal-schedule-pdf', [
            'subscription' => $subscription,
            'days' => $subscription->mealScheduleDays(),
            'rtl' => $rtl,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 10,
            'margin_top' => 14,
            'margin_bottom' => 16,
            'margin_left' => 14,
            'margin_right' => 14,
            'directionality' => $rtl ? 'rtl' : 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);

        $pdf->SetTitle(__('subscriptions.schedule.pdf_title', ['reference' => $subscription->reference()]));
        $pdf->SetAuthor((string) config('app.name'));
        $pdf->SetCreator((string) config('app.name'));
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
