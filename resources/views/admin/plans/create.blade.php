<x-layouts.admin :title="__('plans.create_title')" :heading="__('plans.create_title')" :subtitle="__('plans.subtitle')">
    @include('admin.plans._form', [
        'action' => route('admin.plans.store'),
        'method' => 'POST',
        'plan' => null,
        'goals' => $goals,
        'units' => $units,
        'mealTypes' => $mealTypes,
        'mealsByType' => $mealsByType,
        'rules' => $rules,
        'selectedMealIds' => $selectedMealIds,
        'draft' => $draft,
        'publishedVersion' => $publishedVersion,
    ])
</x-layouts.admin>
