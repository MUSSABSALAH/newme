<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoicePdfStore;
use App\Modules\Invoices\Services\InvoiceReportPdfRenderer;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

final class InvoiceController extends Controller
{
    public function __construct(private readonly InvoicePdfStore $pdf) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Invoice::class);

        $filters = $this->filters($request);

        $invoices = $this->filtered($filters)
            ->with(['user', 'invoiceable'])
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.invoices.index', [
            'invoices' => $invoices,
            'search' => $filters['q'],
            'activeSource' => $filters['source'],
            'from' => $filters['from']?->toDateString(),
            'to' => $filters['to']?->toDateString(),
            'issuedTotalMinor' => (int) Invoice::query()->sum('total_minor'),
        ]);
    }

    /**
     * The filtered invoices with a monthly sales summary, as a PDF.
     */
    public function report(Request $request, InvoiceReportPdfRenderer $renderer): Response
    {
        $this->authorize('viewAny', Invoice::class);

        $filters = $this->filters($request);

        $labels = array_values(array_filter([
            $filters['source'] !== '' ? __('invoices.sources.'.$filters['source']) : null,
            $filters['q'] !== '' ? __('invoices.report.search_label', ['q' => $filters['q']]) : null,
            $filters['from'] ? __('invoices.report.from_label', ['date' => $filters['from']->toDateString()]) : null,
            $filters['to'] ? __('invoices.report.to_label', ['date' => $filters['to']->toDateString()]) : null,
        ]));

        return response($renderer->render($this->filtered($filters), $labels), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="invoices-report-'.now()->toDateString().'.pdf"',
        ]);
    }

    public function download(Invoice $invoice): Response
    {
        $this->authorize('view', $invoice);

        return response($this->pdf->bytes($invoice), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$invoice->fileName().'"',
        ]);
    }

    /**
     * @return array{q: string, source: string, from: Carbon|null, to: Carbon|null}
     */
    private function filters(Request $request): array
    {
        $source = (string) $request->query('source', '');

        return [
            'q' => trim((string) $request->query('q', '')),
            'source' => in_array($source, ['order', 'subscription'], true) ? $source : '',
            'from' => $this->date($request->query('from')),
            'to' => $this->date($request->query('to')),
        ];
    }

    /**
     * @param  array{q: string, source: string, from: Carbon|null, to: Carbon|null}  $filters
     * @return Builder<Invoice>
     */
    private function filtered(array $filters): Builder
    {
        $type = match ($filters['source']) {
            'order' => Order::class,
            'subscription' => Subscription::class,
            default => null,
        };

        return Invoice::query()
            ->when($type !== null, fn ($query) => $query->where('invoiceable_type', $type))
            ->when($filters['q'] !== '', fn ($query) => $query->where('number', 'like', '%'.$filters['q'].'%'))
            ->when($filters['from'] !== null, fn ($query) => $query->where('issued_at', '>=', $filters['from']->copy()->startOfDay()))
            ->when($filters['to'] !== null, fn ($query) => $query->where('issued_at', '<', $filters['to']->copy()->addDay()->startOfDay()));
    }

    private function date(mixed $value): ?Carbon
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        try {
            return Carbon::parse(trim($value))->startOfDay();
        } catch (\Throwable) {
            return null;
        }
    }
}
