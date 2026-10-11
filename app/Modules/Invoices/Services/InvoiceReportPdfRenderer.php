<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * Sales report from the invoices: an overview, the invoice list, then the
 * results month by month split into store and subscription sales.
 */
final class InvoiceReportPdfRenderer
{
    /** The list stops here; the summary still counts every invoice. */
    public const MAX_ROWS = 3000;

    /**
     * @param  Builder<Invoice>  $query  Filtered, unordered invoices.
     * @param  list<string>  $filters  Labels of the filters applied on screen.
     */
    public function render(Builder $query, array $filters = []): string
    {
        $rtl = app()->getLocale() !== 'en';
        $summary = $this->summary(clone $query);

        $invoices = (clone $query)
            ->with(['user', 'invoiceable'])
            ->orderBy('issued_at')
            ->orderBy('id')
            ->limit(self::MAX_ROWS)
            ->get();

        $html = View::make('admin.invoices.report-pdf', [
            'invoices' => $invoices,
            'summary' => $summary,
            'truncated' => $summary['count'] > $invoices->count(),
            'filters' => $filters,
            'rtl' => $rtl,
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
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

        $pdf->SetTitle((string) __('invoices.report.title'));
        $pdf->SetAuthor((string) config('app.name'));
        $pdf->SetCreator((string) config('app.name'));
        $pdf->SetHTMLHeader(View::make('admin.invoices.report-pdf-header', ['rtl' => $rtl, 'filters' => $filters])->render());
        $pdf->SetHTMLFooter(View::make('subscriptions.meal-schedule-pdf-footer', [
            'rtl' => $rtl,
            'generatedAt' => now()->translatedFormat('d M Y — H:i'),
        ])->render());
        $pdf->WriteHTML($html);

        return (string) $pdf->Output('', Destination::STRING_RETURN);
    }

    /**
     * Totals overall, per source and per month, in minor units.
     *
     * @param  Builder<Invoice>  $query
     * @return array{
     *     count: int, total: int, net: int, tax: int, average: int,
     *     first: Carbon|null, last: Carbon|null,
     *     store: array{count: int, total: int}, subscriptions: array{count: int, total: int},
     *     months: list<array{label: string, store_count: int, store_total: int, subscriptions_count: int, subscriptions_total: int, count: int, net: int, tax: int, total: int, change: float|null}>,
     *     best: array{label: string, total: int}|null
     * }
     */
    private function summary(Builder $query): array
    {
        $empty = ['count' => 0, 'total' => 0];
        $totals = ['count' => 0, 'total' => 0, 'net' => 0, 'tax' => 0];
        $store = $empty;
        $subscriptions = $empty;
        $months = [];
        $first = null;
        $last = null;

        $rows = $query
            ->select(['id', 'invoiceable_type', 'issued_at', 'net_minor', 'tax_minor', 'total_minor'])
            ->orderBy('id')
            ->lazy(500);

        foreach ($rows as $invoice) {
            $issued = $invoice->issued_at;
            $first = $first === null || $issued->lt($first) ? $issued : $first;
            $last = $last === null || $issued->gt($last) ? $issued : $last;

            $key = $issued->format('Y-m');
            $months[$key] ??= [
                'month' => $issued->copy()->startOfMonth(),
                'store_count' => 0, 'store_total' => 0,
                'subscriptions_count' => 0, 'subscriptions_total' => 0,
                'count' => 0, 'net' => 0, 'tax' => 0, 'total' => 0,
            ];

            $isSubscription = $invoice->invoiceable_type === Subscription::class;
            $side = $isSubscription ? 'subscriptions' : 'store';

            $months[$key][$side.'_count']++;
            $months[$key][$side.'_total'] += (int) $invoice->total_minor;
            $months[$key]['count']++;
            $months[$key]['net'] += (int) $invoice->net_minor;
            $months[$key]['tax'] += (int) $invoice->tax_minor;
            $months[$key]['total'] += (int) $invoice->total_minor;

            if ($isSubscription) {
                $subscriptions['count']++;
                $subscriptions['total'] += (int) $invoice->total_minor;
            } else {
                $store['count']++;
                $store['total'] += (int) $invoice->total_minor;
            }

            $totals['count']++;
            $totals['net'] += (int) $invoice->net_minor;
            $totals['tax'] += (int) $invoice->tax_minor;
            $totals['total'] += (int) $invoice->total_minor;
        }

        ksort($months);

        $presented = [];
        $previous = null;
        $best = null;

        foreach ($months as $month) {
            $change = $previous !== null && $previous > 0
                ? round(($month['total'] - $previous) / $previous * 100, 1)
                : null;
            $previous = $month['total'];

            $label = $month['month']->translatedFormat('F Y');
            unset($month['month']);
            $presented[] = ['label' => $label, ...$month, 'change' => $change];

            if ($best === null || $month['total'] > $best['total']) {
                $best = ['label' => $label, 'total' => $month['total']];
            }
        }

        return [
            ...$totals,
            'average' => $totals['count'] > 0 ? intdiv($totals['total'], $totals['count']) : 0,
            'first' => $first,
            'last' => $last,
            'store' => $store,
            'subscriptions' => $subscriptions,
            'months' => $presented,
            'best' => $best,
        ];
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
