<x-layouts.admin :title="__('consultations.title')" :heading="__('consultations.title')" :subtitle="__('consultations.subtitle')">
    <x-ui.card>
        <form method="GET" action="{{ route('admin.consultations.index') }}" class="row" style="gap: 12px; align-items: flex-end;">
            <x-form.field :label="__('consultations.filter_status')" name="status" style="margin:0;min-width:240px;">
                <x-form.select name="status" onchange="this.form.submit()">
                    <option value="">{{ __('consultations.all_statuses') }}</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" @selected($activeStatus === $status)>
                            {{ $status->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>
        </form>
    </x-ui.card>

    @if ($consultations->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('consultations.no_consultations') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[
            __('consultations.fields.reference'),
            __('consultations.fields.customer_name'),
            __('consultations.fields.scheduled_on'),
            __('consultations.fields.slot'),
            __('consultations.fields.status'),
            '',
        ]">
            @foreach ($consultations as $consultation)
                <tr>
                    <td><strong dir="ltr">#{{ $consultation->reference() }}</strong></td>
                    <td>
                        <div>{{ $consultation->customer_name }}</div>
                        <div class="text-muted" dir="ltr" style="font-size:.85em">{{ $consultation->customer_email }}</div>
                    </td>
                    <td>{{ $consultation->scheduled_on?->translatedFormat('d M Y') ?? '—' }}</td>
                    <td dir="ltr">{{ $consultation->slotLabel() }}</td>
                    <td>
                        <x-ui.badge :variant="$consultation->status->badge()">{{ $consultation->status->label() }}</x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            <x-ui.button :href="route('admin.consultations.show', $consultation)" variant="ghost" class="btn--sm">
                                {{ __('messages.actions.view') }}
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$consultations" />
    @endif
</x-layouts.admin>
