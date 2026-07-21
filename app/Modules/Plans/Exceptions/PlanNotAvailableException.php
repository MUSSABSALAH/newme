<?php

declare(strict_types=1);

namespace App\Modules\Plans\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class PlanNotAvailableException extends DomainException
{
    public function __construct()
    {
        $message = __('plans.errors.not_available');

        parent::__construct(
            ApiErrorCode::NOT_FOUND,
            404,
            is_string($message) ? $message : 'This plan is not available.',
        );
    }
}
