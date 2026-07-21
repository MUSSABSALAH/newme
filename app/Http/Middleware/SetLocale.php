<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Resolves the request locale from the Accept-Language header.
 *
 * Only the supported locales are honoured; anything else falls back to English.
 * Locale affects presentation only and never influences calculations.
 */
final class SetLocale
{
    private const SUPPORTED_LOCALES = ['en', 'ar'];

    private const DEFAULT_LOCALE = 'en';

    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale($this->resolveLocale($request));

        return $next($request);
    }

    private function resolveLocale(Request $request): string
    {
        $preferred = $request->getPreferredLanguage(self::SUPPORTED_LOCALES);

        return is_string($preferred) && in_array($preferred, self::SUPPORTED_LOCALES, true)
            ? $preferred
            : self::DEFAULT_LOCALE;
    }
}
