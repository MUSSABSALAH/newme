{{-- Single desktop header (announce + nav) — same as homepage --}}
@include('website.partials.v30-announce')
@include('website.partials.v30-nav', [
  'active' => $active ?? null,
  'showCart' => $showCart ?? true,
])
