<?php

declare(strict_types=1);

namespace App\Support\Http\Responses;

use App\Support\Enums\ApiErrorCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Central builder for the standard API success and error envelopes.
 *
 * Every response carries the request id from the request attributes, keeping the
 * envelope shape defined in exactly one place.
 */
final class ApiResponse
{
    public const REQUEST_ID_ATTRIBUTE = 'request_id';

    public static function success(mixed $data, Request $request, int $status = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'meta' => [
                'request_id' => self::requestId($request),
            ],
        ], $status);
    }

    /**
     * @param  array<string, mixed>  $details
     */
    public static function error(
        ApiErrorCode $code,
        string $message,
        Request $request,
        int $status,
        array $details = [],
    ): JsonResponse {
        return response()->json([
            'error' => [
                'code' => $code->value,
                'message' => $message,
                'details' => (object) $details,
                'request_id' => self::requestId($request),
            ],
        ], $status);
    }

    private static function requestId(Request $request): string
    {
        $requestId = $request->attributes->get(self::REQUEST_ID_ATTRIBUTE);

        return is_string($requestId) ? $requestId : '';
    }
}
