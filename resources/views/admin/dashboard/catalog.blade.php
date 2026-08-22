@php
    /** @var \App\Modules\Dashboard\DTOs\CatalogPanelData $catalog */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.catalog')" icon="shopping-bag" />

<div class="grid grid--4">
    <x-ui.stat-card
        :label="__('dashboard.kpi.products_total')"
        :value="$catalog->products"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="boxes" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.products_active')"
        :value="$catalog->activeProducts"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="check-circle" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.products_hidden')"
        :value="$catalog->hiddenProducts"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="eye-off" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.products_featured')"
        :value="$catalog->featuredProducts"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="star" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<x-ui.card :title="__('dashboard.sections.categories')">
    <x-slot:actions>
        <a href="{{ route('admin.products.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_products') }}</a>
    </x-slot:actions>

    @if ($catalog->categories->isEmpty())
        <div class="dropdown__empty">{{ __('dashboard.sections.empty_categories') }}</div>
    @else
        <div class="dash-breakdown">
            @foreach ($catalog->categories as $category)
                <div class="dash-breakdown__row">
                    <span>{{ $category->label() }}</span>
                    <strong>{{ $category->products_count }}</strong>
                </div>
            @endforeach
        </div>
    @endif
</x-ui.card>
