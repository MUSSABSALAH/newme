@extends('website.layouts.app')

@section('title', __('website.not_found.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
.nm-404 {
  min-height: min(62vh, 640px);
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.nm-404 .hero-ctas {
  justify-content: center;
  padding: 0 20px 8px;
}
@media (max-width: 819.98px) {
  .v30-page.nm-404 { padding: 16px 16px 56px; min-height: auto; }
  .nm-404 .rv { opacity: 1 !important; transform: none !important; }
  .nm-404 .sec-head { margin-bottom: 20px; }
  .nm-404 h2 { font-size: 1.55rem; }
  .nm-404 h2 em { font-style: normal; color: #DD6516; }
  .nm-404 .kick { display: block; margin-bottom: 6px; }
  .nm-404 .section { padding: 36px 0 40px; }
  .nm-404 .hero-ctas { gap: 10px; }
  .nm-404 .hero-ctas .btn { flex: 1 1 160px; }
}
</style>
@endpush

@section('content')
<div class="v30-page nm-ip nm-404">
  <section class="section alt">
    <div class="sec-head rv">
      <span class="kick">{{ __('website.not_found.kick') }}</span>
      <h2>{!! __('website.not_found.heading') !!}</h2>
      <p>{{ __('website.not_found.lead') }}</p>
    </div>
    <div class="hero-ctas">
      <a class="btn navy" href="{{ route('website.main') }}">{{ __('website.not_found.cta_home') }}</a>
      <a class="btn" href="{{ route('website.store') }}">{{ __('website.not_found.cta_store') }}</a>
    </div>
  </section>
</div>
@endsection
