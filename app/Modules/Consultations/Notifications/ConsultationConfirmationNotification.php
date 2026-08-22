<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Notifications;

use App\Modules\Consultations\Models\Consultation;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Notifications\Support\BrandMail;
use App\Modules\Notifications\Support\CapturesRequestLocale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

/**
 * Confirms the customer's nutrition consultation slot.
 *
 * The booking page already tells them a confirmation was emailed. Queued so
 * a slow mail server never holds up the booking response.
 */
final class ConsultationConfirmationNotification extends Notification implements ShouldQueue
{
    use CapturesRequestLocale, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(public Consultation $consultation)
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
        $consultation = $this->consultation;
        $when = $consultation->whenLabel();
        $subject = (string) __('consultations.mail.subject', ['when' => $when]);
        $greeting = (string) __('consultations.mail.greeting', [
            'name' => $consultation->customer_name,
        ]);
        $intro = (string) __('consultations.mail.intro');
        $whenLine = (string) __('consultations.mail.when', ['when' => $when]);
        $referenceLine = (string) __('consultations.mail.reference', [
            'reference' => $consultation->reference(),
        ]);
        $goalLine = $consultation->goal === null
            ? null
            : (string) __('consultations.mail.goal', ['goal' => $consultation->goal]);
        $callAhead = (string) __('consultations.mail.call_ahead');
        $action = (string) __('consultations.mail.action');
        $url = route('website.account', ['tab' => 'consultations']);
        $outro = (string) __('consultations.mail.outro');

        $lines = [$intro, $whenLine, $referenceLine];

        if ($goalLine !== null) {
            $lines[] = $goalLine;
        }

        $lines[] = $callAhead;
        $lines[] = $outro;

        return BrandMail::make(
            'mail.operations.consultation-booked',
            [
                'title' => $subject,
                'heading' => __('mail.headings.consultation'),
                'subheading' => __('mail.headings.consultation_sub'),
                'greeting' => $greeting,
                'intro' => $intro,
                'whenLine' => $whenLine,
                'referenceLine' => $referenceLine,
                'goalLine' => $goalLine,
                'callAhead' => $callAhead,
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
