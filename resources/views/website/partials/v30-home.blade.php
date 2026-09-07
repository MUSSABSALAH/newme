<header class="hero">
  <div class="hero-copy">
    <span class="hero-pill">{{ __('website.site.hero.pill') }}</span>
    <h1>{!! __('website.site.hero.h1') !!}</h1>
    <p class="lead">{{ __('website.site.hero.lead') }}</p>
    <div class="hero-ctas">
      <a href="{{ route('website.subscribe') }}" class="btn">{{ __('website.site.hero.cta_plan') }}</a>
      <a href="{{ route('website.store') }}" class="btn inv">{{ __('website.site.hero.cta_store') }}</a>
    </div>
    <div class="hero-note"><svg class="i"><use href="#i-clipboard"/></svg> {{ __('website.site.hero.trust') }}</div>
  </div>
  <div class="hero-media">
    <div class="ph"><svg><use href="#i-bread"/></svg></div>
    <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-home-hero.jpg') }}" alt="{{ __('website.site.hero.alt') }}">
  </div>
</header>

<div class="usp-strip">
  <div class="usp-grid">
    @foreach (__('website.site.usp') as $i => $usp)
      @php
        $icons = ['#i-wheat', '#i-clipboard', '#i-shield', '#i-clock'];
      @endphp
      <div class="usp"><span class="ic"><svg class="i"><use href="{{ $icons[$i] ?? '#i-wheat' }}"/></svg></span><b>{{ $usp['title'] }}</b><small>{{ $usp['sub'] }}</small></div>
    @endforeach
  </div>
</div>

<section class="section" id="why">
  <div class="sec-head rv">
    <span class="chapter">{!! __('website.site.why.chapter') !!}</span>
    <span class="kick">{{ __('website.site.why.kick') }}</span>
    <h2>{!! __('website.site.why.title') !!}</h2>
  </div>
  <div class="split">
    <div class="copy rv">
      <p class="lead-p"><b>{{ __('website.site.why.how') }}</b></p>
      <p class="lead-p" style="margin-top:14px">{{ __('website.site.why.p1') }}</p>
      <div class="pillars">
        @php $pillarIcons = ['#i-target', '#i-box', '#i-shield']; @endphp
        @foreach (__('website.site.why.pillars') as $i => $pillar)
          <div class="pillar">
            <span class="ic"><svg class="i"><use href="{{ $pillarIcons[$i] ?? '#i-target' }}"/></svg></span>
            <div><b>{{ $pillar['title'] }}</b><span>{{ $pillar['body'] }}</span></div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="media-card rv">
      <div class="ph"><svg><use href="#i-wheat"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-why-seeds.jpg') }}" alt="{{ __('website.site.why.alt') }}" onerror="this.remove()">
      <span class="cap">{{ __('website.site.why.cap') }}</span>
      <span class="chips-on-photo">@foreach (__('website.site.why.chips') as $chip)<span>{{ $chip }}</span>@endforeach</span>
    </div>
  </div>
</section>
