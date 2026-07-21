<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class PasswordResetInvalidException extends DomainException
{
    public function __construct()
    {
        $message = __('auth.passwords.invalid');

        parent::__construct(
            ApiErrorCode::NOT_FOUND,
            404,
            is_string($message) ? $message : 'This password reset link is invalid or has expired.',
        );
    }
}
