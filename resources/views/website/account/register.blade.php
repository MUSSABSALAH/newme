@extends('website.layouts.app')

@section('title', __('account.register.title'))
@section('theme', '#122B4A')
@section('body_class', 'is-auth-page')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
<div class="acc-wrap narrow">
  <div class="acc-head" style="text-align:center">
    <div class="kick">{{ __('account.register.title') }}</div>
    <h1>{{ __('account.register.heading') }}</h1>
    <p>{{ __('account.register.subtitle') }}</p>
  </div>

  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif
  @if (request('next') === 'checkout')
    <div class="alert">{{ __('checkout.sign_in_required') }}</div>
  @elseif (request('next') === 'consult')
    <div class="alert">{{ __('website.consult.sign_in_required') }}</div>
  @endif

  <form class="card" method="POST" action="{{ route('website.register') }}">
    @csrf
    <div class="field">
      <label for="name">{{ __('account.fields.name') }}</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
      @error('name')<div class="err">{{ $message }}</div>@enderror
    </div>

    @if ($channels->asksEmail())
      <div class="field">
        <label for="email">{{ __('account.fields.email') }}</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')<div class="err">{{ $message }}</div>@enderror
      </div>
    @endif

    @if ($channels->asksPhoneOnRegister())
      <div class="field">
        <label for="phone">{{ __('account.fields.phone') }}</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="tel" dir="ltr">
        @error('phone')<div class="err">{{ $message }}</div>@enderror
      </div>
    @endif

    @if ($channels->asksPassword())
      <div class="field">
        <label for="password">{{ __('account.fields.password') }}</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        @error('password')<div class="err">{{ $message }}</div>@enderror
      </div>
      <div class="field" style="margin-bottom:20px">
        <label for="password_confirmation">{{ __('account.fields.password_confirm') }}</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
      </div>
    @else
      <div style="margin-bottom:20px"></div>
    @endif

    <button type="submit" class="w-btn"
            data-busy-label="{{ $channels->otpEnabled() ? __('account.register.submit_otp_busy') : __('account.register.submit_busy') }}">
      <span data-busy-text>{{ $channels->otpEnabled() ? __('account.register.submit_otp') : __('account.register.submit') }}</span>
    </button>
  </form>

  <p class="aside-note">{{ __('account.register.have_account') }} <a href="{{ route('website.login', request('next') ? ['next' => request('next')] : []) }}">{{ __('account.register.login_link') }}</a></p>
</div>

@endsection
