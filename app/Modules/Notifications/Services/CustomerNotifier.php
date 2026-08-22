<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Services;

use App\Models\User;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Consultations\Notifications\ConsultationConfirmationNotification;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Notifications\OrderConfirmationNotification;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Notifications\SubscriptionConfirmationNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Notification as NotificationFacade;

/**
 * Sends the customer the confirmation emails for store activity.
 *
 * The counterpart of {@see AdminNotifier}: that one alerts staff in the panel,
 * this one writes to the shopper. Checkout emails go out only after the
 * payment transaction commits, so a declined card produces no email.
 */
final class CustomerNotifier
{
    public function orderPlaced(Order $order): void
    {
        $this->notify($order->user, new OrderConfirmationNotification($order));
    }

    public function subscriptionStarted(Subscription $subscription): void
    {
        $this->notify($subscription->user, new SubscriptionConfirmationNotification($subscription));
    }

    public function consultationBooked(Consultation $consultation): void
    {
        $notification = new ConsultationConfirmationNotification($consultation);
        $email = strtolower(trim($consultation->customer_email));

        if ($email === '') {
            return;
        }

        $customer = User::query()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->first();

        if ($customer instanceof User) {
            $this->notify($customer, $notification);

            return;
        }

        NotificationFacade::route('mail', $consultation->customer_email)
            ->notify($notification->locale(App::getLocale()));
    }

    /**
     * Deliver in the language the customer was browsing in.
     *
     * The queue worker has no session, so the locale has to travel with the
     * notification instead of being read when the job runs.
     */
    private function notify(?User $customer, Notification $notification): void
    {
        if (! $customer instanceof User) {
            return;
        }

        $customer->notify($notification->locale(App::getLocale()));
    }
}
