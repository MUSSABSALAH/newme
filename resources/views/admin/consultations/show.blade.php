@php
    use App\Modules\Consultations\Enums\ConsultationStatus;

    $reference = '#'.$consultation->reference();
    $statusOptions = array_values(array_unique(
        [$consultation->status, ...$consultation->status->nextStatuses()],
        SORT_REGULAR,
    ));
    $canChangeStatus = $consultation->status->nextStatuses() !== [];
@endphp

<x-layouts.admin
    :title="$reference"
    :heading="$reference"
    :subtitle="__('consultations.subtitle')"
>
    <x-slot:actions>
        <x-ui.button :href="route('admin.consultations.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('messages.actions.back') }}
        </x-ui.button>
    </x-slot:actions>

    <div class="record-hero">
        <div>
            <div class="record-hero__badges">
                <x-ui.badge :variant="$consultation->status->badge()">{{ $consultation->status->label() }}</x-ui.badge>
            </div>
            <p class="record-hero__meta text-muted">
                {{ __('consultations.fields.scheduled_on') }}:
                {{ $consultation->scheduled_on?->translatedFormat('d M Y') ?? '—' }}،
                <span dir="ltr">{{ $consultation->slotLabel() }}</span>
            </p>
        </div>
    </div>

    <div class="consult-show-grid">
        <x-ui.card :title="__('consultations.show.schedule')">
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.status') }}</span>
                <span class="detail-row__value">
                    <x-ui.badge :variant="$consultation->status->badge()">{{ $consultation->status->label() }}</x-ui.badge>
                </span>
            </div>
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.scheduled_on') }}</span>
                <span class="detail-row__value">{{ $consultation->scheduled_on?->translatedFormat('l، d M Y') ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.slot') }}</span>
                <span class="detail-row__value" dir="ltr">{{ $consultation->slotLabel() }}</span>
            </div>
            @if ($consultation->goal)
                <div class="detail-row">
                    <span class="detail-row__label">{{ __('consultations.fields.goal') }}</span>
                    <span class="detail-row__value">{{ $consultation->goal }}</span>
                </div>
            @endif

            @can('update', $consultation)
                <form
                    method="POST"
                    action="{{ route('admin.consultations.status', $consultation) }}"
                    class="consult-manage"
                >
                    @csrf
                    @method('PATCH')

                    @if ($canChangeStatus)
                        <div class="consult-manage__block">
                            <label class="consult-manage__label">{{ __('consultations.show.change_status') }}</label>
                            <div class="consult-status-picks" role="radiogroup" aria-label="{{ __('consultations.show.change_status') }}">
                                @foreach ($statusOptions as $option)
                                    @php
                                        /** @var ConsultationStatus $option */
                                        $isCurrent = $option === $consultation->status;
                                    @endphp
                                    <label class="consult-status-pick {{ $isCurrent ? 'is-current' : '' }}">
                                        <input
                                            type="radio"
                                            name="status"
                                            value="{{ $option->value }}"
                                            @checked(old('status', $consultation->status->value) === $option->value)
                                        >
                                        <span class="badge badge--{{ $option->badge() }}">{{ $option->label() }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('status')
                                <div class="field__error">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <input type="hidden" name="status" value="{{ $consultation->status->value }}">
                        <p class="consult-manage__hint">{{ __('consultations.show.status_locked') }}</p>
                    @endif

                    <div class="consult-manage__block">
                        <label class="consult-manage__label" for="consultation-notes">{{ __('consultations.fields.notes') }}</label>
                        <textarea
                            id="consultation-notes"
                            name="notes"
                            class="input"
                            rows="4"
                            placeholder="{{ __('consultations.show.notes_placeholder') }}"
                        >{{ old('notes', $consultation->notes) }}</textarea>
                        <p class="consult-manage__hint">{{ __('consultations.show.notes_hint') }}</p>
                        @error('notes')
                            <div class="field__error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="consult-manage__actions">
                        <x-ui.button type="submit" variant="primary">
                            <x-ui.icon name="check" size="sm" /> {{ __('messages.actions.save') }}
                        </x-ui.button>
                    </div>
                </form>
            @else
                @if ($consultation->notes)
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('consultations.fields.notes') }}</span>
                        <span class="detail-row__value" style="white-space:pre-wrap;">{{ $consultation->notes }}</span>
                    </div>
                @endif
            @endcan
        </x-ui.card>

        <x-ui.card :title="__('consultations.show.customer')">
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.customer_name') }}</span>
                <span class="detail-row__value">{{ $consultation->customer_name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.customer_email') }}</span>
                <span class="detail-row__value" dir="ltr">{{ $consultation->customer_email }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-row__label">{{ __('consultations.fields.created_at') }}</span>
                <span class="detail-row__value">{{ $consultation->created_at?->translatedFormat('d M Y — H:i') ?? '—' }}</span>
            </div>
        </x-ui.card>
    </div>
</x-layouts.admin>
