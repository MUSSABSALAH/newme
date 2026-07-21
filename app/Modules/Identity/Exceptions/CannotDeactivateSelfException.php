<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class CannotDeactivateSelfException extends DomainException
{
    public function __construct()
    {
        $message = __('users.errors.self_deactivate');

        parent::__construct(
            ApiErrorCode::CONFLICT,
            409,
            is_string($message) ? $message : 'You cannot deactivate your own account.',
        );
    }
}
