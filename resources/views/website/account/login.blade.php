@extends('website.layouts.app')

@section('title', __('account.login.title'))
@section('theme', '#122B4A')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
<div class="announce">{!! __('website.store.announce') !!}</div>
@include('website.partials.nav', ['active' => null, 'showCart' => true])

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
  @endif

  <form class="card" method="POST" action="{{ route('website.login') }}">
    @csrf
    <div class="field">
      <label for="email">{{ __('account.fields.email') }}</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
      @error('email')<div class="err">{{ $message }}</div>@enderror
    </div>
    <div class="field">
      <label for="password">{{ __('account.fields.password') }}</label>
      <input type="password" id="password" name="password" required autocomplete="current-password">
      @error('password')<div class="err">{{ $message }}</div>@enderror
    </div>
    <div class="field field-row">
      <label for="remember" class="check">
        <input type="checkbox" id="remember" name="remember" value="1">
        <span>{{ __('account.fields.remember') }}</span>
      </label>
      <a href="{{ route('website.password.request') }}" class="link-quiet">{{ __('account.login.forgot') }}</a>
    </div>
    <button type="submit" class="w-btn">{{ __('account.login.submit') }}</button>
  </form>

  <p class="aside-note">{{ __('account.login.no_account') }} <a href="{{ route('website.register', request('next') ? ['next' => request('next')] : []) }}">{{ __('account.login.register_link') }}</a></p>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')
@endsection
