<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use App\Modules\Orders\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Queued so a purchase is not held up by a permission lookup plus one insert
 * per member of staff. Sent on the default queue so it never competes with an
 * OTP, and stamped with the request locale so the wording is unchanged.
 */
final class NewOrderNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public function __construct(private readonly Order $order)
    {
        $this->onQueue(MessageQueue::Default->value);
        $this->captureRequestLocale();
    }

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Payload is read back by NotificationEvent, so keep it primitive.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event' => NotificationEvent::OrderPlaced->value,
            'public_id' => $this->order->public_id,
            'reference' => $this->order->reference(),
            'customer' => $this->order->user?->name,
            'total_minor' => $this->order->total_minor,
        ];
    }
}
