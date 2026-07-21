<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Support\Enums\ApiErrorCode;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Liveness/readiness endpoint reporting application and database availability.
 *
 * The response never exposes credentials, hostnames, paths, environment values,
 * or driver details; only coarse "ok"/"unavailable" states are returned.
 */
final class HealthController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if (! $this->databaseIsReachable()) {
            return ApiResponse::error(
                ApiErrorCode::SERVER_ERROR,
                __('messages.health.unavailable'),
                $request,
                503,
                ['database' => 'unavailable'],
            );
        }

        return ApiResponse::success([
            'status' => 'ok',
            'database' => 'ok',
            'message' => __('messages.health.ok'),
        ], $request);
    }

    private function databaseIsReachable(): bool
    {
        try {
            DB::connection()->getPdo();
            DB::connection()->select('select 1');

            return true;
        } catch (Throwable) {
            return false;
        }
    }
}
