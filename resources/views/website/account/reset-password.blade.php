@extends('website.layouts.app')

@section('title', __('account.passwords.reset_title'))
@section('theme', '#122B4A')
@section('body_class', 'is-auth-page')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
<div class="announce">{!! __('website.store.announce') !!}</div>
@include('website.partials.nav', ['active' => null, 'showCart' => true])

<div class="acc-wrap narrow">
  <div class="acc-head" style="text-align:center">
    <div class="kick">{{ __('account.passwords.reset_title') }}</div>
    <h1>{{ __('account.passwords.reset_heading') }}</h1>
    <p>{{ __('account.passwords.reset_subtitle') }}</p>
  </div>

  <form class="card" method="POST" action="{{ route('website.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="field">
      <label for="email">{{ __('account.fields.email') }}</label>
      <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required autocomplete="email">
      @error('email')<div class="err">{{ $message }}</div>@enderror
    </div>
    <div class="field">
      <label for="password">{{ __('account.fields.password') }}</label>
      <input type="password" id="password" name="password" required minlength="8" autocomplete="new-password">
      @error('password')<div class="err">{{ $message }}</div>@enderror
    </div>
    <div class="field">
      <label for="password_confirmation">{{ __('account.fields.password_confirm') }}</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" autocomplete="new-password">
    </div>

    <button type="submit" class="w-btn">{{ __('account.passwords.reset_action') }}</button>
  </form>

  <p class="aside-note"><a href="{{ route('website.login') }}">{{ __('account.passwords.back_to_login') }}</a></p>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')
@endsection
