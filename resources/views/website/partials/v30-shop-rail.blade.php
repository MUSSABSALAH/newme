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
  $catMeta = [];
  foreach ($products as $p) {
    $cat = $p['cat'] ?? 'other';
    if (! isset($catMeta[$cat])) {
      $catMeta[$cat] = ['label' => $p['cat_label'] ?? $cat, 'count' => 0];
    }
    $catMeta[$cat]['count']++;
  }
  $total = count($products);
@endphp

<section class="section tile" id="lines">
  <div class="sec-head rv">
    <span class="chapter">الفصل <b>02</b> · ماذا نقدّم</span>
    <span class="kick">خطوط أعمالنا</span>
    <h2>ثلاثة خطوط، <em>معيار غذائي واحد</em></h2>
  </div>
  <div class="lines-rail" id="linesRail">
    <article class="lcard rv">
      <div class="media"><span class="n">01</span>
        <div class="ph"><svg><use href="#i-bread"/></svg></div>
        <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-line-bakery.jpg') }}" alt="المخبوزات الصحية من نيومي" onerror="this.remove()"></div>
      <div class="bd">
        <h4>المخبوزات الصحية</h4>
        <p>تشكيلة خبز ومخبوزات يومية منخفضة النشويات، مبنية على الدقيق الصحي الخاص بالشركة.</p>
        <div class="tags"><span>خبز عربي</span><span>توست نيومي</span><span>باجيت</span><span>صامولي</span><span>خبز برجر</span><span>سميط</span><span>مالتي سيد</span></div>
      </div>
    </article>
    <article class="lcard rv">
      <div class="media"><span class="n">02</span>
        <div class="ph"><svg><use href="#i-cookie"/></svg></div>
        <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-line-support.jpg') }}" alt="المنتجات الداعمة من نيومي" onerror="this.remove()"></div>
      <div class="bd">
        <h4>المنتجات الداعمة</h4>
        <p>حلويات ومعجنات ومنتجات غذائية مكمّلة تقدّم قيمة غذائية عالية دون تأثير سلبي على مستويات السكر في الدم.</p>
        <div class="tags"><span>الحلويات الشرقية</span><span>الكيك والكوكيز</span><span>الفطور والمعجنات</span><span>المنتجات التكميلية</span></div>
      </div>
    </article>
    <article class="lcard rv">
      <div class="media"><span class="n">03</span>
        <div class="ph"><svg><use href="#i-box"/></svg></div>
        <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-line-subs.jpg') }}" alt="الاشتراكات الغذائية من نيومي" onerror="this.remove()"></div>
      <div class="bd">
        <h4>الاشتراكات الغذائية</h4>
        <p>باقات وجبات صحية جاهزة يومية وأسبوعية وشهرية، محسوبة القيم الغذائية، تُوصَّل إلى المنزل أو مقر العمل.</p>
        <div class="tags"><span>يومية</span><span>أسبوعية</span><span>شهرية</span></div>
      </div>
    </article>
  </div>
  <p class="lines-hint">اسحب لعرض بقية الخطوط</p>
</section>

<section class="section" id="shop">
  <div class="sec-head rv">
    <span class="kick">المتجر</span>
    <h2>منتجات <em>اليوم</em></h2>
    <p>كل صنف ببطاقته الغذائية الكاملة — اختر ما يناسب يومك.</p>
  </div>

  @if (count($products) > 0)
  <div class="shop-bar">
    <div class="tabs" id="v30Tabs">
      <button class="tab on" data-cat="all">الكل <i>{{ $total }}</i></button>
      @foreach ($catMeta as $slug => $meta)
        <button class="tab" data-cat="{{ $slug }}">{{ $meta['label'] }} <i>{{ $meta['count'] }}</i></button>
      @endforeach
    </div>
    @if ($preview)
    <div class="rail-ctrl">
      <button class="rail-btn" id="v30Prev" aria-label="المنتجات السابقة"><svg viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></button>
      <button class="rail-btn" id="v30Next" aria-label="المنتجات التالية"><svg viewBox="0 0 24 24"><path d="M15 5l-7 7 7 7"/></svg></button>
    </div>
    @endif
  </div>

  <div class="rail-outer{{ $preview ? '' : ' shop-grid' }}">
    <div class="rail" id="v30Rail" tabindex="0" role="region" aria-label="منتجات اليوم">
      @foreach ($products as $p)
        @php
          $href = $p['url'] ?? $p['href'] ?? '#';
          $cat = $p['cat'] ?? 'other';
          $flagKey = is_string($p['flag'] ?? null) && isset($storeFlags[$p['flag']]) ? $p['flag'] : null;
          $flagLabel = $p['flag'] ?? ($flagKey ? $storeFlags[$flagKey] : null);
          $flagIcon = $p['flag_icon'] ?? ($flagKey ? ($flagIcons[$flagKey]['icon'] ?? null) : null);
          $flagStyle = $p['flag_style'] ?? ($flagKey ? ($flagIcons[$flagKey]['style'] ?? '') : '');
          $protein = $p['protein'] ?? null;
          $kcal = $p['kcal'] ?? null;
          if ($protein !== null && is_numeric($protein)) {
            $protein = __('website.main.shop.protein', ['value' => $protein]);
          }
          if ($kcal !== null && is_numeric($kcal)) {
            $kcal = __('website.main.shop.kcal', ['value' => $kcal]);
          }
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
            <div class="ph"><svg><use href="#i-bread"/></svg></div>
            @if (!empty($p['image_url']))
              <img class="aiimg" loading="lazy" decoding="async" src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">
            @endif
          </div>
          <h3>{{ $p['name'] }}</h3>
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
          @if (!empty($p['price']))
            <div class="p-price">{{ $p['price'] }} <x-ui.sar /> <small>/ {{ $p['unit'] ?? 'عبوة' }}</small></div>
          @endif
          <a href="{{ $href }}" class="p-view">{{ __('website.store.view_product') }}</a>
        </article>
      @endforeach
    </div>
    @if ($preview)
    <div class="railbar"><i id="v30Railbar"></i></div>
    <p class="rail-hint">اسحب أو استخدم الأسهم للتنقّل بين المنتجات</p>
    @endif
  </div>
  @if ($preview)
    <div class="shop-cta"><a href="{{ route('website.store') }}" class="btn inv">عرض كل المنتجات</a></div>
  @endif
  @endif
</section>

<section class="section alt" id="nutrition">
  <div class="sec-head rv">
    <span class="kick">القيم الغذائية</span>
    <h2>بطاقة <em>الهوية الغذائية</em></h2>
    <p>هذا ما يمنحه جسمك في كل 100 غرام — محسوبة ومراجَعة بإشراف خبير تغذية معتمد.</p>
  </div>
  <div class="split">
    <div class="media-card rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-nutrition.jpg') }}" alt="مقطع من خبز نيومي وبطاقته الغذائية" onerror="this.remove()">
      <span class="cap">كيف نصنع رغيفكم · 60 ثانية</span>
    </div>
    <div class="spec-card rv">
      <h3>خبز نيومي</h3>
      <div class="sub">القيم لكل 100غ · بإشراف خبير تغذية معتمد</div>
      <div class="spec-row"><span class="n">الطاقة</span><span class="fuel-bar fuel" data-v="46"><i></i></span><span class="v"><em>233</em> kcal</span></div>
      <div class="spec-row"><span class="n">البروتين</span><span class="fuel-bar fuel" data-v="95"><i></i></span><span class="v"><em>40</em> g</span></div>
      <div class="spec-row"><span class="n">الدهون الكلية</span><span class="fuel-bar fuel" data-v="22"><i></i></span><span class="v">7 g</span></div>
      <div class="spec-row"><span class="n sub2">— منها أوميغا-3</span><span class="fuel-bar fuel" data-v="78"><i></i></span><span class="v"><em>3.8</em> g</span></div>
      <div class="spec-row"><span class="n">الكربوهيدرات</span><span class="fuel-bar fuel" data-v="30"><i></i></span><span class="v">15 g</span></div>
      <div class="spec-row"><span class="n sub2">— منها ألياف</span><span class="fuel-bar fuel" data-v="60"><i></i></span><span class="v"><em>12</em> g</span></div>
      <div class="spec-row"><span class="n">السكر المضاف</span><span class="fuel-bar fuel" data-v="0"><i></i></span><span class="v">0 g</span></div>
      <div class="spec-note">* تُعتمد القيم النهائية من المختبر قبل الطباعة على العبوة.</div>
    </div>
  </div>
</section>
<div class="rule"><i></i></div>
