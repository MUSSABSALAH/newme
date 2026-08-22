<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Consultations\Models\Consultation;
use App\Modules\Notifications\Enums\NotificationEvent;
use Illuminate\Notifications\Notification;

final class NewConsultationNotification extends Notification
{
    public function __construct(private readonly Consultation $consultation) {}

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
