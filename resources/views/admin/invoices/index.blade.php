@php
    use App\Support\Money\Money;
@endphp

<x-layouts.admin :title="__('invoices.title')" :heading="__('invoices.title')" :subtitle="__('invoices.subtitle')">
    <x-ui.card>
        <form method="GET" action="{{ route('admin.invoices.index') }}" class="row" style="gap: 12px; align-items: flex-end; flex-wrap: wrap;">
            <x-form.field :label="__('invoices.search')" name="q" style="margin:0;min-width:220px;">
                <x-form.input name="q" :value="$search" :placeholder="__('invoices.search_placeholder')" />
            </x-form.field>

            <x-form.field :label="__('invoices.filter_source')" name="source" style="margin:0;min-width:200px;">
                <x-form.select name="source" onchange="this.form.submit()">
                    <option value="">{{ __('invoices.all_sources') }}</option>
                    <option value="order" @selected($activeSource === 'order')>{{ __('invoices.sources.order') }}</option>
                    <option value="subscription" @selected($activeSource === 'subscription')>{{ __('invoices.sources.subscription') }}</option>
                </x-form.select>
            </x-form.field>

            <x-ui.button type="submit" variant="ghost">
                {{ __('messages.actions.search') }}
            </x-ui.button>

            <p class="text-muted" style="margin: 0; margin-inline-start: auto; padding-bottom: 0.7rem;">
                {{ __('invoices.issued_total') }}:
                <strong>{{ Money::fromMinor($issuedTotalMinor)->format() }}</strong>
                <x-ui.sar />
            </p>
        </form>
    </x-ui.card>

    @if ($invoices->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('invoices.no_invoices') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[
            __('invoices.fields.number'),
            __('invoices.fields.customer'),
            __('invoices.fields.source'),
            __('invoices.fields.reference'),
            __('invoices.fields.issued_at'),
            __('invoices.fields.total'),
            '',
        ]">
            @foreach ($invoices as $invoice)
                @php
                    $sourceLabel = $invoice->isForSubscription()
                        ? __('invoices.sources.subscription')
                        : __('invoices.sources.order');
                    $related = $invoice->invoiceable;
                @endphp
                <tr>
                    <td><strong dir="ltr">{{ $invoice->number }}</strong></td>
                    <td>{{ $invoice->user?->name ?? '—' }}</td>
                    <td>{{ $sourceLabel }}</td>
                    <td dir="ltr">
                        @if ($related)
                            #{{ $related->reference() }}
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $invoice->issued_at?->translatedFormat('d M Y — H:i') }}</td>
                    <td>{{ $invoice->totalDisplay() }} <x-ui.sar /></td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            <x-ui.button :href="route('admin.invoices.download', $invoice)" variant="ghost" class="btn--sm">
                                <x-ui.icon name="download" size="sm" /> {{ __('invoices.download') }}
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$invoices" />
    @endif
</x-layouts.admin>
