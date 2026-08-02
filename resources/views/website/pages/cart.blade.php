@extends('website.layouts.app')

@section('title', __('website.cart.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-3:#24487A;
  --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
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

.announce{background:var(--navy);color:#fff;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2)}
nav.main .bar{max-width:1220px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}

.cwrap{max-width:1000px;margin:0 auto;padding:28px 20px 60px}
.cwrap h1{font-size:clamp(26px,5.4vw,38px);margin-bottom:22px}

.citem{display:grid;grid-template-columns:88px 1fr auto;gap:16px;align-items:center;background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:14px;margin-bottom:12px}
.citem .thumb{width:88px;height:88px;border-radius:14px;overflow:hidden;background:var(--tile);flex-shrink:0}
.citem .thumb img{width:100%;height:100%;object-fit:contain;padding:6px}
.citem .info h3{font-size:16px;margin-bottom:4px}
.citem .info .unit{font-size:12.5px;font-weight:700;color:var(--muted);font-family:var(--mono)}
.citem .right{display:flex;flex-direction:column;align-items:flex-end;gap:10px}
.citem .lt{font-size:16px;font-weight:900;color:var(--navy);font-family:var(--mono)}
.citem .lt small{font-size:11px;color:var(--muted);font-weight:800;font-family:var(--font)}
.qty{display:inline-flex;align-items:center;border:2px solid var(--gray-2);border-radius:999px;background:#fff}
.qty button{width:36px;height:38px;border:none;background:none;font-size:18px;font-weight:900;color:var(--navy)}
.qty b{min-width:30px;text-align:center;font-family:var(--mono);font-size:14px;color:var(--navy)}
.rm{background:none;border:none;color:var(--muted);font-size:12px;font-weight:800;display:inline-flex;align-items:center;gap:5px;padding:2px}
.rm:hover{color:#C0392B}
.rm .i{width:14px;height:14px}

@media(max-width:560px){
  .citem{grid-template-columns:66px 1fr;grid-template-areas:'thumb info' 'right right'}
  .citem .thumb{grid-area:thumb;width:66px;height:66px}
  .citem .info{grid-area:info}
  .citem .right{grid-area:right;flex-direction:row;justify-content:space-between;align-items:center;width:100%;border-top:1px solid var(--gray-2);padding-top:10px}
}

.summary{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:20px;margin-top:8px}
.summary .row{display:flex;justify-content:space-between;align-items:baseline;font-size:16px;font-weight:800;color:var(--ink);margin-bottom:16px}
.summary .row .amt{font-family:var(--mono);font-weight:900;color:var(--navy);font-size:19px;display:inline-flex;align-items:center;gap:6px}
.summary .row .amt small{font-size:12px;color:var(--muted);font-weight:800;font-family:var(--font)}
.summary .row.disc{color:var(--green-ink)}
.summary .row.disc .amt{color:var(--green-ink)}
.summary .row.total{padding-top:14px;border-top:1.5px dashed var(--gray-2)}
.summary .row.total .amt{font-size:22px}

.cpn{margin:-4px 0 16px}
.cpn-form{display:flex;gap:8px;align-items:stretch}
.cpn-form input{flex:1;min-width:0;font-family:var(--mono);font-size:13.5px;font-weight:700;color:var(--navy);background:var(--tile);border:1.5px solid var(--gray-2);border-radius:12px;padding:11px 14px;letter-spacing:.06em;text-transform:uppercase}
.cpn-form input:focus{outline:none;border-color:var(--orange);background:#fff}
.cpn-form input::placeholder{color:var(--muted);font-weight:700;letter-spacing:0;text-transform:none;font-family:var(--font)}
.cpn-form button{flex-shrink:0;border:1.5px solid var(--gray-3);background:#fff;color:var(--navy);font-weight:800;font-size:13.5px;border-radius:12px;padding:11px 18px}
.cpn-form button:hover{border-color:var(--navy)}
.cpn-on{display:flex;align-items:center;justify-content:space-between;gap:10px;background:var(--green-soft);border:1.5px solid rgba(57,180,120,.35);border-radius:12px;padding:10px 14px}
.cpn-tag{display:inline-flex;align-items:center;gap:7px;color:var(--green-ink);font-size:13px;font-weight:800}
.cpn-tag b{font-family:var(--mono);letter-spacing:.06em}
.cpn-tag .i{width:15px;height:15px;flex-shrink:0}
.cpn-on button{border:none;background:none;color:var(--muted);font-size:12px;font-weight:800;padding:2px}
.cpn-on button:hover{color:#C0392B}
.cpn-err{margin-top:8px;color:#C0392B;font-size:12.5px;font-weight:700}
.cpn[hidden],.cpn-form[hidden],.cpn-on[hidden],.cpn-err[hidden],.row[hidden]{display:none}

.actions{display:flex;gap:10px;flex-wrap:nowrap;align-items:stretch;justify-content:flex-end}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:14.5px;border-radius:999px;padding:12px 26px;min-height:46px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 10px 24px rgba(240,127,45,.32);text-align:center;line-height:1.25;white-space:nowrap}
.btn:hover{filter:brightness(1.06)}
.btn.ghost{background:#fff;color:var(--navy);border-color:var(--gray-2);box-shadow:none}
.btn.ghost:hover{border-color:var(--navy)}
.btn .i{width:17px;height:17px;flex-shrink:0}

@media(max-width:560px){
  .summary{padding:16px;border-radius:16px;position:sticky;bottom:calc(10px + var(--sab));z-index:40;box-shadow:0 10px 32px rgba(18,43,74,.12)}
  .summary .row{font-size:15px;margin-bottom:12px}
  .summary .row .amt{font-size:17px}
  .summary .row.total .amt{font-size:19px}
  .cpn{margin-bottom:12px}
  .cpn-form input,.cpn-form button{padding:9px 12px;font-size:12.5px}
  /* Narrow screens get the full row: both actions stay thumb-sized. */
  .actions{gap:8px}
  .btn{flex:1;min-height:46px;padding:10px 12px;font-size:13px;gap:6px;border-width:1.5px;box-shadow:0 8px 18px rgba(240,127,45,.28)}
  .btn .i{width:16px;height:16px}
  .btn.ghost{box-shadow:none}
}

.empty{text-align:center;padding:70px 20px}
.empty p{font-weight:800;color:var(--muted);margin-bottom:20px}

.w-foot-simple{background:#0C1F38;color:#9FB4D2;padding:36px 20px 40px;text-align:center;margin-top:20px}
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;stroke:currentColor;stroke-width:2;fill:none;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}
.mmenu{position:fixed;inset:0;z-index:300;background:linear-gradient(160deg,#122B4A,#0A1B31 70%);display:flex;flex-direction:column;justify-content:center;padding:80px 34px 50px;transform:translateY(-102%);transition:transform .5s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:translateY(0)}
.mmenu::before{content:"";position:absolute;top:-120px;inset-inline-end:-100px;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.25),transparent 65%);pointer-events:none}
.mmenu .mkick{font-family:var(--mono);font-size:10px;letter-spacing:.34em;color:#FFA05C;text-transform:uppercase;margin-bottom:20px}
.mmenu a.mlink{display:block;color:#EAF1FA;font-size:27px;font-weight:900;padding:10px 0;border-bottom:1px solid rgba(255,255,255,.1)}
.mmenu a.mcta{display:inline-flex;align-items:center;justify-content:center;margin-top:26px;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:15px;border-radius:999px;padding:16px 34px}
.mmenu .mfoot{margin-top:auto;padding-top:28px;font-size:11px;font-weight:700;color:#8FA6C6}
.mclose{position:absolute;top:calc(20px + env(safe-area-inset-top,0px));inset-inline-end:22px;width:44px;height:44px;border-radius:50%;border:1.5px solid rgba(255,255,255,.25);background:none;color:#fff;font-size:20px;font-weight:900;display:grid;place-items:center}
body.menu-open{overflow:hidden}
@endverbatim
</style>
@endpush

@section('content')
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-trash" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></symbol>
<symbol id="i-tag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0l-7.2-7.2a2 2 0 0 1-.6-1.4V4a1 1 0 0 1 1-1h8a2 2 0 0 1 1.4.6l7.4 7.4a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="7.5" r="1.5" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-lock" viewBox="0 0 24 24"><path d="M7 10V8a5 5 0 0 1 10 0v2h1a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h1zm2 0h6V8a3 3 0 0 0-6 0v2z"/></symbol>
</defs></svg>

<div class="announce">{!! __('website.store.announce') !!}</div>

@include('website.partials.nav', ['active' => 'store', 'showCart' => true])

<div class="cwrap">
  <h1>{{ __('website.cart.heading') }}</h1>

  @if ($items->isEmpty())
    <div class="empty" id="emptyState">
      <p>{{ __('website.cart.empty') }}</p>
      <a class="btn" href="{{ route('website.store') }}">{{ __('website.cart.empty_cta') }}</a>
    </div>
  @else
    <div id="cartList">
      @foreach ($items as $item)
        <div class="citem" data-row data-id="{{ $item['id'] }}" data-unit="{{ $item['unit_price'] }}" data-url="{{ route('website.cart.update', $item['id']) }}">
          <a class="thumb" href="{{ $item['url'] }}">
            @if ($item['image_url'])<img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" onerror="this.style.display='none'">@endif
          </a>
          <div class="info">
            <h3><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></h3>
            <div class="unit">{{ $item['unit_price_display'] }} <x-ui.sar /></div>
          </div>
          <div class="right">
            <div class="qty">
              <button type="button" data-dec aria-label="-">−</button>
              <b data-qty>{{ $item['qty'] }}</b>
              <button type="button" data-inc aria-label="+">+</button>
            </div>
            <div class="lt"><span data-line>{{ $item['line_total_display'] }}</span> <x-ui.sar /></div>
            <button type="button" class="rm" data-remove><svg class="i"><use href="#i-trash"/></svg> {{ __('website.cart.remove') }}</button>
          </div>
        </div>
      @endforeach
    </div>

    <div class="summary">
      <div class="row">
        <span>{{ __('website.cart.subtotal') }}</span>
        <span class="amt"><span id="subtotal">{{ $subtotal }}</span> <x-ui.sar /></span>
      </div>

      <div class="cpn" data-coupon
           data-apply="{{ route('website.cart.coupon.store') }}"
           data-remove="{{ route('website.cart.coupon.destroy') }}">
        <div class="cpn-form" data-coupon-form @if ($couponCode) hidden @endif>
          <input type="text" data-coupon-input dir="ltr" autocomplete="off"
                 placeholder="{{ __('website.cart.coupon_placeholder') }}"
                 aria-label="{{ __('website.cart.coupon_label') }}">
          <button type="button" data-coupon-apply>{{ __('website.cart.coupon_apply') }}</button>
        </div>
        <div class="cpn-on" data-coupon-applied @unless ($couponCode) hidden @endunless>
          <span class="cpn-tag"><svg class="i"><use href="#i-tag"/></svg> <b data-coupon-code>{{ $couponCode }}</b></span>
          <button type="button" data-coupon-clear>{{ __('website.cart.coupon_remove') }}</button>
        </div>
        <p class="cpn-err" data-coupon-error hidden></p>
      </div>

      <div class="row disc" data-discount-row @unless ($couponCode) hidden @endunless>
        <span>{{ __('website.cart.discount') }}</span>
        <span class="amt">−<span id="discount">{{ $discount }}</span> <x-ui.sar /></span>
      </div>

      <div class="row total" data-total-row @unless ($couponCode) hidden @endunless>
        <span>{{ __('website.cart.total') }}</span>
        <span class="amt"><span id="total">{{ $total }}</span> <x-ui.sar /></span>
      </div>

      <div class="actions">
        <a class="btn ghost" href="{{ route('website.store') }}">{{ __('website.cart.continue') }}</a>
        <a class="btn" href="{{ auth()->check() && auth()->user()->isCustomer() ? route('website.checkout') : route('website.login', ['next' => 'checkout']) }}">
          <svg class="i"><use href="#i-lock"/></svg> {{ __('website.cart.checkout') }}
        </a>
      </div>
    </div>
  @endif
</div>

@include('website.partials.footer', ['variant' => 'simple'])

@include('website.partials.mobile-menu')
@endsection

@push('scripts')
<script>
@verbatim
try{
  'use strict';
  function meta(n){var m=document.querySelector('meta[name="'+n+'"]');return m?m.getAttribute('content'):'';}
  var cur=' ';
  function money(minor){return (minor/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});}
  function badge(count){var b=document.querySelector('[data-cart-count]');if(b){b.textContent=count;b.classList.toggle('is-empty',!(count>0));}}

  function send(url,method,body){
    return fetch(url,{
      method:method,
      headers:{'Content-Type':'application/json','X-CSRF-TOKEN':meta('csrf-token'),'Accept':'application/json','X-Requested-With':'XMLHttpRequest'},
      body:body?JSON.stringify(body):null
    }).then(function(r){return r.ok?r.json():Promise.reject(r);});
  }

  function text(id,val){var el=document.getElementById(id);if(el)el.textContent=val;}
  function show(el,on){if(el)el.hidden=!on;}

  function refreshTotals(res){
    if(!res)return;
    if(typeof res.count!=='undefined')badge(res.count);
    if(typeof res.subtotal!=='undefined')text('subtotal',res.subtotal);
    if(typeof res.discount!=='undefined')text('discount',res.discount);
    if(typeof res.total!=='undefined')text('total',res.total);

    var box=document.querySelector('[data-coupon]');
    if(!box||typeof res.coupon_code==='undefined')return;
    var on=!!res.coupon_code;
    if(on){var c=box.querySelector('[data-coupon-code]');if(c)c.textContent=res.coupon_code;}
    show(box.querySelector('[data-coupon-form]'),!on);
    show(box.querySelector('[data-coupon-applied]'),on);
    show(document.querySelector('[data-discount-row]'),on);
    show(document.querySelector('[data-total-row]'),on);
  }

  (function bindCoupon(){
    var box=document.querySelector('[data-coupon]');
    if(!box)return;
    var input=box.querySelector('[data-coupon-input]');
    var err=box.querySelector('[data-coupon-error]');

    function fail(message){
      if(!err)return;
      err.textContent=message||'';
      err.hidden=!message;
    }

    function apply(){
      var code=(input.value||'').trim();
      if(!code)return;
      fail('');
      send(box.getAttribute('data-apply'),'POST',{code:code}).then(function(res){
        input.value='';
        refreshTotals(res);
      }).catch(function(r){
        if(r&&typeof r.json==='function'){
          r.json().then(function(body){fail(body&&body.message);}).catch(function(){fail(' ');});
          return;
        }
        fail(' ');
      });
    }

    box.querySelector('[data-coupon-apply]').addEventListener('click',apply);
    input.addEventListener('keydown',function(e){if(e.key==='Enter'){e.preventDefault();apply();}});
    box.querySelector('[data-coupon-clear]').addEventListener('click',function(){
      fail('');
      send(box.getAttribute('data-remove'),'DELETE').then(refreshTotals).catch(function(){});
    });
  })();

  function bindRow(row){
    var id=row.getAttribute('data-id');
    var url=row.getAttribute('data-url');
    var unit=parseInt(row.getAttribute('data-unit'),10)||0;
    var qEl=row.querySelector('[data-qty]');
    var lineEl=row.querySelector('[data-line]');

    function setQty(q){
      if(q<1)q=1; if(q>20)q=20;
      send(url,'PATCH',{quantity:q}).then(function(res){
        qEl.textContent=q;
        lineEl.textContent=money(unit*q);
        refreshTotals(res);
      }).catch(function(){});
    }
    row.querySelector('[data-dec]').addEventListener('click',function(){setQty((parseInt(qEl.textContent,10)||1)-1);});
    row.querySelector('[data-inc]').addEventListener('click',function(){setQty((parseInt(qEl.textContent,10)||1)+1);});
    row.querySelector('[data-remove]').addEventListener('click',function(){
      send(url,'DELETE').then(function(res){
        row.parentNode.removeChild(row);
        refreshTotals(res);
        if(!document.querySelector('[data-row]'))location.reload();
      }).catch(function(){});
    });
  }
  document.querySelectorAll('[data-row]').forEach(bindRow);
}catch(_){}
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
