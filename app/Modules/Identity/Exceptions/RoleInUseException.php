<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class RoleInUseException extends DomainException
{
    public function __construct()
    {
        $message = __('roles.errors.in_use');

        parent::__construct(
            ApiErrorCode::CONFLICT,
            409,
            is_string($message) ? $message : 'This role is assigned to users and cannot be deleted.',
        );
    }
}
