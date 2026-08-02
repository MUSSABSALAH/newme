<?php

declare(strict_types=1);

namespace App\Modules\Payments\Exceptions;

use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Models\Payment;
use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;

final class PaymentDeclinedException extends DomainException
{
    public function __construct(
        public readonly PaymentDecline $reason,
        public readonly ?Payment $payment = null,
    ) {
        parent::__construct(
            ApiErrorCode::VALIDATION_FAILED,
            422,
            $reason->message(),
            ['reason' => $reason->value],
        );
    }
}
