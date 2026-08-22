<x-layouts.admin :title="__('recipes.edit_title')" :heading="__('recipes.edit_title')" :subtitle="__('recipes.subtitle')">
    @include('admin.recipes._form', [
        'action' => route('admin.recipes.update', $recipe),
        'method' => 'PUT',
        'recipe' => $recipe,
    ])
</x-layouts.admin>
