<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\V1\UserResource;
use App\Modules\Identity\DTOs\LoginData;
use App\Modules\Identity\Services\AuthService;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login(LoginData::fromArray($request->validated()));

        return ApiResponse::success([
            'token' => $result->token,
            'user' => new UserResource($result->user),
        ], $request, 201);
    }
}
