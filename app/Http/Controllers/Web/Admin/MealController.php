<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Meals\BulkDestroyMealsRequest;
use App\Http\Requests\Web\Admin\Meals\StoreMealRequest;
use App\Http\Requests\Web\Admin\Meals\UpdateMealRequest;
use App\Modules\Plans\DTOs\MealData;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Services\MealService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class MealController extends Controller
{
    public function __construct(private readonly MealService $meals) {}

    public function index(): View
    {
        $this->authorize('viewAny', Meal::class);

        $meals = Meal::query()
            ->orderBy('meal_type')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.meals.index', [
            'meals' => $meals,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Meal::class);

        return view('admin.meals.create', [
            'meal' => null,
            'types' => MealType::cases(),
        ]);
    }

    public function store(StoreMealRequest $request): RedirectResponse
    {
        $this->authorize('create', Meal::class);

        $this->meals->create(MealData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.meals.index')
            ->with('success', __('meals.messages.created'));
    }

    public function edit(Meal $meal): View
    {
        $this->authorize('update', $meal);

        return view('admin.meals.edit', [
            'meal' => $meal,
            'types' => MealType::cases(),
        ]);
    }

    public function update(UpdateMealRequest $request, Meal $meal): RedirectResponse
    {
        $this->authorize('update', $meal);

        $this->meals->update($meal, MealData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.meals.index')
            ->with('success', __('meals.messages.updated'));
    }

    public function destroy(Meal $meal): RedirectResponse
    {
        $this->authorize('delete', $meal);

        if ($this->meals->isLinkedToActiveSubscription($meal)) {
            return redirect()
                ->route('admin.meals.index')
                ->with('error', __('meals.messages.in_use', ['meal' => $meal->label()]));
        }

        $this->meals->delete($meal);

        return redirect()
            ->route('admin.meals.index')
            ->with('success', __('meals.messages.archived'));
    }

    public function bulkDestroy(BulkDestroyMealsRequest $request): RedirectResponse
    {
        $this->authorize('deleteAny', Meal::class);

        $meals = Meal::query()
            ->whereIn('id', $request->mealIds())
            ->orderBy('id')
            ->get();

        foreach ($meals as $meal) {
            $this->authorize('delete', $meal);
        }

        $result = $this->meals->deleteMany($meals);

        $redirect = redirect()->route('admin.meals.index');

        if ($result['deleted']->isNotEmpty()) {
            $redirect->with('success', __('meals.messages.bulk_archived', [
                'count' => $result['deleted']->count(),
            ]));
        }

        if ($result['blocked']->isNotEmpty()) {
            $names = $result['blocked']
                ->map(static fn (Meal $meal): string => $meal->label())
                ->filter()
                ->values()
                ->all();

            $redirect->with('warning', __('meals.messages.bulk_blocked', [
                'meals' => implode(', ', $names),
            ]));
        }

        if ($result['deleted']->isEmpty() && $result['blocked']->isEmpty()) {
            $redirect->with('error', __('meals.messages.bulk_none'));
        }

        return $redirect;
    }

    /**
     * @return array<string, mixed>
     */
    private function withImage(StoreMealRequest|UpdateMealRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('meals', 'public');
        }

        return $data;
    }
}
