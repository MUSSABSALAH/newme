<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Services;

use App\Models\User;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Notifications\Notifications\NewConsultationNotification;
use App\Modules\Notifications\Notifications\NewOrderNotification;
use App\Modules\Notifications\Notifications\NewSubscriptionNotification;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Notifications\ShipmentAlertNotification;
use App\Modules\Notifications\Notifications\StaffEmailAlertNotification;
use App\Modules\Notifications\Notifications\SubscriptionChangeNotification;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Fans store activity out to the staff who are allowed to act on it.
 *
 * Recipients are derived from permissions rather than roles, so granting a new
 * role "orders.view" is enough to start receiving order notifications.
 */
final class AdminNotifier
{
    private const EMAIL_SPACING_SECONDS = 20;

    public function __construct(private readonly StaffMailGate $mailGate) {}

    public function orderPlaced(Order $order): void
    {
        $recipients = $this->recipients(PermissionName::OrdersView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new NewOrderNotification($order));
        }

        $this->email(NotificationEvent::OrderPlaced, [
            'public_id' => $order->public_id,
            'reference' => $order->reference(),
            'customer' => $order->user?->name,
            'total_minor' => $order->total_minor,
        ]);
    }

    public function subscriptionStarted(Subscription $subscription): void
    {
        $recipients = $this->recipients(PermissionName::SubscriptionsView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new NewSubscriptionNotification($subscription));
        }

        $this->email(NotificationEvent::SubscriptionStarted, [
            'public_id' => $subscription->public_id,
            'reference' => $subscription->reference(),
            'customer' => $subscription->user?->name,
            'total_minor' => $subscription->total_minor,
        ]);
    }

    public function subscriptionPaused(Subscription $subscription, string $pauseFrom): void
    {
        $this->subscriptionChanged(NotificationEvent::SubscriptionPaused, $subscription, [
            'date' => $pauseFrom,
        ]);
    }

    public function subscriptionResumed(Subscription $subscription, ?string $restartsOn): void
    {
        $this->subscriptionChanged(NotificationEvent::SubscriptionResumed, $subscription, [
            'date' => $restartsOn,
        ]);
    }

    /**
     * @param  list<string>  $dates  Delivery days whose dishes changed, earliest first.
     */
    public function subscriptionMealsChanged(Subscription $subscription, array $dates): void
    {
        if ($dates === []) {
            return;
        }

        $this->subscriptionChanged(NotificationEvent::SubscriptionMealsChanged, $subscription, [
            'date' => $dates[0],
            'count' => count($dates),
        ]);
    }

    public function consultationBooked(Consultation $consultation): void
    {
        $recipients = $this->recipients(PermissionName::ConsultationsView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new NewConsultationNotification($consultation));
        }
    }

    /**
     * @param  array{reference: string, customer: string|null, problem: string, date: string|null}  $details
     */
    public function shipmentAlert(array $details): void
    {
        $recipients = $this->recipients(PermissionName::DeliveryView);

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new ShipmentAlertNotification($details));
        }
    }

    /**
     * @param  array<string, mixed>  $details
     */
    private function subscriptionChanged(NotificationEvent $event, Subscription $subscription, array $details): void
    {
        $recipients = $this->recipients(PermissionName::SubscriptionsView);
        $payload = [
            'public_id' => $subscription->public_id,
            'reference' => $subscription->reference(),
            'customer' => $subscription->user?->name,
            ...$details,
        ];

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new SubscriptionChangeNotification($event->value, $payload));
        }

        $this->email($event, $payload);
    }

    /**
     * Staff-alert email for the people picked on the notifications page; a
     * separate channel from the inbox rows above.
     *
     * @param  array<string, mixed>  $payload
     */
    private function email(NotificationEvent $event, array $payload): void
    {
        if (! $event->emailsStaff()) {
            return;
        }

        try {
            $recipients = $this->mailGate->recipientsFor($event);
        } catch (QueryException $e) {
            report($e);

            return;
        }

        // Mail providers cap emails per second, and the customer's receipt and
        // invoice leave at the same moment, so staff copies go out staggered.
        foreach ($recipients->values() as $index => $staff) {
            $staff->notify(
                (new StaffEmailAlertNotification($event, ['event' => $event->value] + $payload))
                    ->delay(now()->addSeconds(($index + 1) * self::EMAIL_SPACING_SECONDS)),
            );
        }
    }

    /**
     * Active staff holding the given permission, directly or through a role.
     *
     * @return Collection<int, User>
     */
    private function recipients(PermissionName $permission): Collection
    {
        try {
            return User::query()
                ->staff()
                ->where('status', UserStatus::Active->value)
                ->permission($permission->value)
                ->get();
        } catch (PermissionDoesNotExist) {
            return new Collection;
        }
    }
}
