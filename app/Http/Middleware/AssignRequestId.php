<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Support\Http\Responses\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Assigns a correlation request id to every request.
 *
 * An incoming X-Request-Id is accepted only when it is a valid ULID; anything
 * malformed, oversized, or unsafe is replaced with a freshly generated ULID.
 * The id is stored in request attributes, added to the logging context, and
 * echoed back in the X-Request-Id response header.
 */
final class AssignRequestId
{
    public function handle(Request $request, Closure $next): Response
    {
        $incoming = $request->headers->get('X-Request-Id');
        $requestId = is_string($incoming) && Str::isUlid($incoming)
            ? $incoming
            : (string) Str::ulid();

        $request->attributes->set(ApiResponse::REQUEST_ID_ATTRIBUTE, $requestId);
        Log::withContext([ApiResponse::REQUEST_ID_ATTRIBUTE => $requestId]);

        /** @var Response $response */
        $response = $next($request);
        $response->headers->set('X-Request-Id', $requestId);

        return $response;
    }
}
