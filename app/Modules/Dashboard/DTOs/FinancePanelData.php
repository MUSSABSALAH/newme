<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Invoices\Models\Invoice;
use Illuminate\Support\Collection;

/**
 * Money figures for the finance panel.
 *
 * Sales are taken from issued invoices so only confirmed money is counted — a
 * cash-on-delivery order waiting for collection stays out.
 */
final class FinancePanelData
{
    /**
     * @param  Collection<int, Invoice>  $recentInvoices
     */
    public function __construct(
        public readonly int $salesTodayMinor,
        public readonly int $salesMonthMinor,
        public readonly int $invoicesToday,
        public readonly int $invoicesMonth,
        public readonly int $averageInvoiceMinor,
        public readonly Collection $recentInvoices,
    ) {}
}
