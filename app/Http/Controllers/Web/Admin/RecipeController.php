<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Recipes\StoreRecipeRequest;
use App\Http\Requests\Web\Admin\Recipes\UpdateRecipeRequest;
use App\Modules\Cms\DTOs\RecipeData;
use App\Modules\Cms\Models\Recipe;
use App\Modules\Cms\Services\RecipeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class RecipeController extends Controller
{
    public function __construct(private readonly RecipeService $recipes) {}

    public function index(): View
    {
        $this->authorize('viewAny', Recipe::class);

        $recipes = Recipe::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Recipe::class);

        return view('admin.recipes.create', [
            'recipe' => null,
        ]);
    }

    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $this->authorize('create', Recipe::class);

        $this->recipes->create(RecipeData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', __('recipes.messages.created'));
    }

    public function edit(Recipe $recipe): View
    {
        $this->authorize('update', $recipe);

        return view('admin.recipes.edit', [
            'recipe' => $recipe,
        ]);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $this->authorize('update', $recipe);

        $this->recipes->update($recipe, RecipeData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', __('recipes.messages.updated'));
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $this->authorize('delete', $recipe);

        $this->recipes->delete($recipe);

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', __('recipes.messages.archived'));
    }

    /**
     * @return array<string, mixed>
     */
    private function withImage(StoreRecipeRequest|UpdateRecipeRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('cms/recipes', 'public');
        }

        return $data;
    }
}
