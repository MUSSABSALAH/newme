<?php

declare(strict_types=1);

namespace App\Support\Enums;

enum ApiErrorCode: string
{
    case VALIDATION_FAILED = 'VALIDATION_FAILED';
    case UNAUTHENTICATED = 'UNAUTHENTICATED';
    case FORBIDDEN = 'FORBIDDEN';
    case NOT_FOUND = 'NOT_FOUND';
    case CONFLICT = 'CONFLICT';
    case CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';
    case SERVER_ERROR = 'SERVER_ERROR';
}
