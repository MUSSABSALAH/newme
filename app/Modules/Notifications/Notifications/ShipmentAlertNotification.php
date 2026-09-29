<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * A courier shipment needs a person: it failed, was cancelled at the courier,
 * or could not be cancelled there after staff cancelled it here.
 */
final class ShipmentAlertNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    /**
     * @param  array{reference: string, customer: string|null, problem: string, date: string|null}  $details
     */
    public function __construct(private readonly array $details)
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
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return ['event' => NotificationEvent::ShipmentAlert->value] + $this->details;
    }
}
