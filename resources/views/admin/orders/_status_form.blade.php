@php
    use App\Modules\Orders\Enums\OrderStatus;

    /** @var \App\Modules\Orders\Models\Order $order */
    $canUpdateOrder = auth()->user()?->can('update', $order) ?? false;
    $canShipOrder = $canShipOrder ?? false;
    $shipStatuses = [
        OrderStatus::Confirmed,
        OrderStatus::OutForDelivery,
        OrderStatus::Delivered,
    ];
    $statusOptions = [$order->status, ...$order->status->nextStatuses()];

    if (! $canUpdateOrder && $canShipOrder) {
        $statusOptions = array_values(array_filter(
            $statusOptions,
            static fn (OrderStatus $status): bool => $status === $order->status || in_array($status, $shipStatuses, true),
        ));
    }

    $statusAction = $canUpdateOrder
        ? route('admin.orders.status', $order)
        : route('admin.deliveries.orders.update', $order);
    $showLabel = $showLabel ?? true;
@endphp

@if (($canUpdateOrder || $canShipOrder) && count($statusOptions) > 1)
    <form method="POST" action="{{ $statusAction }}" class="{{ $formClass ?? 'ship-item__actions order-status-form' }}">
        @csrf
        @method('PATCH')

        @if (! $canUpdateOrder && ! empty($boardDate))
            <input type="hidden" name="date" value="{{ $boardDate }}">
        @endif

        @if ($showLabel)
            <label class="field__label" for="order-status-{{ $order->getKey() }}" style="margin:0">
                {{ __('orders.show.change_status') }}
            </label>
        @endif
        <select
            name="status"
            id="order-status-{{ $order->getKey() }}"
            class="select"
        >
            @foreach ($statusOptions as $option)
                <option value="{{ $option->value }}" @selected($order->status === $option)>
                    {{ $option->label() }}
                </option>
            @endforeach
        </select>

        <x-ui.button type="submit" class="btn--sm">
            <x-ui.icon name="check" size="sm" /> {{ __('messages.actions.save') }}
        </x-ui.button>
    </form>
@endif
