<?php

declare(strict_types=1);

namespace Tests\Unit\Notifications;

use App\Modules\Consultations\Models\Consultation;
use App\Modules\Consultations\Notifications\ConsultationConfirmationNotification;
use App\Modules\Identity\Jobs\SendSmsJob;
use App\Modules\Identity\Notifications\EmailOtpNotification;
use App\Modules\Identity\Notifications\PasswordResetNotification;
use App\Modules\Identity\Notifications\UserInvitationNotification;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Notifications\InvoiceIssuedNotification;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Notifications\OrderConfirmationNotification;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Notifications\SubscriptionConfirmationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tests\TestCase;

final class MessageQueueTest extends TestCase
{
    public function test_the_worker_drains_otp_before_mail(): void
    {
        $this->assertSame('otp,mail,default', MessageQueue::worker());
        $this->assertSame('otp,mail,default', config('queue.messaging'));
    }

    public function test_queued_mail_remembers_the_request_locale(): void
    {
        $this->app->setLocale('ar');

        $this->assertSame('ar', (new EmailOtpNotification('482917'))->locale);
        $this->assertSame('ar', (new PasswordResetNotification('https://example.test/reset', 60))->locale);
    }

    public function test_otp_email_and_sms_use_the_highest_priority_queue(): void
    {
        $email = new EmailOtpNotification('482917');
        $sms = new SendSmsJob('0551234567', 'Your code is 482917');

        $this->assertInstanceOf(ShouldQueue::class, $email);
        $this->assertInstanceOf(ShouldQueue::class, $sms);
        $this->assertSame(MessageQueue::Otp->value, $email->queue);
        $this->assertSame(MessageQueue::Otp->value, $sms->queue);
    }

    public function test_transactional_mail_uses_the_mail_queue(): void
    {
        $order = new OrderConfirmationNotification(new Order);
        $subscription = new SubscriptionConfirmationNotification(new Subscription);
        $invoice = new InvoiceIssuedNotification(new Invoice);
        $consultation = new ConsultationConfirmationNotification(new Consultation);
        $password = new PasswordResetNotification('https://example.test/reset', 60);
        $invitation = new UserInvitationNotification('https://example.test/invite', 'نيومي');

        foreach ([$order, $subscription, $invoice, $consultation, $password, $invitation] as $notification) {
            $this->assertInstanceOf(ShouldQueue::class, $notification);
            $this->assertSame(MessageQueue::Mail->value, $notification->queue);
        }
    }
}
