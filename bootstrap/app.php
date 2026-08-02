<?php

declare(strict_types=1);

use App\Http\Middleware\AssignRequestId;
use App\Http\Middleware\EnsureUserType;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\SetWebLocale;
use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            AssignRequestId::class,
            SetLocale::class,
        ]);

        $middleware->web(append: [
            SetWebLocale::class,
        ]);

        $middleware->alias([
            'user.type' => EnsureUserType::class,
        ]);

        // Locale is not sensitive; leaving it unencrypted lets it persist
        // across logout and remain readable by the client.
        $middleware->encryptCookies(except: [SetWebLocale::COOKIE]);

        // Guests are sent to the login screen for the area they requested:
        // the admin panel or the public store account.
        $middleware->redirectGuestsTo(function (Request $request): string {
            if ($request->routeIs('admin.*') || $request->is('admin', 'admin/*')) {
                return route('admin.login');
            }

            return route('website.login');
        });

        // Authenticated users hitting a guest-only page go to their own home.
        $middleware->redirectUsersTo(function (Request $request): string {
            $user = $request->user();

            return $user !== null && $user->isCustomer()
                ? route('website.account')
                : route('admin.dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request): ?JsonResponse {
            if (! $request->is('api/*') && ! $request->expectsJson()) {
                return null;
            }

            $message = static function (string $key): string {
                $translated = __($key);

                return is_string($translated) ? $translated : $key;
            };

            return match (true) {
                $e instanceof ValidationException => ApiResponse::error(
                    ApiErrorCode::VALIDATION_FAILED,
                    $message('errors.VALIDATION_FAILED'),
                    $request,
                    422,
                    $e->errors(),
                ),
                $e instanceof AuthenticationException => ApiResponse::error(
                    ApiErrorCode::UNAUTHENTICATED,
                    $message('errors.UNAUTHENTICATED'),
                    $request,
                    401,
                ),
                $e instanceof AuthorizationException => ApiResponse::error(
                    ApiErrorCode::FORBIDDEN,
                    $message('errors.FORBIDDEN'),
                    $request,
                    403,
                ),
                $e instanceof ModelNotFoundException,
                $e instanceof NotFoundHttpException => ApiResponse::error(
                    ApiErrorCode::NOT_FOUND,
                    $message('errors.NOT_FOUND'),
                    $request,
                    404,
                ),
                $e instanceof DomainException => ApiResponse::error(
                    $e->errorCode(),
                    $e->getMessage(),
                    $request,
                    $e->httpStatus(),
                    $e->details(),
                ),
                default => ApiResponse::error(
                    ApiErrorCode::SERVER_ERROR,
                    $message('errors.SERVER_ERROR'),
                    $request,
                    500,
                ),
            };
        });
    })->create();
