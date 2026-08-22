@php
    use App\Modules\Dashboard\Enums\DashboardPanel;

    /** @var \App\Modules\Dashboard\DTOs\DashboardSnapshot $stats */
@endphp

<x-layouts.admin :title="__('dashboard.title')" :heading="__('dashboard.title')" :subtitle="__('dashboard.subtitle')">
    @if ($stats->isEmpty())
        <x-ui.card>
            <div class="dash-empty">
                <x-ui.icon name="lock" size="lg" />
                <p class="dash-empty__title">{{ __('dashboard.no_access.title') }}</p>
                <p class="text-muted">{{ __('dashboard.no_access.body') }}</p>
            </div>
        </x-ui.card>
    @endif

    @if ($stats->has(DashboardPanel::Deliveries))
        @include('admin.dashboard.deliveries', ['deliveries' => $stats->deliveries])
    @endif

    @if ($stats->has(DashboardPanel::Finance))
        @include('admin.dashboard.finance', ['finance' => $stats->finance])
    @endif

    @if ($stats->has(DashboardPanel::Orders))
        @include('admin.dashboard.orders', ['orders' => $stats->orders])
    @endif

    @if ($stats->has(DashboardPanel::Subscriptions))
        @include('admin.dashboard.subscriptions', ['subscriptions' => $stats->subscriptions])
    @endif

    @if ($stats->has(DashboardPanel::Consultations))
        @include('admin.dashboard.consultations', ['consultations' => $stats->consultations])
    @endif

    @if ($stats->has(DashboardPanel::Catalog))
        @include('admin.dashboard.catalog', ['catalog' => $stats->catalog])
    @endif

    @if ($stats->has(DashboardPanel::Customers))
        @include('admin.dashboard.customers', ['customers' => $stats->customers])
    @endif

    @if ($stats->has(DashboardPanel::Content))
        @include('admin.dashboard.content', ['content' => $stats->content])
    @endif
</x-layouts.admin>
