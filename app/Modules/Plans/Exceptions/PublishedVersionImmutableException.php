<?php

declare(strict_types=1);

namespace App\Modules\Plans\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class PublishedVersionImmutableException extends DomainException
{
    public function __construct()
    {
        $message = __('plans.errors.published_immutable');

        parent::__construct(
            ApiErrorCode::CONFLICT,
            409,
            is_string($message) ? $message : 'Published pricing cannot be changed. Create a new version instead.',
        );
    }
}
