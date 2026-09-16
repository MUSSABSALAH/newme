<?php

declare(strict_types=1);

namespace App\Modules\Identity\Jobs;

use App\Modules\Identity\Contracts\SmsSender;
use App\Modules\Identity\Support\InternationalPhone;
use App\Modules\Identity\Support\SaudiMobileNumber;
use App\Modules\Notifications\Enums\MessageQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Sends an SMS on a named queue. OTP uses the highest-priority queue so a
 * login code is not waiting behind receipts.
 */
final class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    /**
     * A provider that accepts the connection then stalls would otherwise hold a
     * worker slot indefinitely, and an OTP is worthless once it is late.
     */
    public int $timeout = 15;

    public bool $failOnTimeout = true;

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
        $number = InternationalPhone::e164($this->phone) ?? SaudiMobileNumber::e164($this->phone);

        if ($number === null) {
            // Retrying will not make the number valid, so this stops here and
            // says why instead of burning three attempts on it.
            Log::stack(['single', 'stderr'])->error('sms.unsendable_number', ['phone' => $this->phone]);

            return;
        }

        $sms->send($number, $this->message);
    }

    /**
     * Reached only after every attempt failed. An OTP that never arrives looks
     * to the customer like a broken login, so it is logged as an error rather
     * than left sitting in failed_jobs unnoticed.
     */
    public function failed(?Throwable $e): void
    {
        Log::stack(['single', 'stderr'])->error('sms.delivery_failed', [
            'phone' => $this->phone,
            'queue' => $this->queue,
            'error' => $e?->getMessage(),
        ]);
    }
}
