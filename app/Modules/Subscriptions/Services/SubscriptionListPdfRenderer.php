<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Money\Money;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * The admin subscriptions list, as filtered on screen, as a landscape PDF.
 */
final class SubscriptionListPdfRenderer
{
    /** Keeps a careless "export everything" from exhausting memory. */
    public const MAX_ROWS = 2000;

    /**
     * @param  Collection<int, Subscription>  $subscriptions
     * @param  list<string>  $filters  Labels of the filters applied on screen.
     */
    public function render(Collection $subscriptions, array $filters = []): string
    {
        $rtl = app()->getLocale() !== 'en';

        $total = $subscriptions->reduce(
            static fn (Money $sum, Subscription $subscription): Money => $sum->add(Money::fromMinor((int) $subscription->total_minor)),
            Money::zero(),
        );

        $html = View::make('admin.subscriptions.list-pdf', [
            'subscriptions' => $subscriptions,
            'filters' => $filters,
            'total' => $total,
            'truncated' => $subscriptions->count() >= self::MAX_ROWS,
            'rtl' => $rtl,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 9,
            'margin_top' => 22,
            'margin_bottom' => 16,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_header' => 7,
            'margin_footer' => 7,
            'directionality' => $rtl ? 'rtl' : 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'shrink_tables_to_fit' => 1,
        ]);

        $pdf->SetTitle((string) __('subscriptions.pdf.title'));
        $pdf->SetAuthor((string) config('app.name'));
        $pdf->SetCreator((string) config('app.name'));
        $pdf->SetHTMLHeader(View::make('admin.subscriptions.list-pdf-header', ['rtl' => $rtl, 'filters' => $filters])->render());
        $pdf->SetHTMLFooter(View::make('subscriptions.meal-schedule-pdf-footer', [
            'rtl' => $rtl,
            'generatedAt' => now()->translatedFormat('d M Y — H:i'),
        ])->render());
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
