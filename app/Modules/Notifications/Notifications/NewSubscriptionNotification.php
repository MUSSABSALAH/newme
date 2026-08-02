<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Notifications\Notification;

final class NewSubscriptionNotification extends Notification
{
    public function __construct(private readonly Subscription $subscription) {}

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
            'event' => NotificationEvent::SubscriptionStarted->value,
            'public_id' => $this->subscription->public_id,
            'reference' => $this->subscription->reference(),
            'customer' => $this->subscription->user?->name,
            'plan' => $this->subscription->plan_name,
            'total_minor' => $this->subscription->total_minor,
        ];
    }
}
