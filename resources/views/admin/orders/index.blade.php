<x-layouts.admin :title="__('orders.title')" :heading="__('orders.title')" :subtitle="__('orders.subtitle')">
    <x-ui.card>
        <form method="GET" action="{{ route('admin.orders.index') }}" class="row" style="gap: 12px; align-items: flex-end;">
            <x-form.field :label="__('orders.filter_status')" name="status" style="margin:0;min-width:240px;">
                <x-form.select name="status" onchange="this.form.submit()">
                    <option value="">{{ __('orders.all_statuses') }}</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" @selected($activeStatus === $status)>
                            {{ $status->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>
        </form>
    </x-ui.card>

    @if ($orders->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('orders.no_orders') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[
            __('orders.fields.reference'),
            __('orders.fields.customer'),
            __('orders.fields.items'),
            __('orders.fields.total'),
            __('orders.fields.status'),
            __('orders.fields.placed_at'),
            '',
        ]">
            @foreach ($orders as $order)
                <tr>
                    <td><strong dir="ltr">#{{ $order->reference() }}</strong></td>
                    <td>{{ $order->user?->name ?? '—' }}</td>
                    <td>{{ $order->items_count }}</td>
                    <td>{{ $order->totalDisplay() }} <x-ui.sar /></td>
                    <td>
                        <x-ui.badge :variant="$order->status->badge()">{{ $order->status->label() }}</x-ui.badge>
                    </td>
                    <td>{{ $order->placed_at?->translatedFormat('d M Y') ?? '—' }}</td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            <x-ui.button :href="route('admin.orders.show', $order)" variant="ghost" class="btn--sm">
                                {{ __('messages.actions.view') }}
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$orders" />
    @endif
</x-layouts.admin>
