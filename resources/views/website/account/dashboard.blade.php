@extends('website.layouts.app')

@section('title', __('account.dashboard.title'))
@section('theme', '#122B4A')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
@php
  $tabs = [
      'profile' => ['label' => __('account.tabs.profile'), 'count' => null],
      'addresses' => ['label' => __('account.tabs.addresses'), 'count' => $addresses->count()],
      'subscriptions' => ['label' => __('account.tabs.subscriptions'), 'count' => $subscriptions->count()],
      'orders' => ['label' => __('account.tabs.orders'), 'count' => $orders->count()],
  ];
  $initial = mb_strtoupper(mb_substr($user->name, 0, 1));
@endphp

<div class="announce">{!! __('website.store.announce') !!}</div>
@include('website.partials.nav', ['active' => null, 'showCart' => true])

<div class="cowrap">
  <div class="cohead">
    <div class="kick">{{ __('account.nav.account') }}</div>
    <h1>{{ __('account.dashboard.greeting', ['name' => $user->name]) }}</h1>
    <p>{{ __('account.dashboard.profile_hint') }}</p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif

  <div class="acc-layout">
    <aside class="acc-side">
      <div class="acc-user">
        <div class="acc-user__av" aria-hidden="true">{{ $initial }}</div>
        <div class="acc-user__meta">
          <b>{{ $user->name }}</b>
          <span>{{ $user->email }}</span>
          @if ($user->phone)<span dir="ltr">{{ $user->phone }}</span>@endif
        </div>
      </div>

      <nav class="acc-nav" aria-label="{{ __('account.dashboard.title') }}">
        @foreach ($tabs as $key => $tab)
          <a href="{{ route('website.account', ['tab' => $key]) }}"
             class="{{ $activeTab === $key ? 'on' : '' }}">
            {{ $tab['label'] }}
            @if ($tab['count'] !== null)
              <span class="badge">{{ $tab['count'] }}</span>
            @endif
          </a>
        @endforeach
      </nav>

      <div class="acc-side-foot">
        <form method="POST" action="{{ route('website.logout') }}">
          @csrf
          <button type="submit">{{ __('account.dashboard.logout') }}</button>
        </form>
      </div>
    </aside>

    <div class="acc-main">
      {{-- Profile --}}
      <section class="acc-panel {{ $activeTab === 'profile' ? 'on' : '' }}" id="panel-profile">
        <div class="card">
          <h2><span class="n">1</span>{{ __('account.tabs.profile') }}</h2>
          <p class="hint">{{ __('account.dashboard.profile_hint') }}</p>

          <form method="POST" action="{{ route('website.account.profile') }}">
            @csrf
            @method('PUT')

            <div class="f">
              <label for="name">{{ __('account.fields.name') }}</label>
              <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
              @error('name')<div class="err">{{ $message }}</div>@enderror
            </div>

            <div class="frow">
              <div class="f">
                <label for="email">{{ __('account.fields.email') }}</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required dir="ltr">
                @error('email')<div class="err">{{ $message }}</div>@enderror
              </div>

              <div class="f">
                <label for="phone">{{ __('account.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required dir="ltr">
                @error('phone')<div class="err">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="divider-label">{{ __('account.dashboard.password_hint') }}</div>

            <div class="f">
              <label for="current_password">{{ __('account.fields.current_password') }}</label>
              <input type="password" id="current_password" name="current_password" autocomplete="current-password">
              @error('current_password')<div class="err">{{ $message }}</div>@enderror
            </div>

            <div class="frow">
              <div class="f">
                <label for="password">{{ __('account.fields.new_password') }}</label>
                <input type="password" id="password" name="password" autocomplete="new-password">
                @error('password')<div class="err">{{ $message }}</div>@enderror
              </div>

              <div class="f">
                <label for="password_confirmation">{{ __('account.fields.password_confirm') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
              </div>
            </div>

            <button type="submit" class="w-btn">{{ __('account.dashboard.save_profile') }}</button>
          </form>
        </div>
      </section>

      {{-- Addresses --}}
      <section class="acc-panel {{ $activeTab === 'addresses' ? 'on' : '' }}" id="panel-addresses">
        @forelse ($addresses as $address)
          <div class="card address-card">
            <div class="address-card__head">
              <div>
                <b>{{ $address->label }}</b>
                @if ($address->is_default)
                  <span class="pill active">{{ __('addresses.default') }}</span>
                @endif
              </div>
              <div class="address-card__actions">
                @unless ($address->is_default)
                  <form method="POST" action="{{ route('website.account.addresses.default', $address) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="link-quiet">{{ __('account.dashboard.set_default') }}</button>
                  </form>
                @endunless
                <button type="button" class="link-quiet" data-edit-address="{{ $address->public_id }}">{{ __('account.dashboard.edit_address') }}</button>
                <form method="POST" action="{{ route('website.account.addresses.destroy', $address) }}" onsubmit="return confirm(@json(__('account.dashboard.delete_address').'?'))">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="link-quiet danger">{{ __('account.dashboard.delete_address') }}</button>
                </form>
              </div>
            </div>
            <p class="address-card__body">
              {{ $address->recipient_name }} · <span dir="ltr">{{ $address->phone }}</span><br>
              {{ $address->summary() }}
              @if ($address->national_address)
                <br><span dir="ltr">{{ __('addresses.fields.national_address') }}: {{ $address->national_address }}</span>
              @endif
              @if ($address->details)<br>{{ $address->details }}@endif
            </p>

            <form method="POST" action="{{ route('website.account.addresses.update', $address) }}" class="address-edit" id="edit-{{ $address->public_id }}" hidden>
              @csrf
              @method('PUT')
              @include('website.account._address-fields', ['address' => $address])
              <button type="submit" class="w-btn sm">{{ __('account.dashboard.save_profile') }}</button>
            </form>
          </div>
        @empty
          <div class="empty">{{ __('account.dashboard.no_addresses') }}</div>
        @endforelse

        <div class="card">
          <h2><span class="n">+</span>{{ __('account.dashboard.add_address') }}</h2>
          <form method="POST" action="{{ route('website.account.addresses.store') }}">
            @csrf
            @include('website.account._address-fields', ['address' => null])
            <button type="submit" class="w-btn">{{ __('account.dashboard.add_address') }}</button>
          </form>
        </div>
      </section>

      {{-- Subscriptions --}}
      <section class="acc-panel {{ $activeTab === 'subscriptions' ? 'on' : '' }}" id="panel-subscriptions">
        @forelse ($subscriptions as $subscription)
          <a class="pick-row" href="{{ route('website.account.subscription', ['subscription' => $subscription->public_id]) }}">
            <div class="body">
              <b>{{ $subscription->plan_name }}</b>
              <small>
                {{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}
                · {{ $subscription->created_at?->translatedFormat('d M Y') }}
              </small>
              @if ($subscriptionInvoices->has($subscription->id))
                <span class="tag">{{ __('account.dashboard.has_invoice') }}</span>
              @endif
            </div>
            <div class="side">
              <span class="pill {{ $subscription->status->value }}">{{ $subscription->status->label() }}</span>
              <span class="amt">{{ $subscription->totalDisplay() }} <x-ui.sar /></span>
            </div>
          </a>
        @empty
          <div class="empty">
            {{ __('account.dashboard.no_subscriptions') }}
            <div style="margin-top:14px"><a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a></div>
          </div>
        @endforelse
      </section>

      {{-- Orders --}}
      <section class="acc-panel {{ $activeTab === 'orders' ? 'on' : '' }}" id="panel-orders">
        @forelse ($orders as $order)
          <a class="pick-row" href="{{ route('website.account.order', ['order' => $order->public_id]) }}">
            <div class="body">
              <b>{{ __('account.order.ref') }} #{{ $order->reference() }}</b>
              <small>
                {{ $order->placed_at?->translatedFormat('d M Y') }} · {{ $order->items_count }} {{ __('account.order.items') }}
              </small>
              @if ($orderInvoices->has($order->id))
                <span class="tag">{{ __('account.dashboard.has_invoice') }}</span>
              @endif
            </div>
            <div class="side">
              <span class="pill {{ $order->status->value }}">{{ $order->status->label() }}</span>
              <span class="amt">{{ $order->totalDisplay() }} <x-ui.sar /></span>
            </div>
          </a>
        @empty
          <div class="empty">
            {{ __('account.dashboard.no_orders') }}
            <div style="margin-top:14px"><a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a></div>
          </div>
        @endforelse
      </section>
    </div>
  </div>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-edit-address]').forEach(function(btn){
  btn.addEventListener('click',function(){
    var form=document.getElementById('edit-'+btn.getAttribute('data-edit-address'));
    if(form)form.hidden=!form.hidden;
  });
});
</script>
@endpush
