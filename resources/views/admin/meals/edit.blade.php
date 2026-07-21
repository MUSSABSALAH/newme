<x-layouts.admin :title="__('meals.edit_title')" :heading="__('meals.edit_title')" :subtitle="__('meals.subtitle')">
    @include('admin.meals._form', [
        'action' => route('admin.meals.update', $meal),
        'method' => 'PUT',
        'meal' => $meal,
        'types' => $types,
    ])
</x-layouts.admin>
