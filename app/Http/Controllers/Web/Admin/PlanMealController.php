<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Plans\UpdatePlanMealsRequest;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\MealService;
use Illuminate\Http\RedirectResponse;

final class PlanMealController extends Controller
{
    public function __construct(private readonly MealService $meals) {}

    public function update(UpdatePlanMealsRequest $request, Plan $plan): RedirectResponse
    {
        $this->authorize('update', $plan);

        $this->meals->syncPlanMeals($plan, $request->mealIds());

        return redirect()
            ->route('admin.plans.show', ['plan' => $plan, 'tab' => 'meals'])
            ->with('success', __('plans.meals.saved'));
    }
}
