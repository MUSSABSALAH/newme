<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use App\Modules\Notifications\Enums\NotificationEvent;
use Illuminate\Notifications\DatabaseNotification;

/**
 * Turns a stored notification row into something a Blade view can render.
 *
 * Rows written by an older release may carry an unknown event, so every helper
 * degrades gracefully instead of throwing.
 */
final class NotificationPresenter
{
    /**
     * Everything a view needs, so templates hold no notification logic.
     *
     * @return array{id: string, title: string, body: string, icon: string, unread: bool, time: string|null}
     */
    public static function describe(DatabaseNotification $notification): array
    {
        return [
            'id' => (string) $notification->id,
            'title' => self::title($notification),
            'body' => self::body($notification),
            'icon' => self::icon($notification),
            'unread' => $notification->read_at === null,
            'time' => $notification->created_at?->diffForHumans(),
        ];
    }

    public static function event(DatabaseNotification $notification): ?NotificationEvent
    {
        $data = self::payload($notification);
        $event = $data['event'] ?? null;

        return is_string($event) ? NotificationEvent::tryFrom($event) : null;
    }

    public static function title(DatabaseNotification $notification): string
    {
        return self::event($notification)?->title() ?? (string) __('notifications.unknown_event');
    }

    public static function body(DatabaseNotification $notification): string
    {
        return self::event($notification)?->body(self::payload($notification)) ?? '';
    }

    public static function icon(DatabaseNotification $notification): string
    {
        return self::event($notification)?->icon() ?? 'bell';
    }

    public static function url(DatabaseNotification $notification): ?string
    {
        return self::event($notification)?->url(self::payload($notification));
    }

    /**
     * @return array<string, mixed>
     */
    private static function payload(DatabaseNotification $notification): array
    {
        return $notification->data;
    }
}
