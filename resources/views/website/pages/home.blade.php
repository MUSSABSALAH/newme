@extends('website.layouts.app')

@section('title', __('website.home.title'))
@section('theme', '#0A1B31')

@push('styles')
<style>
@verbatim
:root{
  --navy:#0A1B31; --navy-2:#122B4A; --ink:#EAF1FA; --dim:#8FA6C6; --line:rgba(255,255,255,.14);
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',Tahoma,Arial,sans-serif; --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
  --R:min(34vw,300px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
body{font-family:var(--font);background:radial-gradient(ellipse 90% 70% at 50% 30%,#12304F 0%,var(--navy) 60%);color:var(--dim);overflow:hidden;height:100vh;height:100svh;display:grid;place-items:center;position:relative}
a{text-decoration:none;color:inherit}
img:not(.logo__img){display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity 1.2s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}

.stars,.stars2{position:fixed;inset:0;pointer-events:none;background-repeat:repeat;opacity:.5}
.stars{background-image:radial-gradient(1.4px 1.4px at 30px 40px,rgba(255,255,255,.7),transparent),radial-gradient(1px 1px at 120px 90px,rgba(255,255,255,.5),transparent),radial-gradient(1.2px 1.2px at 200px 160px,rgba(255,160,92,.7),transparent),radial-gradient(1px 1px at 70px 200px,rgba(255,255,255,.4),transparent);background-size:260px 260px;animation:tw 5s ease-in-out infinite alternate}
.stars2{background-image:radial-gradient(1px 1px at 60px 120px,rgba(255,255,255,.5),transparent),radial-gradient(1.3px 1.3px at 180px 40px,rgba(255,255,255,.6),transparent),radial-gradient(1px 1px at 240px 210px,rgba(255,160,92,.6),transparent);background-size:300px 300px;animation:tw 7s ease-in-out infinite alternate-reverse}
@keyframes tw{to{opacity:.15}}

.tbar{position:fixed;top:0;inset-inline:0;z-index:20;display:flex;justify-content:space-between;align-items:center;padding:calc(18px + var(--sat)) 26px 0;gap:12px}
.tbar .logo{display:inline-flex;align-items:center;line-height:0}
.tbar .logo__img{display:block;height:48px;width:auto;max-width:190px;object-fit:contain}
.tbar__actions{display:flex;align-items:center;gap:10px;flex-shrink:0}
.skip{font-size:11.5px;font-weight:800;color:var(--dim);border:1px solid var(--line);border-radius:999px;padding:8px 18px;transition:.25s}
.skip:hover{color:var(--ink);border-color:var(--orange)}
.tbar .lang-toggle{min-width:36px;height:36px;padding:0 10px;border-radius:999px;border:1.5px solid rgba(255,255,255,.16);background:transparent;color:#EAF1FA;font-family:var(--mono);font-weight:800;font-size:12px;letter-spacing:.04em;display:inline-grid;place-items:center;transition:.2s}
.tbar .lang-toggle:hover{border-color:var(--orange);color:var(--orange-hi)}

.bigword{position:fixed;inset:0;display:grid;place-items:center;pointer-events:none;z-index:1}
.bigword span{font-weight:900;font-size:clamp(120px,26vw,340px);color:transparent;-webkit-text-stroke:1px rgba(255,255,255,.07);letter-spacing:-.02em;white-space:nowrap}

.stage{position:relative;z-index:5;width:calc(var(--R)*2);height:calc(var(--R)*2);display:grid;place-items:center}
.ring{position:absolute;inset:0;border-radius:50%;border:1px dashed rgba(255,255,255,.18);animation:spin 40s linear infinite}
.ring.r2{inset:-11%;border:1px solid rgba(255,255,255,.08);animation-duration:70s;animation-direction:reverse}
.arc{position:absolute;inset:-4.5%;border-radius:50%;background:conic-gradient(from 0deg,var(--orange-hi),var(--orange) 24%,transparent 26%);-webkit-mask:radial-gradient(circle,transparent 68%,#000 69%);mask:radial-gradient(circle,transparent 68%,#000 69%);animation:spin 9s linear infinite;filter:drop-shadow(0 0 14px rgba(240,127,45,.6))}
@keyframes spin{to{transform:rotate(360deg)}}
.core{width:72%;height:72%;border-radius:50%;overflow:hidden;position:relative;box-shadow:0 40px 110px rgba(0,0,0,.55),0 0 0 1px var(--line);background:var(--navy-2)}
.core img{animation:kb 16s ease-in-out infinite alternate;transform:scale(1.12)}
@keyframes kb{to{transform:scale(1.02)}}
.core::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 24%,rgba(255,255,255,.22),transparent 45%)}
.orbit{position:absolute;inset:0;animation:spin 32s linear infinite}
.sat{position:absolute;top:50%;inset-inline-start:50%;animation:spin 32s linear infinite reverse}
.sat .chip{transform:translate(-50%,-50%);background:rgba(18,43,74,.72);border:1px solid var(--line);border-radius:14px;padding:10px 16px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);box-shadow:0 18px 44px rgba(0,0,0,.4);text-align:center;white-space:nowrap}
.sat .chip b{display:block;font-family:var(--mono);font-size:16px;color:var(--ink);font-weight:700;line-height:1.2}
.sat .chip b em{font-style:normal;color:var(--orange-hi)}
.sat .chip span{font-size:9.5px;font-weight:800;color:var(--dim);letter-spacing:.05em}
.sat.s1{transform:translate(calc(var(--R)*1),0)}
.sat.s2{transform:translate(calc(var(--R)*-1),0)}
.sat.s3{transform:translate(0,calc(var(--R)*-1))}
.sat.s4{transform:translate(0,calc(var(--R)*1))}

.copy{position:fixed;inset-inline:0;bottom:calc(86px + var(--sab));z-index:10;text-align:center;padding:0 20px}
.copy h1{color:var(--ink);font-weight:900;font-size:clamp(30px,6vw,58px);letter-spacing:-.02em;line-height:1.15}
.copy h1 em{font-style:normal;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.copy p{font-size:13px;font-weight:600;margin-top:8px}
.ctas{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:20px}
.enter{position:relative;display:inline-flex;align-items:center;gap:10px;background:var(--grad);color:#fff;font-weight:900;font-size:15px;border-radius:999px;padding:15px 36px;box-shadow:0 18px 46px rgba(240,127,45,.4);overflow:hidden}
.enter::before{content:"";position:absolute;top:0;bottom:0;width:60px;background:linear-gradient(105deg,transparent,rgba(255,255,255,.5),transparent);inset-inline-start:-80px;animation:shine 3.4s ease-in-out infinite}
@keyframes shine{0%,60%{inset-inline-start:-80px}100%{inset-inline-start:120%}}
.ghost{display:inline-flex;color:var(--ink);font-weight:800;font-size:13.5px;border:1.5px solid var(--line);border-radius:999px;padding:13px 26px;transition:.25s}
.ghost:hover{border-color:var(--orange);color:var(--orange-hi)}
.cd{position:fixed;bottom:0;inset-inline:0;z-index:10;text-align:center;border-top:1px solid var(--line);background:rgba(10,27,49,.75);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);padding:11px 16px calc(11px + var(--sab));font-family:var(--mono);font-size:10.5px;letter-spacing:.22em;color:var(--dim);text-transform:uppercase}
.cd b{color:var(--ink)}
.cd em{font-style:normal;color:var(--orange-hi)}
@media(max-width:640px){.sat.s3,.sat.s4{display:none}.bigword span{font-size:34vw}}
@media (prefers-reduced-motion: reduce){.ring,.arc,.orbit,.sat,.core img,.enter::before,.stars,.stars2{animation:none}}
@endverbatim
</style>
@endpush

@section('content')
<div class="stars"></div><div class="stars2"></div>
<div class="bigword"><span>{{ __('website.home.bigword') }}</span></div>

<div class="tbar">
  @include('website.partials.logo', ['tone' => 'light', 'href' => route('website.home')])
  <div class="tbar__actions">
    @include('website.partials.lang-toggle', ['class' => 'on-dark'])
    <a class="skip" href="{{ route('website.main') }}">{{ __('website.home.skip') }}</a>
  </div>
</div>

<div class="stage" id="stage">
  <div class="ring"></div>
  <div class="ring r2"></div>
  <div class="arc"></div>
  <div class="core">
    <img class="aiimg" src="https://image.pollinations.ai/prompt/hyperrealistic%20food%20photography%2C%20golden%20seeded%20bread%20roll%20centered%20on%20dark%20navy%20background%2C%20dramatic%20spotlight%20from%20above%2C%20floating%20seeds%20around%2C%20premium%20cinematic%20product%20shot%2C%208k%20photorealistic?width=800&height=800&nologo=true&seed=182&model=flux" alt="{{ __('website.home.core_alt') }}" onerror="this.remove()">
  </div>
  <div class="orbit">
    <div class="sat s1"><div class="chip"><b>{!! __('website.home.chip1_value') !!}</b><span>{{ __('website.home.chip1') }}</span></div></div>
    <div class="sat s2"><div class="chip"><b>{!! __('website.home.chip2_value') !!}</b><span>{{ __('website.home.chip2') }}</span></div></div>
    <div class="sat s3"><div class="chip"><b>{{ __('website.home.chip3_value') }}</b><span>{{ __('website.home.chip3') }}</span></div></div>
    <div class="sat s4"><div class="chip"><b>{!! __('website.home.chip4_value') !!}</b><span>{{ __('website.home.chip4') }}</span></div></div>
  </div>
</div>

<div class="copy">
  <h1>{!! __('website.home.hero_title') !!}</h1>
  <p>{{ __('website.home.hero_sub') }}</p>
  <div class="ctas">
    <a class="enter" href="{{ route('website.main') }}">{{ __('website.home.cta_enter') }}</a>
    <a class="ghost" href="{{ route('website.subscribe') }}">{{ __('website.home.cta_ghost') }}</a>
  </div>
</div>

<div class="cd">{!! __('website.home.count_line', ['time' => '<b id="cd">—</b>']) !!}</div>
@endsection

@push('scripts')
<script>
@verbatim
function failOpen(){try{document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});}catch(_){}}
window.addEventListener('error',failOpen);
try{
'use strict';
function tick(){
  var now=new Date(), next=new Date(now); next.setHours(5,0,0,0);
  if(next<=now)next.setDate(next.getDate()+1);
  var d=Math.floor((next-now)/1000);
  var h=Math.floor(d/3600),m=Math.floor(d%3600/60),s=d%60;
  var el=document.getElementById('cd');
  if(el)el.textContent=(h<10?'0':'')+h+':'+(m<10?'0':'')+m+':'+(s<10?'0':'')+s;
}
tick(); setInterval(tick,1000);
if(window.matchMedia&&matchMedia('(pointer:fine)').matches&&!matchMedia('(prefers-reduced-motion: reduce)').matches){
  var st=document.getElementById('stage'),tx=0,ty=0,cx=0,cy=0;
  document.addEventListener('mousemove',function(e){
    tx=(e.clientX/innerWidth-.5)*18; ty=(e.clientY/innerHeight-.5)*18;
  });
  (function loop(){cx+=(tx-cx)*.06;cy+=(ty-cy)*.06;
    if(st)st.style.transform='translate3d('+(-cx)+'px,'+(-cy)+'px,0)';requestAnimationFrame(loop);})();
}
document.querySelectorAll('img.aiimg').forEach(function(img){
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});
}catch(err){failOpen();}
@endverbatim
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
@verbatim
try{
if(window.gsap&&!(window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches)){
  gsap.timeline({defaults:{ease:'power3.out'}})
    .from('.tbar',{y:-26,opacity:0,duration:.6,clearProps:'all'})
    .from('.stage',{scale:.6,opacity:0,duration:1.1,ease:'power4.out'})
    .from('.sat .chip',{scale:.3,opacity:0,duration:.8,ease:'back.out(2)',stagger:.12,clearProps:'opacity,scale'},'-=.6')
    .from('.copy h1',{y:30,opacity:0,duration:.7,clearProps:'all'},'-=.5')
    .from('.copy p,.ctas > *',{y:20,opacity:0,duration:.5,stagger:.08,clearProps:'all'},'-=.45')
    .from('.cd',{y:26,duration:.5,clearProps:'all'},'-=.4')
    .from('.bigword span',{opacity:0,duration:1.2,clearProps:'all'},'-=.9');
}
}catch(_){}
@endverbatim
</script>
@endpush
