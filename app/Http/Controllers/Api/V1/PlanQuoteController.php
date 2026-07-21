<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Plans\PlanQuoteRequest;
use App\Http\Resources\V1\PlanQuoteResource;
use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\PlanPricingService;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;

final class PlanQuoteController extends Controller
{
    public function __construct(private readonly PlanPricingService $pricing) {}

    public function store(PlanQuoteRequest $request, Plan $plan): JsonResponse
    {
        $quote = $this->pricing->quote(
            $plan,
            PlanQuoteRequestData::fromArray($request->validated()),
        );

        return ApiResponse::success(new PlanQuoteResource($quote), $request);
    }
}
