@php
    use App\Modules\Orders\Enums\OrderStatus;

    /** @var \App\Modules\Dashboard\DTOs\OrdersPanelData $orders */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.orders')" icon="package" />

<div class="grid grid--3">
    <x-ui.stat-card
        :label="__('dashboard.kpi.orders_today')"
        :value="$orders->today"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="shopping-bag" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.orders_month')"
        :value="$orders->month"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="package" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.orders_pending')"
        :value="$orders->pending"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="clock" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<div class="grid grid--2">
    <x-ui.card :title="__('dashboard.sections.order_status')">
        <div class="dash-breakdown">
            @foreach (OrderStatus::cases() as $status)
                <div class="dash-breakdown__row">
                    <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                    <strong>{{ $orders->byStatus[$status->value] ?? 0 }}</strong>
                </div>
            @endforeach
        </div>
    </x-ui.card>

    <x-ui.card :title="__('dashboard.sections.orders')">
        <x-slot:actions>
            <a href="{{ route('admin.orders.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_orders') }}</a>
        </x-slot:actions>

        @if ($orders->recent->isEmpty())
            <div class="dropdown__empty">{{ __('dashboard.sections.empty_orders') }}</div>
        @else
            <div class="dash-feed">
                @foreach ($orders->recent as $order)
                    <a href="{{ route('admin.orders.show', $order) }}" class="dash-feed__item">
                        <span class="dash-feed__main">
                            <strong dir="ltr">#{{ $order->reference() }}</strong>
                            <span class="text-muted">{{ $order->user?->name ?? '—' }}</span>
                        </span>
                        <span class="dash-feed__meta">
                            <x-ui.badge :variant="$order->status->badge()">{{ $order->status->label() }}</x-ui.badge>
                            <span class="dash-feed__amount">{{ $order->totalDisplay() }} <x-ui.sar /></span>
                        </span>
                    </a>
                @endforeach
            </div>
        @endif
    </x-ui.card>
</div>
