@php
  $cityId = $cityId ?? 'city';
  $districtId = $districtId ?? 'district';
  $streetId = $streetId ?? 'street';
  $nationalId = $nationalId ?? 'national_address';
@endphp

@once
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
<style>
.addr-map{margin:0 0 16px}
.addr-map__bar{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:8px;flex-wrap:wrap}
.addr-map__hint{font-size:12.5px;font-weight:700;color:var(--muted,#7C8799);line-height:1.6;flex:1;min-width:180px}
.addr-map__btn{
  display:inline-flex;align-items:center;justify-content:center;gap:8px;
  border:1.5px solid var(--gray-2,#E8E4DC);background:#fff;color:var(--navy,#122B4A);
  font-weight:800;font-size:13px;border-radius:999px;padding:9px 14px;white-space:nowrap
}
.addr-map__btn:hover{border-color:var(--orange,#F07F2D);color:var(--orange-deep,#DD6516)}
.addr-map__btn svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.addr-map__canvas{height:220px;border-radius:16px;border:1.5px solid var(--gray-2,#E8E4DC);overflow:hidden;background:var(--tile,#F0EDE6);direction:ltr}
.addr-map__canvas .leaflet-container{height:100%;width:100%;font-family:inherit}
.addr-map__msg{margin:8px 0 0;border-radius:12px;padding:10px 12px;font-weight:800;font-size:13px;line-height:1.6}
.addr-map__msg[hidden]{display:none!important}
.addr-map__msg.is-bad{background:#FDECEA;color:#C0392B;border:1px solid rgba(192,57,43,.25)}
.addr-map__msg.is-ok{background:#E9F7F0;color:#1F7A4D;border:1px solid rgba(57,180,120,.28)}
</style>
@endpush
@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer></script>
<script src="{{ asset('js/address-map.js') }}" defer></script>
@endpush
@endonce

<div class="addr-map"
     data-addr-map
     data-lookup="{{ route('website.account.addresses.lookup') }}"
     data-city="#{{ $cityId }}"
     data-district="#{{ $districtId }}"
     data-street="#{{ $streetId }}"
     data-national="#{{ $nationalId }}"
     data-center-lat="24.7136"
     data-center-lng="46.6753"
     data-msg-outside="{{ __('addresses.errors.outside_riyadh') }}"
     data-msg-locating="{{ __('addresses.map.locating') }}">
  <div class="addr-map__bar">
    <p class="addr-map__hint">{{ __('addresses.map.hint') }}</p>
    <button type="button" class="addr-map__btn" data-addr-locate>
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v2.4M12 18.6V21M3 12h2.4M18.6 12H21"/><circle cx="12" cy="12" r="3.4"/><circle cx="12" cy="12" r="7.2"/></svg>
      {{ __('addresses.map.pick') }}
    </button>
  </div>
  <div class="addr-map__canvas" data-addr-canvas></div>
  <div class="addr-map__msg is-bad" data-addr-msg hidden role="alert"></div>
</div>
