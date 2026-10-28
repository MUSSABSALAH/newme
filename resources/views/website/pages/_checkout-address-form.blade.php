@php
  /** @var \App\Modules\Addresses\Models\Address|null $address */
  $address = $address ?? null;
  $key = $address?->public_id ?? 'new';
  $suffix = $address ? '-'.$key : '';
  $submitted = old('_address_form') === $key;
  $value = fn (string $field, $fallback = null) => $submitted ? old($field, $fallback) : $fallback;
  $error = fn (string $field): ?string => $submitted ? $errors->first($field) ?: null : null;
  $needsBackup = $address?->needsBackupPhone() ?? false;
@endphp

<form class="aform" method="POST"
      action="{{ $address ? route('website.checkout.address.update', $address) : route('website.checkout.address.store') }}"
      data-address-form="{{ $key }}" data-validate novalidate @if (! $open) hidden @endif>
  @csrf
  @if ($address)
    @method('PUT')
  @endif
  <input type="hidden" name="_address_form" value="{{ $key }}">

  @if ($address)
    <p class="aform__title">{{ __('checkout.address.edit_title', ['label' => $address->label]) }}</p>
  @endif

  @if ($needsBackup)
    <div class="backup-note" role="note">
      <b>{{ __('checkout.address.backup_needed_title') }}</b>
      <span>{{ __('checkout.address.backup_needed_body') }}</span>
    </div>
  @endif

  @include('website.account._address-map', [
    'cityId' => 'city'.$suffix,
    'districtId' => 'district'.$suffix,
    'streetId' => 'street'.$suffix,
    'nationalId' => 'national_address'.$suffix,
    'pinLat' => $address?->lat,
    'pinLng' => $address?->lng,
  ])
  <div class="grid2">
    <div class="f">
      <label for="label{{ $suffix }}">{{ __('addresses.fields.label') }}</label>
      <input type="text" id="label{{ $suffix }}" name="label" class="{{ $error('label') ? 'is-invalid' : '' }}" value="{{ $value('label', $address?->label) }}" placeholder="{{ __('addresses.placeholders.label') }}" required>
      @if ($message = $error('label'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="recipient_name{{ $suffix }}">{{ __('addresses.fields.recipient_name') }}</label>
      <input type="text" id="recipient_name{{ $suffix }}" name="recipient_name" class="{{ $error('recipient_name') ? 'is-invalid' : '' }}" value="{{ $value('recipient_name', $address?->recipient_name ?? $user->name) }}" required>
      @if ($message = $error('recipient_name'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="phone{{ $suffix }}">{{ __('addresses.fields.phone') }}</label>
      <input type="tel" id="phone{{ $suffix }}" name="phone" class="{{ $error('phone') ? 'is-invalid' : '' }}" value="{{ $value('phone', $address?->phone ?? $user->phone) }}" dir="ltr" pattern="[0-9+() \-]{6,32}" data-message-pattern="{{ __('addresses.errors.phone_format') }}" required>
      @if ($message = $error('phone'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f {{ $needsBackup ? 'f--attention' : '' }}">
      <label for="backup_phone{{ $suffix }}">{{ __('addresses.fields.backup_phone') }}</label>
      <input type="tel" id="backup_phone{{ $suffix }}" name="backup_phone" class="{{ $error('backup_phone') ? 'is-invalid' : '' }}" value="{{ $value('backup_phone', $address?->backup_phone) }}" placeholder="{{ __('addresses.placeholders.backup_phone') }}" dir="ltr" pattern="[0-9+() \-]{6,32}" data-message-pattern="{{ __('addresses.errors.phone_format') }}" required>
      <small class="f__hint">{{ __('addresses.hints.backup_phone') }}</small>
      @if ($message = $error('backup_phone'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="city{{ $suffix }}">{{ __('addresses.fields.city') }}</label>
      <input type="text" id="city{{ $suffix }}" name="city" class="{{ $error('city') ? 'is-invalid' : '' }}" value="{{ $value('city', $address?->city) }}" required>
      @if ($message = $error('city'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="district{{ $suffix }}">{{ __('addresses.fields.district') }}</label>
      <input type="text" id="district{{ $suffix }}" name="district" class="{{ $error('district') ? 'is-invalid' : '' }}" value="{{ $value('district', $address?->district) }}" required>
      @if ($message = $error('district'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="street{{ $suffix }}">{{ __('addresses.fields.street') }}</label>
      <input type="text" id="street{{ $suffix }}" name="street" class="{{ $error('street') ? 'is-invalid' : '' }}" value="{{ $value('street', $address?->street) }}" required>
      @if ($message = $error('street'))<span class="err">{{ $message }}</span>@endif
    </div>
    <div class="f">
      <label for="national_address{{ $suffix }}">{{ __('addresses.fields.national_address') }}</label>
      <input type="text" id="national_address{{ $suffix }}" name="national_address" class="{{ $error('national_address') ? 'is-invalid' : '' }}" value="{{ $value('national_address', $address?->national_address) }}" placeholder="{{ __('addresses.placeholders.national_address') }}" required dir="ltr" autocomplete="off">
      @if ($message = $error('national_address'))<span class="err">{{ $message }}</span>@endif
    </div>
  </div>
  <div class="f">
    <label for="details{{ $suffix }}">{{ __('addresses.fields.details') }}</label>
    <input type="text" id="details{{ $suffix }}" name="details" class="{{ $error('details') ? 'is-invalid' : '' }}" value="{{ $value('details', $address?->details) }}" placeholder="{{ __('addresses.placeholders.details') }}">
    @if ($message = $error('details'))<span class="err">{{ $message }}</span>@endif
  </div>
  <label class="check" style="margin-bottom:14px">
    <input type="checkbox" name="is_default" value="1" @checked($value('is_default', $address ? $address->is_default : ! $hasAddress))>
    <span>{{ __('addresses.fields.is_default') }}</span>
  </label>
  <div class="aform__actions">
    <button type="submit" class="btn ghost" style="width:auto">{{ $address ? __('checkout.address.update') : __('checkout.address.save') }}</button>
    @if ($address && ! $needsBackup)
      <button type="button" class="aform__cancel" data-close-address="{{ $key }}">{{ __('checkout.address.cancel') }}</button>
    @endif
  </div>
</form>
