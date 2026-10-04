<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Enums;

use App\Support\Money\Money;

/**
 * What a stored notification is about.
 *
 * The value is persisted inside the notification payload, so treat the strings
 * as a stable contract with rows already in the database.
 */
enum NotificationEvent: string
{
    case OrderPlaced = 'order.placed';
    case SubscriptionStarted = 'subscription.started';
    case SubscriptionPaused = 'subscription.paused';
    case SubscriptionResumed = 'subscription.resumed';
    case SubscriptionMealsChanged = 'subscription.meals_changed';
    case ConsultationBooked = 'consultation.booked';
    case ShipmentAlert = 'shipment.alert';

    public function icon(): string
    {
        return match ($this) {
            self::OrderPlaced => 'package',
            self::SubscriptionStarted => 'repeat',
            self::SubscriptionPaused => 'circle-pause',
            self::SubscriptionResumed => 'circle-play',
            self::SubscriptionMealsChanged => 'utensils',
            self::ConsultationBooked => 'calendar-check',
            self::ShipmentAlert => 'triangle-alert',
        };
    }

    public function title(): string
    {
        return (string) __('notifications.events.'.$this->value.'.title');
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    public function body(array $payload): string
    {
        $totalMinor = $payload['total_minor'] ?? null;

        return (string) __('notifications.events.'.$this->value.'.body', [
            'reference' => (string) ($payload['reference'] ?? '—'),
            'customer' => (string) ($payload['customer'] ?? __('notifications.unknown_customer')),
            'total' => is_numeric($totalMinor) ? Money::fromMinor((int) $totalMinor)->format() : '—',
            'when' => (string) ($payload['when'] ?? '—'),
            'date' => (string) ($payload['date'] ?? '—'),
            'count' => (string) ($payload['count'] ?? '—'),
            'problem' => is_string($payload['problem'] ?? null)
                ? (string) __('notifications.shipment_problems.'.$payload['problem'])
                : '—',
        ]);
    }

    /**
     * Admin destination for the subject of the notification.
     *
     * @param  array<string, mixed>  $payload
     */
    public function url(array $payload): ?string
    {
        if ($this === self::ShipmentAlert) {
            $date = $payload['date'] ?? null;

            return route('admin.deliveries.index', is_string($date) && $date !== '' ? ['date' => $date] : []);
        }

        $publicId = $payload['public_id'] ?? null;

        if (! is_string($publicId) || $publicId === '') {
            return null;
        }

        return match ($this) {
            self::OrderPlaced => route('admin.orders.show', $publicId),
            self::SubscriptionStarted,
            self::SubscriptionPaused,
            self::SubscriptionResumed,
            self::SubscriptionMealsChanged => route('admin.subscriptions.show', $publicId),
            self::ConsultationBooked => route('admin.consultations.show', $publicId),
            self::ShipmentAlert => null,
        };
    }
}
