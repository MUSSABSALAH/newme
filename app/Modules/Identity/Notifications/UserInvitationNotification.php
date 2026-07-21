<?php

declare(strict_types=1);

namespace App\Modules\Identity\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class UserInvitationNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly string $acceptUrl,
        private readonly string $inviterName,
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
            ->subject((string) __('invitations.mail.subject', ['app' => $appName]))
            ->greeting((string) __('invitations.mail.greeting'))
            ->line((string) __('invitations.mail.intro', [
                'inviter' => $this->inviterName,
                'app' => $appName,
            ]))
            ->action((string) __('invitations.mail.action'), $this->acceptUrl)
            ->line((string) __('invitations.mail.expiry'))
            ->line((string) __('invitations.mail.ignore'));
    }
}
