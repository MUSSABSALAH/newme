@extends('website.layouts.app')

@section('title', __('website.store.title'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
<style>
@verbatim
:root{
  --navy:#10263F; --navy-2:#1B3A61;
  --bg:#F8F6F1; --tile:#EFEBE2; --line:#E2DCCE; --line-2:#D2CBBA;
  --ink:#10263F; --body:#4A5568; --muted:#8A93A3;
  --orange:#E8762A; --orange-deep:#C95F14; --orange-hi:#FFA05C;
  --green:#2E9E6B;
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.8;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3{color:var(--ink);font-weight:900;line-height:1.15;letter-spacing:-.02em}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity 1s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.wrap{max-width:1280px;margin:0 auto;padding:0 24px}
.kick{font-size:10.5px;font-weight:800;letter-spacing:.22em;text-transform:uppercase;color:var(--orange-deep);font-family:var(--mono)}

.v30-mob-only .announce{background:var(--navy);color:#EAF1FA;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12px;font-weight:700;letter-spacing:.02em}
.v30-mob-only .announce b{color:var(--orange-hi)}
.v30-mob-only nav.main{position:sticky;top:0;z-index:90;background:rgba(248,246,241,.92);backdrop-filter:blur(18px) saturate(1.3);-webkit-backdrop-filter:blur(18px) saturate(1.3);border-bottom:1px solid var(--line)}
.v30-mob-only nav.main .bar{max-width:1280px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:66px;padding:0 24px;gap:12px}
.v30-mob-only .logo{display:flex;align-items:center;gap:10px}
.v30-mob-only .logo .mark{width:34px;height:34px;border-radius:50%;background:conic-gradient(from 210deg,#24487A,var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.v30-mob-only .logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%, rgba(255,255,255,.9), rgba(255,255,255,.2) 36%, transparent 60%)}
.v30-mob-only .logo b{font-size:18px;color:var(--ink);font-weight:900}
.v30-mob-only .nav-links{display:none;gap:24px;font-weight:800;font-size:13px;color:var(--ink)}
.v30-mob-only .nav-links a{padding:6px 0;border-bottom:2px solid transparent;white-space:nowrap;letter-spacing:.01em;border-radius:0;background:transparent;box-shadow:none;min-height:0;transform:none}
.v30-mob-only .nav-links a:hover,.v30-mob-only .nav-links a.on{border-color:var(--orange);background:transparent;color:inherit;box-shadow:none}
@media(min-width:960px){.v30-mob-only .nav-links{display:flex}}
.v30-mob-only .nav-cta{font-size:12px;font-weight:900;color:var(--ink);border:1.5px solid var(--ink);border-radius:999px;padding:6px 16px;height:36px;display:inline-flex;align-items:center;transition:.2s;line-height:1}
.v30-mob-only .nav-cta:hover{background:var(--ink);color:#fff}

/* ===== editorial hero ===== */
.phead{padding:64px 0 44px;position:relative}
.phead .wrap{display:grid;gap:20px}
@media(min-width:920px){.phead .wrap{grid-template-columns:1.4fr 1fr;align-items:end}}
.phead .rule{height:1px;background:var(--line-2);margin-bottom:26px}
.phead h1{font-size:clamp(52px,11vw,110px);line-height:.95}
.phead h1 em{font-style:normal;color:var(--orange-deep)}
.phead .lead{font-size:15px;font-weight:600;max-width:400px;margin-top:14px}
.phead aside{border-inline-start:1px solid var(--line-2);padding-inline-start:26px;display:grid;gap:14px}
@media(max-width:919px){.phead aside{border-inline-start:none;padding-inline-start:0;border-top:1px solid var(--line-2);padding-top:18px;grid-template-columns:repeat(3,1fr)}}
.phead aside div b{display:block;font-family:var(--mono);font-size:20px;color:var(--ink);font-weight:700}
.phead aside div span{font-size:11px;font-weight:800;color:var(--muted);letter-spacing:.04em}

/* ===== premium tabs (mobile store only — do not leak onto desktop shop-bar) ===== */
.v30-mob-only .filters{position:sticky;top:calc(66px + var(--sat));z-index:80;background:rgba(248,246,241,.95);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-block:1px solid var(--line)}
.v30-mob-only .tabs{display:flex;gap:30px;overflow-x:auto;padding:0 24px;max-width:1280px;margin:0 auto;scrollbar-width:none;-webkit-overflow-scrolling:touch}
.v30-mob-only .tabs::-webkit-scrollbar{display:none}
.v30-mob-only .tab{flex-shrink:0;background:none;border:none;padding:16px 2px 14px;font-weight:900;font-size:14px;color:var(--muted);transition:color .2s;position:relative;display:inline-flex;align-items:baseline;gap:7px;letter-spacing:.01em}
.v30-mob-only .tab sup{font-family:var(--mono);font-size:10px;font-weight:700;color:var(--muted)}
.v30-mob-only .tab::after{content:"";position:absolute;bottom:-1px;inset-inline:0;height:2.5px;background:var(--orange);transform:scaleX(0);transition:transform .3s cubic-bezier(.2,.7,.2,1)}
.v30-mob-only .tab.on{color:var(--ink);background:none}
.v30-mob-only .tab.on::after{transform:scaleX(1)}
.v30-mob-only .tab.on sup{color:var(--orange-deep)}
.v30-mob-only .subs-row{display:none;gap:8px;overflow-x:auto;padding:12px 24px;max-width:1280px;margin:0 auto;scrollbar-width:none;border-top:1px solid var(--line)}
.v30-mob-only .subs-row::-webkit-scrollbar{display:none}
.v30-mob-only .subs-row.show{display:flex}
.v30-mob-only .sub{flex-shrink:0;background:none;border:1.5px solid var(--line-2);border-radius:999px;padding:6px 18px;font-weight:800;font-size:11.5px;color:var(--body);transition:.2s;letter-spacing:.02em}
.v30-mob-only .sub:hover{border-color:var(--ink)}
.v30-mob-only .sub.on{background:var(--ink);border-color:var(--ink);color:#fff}

/* ===== grid ===== */
.shop-wrap{max-width:1280px;margin:0 auto;padding:34px 24px 80px}
.count{display:flex;justify-content:space-between;align-items:baseline;font-size:11px;font-weight:800;color:var(--muted);margin-bottom:24px;letter-spacing:.14em;text-transform:uppercase;font-family:var(--mono);border-bottom:1px solid var(--line);padding-bottom:14px}
.count b{color:var(--ink)}
.grid{display:grid;gap:38px 20px;grid-template-columns:repeat(2,1fr)}
@media(min-width:700px){.grid{grid-template-columns:repeat(3,1fr)}}
@media(min-width:1040px){.grid{grid-template-columns:repeat(4,1fr);gap:44px 24px}}
.card{display:flex;flex-direction:column;position:relative}
.card.hide{display:none}
@media(min-width:700px){.card.feat:not(.hide){grid-column:span 2}}
.tilelink{display:block;position:relative;overflow:hidden;background:var(--tile);aspect-ratio:1/1.04;border-radius:4px}
.card.feat .tilelink{aspect-ratio:auto;height:100%;min-height:300px}
@supports not (aspect-ratio:1){.tilelink{height:0;padding-bottom:104%}}
.tilelink img{position:absolute;inset:0;transition:transform .7s cubic-bezier(.2,.7,.2,1)}
.card:hover .tilelink img{transform:scale(1.05)}
.tilelink .quick{position:absolute;bottom:14px;inset-inline:14px;z-index:2;background:rgba(16,38,63,.92);color:#fff;text-align:center;font-size:12px;font-weight:900;letter-spacing:.06em;border-radius:999px;padding:12px;opacity:0;transform:translateY(10px);transition:.3s;backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px)}
.card:hover .quick{opacity:1;transform:none}
@media(hover:none){.tilelink .quick{display:none}}
.flag{position:absolute;top:12px;inset-inline-start:12px;z-index:2;background:#fff;border-radius:2px;padding:5px 12px;font-size:9px;font-weight:900;color:var(--ink);letter-spacing:.16em;text-transform:uppercase;box-shadow:0 4px 14px rgba(16,38,63,.12);display:inline-flex;align-items:center;gap:6px}
.flag.sale{background:var(--green);color:#fff}
.flag .flame{color:var(--orange-deep);font-size:11px;line-height:1}
.kchip{position:absolute;top:12px;inset-inline-end:12px;z-index:2;border:1.5px solid rgba(16,38,63,.75);color:var(--ink);background:rgba(248,246,241,.85);border-radius:2px;padding:3px 9px;font-size:9px;font-weight:700;font-family:var(--mono);letter-spacing:.08em;backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px)}
.meta{padding-top:14px;display:flex;flex-direction:column;flex:1}
.meta .cat{font-size:9px;font-weight:800;color:var(--muted);letter-spacing:.2em;text-transform:uppercase;font-family:var(--mono);margin-bottom:5px}
.meta h3{font-size:16px;font-weight:900;line-height:1.4}
.meta .pline{margin-top:10px;padding-top:10px;border-top:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}
.meta .pr{font-family:var(--mono);font-size:14.5px;font-weight:700;color:var(--ink)}
.meta .pr small{font-size:10px;color:var(--muted);font-family:var(--font);font-weight:800}
.meta .arrow{font-size:15px;font-weight:900;color:var(--orange-deep);transition:transform .25s}
.card:hover .meta .arrow{transform:translateX(-5px)}
.meta .p-specs,.meta .p-view{display:none}
.kcal-box{display:inline-grid;place-items:center;min-width:38px;height:22px;border:1.8px solid var(--ink);border-radius:6px;font-family:var(--mono);font-size:9.5px;font-weight:700;color:var(--ink);padding:0 5px;flex-shrink:0}

/* Mobile store: full product cards (image + details + CTA) */
@media(max-width:819.98px){
  .v30-mob-only .filters{display:none!important}
  .js .aiimg,.js .aiimg.loaded,.tilelink img{opacity:1!important;visibility:visible!important}
  .shop-wrap{padding:22px 16px 72px}
  .grid{grid-template-columns:1fr 1fr;gap:16px 12px}
  .card,.card.feat:not(.hide){grid-column:auto;background:#F3EEE6;border-radius:18px;overflow:hidden;padding:0 0 12px;box-shadow:0 4px 16px rgba(16,38,63,.06)}
  .card.feat .tilelink{aspect-ratio:1/1;height:auto;min-height:0}
  .tilelink{border-radius:18px 18px 0 0;aspect-ratio:1/1}
  .kchip,.nut-toggle,.nutov,.tilelink .quick,.meta .pline .arrow{display:none!important}
  .flag{top:10px;inset-inline-start:10px;background:rgba(255,255,255,.95);border-radius:999px;padding:5px 10px;font-size:10px;letter-spacing:0;text-transform:none;font-weight:800}
  .meta{padding:12px 12px 0;gap:0}
  .meta h3{font-size:14px;font-weight:900;color:var(--ink);order:1;margin:0}
  .meta .cat{order:2;font-size:12px;font-weight:700;letter-spacing:0;text-transform:none;font-family:var(--font);color:var(--body);margin:4px 0 0}
  .meta .p-specs{display:grid;gap:8px;order:3;margin:12px 0;padding:11px 0;border-top:1.5px solid var(--line);border-bottom:1.5px solid var(--line)}
  .meta .p-spec{display:flex;align-items:center;justify-content:space-between;gap:8px;font-size:12.5px;font-weight:800;color:var(--ink)}
  .meta .pline{order:4;border:0;padding:0;margin:0 0 10px}
  .meta .pr{font-family:var(--font);font-size:18px;font-weight:900}
  .meta .p-view{display:flex;order:5;justify-content:center;align-items:center;background:var(--navy);color:#fff;font-weight:800;font-size:13px;border-radius:999px;padding:12px;min-height:44px;margin-top:2px}
}

/* ===== transparent nutrition rollover ===== */
.nutov{position:absolute;inset:0;z-index:3;background:rgba(248,246,241,.82);backdrop-filter:blur(12px) saturate(1.1);-webkit-backdrop-filter:blur(12px) saturate(1.1);display:flex;flex-direction:column;justify-content:center;padding:20px 18px 62px;opacity:0;transition:opacity .35s ease;pointer-events:none}
.card:hover .nutov,.card.showN .nutov{opacity:1}
.nutov .nv-h{font-size:9px;font-weight:800;color:var(--muted);letter-spacing:.2em;text-transform:uppercase;font-family:var(--mono);margin-bottom:10px;text-align:center}
.nutov .nv-h em{font-style:normal;color:var(--orange-deep)}
.nutov .nv-r{display:flex;justify-content:space-between;align-items:baseline;padding:7px 2px;border-top:1px solid rgba(16,38,63,.14);font-size:12px;font-weight:800;color:var(--ink)}
.nutov .nv-r:last-of-type{border-bottom:1px solid rgba(16,38,63,.14)}
.nutov .nv-r b{font-family:var(--mono);font-weight:700;font-size:13px}
.nutov .nv-r b small{font-size:9px;color:var(--muted);font-weight:700}
.nutov .nv-note{margin-top:9px;font-size:8.5px;font-weight:800;color:var(--muted);text-align:center;letter-spacing:.06em;font-family:var(--mono)}
.nutov .nv-note.real{color:var(--green)}
.card:hover .quick{z-index:4}
.nut-toggle{display:none;position:absolute;top:12px;inset-inline-end:12px;z-index:5;width:30px;height:30px;border-radius:50%;border:1.5px solid rgba(16,38,63,.5);background:rgba(248,246,241,.85);color:var(--ink);font-weight:900;font-size:13px;font-family:var(--mono);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px)}
.card.showN .nut-toggle{background:var(--ink);color:#fff;border-color:var(--ink)}
@media(hover:none){
  .nut-toggle{display:grid;place-items:center}
  .kchip{inset-inline-end:50px}
  .card.showN .quick{opacity:1;transform:none;display:block;z-index:4}
}

.empty{text-align:center;padding:70px 20px;font-weight:800;color:var(--muted);display:none;letter-spacing:.04em}

footer{background:var(--navy);color:#9FB4D2;padding:44px 24px calc(48px + var(--sab));text-align:center}
footer .flinks{display:flex;justify-content:center;gap:26px;flex-wrap:wrap;font-size:12.5px;font-weight:800;margin-bottom:16px;letter-spacing:.02em}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:10.5px;font-weight:600;color:#6E84A5;line-height:2;letter-spacing:.03em}

/* ===== iPhone menu (design unchanged on desktop) ===== */
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--line,var(--gray-2,#E2DCCE));background:transparent;color:var(--ink,var(--navy,#122B4A));flex-shrink:0}
.burger svg{width:20px;height:20px;stroke:currentColor;stroke-width:2;fill:none;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}
.mmenu{position:fixed;inset:0;z-index:300;background:linear-gradient(160deg,#122B4A,#0A1B31 70%);display:flex;flex-direction:column;justify-content:center;padding:80px 34px 50px;transform:translateY(-102%);transition:transform .5s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:translateY(0)}
.mmenu::before{content:"";position:absolute;top:-120px;inset-inline-end:-100px;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.25),transparent 65%);pointer-events:none}
.mmenu .mkick{font-family:var(--mono,monospace);font-size:10px;letter-spacing:.34em;color:#FFA05C;text-transform:uppercase;margin-bottom:20px}
.mmenu a.mlink{display:block;color:#EAF1FA;font-size:27px;font-weight:900;padding:10px 0;border-bottom:1px solid rgba(255,255,255,.1);letter-spacing:-.01em}
.mmenu a.mlink:active{color:#FFA05C}
.mmenu a.mcta{display:inline-flex;align-items:center;justify-content:center;margin-top:26px;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:15px;border-radius:999px;padding:16px 34px;box-shadow:0 14px 34px rgba(240,127,45,.4)}
.mmenu .mfoot{margin-top:auto;padding-top:28px;font-size:11px;font-weight:700;color:#8FA6C6}
.mclose{position:absolute;top:calc(20px + env(safe-area-inset-top,0px));inset-inline-end:22px;width:44px;height:44px;border-radius:50%;border:1.5px solid rgba(255,255,255,.25);background:none;color:#fff;font-size:20px;font-weight:900;display:grid;place-items:center}
body.menu-open{overflow:hidden}
@endverbatim
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

{{-- Desktop redesign --}}
<div class="v30-desk">
  @include('website.partials.v30-shop-rail', ['products' => $products, 'preview' => false])
  @include('website.partials.v30-closing')
</div>

{{-- Mobile: existing store UI --}}
<div class="v30-mob-only nm-ip">
<header class="phead">
  <div class="wrap" style="display:block"><div class="rule"></div></div>
  <div class="wrap">
    <div>
      <span class="kick">{{ __('website.store.kick') }}</span>
      <h1>{!! __('website.store.heading') !!}</h1>
      <p class="lead">{{ __('website.store.lead') }}</p>
    </div>
    <aside>
      <div><b>{{ $total }}</b><span>{{ __('website.store.stat_products') }}</span></div>
      <div><b>05:00</b><span>{{ __('website.store.stat_bake') }}</span></div>
      <div><b>≤48h</b><span>{{ __('website.store.stat_delivery') }}</span></div>
    </aside>
  </div>
</header>

<div class="filters">
  <div class="tabs" id="tabs">
    @foreach ($tabs as $i => $tab)
      <button
        class="tab{{ $i === 0 ? ' on' : '' }}"
        data-cat="{{ $tab['slug'] }}"
        data-subs="{{ $tab['has_subs'] ? '1' : '0' }}"
        data-label="{{ $tab['label'] }}"
      >{{ $tab['label'] }} <sup>{{ str_pad((string) $tab['count'], 2, '0', STR_PAD_LEFT) }}</sup></button>
    @endforeach
  </div>
  <div class="subs-row" id="subsRow">
    @foreach ($subs as $i => $sub)
      <button class="sub{{ $i === 0 ? ' on' : '' }}" data-sub="{{ $sub['slug'] }}">{{ $sub['label'] }}</button>
    @endforeach
  </div>
</div>

<div class="shop-wrap">
  <div class="count"><span>{!! __('website.store.count_label') !!}</span><span>{!! __('website.store.count_showing', ['total' => $total]) !!}</span></div>
  <div class="grid" id="grid">
    @foreach ($products as $p)
      @php
        $flagText = match ($p['flag'] ?? null) {
          'sale' => __('website.store.flag_sale'),
          'bestseller' => __('website.store.flag_bestseller'),
          'occasions' => __('website.store.flag_occasions'),
          default => null,
        };
        $flagClass = ($p['flag'] ?? null) === 'sale' ? 'flag sale' : 'flag';
      @endphp
      <article class="card{{ !empty($p['feat']) ? ' feat' : '' }}" data-cat="{{ $p['cat'] }}" data-sub="{{ $p['sub'] }}">
        <a class="tilelink" href="{{ $p['href'] }}">
          @if ($flagText)
            <span class="{{ $flagClass }}">
              @if (($p['flag'] ?? null) === 'bestseller')<span class="flame" aria-hidden="true">🔥</span>@endif
              {{ $flagText }}
            </span>
          @endif
          <span class="kchip">{{ $p['kcal'] }} kcal</span>
          @if ($p['image_url'])<img class="aiimg" src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">@endif
          <span class="nutov" aria-hidden="true">
            <span class="nv-h">{!! __('website.store.nutrition_heading', ['serving' => $p['serving']]) !!}</span>
            <span class="nv-r"><span>{{ __('website.store.calories') }}</span><b>{{ $p['kcal'] }} <small>kcal</small></b></span>
            <span class="nv-r"><span>{{ __('website.store.protein') }}</span><b>{{ $p['protein'] }} <small>{{ __('website.store.gram') }}</small></b></span>
            <span class="nv-r"><span>{{ __('website.store.fat') }}</span><b>{{ $p['fat'] }} <small>{{ __('website.store.gram') }}</small></b></span>
            <span class="nv-r"><span>{{ __('website.store.carbs') }}</span><b>{{ $p['carbs'] }} <small>{{ __('website.store.gram') }}</small></b></span>
            <span class="nv-note{{ $p['note'] === 'real' ? ' real' : '' }}">{{ $p['note'] === 'real' ? __('website.store.note_real') : __('website.store.note_est') }}</span>
          </span>
          <span class="quick">{{ __('website.store.view_product') }}</span>
        </a>
        <button class="nut-toggle" aria-label="{{ __('website.store.nutrition_aria') }}">i</button>
        <div class="meta">
          <h3>{{ $p['name'] }}</h3>
          <span class="cat">{{ $p['cat_label'] }}</span>
          <div class="p-specs">
            @if ($p['protein'] !== '' && $p['protein'] !== null)
              <div class="p-spec">
                <span>{{ __('website.main.shop.protein', ['value' => $p['protein']]) }}</span>
                <span aria-hidden="true">〰</span>
              </div>
            @endif
            @if ((int) $p['kcal'] > 0)
              <div class="p-spec">
                <span>{{ __('website.main.shop.kcal', ['value' => $p['kcal']]) }}</span>
                <span class="kcal-box">kcal</span>
              </div>
            @endif
          </div>
          <div class="pline">
            <span class="pr">{{ $p['price'] }} <x-ui.sar /></span>
            <a class="arrow" href="{{ $p['href'] }}">←</a>
          </div>
          <a class="p-view" href="{{ $p['href'] }}">{{ __('website.store.view_product') }}</a>
        </div>
      </article>
    @endforeach
  </div>
  <div class="empty" id="empty">{{ __('website.store.empty') }}</div>
</div>

@include('website.partials.mobile-apps')
</div>{{-- /.v30-mob-only --}}

@endsection

@push('scripts')
<script>
@verbatim

function failOpen(){
  try{document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});}catch(_){}
}
window.addEventListener('error',failOpen);
try{
'use strict';
var cat='all', sub='all';
var cards=Array.prototype.slice.call(document.querySelectorAll('.card'));

function apply(){
  var activeTab=document.querySelector('#tabs .tab.on');
  var hasSubs=!!(activeTab&&activeTab.getAttribute('data-subs')==='1');
  var label=activeTab?activeTab.getAttribute('data-label'):'';
  var n=0;
  cards.forEach(function(c){
    var okCat=(cat==='all')||c.getAttribute('data-cat')===cat;
    var okSub=!hasSubs||sub==='all'||c.getAttribute('data-sub')===sub;
    var show=okCat&&okSub;
    c.classList.toggle('hide',!show);
    if(show)n++;
  });
  document.getElementById('shown').textContent=n;
  document.getElementById('shownCat').textContent=(label||'ALL').toUpperCase();
  document.getElementById('empty').style.display=n?'none':'block';
  document.getElementById('subsRow').classList.toggle('show',hasSubs);
  if(window.gsap){
    var vis=cards.filter(function(c){return !c.classList.contains('hide');});
    gsap.fromTo(vis,{y:20,opacity:0},{y:0,opacity:1,duration:.5,stagger:.02,ease:'power2.out',clearProps:'all',overwrite:true});
  }
}
document.querySelectorAll('#tabs .tab').forEach(function(t){
  t.addEventListener('click',function(){
    document.querySelectorAll('#tabs .tab').forEach(function(x){x.classList.remove('on');});
    t.classList.add('on');
    cat=t.getAttribute('data-cat'); sub='all';
    document.querySelectorAll('#subsRow .sub').forEach(function(x){x.classList.toggle('on',x.getAttribute('data-sub')==='all');});
    apply();
  });
});
document.querySelectorAll('#subsRow .sub').forEach(function(s){
  s.addEventListener('click',function(){
    document.querySelectorAll('#subsRow .sub').forEach(function(x){x.classList.remove('on');});
    s.classList.add('on');
    sub=s.getAttribute('data-sub');
    apply();
  });
});
document.querySelectorAll('.nut-toggle').forEach(function(b){
  b.addEventListener('click',function(e){
    e.preventDefault();
    var card=b.closest('.card');
    var was=card.classList.contains('showN');
    document.querySelectorAll('.card.showN').forEach(function(c){c.classList.remove('showN');});
    if(!was)card.classList.add('showN');
  });
});
document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy'; img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});
}catch(err){ failOpen(); }

@endverbatim
</script>
<script>
@verbatim

try{(function(){
var b=document.getElementById('mBurger'),m=document.getElementById('mmenu');
if(!b||!m)return;
function open(){m.classList.add('open');document.body.classList.add('menu-open');}
function close(){m.classList.remove('open');document.body.classList.remove('menu-open');}
b.addEventListener('click',open);
m.querySelector('.mclose').addEventListener('click',close);
m.querySelectorAll('a').forEach(function(a){a.addEventListener('click',close);});
})();}catch(_){}

@endverbatim
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
@verbatim

try{
if(window.gsap&&!(window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches)&&!(window.matchMedia&&matchMedia('(max-width:819.98px)').matches)){
  gsap.from('.phead .rule',{scaleX:0,transformOrigin:'right center',duration:1,ease:'power3.inOut',clearProps:'all'});
  gsap.from('.phead .kick,.phead h1,.phead .lead',{y:34,opacity:0,duration:.8,stagger:.12,delay:.2,ease:'power3.out',clearProps:'all'});
  gsap.from('.phead aside div',{y:20,opacity:0,duration:.6,stagger:.1,delay:.55,ease:'power2.out',clearProps:'all'});
  gsap.from('#tabs .tab',{y:12,opacity:0,duration:.45,stagger:.06,delay:.4,ease:'power2.out',clearProps:'all'});
  gsap.from('.card',{y:30,opacity:0,duration:.6,stagger:.03,delay:.5,ease:'power3.out',clearProps:'all'});
}
}catch(_){}

@endverbatim
</script>
@endpush
