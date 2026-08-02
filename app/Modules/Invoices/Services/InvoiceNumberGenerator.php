<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use Carbon\CarbonInterface;

/**
 * Hands out gap-free invoice numbers of the form INV-2026-000001.
 *
 * The sequence restarts each calendar year. Callers must run this inside the
 * transaction that inserts the invoice: the row lock taken here only holds for
 * the length of that transaction, and the unique index on `number` is the
 * backstop if two writers still manage to collide.
 */
final class InvoiceNumberGenerator
{
    private const PREFIX = 'INV';

    private const SEQUENCE_LENGTH = 6;

    public function next(CarbonInterface $issuedAt): string
    {
        $prefix = self::PREFIX.'-'.$issuedAt->format('Y').'-';

        $last = Invoice::query()
            ->where('number', 'like', $prefix.'%')
            ->orderByDesc('number')
            ->lockForUpdate()
            ->value('number');

        $sequence = $last === null
            ? 1
            : ((int) substr((string) $last, strlen($prefix))) + 1;

        return $prefix.str_pad((string) $sequence, self::SEQUENCE_LENGTH, '0', STR_PAD_LEFT);
    }
}
