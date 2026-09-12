<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use Illuminate\Notifications\Messages\MailMessage;

/**
 * Builds a MailMessage that uses the New Me branded HTML shell.
 *
 * Greeting / lines / action stay on the message so existing tests can read
 * them, while the customer sees the invoice-like layout.
 */
final class BrandMail
{
    public static function font(?string $locale = null): string
    {
        return ($locale ?? app()->getLocale()) === 'ar'
            ? "'Cairo', Tahoma, Arial, sans-serif"
            : 'Tahoma, Arial, sans-serif';
    }

    /**
     * @param  array<string, mixed>  $data
     * @param  list<string>  $lines
     */
    public static function make(
        string $view,
        array $data,
        string $subject,
        ?string $greeting = null,
        array $lines = [],
        ?string $actionLabel = null,
        ?string $actionUrl = null,
    ): MailMessage {
        $data['mailFont'] ??= self::font();

        $message = (new MailMessage)
            ->subject($subject)
            ->view($view, $data);

        if ($greeting !== null) {
            $message->greeting($greeting);
        }

        foreach ($lines as $line) {
            $message->line($line);
        }

        if ($actionLabel !== null && $actionUrl !== null) {
            $message->action($actionLabel, $actionUrl);
        }

        return $message;
    }
}
