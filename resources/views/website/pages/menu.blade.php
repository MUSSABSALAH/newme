@extends('website.layouts.app')

@section('title', __('website.menu_page.title'))
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
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden;padding-bottom:calc(92px + var(--sab))}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity .9s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.i{width:1.05em;height:1.05em;fill:currentColor;vertical-align:-0.14em;display:inline-block}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:15px;border-radius:999px;padding:15px 30px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.35)}
.btn:active{transform:scale(.97)}
.btn.navy{background:var(--navy);border-color:var(--navy);box-shadow:0 12px 28px rgba(18,43,74,.3)}
.btn.sm{padding:11px 20px;min-height:44px;font-size:13.5px}

.announce{background:var(--navy);color:#fff;text-align:center;padding:9px 14px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2);padding-top:var(--sat)}
nav.main .bar{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo .mark{width:34px;height:34px;border-radius:50%;background:conic-gradient(from 210deg,var(--navy-3),var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%, rgba(255,255,255,.9), rgba(255,255,255,.2) 36%, transparent 60%)}
.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}

/* page head */
.phead{padding:36px 20px 8px;text-align:center;position:relative;overflow:hidden}
.phead h1{font-size:clamp(28px,6.5vw,48px)}
.phead h1 em{font-style:normal;color:var(--orange-deep)}
.phead p{font-size:14px;font-weight:600;max-width:560px;margin:6px auto 0}
.target{display:inline-flex;align-items:center;gap:8px;background:var(--navy);color:#fff;border-radius:999px;padding:9px 20px;font-size:12px;font-weight:800;margin-top:14px}
.target b{font-family:var(--mono);color:var(--orange-hi);font-weight:700}

/* plan chips + day tabs */
.filters{position:sticky;top:calc(64px + var(--sat));z-index:80;background:rgba(247,245,241,.95);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--gray-2);padding:12px 0 0}
.prow{display:flex;gap:8px;overflow-x:auto;padding:0 20px 12px;max-width:1200px;margin:0 auto;scrollbar-width:none;-webkit-overflow-scrolling:touch}
.prow::-webkit-scrollbar{display:none}
.pchip{flex-shrink:0;background:#fff;border:2px solid var(--gray-2);border-radius:999px;padding:9px 20px;font-weight:900;font-size:12.5px;color:var(--ink);transition:.2s}
.pchip.on{background:var(--navy);border-color:var(--navy);color:#fff}
.drow{display:flex;gap:8px;overflow-x:auto;padding:0 20px 12px;max-width:1200px;margin:0 auto;scrollbar-width:none;border-top:1px solid var(--gray-2);padding-top:11px}
.drow::-webkit-scrollbar{display:none}
.day{flex-shrink:0;width:76px;background:#fff;border:2px solid var(--gray-2);border-radius:14px;padding:8px 4px;text-align:center;font-weight:900;transition:.2s}
.day b{display:block;font-size:12.5px;color:var(--navy)}
.day small{font-size:9px;color:var(--muted);font-weight:800;font-family:var(--mono)}
.day.on{border-color:var(--orange);background:var(--orange-soft)}

/* menu sections */
.mwrap{max-width:1200px;margin:0 auto;padding:26px 20px 40px}
.msec{margin-bottom:38px}
.msec-h{display:flex;align-items:center;gap:12px;margin-bottom:16px}
.msec-h .ic{width:40px;height:40px;border-radius:12px;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;flex-shrink:0}
.msec-h .ic .i{width:19px;height:19px}
.msec-h h2{font-size:clamp(19px,4.5vw,26px)}
.msec-h small{display:block;font-size:11.5px;color:var(--muted);font-weight:800}
.mgrid{display:grid;gap:14px;grid-template-columns:1fr}
@media(min-width:640px){.mgrid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:980px){.mgrid{grid-template-columns:repeat(3,1fr)}}
.dish{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;overflow:hidden;transition:.2s;display:flex;flex-direction:column}
.dish:hover{transform:translateY(-3px);box-shadow:0 16px 38px rgba(18,43,74,.1);border-color:var(--orange)}
.dish .im{aspect-ratio:16/9.5;position:relative;overflow:hidden;background:var(--tile)}
@supports not (aspect-ratio:1){.dish .im{height:0;padding-bottom:60%}}
.dish .im img{position:absolute;inset:0;transition:transform .5s ease}
.dish:hover .im img{transform:scale(1.05)}
.dish{cursor:pointer}
.dish .ck{position:absolute;top:10px;inset-inline-start:10px;z-index:2;width:28px;height:28px;border-radius:50%;border:2px solid #fff;background:rgba(255,255,255,.85);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px);color:#fff;display:grid;place-items:center;font-weight:900;font-size:13px;box-shadow:0 6px 16px rgba(18,43,74,.2);transition:.2s}
.dish.on{border-color:var(--orange);box-shadow:0 0 0 3px rgba(240,127,45,.15),0 16px 38px rgba(18,43,74,.1)}
.dish.on .ck{background:var(--orange);border-color:var(--orange)}
.dish.on .ck::after{content:"✓"}
.dish .kcal{position:absolute;bottom:10px;inset-inline-start:10px;background:rgba(18,43,74,.88);color:#fff;font-family:var(--mono);font-size:11px;font-weight:700;border-radius:999px;padding:5px 13px}
.dish .kcal em{font-style:normal;color:var(--orange-hi)}
.dish .fit{position:absolute;top:10px;inset-inline-end:10px;background:#fff;border-radius:999px;padding:4px 12px;font-size:9px;font-weight:900;color:var(--green);box-shadow:0 6px 14px rgba(18,43,74,.12)}
.dish .bd{padding:14px 16px 16px;display:flex;flex-direction:column;flex:1}
.dish h3{font-size:15px;margin-bottom:3px}
.dish p{font-size:11.5px;font-weight:600;color:var(--muted);line-height:1.7}
.macros{display:grid;grid-template-columns:repeat(3,1fr);gap:7px;margin-top:12px;padding-top:12px;border-top:1px solid var(--gray-2)}
.mc{text-align:center;background:var(--tile);border-radius:10px;padding:7px 4px}
.mc b{display:block;font-family:var(--mono);font-size:12.5px;color:var(--navy);font-weight:700}
.mc span{font-size:8.5px;font-weight:800;color:var(--muted)}
.mnote{text-align:center;font-size:11px;font-weight:800;color:var(--muted);font-family:var(--mono);letter-spacing:.04em;margin-top:6px}

/* sticky CTA */
.mcta-bar{position:fixed;bottom:0;inset-inline:0;z-index:95;background:rgba(247,245,241,.96);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-top:1px solid var(--gray-2);padding:11px 18px calc(11px + var(--sab))}
.mcta-bar .inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;gap:12px}
.mcta-bar .txt{flex:1;min-width:0}
.mcta-bar .txt b{display:block;font-size:14px;color:var(--navy);font-weight:900;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.mcta-bar .txt small{font-size:10.5px;color:var(--green);font-weight:800}
.mcta-bar .btn{flex:0 0 auto;min-height:48px;padding:13px 26px;font-size:14px}

footer{background:#0C1F38;color:#9FB4D2;padding:36px 20px 40px;text-align:center;margin-top:16px}
footer .flinks{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;font-size:13px;font-weight:800;margin-bottom:12px}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:11px;font-weight:600;color:#6E84A5;line-height:2}

/* mobile menu (site pattern) */
.mmenu{position:fixed;inset:0;z-index:220;background:var(--bg);display:flex;flex-direction:column;padding:calc(16px + var(--sat)) 24px calc(28px + var(--sab));transform:translateY(-103%);transition:transform .55s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:none}
.mmenu .mtop{display:flex;justify-content:space-between;align-items:center;margin-bottom:7vh}
.mclose{width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);font-size:20px;font-weight:900;display:grid;place-items:center}
.mlink{display:flex;justify-content:space-between;align-items:baseline;padding:16px 2px;border-bottom:1px solid var(--gray-2);font-size:clamp(26px,7.4vw,36px);font-weight:900;color:var(--navy)}
.mlink small{font-family:var(--mono);font-size:11px;color:var(--orange-deep);font-weight:700;letter-spacing:.14em}
body.mlock{overflow:hidden}
.js .rv{opacity:0;transform:translateY(18px);transition:opacity .5s ease,transform .5s ease}
.js .rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion: reduce){.js .rv{opacity:1;transform:none;transition:none}}
@endverbatim
</style>
@endpush

@section('content')
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-bowl" viewBox="0 0 24 24"><path d="M3 11h18c0 4.4-3.2 8-9 8s-9-3.6-9-8zm5 9.5h8v1.5H8v-1.5z"/></symbol>
<symbol id="i-flame" viewBox="0 0 24 24"><path d="M12 2c.8 3.8 5 6.2 5 11a5 5 0 0 1-10 0c0-1.8.8-3.1 1.8-4.6.2 1.6.9 2.6 2 3.1-.9-3.2-.2-6.6 1.2-9.5z"/></symbol>
<symbol id="i-target" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1.2" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-leaf" viewBox="0 0 24 24"><path d="M20 4c.5 8-2.5 15-10 15-3 0-5-1.5-6-3.5C8 16 10 15 12 13c-2 .5-4 .5-6 2 .5-6 5-11 14-11z"/></symbol>
</defs></svg>

<header class="phead">
  <h1>{{ __('website.menu_page.h1_prefix') }} <em id="hPlan"></em></h1>
  <p>{{ __('website.menu_page.sub') }}</p>
  <div class="target">{{ __('website.menu_page.target_prefix') }} <b id="hKcal">~1,600</b> {{ __('website.menu_page.target_suffix') }}</div>
</header>

<div class="filters">
  <div class="prow" id="prow"></div>
  <div class="drow" id="drow"></div>
</div>

<div class="mwrap" id="mwrap"></div>

<div class="mcta-bar">
  <div class="inner">
    <div class="txt"><b id="ctaTxt"></b><small id="ctaSub">{{ __('website.menu_page.cta_sub_default') }}</small></div>
    <a class="btn" id="ctaBtn" href="{{ route('website.subscribe') }}#plan=balance">{{ __('website.menu_page.cta_start') }}</a>
  </div>
</div>



@endsection

@push('scripts')
<script>
window.NM_I18N = @json(__('website.menu_page.js'));
window.NM_I18N.plans = @json($menuPlans);
window.NM_I18N.menu = @json($menuDishes);
</script>
<script>
@verbatim

function failOpen(){try{
  document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});
  document.querySelectorAll('.rv').forEach(function(r){r.classList.add('in');});
}catch(_){}}
window.addEventListener('error',failOpen);
try{
'use strict';

var I18N=window.NM_I18N||{};
var PLANS=I18N.plans||[];
var DAYS=I18N.days||[];
var TYPES=I18N.types||{};
var MENU=I18N.menu||{};
var TYPE_KEYS=Object.keys(TYPES);
var plan=(PLANS.some(function(p){return p[0]==='balance';})?'balance':((PLANS[0]||[])[0]||'balance')), day=0;
var SEL={}; TYPE_KEYS.forEach(function(t){SEL[t]=[];});
var fromWizard=false, scrollMeal='';
(function(){
  var h=(location.hash||'').replace('#','');
  fromWizard=/from=wizard/.test(h);
  var mm=h.match(/meal=([^&]+)/); if(mm)scrollMeal=decodeURIComponent(mm[1]);
  var ms=h.match(/sel=([^&]+)/);
  if(ms){try{var o=JSON.parse(decodeURIComponent(ms[1]));
    TYPE_KEYS.forEach(function(t){SEL[t]=(o[t]||[]).slice(0,8);});}catch(_){}}
})();
function selCount(){return TYPE_KEYS.reduce(function(a,t){return a+SEL[t].length;},0);}
function selHash(){
  var o={};TYPE_KEYS.forEach(function(t){if(SEL[t].length)o[t]=SEL[t];});
  return Object.keys(o).length?('&sel='+encodeURIComponent(JSON.stringify(o))):'';
}
function fmt(n){return n.toLocaleString('en-US');}
function IMG(d,seed){return '/assets/images/placeholder.svg?p='+encodeURIComponent('hyperrealistic editorial food photography, '+d+', plated beautifully, soft natural window light, premium minimal styling, appetizing, 8k photorealistic')+'?width=640&height=400&nologo=true&seed='+seed+'&model=flux';}
function tpl(s,vars){return String(s||'').replace(/:([a-z_]+)/g,function(_,k){return vars[k]!=null?vars[k]:'';});}
function dishWord(n){return n===1?(I18N.dish_one||''):(n===2?(I18N.dish_two||I18N.dish_many||''):(I18N.dish_many||''));}

document.getElementById('prow').innerHTML=PLANS.map(function(p){
  return '<button class="pchip'+(p[0]===plan?' on':'')+'" data-k="'+p[0]+'">'+p[1]+'</button>';}).join('');
document.getElementById('drow').innerHTML=DAYS.map(function(d,i){
  return '<button class="day'+(i===day?' on':'')+'" data-d="'+i+'"><small>'+d[1]+'</small><b>'+d[0]+'</b></button>';}).join('');

function render(){
  var pl=PLANS.filter(function(p){return p[0]===plan;})[0];
  if(!pl)return;
  document.getElementById('hPlan').textContent=pl[1];
  document.getElementById('hKcal').textContent='~'+fmt(pl[2]);
  document.getElementById('ctaTxt').textContent=tpl(I18N.cta_ready,{plan:pl[1]});
  document.getElementById('ctaBtn').href='/subscribe#plan='+pl[0];
  document.title=(I18N.title_prefix||'')+' '+pl[1]+' — '+(I18N.brand_suffix||'');
  var html='';
  TYPE_KEYS.forEach(function(type,ti){
    var meta=TYPES[type], pool=MENU[type]||[];
    html+='<section class="msec"><div class="msec-h"><span class="ic"><svg class="i"><use href="#'+meta.icon+'"/></svg></span><div><h2>'+meta.label+'</h2><small>'+meta.sub+'</small></div></div><div class="mgrid">';
    for(var k=0;k<3;k++){
      var d=pool[(day+k*2+ti)%pool.length];
      if(!d)continue;
      var seed=201+ti*6+pool.indexOf(d);
      var isOn=SEL[type].indexOf(d[0])>-1;
      html+='<article class="dish rv'+(isOn?' on':'')+'" data-type="'+type+'" data-name="'+d[0]+'"><div class="im"><span class="ck"></span><img class="aiimg" src="'+(d[6]||IMG(d[0],seed))+'" alt="'+d[0]+'" onerror="this.remove()" loading="lazy" decoding="async"><span class="kcal"><em>'+fmt(d[2])+'</em> '+(I18N.kcal||'')+'</span><span class="fit">'+(I18N.fit_check||'✓')+' '+pl[1]+'</span></div><div class="bd"><h3>'+d[0]+'</h3><p>'+d[1]+'</p><div class="macros"><div class="mc"><b>'+d[3]+(I18N.g||'')+'</b><span>'+(I18N.protein||'')+'</span></div><div class="mc"><b>'+d[4]+(I18N.g||'')+'</b><span>'+(I18N.carbs||'')+'</span></div><div class="mc"><b>'+d[5]+(I18N.g||'')+'</b><span>'+(I18N.fat||'')+'</span></div></div></div></article>';
    }
    html+='</div></section>';
  });
  html+='<div class="mnote">'+(I18N.note||'')+'</div>';
  var w=document.getElementById('mwrap');
  w.innerHTML=html;
  w.querySelectorAll('img.aiimg').forEach(function(img){
    if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
    else img.addEventListener('load',function(){img.classList.add('loaded');});
  });
  w.querySelectorAll('.rv').forEach(function(el,i){setTimeout(function(){el.classList.add('in');},40*i);});
  updateBar();
  if(scrollMeal){
    var target=null;
    w.querySelectorAll('.msec-h h2').forEach(function(h2){if(h2.textContent.trim()===scrollMeal)target=h2.closest('.msec');});
    if(target&&target.scrollIntoView)setTimeout(function(){target.scrollIntoView({behavior:'smooth',block:'start'});},150);
    scrollMeal='';
  }
}

function updateBar(){
  var pl=PLANS.filter(function(p){return p[0]===plan;})[0];
  var n=selCount(), btn=document.getElementById('ctaBtn'), txt=document.getElementById('ctaTxt'), sub=document.getElementById('ctaSub');
  if(n>0||fromWizard){
    txt.textContent=n>0?tpl(I18N.cta_picked,{n:n,dishes:dishWord(n)}):(I18N.cta_picked_zero||'');
    sub.textContent=I18N.cta_sub_wizard||'';
    btn.textContent=I18N.cta_continue||'';
  }else{
    txt.textContent=tpl(I18N.cta_ready,{plan:pl[1]});
    sub.textContent=I18N.cta_sub_default||'';
    btn.textContent=I18N.cta_start||'';
  }
  btn.href='/subscribe#plan='+pl[0]+selHash();
}
document.getElementById('mwrap').addEventListener('click',function(e){
  var card=e.target.closest('.dish'); if(!card)return;
  var t=card.getAttribute('data-type'), n=card.getAttribute('data-name');
  if(!t||!n)return;
  var i=SEL[t].indexOf(n);
  if(i>-1){SEL[t].splice(i,1);card.classList.remove('on');}
  else if(SEL[t].length<8){SEL[t].push(n);card.classList.add('on');}
  updateBar();
});
document.getElementById('prow').addEventListener('click',function(e){
  var b=e.target.closest('.pchip'); if(!b)return;
  document.querySelectorAll('.pchip').forEach(function(x){x.classList.remove('on');});
  b.classList.add('on'); plan=b.getAttribute('data-k'); render();
});
document.getElementById('drow').addEventListener('click',function(e){
  var b=e.target.closest('.day'); if(!b)return;
  document.querySelectorAll('.drow .day').forEach(function(x){x.classList.remove('on');});
  b.classList.add('on'); day=+b.getAttribute('data-d'); render();
});

(function(){
  var m=(location.hash||'').match(/plan=([^&]+)/);
  if(m){var k=decodeURIComponent(m[1]);
    if(PLANS.some(function(p){return p[0]===k;})){plan=k;
      document.querySelectorAll('.pchip').forEach(function(x){x.classList.toggle('on',x.getAttribute('data-k')===k);});}}
})();
render();

(function(){
  var b=document.getElementById('mBurger'),m=document.getElementById('mmenu');
  if(!b||!m)return;
  function set(o){m.classList.toggle('open',o);document.body.classList.toggle('mlock',o);document.body.classList.toggle('menu-open',o);}
  b.addEventListener('click',function(){set(true);});
  m.querySelector('.mclose').addEventListener('click',function(){set(false);});
  m.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){set(false);});});
})();
}catch(err){failOpen();}

@endverbatim
</script>
@endpush
