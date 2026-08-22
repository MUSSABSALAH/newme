<x-layouts.admin :title="$customer->name" :heading="$customer->name" :subtitle="__('customers.show.subtitle')">
    <x-slot:actions>
        <x-ui.button :href="route('admin.customers.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('messages.actions.back') }}
        </x-ui.button>
    </x-slot:actions>

    <x-ui.card :title="__('customers.show.contact')">
        <div class="stack" style="gap: 10px;">
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.email') }}</span>
                <strong dir="ltr">{{ $customer->email }}</strong>
            </div>
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.phone') }}</span>
                <strong dir="ltr">{{ $customer->phone ?? '—' }}</strong>
            </div>
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.joined') }}</span>
                <strong>{{ $customer->created_at?->translatedFormat('d M Y') }}</strong>
            </div>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('customers.show.health')">
        @if ($customer->birth_date === null && $customer->allergies === null && $customer->medications === null)
            <div class="dropdown__empty">{{ __('customers.show.no_health') }}</div>
        @else
            <div class="stack" style="gap: 10px;">
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.birth_date') }}</span>
                    <strong>
                        @if ($customer->birth_date)
                            {{ $customer->birth_date->translatedFormat('d M Y') }}
                            <span class="text-muted">({{ __('customers.show.age_years', ['n' => $customer->birth_date->age]) }})</span>
                        @else
                            {{ __('customers.show.none_reported') }}
                        @endif
                    </strong>
                </div>
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.allergies') }}</span>
                    <strong>{{ $customer->allergies ?? __('customers.show.none_reported') }}</strong>
                </div>
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.medications') }}</span>
                    <strong>{{ $customer->medications ?? __('customers.show.none_reported') }}</strong>
                </div>
            </div>
        @endif
    </x-ui.card>

    @include('admin.customers._measurements')

    <x-ui.card :title="__('customers.show.orders')">
        @if ($customer->orders->isEmpty())
            <div class="dropdown__empty">{{ __('customers.show.no_orders') }}</div>
        @else
            <x-ui.table :headers="[
                __('orders.fields.reference'),
                __('orders.fields.items'),
                __('orders.fields.total'),
                __('orders.fields.status'),
                __('orders.fields.placed_at'),
            ]">
                @foreach ($customer->orders as $order)
                    <tr>
                        <td><strong dir="ltr">#{{ $order->reference() }}</strong></td>
                        <td>{{ $order->items_count }}</td>
                        <td>{{ $order->totalDisplay() }}</td>
                        <td><x-ui.badge variant="neutral">{{ $order->status->label() }}</x-ui.badge></td>
                        <td>{{ $order->placed_at?->translatedFormat('d M Y') }}</td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>

    <x-ui.card :title="__('customers.show.subscriptions')">
        @if ($customer->subscriptions->isEmpty())
            <div class="dropdown__empty">{{ __('customers.show.no_subscriptions') }}</div>
        @else
            <x-ui.table :headers="[
                __('subscriptions.fields.plan'),
                __('subscriptions.fields.duration'),
                __('subscriptions.fields.total'),
                __('subscriptions.fields.status'),
                __('subscriptions.fields.created_at'),
            ]">
                @foreach ($customer->subscriptions as $subscription)
                    <tr>
                        <td><strong>{{ $subscription->plan_name }}</strong></td>
                        <td>{{ $subscription->duration_length }} {{ __('plans.units.' . $subscription->duration_unit) }}</td>
                        <td>{{ $subscription->totalDisplay() }}</td>
                        <td><x-ui.badge variant="neutral">{{ $subscription->status->label() }}</x-ui.badge></td>
                        <td>{{ $subscription->created_at?->translatedFormat('d M Y') }}</td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>
</x-layouts.admin>
