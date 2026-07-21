@extends('website.layouts.app')

@section('title', __('website.blog.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#10263F; --bg:#F8F6F1; --tile:#EFEBE2; --line:#E2DCCE; --line-2:#D2CBBA;
  --ink:#10263F; --body:#4A5568; --muted:#8A93A3;
  --orange:#E8762A; --orange-deep:#C95F14; --orange-hi:#FFA05C; --green:#2E9E6B;
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.9;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3{color:var(--ink);font-weight:900;line-height:1.25;letter-spacing:-.015em}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity 1s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.wrap{max-width:780px;margin:0 auto;padding:0 24px}
.kick{font-size:10.5px;font-weight:800;letter-spacing:.22em;text-transform:uppercase;color:var(--orange-deep);font-family:var(--mono)}
.i{width:1em;height:1em;fill:currentColor;vertical-align:-0.12em;display:inline-block}
.announce{background:var(--navy);color:#EAF1FA;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(248,246,241,.92);backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px);border-bottom:1px solid var(--line)}
nav.main .bar{max-width:1280px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:66px;padding:0 24px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo .mark{width:34px;height:34px;border-radius:50%;background:conic-gradient(from 210deg,#24487A,var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%,rgba(255,255,255,.9),rgba(255,255,255,.2) 36%,transparent 60%)}
.logo b{font-size:18px;color:var(--ink);font-weight:900}
.nav-links{display:none;gap:24px;font-weight:800;font-size:13px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}
.nav-cta{font-size:12.5px;font-weight:900;color:var(--ink);border:1.5px solid var(--ink);border-radius:999px;padding:10px 22px;transition:.2s}
.nav-cta:hover{background:var(--ink);color:#fff}
.phead{padding:56px 24px 30px;text-align:center}
.phead h1{font-size:clamp(34px,8vw,64px);margin:8px 0 10px}
.phead h1 em{font-style:normal;color:var(--orange-deep)}
.phead p{font-size:14.5px;font-weight:600;max-width:520px;margin:0 auto}
.toc{display:flex;justify-content:center;gap:10px;margin-top:20px;flex-wrap:wrap}
.toc a{border:1.5px solid var(--line-2);border-radius:999px;padding:8px 20px;font-size:12.5px;font-weight:900;color:var(--ink);transition:.2s}
.toc a:hover{background:var(--ink);color:#fff;border-color:var(--ink)}
.sec-rule{max-width:1280px;margin:40px auto 0;padding:0 24px}
.sec-rule .line{height:1px;background:var(--line-2)}
.sec-rule h2{font-size:clamp(26px,5.5vw,42px);padding-top:24px}
.sec-rule .kick{display:block;padding-top:22px;margin-bottom:-16px}
.post{max-width:780px;margin:44px auto 0;padding:0 24px 44px;border-bottom:1px solid var(--line)}
.post:last-of-type{border-bottom:none}
.post .pimg{aspect-ratio:16/8.5;border-radius:6px;overflow:hidden;position:relative;background:var(--tile);margin-bottom:20px}
@supports not (aspect-ratio:1){.post .pimg{height:0;padding-bottom:53%}}
.post .pimg img{position:absolute;inset:0}
.post .meta{display:flex;gap:14px;flex-wrap:wrap;font-size:10.5px;font-weight:800;color:var(--muted);letter-spacing:.12em;text-transform:uppercase;font-family:var(--mono);margin-bottom:10px}
.post .meta b{color:var(--orange-deep)}
.post h3{font-size:clamp(21px,4.8vw,30px);margin-bottom:12px}
.post p{margin-bottom:14px;font-weight:600;font-size:15px}
.post .hl{background:#fff;border:1px solid var(--line);border-inline-start:3px solid var(--orange);border-radius:4px;padding:14px 18px;font-size:13.5px;font-weight:700;color:var(--ink);margin:18px 0}
.post .back{font-size:12.5px;font-weight:900;color:var(--orange-deep);border-bottom:1.5px solid var(--orange);padding-bottom:2px}
.rmeta{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px}
.rmeta span{border:1.5px solid var(--line-2);border-radius:999px;padding:5px 14px;font-size:11px;font-weight:800;color:var(--ink);font-family:var(--mono)}
.rcols{display:grid;gap:22px;margin:18px 0}
@media(min-width:700px){.rcols{grid-template-columns:1fr 1.4fr}}
.rbox{background:#fff;border:1px solid var(--line);border-radius:6px;padding:18px 20px}
.rbox h4{font-size:13px;color:var(--ink);letter-spacing:.1em;text-transform:uppercase;font-family:var(--mono);font-weight:700;margin-bottom:10px;border-bottom:1px solid var(--line);padding-bottom:8px}
.rbox ul{list-style:none}
.rbox ul li{padding:5px 0;font-size:13.5px;font-weight:700;color:var(--ink);border-bottom:1px dashed var(--line)}
.rbox ul li:last-child{border-bottom:none}
.rbox ol{padding-inline-start:18px}
.rbox ol li{padding:5px 0;font-size:13.5px;font-weight:600}
footer{background:var(--navy);color:#9FB4D2;padding:44px 24px calc(48px + var(--sab));text-align:center;margin-top:56px}
footer .flinks{display:flex;justify-content:center;gap:26px;flex-wrap:wrap;font-size:12.5px;font-weight:800;margin-bottom:16px}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:10.5px;font-weight:600;color:#6E84A5;line-height:2}

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
@php
  $blogArticles = __('website.blog.articles');
  $blogRecipes = __('website.blog.recipes');
  $articleImgs = ['p92_1200x640.jpg', 'p93_1200x640.jpg', 'p94_1200x640.jpg'];
  $recipeImgs = ['p95_1200x640.jpg', 'p96_1200x640.jpg', 'p97_1200x640.jpg'];
  $articleHrefs = [route('website.store'), route('website.subscribe').'#plan=muscle', route('website.store')];
  $recipeHrefs = [route('website.product'), route('website.store'), route('website.store')];
@endphp
<div class="announce">{!! __('website.blog.announce') !!}</div>

@include('website.partials.nav', ['active' => 'blog', 'showCart' => false])

<header class="phead">
  <span class="kick">{{ __('website.blog.kick') }}</span>
  <h1>{!! __('website.blog.h1') !!}</h1>
  <p>{{ __('website.blog.sub') }}</p>
  <div class="toc"><a href="#articles">{{ __('website.blog.toc_articles') }}</a><a href="#recipes">{{ __('website.blog.toc_recipes') }}</a></div>
</header>

<div class="sec-rule" id="articles"><div class="line"></div><span class="kick">{{ __('website.blog.articles_kick') }}</span><h2>{{ __('website.blog.articles_h2') }}</h2></div>

@foreach ($blogArticles as $i => $a)
<article class="post" id="a{{ $i + 1 }}">
  <div class="pimg"><img class="aiimg" src="{{ asset('assets/images/'.$articleImgs[$i]) }}" alt="" onerror="this.remove()"></div>
  <div class="meta"><span><b>{{ $a['cat'] }}</b></span><span>{{ $a['time'] }}</span><span>{{ $a['author'] }}</span></div>
  <h3>{{ $a['title'] }}</h3>
  <p>{{ $a['p1'] }}</p>
  <p>{{ $a['p2'] }}</p>
  <div class="hl">{{ $a['hl'] }}</div>
  <p>{{ $a['p3'] }}</p>
  <a class="back" href="{{ $articleHrefs[$i] }}">{{ $a['cta'] }}</a>
</article>
@endforeach

<div class="sec-rule" id="recipes"><div class="line"></div><span class="kick">{{ __('website.blog.recipes_kick') }}</span><h2>{{ __('website.blog.recipes_h2') }}</h2></div>

@foreach ($blogRecipes as $i => $r)
<article class="post" id="r{{ $i + 1 }}">
  <div class="pimg"><img class="aiimg" src="{{ asset('assets/images/'.$recipeImgs[$i]) }}" alt="" onerror="this.remove()"></div>
  <div class="meta"><span><b>{{ $r['cat'] }}</b></span><span>{{ $r['meta_title'] }}</span></div>
  <h3>{{ $r['title'] }}</h3>
  <div class="rmeta"><span>{{ $r['time'] }}</span><span>{{ $r['kcal'] }}</span><span>{{ $r['protein'] }}</span><span>{{ $r['servings'] }}</span></div>
  <div class="rcols">
    <div class="rbox"><h4>{{ __('website.blog.ingredients') }}</h4><ul>
      @foreach ($r['ingredients'] as $ing)<li>{{ $ing }}</li>@endforeach
    </ul></div>
    <div class="rbox"><h4>{{ __('website.blog.method') }}</h4><ol>
      @foreach ($r['steps'] as $step)<li>{{ $step }}</li>@endforeach
    </ol></div>
  </div>
  <a class="back" href="{{ $recipeHrefs[$i] }}">{{ $r['cta'] }}</a>
</article>
@endforeach

@include('website.partials.footer', ['variant' => 'simple'])

@include('website.partials.mobile-menu')

@endsection

@push('scripts')
<script>
@verbatim

try{
document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy'; img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});
}catch(_){document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});}

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
