<?php

declare(strict_types=1);

namespace App\Modules\Plans\Exceptions;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class PricingRuleNotFoundException extends DomainException
{
    public function __construct()
    {
        $message = __('plans.errors.rule_not_found');

        parent::__construct(
            ApiErrorCode::NOT_FOUND,
            404,
            is_string($message) ? $message : 'No pricing is available for the selected options.',
        );
    }
}
