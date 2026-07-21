<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
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

        $this->meals->delete($meal);

        return redirect()
            ->route('admin.meals.index')
            ->with('success', __('meals.messages.archived'));
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
