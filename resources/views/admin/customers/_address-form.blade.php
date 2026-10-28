@php
  /** @var \App\Modules\Addresses\Models\Address $address */
  $key = $address->public_id;
  $submitted = old('_address_form') === $key;
  $value = fn (string $field, $fallback = null) => $submitted ? old($field, $fallback) : $fallback;
  $error = fn (string $field): ?string => $submitted ? ($errors->first($field) ?: null) : null;
  $fields = [
      'label' => ['required' => true],
      'recipient_name' => ['required' => true],
      'phone' => ['required' => true, 'ltr' => true],
      'backup_phone' => ['required' => true, 'ltr' => true, 'hint' => __('addresses.hints.backup_phone')],
      'city' => ['required' => true],
      'district' => ['required' => true],
      'street' => ['required' => true],
      'national_address' => ['required' => true, 'ltr' => true],
      'details' => ['required' => false],
  ];
@endphp

<details class="address-edit" @if ($submitted) open @endif>
  <summary class="btn btn--ghost btn--sm">
    <x-ui.icon name="pencil" size="sm" /> {{ __('customers.edit.edit_address') }}
  </summary>

  <form method="POST" action="{{ route('admin.customers.addresses.update', [$customer, $address]) }}" class="stack" style="gap: 12px; margin-top: 12px;">
    @csrf
    @method('PUT')
    <input type="hidden" name="_address_form" value="{{ $key }}">

    <div class="form-grid-2">
      @foreach ($fields as $field => $meta)
        <div class="field">
          <label class="field__label" for="{{ $field }}-{{ $key }}">{{ __('addresses.fields.'.$field) }}</label>
          <input
            type="text"
            id="{{ $field }}-{{ $key }}"
            name="{{ $field }}"
            value="{{ $value($field, $address->{$field}) }}"
            class="input {{ $error($field) ? 'is-invalid' : '' }}"
            @if ($meta['required']) required @endif
            @if ($meta['ltr'] ?? false) dir="ltr" @endif
          >
          @if (isset($meta['hint']))
            <span class="field__hint">{{ $meta['hint'] }}</span>
          @endif
          @if ($message = $error($field))
            <span class="field__error">{{ $message }}</span>
          @endif
        </div>
      @endforeach
    </div>

    <label class="switch-row">
      <input type="hidden" name="is_default" value="0">
      <input type="checkbox" name="is_default" value="1" @checked($value('is_default', $address->is_default))>
      <span><span class="switch-row__title">{{ __('addresses.fields.is_default') }}</span></span>
    </label>

    <p class="field__hint" style="margin: 0;">{{ __('customers.addresses.pin_kept') }}</p>

    <div>
      <x-ui.button type="submit" variant="primary">
        <x-ui.icon name="save" size="sm" /> {{ __('customers.edit.save_address') }}
      </x-ui.button>
    </div>
  </form>
</details>
