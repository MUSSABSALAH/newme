{{-- Mobile homepage from the iPhone design. Desktop stays in .home-desktop. --}}
@php
  $shopProducts = collect($shopProducts ?? [])->take(4);
  $isAr = app()->getLocale() === 'ar';
@endphp

<style>
.home-mobile{display:none}
@media(max-width:819.98px){
  .home-desktop{display:none!important}
  .home-mobile{display:block}
}
</style>

<div class="home-mobile nm-ip" id="nmMobileHome">
  <div class="hero">
    <div class="ph"><svg><use href="#i-bread"/></svg></div>
    <img src="{{ asset('assets/images/v30-home-hero.jpg') }}" alt="{{ __('website.main.hero.alt') }}" onerror="this.remove()">
    <div class="hero-in">
      <span class="pill">{{ __('website.site.hero.pill') }}</span>
      <h1>{!! __('website.site.hero.h1') !!}</h1>
      <p>{{ __('website.site.hero.lead') }}</p>
      <div class="stack">
        <a class="btn" href="{{ route('website.subscribe') }}">{{ __('website.site.hero.cta_plan') }}</a>
        <a class="btn ghost" href="{{ route('website.store') }}">{{ __('website.site.hero.cta_store') }}</a>
      </div>
    </div>
  </div>

  <div class="trust">{{ __('website.site.partners') }}</div>

  <div class="uspbar">
    @foreach (__('website.site.usp') as $i => $usp)
      @php $icons = ['#i-wheat', '#i-clipboard', '#i-shield', '#i-clock']; @endphp
      <div class="usp"><span class="ic"><svg class="i"><use href="{{ $icons[$i] ?? '#i-wheat' }}"/></svg></span>
        <b>{{ $usp['title'] }}</b><small>{{ $usp['sub'] }}</small></div>
    @endforeach
  </div>

  <div class="sec wrap">
    <span class="kick">{{ __('website.site.why.kick') }}</span>
    <h2>{!! __('website.site.why.title') !!}</h2>
    <p class="lead">{{ __('website.site.why.p1') }}</p>
    <div class="pill-list">
      @php $pillarIcons = ['#i-target', '#i-box', '#i-shield']; @endphp
      @foreach (__('website.site.why.pillars') as $i => $pillar)
      <div class="pl"><span class="ic"><svg class="i"><use href="{{ $pillarIcons[$i] ?? '#i-target' }}"/></svg></span>
        <div><b>{{ $pillar['title'] }}</b><span>{{ $pillar['body'] }}</span></div></div>
      @endforeach
    </div>
  </div>

  <div class="photoblock">
    <div class="ph"><svg><use href="#i-wheat"/></svg></div>
    <img src="{{ asset('assets/images/v30-why-seeds.jpg') }}" alt="" onerror="this.remove()">
    <span class="cap">{{ __('website.site.why.cap') }}</span>
  </div>

  @if (count($shopProducts) > 0)
  <div class="sec wrap" style="padding-bottom:0">
    <span class="kick">{{ __('website.site.shop.kick') }}</span>
    <h2>{!! __('website.site.shop.title') !!}</h2>
    <p class="lead">{{ __('website.site.shop.sub') }}</p>
  </div>
  <div class="rail" id="nmHomeRail">
    @foreach ($shopProducts as $p)
      @php
        $kcalN = isset($p['kcal']) && $p['kcal'] !== '' && is_numeric($p['kcal']) ? (int) $p['kcal'] : null;
        $proteinN = isset($p['protein']) && $p['protein'] !== '' && is_numeric($p['protein']) ? $p['protein'] : null;
        $fatN = isset($p['fat']) && $p['fat'] !== '' && is_numeric($p['fat']) ? $p['fat'] : null;
        $carbsN = isset($p['carbs']) && $p['carbs'] !== '' && is_numeric($p['carbs']) ? $p['carbs'] : null;
        $hasNut = $kcalN !== null || $proteinN !== null || $fatN !== null || $carbsN !== null;
        $serving = $p['serving'] ?? '';
        $href = $p['url'] ?? $p['href'] ?? '#';
      @endphp
      <article class="card" @if(!empty($p['cat'])) data-cat="{{ $p['cat'] }}" @endif>
        <div class="media">
          @if (!empty($p['flag']))<span class="flag">{{ $p['flag'] }}</span>@endif
          <div class="ph"><svg><use href="#i-bread"/></svg></div>
          <a class="shot" href="{{ $href }}" aria-label="{{ $p['name'] }}">
            @if (!empty($p['image_url']))<img src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">@endif
          </a>
          @if ($hasNut)
            <span class="nutov" aria-hidden="true">
              <span class="nv-h">{!! __('website.store.nutrition_heading', ['serving' => $serving]) !!}</span>
              @if ($kcalN !== null)
                <span class="nv-r"><span>{{ __('website.store.calories') }}</span><b>{{ $kcalN }} <small>kcal</small></b></span>
              @endif
              @if ($proteinN !== null)
                <span class="nv-r"><span>{{ __('website.store.protein') }}</span><b>{{ $proteinN }} <small>{{ __('website.store.gram') }}</small></b></span>
              @endif
              @if ($fatN !== null)
                <span class="nv-r"><span>{{ __('website.store.fat') }}</span><b>{{ $fatN }} <small>{{ __('website.store.gram') }}</small></b></span>
              @endif
              @if ($carbsN !== null)
                <span class="nv-r"><span>{{ __('website.store.carbs') }}</span><b>{{ $carbsN }} <small>{{ __('website.store.gram') }}</small></b></span>
              @endif
              <span class="nv-note{{ ($p['note'] ?? '') === 'real' ? ' real' : '' }}">{{ ($p['note'] ?? '') === 'real' ? __('website.store.note_real') : __('website.store.note_est') }}</span>
            </span>
            <button type="button" class="nut-toggle" aria-label="{{ __('website.store.nutrition_aria') }}">i</button>
          @endif
        </div>
        <div class="bd">
          <h3><a href="{{ $href }}">{{ $p['name'] }}</a></h3>
          @if (!empty($p['sub']))
            <p class="p-sub">{{ $p['sub'] }}</p>
          @endif
          <p class="pr">{{ $p['price'] }} <x-ui.sar /></p>
        </div>
      </article>
    @endforeach
  </div>
  <div class="wrap shop-more">
    <a class="btn inv" href="{{ route('website.store') }}">{{ __('website.site.hero.cta_store') }}</a>
  </div>
  @endif

  @include('website.partials.mobile-apps')

  <div class="trust">{{ $isAr ? 'توصيل مبرَّد داخل الرياض · دايت سنتر بالشرقية وجدة · جاهز · هنقرستيشن · كيتا · ذا شيفز · نينجا' : 'Chilled delivery in Riyadh · Diet Center · Jahez · HungerStation · Keeta · The Chefz · Ninja' }}</div>

  <div class="closing">
    <h2>{{ __('website.site.closing.h2') }}</h2>
    <p class="tag">{{ __('website.site.closing.tag') }}</p>
    <p>{{ __('website.site.closing.k') }}</p>
    <a class="btn" href="{{ route('website.subscribe') }}">{{ __('website.site.closing.btn') }}</a>
  </div>

</div>

<script>
(function(){
  var rail = document.getElementById('nmHomeRail');
  if (!rail) return;
  rail.querySelectorAll('.nut-toggle').forEach(function(b){
    b.addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      var card = b.closest('.card');
      if (!card) return;
      var was = card.classList.contains('showN');
      rail.querySelectorAll('.card.showN').forEach(function(c){ c.classList.remove('showN'); });
      if (!was) card.classList.add('showN');
    });
  });
})();
</script>

