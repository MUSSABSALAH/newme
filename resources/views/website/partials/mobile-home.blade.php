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
      <span class="pill">{{ $isAr ? 'جدّد حياتك · PREP — EAT — RENEW' : 'Renew your life · PREP — EAT — RENEW' }}</span>
      <h1>{!! $isAr ? 'التجديد يبدأ<br><em>من طبقك.</em>' : __('website.main.hero.h1') !!}</h1>
      <p>{{ $isAr ? 'مخبوزات ووجبات جاهزة من الدقيق الصحي الخاص بنيومي — بقيم غذائية مطبوعة كاملة على كل عبوة.' : __('website.main.hero.lead') }}</p>
      <div class="stack">
        <a class="btn" href="{{ route('website.subscribe') }}">{{ __('website.main.hero.cta_sub') }}</a>
        <a class="btn ghost" href="{{ route('website.store') }}">{{ $isAr ? 'تصفّح المتجر' : __('website.main.hero.cta_once') }}</a>
      </div>
    </div>
  </div>

  <div class="trust">{{ $isAr ? 'شريك لمستشفى الملك فيصل التخصصي ومركز الأبحاث · ' : 'Partner of KFSHRC · ' }}<b>دايت سنتر</b> · Daily Mealz</div>

  <div class="uspbar">
    <div class="usp"><span class="ic"><svg class="i"><use href="#i-wheat"/></svg></span>
      <b>{{ $isAr ? 'دقيقنا من تطويرنا' : 'Our own flour' }}</b><small>{{ $isAr ? 'ترمس أسترالي وكتان عضوي — مكوّن لا يُشترى جاهزاً' : 'Australian lupin and organic flax' }}</small></div>
    <div class="usp"><span class="ic"><svg class="i"><use href="#i-clipboard"/></svg></span>
      <b>{{ $isAr ? 'كل قيمة مطبوعة' : 'Every value printed' }}</b><small>{{ $isAr ? 'سعرات وبروتين ودهون وألياف وأوميغا-3' : 'Calories, protein, fat, fiber, omega-3' }}</small></div>
    <div class="usp"><span class="ic"><svg class="i"><use href="#i-shield"/></svg></span>
      <b>{{ $isAr ? 'مراجعة خبير التغذية' : 'Dietitian reviewed' }}</b><small>{{ $isAr ? 'تُعاير كل وصفة قبل اعتمادها في الإنتاج' : 'Every recipe is calibrated before production' }}</small></div>
    <div class="usp"><span class="ic"><svg class="i"><use href="#i-clock"/></svg></span>
      <b>{{ $isAr ? 'يُخبز في يومه' : 'Baked the same day' }}</b><small>{{ $isAr ? 'رقم التشغيلة وتاريخ الإنتاج على كل صندوق' : 'Batch number and bake date on every box' }}</small></div>
  </div>

  <div class="sec wrap">
    <span class="kick">{{ $isAr ? 'لماذا نيومي' : 'Why New Me' }}</span>
    <h2>{!! $isAr ? 'يبدأ الفرق من <em>المكوّن</em>، لا من الوصفة' : 'The difference starts with the <em>ingredient</em>' !!}</h2>
    <p class="lead">{{ $isAr ? 'طوّرنا دقيقنا الصحي من بذور الترمس والكتان العضوية، وأخضعناه لتحليل مخبري معتمد قبل أن يدخل في أول رغيف. ولأننا نصنع المادة الخام بأنفسنا، نعرف مصدر كل رقم على العبوة — فنطبعه بثقة.' : __('website.main.hero.lead') }}</p>
    <div class="pill-list">
      <div class="pl"><span class="ic"><svg class="i"><use href="#i-target"/></svg></span>
        <div><b>{{ $isAr ? 'صُمِّم للحالة الصحية أولاً' : 'Built for health first' }}</b><span>{{ $isAr ? 'انطلقنا من احتياجات مرضى السكري والسمنة، ثم امتددنا إلى كل باحث عن نظام متوازن.' : 'Started with diabetes and weight care, then opened to every balanced diet.' }}</span></div></div>
      <div class="pl"><span class="ic"><svg class="i"><use href="#i-box"/></svg></span>
        <div><b>{{ $isAr ? 'معيار غذائي واحد' : 'One nutrition standard' }}</b><span>{{ $isAr ? 'من خبز الصباح إلى وجبة الغداء إلى المنتج الداعم، القاعدة الغذائية ذاتها.' : 'From morning bread to lunch to support products — the same standard.' }}</span></div></div>
      <div class="pl"><span class="ic"><svg class="i"><use href="#i-shield"/></svg></span>
        <div><b>{{ $isAr ? 'ملكية فكرية محمية' : 'Protected IP' }}</b><span>{{ $isAr ? 'علامة «نيو مي — New Me» مسجَّلة.' : 'The New Me trademark is registered.' }}</span></div></div>
    </div>
  </div>

  <div class="photoblock">
    <div class="ph"><svg><use href="#i-wheat"/></svg></div>
    <img src="{{ asset('assets/images/v30-why-seeds.jpg') }}" alt="" onerror="this.remove()">
    <span class="cap">{{ $isAr ? 'الترمس الأسترالي وبذور الكتان العضوية' : 'Australian lupin and organic flax seeds' }}</span>
  </div>

  @if (count($shopProducts) > 0)
  <div class="sec wrap" style="padding-bottom:0">
    <span class="kick">{{ $isAr ? 'المتجر' : __('website.nav.store') }}</span>
    <h2>{!! $isAr ? 'منتجات <em>اليوم</em>' : 'Today’s <em>products</em>' !!}</h2>
    <p class="lead">{{ $isAr ? 'كل صنف ببطاقته الغذائية الكاملة — اختر ما يناسب يومك.' : __('website.store.lead') }}</p>
  </div>
  <div class="rail" id="nmHomeRail">
    @foreach ($shopProducts as $p)
      <a class="card" href="{{ $p['url'] }}" @if(!empty($p['cat'])) data-cat="{{ $p['cat'] }}" @endif>
        <div class="media">
          @if (!empty($p['flag']))<span class="flag">{{ $p['flag'] }}</span>@endif
          <div class="ph"><svg><use href="#i-bread"/></svg></div>
          @if (!empty($p['image_url']))<img src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">@endif
        </div>
        <div class="bd">
          <h3>{{ $p['name'] }}</h3>
          <div class="nut">
            @if (!empty($p['protein']))<span>{{ $p['protein'] }}</span>@endif
            @if (!empty($p['kcal']))<span>{{ $p['kcal'] }}</span>@endif
          </div>
          <p class="pr">{{ $p['price'] }} <x-ui.sar /></p>
        </div>
      </a>
    @endforeach
  </div>
  <div class="wrap shop-more">
    <a class="btn inv" href="{{ route('website.store') }}">{{ $isAr ? 'تصفح المتجر' : 'Browse the store' }}</a>
  </div>
  @endif

  @include('website.partials.mobile-apps')

  <div class="trust">{{ $isAr ? 'توصيل مبرَّد داخل الرياض · دايت سنتر بالشرقية وجدة · جاهز · هنقرستيشن · كيتا · ذا شيفز · نينجا' : 'Chilled delivery in Riyadh · Diet Center · Jahez · HungerStation · Keeta · The Chefz · Ninja' }}</div>

  <div class="closing">
    <h2>{{ $isAr ? 'جدّد حياتك' : 'Renew your life' }}</h2>
    <p class="tag">PREP — EAT — RENEW</p>
    <p>{{ $isAr ? 'استشارة تغذية أولى مجانية مع كل باقة.' : 'A first nutrition consult is free with every plan.' }}</p>
    <a class="btn" href="{{ route('website.subscribe') }}">{{ __('website.main.hero.cta_sub') }}</a>
  </div>

</div>

