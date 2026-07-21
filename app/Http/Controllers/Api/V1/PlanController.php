<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PlanResource;
use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Exceptions\PlanNotAvailableException;
use App\Modules\Plans\Models\Plan;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PlanController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $plans = Plan::query()
            ->where('is_active', true)
            ->whereHas('versions', fn ($query) => $query->where('status', PlanVersionStatus::Published->value))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return ApiResponse::success(PlanResource::collection($plans), $request);
    }

    public function show(Request $request, Plan $plan): JsonResponse
    {
        if (! $plan->is_active || $plan->publishedVersion() === null) {
            throw new PlanNotAvailableException;
        }

        return ApiResponse::success(new PlanResource($plan), $request);
    }
}
