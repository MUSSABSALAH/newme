<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Plans\PlanQuoteRequest;
use App\Http\Resources\V1\PlanQuoteResource;
use App\Modules\Plans\DTOs\PlanQuoteRequestData;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\PlanPricingService;
use Illuminate\Http\JsonResponse;

/**
 * Live quote for the subscribe wizard, including coupon preview.
 *
 * The public API quote route is disabled; the wizard posts here instead so
 * session auth and CSRF stay on the website.
 */
final class SubscribeQuoteController extends Controller
{
    public function __construct(private readonly PlanPricingService $pricing) {}

    public function store(PlanQuoteRequest $request, Plan $plan): JsonResponse
    {
        $quote = $this->pricing->quote(
            $plan,
            PlanQuoteRequestData::fromArray($request->validated()),
        );

        return response()->json([
            'data' => (new PlanQuoteResource($quote))->resolve($request),
        ]);
    }
}
