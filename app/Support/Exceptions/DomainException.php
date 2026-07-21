<?php

declare(strict_types=1);

namespace App\Support\Exceptions;

use App\Support\Enums\ApiErrorCode;
use RuntimeException;
use Throwable;

/**
 * Base type for business/domain errors.
 *
 * Every domain error carries a stable API error code, an HTTP status, and an
 * optional structured details payload. The central API exception renderer maps
 * these directly onto the error envelope without any exception-specific logic.
 */
class DomainException extends RuntimeException
{
    /**
     * @param  array<string, mixed>  $details
     */
    public function __construct(
        private readonly ApiErrorCode $errorCode,
        private readonly int $httpStatus = 422,
        string $message = '',
        private readonly array $details = [],
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }

    public function errorCode(): ApiErrorCode
    {
        return $this->errorCode;
    }

    public function httpStatus(): int
    {
        return $this->httpStatus;
    }

    /**
     * @return array<string, mixed>
     */
    public function details(): array
    {
        return $this->details;
    }
}
