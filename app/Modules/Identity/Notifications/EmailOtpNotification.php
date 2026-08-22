<?php

declare(strict_types=1);

namespace App\Modules\Identity\Notifications;

use App\Models\User;
use App\Modules\Identity\Models\CustomerOtp;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\BrandMail;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Delivers a one-time sign-in code by email.
 *
 * Queued on the highest-priority {@see MessageQueue::Otp} lane so a login
 * code is not stuck behind invoice PDFs or receipts.
 */
final class EmailOtpNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable;

    public int $tries = 3;

    public function __construct(public readonly string $code)
    {
        $this->onQueue(MessageQueue::Otp->value);
        $this->captureRequestLocale();
    }

    /**
     * @return list<int>
     */
    public function backoff(): array
    {
        return [5, 15];
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
        $name = $notifiable instanceof User ? $notifiable->name : '';
        $subject = (string) __('account.otp.mail.subject');
        $greeting = (string) __('account.otp.mail.greeting', ['name' => $name]);
        $intro = (string) __('account.otp.mail.intro');
        $codeLine = (string) __('account.otp.mail.code', ['code' => $this->code]);
        $expiry = (string) __('account.otp.mail.expiry', ['minutes' => CustomerOtp::TTL_MINUTES]);
        $ignore = (string) __('account.otp.mail.ignore');

        return BrandMail::make(
            'mail.operations.email-otp',
            [
                'title' => $subject,
                'heading' => __('mail.headings.otp'),
                'subheading' => __('mail.headings.otp_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'code' => $this->code,
                'expiry' => $expiry,
                'ignore' => $ignore,
            ],
            $subject,
            $greeting,
            [$intro, $codeLine, $expiry, $ignore],
        );
    }
}
