<x-layouts.admin :title="__('customers.title')" :heading="__('customers.title')" :subtitle="__('customers.subtitle')">
    @if ($customers->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('customers.no_customers') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[
            __('customers.fields.name'),
            __('customers.fields.email'),
            __('customers.fields.phone'),
            __('customers.fields.orders'),
            __('customers.fields.subscriptions'),
            __('customers.fields.joined'),
            '',
        ]">
            @foreach ($customers as $customer)
                <tr>
                    <td>
                        <div class="row" style="gap: 10px;">
                            <x-ui.avatar :name="$customer->name" :size="32" />
                            <strong>{{ $customer->name }}</strong>
                        </div>
                    </td>
                    <td dir="ltr" style="text-align: start;">{{ $customer->email }}</td>
                    <td dir="ltr" style="text-align: start;">{{ $customer->phone ?? '—' }}</td>
                    <td>{{ $customer->orders_count }}</td>
                    <td>{{ $customer->subscriptions_count }}</td>
                    <td>{{ $customer->created_at?->translatedFormat('d M Y') }}</td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            <x-ui.button :href="route('admin.customers.show', $customer)" variant="ghost" class="btn--sm">
                                <x-ui.icon name="eye" size="sm" /> {{ __('messages.actions.view') }}
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$customers" />
    @endif
</x-layouts.admin>
