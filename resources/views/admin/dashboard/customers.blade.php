@php
    /** @var \App\Modules\Dashboard\DTOs\CustomersPanelData $customers */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.customers')" icon="users-round" />

<div class="grid grid--3">
    <x-ui.stat-card
        :label="__('dashboard.kpi.customers_total')"
        :value="$customers->total"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="users-round" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.customers_today')"
        :value="$customers->newToday"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="user-plus" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.customers_month')"
        :value="$customers->newMonth"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="user-check" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<x-ui.card :title="__('dashboard.sections.customers')">
    <x-slot:actions>
        <a href="{{ route('admin.customers.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_customers') }}</a>
    </x-slot:actions>

    @if ($customers->recent->isEmpty())
        <div class="dropdown__empty">{{ __('dashboard.sections.empty_customers') }}</div>
    @else
        <div class="dash-feed">
            @foreach ($customers->recent as $customer)
                <a href="{{ route('admin.customers.show', $customer) }}" class="dash-feed__item">
                    <span class="dash-feed__main">
                        <strong>{{ $customer->name }}</strong>
                        <span class="text-muted" dir="ltr">{{ $customer->email }}</span>
                    </span>
                    <span class="dash-feed__meta">
                        <span class="text-muted">{{ $customer->created_at?->translatedFormat('d M Y') ?? '—' }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    @endif
</x-ui.card>
