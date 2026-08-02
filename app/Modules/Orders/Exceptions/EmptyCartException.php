<?php

declare(strict_types=1);

namespace App\Modules\Orders\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class EmptyCartException extends DomainException
{
    public function __construct()
    {
        $message = __('orders.errors.empty_cart');

        parent::__construct(
            ApiErrorCode::VALIDATION_FAILED,
            422,
            is_string($message) ? $message : 'Your cart is empty.',
        );
    }
}
