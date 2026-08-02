<x-layouts.admin :title="__('categories.edit_title')" :heading="__('categories.edit_title')" :subtitle="__('categories.subtitle')">
    @include('admin.categories._form', [
        'action' => route('admin.categories.update', $category),
        'method' => 'PUT',
        'category' => $category,
        'parents' => $parents,
    ])
</x-layouts.admin>
