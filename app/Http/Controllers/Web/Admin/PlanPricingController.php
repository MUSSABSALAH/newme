<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Plans\UpdatePricingMatrixRequest;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanService;
use App\Support\Exceptions\DomainException;
use Illuminate\Http\RedirectResponse;

final class PlanPricingController extends Controller
{
    public function __construct(private readonly PlanService $plans) {}

    public function update(UpdatePricingMatrixRequest $request, PlanVersion $version): RedirectResponse
    {
        $this->authorize('update', $version->plan);

        try {
            $this->plans->updatePricing($version, $request->pricingRules());
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.plans.show', $version->plan)
            ->with('success', __('plans.messages.pricing_saved'));
    }
}
