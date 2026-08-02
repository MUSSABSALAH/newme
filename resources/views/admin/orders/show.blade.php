@php
    $reference = '#'.$order->reference();
@endphp

<x-layouts.admin
    :title="$reference"
    :heading="$reference"
    :subtitle="$order->user?->name ?? __('orders.show.subtitle')"
>
    <x-slot:actions>
        <x-ui.button :href="route('admin.orders.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('messages.actions.back') }}
        </x-ui.button>
    </x-slot:actions>

    <div class="record-hero">
        <div>
            <div class="record-hero__badges">
                <x-ui.badge :variant="$order->status->badge()">{{ $order->status->label() }}</x-ui.badge>
            </div>
            <p class="record-hero__meta text-muted">
                {{ __('orders.fields.placed_at') }} · {{ $order->placed_at?->translatedFormat('d M Y — H:i') ?? '—' }}
            </p>
        </div>

        <div class="record-hero__total">
            <span class="text-muted">{{ __('orders.fields.total') }}</span>
            <strong>{{ $order->totalDisplay() }} <x-ui.sar /></strong>
        </div>
    </div>

    <div class="record-grid">
        <div class="stack">
            <x-ui.card :title="__('orders.show.fulfillment')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('orders.fields.status') }}</span>
                        <span class="detail-row__value">
                            <x-ui.badge :variant="$order->status->badge()">{{ $order->status->label() }}</x-ui.badge>
                        </span>
                    </div>
                </div>

                @can('update', $order)
                    @if (! $order->status->isTerminal())
                        <form method="POST" action="{{ route('admin.orders.status', $order) }}" class="record-section__form">
                            @csrf
                            @method('PATCH')

                            <div class="row" style="gap: 12px; align-items: flex-end; flex-wrap: wrap;">
                                <x-form.field :label="__('orders.show.change_status')" name="status" style="margin:0;flex:1;min-width:220px;">
                                    <x-form.select name="status">
                                        @foreach ($statusOptions as $option)
                                            <option value="{{ $option->value }}" @selected($order->status === $option)>
                                                {{ $option->label() }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                </x-form.field>

                                <x-ui.button type="submit">
                                    <x-ui.icon name="check" size="sm" /> {{ __('messages.actions.save') }}
                                </x-ui.button>
                            </div>
                        </form>
                    @else
                        <p class="text-muted" style="margin: 12px 0 0;">{{ __('orders.show.status_locked') }}</p>
                    @endif
                @endcan
            </x-ui.card>

            <x-ui.card :title="__('orders.show.customer')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('orders.fields.customer') }}</span>
                        <span class="detail-row__value">
                            @if ($order->user)
                                <a href="{{ route('admin.customers.show', $order->user) }}">{{ $order->user->name }}</a>
                            @else
                                —
                            @endif
                        </span>
                    </div>

                    @if ($order->user?->email)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('customers.fields.email') }}</span>
                            <span class="detail-row__value" dir="ltr">{{ $order->user->email }}</span>
                        </div>
                    @endif

                    @if ($order->user?->phone)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('customers.fields.phone') }}</span>
                            <span class="detail-row__value" dir="ltr">{{ $order->user->phone }}</span>
                        </div>
                    @endif
                </div>
            </x-ui.card>

            <x-ui.card :title="__('orders.show.items')">
                <x-ui.table :headers="[
                    __('orders.fields.product'),
                    __('orders.fields.quantity'),
                    __('orders.fields.unit_price'),
                    __('orders.fields.line_total'),
                ]">
                    @foreach ($order->items as $item)
                        <tr>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->unitPriceDisplay() }} <x-ui.sar /></td>
                            <td>{{ $item->lineTotalDisplay() }} <x-ui.sar /></td>
                        </tr>
                    @endforeach
                </x-ui.table>
            </x-ui.card>

            @if ($order->note)
                <x-ui.card :title="__('orders.show.note')">
                    <p style="margin: 0; line-height: 1.6;">{{ $order->note }}</p>
                </x-ui.card>
            @endif
        </div>

        <div class="stack">
            <x-ui.card :title="__('orders.show.pricing')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('orders.fields.subtotal') }}</span>
                        <span class="detail-row__value">{{ $order->subtotalDisplay() }} <x-ui.sar /></span>
                    </div>

                    @if ($order->hasDiscount())
                        <div class="detail-row">
                            <span class="detail-row__label">
                                {{ __('orders.fields.discount') }}
                                @if ($order->coupon_code)
                                    <span dir="ltr">({{ $order->coupon_code }})</span>
                                @endif
                            </span>
                            <span class="detail-row__value">−{{ $order->discountDisplay() }} <x-ui.sar /></span>
                        </div>
                    @endif

                    <div class="detail-row detail-row--total">
                        <span class="detail-row__label">{{ __('orders.fields.total') }}</span>
                        <span class="detail-row__value">{{ $order->totalDisplay() }} <x-ui.sar /></span>
                    </div>
                </div>
            </x-ui.card>

            @include('admin.partials._delivery', [
                'payable' => $order,
                'title' => __('orders.show.delivery'),
                'noAddress' => __('orders.show.no_address'),
            ])

            @include('admin.partials._invoice', ['invoice' => $invoice])
        </div>
    </div>
</x-layouts.admin>
