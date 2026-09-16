<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

use App\Modules\Identity\Contracts\SmsSender;
use Illuminate\Support\Facades\Log;

/**
 * Writes outbound SMS to the application log until a provider is wired in.
 */
final class LogSmsSender implements SmsSender
{
    public function send(string $phone, string $message): void
    {
        Log::info('sms.logged_not_sent', [
            'driver' => 'log',
            'phone' => $phone,
            'message' => $message,
            'hint' => 'Set SMS_DRIVER=cequens, CEQUENS_USERNAME and CEQUENS_API_KEY to deliver to a handset.',
        ]);
    }
}
