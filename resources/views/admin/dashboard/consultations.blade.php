@php
    use App\Modules\Consultations\Enums\ConsultationStatus;

    /** @var \App\Modules\Dashboard\DTOs\ConsultationsPanelData $consultations */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.consultations')" icon="calendar-clock" />

<div class="grid grid--3">
    <x-ui.stat-card
        :label="__('dashboard.kpi.consultations_pending')"
        :value="$consultations->pending"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="clock" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.consultations_today')"
        :value="$consultations->today"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="calendar-check" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.consultations_week')"
        :value="$consultations->week"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="calendar-days" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<div class="grid grid--2">
    <x-ui.card :title="__('dashboard.sections.consultation_status')">
        <div class="dash-breakdown">
            @foreach (ConsultationStatus::cases() as $status)
                <div class="dash-breakdown__row">
                    <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                    <strong>{{ $consultations->byStatus[$status->value] ?? 0 }}</strong>
                </div>
            @endforeach
        </div>
    </x-ui.card>

    <x-ui.card :title="__('dashboard.sections.consultations')">
        <x-slot:actions>
            <a href="{{ route('admin.consultations.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_consultations') }}</a>
        </x-slot:actions>

        @if ($consultations->upcoming->isEmpty())
            <div class="dropdown__empty">{{ __('dashboard.sections.empty_consultations') }}</div>
        @else
            <div class="dash-feed">
                @foreach ($consultations->upcoming as $consultation)
                    <a href="{{ route('admin.consultations.show', $consultation) }}" class="dash-feed__item">
                        <span class="dash-feed__main">
                            <strong>{{ $consultation->customer_name }}</strong>
                            <span class="text-muted">{{ $consultation->whenLabel() }}</span>
                        </span>
                        <span class="dash-feed__meta">
                            <x-ui.badge :variant="$consultation->status->badge()">{{ $consultation->status->label() }}</x-ui.badge>
                        </span>
                    </a>
                @endforeach
            </div>
        @endif
    </x-ui.card>
</div>
