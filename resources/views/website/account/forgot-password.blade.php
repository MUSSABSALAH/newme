@extends('website.layouts.app')

@section('title', __('account.passwords.request_title'))
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
    <div class="kick">{{ __('account.passwords.request_title') }}</div>
    <h1>{{ __('account.passwords.request_heading') }}</h1>
    <p>{{ __('account.passwords.request_subtitle') }}</p>
  </div>

  @if (session('status'))
    <div class="alert ok">{{ session('status') }}</div>
  @endif

  <form class="card" method="POST" action="{{ route('website.password.email') }}">
    @csrf
    <div class="field">
      <label for="email">{{ __('account.fields.email') }}</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
      @error('email')<div class="err">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="w-btn">{{ __('account.passwords.send_link') }}</button>
  </form>

  <p class="aside-note"><a href="{{ route('website.login') }}">{{ __('account.passwords.back_to_login') }}</a></p>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')
@endsection
