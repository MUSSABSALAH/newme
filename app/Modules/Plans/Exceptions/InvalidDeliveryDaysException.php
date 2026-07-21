<?php

declare(strict_types=1);

namespace App\Modules\Plans\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class InvalidDeliveryDaysException extends DomainException
{
    public function __construct(int $minRequired)
    {
        $message = __('plans.errors.invalid_days', ['min' => $minRequired]);

        parent::__construct(
            ApiErrorCode::VALIDATION_FAILED,
            422,
            is_string($message) ? $message : 'Please choose at least the required number of delivery days.',
            ['selected_days' => ['min' => $minRequired]],
        );
    }
}
