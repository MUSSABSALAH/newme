<?php

declare(strict_types=1);

namespace App\Modules\Identity\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class PasswordResetNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly string $resetUrl,
        private readonly int $expiresInMinutes,
    ) {}

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $appName = (string) config('app.name');

        return (new MailMessage)
            ->subject((string) __('auth.passwords.mail.subject', ['app' => $appName]))
            ->greeting((string) __('auth.passwords.mail.greeting'))
            ->line((string) __('auth.passwords.mail.intro'))
            ->action((string) __('auth.passwords.mail.action'), $this->resetUrl)
            ->line((string) __('auth.passwords.mail.expiry', ['count' => $this->expiresInMinutes]))
            ->line((string) __('auth.passwords.mail.ignore'));
    }
}
