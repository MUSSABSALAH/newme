<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoicePdfRenderer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class InvoiceController extends Controller
{
    public function __construct(private readonly InvoicePdfRenderer $pdf) {}

    public function download(Invoice $invoice): Response
    {
        abort_unless($invoice->user_id === Auth::id(), 404);

        return response($this->pdf->render($invoice), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$invoice->fileName().'"',
        ]);
    }
}
