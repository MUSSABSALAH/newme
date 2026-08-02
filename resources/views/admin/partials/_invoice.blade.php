@php
    /** @var \App\Modules\Invoices\Models\Invoice|null $invoice */
@endphp

<x-ui.card :title="__('invoices.card.title')">
    @if ($invoice)
        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-row__label">{{ __('invoices.fields.number') }}</span>
                <span class="detail-row__value" dir="ltr">{{ $invoice->number }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-row__label">{{ __('invoices.fields.issued_at') }}</span>
                <span class="detail-row__value">{{ $invoice->issued_at?->translatedFormat('d M Y — H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-row__label">{{ __('invoices.fields.total') }}</span>
                <span class="detail-row__value">{{ $invoice->totalDisplay() }} <x-ui.sar /></span>
            </div>
        </div>

        @can('view', $invoice)
            <div class="record-section__form">
                <x-ui.button :href="route('admin.invoices.download', $invoice)" variant="ghost" class="btn--sm">
                    <x-ui.icon name="download" size="sm" /> {{ __('invoices.download') }}
                </x-ui.button>
            </div>
        @endcan
    @else
        <p class="text-muted" style="margin: 0;">{{ __('invoices.pending') }}</p>
    @endif
</x-ui.card>
