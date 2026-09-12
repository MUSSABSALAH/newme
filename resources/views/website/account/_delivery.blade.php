@php
  use App\Modules\Orders\Models\Order;
  use App\Modules\Subscriptions\Models\Subscription;

  /** @var Order|Subscription $payable */
  $address = $payable->deliveryAddress();
  $payment = $payable->payments()->latest()->first();
  $heading = $heading ?? null;
  $headingN = $heading_n ?? null;
  $orderShipping = $payable instanceof Order ? $payable->status : null;
  $subscriptionShipping = $payable instanceof Subscription ? $payable->visibleShipmentStatus() : null;
@endphp

@if ($address || $payable->payment_method || $orderShipping || $subscriptionShipping)
  <div class="card">
    @if ($heading)
      <h2>
        @if ($headingN)<span class="n">{{ $headingN }}</span>@endif
        {{ $heading }}
      </h2>
    @endif

    @if ($orderShipping)
      <div class="kv">
        <span>{{ __('account.delivery.shipping_status') }}</span>
        <b><span class="pill {{ $orderShipping->value }}">{{ $orderShipping->label() }}</span></b>
      </div>
    @elseif ($subscriptionShipping)
      <div class="kv">
        <span>{{ __('account.delivery.shipping_status') }}</span>
        <b><span class="pill {{ $subscriptionShipping->value }}">{{ $subscriptionShipping->label() }}</span></b>
      </div>
    @endif

    @if ($address)
      <div class="kv" style="align-items:flex-start">
        <span>{{ __('account.delivery.address') }}</span>
        <b style="text-align:end;font-weight:800;font-family:var(--font)">
          @foreach ($address->lines() as $line)
            <span style="display:block">{{ $line }}</span>
          @endforeach
        </b>
      </div>
      @if ($address->nationalAddress)
        <div class="kv">
          <span>{{ __('addresses.fields.national_address') }}</span>
          <b dir="ltr">{{ $address->nationalAddress }}</b>
        </div>
      @endif
    @endif

    @if ($payable->payment_method)
      <div class="kv">
        <span>{{ __('payments.labels.method') }}</span>
        <b>{{ $payable->payment_method->label() }}@if ($payment?->cardLabel()) <span style="font-weight:700;color:var(--muted)" dir="ltr">({{ $payment->cardLabel() }})</span>@endif</b>
      </div>
      <div class="kv">
        <span>{{ __('payments.labels.status') }}</span>
        <b>{{ $payable->payment_status->label() }}</b>
      </div>
      @if ($payment?->gateway_reference)
        <div class="kv">
          <span>{{ __('payments.labels.reference') }}</span>
          <b style="font-family:var(--mono);font-size:12.5px" dir="ltr">{{ $payment->gateway_reference }}</b>
        </div>
      @endif
    @endif
  </div>
@endif
