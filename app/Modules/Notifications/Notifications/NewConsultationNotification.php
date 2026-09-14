<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Consultations\Models\Consultation;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Queued like the other staff alerts. The locale matters most here: whenLabel()
 * formats the date with translatedFormat, so without the captured locale a
 * queued copy would spell the month differently than the synchronous one did.
 */
final class NewConsultationNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public function __construct(private readonly Consultation $consultation)
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
        return [
            'event' => NotificationEvent::ConsultationBooked->value,
            'public_id' => $this->consultation->public_id,
            'reference' => $this->consultation->reference(),
            'customer' => $this->consultation->customer_name,
            'when' => $this->consultation->whenLabel(),
        ];
    }
}
