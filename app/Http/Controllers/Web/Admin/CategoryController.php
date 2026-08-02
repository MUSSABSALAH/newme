<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Web\Admin\Categories\UpdateCategoryRequest;
use App\Modules\Store\DTOs\CategoryData;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categories) {}

    public function index(): View
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::query()
            ->with('parent')
            ->withCount('products')
            ->orderByRaw('COALESCE(parent_id, id)')
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(30);

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Category::class);

        return view('admin.categories.create', [
            'category' => null,
            'parents' => $this->parentOptions(),
        ]);
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $this->authorize('create', Category::class);

        $this->categories->create(CategoryData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('categories.messages.created'));
    }

    public function edit(Category $category): View
    {
        $this->authorize('update', $category);

        return view('admin.categories.edit', [
            'category' => $category,
            'parents' => $this->parentOptions($category),
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $this->authorize('update', $category);

        $this->categories->update($category, CategoryData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('categories.messages.updated'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('delete', $category);

        $this->categories->delete($category);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('categories.messages.archived'));
    }

    /**
     * Top-level categories usable as a parent, excluding the given category.
     *
     * @return \Illuminate\Support\Collection<int, Category>
     */
    private function parentOptions(?Category $exclude = null)
    {
        return Category::query()
            ->whereNull('parent_id')
            ->when($exclude !== null, fn ($query) => $query->whereKeyNot($exclude->getKey()))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return array<string, mixed>
     */
    private function withImage(StoreCategoryRequest|UpdateCategoryRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('store/categories', 'public');
        }

        return $data;
    }
}
