<header class="hero">
  <div class="hero-copy">
    <span class="hero-pill">{{ $cms->text('homepage', 'hero_pill') }}</span>
    <h1>{!! $cms->html('homepage', 'hero_h1') !!}</h1>
    <p class="lead">{{ $cms->text('homepage', 'hero_lead') }}</p>
    <div class="hero-ctas">
      <a href="{{ route('website.subscribe') }}" class="btn">{{ $cms->text('homepage', 'hero_cta_plan') }}</a>
      <a href="{{ route('website.store') }}" class="btn inv">{{ $cms->text('homepage', 'hero_cta_store') }}</a>
    </div>
    <div class="hero-note"><svg class="i"><use href="#i-clipboard"/></svg> {{ $cms->text('homepage', 'hero_trust') }}</div>
  </div>
  <div class="hero-media">
    <div class="ph"><svg><use href="#i-bread"/></svg></div>
    <img class="aiimg" loading="lazy" decoding="async" src="{{ $cms->image('homepage', 'hero_image') }}" alt="{{ $cms->text('homepage', 'hero_alt') }}">
  </div>
</header>

<div class="usp-strip">
  <div class="usp-grid">
    @foreach ($cms->group('homepage', 'usp', 4, ['title', 'sub']) as $i => $usp)
      @php
        $icons = ['#i-wheat', '#i-clipboard', '#i-shield', '#i-clock'];
      @endphp
      <div class="usp"><span class="ic"><svg class="i"><use href="{{ $icons[$i] ?? '#i-wheat' }}"/></svg></span><b>{{ $usp['title'] }}</b><small>{{ $usp['sub'] }}</small></div>
    @endforeach
  </div>
</div>

<section class="section" id="why">
  <div class="sec-head rv">
    <span class="kick">{{ $cms->text('homepage', 'why_kick') }}</span>
    <h2>{!! $cms->html('homepage', 'why_title') !!}</h2>
  </div>
  <div class="split">
    <div class="copy rv">
      <p class="lead-p"><b>{{ $cms->text('homepage', 'why_how') }}</b></p>
      <p class="lead-p" style="margin-top:14px">{{ $cms->text('homepage', 'why_p1') }}</p>
      <div class="pillars">
        @php $pillarIcons = ['#i-target', '#i-box', '#i-shield']; @endphp
        @foreach ($cms->group('homepage', 'why_pillar', 3, ['title', 'body']) as $i => $pillar)
          <div class="pillar">
            <span class="ic"><svg class="i"><use href="{{ $pillarIcons[$i] ?? '#i-target' }}"/></svg></span>
            <div><b>{{ $pillar['title'] }}</b><span>{{ $pillar['body'] }}</span></div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="media-card rv">
      <div class="ph"><svg><use href="#i-wheat"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ $cms->image('homepage', 'why_image') }}" alt="{{ $cms->text('homepage', 'why_alt') }}" onerror="this.remove()">
      <span class="cap">{{ $cms->text('homepage', 'why_cap') }}</span>
      <span class="chips-on-photo">@foreach ($cms->items('homepage', 'why_chips') as $chip)<span>{{ $chip }}</span>@endforeach</span>
    </div>
  </div>
</section>
