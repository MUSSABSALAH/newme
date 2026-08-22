<x-layouts.admin :title="__('recipes.create_title')" :heading="__('recipes.create_title')" :subtitle="__('recipes.subtitle')">
    @include('admin.recipes._form', [
        'action' => route('admin.recipes.store'),
        'method' => 'POST',
        'recipe' => null,
    ])
</x-layouts.admin>
