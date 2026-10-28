<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Notifications;

use App\Models\User;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\BrandMail;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

/**
 * Tells the customer the team moved their start date, paused or resumed their plan.
 * Sent only when the staff member ticks "notify the customer".
 */
final class SubscriptionChangedByStaffNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public const START_CHANGED = 'start_changed';

    public const PAUSED = 'paused';

    public const RESUMED = 'resumed';

    public int $tries = 3;

    public function __construct(
        public Subscription $subscription,
        public string $change,
    ) {
        $this->onQueue(MessageQueue::Mail->value);
        $this->captureRequestLocale();
    }

    /**
     * @return list<int>
     */
    public function backoff(): array
    {
        return [30, 120];
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
        $subscription = $this->subscription;
        $key = 'subscriptions.manage.mail.'.$this->change;
        $format = static fn (?Carbon $date): string => $date?->translatedFormat('d M Y') ?? '—';

        $subject = (string) __($key.'.subject', ['reference' => $subscription->reference()]);
        $greeting = (string) __('subscriptions.mail.greeting', [
            'name' => $notifiable instanceof User ? $notifiable->name : '',
        ]);
        $body = (string) __($key.'.body', [
            'plan' => $subscription->planLabel(),
            'reference' => $subscription->reference(),
            'start' => $format($subscription->start_date),
            'end' => $format($subscription->endDate()),
            'date' => $format($subscription->pause_started_on),
        ]);
        $note = (string) __($key.'.note');
        $action = (string) __('subscriptions.mail.action');
        $url = route('website.account.subscription', $subscription);

        $html = '<p style="margin:0 0 14px;">'.e($greeting).'</p>'
            .'<p style="margin:0 0 14px;">'.e($body).'</p>'
            .'<p style="margin:0 0 18px;color:#555;">'.e($note).'</p>'
            .'<p style="margin:0;"><a href="'.e($url).'" style="display:inline-block;background:#128C8C;color:#ffffff;text-decoration:none;font-weight:bold;padding:10px 18px;border-radius:8px;">'.e($action).'</a></p>';

        $lines = [$body, $note, $action.': '.$url];

        return BrandMail::html(
            BrandMail::shell($subject, $subject, $html),
            $greeting."\n\n".implode("\n\n", $lines),
            $subject,
            $greeting,
            $lines,
        );
    }
}
