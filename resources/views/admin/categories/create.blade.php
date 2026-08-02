<x-layouts.admin :title="__('categories.create_title')" :heading="__('categories.create_title')" :subtitle="__('categories.subtitle')">
    @include('admin.categories._form', [
        'action' => route('admin.categories.store'),
        'method' => 'POST',
        'category' => null,
        'parents' => $parents,
    ])
</x-layouts.admin>
