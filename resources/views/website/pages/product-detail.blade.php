@extends('website.layouts.app')

@section('title', $product['name'].' — New Me')
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-2:#1B3A61; --navy-3:#24487A;
  --white:#fff; --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478; --green-soft:#E9F7F0; --green-ink:#1F7A4D;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity .9s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.i{width:1.05em;height:1.05em;fill:currentColor;vertical-align:-0.14em;display:inline-block}

/* announce + nav */
.announce{background:var(--navy);color:#fff;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2)}
nav.main .bar{max-width:1220px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}

/* breadcrumb */
.crumb{max-width:1220px;margin:0 auto;padding:16px 20px 0;font-size:12px;font-weight:800;color:var(--muted);display:flex;gap:7px;flex-wrap:wrap;align-items:center}
.crumb a:hover{color:var(--orange-deep)}
.crumb b{color:var(--navy)}
.crumb .sep{color:var(--gray-3)}

/* ===== category bar (reference style) ===== */
.cat-bar{max-width:1220px;margin:0 auto;padding:14px 20px 18px;display:flex;gap:12px;flex-wrap:wrap;justify-content:flex-start}
.cat-chip{display:inline-flex;align-items:center;gap:10px;background:#fff;border:1.5px solid var(--orange);border-radius:10px;padding:8px 16px 8px 10px;min-height:54px;font-size:14px;font-weight:800;color:var(--orange);transition:.2s;line-height:1.2}
.cat-chip .cat-thumb{width:40px;height:40px;border-radius:6px;overflow:hidden;flex-shrink:0;background:var(--tile);display:grid;place-items:center}
.cat-chip .cat-thumb img{width:100%;height:100%;object-fit:cover}
.cat-chip .cat-thumb .i{width:18px;height:18px;color:var(--orange)}
.cat-chip:hover{background:var(--orange-soft)}
.cat-chip.on{background:var(--orange);border-color:var(--orange);color:#fff}
.cat-chip.on .cat-thumb .i{color:#fff}
.cat-chip.on:hover{filter:brightness(1.04);background:var(--orange)}

/* ===== PDP layout ===== */
.pdp-stage{background:var(--tile);border-block:1px solid var(--gray-2)}
.pdp{max-width:1220px;margin:0 auto;padding:28px 20px 48px;display:grid;gap:28px;align-items:stretch}
@media(min-width:900px){
  .pdp{grid-template-columns:1fr 1fr;gap:40px;padding:36px 24px 56px}
}

.gmain{position:relative;width:100%;aspect-ratio:1/1;overflow:hidden;background:transparent;border-radius:0}
@media(min-width:900px){.gmain{aspect-ratio:auto;align-self:stretch;height:auto;min-height:100%}}
.gmain img{position:absolute;inset:0;width:100%;height:100%;object-fit:contain;padding:4%}
.gmain .gflag{position:absolute;top:14px;inset-inline-start:14px;z-index:2;display:inline-flex;align-items:center;gap:6px;background:#fff;border-radius:999px;padding:7px 15px;font-size:11px;font-weight:900;color:var(--navy);box-shadow:0 8px 20px rgba(18,43,74,.15)}
.gmain .gflag.sale{background:var(--green);color:#fff}

/* summary — stretches with image column */
.sum{padding-top:4px;min-width:0;height:100%;display:flex;flex-direction:column}

.sum h1{font-size:clamp(26px,5.4vw,38px);margin-bottom:8px;color:var(--green-ink)}
.kcal-badge{display:inline-flex;align-items:center;gap:7px;color:var(--green-ink);font-size:13px;font-weight:800;margin-bottom:16px}
.kcal-badge .i{width:16px;height:16px;color:var(--green)}
.desc{font-size:14.5px;font-weight:600;color:var(--body);margin-bottom:14px;max-width:56ch}
.weight{font-size:14px;font-weight:800;color:var(--muted);margin-bottom:14px}
.price{font-size:26px;font-weight:900;color:var(--navy);font-family:var(--mono);margin-bottom:20px}
.price small{font-size:14px;color:var(--muted);font-weight:800;font-family:var(--font)}
.price .icon-saudi-riyal{width:0.95em;height:1.05em;margin-inline-start:4px}

/* buy controls: one row on mobile (qty + add + wish) */
.buy-block{--ctl-h:48px;--ctl-w:160px;margin-bottom:20px}
.buy-row{display:flex;align-items:center;gap:8px;flex-wrap:nowrap}
.qlbl{font-size:13.5px;font-weight:900;color:var(--navy);margin-inline-end:2px;flex-shrink:0;white-space:nowrap}
.qty{display:inline-flex;align-items:center;justify-content:space-between;width:var(--ctl-w);height:var(--ctl-h);border:2px solid var(--gray-2);border-radius:999px;background:#fff;flex:0 0 var(--ctl-w)}
.qty button{width:40px;height:100%;border:none;background:none;font-size:18px;font-weight:900;color:var(--navy);display:grid;place-items:center}
.qty b{min-width:28px;text-align:center;font-family:var(--mono);font-size:15px;color:var(--navy)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;width:var(--ctl-w);height:var(--ctl-h);min-height:var(--ctl-h);padding:0 14px;font-weight:800;font-size:13.5px;border-radius:999px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 10px 22px rgba(240,127,45,.32);white-space:nowrap;flex:0 0 var(--ctl-w)}
.btn:hover{filter:brightness(1.06)}
.btn:active{transform:scale(.97)}
.btn .i{width:17px;height:17px;flex-shrink:0}
.iconbtn{width:var(--ctl-h);height:var(--ctl-h);border-radius:50%;border:2px solid transparent;display:grid;place-items:center;transition:.2s;flex:0 0 var(--ctl-h);overflow:visible}
.iconbtn .i{width:20px;height:20px;vertical-align:0;display:block;overflow:visible}
.iconbtn.wish{background:var(--green);border-color:var(--green);color:#fff;box-shadow:0 8px 18px rgba(57,180,120,.28)}
.iconbtn.wish:hover{filter:brightness(1.06)}
.iconbtn.wish.on{background:var(--green-ink);border-color:var(--green-ink)}
@media(max-width:819.98px){
  .cat-bar{display:none!important}
  .js .aiimg,.js .aiimg.loaded,.gmain img{opacity:1!important;visibility:visible!important}
}
@media(max-width:640px){
  .buy-block{--ctl-h:42px}
  .qlbl{display:none}
  .qty{width:96px;flex:0 0 96px}
  .qty button{width:30px;font-size:16px}
  .qty b{min-width:22px;font-size:14px}
  .btn{flex:1 1 auto;width:auto;min-width:0;padding:0 10px;font-size:12px;gap:6px}
  .btn .i{width:15px;height:15px}
}

.cat-line{font-size:13.5px;font-weight:700;color:var(--body);margin-bottom:22px}
.cat-line b{color:var(--navy);font-weight:900}

/* nutrition box */
.nutbox{background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;padding:18px;margin-bottom:22px;box-shadow:0 10px 28px rgba(18,43,74,.05)}
.nutbox-head{display:flex;align-items:baseline;justify-content:space-between;gap:10px;margin-bottom:14px;padding-bottom:12px;border-bottom:1px solid var(--gray-2)}
.nutbox-head h3{color:var(--navy);font-size:15.5px;margin:0}
.nutbox-head .srv{font-size:11.5px;font-weight:800;color:var(--muted);font-family:var(--mono)}
.nutbox .grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px}
@media(min-width:420px){.nutbox .grid{grid-template-columns:repeat(4,1fr)}}
.nutbox .cell{text-align:center;background:var(--green-soft);border:1px solid #CBEBDA;border-radius:14px;padding:12px 8px}
.nutbox .cell .n{display:block;font-size:11px;font-weight:800;color:var(--green-ink);margin-bottom:6px}
.nutbox .cell .v{font-size:15px;font-weight:900;color:var(--navy);font-family:var(--mono);line-height:1.2}
.nutbox .cell .v small{display:block;margin-top:2px;font-size:10px;color:var(--muted);font-weight:700;font-family:var(--font)}
.nutbox .note{margin-top:12px;text-align:center;font-size:10.5px;font-weight:700;color:var(--muted)}
.nutbox .note.real{color:var(--green-ink)}

/* terms */
.terms h4{font-size:13.5px;color:var(--navy);margin-bottom:8px}
.terms p{font-size:12.5px;font-weight:700;color:var(--muted);line-height:1.9}

/* iPhone menu */
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;stroke:currentColor;stroke-width:2;fill:none;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}
.mmenu{position:fixed;inset:0;z-index:300;background:linear-gradient(160deg,#122B4A,#0A1B31 70%);display:flex;flex-direction:column;justify-content:center;padding:80px 34px 50px;transform:translateY(-102%);transition:transform .5s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:translateY(0)}
.mmenu::before{content:"";position:absolute;top:-120px;inset-inline-end:-100px;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.25),transparent 65%);pointer-events:none}
.mmenu .mkick{font-family:var(--mono);font-size:10px;letter-spacing:.34em;color:#FFA05C;text-transform:uppercase;margin-bottom:20px}
.mmenu a.mlink{display:block;color:#EAF1FA;font-size:27px;font-weight:900;padding:10px 0;border-bottom:1px solid rgba(255,255,255,.1)}
.mmenu a.mlink:active{color:#FFA05C}
.mmenu a.mcta{display:inline-flex;align-items:center;justify-content:center;margin-top:26px;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:15px;border-radius:999px;padding:16px 34px;box-shadow:0 14px 34px rgba(240,127,45,.4)}
.mmenu .mfoot{margin-top:auto;padding-top:28px;font-size:11px;font-weight:700;color:#8FA6C6}
.mclose{position:absolute;top:calc(20px + env(safe-area-inset-top,0px));inset-inline-end:22px;width:44px;height:44px;border-radius:50%;border:1.5px solid rgba(255,255,255,.25);background:none;color:#fff;font-size:20px;font-weight:900;display:grid;place-items:center}
body.menu-open{overflow:hidden}
@endverbatim
</style>
@endpush

@section('content')
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-leaf" viewBox="0 0 24 24"><path d="M20 4c.5 8-2.5 15-10 15-3 0-5-1.5-6-3.5C8 16 10 15 12 13c-2 .5-4 .5-6 2 .5-6 5-11 14-11z"/></symbol>
<symbol id="i-flame" viewBox="0 0 24 24"><path d="M12 2c.8 3.8 5 6.2 5 11a5 5 0 0 1-10 0c0-1.8.8-3.1 1.8-4.6.2 1.6.9 2.6 2 3.1-.9-3.2-.2-6.6 1.2-9.5z"/></symbol>
<symbol id="i-bread" viewBox="0 0 24 24"><path d="M7.5 5h9A3.5 3.5 0 0 1 20 8.5c0 1.5-.9 2.7-2 3.2V18a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-6.3c-1.1-.5-2-1.7-2-3.2A3.5 3.5 0 0 1 7.5 5z"/></symbol>
<symbol id="i-cart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></symbol>
<symbol id="i-heart" viewBox="0 0 24 24"><path d="M12 21.35 10.55 20.03C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></symbol>
</defs></svg>

@php
  $p = $product;
  $flagText = match ($p['flag'] ?? null) {
    'sale' => __('website.product_detail.flag_sale'),
    'bestseller' => __('website.product_detail.flag_bestseller'),
    'occasions' => __('website.product_detail.flag_occasions'),
    default => null,
  };
  $flagClass = ($p['flag'] ?? null) === 'sale' ? 'gflag sale' : 'gflag';
  $hasNutrition = $p['kcal'] > 0 || $p['protein'] !== '' || $p['carbs'] !== '' || $p['fat'] !== '';
@endphp

<div class="crumb">
  <a href="{{ route('website.main') }}">{{ __('website.product_detail.crumb_home') }}</a>
  <span class="sep">›</span>
  <a href="{{ route('website.store') }}">{{ __('website.product_detail.crumb_store') }}</a>
  <span class="sep">›</span>
  <b>{{ $p['name'] }}</b>
</div>

<div class="cat-bar">
  @foreach ($categories as $cat)
    <a class="cat-chip{{ $cat['slug'] === $p['cat_slug'] ? ' on' : '' }}" href="{{ route('website.store') }}">
      <span class="cat-thumb">
        @if (!empty($cat['image_url']))
          <img src="{{ $cat['image_url'] }}" alt="{{ $cat['label'] }}" loading="lazy" decoding="async">
        @else
          <svg class="i"><use href="#i-bread"/></svg>
        @endif
      </span>
      <span>{{ $cat['label'] }}</span>
    </a>
  @endforeach
</div>

<section class="pdp-stage">
<div class="pdp">
  <div class="gmain">
    @if ($flagText)<span class="{{ $flagClass }}"><svg class="i"><use href="#i-flame"/></svg> {{ $flagText }}</span>@endif
    @if ($p['image_url'])
      <img class="aiimg" src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.style.display='none'">
    @else
      <div style="position:absolute;inset:0;display:grid;place-items:center;color:var(--gray-3)"><svg style="width:80px;height:80px" fill="currentColor"><use href="#i-bread"/></svg></div>
    @endif
  </div>

  <div class="sum">
    <h1>{{ $p['name'] }}</h1>

    @if ($p['kcal'] > 0)
      <div class="kcal-badge"><svg class="i"><use href="#i-leaf"/></svg> {{ $p['kcal'] }} {{ __('website.product_detail.kcal_label') }}</div>
    @endif

    @if ($p['description'] !== '')
      <p class="desc">{{ $p['description'] }}</p>
    @endif

    @if ($p['serving'] !== '')
      <div class="weight">{{ $p['serving'] }}</div>
    @endif

    <div class="price">{{ $p['price'] }} <x-ui.sar /></div>

    <div class="buy-block">
      <div class="buy-row">
        <span class="qlbl">{{ __('website.product_detail.quantity') }}</span>
        <div class="qty">
          <button type="button" id="qMinus" aria-label="-">−</button>
          <b id="qVal">1</b>
          <button type="button" id="qPlus" aria-label="+">+</button>
        </div>
        <button class="btn" id="addCart" data-product-id="{{ $p['id'] }}"><svg class="i"><use href="#i-cart"/></svg> <span id="addCartText">{{ __('website.product_detail.add_to_cart') }}</span></button>
        <button class="iconbtn wish" id="wishBtn" title="{{ __('website.product_detail.wishlist') }}" aria-label="{{ __('website.product_detail.wishlist') }}"><svg class="i"><use href="#i-heart"/></svg></button>
      </div>
    </div>

    @if ($p['cat_label'] !== '')
      <div class="cat-line">{{ __('website.product_detail.category_label') }}: <b>{{ $p['cat_label'] }}</b></div>
    @endif

    @if ($hasNutrition)
      <div class="nutbox">
        <div class="nutbox-head">
          <h3>{{ __('website.product_detail.nutrition_title') }}</h3>
          @if ($p['serving'] !== '')
            <span class="srv">{{ $p['serving'] }}</span>
          @endif
        </div>
        <div class="grid">
          <div class="cell">
            <span class="n">{{ __('website.product_detail.kcal_label') }}</span>
            <span class="v">{{ $p['kcal'] > 0 ? $p['kcal'] : '—' }}@if ($p['kcal'] > 0)<small>kcal</small>@endif</span>
          </div>
          <div class="cell">
            <span class="n">{{ __('website.product_detail.protein') }}</span>
            <span class="v">{{ $p['protein'] !== '' ? $p['protein'] : '—' }}@if ($p['protein'] !== '')<small>{{ __('website.product_detail.gram') }}</small>@endif</span>
          </div>
          <div class="cell">
            <span class="n">{{ __('website.product_detail.carbs') }}</span>
            <span class="v">{{ $p['carbs'] !== '' ? $p['carbs'] : '—' }}@if ($p['carbs'] !== '')<small>{{ __('website.product_detail.gram') }}</small>@endif</span>
          </div>
          <div class="cell">
            <span class="n">{{ __('website.product_detail.fat') }}</span>
            <span class="v">{{ $p['fat'] !== '' ? $p['fat'] : '—' }}@if ($p['fat'] !== '')<small>{{ __('website.product_detail.gram') }}</small>@endif</span>
          </div>
        </div>
        <div class="note{{ $p['note'] === 'real' ? ' real' : '' }}">{{ $p['note'] === 'real' ? __('website.product_detail.note_real') : __('website.product_detail.note_est') }}</div>
      </div>
    @endif

    <div class="terms">
      <h4>{{ __('website.product_detail.terms_title') }}</h4>
      <p>{{ __('website.product_detail.terms_refund') }}<br>{{ __('website.product_detail.terms_shipping') }}</p>
    </div>
  </div>
</div>
</section>


@endsection

@push('scripts')
<script>
window.NM_PD = @json(['add' => __('website.product_detail.add_to_cart'), 'added' => __('website.product_detail.added')]);
</script>
<script>
@verbatim
try{
  'use strict';
  var qty=1;
  var qv=document.getElementById('qVal');
  document.getElementById('qMinus').addEventListener('click',function(){if(qty>1){qty--;qv.textContent=qty;}});
  document.getElementById('qPlus').addEventListener('click',function(){if(qty<20){qty++;qv.textContent=qty;}});

  var addBtn=document.getElementById('addCart'), addTxt=document.getElementById('addCartText');
  function meta(name){var m=document.querySelector('meta[name="'+name+'"]');return m?m.getAttribute('content'):'';}
  function updateBadge(count){
    var b=document.querySelector('[data-cart-count]');
    if(!b)return;
    b.textContent=count;
    b.classList.toggle('is-empty',!(count>0));
  }
  addBtn.addEventListener('click',function(){
    if(addBtn.disabled)return;
    addBtn.disabled=true;
    fetch(meta('cart-url'),{
      method:'POST',
      headers:{'Content-Type':'application/json','X-CSRF-TOKEN':meta('csrf-token'),'Accept':'application/json','X-Requested-With':'XMLHttpRequest'},
      body:JSON.stringify({product_id:parseInt(addBtn.getAttribute('data-product-id'),10),quantity:qty})
    }).then(function(r){return r.ok?r.json():Promise.reject(r);}).then(function(res){
      if(res&&typeof res.count!=='undefined')updateBadge(res.count);
      addTxt.textContent=(window.NM_PD&&window.NM_PD.added)||'✓';
      setTimeout(function(){addTxt.textContent=(window.NM_PD&&window.NM_PD.add)||'';addBtn.disabled=false;},1800);
    }).catch(function(){addBtn.disabled=false;});
  });

  var wish=document.getElementById('wishBtn');
  wish.addEventListener('click',function(){wish.classList.toggle('on');});

  document.querySelectorAll('img.aiimg').forEach(function(img){
    img.loading='lazy'; img.decoding='async';
    if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
    else img.addEventListener('load',function(){img.classList.add('loaded');});
  });
}catch(_){ try{document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});}catch(e){} }
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
@endpush
