<?php

declare(strict_types=1);

namespace App\Modules\Identity\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class InvitationAlreadyAcceptedException extends DomainException
{
    public function __construct()
    {
        $message = __('invitations.errors.already_accepted');

        parent::__construct(
            ApiErrorCode::CONFLICT,
            409,
            is_string($message) ? $message : 'This invitation has already been accepted.',
        );
    }
}
