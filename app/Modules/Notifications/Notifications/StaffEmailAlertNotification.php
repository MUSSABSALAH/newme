<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Models\User;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Services\StaffMailGate;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use App\Modules\Notifications\Support\StaffAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Email-only alert for the staff the super admin picked on the notifications
 * page. Independent of the topbar inbox notifications, and on the default
 * queue so OTPs and customer emails always go first.
 */
final class StaffEmailAlertNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    public int $tries = 3;

    /**
     * @param  array<string, mixed>  $payload  Primitive values read by NotificationEvent.
     */
    public function __construct(
        private readonly NotificationEvent $event,
        private readonly array $payload,
    ) {
        $this->onQueue(MessageQueue::Default->value);
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

    /**
     * Checked again when the queued email actually goes out, so turning the
     * emails off, removing a recipient or reaching the cap still holds.
     */
    public function shouldSend(object $notifiable, string $channel): bool
    {
        return $notifiable instanceof User && app(StaffMailGate::class)->allows($this->event, $notifiable);
    }

    public function toMail(object $notifiable): MailMessage
    {
        return StaffAlertMail::make($this->event, $this->payload);
    }

    public function event(): NotificationEvent
    {
        return $this->event;
    }
}
