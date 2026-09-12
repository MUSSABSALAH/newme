{{-- Shared mobile chrome: top bar, dark drawer, tab bar. --}}
@php
  $nmChromeLogo = app()->getLocale() === 'ar' ? 'logo_ar.png' : 'logo_en.png';
  $nmShowCart = $showCart ?? true;
  $nmTab = $active ?? ($nmTab ?? null);
  $isAr = app()->getLocale() === 'ar';
  $wa = 'https://wa.me/966533360317';
  $nmLangTarget = $isAr ? 'en' : 'ar';
  $nmItems = [
    ['href' => route('website.main'), 'icon' => 't-home', 'title' => __('website.site.nav.home'), 'sub' => __('website.site.nav.sub_home')],
    ['href' => route('website.about'), 'icon' => 't-about', 'title' => __('website.site.nav.about'), 'sub' => __('website.site.nav.sub_about')],
    ['href' => route('website.make'), 'icon' => 't-craft', 'title' => __('website.site.nav.make'), 'sub' => __('website.site.nav.sub_make')],
    ['href' => route('website.blog'), 'icon' => 't-kitchen', 'title' => __('website.site.nav.kitchen'), 'sub' => __('website.site.nav.sub_kitchen')],
    ['href' => route('website.store'), 'icon' => 't-shop', 'title' => __('website.site.nav.store'), 'sub' => __('website.site.nav.sub_store')],
    ['href' => route('website.subscribe'), 'icon' => 't-card', 'title' => __('website.site.nav.subscribe'), 'sub' => __('website.site.nav.sub_subscribe')],
    ['href' => route('website.help'), 'icon' => 't-help', 'title' => __('website.site.nav.faq'), 'sub' => __('website.site.nav.sub_faq')],
    ['href' => route('website.terms'), 'icon' => 't-doc', 'title' => __('website.site.nav.terms'), 'sub' => __('website.site.nav.sub_terms')],
  ];
  if (auth()->check() && auth()->user()->isCustomer()) {
    $nmItems[] = ['href' => route('website.account'), 'icon' => 't-user', 'title' => __('account.nav.account'), 'sub' => $isAr ? 'طلباتك واشتراكك' : 'Orders and subscription'];
  } else {
    $nmItems[] = ['href' => route('website.login'), 'icon' => 't-user', 'title' => __('account.nav.login'), 'sub' => $isAr ? 'دخول حسابك' : 'Sign in to your account'];
  }
  $nmItems[] = ['href' => route('locale.switch', $nmLangTarget), 'icon' => 't-lang', 'title' => $nmLangTarget === 'en' ? 'EN · English' : 'AR · العربية', 'sub' => $isAr ? 'تغيير لغة الموقع' : 'Switch site language', 'hreflang' => $nmLangTarget];
@endphp

<style>
.nm-chrome .tb-cart{position:relative;overflow:visible}
.nm-chrome .tb-cart-badge{
  position:absolute;top:-3px;inset-inline-end:-3px;
  min-width:16px;height:16px;padding:0 4px;border-radius:999px;
  background:#F07F2D;color:#fff;font-family:'Cairo',sans-serif;
  font-style:normal;font-size:9px;font-weight:800;line-height:16px;
  text-align:center;pointer-events:none;box-sizing:border-box;display:grid;place-items:center
}
.nm-chrome .tb-cart-badge.is-empty{display:none!important}
</style>

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
    @if (request()->routeIs('website.main'))
      @php
        $announceMessages = $announceMessages ?? [
            $announceShipping ?? __('website.site.announce.shipping'),
            __('website.site.announce.partners'),
            __('website.site.announce.consult'),
        ];
        $announceMessages = array_map(static function (int $i, string $line): string {
            if ($i !== 0 || str_contains($line, '<br')) {
                return $line;
            }

            $lead = app()->getLocale() === 'ar' ? 'التوصيل مجاني' : 'Free delivery';

            if (str_starts_with(strip_tags($line), $lead)) {
                return preg_replace('/^('.preg_quote($lead, '/').')\s+/u', '$1<br>', $line, 1) ?? $line;
            }

            return $line;
        }, array_keys($announceMessages), $announceMessages);
      @endphp
      <div class="announce ship-announce" id="nmAnnounce">
        @foreach ($announceMessages as $i => $line)
          <span @class(['on' => $i === 0])><em class="ship-line">{!! $line !!}</em></span>
        @endforeach
      </div>
    @endif
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
        <a class="tb-act tb-cart" href="{{ route('website.cart') }}" aria-label="{{ __('website.nav.cart') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M3 4h2.4L8 15h10l2.2-8H6"/>
            <circle cx="9.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/>
            <circle cx="16.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/>
          </svg>
          <span data-cart-count class="tb-cart-badge{{ ($cartCount ?? 0) < 1 ? ' is-empty' : '' }}">{{ $cartCount ?? 0 }}</span>
        </a>
        @endif
        <a class="tb-act tb-wa" href="{{ $wa }}" target="_blank" rel="noopener noreferrer" aria-label="{{ __('website.site.contact.social_whatsapp_aria') }}">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.04 0C5.5 0 .16 5.33.16 11.88c0 2.1.55 4.14 1.6 5.95L0 24l6.3-1.65a11.9 11.9 0 0 0 5.73 1.46h.01c6.54 0 11.88-5.33 11.88-11.88 0-3.17-1.24-6.16-3.4-8.45zM12.04 21.8h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.74.98 1-3.64-.24-.37a9.86 9.86 0 0 1-1.51-5.3C2.14 6.44 6.59 2 12.04 2c2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.98c0 5.45-4.44 9.92-9.88 9.92zm5.43-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.06 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35z"/></svg>
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
    <svg><use href="#t-home"/></svg>{{ __('website.site.nav.home') }}
  </a>
  <a class="tab {{ ($nmTab === 'store' || request()->routeIs('website.store', 'website.product.show')) ? 'on' : '' }}" href="{{ route('website.store') }}">
    <svg><use href="#t-shop"/></svg>{{ __('website.site.nav.store') }}
  </a>
  <a class="tab {{ ($nmTab === 'subscribe' || request()->routeIs('website.subscribe')) ? 'on' : '' }}" href="{{ route('website.subscribe') }}">
    <svg><use href="#t-subs"/></svg>{{ __('website.site.nav.subscribe') }}
  </a>
  <a class="tab {{ ($nmTab === 'blog' || request()->routeIs('website.blog', 'website.article', 'website.recipe')) ? 'on' : '' }}" href="{{ route('website.blog') }}">
    <svg><use href="#t-kitchen"/></svg>{{ __('website.site.nav.kitchen') }}
  </a>
  <a class="tab {{ ($nmTab === 'about' || request()->routeIs('website.about')) ? 'on' : '' }}" href="{{ route('website.about') }}">
    <svg><use href="#t-more"/></svg>{{ __('website.site.nav.about') }}
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
