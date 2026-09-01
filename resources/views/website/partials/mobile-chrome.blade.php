{{-- Shared mobile site header (logo + cart + menu + live batch). Desktop unchanged. --}}
@php
  $nmChromeLogo = app()->getLocale() === 'ar' ? 'logo_ar.png' : 'logo_en.png';
  $nmShowCart = $showCart ?? true;
@endphp

<style>
.nm-chrome{--cream:#F5F1EA;--cream-2:#FAF7F2;--white:#fff;--navy:#1B3055;--navy-2:#14294A;--orange:#E07B39;--orange-2:#EF9152;--muted:#7B8794;--line:rgba(27,48,85,.10);--pad:20px;--pill:999px;display:none}
@media(max-width:819.98px){
  .nm-chrome{display:block;position:sticky;top:0;z-index:220;font-family:"Cairo",system-ui,sans-serif;color:var(--navy)}
  /* Hide desktop chrome on mobile sitewide (main page already wraps its own) */
  body:not(:has(.home-mobile)) .announce,
  body:not(:has(.home-mobile)) nav.main,
  body:not(:has(.home-mobile)) #mmenu,
  body:not(:has(.home-mobile)) .burger{display:none!important}
  body:not(:has(.home-mobile)){padding-top:0}
}
.nm-chrome .topwrap{position:relative;z-index:1}
.nm-chrome header{background:rgba(245,241,234,.97);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);
  padding:11px var(--pad);display:flex;align-items:center;gap:9px}
.nm-chrome .brand{display:flex;align-items:center;margin-inline-end:auto;line-height:0}
.nm-chrome .brand img{height:36px;width:auto;max-width:140px;object-fit:contain;display:block}
.nm-chrome .rnd{width:38px;height:38px;border-radius:50%;background:var(--white);border:1px solid var(--line);
  display:grid;place-items:center;font-size:15px;box-shadow:0 2px 6px rgba(27,48,85,.05);color:inherit;text-decoration:none;flex-shrink:0;padding:0;cursor:pointer}
.nm-chrome .live{background:var(--navy-2);color:#E9F0F8;padding:7px var(--pad) 8px}
.nm-chrome .live .r{display:flex;align-items:center;gap:8px;font-size:11.5px;font-weight:600;flex-wrap:nowrap;white-space:nowrap;min-width:0}
.nm-chrome .live .dot{width:6px;height:6px;border-radius:50%;background:var(--orange);animation:nmChromePl 2.4s infinite;flex-shrink:0}
@keyframes nmChromePl{0%,100%{box-shadow:0 0 0 0 rgba(224,123,57,.55)}50%{box-shadow:0 0 0 7px rgba(224,123,57,0)}}
.nm-chrome .live .batch{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis}
.nm-chrome .live b{color:var(--orange);font-weight:800}
.nm-chrome .live .next{margin-inline-start:auto;color:#9FB5CD;font-weight:500;flex-shrink:0}
.nm-chrome .live .next span{color:#fff;font-weight:800;font-variant-numeric:tabular-nums}
.nm-chrome .track{height:3px;background:rgba(255,255,255,.14);border-radius:3px;margin-top:7px;overflow:hidden}
.nm-chrome .track .prog{display:block;height:100%;width:0;border-radius:3px;background:linear-gradient(90deg,var(--orange-2),var(--orange));transition:width 1.2s ease}
.nm-chrome .scrim{position:fixed;inset:0;background:rgba(20,41,74,.55);z-index:230;opacity:0;pointer-events:none;transition:opacity .25s}
.nm-chrome .scrim.on{opacity:1;pointer-events:auto}
.nm-chrome .drawer{position:fixed;top:0;inset-inline-end:0;height:100%;width:80%;max-width:320px;background:var(--cream-2);z-index:240;
  transform:translateX(105%);transition:transform .3s cubic-bezier(.3,.8,.3,1);padding:22px 20px;overflow-y:auto}
html[dir="rtl"] .nm-chrome .drawer{transform:translateX(-105%)}
.nm-chrome .drawer.on,html[dir="rtl"] .nm-chrome .drawer.on{transform:translateX(0)}
.nm-chrome .drawer h4{font-size:11.5px;color:var(--orange);letter-spacing:.08em;margin:22px 0 4px;font-weight:800}
.nm-chrome .drawer nav a{display:block;padding:12px 0;border-bottom:1px solid var(--line);font-weight:800;font-size:15px;color:var(--navy);text-decoration:none}
.nm-chrome .drawer .x{position:absolute;top:18px;inset-inline-start:18px;font-size:19px;border:0;background:none;cursor:pointer;color:var(--navy)}
.nm-chrome .drawer .kicker{font-size:11.5px;font-weight:700;color:var(--orange);letter-spacing:.05em;margin-bottom:8px}
.nm-chrome .drawer .kicker::before{content:"— "}
/* Main mobile home already has its own header — hide the sitewide one there */
body:has(.home-mobile) .nm-chrome{display:none!important}
</style>

<div class="nm-chrome" id="nmChrome">
  <div class="topwrap">
    <header>
      <a class="brand" href="{{ route('website.main') }}">
        <img src="{{ asset('assets/images/logos/'.$nmChromeLogo) }}" alt="{{ __('website.brand') }}" width="140" height="40">
      </a>
      @if ($nmShowCart)
      <a class="rnd" href="{{ route('website.cart') }}" aria-label="{{ __('website.nav.cart') }}">🛒</a>
      @endif
      <button class="rnd" type="button" id="nmChromeMenuBtn" aria-label="{{ __('website.nav.menu') }}">☰</button>
    </header>
    <div class="live">
      <div class="r">
        <span class="dot"></span>
        <span class="batch">
          @if (app()->getLocale() === 'ar')
            دفعة <b>NM-26</b> · خُبزت 07:00
          @else
            Batch <b>NM-26</b> · baked 07:00
          @endif
        </span>
        <span class="next">
          {{ app()->getLocale() === 'ar' ? 'الدفعة القادمة بعد' : 'Next batch in' }}
          <span id="nmChromeCd">—</span>
        </span>
      </div>
      <div class="track"><span class="prog" id="nmChromeProg"></span></div>
    </div>
  </div>

  <div class="scrim" id="nmChromeScrim"></div>
  <aside class="drawer" id="nmChromeDrawer">
    <button class="x" type="button" id="nmChromeX" aria-label="{{ app()->getLocale() === 'ar' ? 'إغلاق' : 'Close' }}">✕</button>
    <div class="kicker">{{ app()->getLocale() === 'ar' ? 'نيو مي · القائمة' : 'New Me · Menu' }}</div>
    <nav>
      <h4>{{ app()->getLocale() === 'ar' ? 'التسوق' : 'Shop' }}</h4>
      <a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
      <a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
      <a href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a>
      <h4>{{ app()->getLocale() === 'ar' ? 'اقرأ أكثر' : 'Learn more' }}</h4>
      <a href="{{ route('website.blog') }}#articles">{{ __('website.nav.articles') }}</a>
      <a href="{{ route('website.blog') }}#recipes">{{ __('website.main.recipes.kick') }}</a>
      <a href="{{ route('website.main') }}#about">{{ __('website.nav.about') }}</a>
      <a href="{{ route('website.terms') }}">{{ __('website.nav.terms') }}</a>
      <h4>{{ app()->getLocale() === 'ar' ? 'الحساب' : 'Account' }}</h4>
      @auth
        @if (auth()->user()->isCustomer())
          <a href="{{ route('website.account') }}">{{ __('account.nav.account') }}</a>
        @endif
      @else
        <a href="{{ route('website.login') }}">{{ __('account.nav.login') }}</a>
      @endauth
      @php($nmLangTarget = app()->getLocale() === 'ar' ? 'en' : 'ar')
      <a href="{{ route('locale.switch', $nmLangTarget) }}" hreflang="{{ $nmLangTarget }}">
        {{ $nmLangTarget === 'en' ? 'EN · English' : 'AR · العربية' }}
      </a>
    </nav>
  </aside>
</div>

<script>
(function(){
  if(!window.matchMedia || !matchMedia('(max-width:819.98px)').matches) return;
  if(document.querySelector('.home-mobile')) return;
  var root=document.getElementById('nmChrome'); if(!root) return;
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

  function tick(){
    var now=new Date();
    var bake=new Date(now); bake.setHours(7,0,0,0);
    if(now<bake) bake.setDate(bake.getDate()-1);
    var next=new Date(bake); next.setDate(next.getDate()+1);
    var left=next-now, h=Math.floor(left/36e5), m=Math.floor(left%36e5/6e4), s=Math.floor(left%6e4/1e3);
    var cd=document.getElementById('nmChromeCd');
    if(cd) cd.textContent=String(h).padStart(2,'0')+':'+String(m).padStart(2,'0')+':'+String(s).padStart(2,'0');
    var pct=Math.min(100,((now-bake)/(48*36e5))*100);
    var prog=document.getElementById('nmChromeProg');
    if(prog) prog.style.width=pct.toFixed(1)+'%';
  }
  tick(); setInterval(tick,1000);
})();
</script>
