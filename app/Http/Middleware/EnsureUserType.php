<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Modules\Identity\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensures the authenticated user is of the expected type (staff or customer).
 *
 * Staff and customers share the `users` table but each channel is exclusive:
 * a signed-in customer cannot reach the admin panel and vice versa. Users of
 * the wrong type are bounced to their own home rather than shown a 403.
 */
final class EnsureUserType
{
    public function handle(Request $request, Closure $next, string $type): Response
    {
        $user = $request->user();

        // Unauthenticated requests are handled by the `auth` middleware.
        if ($user === null) {
            return $next($request);
        }

        if ($user->type->value !== $type) {
            $home = $user->type === UserType::Customer
                ? route('website.account')
                : route('admin.dashboard');

            return redirect($home);
        }

        return $next($request);
    }
}
