<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Notifications;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoicePdfRenderer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Emails the customer their invoice with the PDF attached.
 *
 * Queued so a slow render never holds up checkout; the document is built when
 * the mail is actually sent rather than carried through the queue payload.
 */
final class InvoiceIssuedNotification extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Invoice $invoice) {}

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $pdf = app(InvoicePdfRenderer::class)->render($this->invoice);

        return (new MailMessage)
            ->subject((string) __('invoices.mail.subject', ['number' => $this->invoice->number]))
            ->greeting((string) __('invoices.mail.greeting'))
            ->line((string) __('invoices.mail.intro', [
                'number' => $this->invoice->number,
                'total' => $this->invoice->totalDisplay(),
            ]))
            ->line((string) __('invoices.mail.attached'))
            ->action((string) __('invoices.mail.action'), route('website.account.invoice', $this->invoice))
            ->attachData($pdf, $this->invoice->fileName(), ['mime' => 'application/pdf']);
    }
}
