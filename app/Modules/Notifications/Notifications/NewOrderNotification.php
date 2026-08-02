<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Orders\Models\Order;
use Illuminate\Notifications\Notification;

final class NewOrderNotification extends Notification
{
    public function __construct(private readonly Order $order) {}

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
