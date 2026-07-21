<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class LastSuperAdminException extends DomainException
{
    public function __construct()
    {
        $message = __('users.errors.last_super_admin');

        parent::__construct(
            ApiErrorCode::CONFLICT,
            409,
            is_string($message) ? $message : 'The last active Super Admin cannot be removed or deactivated.',
        );
    }
}
