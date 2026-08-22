@php
    use App\Modules\Orders\Enums\OrderStatus;
    use App\Modules\Payments\Enums\PaymentStatus;

    /** @var \App\Modules\Delivery\DTOs\DeliveryBoard $board */
@endphp

<x-ui.card :title="__('deliveries.sections.orders')">
    <x-slot:actions>
        <span class="text-muted">{{ trans_choice('deliveries.sections.order_count', $board->orders->count()) }}</span>
    </x-slot:actions>

    @if ($board->orders->isEmpty())
        <div class="dropdown__empty">{{ __('deliveries.sections.no_orders') }}</div>
    @else
        <div class="ship-list">
            @foreach ($board->orders as $order)
                @php
                    $address = $order->deliveryAddress();
                    $collectCash = $order->payment_method?->isDeferred()
                        && $order->payment_status === PaymentStatus::Pending;
                @endphp

                <article class="ship-item {{ $order->status->isTerminal() ? 'ship-item--done' : '' }}">
                    <header class="ship-item__head">
                        <div class="ship-item__who">
                            <strong>{{ $order->user?->name ?? $address?->recipientName ?? '—' }}</strong>
                            @can('view', $order)
                                <a href="{{ route('admin.orders.show', $order) }}" class="link-btn" dir="ltr">
                                    #{{ $order->reference() }}
                                </a>
                            @else
                                <span class="text-muted" dir="ltr">#{{ $order->reference() }}</span>
                            @endcan
                        </div>

                        <x-ui.badge :variant="$order->status->badge()">{{ $order->status->label() }}</x-ui.badge>
                    </header>

                    <div class="ship-item__body">
                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.address') }}</span>
                            @if ($address)
                                <span>{{ $address->oneLine() }}</span>
                                @if ($address->details)
                                    <span class="text-muted">{{ $address->details }}</span>
                                @endif
                            @else
                                <span class="text-muted">{{ __('deliveries.fields.no_address') }}</span>
                            @endif
                        </div>

                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.phone') }}</span>
                            <span dir="ltr">{{ $address?->phone ?: ($order->user?->phone ?? '—') }}</span>
                        </div>

                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.parcel') }}</span>
                            <span>
                                {{ trans_choice('deliveries.fields.item_count', $order->items_count) }}
                                <span class="ship-item__amount">{{ $order->totalDisplay() }} <x-ui.sar /></span>
                            </span>
                            @if ($collectCash)
                                <span class="ship-tag ship-tag--cash">{{ __('deliveries.fields.collect_cash') }}</span>
                            @endif
                        </div>
                    </div>

                    @if ($order->note)
                        <p class="ship-item__note">
                            <x-ui.icon name="message-square" size="sm" />
                            {{ $order->note }}
                        </p>
                    @endif

                    @if ($canRecord && ! $order->status->isTerminal())
                        <form method="POST" action="{{ route('admin.deliveries.orders.update', $order) }}" class="ship-item__actions">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="date" value="{{ $board->date->toDateString() }}">

                            @if ($order->status->canTransitionTo(OrderStatus::OutForDelivery))
                                <x-ui.button type="submit" name="status" value="{{ OrderStatus::OutForDelivery->value }}" variant="ghost" class="btn--sm">
                                    {{ __('deliveries.actions.dispatch') }}
                                </x-ui.button>
                            @endif

                            @if ($order->status->canTransitionTo(OrderStatus::Delivered))
                                <x-ui.button type="submit" name="status" value="{{ OrderStatus::Delivered->value }}" class="btn--sm">
                                    <x-ui.icon name="check" size="sm" /> {{ __('deliveries.actions.deliver') }}
                                </x-ui.button>
                            @endif
                        </form>
                    @endif
                </article>
            @endforeach
        </div>
    @endif
</x-ui.card>
