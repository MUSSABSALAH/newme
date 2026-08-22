@php
    use App\Modules\Subscriptions\Enums\SubscriptionStatus;

    /** @var \App\Modules\Dashboard\DTOs\SubscriptionsPanelData $subscriptions */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.subscriptions')" icon="repeat" />

<div class="grid grid--4">
    <x-ui.stat-card
        :label="__('dashboard.kpi.subscriptions_active')"
        :value="$subscriptions->active"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="repeat" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.subscriptions_paused')"
        :value="$subscriptions->paused"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="pause" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.subscriptions_month')"
        :value="$subscriptions->newMonth"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="calendar-plus" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.needs_handling')"
        :value="$subscriptions->needingAttention"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="bell" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<div class="grid grid--2">
    <x-ui.card :title="__('dashboard.sections.subscription_status')">
        <div class="dash-breakdown">
            @foreach (SubscriptionStatus::cases() as $status)
                <div class="dash-breakdown__row">
                    <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                    <strong>{{ $subscriptions->byStatus[$status->value] ?? 0 }}</strong>
                </div>
            @endforeach
        </div>
    </x-ui.card>

    <x-ui.card :title="__('dashboard.sections.subscriptions')">
        <x-slot:actions>
            <a href="{{ route('admin.subscriptions.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_subscriptions') }}</a>
        </x-slot:actions>

        @if ($subscriptions->recent->isEmpty())
            <div class="dropdown__empty">{{ __('dashboard.sections.empty_subscriptions') }}</div>
        @else
            <div class="dash-feed">
                @foreach ($subscriptions->recent as $subscription)
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
