<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Products\StoreProductRequest;
use App\Http\Requests\Web\Admin\Products\UpdateProductRequest;
use App\Modules\Store\DTOs\ProductData;
use App\Modules\Store\Enums\NutritionNote;
use App\Modules\Store\Enums\ProductFlag;
use App\Modules\Store\Enums\ServingSize;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Modules\Store\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ProductController extends Controller
{
    public function __construct(private readonly ProductService $products) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Product::class);

        $categoryId = $request->integer('category') ?: null;

        $products = Product::query()
            ->with('category')
            ->when($categoryId !== null, fn ($query) => $query->where('category_id', $categoryId))
            ->orderBy('category_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.products.index', [
            'products' => $products,
            'categories' => $this->categoryOptions(),
            'activeCategory' => $categoryId,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Product::class);

        return view('admin.products.create', $this->formData(null));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->authorize('create', Product::class);

        $this->products->create(ProductData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('products.messages.created'));
    }

    public function edit(Product $product): View
    {
        $this->authorize('update', $product);

        return view('admin.products.edit', $this->formData($product));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->authorize('update', $product);

        $this->products->update($product, ProductData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('products.messages.updated'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);

        $this->products->delete($product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('products.messages.archived'));
    }

    /**
     * @return array<string, mixed>
     */
    private function formData(?Product $product): array
    {
        return [
            'product' => $product,
            'categories' => $this->categoryOptions(),
            'servings' => ServingSize::cases(),
            'notes' => NutritionNote::cases(),
            'flags' => ProductFlag::cases(),
        ];
    }

    /**
     * Leaf categories a product can belong to (all categories; label shows parent).
     *
     * @return \Illuminate\Support\Collection<int, Category>
     */
    private function categoryOptions()
    {
        return Category::query()
            ->with('parent')
            ->orderByRaw('COALESCE(parent_id, id)')
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return array<string, mixed>
     */
    private function withImage(StoreProductRequest|UpdateProductRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('store/products', 'public');
        }

        return $data;
    }
}
