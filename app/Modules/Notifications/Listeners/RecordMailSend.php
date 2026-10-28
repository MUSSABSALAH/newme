<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Listeners;

use App\Modules\Notifications\Services\MailQuota;
use Illuminate\Mail\Events\MessageSent;

/**
 * Every successfully handed-off email counts against the daily cap.
 */
final class RecordMailSend
{
    public function __construct(private readonly MailQuota $quota) {}

    public function handle(MessageSent $event): void
    {
        $this->quota->record();
    }
}
