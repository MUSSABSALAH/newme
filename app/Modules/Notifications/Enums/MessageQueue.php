<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Enums;

/**
 * Named queues for outbound email and SMS.
 *
 * Priority is the worker listen order, not a number. Always start workers
 * with {@see self::worker()}: OTP is drained before invoice PDFs and
 * receipts, so a login code is not stuck behind a checkout burst.
 */
enum MessageQueue: string
{
    case Otp = 'otp';
    case Mail = 'mail';
    case Default = 'default';

    /**
     * Highest-priority first. Pass this to `queue:work --queue=…`.
     */
    public static function worker(): string
    {
        return implode(',', [
            self::Otp->value,
            self::Mail->value,
            self::Default->value,
        ]);
    }
}
