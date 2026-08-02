<?php

declare(strict_types=1);

namespace App\Modules\Invoices\DTOs;

/**
 * The figures an invoice will be written with, computed from a payable.
 *
 * Two invariants hold for every draft, whatever it was built from:
 * lines total − discount = net, and net + tax = total.
 */
final readonly class InvoiceDraft
{
    /**
     * @param  list<InvoiceLine>  $lines
     */
    public function __construct(
        public array $lines,
        public int $linesTotalMinor,
        public int $discountMinor,
        public int $netMinor,
        public int $taxMinor,
        public int $totalMinor,
        public int $taxRateBps,
    ) {}
}
