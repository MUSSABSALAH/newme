@extends('website.layouts.app')

@section('title', __('website.terms.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-2:#1B3A61; --navy-3:#24487A;
  --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478; --green-soft:#E9F7F0;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.9;font-size:15px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3{color:var(--navy);font-weight:900;line-height:1.25;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
.i{width:1em;height:1em;fill:currentColor;vertical-align:-.12em}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:14px;border-radius:999px;padding:12px 24px;border:2px solid var(--orange);background:var(--grad);color:#fff;box-shadow:0 12px 28px rgba(240,127,45,.35)}
.btn.sm{padding:11px 20px;font-size:13.5px}

/* reading progress */
.progress{position:fixed;top:0;inset-inline:0;height:3.5px;z-index:200;background:transparent}
.progress i{display:block;height:100%;width:0%;background:var(--grad);box-shadow:0 0 12px rgba(240,127,45,.6)}

.announce{background:var(--navy);color:#fff;text-align:center;padding:9px 14px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2);padding-top:var(--sat)}
nav.main .bar{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo .mark{width:34px;height:34px;border-radius:50%;background:conic-gradient(from 210deg,var(--navy-3),var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%, rgba(255,255,255,.9), rgba(255,255,255,.2) 36%, transparent 60%)}
.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:18px;font-weight:800;font-size:13px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}

/* hero */
.thero{background:var(--navy);color:#fff;padding:56px 20px 46px;position:relative;overflow:hidden}
.thero::before{content:"";position:absolute;top:-160px;inset-inline-end:-120px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.28),transparent 65%)}
.thero .in{max-width:1140px;margin:0 auto;position:relative;z-index:2}
.thero .kick{font-family:var(--mono);font-size:10.5px;letter-spacing:.3em;color:var(--orange-hi);text-transform:uppercase;font-weight:800}
.thero h1{color:#fff;font-size:clamp(34px,7.5vw,64px);margin:10px 0 8px}
.thero p{font-size:14px;color:#B9C9E2;font-weight:600;max-width:560px}
.tfacts{display:flex;gap:10px;flex-wrap:wrap;margin-top:22px}
.tf{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:9px 16px;font-family:var(--mono);font-size:10.5px;letter-spacing:.08em;color:#C7D6EC}
.tf b{color:var(--orange-hi);font-weight:700}

/* layout */
.tl{max-width:1140px;margin:0 auto;padding:36px 20px 80px;display:grid;gap:34px}
@media(min-width:960px){.tl{grid-template-columns:280px 1fr;align-items:start}}
.toc{display:none}
@media(min-width:960px){.toc{display:block;position:sticky;top:calc(84px + var(--sat));max-height:calc(100vh - 120px);overflow-y:auto;padding-inline-end:8px}}
.toc h3{font-size:11px;font-family:var(--mono);letter-spacing:.2em;color:var(--muted);text-transform:uppercase;margin-bottom:12px}
.toc a{display:flex;gap:10px;align-items:baseline;padding:7px 10px;border-radius:10px;font-size:12px;font-weight:800;color:var(--body);transition:.15s;border-inline-start:2.5px solid transparent}
.toc a small{font-family:var(--mono);font-size:9.5px;color:var(--muted);min-width:20px}
.toc a:hover{background:#fff}
.toc a.on{background:#fff;color:var(--navy);border-color:var(--orange)}
.toc a.on small{color:var(--orange-deep)}

.tsec{background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;padding:26px 26px 24px;margin-bottom:16px;scroll-margin-top:calc(90px + var(--sat))}
.tsec .th{display:flex;align-items:center;gap:14px;margin-bottom:12px}
.tsec .num{flex-shrink:0;width:44px;height:44px;border-radius:13px;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;font-family:var(--mono);font-size:14px;font-weight:700}
.tsec h2{font-size:clamp(17px,3.6vw,21px)}
.tsec p{font-size:13.8px;font-weight:600;margin-bottom:8px}
.tsec ul{list-style:none;display:grid;gap:8px;margin:4px 0 6px}
.tsec li{position:relative;padding-inline-start:20px;font-size:13.5px;font-weight:600}
.tsec li::before{content:"";position:absolute;top:11px;inset-inline-start:2px;width:7px;height:7px;border-radius:50%;background:var(--orange)}
.tsec b{color:var(--ink)}
.callout{background:var(--orange-soft);border:1.5px solid rgba(240,127,45,.3);border-radius:14px;padding:13px 16px;font-size:12.5px;font-weight:800;color:var(--ink);margin:12px 0 4px;display:flex;gap:10px}
.callout.green{background:var(--green-soft);border-color:rgba(57,180,120,.35)}
.callout .em{font-size:16px;flex-shrink:0}
.keynums{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin:14px 0 4px}
@media(min-width:640px){.keynums{grid-template-columns:repeat(4,1fr)}}
.kn{background:var(--tile);border-radius:13px;padding:12px 8px;text-align:center}
.kn b{display:block;font-family:var(--mono);font-size:17px;color:var(--navy);font-weight:700}
.kn b em{font-style:normal;color:var(--orange-deep)}
.kn span{font-size:9.5px;font-weight:800;color:var(--muted)}
.tnote{font-family:var(--mono);font-size:10px;letter-spacing:.08em;color:var(--muted);text-align:center;margin-top:18px}

.toTop{position:fixed;bottom:calc(22px + var(--sab));inset-inline-start:22px;z-index:95;width:48px;height:48px;border-radius:50%;background:var(--navy);color:#fff;border:none;font-size:17px;box-shadow:0 14px 34px rgba(18,43,74,.35);opacity:0;pointer-events:none;transition:.3s}
.toTop.show{opacity:1;pointer-events:auto}

footer{background:#0C1F38;color:#9FB4D2;padding:34px 20px calc(38px + var(--sab));text-align:center}
footer .flinks{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;font-size:13px;font-weight:800;margin-bottom:12px}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:11px;font-weight:600;color:#6E84A5;line-height:2}

.mmenu{position:fixed;inset:0;z-index:220;background:var(--bg);display:flex;flex-direction:column;padding:calc(16px + var(--sat)) 24px calc(28px + var(--sab));transform:translateY(-103%);transition:transform .55s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:none}
.mmenu .mtop{display:flex;justify-content:space-between;align-items:center;margin-bottom:6vh}
.mclose{width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);font-size:20px;font-weight:900;display:grid;place-items:center}
.mlink{display:flex;justify-content:space-between;align-items:baseline;padding:14px 2px;border-bottom:1px solid var(--gray-2);font-size:clamp(23px,6.4vw,32px);font-weight:900;color:var(--navy)}
.mlink small{font-family:var(--mono);font-size:11px;color:var(--orange-deep);font-weight:700;letter-spacing:.14em}
body.mlock{overflow:hidden}
.js .tsec{opacity:0;transform:translateY(18px);transition:opacity .55s ease,transform .55s ease}
.js .tsec.in{opacity:1;transform:none}
@media (prefers-reduced-motion: reduce){.js .tsec{opacity:1;transform:none;transition:none}}
@endverbatim
</style>
@endpush

@section('content')
<div class="progress"><i id="pbar"></i></div>

<div class="announce">{!! __('website.terms.announce') !!}</div>

@include('website.partials.nav', ['active' => 'terms', 'showCart' => false])

<header class="thero">
  <div class="in">
    <span class="kick">{{ __('website.terms.kick') }}</span>
    <h1>{{ __('website.terms.h1') }}</h1>
    <p>{{ __('website.terms.lead') }}</p>
    <div class="tfacts">
      <span class="tf">CR <b>7043404750</b></span>
      <span class="tf">VAT <b>312782087600003</b></span>
      <span class="tf">EFFECTIVE <b>10.06.2026</b></span>
      <span class="tf">SECTIONS <b>{{ count(__('website.terms.sections')) }}</b></span>
    </div>
  </div>
</header>

<div class="tl">
  <aside class="toc" id="toc"><h3>{{ __('website.terms.toc_title') }}</h3></aside>
  <main id="tmain">
    @foreach (__('website.terms.sections') as $i => $sec)
    <section class="tsec" id="s{{ $i + 1 }}"><div class="th"><span class="num">{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</span><h2>{{ $sec['title'] }}</h2></div>
      {!! $sec['html'] !!}
    </section>
    @endforeach

    <div class="tnote">{{ __('website.terms.note') }}</div>
  </main>
</div>

<button class="toTop" id="toTop" aria-label="{{ __('website.terms.to_top') }}">↑</button>

@include('website.partials.footer', ['variant' => 'simple'])

@include('website.partials.mobile-menu')

@endsection

@push('scripts')
<script>
@verbatim

function failOpen(){try{document.querySelectorAll('.tsec').forEach(function(s){s.classList.add('in');});}catch(_){}}
window.addEventListener('error',failOpen);
try{
'use strict';
/* TOC build */
var toc=document.getElementById('toc');
var secs=Array.prototype.slice.call(document.querySelectorAll('.tsec'));
secs.forEach(function(s,i){
  var a=document.createElement('a');
  a.href='#'+s.id;
  a.innerHTML='<small>'+(i+1<10?'0':'')+(i+1)+'</small>'+s.querySelector('h2').textContent;
  toc.appendChild(a);
});
var tlinks=toc.querySelectorAll('a');
/* progress + active section + toTop */
function onScroll(){
  var h=document.documentElement;
  var p=h.scrollTop/(h.scrollHeight-h.clientHeight)*100;
  document.getElementById('pbar').style.width=p+'%';
  document.getElementById('toTop').classList.toggle('show',h.scrollTop>600);
  var cur=0;
  secs.forEach(function(s,i){if(s.getBoundingClientRect().top<160)cur=i;});
  tlinks.forEach(function(a,i){a.classList.toggle('on',i===cur);});
}
window.addEventListener('scroll',onScroll,{passive:true});
onScroll();
document.getElementById('toTop').addEventListener('click',function(){window.scrollTo({top:0,behavior:'smooth'});});
/* reveals */
if('IntersectionObserver' in window){
  var rio=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');rio.unobserve(e.target);}});},{threshold:.08});
  secs.forEach(function(el){rio.observe(el);});
}else{failOpen();}
/* menu */
(function(){
  var b=document.getElementById('mBurger'),m=document.getElementById('mmenu');
  if(!b||!m)return;
  function set(o){m.classList.toggle('open',o);document.body.classList.toggle('mlock',o);}
  b.addEventListener('click',function(){set(true);});
  m.querySelector('.mclose').addEventListener('click',function(){set(false);});
  m.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){set(false);});});
})();
}catch(err){failOpen();}

@endverbatim
</script>
@endpush
