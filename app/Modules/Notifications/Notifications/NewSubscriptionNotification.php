<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Notifications;

use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Queued for the same reason as NewOrderNotification: a subscription should not
 * wait on one insert per member of staff.
 */
final class NewSubscriptionNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public function __construct(private readonly Subscription $subscription)
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
            'event' => NotificationEvent::SubscriptionStarted->value,
            'public_id' => $this->subscription->public_id,
            'reference' => $this->subscription->reference(),
            'customer' => $this->subscription->user?->name,
            'plan' => $this->subscription->plan_name,
            'total_minor' => $this->subscription->total_minor,
        ];
    }
}
