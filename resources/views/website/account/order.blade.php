@extends('website.layouts.app')

@section('title', __('account.order.title'))
@section('theme', '#122B4A')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
@php
  $waLines = [];
  foreach ($order->items as $it) { $waLines[] = $it->quantity.'× '.$it->name; }
  $waRef = __('account.order.ref').' #'.$order->reference();
  $waText = rawurlencode($waRef."\n".implode("\n", $waLines));
@endphp

<div class="announce">{!! __('website.store.announce') !!}</div>
@include('website.partials.nav', ['active' => null, 'showCart' => true])

<div class="cowrap">
  <div class="cohead">
    <a href="{{ route('website.account', ['tab' => 'orders']) }}" class="co-back">← {{ __('account.back') }}</a>
    <div class="kick">{{ __('account.tabs.orders') }}</div>
    <h1>{{ __('account.order.ref') }} #{{ $order->reference() }}</h1>
    <p>
      <span class="pill {{ $order->status->value }}">{{ $order->status->label() }}</span>
      · {{ $order->placed_at?->translatedFormat('d M Y') }}
    </p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif

  <div class="card">
    <h2><span class="n">1</span>{{ __('account.order.title') }}</h2>
    @foreach ($order->items as $item)
      <div class="oitem">
        <div><span class="q">{{ $item->quantity }}×</span> {{ $item->name }}</div>
        <div class="amt">{{ $item->lineTotalDisplay() }} <x-ui.sar /></div>
      </div>
    @endforeach
    @if ($order->hasDiscount())
      <div class="kv" style="margin-top:14px;border-top:1.5px solid var(--gray-2);padding-top:14px">
        <span>{{ __('account.order.subtotal') }}</span>
        <b>{{ $order->subtotalDisplay() }}</b>
      </div>
      <div class="kv">
        <span>{{ __('account.order.discount') }}{{ $order->coupon_code ? ' ('.$order->coupon_code.')' : '' }}</span>
        <b>−{{ $order->discountDisplay() }}</b>
      </div>
      <div class="kv kv--total">
        <span>{{ __('account.order.total') }}</span>
        <b>{{ $order->totalDisplay() }}</b>
      </div>
    @else
      <div class="kv kv--total" style="margin-top:14px;border-top:1.5px solid var(--gray-2);padding-top:14px">
        <span>{{ __('account.order.total') }}</span>
        <b>{{ $order->totalDisplay() }}</b>
      </div>
    @endif
  </div>

  @include('website.account._delivery', ['payable' => $order])

  @include('website.account._invoice', [
    'invoice' => $invoice,
    'empty' => __('account.invoice.none'),
  ])

  <a class="w-btn" style="margin-top:4px" href="https://wa.me/966533360317?text={{ $waText }}" target="_blank" rel="noopener">{{ __('account.order.whatsapp') }}</a>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')
@endsection
