<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Resolves the locale for web requests.
 *
 * Priority: an explicit user choice persisted in a long-lived cookie (so it
 * survives logout/session invalidation), then the session, then the browser's
 * Accept-Language header, then the default. Locale affects presentation only.
 */
final class SetWebLocale
{
    public const SUPPORTED_LOCALES = ['en', 'ar'];

    public const COOKIE = 'locale';

    private const DEFAULT_LOCALE = 'en';

    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale($this->resolveLocale($request));

        return $next($request);
    }

    private function resolveLocale(Request $request): string
    {
        $cookie = $request->cookie(self::COOKIE);

        if (is_string($cookie) && in_array($cookie, self::SUPPORTED_LOCALES, true)) {
            return $cookie;
        }

        $session = $request->session()->get('locale');

        if (is_string($session) && in_array($session, self::SUPPORTED_LOCALES, true)) {
            return $session;
        }

        $preferred = $request->getPreferredLanguage(self::SUPPORTED_LOCALES);

        return is_string($preferred) && in_array($preferred, self::SUPPORTED_LOCALES, true)
            ? $preferred
            : self::DEFAULT_LOCALE;
    }
}
