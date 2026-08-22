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

final class PasswordResetNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    public function __construct(
        private readonly string $resetUrl,
        private readonly int $expiresInMinutes,
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
        $subject = (string) __('auth.passwords.mail.subject', ['app' => $appName]);
        $greeting = (string) __('auth.passwords.mail.greeting');
        $intro = (string) __('auth.passwords.mail.intro');
        $action = (string) __('auth.passwords.mail.action');
        $expiry = (string) __('auth.passwords.mail.expiry', ['count' => $this->expiresInMinutes]);
        $ignore = (string) __('auth.passwords.mail.ignore');

        return BrandMail::make(
            'mail.operations.password-reset',
            [
                'title' => $subject,
                'heading' => __('mail.headings.password'),
                'subheading' => __('mail.headings.password_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'actionLabel' => $action,
                'actionUrl' => $this->resetUrl,
                'expiry' => $expiry,
                'ignore' => $ignore,
            ],
            $subject,
            $greeting,
            [$intro, $expiry, $ignore],
            $action,
            $this->resetUrl,
        );
    }
}
