@extends('website.layouts.app')

@section('title', __('website.home.title'))
@section('theme', '#0A1B31')
@section('hide_mobile_chrome', '1')
@section('body_class', 'is-home-intro')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
<style>
/* Homepage intro landing — always (not limited to desktop media in v30) */
body.is-home-intro{
  margin:0;overflow-x:hidden;overflow-y:auto;min-height:100vh;min-height:100svh;
  font-family:'Cairo',Tahoma,Arial,sans-serif;
  background:radial-gradient(ellipse 90% 70% at 50% 30%,#12304F 0%,#0A1B31 60%);
  color:#8FA6C6;
}
body.is-home-intro .nm-chrome{display:none!important}
.home-intro{
  position:relative;overflow:visible;min-height:100vh;min-height:100svh;
  display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;
  padding:calc(84px + env(safe-area-inset-top,0px)) 20px calc(72px + env(safe-area-inset-bottom,0px));
  box-sizing:border-box;
}
.home-intro .io-stars,.home-intro .io-stars2{position:absolute;inset:0;pointer-events:none;background-repeat:repeat;opacity:.5;z-index:1}
.home-intro .io-stars{
  background-image:radial-gradient(1.4px 1.4px at 30px 40px,rgba(255,255,255,.7),transparent),
    radial-gradient(1px 1px at 120px 90px,rgba(255,255,255,.5),transparent),
    radial-gradient(1.2px 1.2px at 200px 160px,rgba(255,160,92,.7),transparent),
    radial-gradient(1px 1px at 70px 200px,rgba(255,255,255,.4),transparent);
  background-size:260px 260px;animation:hiTw 5s ease-in-out infinite alternate}
.home-intro .io-stars2{
  background-image:radial-gradient(1px 1px at 60px 120px,rgba(255,255,255,.5),transparent),
    radial-gradient(1.3px 1.3px at 180px 40px,rgba(255,255,255,.6),transparent),
    radial-gradient(1px 1px at 240px 210px,rgba(255,160,92,.6),transparent);
  background-size:300px 300px;animation:hiTw 7s ease-in-out infinite alternate-reverse}
@keyframes hiTw{to{opacity:.15}}
.home-intro .io-bigword{position:absolute;inset:0;display:grid;place-items:center;pointer-events:none;z-index:1}
.home-intro .io-bigword span{
  font-weight:900;font-size:clamp(120px,26vw,340px);color:transparent;
  -webkit-text-stroke:1px rgba(255,255,255,.07);letter-spacing:-.02em;white-space:nowrap}
.home-intro .io-top{
  position:absolute;top:0;inset-inline:0;z-index:20;display:flex;justify-content:space-between;
  align-items:center;padding:calc(18px + env(safe-area-inset-top,0px)) 26px 0;gap:12px}
.home-intro .io-top .logo__img{display:block;height:44px;width:auto;max-width:170px;object-fit:contain}
.home-intro .io-top__actions{display:flex;align-items:center;gap:10px;flex-shrink:0}
.home-intro .io-top .lang-toggle{
  min-width:36px;height:36px;padding:0 10px;border-radius:999px;
  border:1.5px solid rgba(255,255,255,.16);background:transparent;color:#EAF1FA;
  font-family:ui-monospace,SFMono-Regular,Menlo,monospace;font-weight:800;font-size:12px;
  letter-spacing:.04em;display:inline-grid;place-items:center;text-decoration:none;transition:.2s}
.home-intro .io-top .lang-toggle:hover{border-color:#F07F2D;color:#FFA05C}
.home-intro .intro-skip{
  background:transparent;border:1px solid rgba(255,255,255,.14);color:#8FA6C6;
  font-family:inherit;font-size:11.5px;font-weight:800;border-radius:999px;padding:9px 18px;
  text-decoration:none;transition:.25s;opacity:0;pointer-events:none}
.home-intro .intro-skip.ready{opacity:1;pointer-events:auto}
.home-intro .intro-skip:hover{color:#fff;border-color:#F07F2D}

/* Orbit stage */
.home-intro .io-stage{
  --R:min(34vw,248px);position:relative;z-index:5;
  width:calc(var(--R)*2);height:calc(var(--R)*2);display:grid;place-items:center;margin-bottom:22px}
.home-intro .io-ring{position:absolute;inset:0;border-radius:50%;border:1px dashed rgba(255,255,255,.18);animation:hiSpin 40s linear infinite}
.home-intro .io-ring.r2{inset:-11%;border:1px solid rgba(255,255,255,.08);animation-duration:70s;animation-direction:reverse}
.home-intro .io-arc{
  position:absolute;inset:-4.5%;border-radius:50%;
  background:conic-gradient(from 0deg,#FFA05C,#F07F2D 24%,transparent 26%);
  -webkit-mask:radial-gradient(circle,transparent 68%,#000 69%);
  mask:radial-gradient(circle,transparent 68%,#000 69%);
  animation:hiSpin 9s linear infinite;filter:drop-shadow(0 0 14px rgba(240,127,45,.6))}
@keyframes hiSpin{to{transform:rotate(360deg)}}
.home-intro .io-core{
  width:86%;height:86%;border-radius:50%;overflow:hidden;position:relative;background:#122B4A;
  box-shadow:0 40px 110px rgba(0,0,0,.55),0 0 0 1px rgba(255,255,255,.14)}
.home-intro .io-core img{
  position:absolute;inset:0;width:100%;height:100%;object-fit:cover;display:block;
  animation:hiKb 16s ease-in-out infinite alternate;transform:scale(1.12)}
@keyframes hiKb{to{transform:scale(1.02)}}
.home-intro .io-core::after{
  content:"";position:absolute;inset:0;border-radius:50%;
  background:radial-gradient(circle at 32% 24%,rgba(255,255,255,.22),transparent 45%)}
.home-intro .io-core .ph{
  position:absolute;inset:0;display:grid;place-items:center;background:#122B4A;color:rgba(255,255,255,.2)}
.home-intro .io-core .ph svg{width:48px;height:48px;fill:currentColor}

.home-intro .io-copy{position:relative;z-index:10;max-width:640px;margin:0 auto}
.home-intro .beats{display:flex;justify-content:center;gap:0;margin-bottom:16px}
.home-intro .beats span{
  font-size:13px;font-weight:900;color:#5F7797;padding:0 16px;position:relative;
  transition:color .45s ease,transform .45s ease,opacity .45s ease;transform:translateY(4px);opacity:.5}
.home-intro .beats span+span::before{
  content:"";position:absolute;inset-inline-end:0;top:50%;width:5px;height:5px;
  border-radius:50%;background:rgba(255,255,255,.2);transform:translate(50%,-50%)}
.home-intro .beats span.on{color:#FFA05C;transform:none;opacity:1}
.home-intro .beats span.done{color:#8CA0BC;transform:none;opacity:1}
.home-intro .io-copy h1{
  color:#EAF1FA;font-weight:900;font-size:clamp(32px,6.4vw,60px);letter-spacing:-.03em;line-height:1.14;margin:0}
.home-intro .io-copy h1 em{
  font-style:normal;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);
  -webkit-background-clip:text;background-clip:text;color:transparent}
.home-intro .io-copy p{
  font-size:13.5px;font-weight:600;color:#8FA6C6;margin:12px auto 0;max-width:52ch;line-height:1.95}
.home-intro .io-ctas{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
.home-intro .io-enter{
  position:relative;display:inline-flex;align-items:center;justify-content:center;
  background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:15px;
  border-radius:999px;padding:15px 34px;min-width:186px;text-decoration:none;
  box-shadow:0 18px 46px rgba(240,127,45,.4);overflow:hidden}
.home-intro .io-ghost{
  display:inline-flex;align-items:center;justify-content:center;color:#EAF1FA;font-weight:800;
  font-size:13.5px;border:1.5px solid rgba(255,255,255,.14);border-radius:999px;padding:14px 26px;
  min-width:186px;text-decoration:none;transition:.25s}
.home-intro .io-ghost:hover{border-color:#F07F2D;color:#FFA05C}
.home-intro .io-strip{
  position:fixed;bottom:0;inset-inline:0;z-index:30;text-align:center;width:100%;
  border-top:1px solid rgba(255,255,255,.12);background:#0A1B31;
  padding:14px 20px calc(14px + env(safe-area-inset-bottom,0px));
  font-size:12px;font-weight:700;color:#C8D4E6;line-height:1.7;
  margin:0;
}
.home-intro .io-strip b{color:#fff;font-weight:900}
.home-intro .io-stack{
  position:relative;z-index:5;display:flex;flex-direction:column;align-items:center;
  width:100%;max-width:720px;margin:0 auto;flex:1 0 auto;justify-content:center;
  padding-bottom:8px;
}
@media (max-width:640px){
  .home-intro .io-bigword span{font-size:34vw}
  .home-intro .io-stage{--R:min(38vw,190px);margin-bottom:16px}
  .home-intro .io-ctas{flex-direction:column;align-items:center}
}
@media (max-height:780px){
  .home-intro .io-stage{--R:min(28vw,190px);margin-bottom:14px}
  .home-intro .io-copy h1{font-size:clamp(28px,5vw,44px)}
  .home-intro .beats{margin-bottom:10px}
}
@media (prefers-reduced-motion:reduce){
  .home-intro .io-stars,.home-intro .io-stars2,
  .home-intro .io-ring,.home-intro .io-arc,.home-intro .io-core img{animation:none}
}
</style>
@endpush

@section('content')
@php $isAr = app()->getLocale() === 'ar'; @endphp

<section class="home-intro" id="intro" aria-label="{{ $isAr ? 'مقدمة نيومي' : 'New Me intro' }}">
  <div class="io-stars"></div>
  <div class="io-stars2"></div>
  <div class="io-bigword"><span>NEWME</span></div>

  <div class="io-top">
    @include('website.partials.logo', ['tone' => 'light', 'href' => route('website.home')])
    <div class="io-top__actions">
      @include('website.partials.lang-toggle', ['class' => 'on-dark'])
      <a class="intro-skip" id="skip" href="{{ route('website.main') }}">{{ $isAr ? 'تخطّ المقدمة ←' : 'Skip intro →' }}</a>
    </div>
  </div>

  <div class="io-stack">
    <div class="io-stage" id="ioStage">
      <div class="io-ring"></div>
      <div class="io-ring r2"></div>
      <div class="io-arc"></div>
      <div class="io-core">
        <div class="ph" aria-hidden="true">●</div>
        <img class="aiimg" loading="eager" decoding="async"
             src="{{ asset('assets/images/v30-intro.jpg') }}"
             alt="{{ $isAr ? 'رغيف نيومي بالبذور' : 'New Me seeded loaf' }}">
      </div>
    </div>

    <div class="io-copy">
      <div class="beats" id="beats">
        <span data-b="1">{{ $isAr ? 'حضّر' : 'Prep' }}</span>
        <span data-b="2">{{ $isAr ? 'كُل' : 'Eat' }}</span>
        <span data-b="3">{{ $isAr ? 'جدّد' : 'Renew' }}</span>
      </div>
      <h1>{!! $isAr ? 'جدّد <em>حياتك</em>' : 'Renew your <em>life</em>' !!}</h1>
      <p>{{ $isAr
        ? 'حضّر · كُل · جدّد — مخبوزات ووجبات صحية تصلك طازجة، بقيم غذائية مطبوعة كاملة على كل عبوة.'
        : 'Prep · Eat · Renew — fresh healthy bakes and meals with full nutrition printed on every pack.' }}</p>
      <div class="io-ctas">
        <a href="{{ route('website.main') }}" class="io-enter">{{ $isAr ? 'ابدأ من هنا ←' : 'Start here →' }}</a>
        <a href="{{ route('website.subscribe') }}" class="io-ghost">{{ $isAr ? 'الباقات والأسعار' : 'Plans & pricing' }}</a>
      </div>
    </div>
  </div>

  <div class="io-strip">
    {!! $isAr
      ? 'شريك لمستشفى الملك فيصل التخصصي ومركز الأبحاث · <b>دايت سنتر</b> · Daily Mealz'
      : 'Partner of King Faisal Specialist Hospital & Research Centre · <b>Diet Center</b> · Daily Mealz' !!}
  </div>
</section>
@endsection

@push('scripts')
<script>
@verbatim
(function(){
  var sk = document.getElementById('skip');
  if (sk) setTimeout(function(){ sk.classList.add('ready'); }, 1000);

  document.querySelectorAll('img.aiimg').forEach(function(img){
    if (img.complete && img.naturalWidth > 0) img.classList.add('loaded');
    else img.addEventListener('load', function(){ img.classList.add('loaded'); });
  });

  var beats = document.getElementById('beats');
  if (beats) {
    var reduce = window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches;
    var items = [].slice.call(beats.children);
    if (reduce) {
      items.forEach(function(el){ el.classList.add('done'); });
      if (items[2]) { items[2].classList.remove('done'); items[2].classList.add('on'); }
    } else {
      items.forEach(function(el, i){
        setTimeout(function(){
          items.forEach(function(x, j){
            if (j < i) { x.classList.remove('on'); x.classList.add('done'); }
          });
          el.classList.add('on');
        }, 260 + i * 1100);
      });
    }
  }

  var st = document.getElementById('ioStage');
  if (st && window.matchMedia && matchMedia('(pointer:fine)').matches
      && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var tx = 0, ty = 0, cx = 0, cy = 0;
    document.addEventListener('mousemove', function(e){
      tx = (e.clientX / innerWidth - .5) * 18;
      ty = (e.clientY / innerHeight - .5) * 18;
    }, { passive: true });
    (function loop(){
      cx += (tx - cx) * .06;
      cy += (ty - cy) * .06;
      st.style.transform = 'translate3d(' + (-cx) + 'px,' + (-cy) + 'px,0)';
      requestAnimationFrame(loop);
    })();
  }
})();
@endverbatim
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
@verbatim
try{
  if (window.gsap && !(window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    gsap.timeline({ defaults: { ease: 'power3.out' } })
      .from('.io-top', { y: -26, opacity: 0, duration: .6, clearProps: 'all' })
      .from('.io-stage', { scale: .6, opacity: 0, duration: 1.1, ease: 'power4.out', clearProps: 'opacity' })
      .from('.io-copy h1', { y: 30, opacity: 0, duration: .7, clearProps: 'all' }, '-=.5')
      .from('.io-copy p,.io-ctas > *', { y: 20, opacity: 0, duration: .5, stagger: .08, clearProps: 'all' }, '-=.45')
      .from('.io-strip', { y: 26, opacity: 0, duration: .5, clearProps: 'all' }, '-=.4')
      .from('.io-bigword span', { opacity: 0, duration: 1.2, clearProps: 'all' }, '-=.9');
  }
} catch (_) {}
@endverbatim
</script>
@endpush
