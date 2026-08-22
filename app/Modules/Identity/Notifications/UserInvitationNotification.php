<?php

declare(strict_types=1);

namespace App\Modules\Identity\Notifications;

use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\BrandMail;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class UserInvitationNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    public function __construct(
        private readonly string $acceptUrl,
        private readonly string $inviterName,
    ) {
        $this->onQueue(MessageQueue::Mail->value);
        $this->captureRequestLocale();
    }

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
        $subject = (string) __('invitations.mail.subject', ['app' => $appName]);
        $greeting = (string) __('invitations.mail.greeting');
        $intro = (string) __('invitations.mail.intro', [
            'inviter' => $this->inviterName,
            'app' => $appName,
        ]);
        $action = (string) __('invitations.mail.action');
        $expiry = (string) __('invitations.mail.expiry');
        $ignore = (string) __('invitations.mail.ignore');

        return BrandMail::make(
            'mail.operations.user-invitation',
            [
                'title' => $subject,
                'heading' => __('mail.headings.invitation'),
                'subheading' => __('mail.headings.invitation_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'actionLabel' => $action,
                'actionUrl' => $this->acceptUrl,
                'expiry' => $expiry,
                'ignore' => $ignore,
            ],
            $subject,
            $greeting,
            [$intro, $expiry, $ignore],
            $action,
            $this->acceptUrl,
        );
    }
}
