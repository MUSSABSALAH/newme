@props([
    'required' => false,
    'autofocus' => false,
    'optional' => false,
    'value' => '',
])

@php
    $codes = \App\Modules\Identity\Support\CountryCallingCodes::all();
    $locale = app()->getLocale();
    $parsed = \App\Modules\Identity\Support\InternationalPhone::split(old('phone', $value));
    $dial = old('phone_dial', $parsed['dial']);
    $national = old('phone_national', $parsed['national']);
    $invalid = $errors->has('phone') || $errors->has('phone_national') || $errors->has('phone_dial');
    $hintId = 'phone-split-hint-'.uniqid();
@endphp

<div {{ $attributes->class(['phone-field']) }} data-phone-split>
  <span class="phone-field__title">{{ __('account.fields.phone') }}
    @if ($optional)
      <span class="muted-note" style="display:inline;font-weight:700">({{ __('account.fields.optional') }})</span>
    @endif
  </span>
  <p class="phone-field__hint" id="{{ $hintId }}">{{ __('account.fields.phone_split_hint') }}</p>

  <div class="phone-split">
    <div class="phone-split__dial">
      <label for="phone_dial">{{ __('account.fields.phone_dial') }}</label>
      <select id="phone_dial" name="phone_dial" dir="ltr"
              data-phone-dial
              aria-describedby="{{ $hintId }}"
              class="{{ $invalid ? 'is-invalid' : '' }}"
              @if ($invalid) aria-invalid="true" @endif
              @required($required)
              autocomplete="tel-country-code">
        @foreach ($codes as $code)
          <option value="{{ $code['dial'] }}" @selected((string) $dial === $code['dial'])>
            +{{ $code['dial'] }} {{ $locale === 'ar' ? $code['ar'] : $code['en'] }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="phone-split__num">
      <label for="phone_national">{{ __('account.fields.phone_national') }}</label>
      <input type="tel" id="phone_national" name="phone_national" value="{{ $national }}"
             data-phone-national
             class="{{ $invalid ? 'is-invalid' : '' }}"
             inputmode="numeric" autocomplete="tel-national" dir="ltr"
             maxlength="15"
             placeholder="{{ __('account.fields.phone_national_placeholder') }}"
             aria-describedby="{{ $hintId }}"
             @required($required)
             @if ($autofocus) autofocus @endif
             @if ($invalid) aria-invalid="true" @endif>
    </div>
  </div>
  <p class="phone-field__combined" data-phone-combined hidden>
    {{ __('account.fields.phone_combined') }}
    <strong dir="ltr"></strong>
  </p>
  @error('phone')<div class="err">{{ $message }}</div>@enderror
  @error('phone_national')<div class="err">{{ $message }}</div>@enderror
  @error('phone_dial')<div class="err">{{ $message }}</div>@enderror
</div>

@once
@push('scripts')
<script>
(function () {
  function digits(value) {
    return String(value || '').replace(/\D/g, '');
  }

  function combine(dial, national) {
    var d = digits(dial);
    var n = digits(national);
    if (n.indexOf('00') === 0) n = n.slice(2);
    if (d && n.indexOf(d) === 0) n = n.slice(d.length);
    if (n.charAt(0) === '0') n = n.slice(1);
    if (!d || n.length < 6 || n.length > 14) return '';
    return '+' + d + n;
  }

  function sync(root) {
    var dial = root.querySelector('[data-phone-dial]');
    var national = root.querySelector('[data-phone-national]');
    var preview = root.querySelector('[data-phone-combined]');
    if (!dial || !national || !preview) return;
    var full = combine(dial.value, national.value);
    var strong = preview.querySelector('strong');
    if (full) {
      if (strong) strong.textContent = full;
      preview.hidden = false;
    } else {
      if (strong) strong.textContent = '';
      preview.hidden = true;
    }
  }

  function rootOf(el) {
    return el && el.closest ? el.closest('[data-phone-split]') : null;
  }

  document.addEventListener('input', function (e) {
    var root = rootOf(e.target);
    if (root) sync(root);
  });
  document.addEventListener('change', function (e) {
    var root = rootOf(e.target);
    if (root) sync(root);
  });

  function init() {
    document.querySelectorAll('[data-phone-split]').forEach(sync);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
</script>
@endpush
@endonce
