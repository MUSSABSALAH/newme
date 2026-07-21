@extends('website.layouts.app')

@section('title', __('website.home.title'))
@section('theme', '#0A1B31')

@push('styles')
<style>
@verbatim
:root{
  --navy:#0A1B31; --navy-2:#122B4A; --navy-3:#1B3A61;
  --ink:#EAF1FA; --dim:#8FA6C6; --line:rgba(255,255,255,.14);
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C;
  --green:#39B478;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--navy);color:var(--dim);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity 1.1s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
h1,h2{color:var(--ink);font-weight:900;letter-spacing:-.02em;line-height:1.05}
.mono{font-family:var(--mono)}

/* ===== grain ===== */
body::after{content:"";position:fixed;inset:-50%;z-index:120;pointer-events:none;opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='240' height='240'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='240' height='240' filter='url(%23n)' opacity='0.6'/%3E%3C/svg%3E");
  animation:grain 7s steps(10) infinite}
@keyframes grain{0%,100%{transform:translate(0,0)}20%{transform:translate(-4%,3%)}40%{transform:translate(3%,-4%)}60%{transform:translate(-3%,-2%)}80%{transform:translate(4%,2%)}}

/* ===== preloader ===== */
.pre{position:fixed;inset:0;z-index:200;display:grid;place-items:center;background:var(--navy)}
.pre .inner{text-align:center}
.pre .batch{font-family:var(--mono);font-size:11px;letter-spacing:.35em;color:var(--dim);margin-bottom:14px;text-transform:uppercase}
.pre .num{font-family:var(--mono);font-size:clamp(64px,16vw,130px);font-weight:700;color:var(--ink);line-height:1}
.pre .num em{font-style:normal;color:var(--orange)}
.pre .bar{width:min(300px,60vw);height:2px;background:var(--line);margin:22px auto 0;position:relative;overflow:hidden}
.pre .bar i{position:absolute;inset-block:0;inset-inline-start:0;width:0%;background:var(--grad)}
.curtain{position:fixed;inset-inline:0;height:50.5vh;z-index:190;background:var(--navy-2);transition:transform 1s cubic-bezier(.77,0,.18,1)}
.curtain.top{top:0;border-bottom:1px solid var(--line)}
.curtain.bot{bottom:0;border-top:1px solid var(--line)}
.done .curtain.top{transform:translateY(-101%)}
.done .curtain.bot{transform:translateY(101%)}
.done .pre{opacity:0;pointer-events:none;transition:opacity .5s .2s}

/* ===== top bar ===== */
.tbar{position:fixed;top:0;inset-inline:0;z-index:110;display:flex;justify-content:space-between;align-items:center;padding:calc(18px + var(--sat)) 26px 14px;mix-blend-mode:normal}
.logo{display:inline-flex;align-items:center;gap:10px;line-height:0}
.logo__img{display:block;height:34px;width:auto;max-width:140px;object-fit:contain;filter:brightness(0) invert(1)}
.logo b{font-size:18px;color:var(--ink);font-weight:900}
.skip{font-size:12px;font-weight:800;color:var(--dim);border:1px solid var(--line);border-radius:999px;padding:9px 20px;transition:.25s;letter-spacing:.04em}
.skip:hover{color:var(--ink);border-color:var(--orange);background:rgba(240,127,45,.08)}

/* ===== hero ===== */
.hero{min-height:100vh;min-height:100svh;position:relative;display:grid;place-items:center;overflow:hidden;padding:100px 20px 130px}
.orb{position:absolute;border-radius:50%;filter:blur(70px);opacity:.5;pointer-events:none}
.orb.o1{width:560px;height:560px;background:radial-gradient(circle,rgba(240,127,45,.4),transparent 65%);top:-160px;inset-inline-end:-120px;animation:drift1 14s ease-in-out infinite}
.orb.o2{width:460px;height:460px;background:radial-gradient(circle,rgba(36,72,122,.8),transparent 65%);bottom:-140px;inset-inline-start:-100px;animation:drift2 17s ease-in-out infinite}
@keyframes drift1{0%,100%{transform:translate(0,0)}50%{transform:translate(-50px,40px)}}
@keyframes drift2{0%,100%{transform:translate(0,0)}50%{transform:translate(60px,-40px)}}
.hgrid{position:absolute;inset:0;background-image:linear-gradient(var(--line) 1px,transparent 1px),linear-gradient(90deg,var(--line) 1px,transparent 1px);background-size:90px 90px;opacity:.14;mask-image:radial-gradient(ellipse 75% 65% at 50% 45%,#000 30%,transparent 75%);-webkit-mask-image:radial-gradient(ellipse 75% 65% at 50% 45%,#000 30%,transparent 75%)}
.hero-inner{position:relative;z-index:5;text-align:center;max-width:1000px}
.hkick{display:inline-flex;align-items:center;gap:10px;font-family:var(--mono);font-size:11px;letter-spacing:.3em;color:var(--orange-hi);text-transform:uppercase;margin-bottom:26px}
.hkick::before,.hkick::after{content:"";width:44px;height:1px;background:var(--orange);opacity:.6}
.hero h1{font-size:clamp(52px,12.5vw,150px)}
.hero h1 .ln{display:block;overflow:hidden}
.hero h1 .ln span{display:inline-block}
.hero h1 em{font-style:normal;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.hsub{font-size:clamp(14px,2.4vw,18px);font-weight:600;color:var(--dim);max-width:560px;margin:24px auto 0}
.hsub b{color:var(--ink)}
.hctas{display:flex;justify-content:center;gap:14px;flex-wrap:wrap;margin-top:38px}
.enter{position:relative;display:inline-flex;align-items:center;gap:10px;background:var(--grad);color:#fff;font-weight:900;font-size:16px;border-radius:999px;padding:18px 42px;box-shadow:0 18px 46px rgba(240,127,45,.4);overflow:hidden;transition:.2s}
.enter::before{content:"";position:absolute;top:0;bottom:0;width:60px;background:linear-gradient(105deg,transparent,rgba(255,255,255,.5),transparent);inset-inline-start:-80px;animation:shine 3.2s ease-in-out infinite}
@keyframes shine{0%,60%{inset-inline-start:-80px}100%{inset-inline-start:120%}}
.enter:active{transform:scale(.97)}
.ghost{display:inline-flex;align-items:center;gap:8px;color:var(--ink);font-weight:800;font-size:14.5px;border:1.5px solid var(--line);border-radius:999px;padding:16px 30px;transition:.25s}
.ghost:hover{border-color:var(--orange);color:var(--orange-hi)}
/* floating chips */
.fchip{position:absolute;z-index:4;background:rgba(18,43,74,.55);border:1px solid var(--line);border-radius:16px;padding:12px 18px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);box-shadow:0 20px 50px rgba(0,0,0,.35);animation:floaty 6s ease-in-out infinite}
.fchip b{display:block;font-family:var(--mono);font-size:19px;color:var(--ink);font-weight:700;line-height:1.2}
.fchip b em{font-style:normal;color:var(--orange-hi)}
.fchip span{font-size:10.5px;font-weight:800;color:var(--dim);letter-spacing:.04em}
.fchip.c1{top:22%;inset-inline-start:7%;animation-delay:0s}
.fchip.c2{top:30%;inset-inline-end:6%;animation-delay:1.6s}
.fchip.c3{bottom:24%;inset-inline-start:12%;animation-delay:.9s}
.fchip.c4{bottom:20%;inset-inline-end:11%;animation-delay:2.3s}
@keyframes floaty{0%,100%{transform:translateY(0)}50%{transform:translateY(-14px)}}
@media(max-width:820px){.fchip.c1,.fchip.c2{display:none}.fchip.c3{bottom:16%;inset-inline-start:6%}.fchip.c4{bottom:12%;inset-inline-end:6%}}
/* countdown */
.count{position:absolute;bottom:96px;inset-inline:0;z-index:5;text-align:center;font-family:var(--mono);font-size:11px;letter-spacing:.22em;color:var(--dim);text-transform:uppercase}
.count b{color:var(--ink);font-weight:700}
.count em{font-style:normal;color:var(--orange-hi)}
/* scroll hint */
.shint{position:absolute;bottom:calc(58px + var(--sab));inset-inline:0;display:grid;place-items:center;z-index:5}
.shint i{width:1.5px;height:34px;background:linear-gradient(var(--orange),transparent);display:block;animation:hint 1.8s ease-in-out infinite}
@keyframes hint{0%{transform:scaleY(0);transform-origin:top}45%{transform:scaleY(1);transform-origin:top}55%{transform:scaleY(1);transform-origin:bottom}100%{transform:scaleY(0);transform-origin:bottom}}

/* ===== marquee ===== */
.mq{position:absolute;bottom:0;inset-inline:0;z-index:6;border-top:1px solid var(--line);background:rgba(10,27,49,.7);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);overflow:hidden;padding:13px 0}
.mq .track{display:flex;gap:0;white-space:nowrap;width:max-content;animation:mq 26s linear infinite}
.mq span{font-family:var(--mono);font-size:12px;letter-spacing:.24em;color:var(--dim);text-transform:uppercase;padding:0 26px;border-inline-start:1px solid var(--line)}
.mq span em{font-style:normal;color:var(--orange-hi)}
@keyframes mq{to{transform:translateX(50%)}}

/* ===== doors ===== */
.doors{padding:110px 24px 90px;max-width:1240px;margin:0 auto}
.dhead{text-align:center;margin-bottom:54px}
.dhead .k{font-family:var(--mono);font-size:11px;letter-spacing:.3em;color:var(--orange-hi);text-transform:uppercase}
.dhead h2{font-size:clamp(30px,6.5vw,58px);margin-top:10px}
.dgrid{display:grid;gap:16px;grid-template-columns:1fr}
@media(min-width:860px){.dgrid{grid-template-columns:repeat(3,1fr)}}
.door{position:relative;display:block;border:1px solid var(--line);border-radius:22px;overflow:hidden;min-height:420px;transition:border-color .3s}
.door .bg{position:absolute;inset:0}
.door .bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(10,27,49,.25),rgba(10,27,49,.92) 78%)}
.door .bg img{transition:transform .8s cubic-bezier(.2,.7,.2,1)}
.door:hover .bg img{transform:scale(1.07)}
.door:hover{border-color:var(--orange)}
.door .cnt{position:absolute;inset-inline:0;bottom:0;padding:26px;z-index:2}
.door .n{font-family:var(--mono);font-size:11px;letter-spacing:.28em;color:var(--orange-hi)}
.door h3{color:var(--ink);font-size:26px;font-weight:900;margin:8px 0 6px}
.door p{font-size:13px;font-weight:600;color:var(--dim)}
.door .go{display:inline-flex;align-items:center;gap:8px;margin-top:16px;color:var(--ink);font-weight:900;font-size:13.5px;border-bottom:2px solid var(--orange);padding-bottom:3px;transition:gap .25s}
.door:hover .go{gap:14px}

/* mini footer */
.mfoot{border-top:1px solid var(--line);padding:26px 24px calc(30px + var(--sab));display:flex;justify-content:space-between;align-items:center;gap:14px;flex-wrap:wrap;max-width:1240px;margin:0 auto}
.mfoot small{font-size:11px;font-weight:600;color:var(--dim);letter-spacing:.03em}
.mfoot .soc{display:flex;gap:18px;font-size:12px;font-weight:800;color:var(--dim)}
.mfoot .soc a:hover{color:var(--orange-hi)}

.js .rv{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
.js .rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion: reduce){
  .js .rv{opacity:1;transform:none;transition:none}
  .orb,.fchip,.enter::before,.mq .track,.shint i,body::after{animation:none}
}
@endverbatim
</style>
@endpush

@section('content')
<!-- PRELOADER + CURTAINS -->
<div class="pre" id="pre">
  <div class="inner">
    <div class="batch">BATCH NM-26 — BAKED 05:00</div>
    <div class="num"><em id="preNum">00</em><span style="color:var(--dim);font-size:.4em"> %</span></div>
    <div class="bar"><i id="preBar"></i></div>
  </div>
</div>
<div class="curtain top"></div>
<div class="curtain bot"></div>

<!-- TOP BAR -->
<div class="tbar">
  @include('website.partials.logo', ['href' => route('website.home')])
  <div class="row" style="display:flex;align-items:center;gap:10px">
    @include('website.partials.lang-toggle', ['class' => 'on-dark'])
    <a class="skip" href="/main">{{ __('website.home.skip') }}</a>
  </div>
</div>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="orb o1" data-depth="14"></div>
  <div class="orb o2" data-depth="10"></div>
  <div class="hgrid"></div>

  <div class="fchip c1" data-depth="26"><b>{!! __('website.home.chip1_value') !!}</b><span>{{ __('website.home.chip1') }}</span></div>
  <div class="fchip c2" data-depth="34"><b><em>119</em></b><span>{{ __('website.home.chip2') }}</span></div>
  <div class="fchip c3" data-depth="22"><b>05:00</b><span>{{ __('website.home.chip3') }}</span></div>
  <div class="fchip c4" data-depth="30"><b>≤<em>48</em>h</b><span>{{ __('website.home.chip4') }}</span></div>

  <div class="hero-inner" data-depth="6">
    <div class="hkick">{{ __('website.home.hero_kick') }}</div>
    <h1>
      <span class="ln"><span id="w1">{{ __('website.home.hero_line1') }}</span></span>
      <span class="ln"><span id="w2">{!! __('website.home.hero_line2') !!}</span></span>
    </h1>
    <p class="hsub">{!! __('website.home.hero_sub') !!}</p>
    <div class="hctas">
      <a class="enter" href="/main">{{ __('website.home.cta_enter') }}</a>
      <a class="ghost" href="/subscribe">{{ __('website.home.cta_ghost') }}</a>
    </div>
  </div>

  <div class="count">{{ __('website.home.count_prefix') }} <b id="cd">—</b> · <em>BATCH NM-27</em></div>
  <div class="shint"><i></i></div>

  <div class="mq"><div class="track" id="mqTrack">
    @foreach (__('website.home.marquee') as $item)<span>{!! $item !!}</span>@endforeach
  </div></div>
</section>

<!-- DOORS -->
<section class="doors">
  <div class="dhead rv">
    <span class="k">THREE DOORS — {{ __('website.home.doors_kick') }}</span>
    <h2>{{ __('website.home.doors_title') }}</h2>
  </div>
  <div class="dgrid">
    <a class="door rv" href="/store">
      <span class="bg"><img class="aiimg" src="{{ asset('assets/images/p171_700x900.jpg') }}" alt="" onerror="this.remove()"></span>
      <span class="cnt"><span class="n">01 — STORE</span><h3>{{ __('website.home.door_store_title') }}</h3><p>{{ __('website.home.door_store_text') }}</p><span class="go">{{ __('website.home.door_store_go') }}</span></span>
    </a>
    <a class="door rv" href="/subscribe">
      <span class="bg"><img class="aiimg" src="{{ asset('assets/images/p172_700x900.jpg') }}" alt="" onerror="this.remove()"></span>
      <span class="cnt"><span class="n">02 — SUBSCRIBE</span><h3>{{ __('website.home.door_sub_title') }}</h3><p>{{ __('website.home.door_sub_text') }}</p><span class="go">{{ __('website.home.door_sub_go') }}</span></span>
    </a>
    <a class="door rv" href="/main">
      <span class="bg"><img class="aiimg" src="{{ asset('assets/images/p173_700x900.jpg') }}" alt="" onerror="this.remove()"></span>
      <span class="cnt"><span class="n">03 — STORY</span><h3>{{ __('website.home.door_story_title') }}</h3><p>{{ __('website.home.door_story_text') }}</p><span class="go">{{ __('website.home.door_story_go') }}</span></span>
    </a>
  </div>
</section>

<div class="mfoot">
  <small>{{ __('website.home.foot_copy') }}</small>
  <div class="soc"><a href="https://wa.me/966533360317">{{ __('website.home.soc_whatsapp') }}</a><a href="https://www.instagram.com/newme.forever/">{{ __('website.home.soc_instagram') }}</a><a href="/main#faq">{{ __('website.home.soc_faq') }}</a></div>
</div>
@endsection

@push('scripts')
<script>
@verbatim

function failOpen(){
  try{
    document.documentElement.classList.add('done');
    document.querySelectorAll('.rv').forEach(function(r){r.classList.add('in');});
    document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});
    var p=document.getElementById('pre'); if(p)p.style.display='none';
  }catch(_){}
}
window.addEventListener('error',failOpen);
try{
'use strict';

/* ===== preloader counter + curtain reveal ===== */
var n=0, num=document.getElementById('preNum'), bar=document.getElementById('preBar');
var pt=setInterval(function(){
  n=Math.min(100,n+Math.ceil(Math.random()*7));
  num.textContent=(n<10?'0':'')+n;
  bar.style.width=n+'%';
  if(n>=100){
    clearInterval(pt);
    setTimeout(function(){document.documentElement.classList.add('done');},250);
    setTimeout(introPlay,650);
  }
},60);
/* absolute fallback: never trap the user */
setTimeout(function(){document.documentElement.classList.add('done');},4500);

/* ===== marquee duplication ===== */
var tr=document.getElementById('mqTrack');
tr.innerHTML+=tr.innerHTML+tr.innerHTML;

/* ===== live countdown to next 05:00 bake ===== */
function cd(){
  var now=new Date(), next=new Date(now);
  next.setHours(5,0,0,0);
  if(next<=now)next.setDate(next.getDate()+1);
  var d=Math.floor((next-now)/1000);
  var h=Math.floor(d/3600), m=Math.floor(d%3600/60), s=d%60;
  document.getElementById('cd').textContent=
    (h<10?'0':'')+h+':'+(m<10?'0':'')+m+':'+(s<10?'0':'')+s;
}
cd(); setInterval(cd,1000);

/* ===== mouse parallax layers ===== */
var fine=window.matchMedia&&matchMedia('(pointer:fine)').matches;
var reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;
if(fine&&!reduce){
  var layers=Array.prototype.slice.call(document.querySelectorAll('[data-depth]'));
  var tx=0,ty=0,cx=0,cy=0;
  document.addEventListener('mousemove',function(e){
    tx=(e.clientX/innerWidth-.5); ty=(e.clientY/innerHeight-.5);
  });
  (function tick(){
    cx+=(tx-cx)*.06; cy+=(ty-cy)*.06;
    layers.forEach(function(l){
      var d=+l.getAttribute('data-depth')||10;
      l.style.transform='translate3d('+(-cx*d)+'px,'+(-cy*d)+'px,0)';
    });
    requestAnimationFrame(tick);
  })();
}

/* ===== intro word reveal (CSS fallback when GSAP absent) ===== */
function introPlay(){
  if(window.gsap&&!reduce){
    gsap.timeline({defaults:{ease:'power4.out'}})
      .from('.tbar',{y:-30,opacity:0,duration:.6})
      .from('.hkick',{y:20,opacity:0,duration:.5},'-=.3')
      .from('#w1',{yPercent:120,duration:.9},'-=.25')
      .from('#w2',{yPercent:120,duration:.9},'-=.72')
      .from('.hsub',{y:24,opacity:0,duration:.6},'-=.5')
      .from('.hctas > *',{y:20,opacity:0,duration:.5,stagger:.1},'-=.4')
      .from('.fchip',{scale:.4,opacity:0,duration:.8,ease:'back.out(2)',stagger:.12,clearProps:'opacity,scale'},'-=.5')
      .from('.count,.shint,.mq',{opacity:0,duration:.6},'-=.4');
  }
}

/* ===== reveals + images ===== */
document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy'; img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});
if('IntersectionObserver' in window){
  var rio=new IntersectionObserver(function(es){
    es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');rio.unobserve(e.target);}});
  },{threshold:.15});
  document.querySelectorAll('.rv').forEach(function(el){rio.observe(el);});
}else{document.querySelectorAll('.rv').forEach(function(el){el.classList.add('in');});}
}catch(err){ failOpen(); }

@endverbatim
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
@verbatim

try{
if(window.gsap&&window.ScrollTrigger&&!(window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches)){
  gsap.registerPlugin(ScrollTrigger);
  var tkEls=gsap.utils.toArray('.dhead,.door');
  tkEls.forEach(function(e){e.classList.add('in');e.style.transition='none';});
  ScrollTrigger.batch('.door',{start:'top 86%',once:true,onEnter:function(els){
    gsap.from(els,{y:60,opacity:0,duration:.85,stagger:.14,ease:'power3.out',clearProps:'all'});
  }});
  ScrollTrigger.create({trigger:'.dhead',start:'top 88%',once:true,onEnter:function(){
    gsap.from('.dhead > *',{y:30,opacity:0,duration:.7,stagger:.1,ease:'power3.out',clearProps:'all'});
  }});
  /* hero slow exit parallax on scroll */
  gsap.to('.hero-inner',{yPercent:-14,opacity:.25,ease:'none',
    scrollTrigger:{trigger:'.hero',start:'top top',end:'bottom top',scrub:.5}});
}
}catch(_){}

@endverbatim
</script>
@endpush
