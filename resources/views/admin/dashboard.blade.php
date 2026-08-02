@php
    use App\Modules\Orders\Enums\OrderStatus;
    use App\Modules\Subscriptions\Enums\SubscriptionStatus;
    use App\Support\Money\Money;

    /** @var \App\Modules\Dashboard\DTOs\DashboardSnapshot $stats */
@endphp

<x-layouts.admin :title="__('dashboard.title')" :heading="__('dashboard.title')" :subtitle="__('dashboard.subtitle')">
    <div class="grid grid--4">
        <x-ui.stat-card
            :label="__('dashboard.kpi.sales_today')"
            :value="Money::fromMinor($stats->salesTodayMinor)->format()"
            :unit="__('invoices.pdf.currency')"
            accent="primary"
        >
            <x-slot:icon><x-ui.icon name="banknote" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.sales_month')"
            :value="Money::fromMinor($stats->salesMonthMinor)->format()"
            :unit="__('invoices.pdf.currency')"
            accent="accent"
        >
            <x-slot:icon><x-ui.icon name="trending-up" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.orders_month')"
            :value="$stats->ordersMonth"
            accent="dark"
        >
            <x-slot:icon><x-ui.icon name="package" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.subscriptions_active')"
            :value="$stats->subscriptionsActive"
            accent="primary"
        >
            <x-slot:icon><x-ui.icon name="repeat" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    <div class="grid grid--4">
        <x-ui.stat-card
            :label="__('dashboard.kpi.orders_today')"
            :value="$stats->ordersToday"
            accent="dark"
        >
            <x-slot:icon><x-ui.icon name="shopping-bag" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.orders_pending')"
            :value="$stats->ordersPending"
            accent="accent"
        >
            <x-slot:icon><x-ui.icon name="clock" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.needs_handling')"
            :value="$stats->subscriptionsNeedingAttention"
            accent="accent"
        >
            <x-slot:icon><x-ui.icon name="bell" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('dashboard.kpi.invoices_month')"
            :value="$stats->invoicesMonth"
            accent="dark"
        >
            <x-slot:icon><x-ui.icon name="file-text" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    <p class="text-muted dash-hint">{{ __('dashboard.kpi.sales_hint') }}</p>

    <div class="grid grid--2">
        <x-ui.card :title="__('dashboard.sections.order_status')">
            <div class="dash-breakdown">
                @foreach (OrderStatus::cases() as $status)
                    <div class="dash-breakdown__row">
                        <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                        <strong>{{ $stats->ordersByStatus[$status->value] ?? 0 }}</strong>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        <x-ui.card :title="__('dashboard.sections.subscription_status')">
            <div class="dash-breakdown">
                @foreach (SubscriptionStatus::cases() as $status)
                    <div class="dash-breakdown__row">
                        <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                        <strong>{{ $stats->subscriptionsByStatus[$status->value] ?? 0 }}</strong>
                    </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>

    <div class="grid grid--2">
        <x-ui.card :title="__('dashboard.sections.orders')">
            <x-slot:actions>
                <a href="{{ route('admin.orders.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_orders') }}</a>
            </x-slot:actions>

            @if ($stats->recentOrders->isEmpty())
                <div class="dropdown__empty">{{ __('dashboard.sections.empty_orders') }}</div>
            @else
                <div class="dash-feed">
                    @foreach ($stats->recentOrders as $order)
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

        <x-ui.card :title="__('dashboard.sections.subscriptions')">
            <x-slot:actions>
                <a href="{{ route('admin.subscriptions.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_subscriptions') }}</a>
            </x-slot:actions>

            @if ($stats->recentSubscriptions->isEmpty())
                <div class="dropdown__empty">{{ __('dashboard.sections.empty_subscriptions') }}</div>
            @else
                <div class="dash-feed">
                    @foreach ($stats->recentSubscriptions as $subscription)
                        <a href="{{ route('admin.subscriptions.show', $subscription) }}" class="dash-feed__item">
                            <span class="dash-feed__main">
                                <strong dir="ltr">#{{ $subscription->reference() }}</strong>
                                <span class="text-muted">{{ $subscription->user?->name ?? '—' }} · {{ $subscription->plan_name }}</span>
                            </span>
                            <span class="dash-feed__meta">
                                <x-ui.badge :variant="$subscription->handling_status->badge()">
                                    {{ $subscription->handling_status->label() }}
                                </x-ui.badge>
                                <span class="dash-feed__amount">{{ $subscription->totalDisplay() }} <x-ui.sar /></span>
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif
        </x-ui.card>
    </div>
</x-layouts.admin>
