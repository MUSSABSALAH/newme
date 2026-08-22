@php
  /** @var \App\Modules\Addresses\Models\Address|null $address */
  $prefix = $address?->public_id ?? 'new';
@endphp

<div class="addr-grid">
  <div class="field">
    <label for="label-{{ $prefix }}">{{ __('addresses.fields.label') }}</label>
    <input type="text" id="label-{{ $prefix }}" name="label" value="{{ old('label', $address?->label) }}" placeholder="{{ __('addresses.placeholders.label') }}" required class="{{ $errors->has('label') ? 'is-invalid' : '' }}">
    @error('label')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="recipient_name-{{ $prefix }}">{{ __('addresses.fields.recipient_name') }}</label>
    <input type="text" id="recipient_name-{{ $prefix }}" name="recipient_name" value="{{ old('recipient_name', $address?->recipient_name ?? auth()->user()?->name) }}" required class="{{ $errors->has('recipient_name') ? 'is-invalid' : '' }}">
    @error('recipient_name')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="phone-{{ $prefix }}">{{ __('addresses.fields.phone') }}</label>
    <input type="text" id="phone-{{ $prefix }}" name="phone" value="{{ old('phone', $address?->phone ?? auth()->user()?->phone) }}" required dir="ltr" pattern="[0-9+() \-]{6,32}" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}">
    @error('phone')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="city-{{ $prefix }}">{{ __('addresses.fields.city') }}</label>
    <input type="text" id="city-{{ $prefix }}" name="city" value="{{ old('city', $address?->city) }}" required class="{{ $errors->has('city') ? 'is-invalid' : '' }}">
    @error('city')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="district-{{ $prefix }}">{{ __('addresses.fields.district') }}</label>
    <input type="text" id="district-{{ $prefix }}" name="district" value="{{ old('district', $address?->district) }}" required class="{{ $errors->has('district') ? 'is-invalid' : '' }}">
    @error('district')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="street-{{ $prefix }}">{{ __('addresses.fields.street') }}</label>
    <input type="text" id="street-{{ $prefix }}" name="street" value="{{ old('street', $address?->street) }}" required class="{{ $errors->has('street') ? 'is-invalid' : '' }}">
    @error('street')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="national_address-{{ $prefix }}">{{ __('addresses.fields.national_address') }}</label>
    <input type="text" id="national_address-{{ $prefix }}" name="national_address" value="{{ old('national_address', $address?->national_address) }}" placeholder="{{ __('addresses.placeholders.national_address') }}" required dir="ltr" autocomplete="off" class="{{ $errors->has('national_address') ? 'is-invalid' : '' }}">
    @error('national_address')<div class="err">{{ $message }}</div>@enderror
  </div>

  <div class="field">
    <label for="details-{{ $prefix }}">{{ __('addresses.fields.details') }}</label>
    <input type="text" id="details-{{ $prefix }}" name="details" value="{{ old('details', $address?->details) }}" placeholder="{{ __('addresses.placeholders.details') }}">
    @error('details')<div class="err">{{ $message }}</div>@enderror
  </div>
</div>

<label class="check" style="margin-bottom:16px">
  <input type="checkbox" name="is_default" value="1" @checked(old('is_default', $address?->is_default))>
  <span>{{ __('addresses.fields.is_default') }}</span>
</label>
