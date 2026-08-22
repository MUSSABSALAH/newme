<?php

declare(strict_types=1);

namespace App\Modules\Orders\Notifications;

use App\Models\User;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\BrandMail;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Models\OrderItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Tells the customer their store order went through.
 *
 * Queued so a slow mail server never holds up the checkout response: the
 * shopper sees the confirmation page immediately and the receipt follows.
 */
final class OrderConfirmationNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(public Order $order)
    {
        $this->onQueue(MessageQueue::Mail->value);
        $this->captureRequestLocale();
    }

    /**
     * @return list<int>
     */
    public function backoff(): array
    {
        return [30, 120];
    }

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $order = $this->order->loadMissing('items');
        $reference = $order->reference();
        $currency = (string) __('invoices.pdf.currency');
        $subject = (string) __('orders.mail.subject', ['reference' => $reference]);
        $greeting = (string) __('orders.mail.greeting', ['name' => $this->recipientName($notifiable)]);
        $intro = (string) __('orders.mail.intro', ['reference' => $reference]);
        $totalLine = (string) __('orders.mail.total', [
            'total' => $order->totalDisplay(),
            'currency' => $currency,
        ]);
        $action = (string) __('orders.mail.action');
        $url = route('website.account.order', $order);
        $outro = (string) __('orders.mail.outro');

        $items = [];
        $lines = [$intro];

        foreach ($order->items as $item) {
            /** @var OrderItem $item */
            $items[] = [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'total' => $item->lineTotalDisplay(),
            ];
            $lines[] = '• '.$item->name.' × '.$item->quantity.' — '.$item->lineTotalDisplay().' '.$currency;
        }

        $lines[] = $totalLine;
        $paymentLine = null;
        $deferredLine = null;

        if ($order->payment_method !== null) {
            $paymentLine = (string) __('orders.mail.payment', ['method' => $order->payment_method->label()]);
            $lines[] = $paymentLine;

            if ($order->payment_method->isDeferred()) {
                $deferredLine = (string) __('orders.mail.cash_on_delivery');
                $lines[] = $deferredLine;
            }
        }

        $lines[] = $outro;

        return BrandMail::make(
            'mail.operations.order-confirmation',
            [
                'title' => $subject,
                'heading' => __('mail.headings.order'),
                'subheading' => __('mail.headings.order_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'items' => $items,
                'totalLine' => $totalLine,
                'paymentLine' => $paymentLine,
                'deferredLine' => $deferredLine,
                'actionLabel' => $action,
                'actionUrl' => $url,
                'outro' => $outro,
            ],
            $subject,
            $greeting,
            $lines,
            $action,
            $url,
        );
    }

    private function recipientName(object $notifiable): string
    {
        return $notifiable instanceof User ? $notifiable->name : '';
    }
}
