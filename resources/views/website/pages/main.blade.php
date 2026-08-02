@extends('website.layouts.app')

@section('title', __('website.main.title'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/locomotive-scroll/4.1.4/locomotive-scroll.min.css">
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-2:#1B3A61; --navy-3:#24487A;
  --white:#fff; --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.18;letter-spacing:-.015em}
img{display:block;width:100%;height:100%;object-fit:cover}
button{font-family:var(--font);cursor:pointer}
.container{max-width:1260px;margin:0 auto;padding:0 20px}
.aiimg{transition:opacity .9s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.js .rv{opacity:0;transform:translateY(22px);transition:opacity .65s cubic-bezier(.2,.7,.2,1),transform .65s cubic-bezier(.2,.7,.2,1)}
.js .rv.in{opacity:1;transform:none}
.kick{font-size:12px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep)}
.mono{font-family:var(--mono);letter-spacing:.14em;text-transform:uppercase}

/* ===== flat 2d icons ===== */
.i{width:1.05em;height:1.05em;fill:currentColor;vertical-align:-0.14em;display:inline-block}
.ph svg{width:54px;height:54px;color:var(--gray-3);fill:currentColor}

/* ===== buttons ===== */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:15px;border-radius:999px;padding:16px 32px;min-height:54px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.35)}
.btn:hover{filter:brightness(1.06)}
.btn:active{transform:scale(.97)}
.btn.navy{background:var(--navy);border-color:var(--navy);box-shadow:0 12px 28px rgba(18,43,74,.3)}
.btn.navy:hover{background:var(--navy-2)}
.btn.inv{background:#fff;border-color:var(--navy);color:var(--navy);box-shadow:none}
.btn.inv:hover{background:var(--navy);color:#fff}
.btn.sm{padding:12px 22px;min-height:46px;font-size:13.5px}

/* ===== fuel/energy bars ===== */
.fuel{--v:0%}
.fuel-bar{height:9px;background:rgba(18,43,74,.1);border-radius:99px;overflow:hidden;position:relative}
.fuel-bar i{position:absolute;inset-block:0;inset-inline-start:0;width:var(--v);background:var(--grad);border-radius:99px;box-shadow:0 0 12px rgba(240,127,45,.55);transition:width 1.2s cubic-bezier(.2,.7,.2,1)}
.spec-card .fuel-bar{background:rgba(255,255,255,.14)}
.macro{display:grid;grid-template-columns:auto 1fr auto;gap:8px;align-items:center;font-size:11px;font-weight:800;color:var(--ink)}
.macro small{color:var(--muted);font-weight:700;min-width:52px}
.macro b{font-family:var(--mono);font-size:11px;color:var(--navy)}

/* ===== announcement ===== */
.announce{background:var(--navy);color:#fff;text-align:center;padding:9px 14px;font-size:12.5px;font-weight:700;position:relative;overflow:hidden;min-height:calc(38px + var(--sat))}
.announce b{color:var(--orange-hi)}
.announce span{position:absolute;inset-inline:14px;top:calc(9px + var(--sat));opacity:0;transition:opacity .4s}
.announce span.on{opacity:1}

/* ===== nav ===== */
nav.main{position:sticky;top:0;padding-top:var(--sat);z-index:90;background:rgba(247,245,241,.9);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2)}
nav.main .bar{max-width:1260px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:66px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo .mark{width:36px;height:36px;border-radius:50%;background:conic-gradient(from 210deg,var(--navy-3),var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%, rgba(255,255,255,.9), rgba(255,255,255,.2) 36%, transparent 60%)}
.logo b{font-size:19px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover{border-color:var(--orange)}
@media(min-width:1060px){.nav-links{display:flex}}
.nav-right{display:flex;align-items:center;gap:8px}
.cart{width:36px;height:36px;border-radius:50%;border:1.5px solid var(--gray-3);background:#fff;display:grid;place-items:center;position:relative}
.cart .i{width:16px;height:16px;color:var(--navy)}
.cart i{position:absolute;top:-3px;inset-inline-start:-3px;background:var(--orange);color:#fff;font-style:normal;font-size:9px;width:16px;height:16px;border-radius:50%;display:grid;place-items:center;font-weight:800}

/* ===== hero ===== */
.hero{border-bottom:1px solid var(--gray-2);position:relative;overflow:hidden}
.hero::before{content:"";position:absolute;top:-160px;inset-inline-end:-160px;width:460px;height:460px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.14),transparent 65%)}
.hero-grid{max-width:1260px;margin:0 auto;display:grid;min-height:540px;position:relative;z-index:2}
@media(min-width:920px){.hero-grid{grid-template-columns:1.05fr .95fr;min-height:640px}}
.hero-copy{padding:52px 20px 40px;display:flex;flex-direction:column;justify-content:center}
@media(min-width:920px){.hero-copy{padding:60px 20px 60px 40px}}
.hero-rating{display:flex;align-items:center;gap:10px;margin-bottom:20px;font-size:13px;font-weight:800;color:var(--ink)}
.stars{color:var(--orange);letter-spacing:2px;font-size:15px}
.hero h1{font-size:clamp(42px,10vw,86px);line-height:1.06;margin-bottom:18px}
.hero h1 em{font-style:normal;color:var(--orange-deep)}
.hero p.lead{font-size:17px;max-width:460px;margin-bottom:24px;font-weight:600}
.hero-ctas{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:26px}
.day-fuel{max-width:440px;background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:16px 18px;box-shadow:0 14px 34px rgba(18,43,74,.08)}
.day-fuel .top{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:9px;font-weight:900;color:var(--navy);font-size:13.5px}
.day-fuel .top .i{color:var(--orange-deep);width:14px;height:14px}
.day-fuel .top b{font-family:var(--mono);color:var(--orange-deep);font-size:15px}
.day-fuel .segs{display:flex;gap:5px;font-size:10px;font-weight:800;color:var(--muted);margin-top:8px;justify-content:space-between}
.hero-visual{position:relative;background:var(--navy);min-height:360px}
.hero-visual .ph{position:absolute;inset:0;display:grid;place-items:center;background:linear-gradient(160deg,var(--navy-2),var(--navy))}
.hero-visual .ph svg{width:88px;height:88px;color:rgba(255,255,255,.2)}
.hero-visual img{position:absolute;inset:0}
.hero-visual::after{content:"";position:absolute;inset:0;background:linear-gradient(200deg,transparent 60%,rgba(18,43,74,.55))}
.hv-chip{position:absolute;z-index:3;background:#fff;border-radius:16px;box-shadow:0 18px 40px rgba(18,43,74,.25);padding:11px 15px;display:flex;align-items:center;gap:10px;animation:floaty 4.5s ease-in-out infinite}
.hv-chip.a{top:18px;inset-inline-start:16px}
.hv-chip.b{bottom:64px;inset-inline-end:16px;animation-delay:-2.2s}
.hv-chip .ic{width:38px;height:38px;border-radius:11px;display:grid;place-items:center;background:var(--orange-soft);color:var(--orange-deep);flex-shrink:0}
.hv-chip .ic .i{width:19px;height:19px}
.hv-chip b{display:block;font-size:14px;color:var(--navy);line-height:1.3}
.hv-chip small{font-size:10.5px;color:var(--muted);font-weight:700}
@keyframes floaty{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
.hero-tag{position:absolute;bottom:18px;inset-inline-start:18px;z-index:3;background:var(--orange);color:#fff;font-size:11.5px;font-weight:900;padding:9px 16px;border-radius:999px;letter-spacing:.05em;box-shadow:0 10px 24px rgba(240,127,45,.4)}

/* ===== USP strip ===== */
.usp-strip{border-bottom:1px solid var(--gray-2);background:#fff}
.usp-grid{max-width:1260px;margin:0 auto;display:grid;grid-template-columns:repeat(2,1fr)}
@media(min-width:920px){.usp-grid{grid-template-columns:repeat(4,1fr)}}
.usp{padding:24px 18px;text-align:center;border-inline-start:1px solid var(--gray-2)}
.usp:first-child,.usp:nth-child(3){border-inline-start:none}
@media(min-width:920px){.usp:nth-child(3){border-inline-start:1px solid var(--gray-2)}}
.usp .ic{width:46px;height:46px;border-radius:13px;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;margin:0 auto 9px}
.usp .ic .i{width:22px;height:22px}
.usp b{display:block;font-size:15px;color:var(--navy);font-weight:900}
.usp small{font-size:12px;color:var(--muted);font-weight:700}

/* ===== sections ===== */
.section{padding:72px 0}
.sec-head{max-width:780px;margin:0 auto 40px;text-align:center;padding:0 20px}
.sec-head h2{font-size:clamp(30px,6.5vw,52px);margin:10px 0 12px}
.sec-head h2 em{font-style:normal;color:var(--orange-deep)}
.sec-head p{font-size:15.5px;font-weight:600}

/* ===== ABOUT ===== */
.about-grid{max-width:1160px;margin:0 auto;padding:0 20px;display:grid;gap:28px}
@media(min-width:920px){.about-grid{grid-template-columns:1fr 1fr;align-items:center;gap:48px}}
.about-photo{border-radius:22px;overflow:hidden;position:relative;aspect-ratio:4/3.4;background:var(--tile);box-shadow:0 24px 54px rgba(18,43,74,.14)}
@supports not (aspect-ratio:1){.about-photo{height:0;padding-bottom:85%}}
.about-photo .ph{position:absolute;inset:0;display:grid;place-items:center}
.about-photo img{position:absolute;inset:0}
.about-badge{position:absolute;bottom:14px;inset-inline-start:14px;z-index:2;background:#fff;border-radius:14px;padding:10px 16px;font-size:12px;font-weight:900;color:var(--navy);box-shadow:0 12px 28px rgba(18,43,74,.18)}
.about-badge b{color:var(--orange-deep);font-family:var(--mono)}
.about-copy h2{font-size:clamp(28px,5.6vw,44px);margin:8px 0 14px}
.about-copy h2 em{font-style:normal;color:var(--orange-deep)}
.about-copy p{font-size:15px;font-weight:600;margin-bottom:16px;max-width:480px}
.about-list{list-style:none;margin:4px 0 22px}
.about-list li{display:flex;gap:10px;font-size:14px;font-weight:800;color:var(--ink);padding:6px 0}
.about-list li .i{color:var(--green);width:18px;height:18px;flex-shrink:0;margin-top:3px}
.about-mini{display:flex;gap:26px;border-top:1.5px solid var(--gray-2);padding-top:18px}
.about-mini b{display:block;font-size:24px;color:var(--navy);font-weight:900}
.about-mini b .a{color:var(--orange-deep)}
.about-mini span{font-size:11.5px;color:var(--muted);font-weight:800}

/* ===== PRODUCTS (spec-row pattern) ===== */
.shop{background:#EFEBE3}
.prod-grid{display:grid;gap:26px 16px;grid-template-columns:repeat(2,1fr);max-width:1260px;margin:0 auto;padding:0 20px}
@media(min-width:1040px){.prod-grid{grid-template-columns:repeat(4,1fr);gap:30px 18px}}
.prod{display:flex;flex-direction:column}
.prod-tile{aspect-ratio:1/1;position:relative;overflow:hidden;background:var(--tile);border-radius:16px;margin-bottom:14px}
@supports not (aspect-ratio:1){.prod-tile{height:0;padding-bottom:100%}}
.prod-tile .ph{position:absolute;inset:0;display:grid;place-items:center}
.prod-tile img{position:absolute;inset:0;transition:transform .45s ease}
.prod:hover .prod-tile img{transform:scale(1.05)}
.p-flag{position:absolute;top:12px;inset-inline-start:12px;z-index:2;display:inline-flex;align-items:center;gap:6px;font-size:10.5px;font-weight:900;letter-spacing:.08em;color:var(--navy)}
.p-flag .i{width:15px;height:15px;color:var(--orange-deep)}
.prod h3{font-size:17px;font-weight:900;line-height:1.35}
.p-sub{font-size:13px;color:var(--body);font-weight:600;margin:2px 0 0}
.p-specs{border-top:1.5px solid var(--gray-2);border-bottom:1.5px solid var(--gray-2);margin:13px 0;padding:11px 0;display:grid;gap:9px}
.p-spec{display:flex;align-items:center;gap:9px;font-size:13px;font-weight:800;color:var(--ink)}
.p-spec .i{width:19px;height:19px;color:var(--navy);flex-shrink:0}
.kcal-box{display:inline-grid;place-items:center;min-width:38px;height:22px;border:1.8px solid var(--navy);border-radius:6px;font-family:var(--mono);font-size:9.5px;font-weight:700;color:var(--navy);padding:0 5px;flex-shrink:0}
.p-price{font-weight:900;font-size:19px;color:var(--navy)}
.p-price small{display:block;font-size:12px;color:var(--muted);font-weight:700}
.p-view{margin-top:13px;display:flex;justify-content:center;background:var(--navy);color:#fff;font-weight:800;font-size:14px;border-radius:999px;padding:13px;min-height:48px;align-items:center;transition:.2s}
.p-view:hover{background:var(--orange-deep)}
.p-view:active{transform:scale(.97)}
.shop-cta{text-align:center;margin-top:38px}

/* ===== DELIVERY APPS ===== */
.apps{background:#fff;border-top:1px solid var(--gray-2)}
.apps-grid{max-width:1160px;margin:0 auto;padding:0 20px;display:grid;gap:16px;grid-template-columns:1fr}
@media(min-width:640px){.apps-grid{grid-template-columns:1fr 1fr}}
@media(min-width:900px){.apps-grid{grid-template-columns:repeat(3,1fr);gap:18px}}
@media(min-width:1180px){.apps-grid{grid-template-columns:repeat(5,1fr);gap:16px}}
.app-card{--app:#122B4A;display:flex;flex-direction:column;background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:18px 18px 16px;position:relative;overflow:hidden;box-shadow:0 10px 28px rgba(18,43,74,.05);transition:transform .2s,box-shadow .2s;min-height:100%}
.app-card::before{content:"";position:absolute;inset-inline:0;top:0;height:3px;background:var(--app)}
.app-card:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(18,43,74,.1)}
.app-card__top{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:14px}
.app-card__logo{width:52px;height:52px;border-radius:14px;overflow:hidden;background:#fff;border:1.5px solid var(--gray-2);flex-shrink:0;display:grid;place-items:center;padding:4px}
.app-card__logo img{width:100%;height:100%;object-fit:contain;display:block}
.app-card__name{text-align:start;min-width:0}
.app-card__name b{display:block;font-size:17px;color:var(--navy);font-weight:900;line-height:1.25}
.app-card__name span{display:block;font-size:11px;font-weight:800;letter-spacing:.12em;color:var(--app);font-family:var(--mono);margin-top:3px}
.app-card__desc{flex:1;font-size:13.5px;font-weight:700;color:var(--body);line-height:1.7;margin-bottom:16px}
.app-card__cta{display:flex;align-items:center;justify-content:center;min-height:46px;border-radius:12px;background:var(--app);color:#fff;font-weight:900;font-size:14px;transition:.18s}
.app-card__cta:hover{filter:brightness(1.08)}
.app-card__cta:active{transform:scale(.98)}

/* ===== NUTRITION SPEC ===== */
.spec-grid{max-width:1160px;margin:0 auto;padding:0 20px;display:grid;gap:22px}
@media(min-width:920px){.spec-grid{grid-template-columns:1fr 1fr;align-items:center}}
.spec-photo{border-radius:20px;overflow:hidden;position:relative;aspect-ratio:4/3.4;background:var(--tile);box-shadow:0 24px 54px rgba(18,43,74,.14)}
@supports not (aspect-ratio:1){.spec-photo{height:0;padding-bottom:85%}}
.spec-photo .ph{position:absolute;inset:0;display:grid;place-items:center}
.spec-photo .ph svg{width:72px;height:72px}
.spec-photo img{position:absolute;inset:0}
.spec-photo .cap{position:absolute;bottom:12px;inset-inline-start:12px;z-index:2;background:rgba(18,43,74,.85);color:#fff;font-size:11px;font-weight:800;border-radius:999px;padding:7px 14px}
.spec-card{background:var(--navy);border-radius:20px;padding:26px 24px;color:#fff;box-shadow:0 24px 54px rgba(18,43,74,.3)}
.spec-card h3{color:#fff;font-size:22px;margin-bottom:4px}
.spec-card .sub{font-size:12px;color:#9FB4D2;font-weight:800;margin-bottom:18px}
.spec-row{display:grid;grid-template-columns:1.1fr 2fr auto;gap:12px;align-items:center;padding:11px 0;border-top:1px solid rgba(255,255,255,.12);font-size:13px;font-weight:800}
.spec-row:first-of-type{border-top:none}
.spec-row .n{color:#C7D6EC}
.spec-row .v{font-family:var(--mono);color:#fff;font-size:13px;min-width:64px;text-align:left}
.spec-row .v em{font-style:normal;color:var(--orange-hi)}
.spec-note{margin-top:14px;font-size:10.5px;color:#8FA4C4;font-weight:700}

/* ===== JOURNEY ===== */
.zig{max-width:1260px;margin:0 auto}
.zrow{display:grid;border-top:1px solid var(--gray-2)}
@media(min-width:920px){.zrow{grid-template-columns:1fr 1fr;min-height:460px}.zrow.flip .zmedia{order:2}}
.zmedia{position:relative;min-height:290px;background:var(--tile);overflow:hidden}
.zmedia .ph{position:absolute;inset:0;display:grid;place-items:center}
.zmedia .ph svg{width:64px;height:64px}
.zmedia img{position:absolute;inset:0}
.znum{position:absolute;top:16px;inset-inline-start:16px;z-index:2;background:var(--orange);color:#fff;font-size:11px;font-weight:900;padding:7px 15px;border-radius:999px;letter-spacing:.08em;box-shadow:0 8px 20px rgba(240,127,45,.4)}
.zcopy{padding:40px 20px;display:flex;flex-direction:column;justify-content:center}
@media(min-width:920px){.zcopy{padding:50px 48px}}
.zcopy h3{font-size:clamp(25px,5.4vw,40px);margin:8px 0 12px}
.zcopy p{font-size:15px;max-width:430px;font-weight:600;margin-bottom:18px}
.z-fuel{max-width:360px;margin-bottom:18px}
.z-fuel .macro{margin-bottom:7px}
.zlink{font-weight:900;font-size:14px;color:var(--orange-deep);display:inline-flex;align-items:center;gap:8px;border-bottom:2.5px solid var(--orange);padding-bottom:2px;width:max-content}

/* ===== video placeholders ===== */
.vid{position:relative;cursor:pointer;overflow:hidden}
.vid img{transition:transform .5s ease}
.vid:hover img{transform:scale(1.04)}
.vid::after{content:"";position:absolute;inset:0;background:linear-gradient(200deg,rgba(18,43,74,.05) 40%,rgba(18,43,74,.55));z-index:1}
.vid .play{position:absolute;top:50%;inset-inline-start:50%;transform:translate(50%,-50%);z-index:3;width:74px;height:74px;border-radius:50%;background:var(--grad);display:grid;place-items:center;box-shadow:0 16px 40px rgba(240,127,45,.5),0 0 0 0 rgba(240,127,45,.45);animation:playPulse 2.4s ease-out infinite;transition:transform .2s;border:none}
.vid:hover .play{transform:translate(50%,-50%) scale(1.08)}
.vid .play svg{width:28px;height:28px;fill:#fff;transform:scaleX(-1);margin-inline-end:-4px}
@keyframes playPulse{0%{box-shadow:0 16px 40px rgba(240,127,45,.5),0 0 0 0 rgba(240,127,45,.45)}70%{box-shadow:0 16px 40px rgba(240,127,45,.5),0 0 0 22px rgba(240,127,45,0)}100%{box-shadow:0 16px 40px rgba(240,127,45,.5),0 0 0 0 rgba(240,127,45,0)}}
.vid .dur{position:absolute;bottom:13px;inset-inline-end:13px;z-index:3;background:rgba(18,43,74,.85);color:#fff;font-family:var(--mono);font-size:11px;font-weight:700;border-radius:999px;padding:6px 13px}
.vid .vtag{position:absolute;top:13px;inset-inline-end:13px;z-index:3;background:#fff;color:var(--navy);font-size:10px;font-weight:900;letter-spacing:.1em;border-radius:999px;padding:6px 13px}
.vid .vnote{position:absolute;bottom:13px;inset-inline-start:13px;z-index:3;background:rgba(255,255,255,.94);color:var(--navy);font-size:11px;font-weight:800;border-radius:999px;padding:7px 14px;opacity:0;transform:translateY(6px);transition:.3s;max-width:70%}
.vid.nudge .vnote{opacity:1;transform:none}
.vid.playing .play,.vid.playing .dur,.vid.playing .vtag,.vid.playing .vnote{display:none}
.vid.playing::after{display:none}
.vid video,.vid iframe{position:absolute;inset:0;width:100%;height:100%;border:0;z-index:4;background:#000;object-fit:cover}
.film-wrap{max-width:1080px;margin:0 auto;padding:0 20px}
.film{border-radius:22px;aspect-ratio:16/9;background:var(--navy-2);box-shadow:0 30px 70px rgba(18,43,74,.22)}
@supports not (aspect-ratio:1){.film{height:0;padding-bottom:56.25%}}
.film .ph{position:absolute;inset:0;display:grid;place-items:center}
.film .ph svg{width:80px;height:80px;color:rgba(255,255,255,.18)}
.film img{position:absolute;inset:0}
.film-cap{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;max-width:1080px;margin:14px auto 0;padding:0 20px;font-size:12.5px;font-weight:800;color:var(--muted)}
.film-cap b{color:var(--navy)}

/* ===== VALUES ===== */
.val-grid{display:grid;gap:14px;grid-template-columns:1fr;max-width:1160px;margin:0 auto;padding:0 20px}
@media(min-width:700px){.val-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1040px){.val-grid{grid-template-columns:repeat(4,1fr)}}
.val{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:24px 20px;transition:transform .2s,box-shadow .2s}
.val:hover{transform:translateY(-4px);box-shadow:0 20px 44px rgba(18,43,74,.1)}
.val .ic{width:48px;height:48px;border-radius:14px;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;margin-bottom:14px}
.val .ic .i{width:23px;height:23px}
.val h3{font-size:16.5px;margin-bottom:5px}
.val p{font-size:12.5px;font-weight:600;color:var(--muted)}
.band{background:var(--navy);color:#fff;padding:70px 0;position:relative;overflow:hidden;margin-top:56px}
.band::before{content:"";position:absolute;top:-140px;inset-inline-start:15%;width:380px;height:380px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.25),transparent 65%)}
.band .kick{color:var(--orange-hi)}
.band h2{color:#fff;font-size:clamp(28px,6.2vw,52px);max-width:840px;margin:12px auto 40px;text-align:center;padding:0 20px;position:relative;z-index:2}
.band h2 .u{box-shadow:inset 0 -0.28em 0 var(--orange)}
.band-grid{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(2,1fr);border-top:1px solid rgba(255,255,255,.12);padding:0 20px;position:relative;z-index:2}
@media(min-width:920px){.band-grid{grid-template-columns:repeat(4,1fr)}}
.bstat{padding:26px 14px;text-align:center;border-bottom:1px solid rgba(255,255,255,.12)}
.bstat b{display:block;font-size:clamp(30px,6.2vw,46px);font-weight:900;color:#fff;line-height:1.15}
.bstat b .a{color:var(--orange-hi)}
.bstat span{font-size:12.5px;color:#9FB4D2;font-weight:700}

/* ===== reviews ===== */
.rev-head{display:flex;flex-direction:column;align-items:center;gap:8px;margin-bottom:34px;text-align:center;padding:0 20px}
.rev-head .stars{font-size:24px;letter-spacing:4px}
.rev-head b{font-size:15px;color:var(--navy);font-weight:900}
.rev-grid{display:grid;gap:14px;grid-template-columns:1fr;max-width:1260px;margin:0 auto;padding:0 20px}
@media(min-width:760px){.rev-grid{grid-template-columns:repeat(3,1fr)}}
.rev{background:#fff;border:1.5px solid var(--gray-2);border-radius:16px;padding:22px}
.rev .stars{font-size:13px;letter-spacing:2px;margin-bottom:10px}
.rev h4{font-size:15px;margin-bottom:6px}
.rev p{font-size:13.5px;font-weight:600;margin-bottom:16px}
.rev .who{display:flex;align-items:center;gap:10px;font-size:12px;color:var(--muted);font-weight:800}
.rev .who .av{width:40px;height:40px;border-radius:50%;overflow:hidden;position:relative;flex-shrink:0;border:2px solid var(--orange-soft)}
.rev .who .av .ph{position:absolute;inset:0;display:grid;place-items:center}
.rev .who .av .ph svg{width:22px;height:22px;color:var(--muted)}
.rev .who .av img{position:absolute;inset:0}
.rev .who b{color:var(--navy);display:block;line-height:1.4}
.rev .who i{font-style:normal;color:var(--green);font-weight:800}

/* ===== SUBSCRIPTIONS ===== */
.subs{background:linear-gradient(180deg,var(--navy) 0%,#0C1F38 100%);color:#fff;padding:80px 0 90px;position:relative;overflow:hidden;border-radius:44px 44px 0 0}
.subs::before{content:"";position:absolute;top:-160px;inset-inline-end:-100px;width:440px;height:440px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.3),transparent 65%);animation:glow 6s ease-in-out infinite alternate}
.subs::after{content:"";position:absolute;bottom:-180px;inset-inline-start:-120px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(36,72,122,.7),transparent 65%)}
@keyframes glow{from{opacity:.7;transform:scale(1)}to{opacity:1;transform:scale(1.15)}}
.subs .sec-head h2{color:#fff}
.subs .sec-head p{color:#B9C9E2}
.subs .inner{position:relative;z-index:2}
.toggle-wrap{display:flex;justify-content:center;margin-bottom:40px}
.toggle{display:inline-flex;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.18);border-radius:999px;padding:5px;position:relative;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
.toggle button{position:relative;z-index:2;border:none;background:none;color:#B9C9E2;font-weight:800;font-size:13.5px;padding:11px 24px;border-radius:999px;transition:color .25s;display:flex;align-items:center;gap:7px}
.toggle button.on{color:var(--navy)}
.toggle button .save{background:var(--green);color:#fff;font-size:9.5px;font-weight:900;border-radius:999px;padding:2px 8px}
.toggle .pill{position:absolute;top:5px;bottom:5px;border-radius:999px;background:#fff;transition:all .35s cubic-bezier(.2,.8,.2,1);z-index:1}
.sub-grid{display:grid;gap:16px;max-width:1120px;margin:0 auto;padding:0 20px}
@media(min-width:920px){.sub-grid{grid-template-columns:repeat(3,1fr);align-items:stretch}}
.splan{background:rgba(255,255,255,.06);border:1.5px solid rgba(255,255,255,.14);border-radius:24px;padding:28px 24px;display:flex;flex-direction:column;position:relative;backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);transition:transform .25s}
.splan:hover{transform:translateY(-6px)}
.splan.pop{background:linear-gradient(165deg,rgba(240,127,45,.16),rgba(255,255,255,.05));border:2px solid var(--orange);box-shadow:0 0 0 6px rgba(240,127,45,.12),0 34px 70px rgba(0,0,0,.45)}
@media(min-width:920px){.splan.pop{transform:scale(1.05)}.splan.pop:hover{transform:scale(1.05) translateY(-6px)}}
.splan .tag{position:absolute;top:-14px;inset-inline-start:50%;transform:translateX(50%);background:var(--grad);color:#fff;font-size:11px;font-weight:900;border-radius:999px;padding:6px 18px;box-shadow:0 10px 24px rgba(240,127,45,.5);white-space:nowrap}
.splan .code{font-family:var(--mono);font-size:10px;color:#8FA4C4;letter-spacing:.16em}
.splan h3{color:#fff;font-size:23px;margin:4px 0 2px}
.splan .goal{font-size:12px;color:#B9C9E2;font-weight:800;margin-bottom:16px;display:flex;align-items:center;gap:6px}
.splan .goal .i{width:13px;height:13px;color:var(--orange-hi)}
.splan .pline{display:flex;align-items:baseline;gap:7px}
.splan .pline b{font-size:clamp(38px,8vw,50px);font-weight:900;color:#fff;line-height:1.05;font-family:var(--mono)}
.splan .pline small{font-size:13px;color:#8FA4C4;font-weight:800}
.splan .was{font-size:12px;color:#8FA4C4;font-weight:700;height:20px}
.splan .was s{color:#E88}
.splan .per{display:inline-flex;width:max-content;background:rgba(57,180,120,.18);border:1px solid rgba(57,180,120,.4);color:#5FE0A0;font-size:11.5px;font-weight:900;border-radius:999px;padding:4px 12px;margin:8px 0 16px}
.plan-fuel{background:rgba(0,0,0,.22);border:1px solid rgba(255,255,255,.1);border-radius:14px;padding:13px 14px;margin-bottom:16px}
.plan-fuel .hd{display:flex;justify-content:space-between;font-size:10.5px;font-weight:900;color:#B9C9E2;margin-bottom:8px;letter-spacing:.06em}
.plan-fuel .hd .i{width:13px;height:13px;color:var(--orange-hi)}
.plan-fuel .hd b{font-family:var(--mono);color:var(--orange-hi)}
.plan-fuel .fuel-bar{background:rgba(255,255,255,.14)}
.plan-fuel .meals{display:flex;gap:6px;margin-top:9px}
.plan-fuel .meals span{flex:1;text-align:center;font-size:9.5px;font-weight:800;color:#8FA4C4;background:rgba(255,255,255,.06);border-radius:8px;padding:5px 2px}
.plan-fuel .meals span.on{background:rgba(240,127,45,.22);color:var(--orange-hi);border:1px solid rgba(240,127,45,.4)}
.splan ul{list-style:none;margin-bottom:20px}
.splan li{display:flex;gap:9px;font-size:13px;font-weight:700;color:#DCE6F4;padding:5px 0}
.splan li::before{content:"✓";color:var(--orange-hi);font-weight:900}
.splan li.no{opacity:.35}
.splan li.no::before{content:"—"}
.splan .btn{width:100%;margin-top:auto}
.sub-guarantee{display:flex;align-items:center;justify-content:center;gap:10px;margin:34px auto 0;max-width:600px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.16);border-radius:999px;padding:14px 24px;font-size:13px;font-weight:800;color:#DCE6F4;text-align:center;position:relative;z-index:2}
.sub-guarantee .i{width:17px;height:17px;color:var(--orange-hi);flex-shrink:0}
.sub-trust{display:flex;justify-content:center;gap:22px;flex-wrap:wrap;margin-top:20px;font-size:11.5px;font-weight:800;color:#8FA4C4;position:relative;z-index:2}
.sub-trust span{display:inline-flex;gap:6px;align-items:center}
.sub-trust b{color:var(--orange-hi)}

/* ===== ARTICLES & RECIPES ===== */
.card-grid{display:grid;gap:16px;grid-template-columns:1fr;max-width:1260px;margin:0 auto;padding:0 20px}
@media(min-width:760px){.card-grid{grid-template-columns:repeat(3,1fr)}}
.acard{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;transition:transform .2s,box-shadow .2s}
.acard:hover{transform:translateY(-5px);box-shadow:0 22px 48px rgba(18,43,74,.12)}
.acard .media{aspect-ratio:16/10;position:relative;overflow:hidden;background:var(--tile)}
@supports not (aspect-ratio:1){.acard .media{height:0;padding-bottom:62.5%}}
.acard .media .ph{position:absolute;inset:0;display:grid;place-items:center}
.acard .media img{position:absolute;inset:0;transition:transform .45s ease}
.acard:hover .media img{transform:scale(1.05)}
.acard .cat{position:absolute;top:12px;inset-inline-start:12px;z-index:2;background:#fff;color:var(--navy);font-size:10.5px;font-weight:900;border-radius:999px;padding:5px 13px}
.acard .body{padding:18px 18px 20px;display:flex;flex-direction:column;flex:1}
.acard .meta{display:flex;gap:12px;font-size:11px;font-weight:800;color:var(--muted);margin-bottom:8px;flex-wrap:wrap}
.acard .meta span{display:inline-flex;align-items:center;gap:5px}
.acard .meta .i{width:14px;height:14px;color:var(--orange-deep)}
.acard h3{font-size:16.5px;line-height:1.45;margin-bottom:6px}
.acard .ex{font-size:12.5px;font-weight:600;color:var(--muted);margin-bottom:14px}
.acard .go{margin-top:auto;font-weight:900;font-size:13.5px;color:var(--orange-deep);display:inline-flex;align-items:center;gap:7px}
.center-cta{text-align:center;margin-top:34px}

/* ===== FAQ ===== */
.faq{max-width:780px;margin:0 auto;padding:0 20px}
.fitem{border-bottom:1px solid var(--gray-2)}
.fq{width:100%;background:none;border:none;text-align:start;display:flex;justify-content:space-between;align-items:center;gap:14px;padding:20px 2px;font-size:15.5px;font-weight:900;color:var(--navy)}
.fq .x{width:28px;height:28px;border-radius:50%;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;font-size:16px;font-weight:900;flex-shrink:0;transition:transform .3s}
.fitem.open .fq .x{transform:rotate(45deg)}
.fa{max-height:0;overflow:hidden;transition:max-height .35s ease}
.fa p{padding:0 2px 20px;font-size:14px;font-weight:600}

/* ===== photo CTA ===== */
.photo-cta{position:relative;min-height:440px;display:grid;place-items:center;text-align:center;overflow:hidden;background:var(--navy)}
.photo-cta .ph{position:absolute;inset:0;display:grid;place-items:center;background:linear-gradient(160deg,var(--navy-2),#0C1F38)}
.photo-cta .ph svg{width:90px;height:90px;color:rgba(255,255,255,.16)}
.photo-cta img{position:absolute;inset:0;opacity:.45}
.photo-cta .inner{position:relative;z-index:2;padding:70px 20px}
.photo-cta h2{color:#fff;font-size:clamp(34px,8vw,64px);margin-bottom:12px}
.photo-cta h2 em{font-style:normal;color:var(--orange-hi)}
.photo-cta p{color:#DCE6F4;font-weight:700;font-size:15px;margin-bottom:28px}
.photo-cta small{display:block;margin-top:14px;color:#B9C9E2;font-size:12px;font-weight:700}

/* ===== footer ===== */
footer{background:#0C1F38;color:#9FB4D2;padding:64px 0 calc(100px + var(--sab))}
.f-grid{max-width:1260px;margin:0 auto;padding:0 20px;display:grid;gap:36px}
@media(min-width:920px){.f-grid{grid-template-columns:1.3fr 1fr 1fr 1fr}}
.f-news h3{color:#fff;font-size:22px;margin-bottom:8px}
.f-news p{font-size:13px;font-weight:600;margin-bottom:16px}
.f-form{display:flex;background:#fff;border-radius:999px;padding:5px;max-width:380px}
.f-form input{flex:1;border:none;outline:none;background:none;padding:10px 18px;font-family:var(--font);font-size:13.5px;font-weight:600;color:var(--navy);min-width:0}
.f-form button{border:none;background:var(--grad);color:#fff;font-weight:800;font-size:13px;border-radius:999px;padding:11px 22px}
.f-col h4{color:#fff;font-size:14px;font-weight:900;margin-bottom:14px}
.f-col a{display:block;font-size:13.5px;font-weight:600;margin-bottom:10px;color:#9FB4D2}
.f-col a:hover{color:var(--orange-hi)}
.f-bottom{max-width:1260px;margin:44px auto 0;padding:22px 20px 0;border-top:1px solid rgba(255,255,255,.1);display:flex;justify-content:space-between;gap:14px;flex-wrap:wrap;font-size:11px;font-weight:600;color:#6E84A5}

/* ===== sticky mobile ===== */
.sticky-cta{position:fixed;bottom:0;inset-inline:0;z-index:95;background:rgba(247,245,241,.95);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-top:1px solid var(--gray-2);padding:10px 16px calc(10px + var(--sab));display:flex;align-items:center;gap:12px;transform:translateY(110%);transition:transform .4s cubic-bezier(.2,.85,.2,1)}
.sticky-cta.show{transform:none}
.sticky-cta .info b{display:block;font-size:13.5px;color:var(--navy);font-weight:900;line-height:1.3}
.sticky-cta .info small{font-size:10.5px;color:var(--green);font-weight:800}
.sticky-cta .btn{flex:1;min-height:48px;padding:12px 18px;font-size:14px}
@media(min-width:920px){.sticky-cta{display:none}}

@media (prefers-reduced-motion: reduce){
  .hv-chip,.subs::before,.vid .play{animation:none}
  .js .rv{opacity:1;transform:none;transition:none}
  .fuel-bar i{transition:none}
}
/* ===== locomotive smooth-scroll mode (desktop) ===== */
html.loco nav.main{position:fixed;top:0;inset-inline:0}
html.loco #locoScroll{padding-top:calc(66px + var(--sat))}
[data-scroll-container]{will-change:transform}

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
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-bolt" viewBox="0 0 24 24"><path d="M13 2 4.5 13.5H10L9 22l8.5-11.5H12L13 2z"/></symbol>
<symbol id="i-dumbbell" viewBox="0 0 24 24"><path d="M2 10h2v4H2v-4zm18 0h2v4h-2v-4zM5 7.5h3v9H5v-9zm11 0h3v9h-3v-9zM8 11h8v2H8v-2z"/></symbol>
<symbol id="i-protein" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 9c3-4 6 4 9 0s6 4 9 0"/><path d="M3 15c3-4 6 4 9 0s6 4 9 0"/><path d="M6 7.2v3.6M12 11v3.8M18 7.2v3.6"/></symbol>
<symbol id="i-drop" viewBox="0 0 24 24"><path d="M12 2.5c3.8 5.4 6 8.6 6 11.5a6 6 0 0 1-12 0c0-2.9 2.2-6.1 6-11.5z"/></symbol>
<symbol id="i-flame" viewBox="0 0 24 24"><path d="M12 2c.8 3.8 5 6.2 5 11a5 5 0 0 1-10 0c0-1.8.8-3.1 1.8-4.6.2 1.6.9 2.6 2 3.1-.9-3.2-.2-6.6 1.2-9.5z"/></symbol>
<symbol id="i-clock" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8.5"/><path d="M12 7v5l3.5 2" stroke-linecap="round"/></symbol>
<symbol id="i-wheat" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 22V6"/><path d="M12 9C9.5 9 8 7.5 8 5c2.5 0 4 1.5 4 4zM12 9c2.5 0 4-1.5 4-4-2.5 0-4 1.5-4 4zM12 14c-2.5 0-4-1.5-4-4 2.5 0 4 1.5 4 4zM12 14c2.5 0 4-1.5 4-4-2.5 0-4 1.5-4 4zM12 19c-2.5 0-4-1.5-4-4 2.5 0 4 1.5 4 4zM12 19c2.5 0 4-1.5 4-4-2.5 0-4 1.5-4 4z"/></symbol>
<symbol id="i-bread" viewBox="0 0 24 24"><path d="M7.5 5h9A3.5 3.5 0 0 1 20 8.5c0 1.5-.9 2.7-2 3.2V18a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-6.3c-1.1-.5-2-1.7-2-3.2A3.5 3.5 0 0 1 7.5 5z"/></symbol>
<symbol id="i-cookie" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8.5"/><circle cx="9.5" cy="10" r="1.1" fill="currentColor" stroke="none"/><circle cx="14.5" cy="9.5" r="1.1" fill="currentColor" stroke="none"/><circle cx="10.5" cy="14.5" r="1.1" fill="currentColor" stroke="none"/><circle cx="15" cy="14" r="1.1" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-bowl" viewBox="0 0 24 24"><path d="M3 11h18c0 4.4-3.2 8-9 8s-9-3.6-9-8zm5 9.5h8v1.5H8v-1.5z"/><path d="M9 8.5c0-1.5 1-1.8 1-3" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M13.5 8.5c0-1.5 1-1.8 1-3" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></symbol>
<symbol id="i-box" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M12 3l8.5 4.2v9.1L12 21l-8.5-4.7V7.2L12 3z"/><path d="M3.5 7.2 12 11.5l8.5-4.3M12 11.5V21"/></symbol>
<symbol id="i-clipboard" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 3h6v4H9z" fill="currentColor" stroke="none"/><path d="M9 12h6M9 16h4" stroke-linecap="round"/></symbol>
<symbol id="i-cart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4h2.4L8 15h10l2.2-8H6"/><circle cx="9.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/><circle cx="16.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2l8 3v6.2c0 4.8-3.3 8.3-8 10.8-4.7-2.5-8-6-8-10.8V5l8-3zm-1.2 13.4 5.4-5.4-1.4-1.4-4 4-1.8-1.8-1.4 1.4 3.2 3.2z"/></symbol>
<symbol id="i-target" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1.2" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-user" viewBox="0 0 24 24"><path d="M12 3.5a4.2 4.2 0 1 1 0 8.4 4.2 4.2 0 0 1 0-8.4zM4.5 20.5c0-4 3.3-6 7.5-6s7.5 2 7.5 6h-15z"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><path d="M9.5 16.2 5.3 12l-1.4 1.4 5.6 5.6 12-12L20.1 5.6z"/></symbol>
<symbol id="i-leaf" viewBox="0 0 24 24"><path d="M20 4c.5 8-2.5 15-10 15-3 0-5-1.5-6-3.5C8 16 10 15 12 13c-2 .5-4 .5-6 2 .5-6 5-11 14-11z"/></symbol>
<symbol id="i-book" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15H6.5A2.5 2.5 0 0 0 4 20.5v-15z"/><path d="M4 20.5A2.5 2.5 0 0 1 6.5 18H20"/></symbol>
<symbol id="i-hat" viewBox="0 0 24 24"><path d="M12 3a4.5 4.5 0 0 1 4.4 3.5A3.8 3.8 0 0 1 19 13.7V15H5v-1.3A3.8 3.8 0 0 1 7.6 6.5 4.5 4.5 0 0 1 12 3zM5 17h14v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-2z"/></symbol>
<symbol id="i-play" viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5-11-6.5z"/></symbol>
</defs></svg>

<!-- NAV -->
@include('website.partials.nav', ['active' => 'main', 'showCart' => true])

<main id="locoScroll" data-scroll-container>
<!-- ANNOUNCEMENT -->
<div class="announce" id="announce">
  <span class="on">{!! __('website.main.announce.batch') !!}</span>
  <span>{!! __('website.main.announce.shipping') !!}</span>
  <span>{!! __('website.main.announce.subscribe') !!}</span>
</div>



<!-- HERO -->
<header class="hero">
  <div class="hero-grid">
    <div class="hero-copy">
      <div class="hero-rating"><span class="stars">★★★★★</span> {{ __('website.main.hero.rating') }}</div>
      <h1>{!! __('website.main.hero.h1') !!}</h1>
      <p class="lead">{{ __('website.main.hero.lead') }}</p>
      <div class="hero-ctas">
        <a href="/subscribe" class="btn">{{ __('website.main.hero.cta_sub') }}</a>
        <a href="/store" class="btn inv">{{ __('website.main.hero.cta_once') }}</a>
      </div>
      <div class="day-fuel rv">
        <div class="top"><span><svg class="i"><use href="#i-bolt"/></svg> {{ __('website.main.hero.fuel_label') }}</span><b id="dayKcal">0</b></div>
        <div class="fuel-bar fuel" data-v="92"><i></i></div>
        <div class="segs"><span>{{ __('website.main.hero.seg_bf') }}</span><span>{{ __('website.main.hero.seg_ln') }}</span><span>{{ __('website.main.hero.seg_sn') }}</span><span>{{ __('website.main.hero.seg_dn') }}</span></div>
      </div>
    </div>
    <div class="hero-visual rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" src="{{ asset('assets/images/p81_1000x1150.jpg') }}" alt="{{ __('website.main.hero.alt') }}" onerror="this.remove()">
      <div class="hv-chip a"><span class="ic"><svg class="i"><use href="#i-protein"/></svg></span><div><b>{{ __('website.main.hero.chip_protein') }}</b><small>{{ __('website.main.hero.chip_protein_sub') }}</small></div></div>
      <div class="hv-chip b"><span class="ic"><svg class="i"><use href="#i-bolt"/></svg></span><div><b>{{ __('website.main.hero.chip_kcal') }}</b><small>{{ __('website.main.hero.chip_kcal_sub') }}</small></div></div>
      <span class="hero-tag">{{ __('website.main.hero.tag') }}</span>
    </div>
  </div>
</header>

<!-- USP -->
@php $usps = __('website.main.usp'); $uspIcons = ['#i-dumbbell','#i-drop','#i-flame','#i-clock']; @endphp
<div class="usp-strip">
  <div class="usp-grid">
    @foreach ($usps as $i => $usp)
    <div class="usp"><span class="ic"><svg class="i"><use href="{{ $uspIcons[$i] }}"/></svg></span><b>{{ $usp['title'] }}</b><small>{{ $usp['sub'] }}</small></div>
    @endforeach
  </div>
</div>

<!-- ABOUT -->
<section class="section" id="about">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.about.kick') }}</span>
    <h2>{!! __('website.main.about.title') !!}</h2>
  </div>
  <div class="about-grid">
    <div class="about-photo rv">
      <div class="ph"><svg><use href="#i-wheat"/></svg></div>
      <img class="aiimg" src="{{ asset('assets/images/p98_1000x850.jpg') }}" alt="{{ __('website.main.about.alt') }}" onerror="this.remove()">
      <span class="about-badge">{!! __('website.main.about.badge') !!}</span>
    </div>
    <div class="about-copy rv">
      <span class="kick">{{ __('website.main.about.story_kick') }}</span>
      <h2>{!! __('website.main.about.story_title') !!}</h2>
      <p>{{ __('website.main.about.story_p') }}</p>
      <ul class="about-list">
        <li><svg class="i"><use href="#i-check"/></svg> {{ __('website.main.about.li1') }}</li>
        <li><svg class="i"><use href="#i-check"/></svg> {{ __('website.main.about.li2') }}</li>
        <li><svg class="i"><use href="#i-check"/></svg> {{ __('website.main.about.li3') }}</li>
      </ul>
      <div class="about-mini">
        <div><b>2024</b><span>{{ __('website.main.about.stat1') }}</span></div>
        <div><b><span class="a">+</span>10,000</b><span>{{ __('website.main.about.stat2') }}</span></div>
        <div><b>6</b><span>{{ __('website.main.about.stat3') }}</span></div>
      </div>
    </div>
  </div>
</section>

<!-- SHOP -->
@php
  $shopProducts = $shopProducts ?? [];
@endphp
<section class="section shop" id="shop">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.shop.kick') }}</span>
    <h2>{!! __('website.main.shop.title') !!}</h2>
    <p>{{ __('website.main.shop.sub') }}</p>
  </div>
  @if (count($shopProducts) > 0)
  <div class="prod-grid">
    @foreach ($shopProducts as $p)
    <article class="prod rv">
      <div class="prod-tile">
        @if (!empty($p['flag']))
        <span class="p-flag">
          @if (!empty($p['flag_icon']))
          <svg class="i" @if($p['flag_style']) style="{{ $p['flag_style'] }}" @endif><use href="{{ $p['flag_icon'] }}"/></svg>
          @endif
          {{ $p['flag'] }}
        </span>
        @endif
        <div class="ph"><svg><use href="#i-bread"/></svg></div>
        @if (!empty($p['image_url']))
        <img class="aiimg" src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}" onerror="this.remove()">
        @endif
      </div>
      <h3>{{ $p['name'] }}</h3>
      @if (!empty($p['sub']))
      <p class="p-sub">{{ $p['sub'] }}</p>
      @endif
      @if (!empty($p['protein']) || !empty($p['kcal']))
      <div class="p-specs">
        @if (!empty($p['protein']))
        <div class="p-spec"><svg class="i"><use href="#i-protein"/></svg> {{ $p['protein'] }}</div>
        @endif
        @if (!empty($p['kcal']))
        <div class="p-spec"><span class="kcal-box">kcal</span> {{ $p['kcal'] }}</div>
        @endif
      </div>
      @endif
      <div class="p-price">{{ $p['price'] }} <x-ui.sar /></div>
      <a href="{{ $p['url'] }}" class="p-view">{{ __('website.main.shop.view') }}</a>
    </article>
    @endforeach
  </div>
  @endif
  <div class="shop-cta"><a href="{{ route('website.store') }}" class="btn navy">{{ __('website.main.shop.all') }}</a></div>
</section>

<!-- DELIVERY APPS -->
@php
  $deliveryApps = [
      [
          'key' => 'jahez',
          'url' => 'https://jahez.go.link/acZgN',
          'color' => '#E31C23',
          'logo' => 'assets/images/apps/jahez.svg',
      ],
      [
          'key' => 'hungerstation',
          'url' => 'https://hungerstation.com/sa-ar/qc/95478/%D9%86%D9%8A%D9%88-%D9%85%D9%8A/branch/%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6~%D8%A7%D9%84%D9%85%D8%B9%D8%B0%D8%B1~169721',
          'color' => '#3D2314',
          'logo' => 'assets/images/apps/hungerstation.png',
      ],
      [
          'key' => 'chefz',
          'url' => 'https://thechefzco.app.link/XMWn5xDtf5b',
          'color' => '#522A48',
          'logo' => 'assets/images/apps/chefz.svg',
      ],
      [
          'key' => 'keeta',
          'url' => 'https://url.mykeeta.com/i80cL48z',
          'color' => '#111111',
          'logo' => 'assets/images/apps/keeta.png',
      ],
      [
          'key' => 'ninja',
          'url' => 'https://ninja.go.link/restaurants?branchId=49004',
          'color' => '#0B0B0B',
          'logo' => 'assets/images/apps/ninja.png',
      ],
  ];
@endphp
<section class="section apps" id="apps">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.apps.kick') }}</span>
    <h2>{!! __('website.main.apps.title') !!}</h2>
    <p>{{ __('website.main.apps.sub') }}</p>
  </div>
  <div class="apps-grid">
    @foreach ($deliveryApps as $app)
      @php $copy = __('website.main.apps.items.'.$app['key']); @endphp
      <a class="app-card rv" href="{{ $app['url'] }}" target="_blank" rel="noopener noreferrer" style="--app: {{ $app['color'] }}">
        <div class="app-card__top">
          <div class="app-card__name">
            <b>{{ $copy['name_ar'] }}</b>
            <span>{{ $copy['name_en'] }}</span>
          </div>
          <span class="app-card__logo">
            <img src="{{ asset($app['logo']) }}" alt="{{ $copy['name_en'] }}" width="44" height="44" loading="lazy">
          </span>
        </div>
        <p class="app-card__desc">{{ $copy['desc'] }}</p>
        <span class="app-card__cta">{{ __('website.main.apps.cta') }}</span>
      </a>
    @endforeach
  </div>
</section>

<!-- NUTRITION SPEC -->
<section class="section" id="nutrition">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.nutrition.kick') }}</span>
    <h2>{!! __('website.main.nutrition.title') !!}</h2>
    <p>{{ __('website.main.nutrition.sub') }}</p>
  </div>
  <div class="spec-grid">
    <div class="spec-photo rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" src="{{ asset('assets/images/p82_1000x850.jpg') }}" alt="{{ __('website.main.nutrition.alt') }}" onerror="this.remove()">
      <span class="cap">{{ __('website.main.nutrition.cap') }}</span>
    </div>
    <div class="spec-card rv">
      <h3>{{ __('website.main.nutrition.card_title') }}</h3>
      <div class="sub">{{ __('website.main.nutrition.card_sub') }}</div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.energy') }}</span><span class="fuel-bar fuel" data-v="46"><i></i></span><span class="v">{!! __('website.main.nutrition.energy_v') !!}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.protein') }}</span><span class="fuel-bar fuel" data-v="95"><i></i></span><span class="v">{!! __('website.main.nutrition.protein_v') !!}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.carbs') }}</span><span class="fuel-bar fuel" data-v="30"><i></i></span><span class="v">{{ __('website.main.nutrition.carbs_v') }}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.fat') }}</span><span class="fuel-bar fuel" data-v="22"><i></i></span><span class="v">{{ __('website.main.nutrition.fat_v') }}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.fiber') }}</span><span class="fuel-bar fuel" data-v="60"><i></i></span><span class="v">{!! __('website.main.nutrition.fiber_v') !!}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.omega') }}</span><span class="fuel-bar fuel" data-v="78"><i></i></span><span class="v">{!! __('website.main.nutrition.omega_v') !!}</span></div>
      <div class="spec-row"><span class="n">{{ __('website.main.nutrition.sugar') }}</span><span class="fuel-bar fuel" data-v="0"><i></i></span><span class="v">{{ __('website.main.nutrition.sugar_v') }}</span></div>
      <div class="spec-note">{{ __('website.main.nutrition.note') }}</div>
    </div>
  </div>
</section>

<!-- JOURNEY -->
<section class="section" id="journey" style="padding-bottom:0;background:#fff;border-top:1px solid var(--gray-2)">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.journey.kick') }}</span>
    <h2>{!! __('website.main.journey.title') !!}</h2>
    <p>{{ __('website.main.journey.sub') }}</p>
  </div>
  <div class="zig">
    <div class="zrow">
      <div class="zmedia rv">
        <div class="ph"><svg><use href="#i-wheat"/></svg></div>
        <img class="aiimg" src="{{ asset('assets/images/p76_1100x900.jpg') }}" alt="" onerror="this.remove()">
        <span class="znum">{{ __('website.main.journey.s1_num') }}</span>
      </div>
      <div class="zcopy">
        <span class="kick">{{ __('website.main.journey.s1_kick') }}</span>
        <h3>{{ __('website.main.journey.s1_title') }}</h3>
        <p>{{ __('website.main.journey.s1_p') }}</p>
        <div class="z-fuel">
          <div class="macro"><small>{{ __('website.main.journey.s1_m1') }}</small><span class="fuel-bar fuel" data-v="90"><i></i></span><b>40%</b></div>
          <div class="macro"><small>{{ __('website.main.journey.s1_m2') }}</small><span class="fuel-bar fuel" data-v="80"><i></i></span><b>{{ __('website.main.journey.s1_high') }}</b></div>
        </div>
        <a class="zlink" href="#nutrition">{{ __('website.main.journey.s1_link') }}</a>
      </div>
    </div>
    <div class="zrow flip">
      <div class="zmedia rv vid" data-video="" role="button" tabindex="0" aria-label="{{ __('website.main.journey.s2_aria') }}">
        <div class="ph"><svg><use href="#i-flame"/></svg></div>
        <img class="aiimg" src="{{ asset('assets/images/p13_1100x900.jpg') }}" alt="" onerror="this.remove()">
        <span class="znum">{{ __('website.main.journey.s2_num') }}</span>
        <span class="vtag">VIDEO</span>
        <span class="play" style="width:60px;height:60px"><svg style="width:24px;height:24px"><use href="#i-play"/></svg></span>
        <span class="dur">0:30</span>
        <span class="vnote">{{ __('website.main.journey.s2_vnote') }}</span>
      </div>
      <div class="zcopy">
        <span class="kick">{{ __('website.main.journey.s2_kick') }}</span>
        <h3>{{ __('website.main.journey.s2_title') }}</h3>
        <p>{{ __('website.main.journey.s2_p') }}</p>
        <div class="z-fuel">
          <div class="macro"><small>{{ __('website.main.journey.s2_m1') }}</small><span class="fuel-bar fuel" data-v="72"><i></i></span><b>180°C</b></div>
          <div class="macro"><small>{{ __('website.main.journey.s2_m2') }}</small><span class="fuel-bar fuel" data-v="40"><i></i></span><b>≤48{{ __('website.main.values.stat3_unit') }}</b></div>
        </div>
        <a class="zlink" href="#shop">{{ __('website.main.journey.s2_link') }}</a>
      </div>
    </div>
    <div class="zrow">
      <div class="zmedia rv">
        <div class="ph"><svg><use href="#i-clipboard"/></svg></div>
        <img class="aiimg" src="{{ asset('assets/images/p41_1100x900.jpg') }}" alt="" onerror="this.remove()">
        <span class="znum">{{ __('website.main.journey.s3_num') }}</span>
      </div>
      <div class="zcopy">
        <span class="kick">{{ __('website.main.journey.s3_kick') }}</span>
        <h3>{{ __('website.main.journey.s3_title') }}</h3>
        <p>{{ __('website.main.journey.s3_p') }}</p>
        <div class="z-fuel">
          <div class="macro"><small>{{ __('website.main.journey.s3_m1') }}</small><span class="fuel-bar fuel" data-v="100"><i></i></span><b>100%</b></div>
        </div>
        <a class="zlink" href="/subscribe">{{ __('website.main.journey.s3_link') }}</a>
      </div>
    </div>
  </div>
</section>

<!-- BRAND FILM -->
<section class="section" id="film" style="padding-bottom:56px">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.film.kick') }}</span>
    <h2>{!! __('website.main.film.title') !!}</h2>
    <p>{{ __('website.main.film.sub') }}</p>
  </div>
  <div class="film-wrap">
    <div class="vid film rv" data-video="" role="button" tabindex="0" aria-label="{{ __('website.main.film.aria') }}">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" src="{{ asset('assets/images/p91_1600x900.jpg') }}" alt="{{ __('website.main.film.alt') }}" onerror="this.remove()">
      <span class="vtag">VIDEO</span>
      <span class="play"><svg><use href="#i-play"/></svg></span>
      <span class="dur">0:60</span>
      <span class="vnote">{{ __('website.main.film.vnote') }}</span>
    </div>
    <div class="film-cap"><span>{!! __('website.main.film.cap_l') !!}</span><span>{{ __('website.main.film.cap_r') }}</span></div>
  </div>
</section>

<!-- VALUES -->
<section class="section" id="values" style="padding-bottom:0;background:#EFEBE3">
  <div class="sec-head" style="padding-top:0">
    <span class="kick">{{ __('website.main.values.kick') }}</span>
    <h2>{!! __('website.main.values.title') !!}</h2>
  </div>
  <div class="val-grid">
    <div class="val rv">
      <span class="ic"><svg class="i"><use href="#i-clock"/></svg></span>
      <h3>{{ __('website.main.values.v1_t') }}</h3>
      <p>{{ __('website.main.values.v1_p') }}</p>
    </div>
    <div class="val rv">
      <span class="ic"><svg class="i"><use href="#i-flame"/></svg></span>
      <h3>{{ __('website.main.values.v2_t') }}</h3>
      <p>{{ __('website.main.values.v2_p') }}</p>
    </div>
    <div class="val rv">
      <span class="ic"><svg class="i"><use href="#i-leaf"/></svg></span>
      <h3>{{ __('website.main.values.v3_t') }}</h3>
      <p>{{ __('website.main.values.v3_p') }}</p>
    </div>
    <div class="val rv">
      <span class="ic"><svg class="i"><use href="#i-clipboard"/></svg></span>
      <h3>{{ __('website.main.values.v4_t') }}</h3>
      <p>{{ __('website.main.values.v4_p') }}</p>
    </div>
  </div>
  <div class="band">
    <div style="text-align:center"><span class="kick">{{ __('website.main.values.band_kick') }}</span></div>
    <h2>{!! __('website.main.values.band_title') !!}</h2>
    <div class="band-grid">
      <div class="bstat rv"><b><span data-count="10000">0</span><span class="a">+</span></b><span>{{ __('website.main.values.stat1') }}</span></div>
      <div class="bstat rv"><b><span data-count="40">0</span><span class="a">%</span></b><span>{{ __('website.main.values.stat2') }}</span></div>
      <div class="bstat rv"><b><span data-count="48">0</span><span class="a">{{ __('website.main.values.stat3_unit') }}</span></b><span>{{ __('website.main.values.stat3') }}</span></div>
      <div class="bstat rv"><b><span data-count="97">0</span><span class="a">%</span></b><span>{{ __('website.main.values.stat4') }}</span></div>
    </div>
  </div>
</section>

<!-- REVIEWS -->
@php $reviews = __('website.main.reviews.items'); $revImgs = ['p31_200x200.jpg','p32_200x200.jpg','p33_200x200.jpg']; $revBg = ['#FFE1C4','#DCEFD2','#D8E8F8']; @endphp
<section class="section" id="reviews">
  <div class="rev-head">
    <span class="kick">{{ __('website.main.reviews.kick') }}</span>
    <span class="stars">★★★★★</span>
    <b>{{ __('website.main.reviews.summary') }}</b>
  </div>
  <div class="rev-grid">
    @foreach ($reviews as $i => $rev)
    <div class="rev rv">
      <div class="stars">★★★★★</div>
      <h4>{{ $rev['title'] }}</h4>
      <p>{{ $rev['body'] }}</p>
      <div class="who"><span class="av"><span class="ph" style="background:{{ $revBg[$i] }}"><svg><use href="#i-user"/></svg></span><img class="aiimg" src="{{ asset('assets/images/'.$revImgs[$i]) }}" alt="" onerror="this.remove()"></span><span><b>{{ $rev['name'] }}</b>{{ $rev['loc'] }} · <i>{{ __('website.main.reviews.verified') }}</i></span></div>
    </div>
    @endforeach
  </div>
</section>

<!-- SUBSCRIPTIONS -->
@php $plans = __('website.main.subs.plans'); @endphp
<section class="subs" id="subs">
  <div class="inner">
    <div class="sec-head">
      <span class="kick" style="color:var(--orange-hi)">{{ __('website.main.subs.kick') }}</span>
      <h2>{!! __('website.main.subs.title') !!}</h2>
      <p>{{ __('website.main.subs.sub') }}</p>
    </div>

    <div class="toggle-wrap rv">
      <div class="toggle" id="billToggle">
        <span class="pill" id="togglePill"></span>
        <button class="on" data-bill="m">{{ __('website.main.subs.bill_m') }}</button>
        <button data-bill="q">{{ __('website.main.subs.bill_q') }} <span class="save">{{ __('website.main.subs.save') }}</span></button>
      </div>
    </div>

    <div class="sub-grid">
      <div class="splan rv">
        <span class="code">NM-01 · BASIC</span>
        <h3>{{ $plans[0]['name'] }}</h3>
        <div class="goal"><svg class="i"><use href="#i-target"/></svg> {{ $plans[0]['goal'] }}</div>
        <div class="was">{{ __('website.main.subs.was') }} <s data-was-m="332" data-was-q="299">332{{ __('website.main.js.sar') }}</s></div>
        <div class="pline"><b data-m="299" data-q="239">299</b><small>{!! __('website.main.subs.per_month') !!}</small></div>
        <span class="per">≈ <span data-pm-m="10" data-pm-q="8">10</span> {{ __('website.main.subs.per_meal') }}</span>
        <div class="plan-fuel">
          <div class="hd"><span><svg class="i"><use href="#i-bolt"/></svg> {{ __('website.main.subs.day_energy') }}</span><b>630 KCAL</b></div>
          <div class="fuel-bar fuel" data-v="34"><i></i></div>
          <div class="meals"><span class="on">{{ __('website.main.subs.meal_bf') }}</span><span>{{ __('website.main.subs.meal_ln') }}</span><span>{{ __('website.main.subs.meal_sn') }}</span><span>{{ __('website.main.subs.meal_dn') }}</span></div>
        </div>
        <ul>
          <li>{{ $plans[0]['features'][0] }}</li>
          <li>{{ $plans[0]['features'][1] }}</li>
          <li>{{ $plans[0]['features'][2] }}</li>
          <li class="no">{{ $plans[0]['features'][3] }}</li>
          <li class="no">{{ $plans[0]['features'][4] }}</li>
        </ul>
        <a href="/subscribe#plan=loss" class="btn navy" style="border-color:rgba(255,255,255,.3)">{{ $plans[0]['cta'] }}</a>
      </div>

      <div class="splan pop rv">
        <span class="tag">{{ $plans[1]['tag'] }}</span>
        <span class="code">NM-02 · BALANCED</span>
        <h3>{{ $plans[1]['name'] }}</h3>
        <div class="goal"><svg class="i"><use href="#i-target"/></svg> {{ $plans[1]['goal'] }}</div>
        <div class="was">{{ __('website.main.subs.was') }} <s data-was-m="610" data-was-q="549">610{{ __('website.main.js.sar') }}</s></div>
        <div class="pline"><b data-m="549" data-q="439">549</b><small>{!! __('website.main.subs.per_month') !!}</small></div>
        <span class="per">≈ <span data-pm-m="9" data-pm-q="7">9</span> {{ __('website.main.subs.per_meal') }}</span>
        <div class="plan-fuel">
          <div class="hd"><span><svg class="i"><use href="#i-bolt"/></svg> {{ __('website.main.subs.day_energy') }}</span><b>1,150 KCAL</b></div>
          <div class="fuel-bar fuel" data-v="62"><i></i></div>
          <div class="meals"><span class="on">{{ __('website.main.subs.meal_bf') }}</span><span class="on">{{ __('website.main.subs.meal_ln') }}</span><span class="on">{{ __('website.main.subs.meal_sn') }}</span><span>{{ __('website.main.subs.meal_dn') }}</span></div>
        </div>
        <ul>
          @foreach ($plans[1]['features'] as $f)<li>{{ $f }}</li>@endforeach
        </ul>
        <a href="/subscribe#plan=balance" class="btn">{{ $plans[1]['cta'] }}</a>
      </div>

      <div class="splan rv">
        <span class="code">NM-03 · PRO</span>
        <h3>{{ $plans[2]['name'] }}</h3>
        <div class="goal"><svg class="i"><use href="#i-target"/></svg> {{ $plans[2]['goal'] }}</div>
        <div class="was">{{ __('website.main.subs.was') }} <s data-was-m="832" data-was-q="749">832{{ __('website.main.js.sar') }}</s></div>
        <div class="pline"><b data-m="749" data-q="599">749</b><small>{!! __('website.main.subs.per_month') !!}</small></div>
        <span class="per">≈ <span data-pm-m="8" data-pm-q="6.5">8</span> {{ __('website.main.subs.per_meal') }}</span>
        <div class="plan-fuel">
          <div class="hd"><span><svg class="i"><use href="#i-bolt"/></svg> {{ __('website.main.subs.day_energy') }}</span><b>1,850 KCAL</b></div>
          <div class="fuel-bar fuel" data-v="100"><i></i></div>
          <div class="meals"><span class="on">{{ __('website.main.subs.meal_bf') }}</span><span class="on">{{ __('website.main.subs.meal_ln') }}</span><span class="on">{{ __('website.main.subs.meal_sn') }}</span><span class="on">{{ __('website.main.subs.meal_dn') }}</span></div>
        </div>
        <ul>
          @foreach ($plans[2]['features'] as $f)<li>{{ $f }}</li>@endforeach
        </ul>
        <a href="/subscribe#plan=muscle" class="btn navy" style="border-color:rgba(255,255,255,.3)">{{ $plans[2]['cta'] }}</a>
      </div>
    </div>

    <div class="sub-guarantee"><svg class="i"><use href="#i-shield"/></svg> {{ __('website.main.subs.guarantee') }}</div>
    <div class="sub-trust">
      <span><b>✓</b> {{ __('website.main.subs.trust1') }}</span>
      <span><b>✓</b> {{ __('website.main.subs.trust2') }}</span>
      <span><b>✓</b> {{ __('website.main.subs.trust3') }}</span>
    </div>
  </div>
</section>

<!-- HEALTH ARTICLES -->
@php $articles = __('website.main.articles.items'); $artImgs = ['p92_900x560.jpg','p93_900x560.jpg','p94_900x560.jpg']; $artIcons = ['#i-wheat','#i-dumbbell','#i-drop']; @endphp
<section class="section" id="articles">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.articles.kick') }}</span>
    <h2>{!! __('website.main.articles.title') !!}</h2>
    <p>{{ __('website.main.articles.sub') }}</p>
  </div>
  <div class="card-grid">
    @foreach ($articles as $i => $a)
    <article class="acard rv">
      <div class="media">
        <span class="cat">{{ $a['cat'] }}</span>
        <div class="ph"><svg><use href="{{ $artIcons[$i] }}"/></svg></div>
        <img class="aiimg" src="{{ asset('assets/images/'.$artImgs[$i]) }}" alt="" onerror="this.remove()">
      </div>
      <div class="body">
        <div class="meta"><span><svg class="i"><use href="#i-clock"/></svg> {{ $a['time'] }}</span><span><svg class="i"><use href="#i-clipboard"/></svg> {{ $a['author'] }}</span></div>
        <h3>{{ $a['title'] }}</h3>
        <p class="ex">{{ $a['ex'] }}</p>
        <a href="/blog#a{{ $i+1 }}" class="go">{{ __('website.main.articles.read') }}</a>
      </div>
    </article>
    @endforeach
  </div>
  <div class="center-cta"><a href="/blog#articles" class="btn inv">{{ __('website.main.articles.all') }}</a></div>
</section>

<!-- RECIPES -->
@php $recipes = __('website.main.recipes.items'); $recImgs = ['p95_900x560.jpg','p96_900x560.jpg','p97_900x560.jpg']; $recIcons = ['#i-bread','#i-bowl','#i-bowl']; @endphp
<section class="section" id="recipes" style="background:#EFEBE3">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.recipes.kick') }}</span>
    <h2>{!! __('website.main.recipes.title') !!}</h2>
    <p>{{ __('website.main.recipes.sub') }}</p>
  </div>
  <div class="card-grid">
    @foreach ($recipes as $i => $r)
    <article class="acard rv">
      <div class="media">
        <span class="cat">{{ $r['cat'] }}</span>
        <div class="ph"><svg><use href="{{ $recIcons[$i] }}"/></svg></div>
        <img class="aiimg" src="{{ asset('assets/images/'.$recImgs[$i]) }}" alt="" onerror="this.remove()">
      </div>
      <div class="body">
        <div class="meta"><span><svg class="i"><use href="#i-clock"/></svg> {{ $r['time'] }}</span><span><span class="kcal-box">kcal</span> {{ $r['kcal'] }}</span><span><svg class="i"><use href="#i-protein"/></svg> {{ $r['protein'] }}</span></div>
        <h3>{{ $r['title'] }}</h3>
        <p class="ex">{{ $r['ex'] }}</p>
        <a href="/blog#r{{ $i+1 }}" class="go">{{ __('website.main.recipes.view') }}</a>
      </div>
    </article>
    @endforeach
  </div>
  <div class="center-cta"><a href="/blog#recipes" class="btn inv">{{ __('website.main.recipes.all') }}</a></div>
</section>

<!-- FAQ -->
@php $faqs = __('website.main.faq.items'); @endphp
<section class="section" id="faq">
  <div class="sec-head">
    <span class="kick">{{ __('website.main.faq.kick') }}</span>
    <h2>{{ __('website.main.faq.title') }}</h2>
  </div>
  <div class="faq">
    @foreach ($faqs as $faq)
    <div class="fitem">
      <button class="fq">{{ $faq['q'] }}<span class="x">+</span></button>
      <div class="fa"><p>{{ $faq['a'] }}</p></div>
    </div>
    @endforeach
  </div>
</section>

<!-- PHOTO CTA -->
<section class="photo-cta">
  <div class="ph"><svg><use href="#i-bread"/></svg></div>
  <img class="aiimg" src="{{ asset('assets/images/p77_1600x800.jpg') }}" alt="" onerror="this.remove()">
  <div class="inner">
    <h2>{!! __('website.main.photo_cta.title') !!}</h2>
    <p>{{ __('website.main.photo_cta.sub') }}</p>
    <a href="/subscribe" class="btn">{{ __('website.main.photo_cta.btn') }}</a>
    <small>{{ __('website.main.photo_cta.note') }}</small>
  </div>
</section>

<!-- FOOTER -->

<!-- consultation + terms strip -->
<section class="consult-strip" style="background:var(--navy,#122B4A);padding:44px 20px;position:relative;overflow:hidden">
  <div style="position:absolute;top:-120px;inset-inline-start:-80px;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.25),transparent 65%);pointer-events:none"></div>
  <div style="max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:22px;flex-wrap:wrap;position:relative;z-index:2">
    <div>
      <div style="font-family:var(--mono,monospace);font-size:10px;letter-spacing:.28em;color:#FFA05C;font-weight:800;text-transform:uppercase">FREE CONSULTATION</div>
      <h2 style="color:#fff;font-size:clamp(22px,4.5vw,32px);font-weight:900;margin:6px 0 4px;letter-spacing:-.015em">{{ __('website.main.consult.title') }}</h2>
      <p style="color:#B9C9E2;font-size:13.5px;font-weight:600;margin:0">{{ __('website.main.consult.text') }}</p>
    </div>
    <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
      <a href="/consult" style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:14.5px;border-radius:999px;padding:15px 32px;text-decoration:none;box-shadow:0 14px 34px rgba(240,127,45,.4)">{{ __('website.main.consult.cta') }}</a>
      <a href="/terms" style="color:#C7D6EC;font-weight:800;font-size:12.5px;text-decoration:none;border-bottom:1.5px solid rgba(255,255,255,.35);padding-bottom:2px">{{ __('website.main.consult.terms') }}</a>
    </div>
  </div>
</section>
@include('website.partials.footer', ['variant' => 'full'])
</main>

<!-- STICKY MOBILE CTA -->
<div class="sticky-cta" id="stickyCta">
  <div class="info"><b>{!! __('website.main.sticky.plan') !!}</b><small>{{ __('website.main.sticky.meta') }}</small></div>
  <a href="/subscribe" class="btn">{{ __('website.main.sticky.cta') }}</a>
</div>




@include('website.partials.mobile-menu')

@endsection

@push('scripts')
<script>window.NM_I18N = @json(__('website.main.js'));</script>
<script>
@verbatim

function failOpen(){
  try{
    document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});
    document.querySelectorAll('.rv').forEach(function(r){r.classList.add('in');});
    document.querySelectorAll('.fuel').forEach(function(f){f.style.setProperty('--v',(f.getAttribute('data-v')||0)+'%');});
  }catch(_){}
}
window.addEventListener('error',failOpen);
try{
'use strict';
var I18N=window.NM_I18N||{};

/* announcement rotation */
var msgs=Array.prototype.slice.call(document.querySelectorAll('#announce span')),ai=0;
setInterval(function(){
  msgs[ai].classList.remove('on'); ai=(ai+1)%msgs.length; msgs[ai].classList.add('on');
},3500);

/* AI images */
document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy'; img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});

/* counters */
function countEl(el){
  var target=+el.getAttribute('data-count'),start=null,dur=1300;
  function step(ts){
    if(!start)start=ts;
    var p=Math.min(1,(ts-start)/dur); p=1-Math.pow(1-p,3);
    var v=Math.round(target*p);
    el.textContent=v>=1000?v.toLocaleString('en-US'):v;
    if(p<1)requestAnimationFrame(step);
  }
  requestAnimationFrame(step);
}
function heroKcal(){
  var el=document.getElementById('dayKcal'); if(!el)return;
  var t=1150,s=null;
  function st(ts){if(!s)s=ts;var p=Math.min(1,(ts-s)/1400);p=1-Math.pow(1-p,3);
    el.textContent=Math.round(t*p).toLocaleString('en-US')+' KCAL';
    if(p<1)requestAnimationFrame(st);}
  requestAnimationFrame(st);
}

/* reveals: fire fuel bars + counters on view */
function fireFuel(scope){
  var list=[];
  if(scope.matches&&scope.matches('.fuel'))list.push(scope);
  if(scope.querySelectorAll)list=list.concat(Array.prototype.slice.call(scope.querySelectorAll('.fuel')));
  list.forEach(function(f){f.style.setProperty('--v',(f.getAttribute('data-v')||0)+'%');});
}
if('IntersectionObserver' in window){
  var done={};
  var rio=new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(!e.isIntersecting)return;
      e.target.classList.add('in');
      fireFuel(e.target);
      e.target.querySelectorAll('[data-count]').forEach(function(c){
        var k=c.getAttribute('data-count');
        if(!done[k]){countEl(c);done[k]=1;}
      });
      if(e.target.querySelector&&e.target.querySelector('#dayKcal')&&!done.hero){heroKcal();done.hero=1;}
      rio.unobserve(e.target);
    });
  },{threshold:.18});
  document.querySelectorAll('.rv,.bstat,.spec-row,.z-fuel,.plan-fuel,.day-fuel,.val').forEach(function(el){rio.observe(el);});
}else{ failOpen(); document.querySelectorAll('[data-count]').forEach(countEl); heroKcal(); }

/* billing toggle */
var toggle=document.getElementById('billToggle'),pill=document.getElementById('togglePill');
var tbtns=Array.prototype.slice.call(toggle.querySelectorAll('button'));
function placePill(btn){
  if(!btn)return;
  pill.style.width=btn.offsetWidth+'px';
  pill.style.left=btn.offsetLeft+'px';
}
function activeBtn(){
  for(var i=0;i<tbtns.length;i++)if(tbtns[i].classList.contains('on'))return tbtns[i];
  return tbtns[0];
}
function setBill(mode){
  tbtns.forEach(function(b){b.classList.toggle('on',b.getAttribute('data-bill')===mode);});
  placePill(activeBtn());
  document.querySelectorAll('[data-m]').forEach(function(el){
    el.textContent=el.getAttribute(mode==='m'?'data-m':'data-q');
  });
  document.querySelectorAll('[data-pm-m]').forEach(function(el){
    el.textContent=el.getAttribute(mode==='m'?'data-pm-m':'data-pm-q');
  });
  document.querySelectorAll('s[data-was-m]').forEach(function(el){
    el.innerHTML=el.getAttribute(mode==='m'?'data-was-m':'data-was-q')+(I18N.sar||'');
  });
  var sp=document.getElementById('stickyPrice');
  if(sp)sp.textContent=mode==='m'?'549':'439';
}
tbtns.forEach(function(b){b.addEventListener('click',function(){setBill(b.getAttribute('data-bill'));});});
setTimeout(function(){placePill(activeBtn());},60);
window.addEventListener('resize',function(){placePill(activeBtn());});

/* video placeholders */
document.querySelectorAll('.vid').forEach(function(v){
  v.addEventListener('click',function(){
    var src=(v.getAttribute('data-video')||'').trim();
    if(!src){
      v.classList.add('nudge');
      clearTimeout(v._t); v._t=setTimeout(function(){v.classList.remove('nudge');},2600);
      return;
    }
    if(v.classList.contains('playing'))return;
    v.classList.add('playing');
    var el;
    if(/youtube\.com|youtu\.be|vimeo\.com/.test(src)){
      el=document.createElement('iframe');
      el.src=src+(src.indexOf('?')>-1?'&':'?')+'autoplay=1';
      el.setAttribute('allow','autoplay; fullscreen');
      el.setAttribute('allowfullscreen','');
    }else{
      el=document.createElement('video');
      el.src=src; el.controls=true; el.autoplay=true; el.setAttribute('playsinline','');
    }
    v.appendChild(el);
  });
});

/* sticky mobile CTA */
var sticky=document.getElementById('stickyCta'),heroEl=document.querySelector('.hero');
if('IntersectionObserver' in window){
  new IntersectionObserver(function(es){
    es.forEach(function(e){sticky.classList.toggle('show',!e.isIntersecting&&e.boundingClientRect.top<0);});
  },{threshold:0}).observe(heroEl);
}else{
  window.addEventListener('scroll',function(){sticky.classList.toggle('show',window.scrollY>600);},{passive:true});
}

/* FAQ */
document.querySelectorAll('.fitem').forEach(function(item){
  var q=item.querySelector('.fq'),a=item.querySelector('.fa');
  q.addEventListener('click',function(){
    var open=item.classList.contains('open');
    document.querySelectorAll('.fitem.open').forEach(function(o){
      o.classList.remove('open');o.querySelector('.fa').style.maxHeight='0px';
    });
    if(!open){item.classList.add('open');a.style.maxHeight=a.scrollHeight+'px';}
  });
});

/* newsletter demo */
var nb=document.getElementById('newsBtn');
if(nb)nb.addEventListener('click',function(){
  nb.textContent=I18N.newsletter_done||'✓';
  setTimeout(function(){nb.textContent=I18N.newsletter_btn||'';},2500);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/locomotive-scroll/4.1.4/locomotive-scroll.min.js"></script>
<script>
@verbatim

/* GSAP enhancement layer — page works fully without it */
try{
if(window.gsap){
  document.documentElement.classList.add('gs');
  if(window.ScrollTrigger)gsap.registerPlugin(ScrollTrigger);
  var reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;
  if(!reduce){

  /* ===== Locomotive Scroll — premium smooth scrolling (desktop) ===== */
  var loco=null;
  try{
    if(window.LocomotiveScroll&&window.ScrollTrigger&&matchMedia('(min-width:1024px)').matches){
      document.documentElement.classList.add('loco');
      loco=new LocomotiveScroll({
        el:document.querySelector('#locoScroll'),
        smooth:true,lerp:.085,multiplier:1,
        smartphone:{smooth:false},tablet:{smooth:false},
        reloadOnContextChange:true
      });
      loco.on('scroll',ScrollTrigger.update);
      ScrollTrigger.scrollerProxy('#locoScroll',{
        scrollTop:function(value){
          return arguments.length?loco.scrollTo(value,{duration:0,disableLerp:true}):loco.scroll.instance.scroll.y;
        },
        getBoundingClientRect:function(){return{top:0,left:0,width:window.innerWidth,height:window.innerHeight};},
        pinType:document.querySelector('#locoScroll').style.transform?'transform':'fixed'
      });
      ScrollTrigger.addEventListener('refresh',function(){loco.update();});
      ScrollTrigger.defaults({scroller:'#locoScroll'});
      /* in-page anchors ride the smooth scroller */
      document.querySelectorAll('a[href^="#"]').forEach(function(a){
        a.addEventListener('click',function(e){
          var id=a.getAttribute('href');
          if(id&&id.length>1){var t=document.querySelector(id);if(t){e.preventDefault();loco.scrollTo(t,{offset:-76});}}
        });
      });
      /* keep measurements honest as AI images stream in */
      document.addEventListener('load',function(e){
        if(e.target&&e.target.tagName==='IMG'){clearTimeout(window.__locoU);window.__locoU=setTimeout(function(){loco.update();ScrollTrigger.refresh();},250);}
      },true);
      window.addEventListener('load',function(){ScrollTrigger.refresh();});
      setTimeout(function(){ScrollTrigger.refresh();},700);
    }
  }catch(_){}


  /* hand elements over to GSAP (disable CSS reveal for them) */
  function tk(sel){
    var els=gsap.utils.toArray(sel);
    els.forEach(function(e){e.classList.add('in');e.style.transition='none';});
    return els;
  }

  /* ===== hero intro timeline ===== */
  tk('.hero-rating,.hero h1,.hero .lead,.hero-ctas .btn,.day-fuel,.hero-visual,.hv-chip,.hero-tag');
  var chips=gsap.utils.toArray('.hv-chip');
  chips.forEach(function(c){c.style.animation='none';});
  var tl=gsap.timeline({defaults:{ease:'power3.out'},onComplete:function(){
    chips.forEach(function(c){c.style.animation='';c.style.transform='';});
  }});
  tl.from('.hero-rating',{y:24,opacity:0,duration:.55,clearProps:'all'})
    .from('.hero h1',{y:44,opacity:0,duration:.8,clearProps:'all'},'-=.3')
    .from('.hero .lead',{y:28,opacity:0,duration:.6,clearProps:'all'},'-=.55')
    .from('.hero-ctas .btn',{y:22,opacity:0,duration:.5,stagger:.1,clearProps:'all'},'-=.4')
    .from('.day-fuel',{y:26,opacity:0,duration:.6,clearProps:'all'},'-=.3')
    .from('.hero-visual',{opacity:0,scale:1.05,duration:1,clearProps:'all'},'-=.85')
    .from('.hv-chip',{scale:.4,opacity:0,duration:.7,ease:'back.out(2.2)',stagger:.16},'-=.55')
    .from('.hero-tag',{y:16,opacity:0,duration:.4,clearProps:'all'},'-=.45');

  if(window.ScrollTrigger){
    /* ===== scroll-in staggers ===== */
    [['.usp',.06],['.prod',.09],['.val',.08],['.rev',.09],['.splan',.12],['.acard',.09],['.bstat',.08]].forEach(function(cfg){
      tk(cfg[0]);
      ScrollTrigger.batch(cfg[0],{start:'top 88%',once:true,onEnter:function(els){
        gsap.from(els,{y:36,opacity:0,duration:.7,stagger:cfg[1],ease:'power3.out',clearProps:'all'});
      }});
    });
    [['.about-photo','.about-copy'],['.spec-photo','.spec-card']].forEach(function(pair){
      tk(pair[0]+','+pair[1]);
      ScrollTrigger.create({trigger:pair[0],start:'top 85%',once:true,onEnter:function(){
        gsap.from(pair[0],{x:40,opacity:0,duration:.8,ease:'power3.out',clearProps:'all'});
        gsap.from(pair[1],{x:-40,opacity:0,duration:.8,delay:.12,ease:'power3.out',clearProps:'all'});
      }});
    });

    /* ===== fuel bars ===== */
    ScrollTrigger.batch('.fuel',{start:'top 90%',once:true,onEnter:function(els){
      els.forEach(function(f){
        var v=+f.getAttribute('data-v')||0, bar=f.querySelector('i');
        if(bar)gsap.fromTo(bar,{width:'0%'},{width:v+'%',duration:1.5,ease:'power4.out'});
      });
    }});

    /* ===== parallax on photography ===== */
    gsap.utils.toArray('.zmedia img,.photo-cta img,.film img').forEach(function(img){
      gsap.fromTo(img,{yPercent:-7},{yPercent:7,ease:'none',
        scrollTrigger:{trigger:img.parentNode,scrub:.6,start:'top bottom',end:'bottom top'}});
    });

    /* ===== subscription section glow entrance ===== */
    tk('.toggle-wrap');
    ScrollTrigger.create({trigger:'.subs',start:'top 75%',once:true,onEnter:function(){
      gsap.from('.toggle-wrap',{scale:.85,opacity:0,duration:.6,ease:'back.out(1.8)',clearProps:'all'});
    }});
  }
  }
}
}catch(_){}

@endverbatim
</script>
@endpush
