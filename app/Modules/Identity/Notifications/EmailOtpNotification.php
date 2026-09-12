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

        $body = '<p style="margin:0 0 14px;">'.e($greeting).'</p>'
            .'<p style="margin:0 0 18px;">'.e($intro).'</p>'
            .'<table role="presentation" width="100%" cellspacing="0" cellpadding="0"><tr><td align="center" style="padding:8px 0 18px;">'
            .'<div style="display:inline-block;background:#F4F7F7;border:1px solid #D7E3E3;border-radius:8px;padding:14px 28px;font-size:28px;font-weight:bold;letter-spacing:6px;color:#128C8C;direction:ltr;">'
            .e($this->code)
            .'</div></td></tr></table>'
            .'<p style="margin:0 0 8px;color:#555555;">'.e($expiry).'</p>'
            .'<p style="margin:0;color:#777777;font-size:13px;">'.e($ignore).'</p>';

        return BrandMail::html(
            BrandMail::shell(
                $subject,
                (string) __('mail.headings.otp'),
                $body,
                (string) __('mail.headings.otp_sub'),
            ),
            implode("\n\n", [$greeting, $intro, $this->code, $expiry, $ignore]),
            $subject,
            $greeting,
            [$intro, $codeLine, $expiry, $ignore],
        );
    }
}
