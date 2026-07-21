<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Plans\StorePlanRequest;
use App\Http\Requests\Web\Admin\Plans\UpdatePlanRequest;
use App\Modules\Plans\DTOs\PlanData;
use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Enums\PlanGoal;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Services\MealService;
use App\Modules\Plans\Services\PlanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

final class PlanController extends Controller
{
    public function __construct(
        private readonly PlanService $plans,
        private readonly MealService $meals,
    ) {}

    public function index(): View
    {
        $this->authorize('viewAny', Plan::class);

        $plans = Plan::query()
            ->with('versions')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Plan::class);

        return view('admin.plans.create', [
            'plan' => null,
            'goals' => PlanGoal::cases(),
            'units' => DurationUnit::cases(),
            'mealTypes' => MealType::cases(),
            'mealsByType' => $this->mealsByType(),
            'rules' => collect(),
            'selectedMealIds' => [],
            'draft' => null,
            'publishedVersion' => null,
        ]);
    }

    public function store(StorePlanRequest $request): RedirectResponse
    {
        $this->authorize('create', Plan::class);

        $plan = $this->plans->create(PlanData::fromArray($this->withImage($request)));
        $this->plans->savePlanPricing($plan, $request->pricingRules());
        $this->meals->syncPlanMeals($plan, $request->mealIds());

        return redirect()
            ->route('admin.plans.edit', $plan)
            ->with('success', __('plans.messages.created'));
    }

    public function show(Plan $plan): View
    {
        $this->authorize('view', $plan);

        $published = $plan->publishedVersion();
        $draft = $plan->draftVersion();
        $effective = $published ?? $draft;

        return view('admin.plans.show', [
            'plan' => $plan,
            'versions' => $plan->versions()->latest('version_number')->get(),
            'publishedVersion' => $published,
            'draft' => $draft,
            'rules' => $effective?->pricingRules()->orderBy('sort_order')->get() ?? collect(),
            'mealsByType' => $plan->meals()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->groupBy(fn (Meal $meal): string => $meal->meal_type->value),
            'mealTypes' => MealType::cases(),
        ]);
    }

    public function edit(Plan $plan): View
    {
        $this->authorize('update', $plan);

        $draft = $plan->draftVersion();
        $effective = $draft ?? $plan->publishedVersion();

        return view('admin.plans.edit', [
            'plan' => $plan,
            'goals' => PlanGoal::cases(),
            'units' => DurationUnit::cases(),
            'mealTypes' => MealType::cases(),
            'mealsByType' => $this->mealsByType(),
            'rules' => $effective?->pricingRules()->orderBy('sort_order')->get() ?? collect(),
            'selectedMealIds' => $plan->meals()->pluck('meals.id')->all(),
            'draft' => $draft,
            'publishedVersion' => $plan->publishedVersion(),
        ]);
    }

    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $this->authorize('update', $plan);

        $this->plans->update($plan, PlanData::fromArray($this->withImage($request)));
        $this->plans->savePlanPricing($plan, $request->pricingRules());
        $this->meals->syncPlanMeals($plan, $request->mealIds());

        return redirect()
            ->route('admin.plans.edit', $plan)
            ->with('success', __('plans.messages.updated'));
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $this->authorize('delete', $plan);

        $this->plans->delete($plan);

        return redirect()
            ->route('admin.plans.index')
            ->with('success', __('plans.messages.archived'));
    }

    /**
     * The active meals catalog grouped by meal type, for the plan meal picker.
     *
     * @return Collection<int|string, \Illuminate\Database\Eloquent\Collection<int, Meal>>
     */
    private function mealsByType(): Collection
    {
        return Meal::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy(fn (Meal $meal): string => $meal->meal_type->value);
    }

    /**
     * Merge an uploaded image path into the validated payload.
     *
     * @return array<string, mixed>
     */
    private function withImage(StorePlanRequest|UpdatePlanRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('subscription', 'public');
        }

        return $data;
    }
}
