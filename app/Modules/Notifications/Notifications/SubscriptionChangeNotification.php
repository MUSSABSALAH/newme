<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * A customer changed a running subscription from their account: paused it or
 * picked different dishes, so the kitchen plan needs another look.
 */
final class SubscriptionChangeNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    /**
     * @param  array{public_id: string, reference: string, customer: string|null, date: string|null, count?: int}  $details
     */
    public function __construct(
        private readonly string $event,
        private readonly array $details,
    ) {
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
        return ['event' => $this->event] + $this->details;
    }
}
