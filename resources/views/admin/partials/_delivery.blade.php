@php
    use App\Modules\Identity\Enums\PermissionName;
    use App\Modules\Payments\Enums\PaymentStatus;

    /** @var \App\Modules\Orders\Models\Order|\App\Modules\Subscriptions\Models\Subscription $payable */
    $address = $payable->deliveryAddress();
    $payment = $payable->payments->first();
    $canConfirm = $payment !== null
        && $payment->status === PaymentStatus::Pending
        && $payable->payment_method?->isDeferred()
        && auth()->user()?->can(PermissionName::PaymentsConfirm->value);
@endphp

<x-ui.card :title="$title">
    <div class="detail-list">
        <div class="detail-row" style="align-items: flex-start;">
            <span class="detail-row__label">{{ __('addresses.fields.address') }}</span>
            @if ($address)
                <span class="detail-row__value">
                    @foreach ($address->lines() as $line)
                        <span style="display: block;">{{ $line }}</span>
                    @endforeach
                </span>
            @else
                <span class="detail-row__value detail-row__value--muted">{{ $noAddress }}</span>
            @endif
        </div>

        @if ($address?->nationalAddress)
            <div class="detail-row">
                <span class="detail-row__label">{{ __('addresses.fields.national_address') }}</span>
                <span class="detail-row__value" dir="ltr">{{ $address->nationalAddress }}</span>
            </div>
        @endif

        @if ($payable->payment_method)
            <div class="detail-row">
                <span class="detail-row__label">{{ __('payments.labels.method') }}</span>
                <span class="detail-row__value">
                    {{ $payable->payment_method->label() }}
                    @if ($payment?->cardLabel())
                        <span class="text-muted" dir="ltr">({{ $payment->cardLabel() }})</span>
                    @endif
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-row__label">{{ __('payments.labels.status') }}</span>
                <span class="detail-row__value">
                    <x-ui.badge :variant="$payable->payment_status->badge()">
                        {{ $payable->payment_status->label() }}
                    </x-ui.badge>
                </span>
            </div>

            @if ($payment?->gateway_reference)
                <div class="detail-row">
                    <span class="detail-row__label">{{ __('payments.labels.reference') }}</span>
                    <span class="detail-row__value" dir="ltr">{{ $payment->gateway_reference }}</span>
                </div>
            @endif
        @endif
    </div>

    @if ($canConfirm)
        <form method="POST" action="{{ route('admin.payments.confirm', $payment) }}" class="record-section__form">
            @csrf
            <x-ui.button type="submit">
                <x-ui.icon name="check" size="sm" /> {{ __('payments.actions.confirm') }}
            </x-ui.button>
        </form>
    @endif
</x-ui.card>
