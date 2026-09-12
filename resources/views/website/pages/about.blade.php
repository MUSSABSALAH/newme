@extends('website.layouts.app')

@section('title', __('website.site.about.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
.v30-page .steps .tcard h4{
  display:flex;align-items:baseline;gap:8px;margin:0 0 8px;line-height:1.3;
}
.v30-page .steps .tcard .n{
  position:static;display:inline-block;flex:none;margin:0;
  direction:ltr;unicode-bidi:isolate;letter-spacing:.04em;
}
@media (min-width: 1020px) {
  .v30-page .steps .tcard:not(:last-child)::after{
    top:50%;inset-inline-end:-16px;width:16px;
    transform:translateY(-50%);
  }
}

@media (max-width: 819.98px) {
  .v30-page { padding: 16px 16px 56px; }
  .v30-page .rv { opacity: 1 !important; transform: none !important; }
  .v30-page .sec-head { margin-bottom: 16px; text-align: center; }
  .v30-page h1, .v30-page h2 { font-size: 1.55rem; }
  .v30-page h2 em { font-style: normal; color: #DD6516; }
  .v30-page .kick { display: block; margin-bottom: 6px; }
  .v30-page .section { padding: 28px 0 32px; }
  .v30-page .split { display: grid; gap: 16px; padding: 0; }
  .v30-page .quote {
    background: #fff; border: 1px solid #E8E4DC; border-inline-end: 3px solid #F07F2D;
    border-radius: 16px; padding: 18px; margin: 0;
  }
  .v30-page .quote p { font-size: 14px; color: #12233B; font-weight: 600; line-height: 1.9; }
  .v30-page .sig { margin-top: 12px; font-size: 14px; font-weight: 900; color: #122B4A; }
  .v30-page .sig span { display: block; font-size: 11px; font-weight: 700; color: #7C8799; margin-top: 3px; }
  .v30-page .media-card {
    position: relative; height: 220px; border-radius: 18px; overflow: hidden; background: #EFEBE3;
  }
  .v30-page .media-card img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .media-card .cap {
    position: absolute; bottom: 12px; inset-inline-start: 12px; z-index: 3;
    background: rgba(18,43,74,.86); color: #fff; font-size: 11px; font-weight: 800;
    border-radius: 999px; padding: 7px 14px;
  }
  .v30-page .stats { display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 16px; padding: 0; }
  .v30-page .stat { background: #fff; border: 1px solid #E8E4DC; border-radius: 16px; padding: 16px; text-align: center; }
  .v30-page .stat .sic {
    width: 42px; height: 42px; border-radius: 12px; background: #FFF0E1; color: #DD6516;
    display: grid; place-items: center; margin: 0 auto 8px;
  }
  .v30-page .stat b { display: block; font-size: 20px; font-weight: 900; color: #122B4A; }
  .v30-page .stat span { display: block; font-size: 12px; color: #7C8799; font-weight: 700; margin-top: 4px; line-height: 1.6; }

  .v30-page .band {
    position: relative; background: #0A1628; color: #fff;
    padding: 28px 16px 32px; margin: 8px -16px 0; overflow: hidden;
  }
  .v30-page .band-bg { position: absolute; inset: 0; z-index: 0; overflow: hidden; }
  .v30-page .band-bg img,
  .v30-page .band-bg .aiimg,
  .v30-page .band-bg .aiimg.loaded {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    object-position: center 40%;
    opacity: .34 !important;
  }
  .v30-page .band-bg::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 1;
    pointer-events: none;
    background: linear-gradient(to top, rgba(10,22,40,.96) 0%, rgba(12,29,50,.88) 42%, rgba(18,43,74,.72) 100%);
  }
  .v30-page .band .inner { position: relative; z-index: 2; padding: 0; }
  .v30-page .band .kick { color: #FFA05C; }
  .v30-page .band h3 { color: #fff; font-size: 1.35rem; margin: 8px 0 10px; line-height: 1.35; }
  .v30-page .band p { color: #B9C9E2; font-size: 13.5px; font-weight: 600; line-height: 1.85; }
  .v30-page .kpis { display: grid; gap: 10px; margin-top: 16px; }
  .v30-page .kpi {
    background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12);
    border-radius: 16px; padding: 16px;
  }
  .v30-page .kfig {
    display: grid; grid-template-columns: auto auto auto;
    column-gap: 14px; row-gap: 6px; justify-content: flex-start; justify-items: center;
    align-items: center;
  }
  .v30-page .kfig i { font-style: normal; font-weight: 900; color: #fff; font-variant-numeric: tabular-nums; line-height: 1; }
  .v30-page .kfig .from { font-size: 22px; color: rgba(255,255,255,.55); }
  .v30-page .kfig .to { font-size: 28px; color: #fff; }
  .v30-page .kfig .arrow {
    color: #FFA05C; font-size: 18px; line-height: 1; opacity: 1; transform: none;
    align-self: center; justify-self: center; margin: 0;
    display: grid; place-items: center;
  }
  .v30-page .kfig small { font-size: 10px; font-weight: 800; letter-spacing: .04em; color: #8FA4C4; white-space: nowrap; }
  .v30-page .klabel { display: block; font-size: 12.5px; color: #9FB4D2; font-weight: 700; margin-top: 10px; line-height: 1.7; }
  .v30-page .rule { margin: 18px 0 0; padding: 0; }
  .v30-page .rule i { display: block; height: 1px; background: #E8E4DC; }

  .v30-page .hubtabs {
    display: flex; gap: 8px; overflow-x: auto; flex-wrap: nowrap; margin: 0 0 16px; padding: 0 0 4px;
    -webkit-overflow-scrolling: touch; scrollbar-width: none;
  }
  .v30-page .hubtabs::-webkit-scrollbar { display: none; }
  .v30-page .hubtabs .tab {
    flex: none; border: 1.5px solid #E8E4DC !important; background: #fff !important; color: #122B4A !important;
    border-radius: 999px; padding: 9px 16px; font-weight: 800; font-size: 13px; min-height: 40px;
  }
  .v30-page .hubtabs .tab.on {
    background: #122B4A !important; color: #fff !important; border-color: #122B4A !important;
  }
  .v30-page .hubpanel { display: none; }
  .v30-page .hubpanel.on { display: block; }
  .v30-page .about-lead { font-size: 14px; font-weight: 600; color: #43536A; line-height: 1.85; margin: 0 0 14px; padding: 0; text-align: start; }
  .v30-page .steps, .v30-page .grid, .v30-page .edge-grid, .v30-page .diptych, .v30-page .goalstrip {
    display: grid; gap: 12px; padding: 0; margin: 0;
  }
  .v30-page .tcard, .v30-page .ecard, .v30-page .gitem {
    background: #fff; border: 1px solid #E8E4DC; border-radius: 16px; padding: 16px; position: relative;
  }
  .v30-page .tcard .n { position: static; display: inline-block; font-size: 11px; font-weight: 800; color: #DD6516; letter-spacing: .04em; margin: 0; }
  .v30-page .tcard .ic {
    width: 42px; height: 42px; border-radius: 12px; background: #FFF0E1; color: #DD6516;
    display: grid; place-items: center; margin-bottom: 10px;
  }
  .v30-page .tcard h4 { font-size: 15px; margin: 0 0 6px; }
  .v30-page .tcard p { font-size: 13px; color: #7C8799; font-weight: 600; line-height: 1.8; }

  .v30-page .edge { padding: 0; }
  .v30-page .edge-hero {
    display: grid; gap: 0; background: #fff; border: 1px solid #E8E4DC; border-radius: 18px; overflow: hidden;
  }
  .v30-page .eh-media { position: relative; height: 180px; background: #EFEBE3; }
  .v30-page .eh-media img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .eh-stamp {
    position: absolute; top: 12px; inset-inline-start: 12px; z-index: 3;
    background: linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516); color: #fff;
    border-radius: 14px; padding: 8px 12px; text-align: center;
  }
  .v30-page .eh-stamp b { display: block; font-size: 16px; font-weight: 900; line-height: 1; }
  .v30-page .eh-stamp small { display: block; font-size: 10px; font-weight: 800; margin-top: 3px; }
  .v30-page .eh-copy { padding: 16px; }
  .v30-page .eh-kick { display: block; font-size: 11px; font-weight: 800; color: #DD6516; margin-bottom: 6px; }
  .v30-page .eh-copy h3 { font-size: 1.15rem; margin: 0 0 8px; }
  .v30-page .eh-copy p { font-size: 13.5px; color: #43536A; font-weight: 600; line-height: 1.8; }
  .v30-page .eh-chips { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 12px; }
  .v30-page .eh-chips span { font-size: 11px; font-weight: 800; color: #122B4A; background: #F0EDE6; border-radius: 999px; padding: 6px 12px; }
  .v30-page .ecard { display: grid; gap: 0; padding: 0; overflow: hidden; }
  .v30-page .ecard .ghost { display: none; }
  .v30-page .ethumb { position: relative; aspect-ratio: 16/9; background: #EFEBE3; overflow: hidden; }
  .v30-page .ethumb img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .ethumb-n {
    position: absolute; top: 10px; inset-inline-start: 10px; z-index: 3;
    font-size: 11px; font-weight: 900; color: #fff; background: rgba(18,43,74,.82);
    border-radius: 999px; padding: 4px 10px;
  }
  .v30-page .ebody { padding: 14px 16px 16px; }
  .v30-page .ecard h4 { font-size: 15px; margin: 0 0 6px; }
  .v30-page .ecard p { font-size: 13px; color: #7C8799; font-weight: 600; line-height: 1.8; }

  .v30-page .dpanel {
    position: relative; min-height: 240px; border-radius: 18px; overflow: hidden;
    display: flex; align-items: flex-end;
  }
  .v30-page .dpanel.photo { background: #1B3A61; }
  .v30-page .dpanel.photo img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 1 !important; visibility: visible !important;
  }
  .v30-page .dpanel.photo::after {
    content: ""; position: absolute; inset: 0; z-index: 2;
    background: linear-gradient(to top, rgba(10,22,40,.92), rgba(10,22,40,.25) 60%, transparent);
  }
  .v30-page .dpanel.navy { background: linear-gradient(150deg,#1B3A61,#122B4A); min-height: 0; }
  .v30-page .dp-in { position: relative; z-index: 3; padding: 18px 16px; width: 100%; }
  .v30-page .dp-kick { display: block; font-size: 11px; font-weight: 800; color: #FFA05C; margin-bottom: 8px; }
  .v30-page .dpanel p { font-size: 14px; color: #fff; font-weight: 600; line-height: 1.85; }
  .v30-page .gitem b { display: block; font-size: 22px; font-weight: 900; color: #DD6516; margin-bottom: 8px; }
  .v30-page .gitem span { display: block; font-size: 13px; color: #43536A; font-weight: 600; line-height: 1.8; }
}
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page nm-ip">
  <section class="section alt" id="about">
    <div class="sec-head rv">
      <span class="kick">{{ __('website.site.about.story_kick') }}</span>
      <h2>{!! __('website.site.about.story_h2') !!}</h2>
    </div>
    <div class="split">
      <div class="copy rv">
        <div class="quote">
          <p>{{ __('website.site.about.quote') }}</p>
          <p class="sig">{{ __('website.site.about.quote_by') }}<span>{{ __('website.site.about.quote_cred') }}</span></p>
        </div>
      </div>
      <div class="media-card rv">
        <div class="ph"><svg><use href="#i-wheat"/></svg></div>
        <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-about-team.png') }}?v={{ filemtime(public_path('assets/images/v30-about-team.png')) }}" alt="{{ __('website.site.about.alt_team') }}" onerror="this.remove()">
        <span class="cap">{{ __('website.site.about.cap') }}</span>
      </div>
    </div>
    <div class="stats">
      @php $statIcons = ['#i-calendar', '#i-flask', '#i-layers']; @endphp
      @foreach (__('website.site.about.stats') as $i => $stat)
      <div class="stat rv"><span class="sic"><svg class="i"><use href="{{ $statIcons[$i] ?? '#i-calendar' }}"/></svg></span>
        <b>{{ $stat['b'] }}</b><span>{{ $stat['s'] }}</span></div>
      @endforeach
    </div>
  </section>

  <section class="band" id="vision" style="margin-top:0">
    <div class="band-bg">
      <img class="aiimg" loading="lazy" decoding="async" width="2400" height="1000"
           src="{{ asset('assets/images/v30-vision.jpg') }}"
           alt="{{ __('website.site.about.alt_vision') }}">
    </div>
    <div class="inner">
      <span class="kick">{{ __('website.site.about.vision_kick') }}</span>
      <h3>{{ __('website.site.about.vision_h3') }}</h3>
      <p>{{ __('website.site.about.vision_p') }}</p>
      <p class="kpi-intro" style="margin-top:18px;font-weight:800">{{ __('website.site.about.kpi_intro') }}</p>
      <div class="kpis">
        <div class="kpi rv">
          <div class="kfig">
            <i class="from">510</i>
            <i class="arrow">←</i>
            <i class="to" data-from="510" data-to="324">324</i>
            <small>{{ __('website.site.about.kpi_from') }}</small>
            <small></small>
            <small>{{ __('website.site.about.kpi_to') }}</small>
          </div>
          <span class="klabel">{{ __('website.site.about.kpi1') }}</span></div>
        <div class="kpi rv">
          <div class="kfig">
            <i class="from">74</i>
            <i class="arrow">←</i>
            <i class="to" data-from="74" data-to="80">80</i>
            <small>{{ __('website.site.about.kpi_from') }}</small>
            <small></small>
            <small>{{ __('website.site.about.kpi_to') }}</small>
          </div>
          <span class="klabel">{{ __('website.site.about.kpi2') }}</span></div>
      </div>
    </div>
  </section>
  <div class="rule"><i></i></div>

  <section class="section alt" id="company">
    <div class="sec-head rv">
      <span class="kick">{{ __('website.site.about.company_kick') }}</span>
      <h2>{!! __('website.site.about.company_h2') !!}</h2>
    </div>

    <div class="hubtabs" id="hubtabs">
      <button class="tab on" data-t="t1">{{ __('website.site.about.tabs.t1') }}</button>
      <button class="tab" data-t="t2">{{ __('website.site.about.tabs.t2') }}</button>
      <button class="tab" data-t="t3">{{ __('website.site.about.tabs.t3') }}</button>
      <button class="tab" data-t="t4">{{ __('website.site.about.tabs.t4') }}</button>
    </div>

    <div class="hubpanel on" id="t1">
      <p class="about-lead rv">{{ __('website.site.about.lead') }}</p>
      <div class="steps">
        @foreach (__('website.site.about.stages') as $stage)
        <div class="tcard rv">
          <h4><span class="n">{{ $stage['n'] }}</span>{{ $stage['title'] }}</h4>
          <p>{{ $stage['body'] }}</p>
        </div>
        @endforeach
      </div>
    </div>

    <div class="hubpanel" id="t2">
      <div class="edge">
        <article class="edge-hero rv">
          <div class="eh-media">
            <div class="ph"><svg><use href="#i-wheat"/></svg></div>
            <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-about-flour.jpg') }}?v={{ filemtime(public_path('assets/images/v30-about-flour.jpg')) }}" alt="{{ __('website.site.about.edge1_kick') }}" onerror="this.remove()">
            <span class="eh-stamp"><b>01</b><small>{{ __('website.site.about.tabs.t2') }}</small></span>
          </div>
          <div class="eh-copy">
            <span class="eh-kick">{{ __('website.site.about.edge1_kick') }}</span>
            <h3>{{ __('website.site.about.edge1_h3') }}</h3>
            <p>{{ __('website.site.about.edge1_p') }}</p>
            <div class="eh-chips">@foreach (__('website.site.about.edge1_chips') as $chip)<span>{{ $chip }}</span>@endforeach</div>
          </div>
        </article>

        <div class="edge-grid">
          @php
            $edgeImgs = [
              'v30-value-review.jpg',
              'v30-value-health.jpg',
              'v30-value-system.png',
              'v30-value-ip.png',
            ];
            $edgeIcons = ['#i-clipboard', '#i-target', '#i-layers', '#i-shield'];
          @endphp
          @foreach (__('website.site.about.edges') as $i => $edge)
          <article class="ecard rv"><span class="ghost">{{ $edge['n'] }}</span>
            <div class="ethumb">
              <div class="ph"><svg><use href="{{ $edgeIcons[$i] ?? '#i-clipboard' }}"/></svg></div>
              <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/'.$edgeImgs[$i]) }}?v={{ filemtime(public_path('assets/images/'.$edgeImgs[$i])) }}" alt="{{ $edge['title'] }}" onerror="this.remove()">
              <span class="ethumb-n">{{ $edge['n'] }}</span>
            </div>
            <div class="ebody">
            <h4>{{ $edge['title'] }}</h4>
            <p>{{ $edge['body'] }}</p></div></article>
          @endforeach
        </div>
      </div>
    </div>

    <div class="hubpanel" id="t3">
      <div class="grid g3">
        @php $valueIcons = ['#i-check', '#i-shield', '#i-bolt', '#i-leaf', '#i-clipboard']; @endphp
        @foreach (__('website.site.about.values') as $i => $value)
        <div class="tcard rv"><span class="ic"><svg class="i"><use href="{{ $valueIcons[$i] ?? '#i-check' }}"/></svg></span>
          <h4>{{ $value['title'] }}</h4><p>{{ $value['body'] }}</p></div>
        @endforeach
      </div>
    </div>

    <div class="hubpanel" id="t4">
      <div class="diptych">
        <article class="dpanel photo rv">
          <div class="ph"><svg><use href="#i-target"/></svg></div>
          <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-expert.jpg') }}" alt="{{ __('website.site.about.alt_expert') }}" onerror="this.remove()">
          <div class="dp-in">
            <span class="dp-kick">{{ __('website.site.about.vision_label') }}</span>
            <p>{{ __('website.site.about.vision_text') }}</p>
          </div>
        </article>
        <article class="dpanel photo rv">
          <div class="ph"><svg><use href="#i-box"/></svg></div>
          <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-mission.jpg') }}" alt="{{ __('website.site.about.alt_mission') }}" onerror="this.remove()">
          <div class="dp-in">
            <span class="dp-kick">{{ __('website.site.about.mission_label') }}</span>
            <p>{{ __('website.site.about.mission_text') }}</p>
          </div>
        </article>
      </div>
      <div class="goalstrip">
        @foreach (__('website.site.about.goals') as $i => $goal)
        <div class="gitem rv"><b>{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</b><span>{{ $goal }}</span></div>
        @endforeach
      </div>
    </div>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@endsection
