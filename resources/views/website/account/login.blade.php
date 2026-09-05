@extends('website.layouts.app')

@section('title', __('account.login.title'))
@section('theme', '#122B4A')
@section('body_class', 'is-auth-page')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
<div class="acc-wrap narrow">
  <div class="acc-head" style="text-align:center">
    <div class="kick" style="margin-bottom:8px">{{ __('account.nav.login') }}</div>
    <h1>{{ __('account.login.heading') }}</h1>
    <p>{{ __('account.login.subtitle') }}</p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif
  @if (session('status'))
    <div class="alert ok">{{ session('status') }}</div>
  @endif
  @if (request('next') === 'checkout')
    <div class="alert">{{ __('checkout.sign_in_required') }}</div>
  @elseif (request('next') === 'consult')
    <div class="alert">{{ __('website.consult.sign_in_required') }}</div>
  @endif

  <form class="card" method="POST" action="{{ route('website.login') }}" data-validate novalidate>
    @csrf

    @if ($channels->asksEmail())
      <div class="field">
        <label for="email">{{ __('account.fields.email') }}</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
               @unless ($channels->asksPhoneOnLogin()) required @endunless
               @if ($errors->has('email')) aria-invalid="true" @endif
               autofocus autocomplete="email">
        @error('email')<div class="err">{{ $message }}</div>@enderror
      </div>
    @endif

    @if ($channels->asksPhoneOnLogin())
      <div class="field">
        <label for="phone">{{ __('account.fields.phone') }}</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
               class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
               @unless ($channels->asksEmail()) required autofocus @endunless
               @if ($errors->has('phone')) aria-invalid="true" @endif
               autocomplete="tel" dir="ltr">
        @error('phone')<div class="err">{{ $message }}</div>@enderror
      </div>
    @endif

    @if ($channels->asksPassword())
      <div class="field">
        <label for="password">{{ __('account.fields.password') }}</label>
        <input type="password" id="password" name="password" required autocomplete="current-password"
               class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
               @if ($errors->has('password')) aria-invalid="true" @endif>
        @error('password')<div class="err">{{ $message }}</div>@enderror
      </div>
    @endif

    <div class="field field-row">
      <label for="remember" class="check">
        <input type="checkbox" id="remember" name="remember" value="1">
        <span>{{ __('account.fields.remember') }}</span>
      </label>
      @if ($channels->asksPassword())
        <a href="{{ route('website.password.request') }}" class="link-quiet">{{ __('account.login.forgot') }}</a>
      @endif
    </div>
    <button type="submit" class="w-btn"
            data-busy-label="{{ $channels->otpEnabled() ? __('account.login.submit_otp_busy') : __('account.login.submit_busy') }}">
      <span data-busy-text>{{ $channels->otpEnabled() ? __('account.login.submit_otp') : __('account.login.submit') }}</span>
    </button>
  </form>

  <p class="aside-note">{{ __('account.login.no_account') }} <a href="{{ route('website.register', request('next') ? ['next' => request('next')] : []) }}">{{ __('account.login.register_link') }}</a></p>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/validation.js') }}" defer></script>
@endpush
