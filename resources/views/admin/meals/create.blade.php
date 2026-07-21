<x-layouts.admin :title="__('meals.create_title')" :heading="__('meals.create_title')" :subtitle="__('meals.subtitle')">
    @include('admin.meals._form', [
        'action' => route('admin.meals.store'),
        'method' => 'POST',
        'meal' => null,
        'types' => $types,
    ])
</x-layouts.admin>
