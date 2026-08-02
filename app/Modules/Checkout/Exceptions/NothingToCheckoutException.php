<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

/**
 * Raised when checkout is reached with neither a cart nor a subscription draft.
 */
final class NothingToCheckoutException extends DomainException
{
    public function __construct()
    {
        $message = __('checkout.errors.nothing_to_checkout');

        parent::__construct(
            ApiErrorCode::VALIDATION_FAILED,
            422,
            is_string($message) ? $message : 'There is nothing to check out.',
        );
    }
}
