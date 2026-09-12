@extends('website.layouts.app')

@section('title', __('website.site.make.title'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
<style>
@media (max-width: 819.98px) {
  .v30-page { padding: 20px 16px 48px; }
  .v30-page .rv { opacity: 1 !important; transform: none !important; }
  .v30-page .sec-head { margin-bottom: 18px; text-align: center; }
  .v30-page .sec-head .chapter { display: inline-block; font-size: 11px; font-weight: 800; color: #7C8799; margin-bottom: 6px; }
  .v30-page h1, .v30-page h2 { font-size: 1.6rem; }
  .v30-page .sec-head h2 em {
    font-style: normal;
    color: #F07F2D;
  }
  .v30-page .section { padding: 28px 0 36px; }
  .v30-page .wide-hero {
    position: relative;
    height: 220px;
    border-radius: 18px;
    overflow: hidden;
    background: #1B3A61;
    margin: 0 0 18px;
  }
  .v30-page .wide-hero img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .wide-hero::after {
    content: "";
    position: absolute; inset: 0; z-index: 2;
    background: linear-gradient(to top, rgba(10,22,40,.9), rgba(10,22,40,.2) 55%, transparent);
  }
  .v30-page .wh-in {
    position: absolute; inset-inline: 0; bottom: 0; z-index: 3;
    padding: 16px;
  }
  .v30-page .wh-kick { display: block; color: #FFA05C; font-size: 11px; font-weight: 800; margin-bottom: 6px; }
  .v30-page .wh-in b { display: block; color: #fff; font-size: 18px; font-weight: 900; line-height: 1.35; }
  .v30-page .steps { display: grid; gap: 14px; }
  .v30-page .tcard { background: #fff; border: 1px solid #E8E4DC; border-radius: 16px; padding: 16px; }
  .v30-page .flourshow { background: #122B4A; color: #fff; padding: 28px 16px 32px; margin: 8px -16px 0; }
  .v30-page .fs-banner {
    position: relative;
    min-height: 280px;
    border-radius: 18px;
    overflow: hidden;
    background: #1B3A61;
  }
  .v30-page .fs-banner img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .fs-banner::after {
    content: "";
    position: absolute; inset: 0; z-index: 2;
    background: linear-gradient(to top, rgba(10,22,40,.92), rgba(10,22,40,.35) 50%, transparent);
  }
  .v30-page .fsb-in {
    position: relative; z-index: 3;
    padding: 28px 16px 18px;
    display: flex; flex-direction: column; justify-content: flex-end;
    min-height: 280px;
  }
  .v30-page .fsb-in .kick { color: #FFA05C; }
  .v30-page .fsb-in h2 { color: #fff; margin: 8px 0 10px; }
  .v30-page .fsb-in p { color: #C7D6EC; font-size: 13.5px; font-weight: 600; line-height: 1.85; }
  .v30-page .fsb-stamp {
    align-self: flex-start; margin-top: 14px; background: #fff; color: #122B4A;
    border-radius: 14px; padding: 10px 14px;
  }
  .v30-page .fsb-stamp b { display: block; font-size: 13.5px; font-weight: 900; }
  .v30-page .fsb-stamp small { display: block; font-size: 11px; color: #7C8799; font-weight: 700; margin-top: 2px; }
  .v30-page .fs-kpis { display: grid; gap: 10px; margin-top: 16px; }
  .v30-page .fs-kpis > div { background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); border-radius: 14px; padding: 14px; text-align: center; }
  .v30-page .fs-kpis b { display: block; color: #FFA05C; font-size: 16px; font-weight: 900; }
  .v30-page .fs-kpis span { display: block; color: #9FB4D2; font-size: 12px; font-weight: 700; margin-top: 4px; }
  .v30-page .flourshow .specstrip { display: grid; gap: 0; margin-top: 8px; }
  .v30-page .flourshow .spec {
    background: transparent;
    border: 0;
    border-top: 1px solid rgba(255,255,255,.14);
    border-radius: 0;
    padding: 18px 4px;
    margin: 0;
    color: #fff;
  }
  .v30-page .flourshow .spec:first-child { border-top: 0; }
  .v30-page .flourshow .spec .ic {
    width: 42px; height: 42px; border-radius: 12px;
    background: rgba(240,127,45,.18); color: #FFA05C;
    display: grid; place-items: center; margin-bottom: 10px;
  }
  .v30-page .flourshow .spec .ic .i { width: 20px; height: 20px; }
  .v30-page .flourshow .spec b {
    display: block; font-size: 15px; color: #fff; font-weight: 900; margin-bottom: 6px;
  }
  .v30-page .flourshow .spec > span:not(.ic) {
    display: block; font-size: 13px; color: #9FB4D2; font-weight: 600; line-height: 1.85;
  }
  .v30-page .closing {
    margin: 0 -16px -48px;
    padding: 32px 20px 36px;
    background: linear-gradient(105deg, #FFA05C, #F07F2D 55%, #DD6516);
    color: #fff;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .v30-page .closing .in { position: relative; z-index: 2; }
  .v30-page .closing h2 { color: #fff; font-size: 26px; margin: 0; }
  .v30-page .closing .tag {
    margin-top: 6px; font-size: 11px; letter-spacing: .2em;
    color: rgba(255,255,255,.88); font-weight: 800;
  }
  .v30-page .closing p.k {
    margin: 10px 0 0; font-size: 13.5px; font-weight: 700;
    color: rgba(255,255,255,.96); line-height: 1.7;
  }
  .v30-page .closing .fine {
    margin: 10px 0 0; font-size: 11.5px; font-weight: 700;
    color: rgba(255,255,255,.8);
  }
  .v30-page .closing .btn,
  .v30-page .closing a.btn {
    display: flex; align-items: center; justify-content: center;
    width: 100%; max-width: 320px; margin: 16px auto 0;
    min-height: 52px; border-radius: 999px;
    background: #fff; border: 2px solid #fff;
    color: #DD6516; font-size: 15px; font-weight: 900;
    box-shadow: 0 12px 28px rgba(0,0,0,.18);
  }
}
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page nm-ip">
  <section class="section tile" id="journey">
    <div class="sec-head rv">
      <span class="chapter">{!! __('website.site.make.chapter') !!}</span>
      <span class="kick">{{ __('website.site.make.kick') }}</span>
      <h2>{!! __('website.site.make.h2') !!}</h2>
      <p>{{ __('website.site.make.sub') }}</p>
    </div>
    <div class="wide-hero rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-craft.jpg') }}?v={{ filemtime(public_path('assets/images/v30-craft.jpg')) }}" alt="{{ __('website.site.make.alt_journey') }}" onerror="this.remove()">
      <div class="wh-in">
        <span class="wh-kick">{{ __('website.site.make.banner_kick') }}</span>
        <b>{{ __('website.site.make.banner') }}</b>
      </div>
    </div>
    <div class="steps">
      @php $stepIcons = ['#i-wheat', '#i-bread', '#i-clipboard', '#i-box']; @endphp
      @foreach (__('website.site.make.steps') as $i => $step)
      <div class="tcard rv"><span class="n">{{ $step['n'] }}</span>
        <span class="ic"><svg class="i"><use href="{{ $stepIcons[$i] ?? '#i-wheat' }}"/></svg></span>
        <h4>{{ $step['title'] }}</h4>
        <p>{{ $step['body'] }}</p>
      </div>
      @endforeach
    </div>
  </section>

  <section class="flourshow" id="flour">
    <div class="fs-banner rv">
      <div class="ph"><svg><use href="#i-wheat"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-nutrition.jpg') }}?v={{ filemtime(public_path('assets/images/v30-nutrition.jpg')) }}" alt="{{ __('website.site.make.flour_alt') }}" onerror="this.remove()">
      <div class="fsb-in">
        <span class="kick">{{ __('website.site.make.flour_kick') }}</span>
        <h2>{!! __('website.site.make.flour_h2') !!}</h2>
        <p>{{ __('website.site.make.flour_p') }}</p>
        <span class="fsb-stamp"><b>{{ __('website.site.make.flour_stamp') }}</b><small>{{ __('website.site.make.flour_stamp_sub') }}</small></span>
      </div>
    </div>

    <div class="fs-kpis rv">
      @foreach (__('website.site.make.kpis') as $kpi)
      <div><b>{{ $kpi['b'] }}</b><span>{{ $kpi['s'] }}</span></div>
      @endforeach
    </div>

    <div class="specstrip rv">
      @php $specIcons = ['#i-wheat', '#i-drop', '#i-protein', '#i-leaf', '#i-shield', '#i-clock']; @endphp
      @foreach (__('website.site.make.specs') as $i => $spec)
      <div class="spec"><span class="ic"><svg class="i"><use href="{{ $specIcons[$i] ?? '#i-wheat' }}"/></svg></span>
        <b>{{ $spec['title'] }}</b><span>{{ $spec['body'] }}</span></div>
      @endforeach
    </div>
  </section>

  @include('website.partials.v30-closing')
</div>
@endsection
