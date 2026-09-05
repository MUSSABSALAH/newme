@extends('website.layouts.app')

@section('title', __('account.subscription.title'))
@section('theme', '#122B4A')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
@php
  $mealLabels = collect($subscription->meal_types)
      ->map(fn ($m) => \App\Modules\Plans\Enums\MealType::tryFrom($m)?->label() ?? $m)
      ->implode(' · ');
@endphp

<div class="cowrap">
  <div class="cohead">
    <a href="{{ route('website.account', ['tab' => 'subscriptions']) }}" class="co-back">← {{ __('account.back') }}</a>
    <div class="kick">{{ __('account.tabs.subscriptions') }}</div>
    <h1>{{ $subscription->plan_name }}</h1>
    <p>
      <span class="pill {{ $subscription->status->value }}">{{ $subscription->status->label() }}</span>
      · {{ $subscription->created_at?->translatedFormat('d M Y') }}
    </p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert bad">{{ $errors->first() }}</div>
  @endif

  <div class="sub-meta" role="list">
    <div class="sub-meta__item" role="listitem">
      <span>{{ __('account.subscription.duration') }}</span>
      <b>{{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}</b>
    </div>
    <div class="sub-meta__item" role="listitem">
      <span>{{ __('account.subscription.total_days') }}</span>
      <b>{{ $subscription->total_days }}</b>
    </div>
    @if ($subscription->start_date)
      <div class="sub-meta__item" role="listitem">
        <span>{{ __('account.subscription.start') }}</span>
        <b>{{ $subscription->start_date->translatedFormat('d M Y') }}</b>
      </div>
    @endif
    @if ($subscription->endDate())
      <div class="sub-meta__item" role="listitem">
        <span>{{ __('account.subscription.end') }}</span>
        <b>{{ $subscription->endDate()->translatedFormat('d M Y') }}</b>
      </div>
    @endif
    <div class="sub-meta__item sub-meta__item--accent" role="listitem">
      <span>{{ __('account.subscription.total') }}</span>
      <b class="sub-meta__amount">{{ $subscription->totalDisplay() }} <x-ui.sar /></b>
    </div>
  </div>

  @if ($subscription->isPaused())
    <div class="alert warn pause-banner">
      {{ __('account.subscription.pause_active_banner', [
        'date' => $subscription->pause_started_on?->translatedFormat('d M Y') ?? '—',
        'count' => $subscription->frozenDaysCount(),
      ]) }}
    </div>
  @endif

  <div class="sub-overview">
    <div class="card">
      <h2><span class="n">1</span>{{ __('account.subscription.title') }}</h2>
      <div class="kv"><span>{{ __('account.subscription.meals') }}</span><b>{{ $mealLabels }}</b></div>
      <div class="kv"><span>{{ __('account.subscription.duration') }}</span><b>{{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}</b></div>
      <div class="kv"><span>{{ __('account.subscription.total_days') }}</span><b>{{ $subscription->total_days }}</b></div>
      @if ($subscription->start_date)
        <div class="kv"><span>{{ __('account.subscription.start') }}</span><b>{{ $subscription->start_date->translatedFormat('d M Y') }}</b></div>
      @endif
      @if ($subscription->endDate())
        <div class="kv"><span>{{ __('account.subscription.end') }}</span><b>{{ $subscription->endDate()->translatedFormat('d M Y') }}</b></div>
      @endif
      <div class="kv"><span>{{ __('payments.labels.status') }}</span><b>{{ $subscription->status->label() }}</b></div>
    </div>

    <div class="card">
      <h2><span class="n">2</span>{{ __('account.subscription.total') }}</h2>
      <div class="kv"><span>{{ __('account.subscription.subtotal') }}</span><b>{{ \App\Support\Money\Money::fromMinor($subscription->subtotal_minor)->format() }}</b></div>
      @if ($subscription->discount_minor > 0)
        <div class="kv"><span>{{ __('account.subscription.discount') }}</span><b>− {{ \App\Support\Money\Money::fromMinor($subscription->discount_minor)->format() }}</b></div>
      @endif
      @if ($subscription->hasCouponDiscount())
        <div class="kv">
          <span>{{ __('account.subscription.coupon') }}{{ $subscription->coupon_code ? ' ('.$subscription->coupon_code.')' : '' }}</span>
          <b>− {{ $subscription->couponDiscountDisplay() }}</b>
        </div>
      @endif
      @if ($subscription->delivery_fee_minor > 0)
        <div class="kv"><span>{{ __('account.subscription.delivery') }}</span><b>{{ \App\Support\Money\Money::fromMinor($subscription->delivery_fee_minor)->format() }}</b></div>
      @endif
      @if ($subscription->tax_minor > 0)
        <div class="kv"><span>{{ __('account.subscription.tax') }}</span><b>{{ \App\Support\Money\Money::fromMinor($subscription->tax_minor)->format() }}</b></div>
      @endif
      <div class="kv kv--total"><span>{{ __('account.subscription.total') }}</span><b>{{ $subscription->totalDisplay() }}</b></div>
    </div>

    @include('website.account._invoice', [
      'invoice' => $invoice,
      'empty' => __('account.invoice.none_subscription'),
      'heading_n' => '3',
    ])

    @include('website.account._delivery', [
      'payable' => $subscription,
      'heading' => __('account.delivery.title'),
      'heading_n' => '4',
    ])
  </div>

  @if ($subscription->status === \App\Modules\Subscriptions\Enums\SubscriptionStatus::Active && $subscription->allowsPause())
    <section class="sub-pause card">
      <h2>{{ __('account.subscription.pause_action') }}</h2>
      <div class="alert warn" role="alert">
        {{ __('account.subscription.pause_notice', [
          'days' => $pauseLeadDays,
        ]) }}
      </div>
      <form method="POST" action="{{ route('website.account.subscriptions.pause', $subscription) }}" class="pause-datebar">
        @csrf
        <label class="pause-datebar__label" for="detail_pause_from">{{ __('account.subscription.pause_from') }}</label>
        <div class="pause-datebar__row">
          <input type="date"
                 id="detail_pause_from"
                 name="pause_from"
                 value="{{ old('pause_from', $earliestPauseDate) }}"
                 min="{{ $earliestPauseDate }}"
                 required>
          <button type="submit">{{ __('account.subscription.pause_confirm') }}</button>
        </div>
      </form>
    </section>
  @elseif ($subscription->isPaused())
    <section class="sub-pause card">
      <h2>{{ __('account.subscription.resume_action') }}</h2>
      <div class="alert ok" role="status">{{ __('account.subscription.resume_hint', ['days' => $resumeLeadDays]) }}</div>
      <form method="POST" action="{{ route('website.account.subscriptions.resume', $subscription) }}" class="pause-datebar pause-datebar--resume">
        @csrf
        <button type="submit" class="pause-datebar__solo">{{ __('account.subscription.resume_confirm') }}</button>
      </form>
    </section>
  @endif

  {{-- Meal calendar last (can span many months) --}}
  <section class="sub-schedule">
    <div class="sub-schedule__head">
      <div>
        <div class="kick">{{ __('account.subscription.schedule') }}</div>
        <h2>{{ __('account.subscription.schedule') }}</h2>
        <p>{{ __('account.subscription.schedule_hint', ['days' => $leadDays]) }}</p>
      </div>
    </div>
    <div class="card sub-schedule__card">
      @include('website.account._meal-calendar')
    </div>
  </section>
</div>

@endsection
