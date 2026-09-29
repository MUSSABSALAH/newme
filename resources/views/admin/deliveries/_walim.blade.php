@php
    /** @var \App\Modules\Delivery\Models\Shipment|null $shipment */
    /** @var string $sendUrl */
    /** @var bool $canSend */
    /** @var string $boardDate */
@endphp

@if ($shipment || $canSend)
    <div class="ship-item__walim">
        @if ($shipment)
            <span class="ship-item__label">{{ __('deliveries.walim.title') }}</span>
            <x-ui.badge :variant="$shipment->status->badge()">{{ $shipment->status->label() }}</x-ui.badge>

            @if ($shipment->jobId())
                <span class="text-muted" dir="ltr">#{{ $shipment->jobId() }}</span>
            @endif
            @if ($shipment->fleet_name)
                <span class="text-muted">{{ $shipment->fleet_name }}</span>
            @endif
            @if ($shipment->tracking_link)
                <a href="{{ $shipment->tracking_link }}" class="link-btn" target="_blank" rel="noopener">{{ __('deliveries.walim.track') }}</a>
            @endif
            @if ($shipment->status->isLive())
                <a href="{{ route('admin.deliveries.shipments.waybill', $shipment) }}" class="link-btn" target="_blank">{{ __('deliveries.walim.waybill') }}</a>
            @endif
            @if ($shipment->last_error && ! $shipment->status->isLive())
                <span style="color: var(--color-danger, #b42318);">{{ $shipment->last_error }}</span>
            @endif
        @endif

        @if ($canRecord ?? false)
            @if ($canSend && ! ($shipment?->status->isLive() ?? false))
                <form method="POST" action="{{ $sendUrl }}" class="ship-item__inline" data-walim-send>
                    @csrf
                    <input type="hidden" name="date" value="{{ $boardDate }}">
                    <x-ui.button type="submit" variant="ghost" class="btn--sm">
                        <x-ui.icon name="truck" size="sm" />
                        {{ $shipment ? __('deliveries.walim.resend') : __('deliveries.walim.send') }}
                    </x-ui.button>
                </form>
            @endif

            @if ($shipment?->status->isCancellable())
                <form method="POST" action="{{ route('admin.deliveries.shipments.cancel', $shipment) }}" class="ship-item__inline"
                      onsubmit="return confirm(@js(__('deliveries.walim.cancel_confirm')))">
                    @csrf
                    <input type="hidden" name="date" value="{{ $boardDate }}">
                    <x-ui.button type="submit" variant="ghost" class="btn--sm">{{ __('deliveries.walim.cancel') }}</x-ui.button>
                </form>
            @endif
        @endif
    </div>
@endif
