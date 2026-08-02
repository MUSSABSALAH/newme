<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Exceptions;

use App\Modules\Promotions\Enums\CouponRejection;
use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use App\Support\Money\Money;

final class CouponRejectedException extends DomainException
{
    public function __construct(
        public readonly CouponRejection $reason,
        ?Money $minimum = null,
    ) {
        parent::__construct(
            ApiErrorCode::VALIDATION_FAILED,
            422,
            $reason->message($minimum),
            ['reason' => $reason->value],
        );
    }
}
