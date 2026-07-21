<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanService;
use App\Support\Exceptions\DomainException;
use Illuminate\Http\RedirectResponse;

final class PlanVersionController extends Controller
{
    public function __construct(private readonly PlanService $plans) {}

    public function store(Plan $plan): RedirectResponse
    {
        $this->authorize('update', $plan);

        $this->plans->createDraftVersion($plan);

        return redirect()
            ->route('admin.plans.show', $plan)
            ->with('success', __('plans.messages.version_created'));
    }

    public function publish(PlanVersion $version): RedirectResponse
    {
        $this->authorize('update', $version->plan);

        try {
            $this->plans->publish($version);
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.plans.show', $version->plan)
            ->with('success', __('plans.messages.published'));
    }
}
