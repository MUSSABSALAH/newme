<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class InvalidCredentialsException extends DomainException
{
    public function __construct()
    {
        $message = __('auth.failed');

        parent::__construct(
            ApiErrorCode::UNAUTHENTICATED,
            401,
            is_string($message) ? $message : 'These credentials do not match our records.',
        );
    }
}
