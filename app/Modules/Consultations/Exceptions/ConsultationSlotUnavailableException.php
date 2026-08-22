<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Exceptions;

use RuntimeException;

final class ConsultationSlotUnavailableException extends RuntimeException
{
    public static function invalid(): self
    {
        return new self((string) __('consultations.errors.invalid_slot'));
    }

    public static function taken(): self
    {
        return new self((string) __('consultations.errors.slot_taken'));
    }

    public static function nonWorkingDay(): self
    {
        return new self((string) __('consultations.errors.non_working_day'));
    }
}
