@php
    /** @var \App\Modules\Dashboard\DTOs\DeliveriesPanelData $deliveries */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.deliveries')" icon="truck" />

<div class="grid grid--3">
    <x-ui.stat-card :label="__('dashboard.kpi.deliveries_today')" :value="$deliveries->total" accent="dark">
        <x-slot:icon><x-ui.icon name="truck" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card :label="__('dashboard.kpi.deliveries_remaining')" :value="$deliveries->remaining" accent="accent">
        <x-slot:icon><x-ui.icon name="clock" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card :label="__('dashboard.kpi.deliveries_done')" :value="$deliveries->done" accent="primary">
        <x-slot:icon><x-ui.icon name="check" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<x-ui.card :title="__('dashboard.sections.deliveries')">
    <x-slot:actions>
        <a href="{{ route('admin.deliveries.index') }}" class="link-btn">{{ __('dashboard.sections.open_board') }}</a>
    </x-slot:actions>

    @if ($deliveries->total === 0)
        <div class="dropdown__empty">{{ __('dashboard.sections.empty_deliveries') }}</div>
    @else
        <div class="dash-breakdown">
            <div class="dash-breakdown__row">
                <span>{{ __('deliveries.sections.subscriptions') }}</span>
                <strong>{{ $deliveries->stops }}</strong>
            </div>
            <div class="dash-breakdown__row">
                <span>{{ __('deliveries.sections.orders') }}</span>
                <strong>{{ $deliveries->orders }}</strong>
            </div>
        </div>
    @endif
</x-ui.card>
