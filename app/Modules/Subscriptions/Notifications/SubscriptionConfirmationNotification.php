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

/**
 * Welcomes the customer to the meal plan they just subscribed to.
 *
 * Queued for the same reason as the order receipt: checkout must not wait on
 * the mail server.
 */
final class SubscriptionConfirmationNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(public Subscription $subscription)
    {
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
        $currency = (string) __('invoices.pdf.currency');
        $subject = (string) __('subscriptions.mail.subject', ['plan' => $subscription->plan_name]);
        $greeting = (string) __('subscriptions.mail.greeting', [
            'name' => $notifiable instanceof User ? $notifiable->name : '',
        ]);
        $intro = (string) __('subscriptions.mail.intro', ['plan' => $subscription->plan_name]);
        $referenceLine = (string) __('subscriptions.mail.reference', ['reference' => $subscription->reference()]);
        $durationLine = (string) __('subscriptions.mail.duration', ['days' => $subscription->total_days]);
        $startLine = $subscription->start_date === null
            ? null
            : (string) __('subscriptions.mail.start', [
                'date' => $subscription->start_date->translatedFormat('d M Y'),
            ]);
        $totalLine = (string) __('subscriptions.mail.total', [
            'total' => $subscription->totalDisplay(),
            'per_day' => $subscription->perDayDisplay(),
            'currency' => $currency,
        ]);
        $action = (string) __('subscriptions.mail.action');
        $url = route('website.account.subscription', $subscription);
        $outro = (string) __('subscriptions.mail.outro');

        $lines = [$intro, $referenceLine, $durationLine];

        if ($startLine !== null) {
            $lines[] = $startLine;
        }

        $lines[] = $totalLine;
        $paymentLine = null;
        $deferredLine = null;

        if ($subscription->payment_method !== null) {
            $paymentLine = (string) __('subscriptions.mail.payment', [
                'method' => $subscription->payment_method->label(),
            ]);
            $lines[] = $paymentLine;

            if ($subscription->payment_method->isDeferred()) {
                $deferredLine = (string) __('subscriptions.mail.cash_on_delivery');
                $lines[] = $deferredLine;
            }
        }

        $lines[] = $outro;

        return BrandMail::make(
            'mail.operations.subscription-confirmation',
            [
                'title' => $subject,
                'heading' => __('mail.headings.subscription'),
                'subheading' => __('mail.headings.subscription_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'plan' => $subscription->plan_name,
                'referenceLine' => $referenceLine,
                'durationLine' => $durationLine,
                'startLine' => $startLine,
                'totalLine' => $totalLine,
                'paymentLine' => $paymentLine,
                'deferredLine' => $deferredLine,
                'actionLabel' => $action,
                'actionUrl' => $url,
                'outro' => $outro,
            ],
            $subject,
            $greeting,
            $lines,
            $action,
            $url,
        );
    }
}
