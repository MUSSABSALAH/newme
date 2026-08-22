<?php

declare(strict_types=1);

namespace App\Modules\Identity\Jobs;

use App\Modules\Identity\Contracts\SmsSender;
use App\Modules\Notifications\Enums\MessageQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Sends an SMS on a named queue. OTP uses the highest-priority queue so a
 * login code is not waiting behind receipts.
 */
final class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(
        public readonly string $phone,
        public readonly string $message,
        MessageQueue $queue = MessageQueue::Otp,
    ) {
        $this->onQueue($queue->value);
    }

    /**
     * @return list<int>
     */
    public function backoff(): array
    {
        return [5, 15];
    }

    public function handle(SmsSender $sms): void
    {
        $sms->send($this->phone, $this->message);
    }
}
