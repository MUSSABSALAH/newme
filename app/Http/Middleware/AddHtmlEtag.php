<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tags HTML responses with an ETag so a browser that already holds the page
 * gets an empty 304 instead of the whole document.
 *
 * The page is still built in full to hash it, so this saves bandwidth and
 * client render time, not server work. Freshness is unaffected: the ETag is the
 * content itself, so any change to the markup produces a new one.
 */
final class AddHtmlEtag
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! $this->canRevalidate($request, $response)) {
            return $response;
        }

        $response->setEtag(md5((string) $response->getContent()));

        // Turns the response into a bodyless 304 when the browser's copy
        // already matches, and leaves it untouched otherwise.
        $response->isNotModified($request);

        return $response;
    }

    private function canRevalidate(Request $request, Response $response): bool
    {
        // 304 is only defined for GET and HEAD; nothing that writes is touched.
        if (! $request->isMethodCacheable()) {
            return false;
        }

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            return false;
        }

        if ($response->headers->has('ETag')) {
            return false;
        }

        if (! str_contains((string) $response->headers->get('Content-Type', ''), 'text/html')) {
            return false;
        }

        // Streamed and file responses have no content to hash.
        return is_string($response->getContent());
    }
}
