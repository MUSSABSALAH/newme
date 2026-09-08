@php
  $products = $shopProducts ?? $products ?? [];
  $preview = $preview ?? true;
  $flagIcons = [
    'bestseller' => ['icon' => '#i-bolt', 'style' => ''],
    'sale' => ['icon' => '#i-leaf', 'style' => 'color:var(--green)'],
    'occasions' => ['icon' => '#i-bolt', 'style' => ''],
  ];
  $storeFlags = [
    'sale' => __('website.store.flag_sale'),
    'bestseller' => __('website.store.flag_bestseller'),
    'occasions' => __('website.store.flag_occasions'),
  ];
  $showShopTabs = ! $preview;
  $catMeta = [];
  if ($showShopTabs) {
    foreach ($products as $p) {
      $cat = $p['cat'] ?? 'other';
      if (! isset($catMeta[$cat])) {
        $catMeta[$cat] = ['label' => $p['cat_label'] ?? $cat, 'count' => 0];
      }
      $catMeta[$cat]['count']++;
    }
  }
  $total = count($products);
@endphp

<section class="section tile" id="lines">
  <div class="sec-head rv">
    <span class="chapter">{!! __('website.site.lines.chapter') !!}</span>
    <span class="kick">{{ __('website.site.lines.kick') }}</span>
    <h2>{!! __('website.site.lines.title') !!}</h2>
  </div>
  <div class="lines-rail" id="linesRail">
    @php
      $lineIcons = ['#i-bread', '#i-cookie', '#i-box'];
      $lineImgs = ['v30-line-bakery.jpg', 'v30-line-support.jpg', 'v30-line-subs.jpg'];
    @endphp
    @foreach (__('website.site.lines.items') as $i => $line)
    <article class="lcard rv">
      <div class="media"><span class="n">{{ $line['n'] }}</span>
        <div class="ph"><svg><use href="{{ $lineIcons[$i] ?? '#i-bread' }}"/></svg></div>
        <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/'.$lineImgs[$i]) }}?v={{ filemtime(public_path('assets/images/'.$lineImgs[$i])) }}" alt="{{ $line['alt'] }}" onerror="this.remove()"></div>
      <div class="bd">
        <h4>{{ $line['title'] }}</h4>
        <p>{{ $line['body'] }}</p>
        <div class="tags">@foreach ($line['tags'] as $tag)<span>{{ $tag }}</span>@endforeach</div>
      </div>
    </article>
    @endforeach
  </div>
  <p class="lines-hint">{{ __('website.site.lines.hint') }}</p>
</section>

<section class="section" id="shop">
  <div class="sec-head rv">
    <span class="kick">{{ __('website.site.shop.kick') }}</span>
    <h2>{!! __('website.site.shop.title') !!}</h2>
    <p>{{ __('website.site.shop.sub') }}</p>
    <p>{{ __('website.site.shop.know') }}</p>
  </div>

  @if (count($products) > 0)
  @if ($showShopTabs || $preview)
  <div class="shop-bar{{ $showShopTabs ? '' : ' shop-bar--end' }}">
    @if ($showShopTabs)
    <div class="tabs" id="v30Tabs">
      <button class="tab on" data-cat="all">{{ __('website.site.shop.all') }} <i>{{ $total }}</i></button>
      @foreach ($catMeta as $slug => $meta)
        <button class="tab" data-cat="{{ $slug }}">{{ $meta['label'] }} <i>{{ $meta['count'] }}</i></button>
      @endforeach
    </div>
    @endif
    @if ($preview)
    <div class="rail-ctrl">
      <button class="rail-btn" id="v30Prev" aria-label="{{ __('website.site.shop.prev') }}"><svg viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></button>
      <button class="rail-btn" id="v30Next" aria-label="{{ __('website.site.shop.next') }}"><svg viewBox="0 0 24 24"><path d="M15 5l-7 7 7 7"/></svg></button>
    </div>
    @endif
  </div>
  @endif

  <div class="rail-outer{{ $preview ? '' : ' shop-grid' }}">
    <div class="rail" id="v30Rail" tabindex="0" role="region" aria-label="{{ __('website.site.shop.aria') }}">
      @foreach ($products as $p)
        @php
          $href = $p['url'] ?? $p['href'] ?? '#';
          $cat = $p['cat'] ?? 'other';
          $flagKey = is_string($p['flag'] ?? null) && isset($storeFlags[$p['flag']]) ? $p['flag'] : null;
          $flagLabel = $p['flag'] ?? ($flagKey ? $storeFlags[$flagKey] : null);
          $flagIcon = $p['flag_icon'] ?? ($flagKey ? ($flagIcons[$flagKey]['icon'] ?? null) : null);
          $flagStyle = $p['flag_style'] ?? ($flagKey ? ($flagIcons[$flagKey]['style'] ?? '') : '');
          $proteinRaw = $p['protein'] ?? null;
          $kcalRaw = $p['kcal'] ?? null;
          $protein = $proteinRaw;
          $kcal = $kcalRaw;
          if ($protein !== null && $protein !== '' && is_numeric($protein)) {
            $protein = __('website.main.shop.protein', ['value' => $protein]);
          }
          if ($kcal !== null && $kcal !== '' && is_numeric($kcal)) {
            $kcal = __('website.main.shop.kcal', ['value' => $kcal]);
          }
          $kcalN = is_numeric($kcalRaw) ? (int) $kcalRaw : null;
          $proteinN = ($proteinRaw !== null && $proteinRaw !== '' && is_numeric($proteinRaw)) ? $proteinRaw : null;
          $fatN = ($p['fat'] ?? '') !== '' && is_numeric($p['fat']) ? $p['fat'] : null;
          $carbsN = ($p['carbs'] ?? '') !== '' && is_numeric($p['carbs']) ? $p['carbs'] : null;
          $hasNut = $kcalN !== null || $proteinN !== null || $fatN !== null || $carbsN !== null;
          $serving = $p['serving'] ?? '';
        @endphp
        <article class="prod rv" data-cat="{{ $cat }}">
          <div class="prod-tile">
            @if ($flagLabel)
              <span class="p-flag">
                @if ($flagIcon)
                  <svg class="i" @if($flagStyle) style="{{ $flagStyle }}" @endif><use href="{{ $flagIcon }}"/></svg>
                @endif
                {{ $flagLabel }}
              </span>
            @endif
            <a class="prod-shot" href="{{ $href }}" aria-label="{{ $p['name'] }}">
              <div class="ph"><svg><use href="#i-bread"/></svg></div>
              @if (!empty($p['image_url']))
                <img class="aiimg" loading="lazy" decoding="async" src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">
              @endif
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
              @endif
            </a>
            @if ($hasNut)
              <button type="button" class="nut-toggle" aria-label="{{ __('website.store.nutrition_aria') }}">i</button>
            @endif
          </div>
          <h3><a href="{{ $href }}">{{ $p['name'] }}</a></h3>
          @if (!empty($p['sub']))
            <p class="p-sub">{{ $p['sub'] }}</p>
          @endif
          @if ($protein || $kcal)
            <div class="p-specs">
              @if ($protein)
                <div class="p-spec"><svg class="i"><use href="#i-protein"/></svg> {{ $protein }}</div>
              @endif
              @if ($kcal)
                <div class="p-spec"><span class="kcal-box">kcal</span> {{ $kcal }}</div>
              @endif
            </div>
          @endif
          <div class="p-price">{{ $p['price'] !== '' && $p['price'] !== null ? $p['price'] : '0' }} <x-ui.sar /> <small>/ {{ $p['unit'] ?? 'عبوة' }}</small></div>
          <a href="{{ $href }}" class="p-view">{{ __('website.store.view_product') }}</a>
        </article>
      @endforeach
    </div>
    @if ($preview)
    <div class="railbar"><i id="v30Railbar"></i></div>
    <p class="rail-hint">{{ __('website.site.shop.rail_hint') }}</p>
    @endif
  </div>
  @if ($preview)
    <div class="shop-cta"><a href="{{ route('website.store') }}" class="btn inv">{{ __('website.site.shop.all_products') }}</a></div>
  @endif
  @endif
</section>

<section class="section alt" id="nutrition">
  <div class="sec-head rv">
    <span class="kick">{{ __('website.site.nutrition.kick') }}</span>
    <h2>{!! __('website.site.nutrition.title') !!}</h2>
    <p>{{ __('website.site.nutrition.sub') }}</p>
  </div>
  <div class="split">
    <div class="media-card rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-flour.jpg') }}?v={{ filemtime(public_path('assets/images/v30-flour.jpg')) }}" alt="{{ __('website.main.nutrition.alt') }}" onerror="this.remove()">
      <span class="cap">{{ __('website.main.nutrition.cap') }}</span>
    </div>
    @php
      $n = 'website.main.nutrition';
      $g = __($n.'.g');
      $mg = __($n.'.mg');
      $mcg = __($n.'.mcg');
    @endphp
    <div class="spec-card rv">
      <h3>{{ __($n.'.card_title') }}</h3>
      <div class="sub">{{ __($n.'.card_sub') }}</div>
      <div class="spec-head"><span>{{ __($n.'.col_nutrient') }}</span><span>{{ __($n.'.col_amount') }}</span><span>{{ __($n.'.col_dv') }}</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.servings') }}</span><span class="v">{{ __($n.'.servings_v') }}</span><span class="dv">—</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.calories') }}</span><span class="v"><em>119</em></span><span class="dv">—</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.net_carbs') }}</span><span class="v">5 {{ $g }}</span><span class="dv">—</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.total_fat') }}</span><span class="v">4 {{ $g }}</span><span class="dv">5%</span></div>
      <div class="spec-row"><span class="n sub2">{{ __($n.'.sat_fat') }}</span><span class="v">0.5 {{ $g }}</span><span class="dv">3%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.cholesterol') }}</span><span class="v">0 {{ $mg }}</span><span class="dv">0%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.sodium') }}</span><span class="v">7 {{ $mg }}</span><span class="dv">0%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.total_carbs') }}</span><span class="v">7.7 {{ $g }}</span><span class="dv">3%</span></div>
      <div class="spec-row"><span class="n sub2">{{ __($n.'.fiber') }}</span><span class="v">2.7 {{ $g }}</span><span class="dv">10%</span></div>
      <div class="spec-row"><span class="n sub2">{{ __($n.'.sugars') }}</span><span class="v">0.1 {{ $g }}</span><span class="dv">—</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.protein') }}</span><span class="v"><em>12.1</em> {{ $g }}</span><span class="dv">—</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.vitamin_d') }}</span><span class="v">0 {{ $mcg }}</span><span class="dv">0%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.calcium') }}</span><span class="v">15 {{ $mg }}</span><span class="dv">1%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.iron') }}</span><span class="v">3 {{ $mg }}</span><span class="dv">18%</span></div>
      <div class="spec-row"><span class="n">{{ __($n.'.potassium') }}</span><span class="v">152 {{ $mg }}</span><span class="dv">3%</span></div>
      <div class="spec-note">{{ __($n.'.note') }}</div>
    </div>
  </div>
</section>
<div class="rule"><i></i></div>
