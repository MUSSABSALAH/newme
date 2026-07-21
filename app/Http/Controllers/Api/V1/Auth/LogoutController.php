<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Identity\Services\AuthService;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class LogoutController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        abort_unless($user instanceof User, 401);

        $this->authService->logout($user);

        $message = __('auth.logged_out');

        return ApiResponse::success(
            ['message' => is_string($message) ? $message : 'Logged out successfully.'],
            $request,
        );
    }
}
