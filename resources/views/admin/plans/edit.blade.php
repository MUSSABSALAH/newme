<x-layouts.admin :title="__('plans.edit_title')" :heading="$plan->label()" :subtitle="__('plans.edit_title')">
    <x-slot:actions>
        <x-ui.button :href="route('admin.plans.show', $plan)" variant="ghost">
            <x-ui.icon name="eye" size="sm" /> {{ __('plans.details') }}
        </x-ui.button>
    </x-slot:actions>

    @include('admin.plans._form', [
        'action' => route('admin.plans.update', $plan),
        'method' => 'PUT',
        'plan' => $plan,
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
