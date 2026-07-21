<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class SystemRoleException extends DomainException
{
    public function __construct()
    {
        $message = __('roles.errors.system_role');

        parent::__construct(
            ApiErrorCode::FORBIDDEN,
            403,
            is_string($message) ? $message : 'System roles cannot be deleted.',
        );
    }
}
