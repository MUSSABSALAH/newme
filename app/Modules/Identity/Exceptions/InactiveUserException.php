<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class InactiveUserException extends DomainException
{
    public function __construct()
    {
        $message = __('auth.inactive');

        parent::__construct(
            ApiErrorCode::FORBIDDEN,
            403,
            is_string($message) ? $message : 'This account is not active.',
        );
    }
}
