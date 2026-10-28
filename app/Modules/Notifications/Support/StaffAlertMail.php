<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use App\Modules\Notifications\Enums\NotificationEvent;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Branded staff-alert email built from the same title/body the inbox uses.
 */
final class StaffAlertMail
{
    /**
     * @param  array<string, mixed>  $payload
     */
    public static function make(NotificationEvent $event, array $payload): MailMessage
    {
        $title = $event->title();
        $body = $event->body($payload);
        $url = $event->url($payload);
        $action = (string) __('notifications.mail.action');

        $html = '<p style="margin:0 0 18px;">'.e($body).'</p>';

        if ($url !== null) {
            $html .= '<p style="margin:0;"><a href="'.e($url).'" style="display:inline-block;background:#128C8C;color:#ffffff;text-decoration:none;font-weight:bold;padding:10px 18px;border-radius:8px;">'.e($action).'</a></p>';
        }

        $lines = [$body];

        if ($url !== null) {
            $lines[] = $action.': '.$url;
        }

        return BrandMail::html(
            BrandMail::shell(
                $title,
                $title,
                $html,
                (string) __('mail.headings.staff_alert_sub'),
            ),
            implode("\n\n", $lines),
            $title,
            $title,
            $lines,
        );
    }
}
