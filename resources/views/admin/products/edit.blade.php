<x-layouts.admin :title="__('products.edit_title')" :heading="__('products.edit_title')" :subtitle="__('products.subtitle')">
    @include('admin.products._form', [
        'action' => route('admin.products.update', $product),
        'method' => 'PUT',
        'product' => $product,
        'categories' => $categories,
        'servings' => $servings,
        'notes' => $notes,
        'flags' => $flags,
    ])
</x-layouts.admin>
