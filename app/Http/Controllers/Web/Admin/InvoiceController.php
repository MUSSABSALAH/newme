<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoicePdfRenderer;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class InvoiceController extends Controller
{
    public function __construct(private readonly InvoicePdfRenderer $pdf) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Invoice::class);

        $search = trim((string) $request->query('q', ''));
        $source = (string) $request->query('source', '');

        $type = match ($source) {
            'order' => Order::class,
            'subscription' => Subscription::class,
            default => null,
        };

        $invoices = Invoice::query()
            ->with(['user', 'invoiceable'])
            ->when($type !== null, fn ($query) => $query->where('invoiceable_type', $type))
            ->when($search !== '', fn ($query) => $query->where('number', 'like', '%'.$search.'%'))
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.invoices.index', [
            'invoices' => $invoices,
            'search' => $search,
            'activeSource' => $source,
            'issuedTotalMinor' => (int) Invoice::query()->sum('total_minor'),
        ]);
    }

    public function download(Invoice $invoice): Response
    {
        $this->authorize('view', $invoice);

        return response($this->pdf->render($invoice), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$invoice->fileName().'"',
        ]);
    }
}
