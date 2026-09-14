<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Modules\Invoices\Models\Invoice;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

/**
 * Keeps the rendered invoice so mPDF runs once per document instead of once per
 * download.
 *
 * An issued invoice is a snapshot: the seller and buyer parties and the lines
 * are stored on the row itself, so nothing outside the row can change what the
 * file says. The two things that can are the language, because the template
 * prints one translated word, and an edit to the invoice — both are part of the
 * file name, so a change produces a new file rather than a stale one.
 *
 * The customer still gets the file immediately on the same request; only the
 * work behind it is skipped.
 */
final class InvoicePdfStore
{
    private const DISK = 'local';

    public function __construct(private readonly InvoicePdfRenderer $renderer) {}

    public function bytes(Invoice $invoice): string
    {
        $disk = Storage::disk(self::DISK);
        $path = $this->pathFor($invoice);

        $stored = $disk->exists($path) ? $disk->get($path) : null;

        if (is_string($stored) && $stored !== '') {
            return $stored;
        }

        $pdf = $this->renderer->render($invoice);

        $this->forgetOtherRevisions($invoice, $path);
        $disk->put($path, $pdf);

        return $pdf;
    }

    /**
     * Drops earlier builds of this invoice in this language, leaving the other
     * languages alone.
     */
    private function forgetOtherRevisions(Invoice $invoice, string $keep): void
    {
        $disk = Storage::disk(self::DISK);
        $prefix = App::getLocale().'-';

        foreach ($disk->files($this->directoryFor($invoice)) as $existing) {
            if ($existing !== $keep && str_starts_with(basename($existing), $prefix)) {
                $disk->delete($existing);
            }
        }
    }

    private function pathFor(Invoice $invoice): string
    {
        return sprintf(
            '%s/%s-%d.pdf',
            $this->directoryFor($invoice),
            App::getLocale(),
            $invoice->updated_at?->getTimestamp() ?? 0,
        );
    }

    private function directoryFor(Invoice $invoice): string
    {
        return 'invoices/'.$invoice->public_id;
    }
}
