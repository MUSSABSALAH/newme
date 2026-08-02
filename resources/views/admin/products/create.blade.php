<x-layouts.admin :title="__('products.create_title')" :heading="__('products.create_title')" :subtitle="__('products.subtitle')">
    @include('admin.products._form', [
        'action' => route('admin.products.store'),
        'method' => 'POST',
        'product' => null,
        'categories' => $categories,
        'servings' => $servings,
        'notes' => $notes,
        'flags' => $flags,
    ])
</x-layouts.admin>
