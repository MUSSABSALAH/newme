{{-- Shared mobile chrome: top bar, dark drawer, tab bar. --}}
@php
  $nmChromeLogo = app()->getLocale() === 'ar' ? 'logo_ar.png' : 'logo_en.png';
  $nmShowCart = $showCart ?? true;
  $nmTab = $active ?? ($nmTab ?? null);
  $isAr = app()->getLocale() === 'ar';
  $wa = 'https://wa.me/966539603302';
  $nmLangTarget = $isAr ? 'en' : 'ar';
  $nmItems = [
    ['href' => route('website.main'), 'icon' => 't-home', 'title' => $isAr ? 'الرئيسة' : 'Home', 'sub' => $isAr ? 'الواجهة ولماذا نيومي' : 'The site and why New Me'],
    ['href' => route('website.store'), 'icon' => 't-shop', 'title' => __('website.nav.store'), 'sub' => $isAr ? 'المنتجات والقيم الغذائية' : 'Products and nutrition'],
    ['href' => route('website.subscribe'), 'icon' => 't-card', 'title' => $isAr ? 'الاشتراكات' : __('website.nav.subscribe'), 'sub' => $isAr ? 'ثلاث باقات حسب المدة' : 'Three packs by duration'],
    ['href' => route('website.make'), 'icon' => 't-craft', 'title' => $isAr ? 'صناعتنا' : 'Our craft', 'sub' => $isAr ? 'كيف نخبز ولماذا يفرق' : 'How we bake and why it matters'],
    ['href' => route('website.about'), 'icon' => 't-about', 'title' => __('website.nav.about'), 'sub' => $isAr ? 'قصتنا ورؤيتنا' : 'Our story and vision'],
    ['href' => route('website.blog'), 'icon' => 't-kitchen', 'title' => $isAr ? 'مطبخنا' : __('website.nav.articles'), 'sub' => $isAr ? 'مقالات ووصفات' : 'Articles and recipes'],
    ['href' => route('website.help'), 'icon' => 't-help', 'title' => $isAr ? 'الأسئلة' : 'FAQ', 'sub' => $isAr ? 'الدعم والاستشارة' : 'Help and consults'],
    ['href' => route('website.terms'), 'icon' => 't-doc', 'title' => __('website.nav.terms'), 'sub' => $isAr ? 'الشروط والسياسات' : 'Terms and policies'],
  ];
  if (auth()->check() && auth()->user()->isCustomer()) {
    $nmItems[] = ['href' => route('website.account'), 'icon' => 't-user', 'title' => __('account.nav.account'), 'sub' => $isAr ? 'طلباتك واشتراكك' : 'Orders and subscription'];
  } else {
    $nmItems[] = ['href' => route('website.login'), 'icon' => 't-user', 'title' => __('account.nav.login'), 'sub' => $isAr ? 'دخول حسابك' : 'Sign in to your account'];
  }
  $nmItems[] = ['href' => route('locale.switch', $nmLangTarget), 'icon' => 't-lang', 'title' => $nmLangTarget === 'en' ? 'EN · English' : 'AR · العربية', 'sub' => $isAr ? 'تغيير لغة الموقع' : 'Switch site language', 'hreflang' => $nmLangTarget];
@endphp

<svg style="display:none" aria-hidden="true"><defs>
  <symbol id="t-home" viewBox="0 0 24 24"><path d="M4 10.5 12 4l8 6.5V20a1 1 0 0 1-1 1h-4v-6H9v6H5a1 1 0 0 1-1-1z"/></symbol>
  <symbol id="t-shop" viewBox="0 0 24 24"><path d="M5 8h14l-1.2 11.1a2 2 0 0 1-2 1.9H8.2a2 2 0 0 1-2-1.9z"/><path d="M9 8V6.5a3 3 0 0 1 6 0V8"/></symbol>
  <symbol id="t-subs" viewBox="0 0 24 24"><rect x="3.5" y="5" width="17" height="16" rx="2.5"/><path d="M3.5 10h17M8 3v4M16 3v4"/></symbol>
  <symbol id="t-card" viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="14" rx="2.5"/><path d="M8 12h8M8 15h5"/><circle cx="12" cy="9" r="1" fill="currentColor" stroke="none"/></symbol>
  <symbol id="t-kitchen" viewBox="0 0 24 24"><path d="M5 4v7a3 3 0 0 0 6 0V4M8 11v9"/><path d="M17 4c-1.5 1.5-2 4-2 6.5 0 1.4.7 2.5 2 2.5V20"/></symbol>
  <symbol id="t-more" viewBox="0 0 24 24"><circle cx="5" cy="12" r="1.6" fill="currentColor" stroke="none"/><circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/><circle cx="19" cy="12" r="1.6" fill="currentColor" stroke="none"/></symbol>
  <symbol id="t-craft" viewBox="0 0 24 24"><path d="M12 3c2.2 3.4 3.2 6.2 3.2 8.6A3.2 3.2 0 0 1 12 15V21"/><path d="M12 3C9.8 6.4 8.8 9.2 8.8 11.6A3.2 3.2 0 0 0 12 15"/></symbol>
  <symbol id="t-about" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.2"/><path d="M5.5 19.2c1.2-3.2 3.4-4.8 6.5-4.8s5.3 1.6 6.5 4.8"/></symbol>
  <symbol id="t-help" viewBox="0 0 24 24"><path d="M8.2 8.4a4 4 0 1 1 5.4 3.7c-.8.4-1.6 1.2-1.6 2.1V15"/><circle cx="12" cy="18.2" r="1" fill="currentColor" stroke="none"/></symbol>
  <symbol id="t-doc" viewBox="0 0 24 24"><path d="M7 4.5h7l4 4V19.5a1.5 1.5 0 0 1-1.5 1.5h-9.5A1.5 1.5 0 0 1 5.5 19.5v-13A2 2 0 0 1 7 4.5z"/><path d="M14 4.5V9h4.5M8.5 13h7M8.5 16.5h5"/></symbol>
  <symbol id="t-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.2"/><path d="M5.2 19c1.3-3.1 3.6-4.6 6.8-4.6s5.5 1.5 6.8 4.6"/></symbol>
  <symbol id="t-lang" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.2"/><path d="M4.5 12h15M12 3.8c2.2 2.2 3.4 5 3.4 8.2S14.2 18 12 20.2C9.8 18 8.6 15.2 8.6 12S9.8 6 12 3.8z"/></symbol>
</defs></svg>

<div class="nm-chrome" id="nmChrome">
  <div class="topwrap">
    <header class="ip-topbar">
      <a class="brand" href="{{ route('website.main') }}">
        <img src="{{ asset('assets/images/logos/'.$nmChromeLogo) }}" alt="{{ __('website.brand') }}" width="140" height="40">
      </a>
      <div class="tb-acts">
        <button class="tb-act" type="button" id="nmChromeMenuBtn" aria-label="{{ __('website.nav.menu') }}">
          <svg viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
        </button>
        @if (auth()->check() && auth()->user()->isCustomer())
        <a class="tb-act {{ request()->routeIs('website.account*') ? 'on' : '' }}" href="{{ route('website.account') }}" aria-label="{{ __('account.nav.account') }}">
          <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </a>
        @else
        <a class="tb-act {{ request()->routeIs('website.login', 'website.register') ? 'on' : '' }}" href="{{ route('website.login') }}" aria-label="{{ __('account.nav.login') }}">
          <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </a>
        @endif
        @if ($nmShowCart)
        <a class="tb-act" href="{{ route('website.cart') }}" aria-label="{{ __('website.nav.cart') }}">
          <svg viewBox="0 0 24 24"><path d="M5 8h14l-1.2 11.1a2 2 0 0 1-2 1.9H8.2a2 2 0 0 1-2-1.9z"/><path d="M9 8V6.5a3 3 0 0 1 6 0V8"/></svg>
        </a>
        @endif
        <a class="tb-act" href="{{ $wa }}" aria-label="WhatsApp">
          <svg viewBox="0 0 24 24"><path d="M20.5 11.5a8.5 8.5 0 1 1-4.3-7.4"/><path d="M4 20l1.4-4"/></svg>
        </a>
      </div>
    </header>
  </div>

  <div class="scrim" id="nmChromeScrim"></div>
  <aside class="drawer" id="nmChromeDrawer">
    <div class="hd">
      <h3>{{ $isAr ? 'القائمة' : 'Menu' }}</h3>
      <button class="x" type="button" id="nmChromeX" aria-label="{{ $isAr ? 'إغلاق' : 'Close' }}">×</button>
    </div>
    <nav>
      @foreach ($nmItems as $item)
        <a class="mitem" href="{{ $item['href'] }}" @if(!empty($item['hreflang'])) hreflang="{{ $item['hreflang'] }}" @endif>
          <span class="ico"><svg><use href="#{{ $item['icon'] }}"/></svg></span>
          <span class="txt"><b>{{ $item['title'] }}</b><small>{{ $item['sub'] }}</small></span>
          <span class="arr" aria-hidden="true">{{ $isAr ? '←' : '→' }}</span>
        </a>
      @endforeach
    </nav>
  </aside>
</div>

<nav class="nm-tabbar" id="nmTabbar" aria-label="{{ $isAr ? 'التنقل' : 'Navigation' }}">
  <a class="tab {{ request()->routeIs('website.main') ? 'on' : '' }}" href="{{ route('website.main') }}">
    <svg><use href="#t-home"/></svg>{{ $isAr ? 'الرئيسة' : 'Home' }}
  </a>
  <a class="tab {{ ($nmTab === 'store' || request()->routeIs('website.store', 'website.product', 'website.product.show')) ? 'on' : '' }}" href="{{ route('website.store') }}">
    <svg><use href="#t-shop"/></svg>{{ __('website.nav.store') }}
  </a>
  <a class="tab {{ ($nmTab === 'subscribe' || request()->routeIs('website.subscribe')) ? 'on' : '' }}" href="{{ route('website.subscribe') }}">
    <svg><use href="#t-subs"/></svg>{{ $isAr ? 'الاشتراكات' : __('website.nav.subscribe') }}
  </a>
  <a class="tab {{ ($nmTab === 'blog' || request()->routeIs('website.blog', 'website.article', 'website.recipe')) ? 'on' : '' }}" href="{{ route('website.blog') }}">
    <svg><use href="#t-kitchen"/></svg>{{ $isAr ? 'مطبخنا' : __('website.nav.articles') }}
  </a>
  <a class="tab {{ ($nmTab === 'about' || request()->routeIs('website.about')) ? 'on' : '' }}" href="{{ route('website.about') }}">
    <svg><use href="#t-more"/></svg>{{ $isAr ? 'عن نيومي' : __('website.nav.about') }}
  </a>
</nav>

<script>
(function(){
  if(!window.matchMedia || !matchMedia('(max-width:819.98px)').matches) return;
  var scrim=document.getElementById('nmChromeScrim');
  var drawer=document.getElementById('nmChromeDrawer');
  var open=function(){if(drawer)drawer.classList.add('on');if(scrim)scrim.classList.add('on');document.body.style.overflow='hidden'};
  var close=function(){if(drawer)drawer.classList.remove('on');if(scrim)scrim.classList.remove('on');document.body.style.overflow=''};
  var btn=document.getElementById('nmChromeMenuBtn');
  var x=document.getElementById('nmChromeX');
  if(btn) btn.addEventListener('click', open);
  if(x) x.addEventListener('click', close);
  if(scrim) scrim.addEventListener('click', close);
  document.addEventListener('keydown', function(e){ if(e.key==='Escape') close(); });
  drawer && drawer.querySelectorAll('a').forEach(function(a){ a.addEventListener('click', close); });
})();
</script>
