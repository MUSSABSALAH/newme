@extends('website.layouts.app')

@section('title', __('account.otp.title'))
@section('theme', '#122B4A')
@section('body_class', 'is-auth-page')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
<div class="acc-wrap narrow">
  <div class="acc-head" style="text-align:center">
    <div class="kick">{{ __('account.otp.kick') }}</div>
    <h1>{{ __('account.otp.heading') }}</h1>
    <p>
      {{ __('account.otp.subtitle') }}
      @if ($destinations)
        <strong dir="ltr">{{ implode(' · ', $destinations) }}</strong>
      @endif
    </p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif

  <form class="card" id="otp-form" method="POST" action="{{ route('website.otp.store') }}" data-busy-group="otp" data-validate novalidate>
    @csrf
    <div class="field otp-field">
      <label for="otp-input">{{ __('account.otp.code') }}</label>
      <div class="otp-wrap" dir="ltr">
        <input
          type="text"
          id="otp-input"
          class="otp-input"
          name="code"
          value="{{ old('code') }}"
          inputmode="numeric"
          pattern="[0-9]*"
          maxlength="6"
          minlength="6"
          required
          autofocus
          autocomplete="one-time-code"
          enterkeyhint="done"
          autocapitalize="off"
          autocorrect="off"
          spellcheck="false"
          aria-label="{{ __('account.otp.code') }}"
        >
        <div class="otp-cells" aria-hidden="true">
          @for ($i = 0; $i < 6; $i++)
            <span class="otp-cell"></span>
          @endfor
        </div>
      </div>
      @error('code')<div class="err">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="w-btn" data-busy-label="{{ __('account.otp.submit_busy') }}">
      <span data-busy-text>{{ __('account.otp.submit') }}</span>
    </button>
  </form>

  <form method="POST" action="{{ route('website.otp.resend') }}" data-busy-group="otp" style="margin-top:14px;text-align:center">
    @csrf
    <button type="submit" class="link-quiet" style="background:none;border:0;cursor:pointer" data-busy-label="{{ __('account.otp.resend_busy') }}">
      <span data-busy-text>{{ __('account.otp.resend') }}</span>
    </button>
  </form>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/validation.js') }}" defer></script>
<script>
(function () {
  var form = document.getElementById('otp-form');
  var input = document.getElementById('otp-input');
  if (!form || !input) return;

  var cells = Array.prototype.slice.call(form.querySelectorAll('.otp-cell'));
  var allowSubmit = false;

  function digitsOf(value) {
    return String(value || '').replace(/\D/g, '').slice(0, 6);
  }

  function paint() {
    var digits = digitsOf(input.value);
    if (input.value !== digits) {
      input.value = digits;
    }

    cells.forEach(function (cell, index) {
      var filled = digits.charAt(index);
      cell.textContent = filled;
      cell.classList.toggle('is-filled', filled !== '');
      cell.classList.toggle('is-on', index === Math.min(digits.length, 5));
    });

    return digits;
  }

  function fill(raw, submit) {
    input.value = digitsOf(raw);
    var digits = paint();

    if (submit && allowSubmit && digits.length === 6 && form.getAttribute('data-submitting') !== '1') {
      allowSubmit = false;
      if (typeof form.requestSubmit === 'function') {
        form.requestSubmit();
      } else {
        form.submit();
      }
    }
  }

  input.addEventListener('input', function () {
    fill(input.value, true);
  });

  input.addEventListener('focus', paint);

  form.addEventListener('paste', function (event) {
    var pasted = event.clipboardData ? event.clipboardData.getData('text') : '';
    if (!pasted) return;
    event.preventDefault();
    fill(pasted, true);
  });

  paint();
  allowSubmit = true;

  if ('OTPCredential' in window) {
    var abort = new AbortController();
    form.addEventListener('submit', function () {
      abort.abort();
    });

    navigator.credentials
      .get({ otp: { transport: ['sms'] }, signal: abort.signal })
      .then(function (otp) {
        if (otp && otp.code) {
          fill(otp.code, true);
        }
      })
      .catch(function () {});
  }
})();
</script>
@endpush
