@extends('website.layouts.app')

@section('title', __('website.subscribe.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-2:#1B3A61; --navy-3:#24487A;
  --white:#fff; --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478; --green-soft:#E9F7F0;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{min-height:100%;-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{min-height:100vh;min-height:100dvh;display:flex;flex-direction:column;font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden;padding-bottom:calc(96px + var(--sab))}
.announce,nav.main,.phead,.stepper{width:100%;flex-shrink:0}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}
.aiimg{transition:opacity .9s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.i{width:1.05em;height:1.05em;fill:currentColor;vertical-align:-0.14em;display:inline-block}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:15px;border-radius:999px;padding:15px 30px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.35)}
.btn:hover{filter:brightness(1.06)}
.btn:active{transform:scale(.97)}
.btn.navy{background:var(--navy);border-color:var(--navy);box-shadow:0 12px 28px rgba(18,43,74,.3)}
.btn.ghost{background:#fff;border-color:var(--gray-3);color:var(--navy);box-shadow:none}
.btn.sm{padding:11px 20px;min-height:44px;font-size:13.5px}
.btn[disabled]{opacity:.4;pointer-events:none}

/* announcement + nav */
.announce{background:var(--navy);color:#fff;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2)}
nav.main .bar{max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}
.logo .mark{width:34px;height:34px;border-radius:50%;background:conic-gradient(from 210deg,var(--navy-3),var(--navy) 140deg,var(--orange) 270deg,var(--orange-hi));position:relative;flex-shrink:0}
.logo .mark::after{content:"";position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle at 32% 28%, rgba(255,255,255,.9), rgba(255,255,255,.2) 36%, transparent 60%)}
.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}

/* page head (compact) */
.phead{padding:30px 20px 8px;text-align:center}
.off-pill{display:inline-flex;background:var(--green);color:#fff;font-size:12px;font-weight:900;border-radius:999px;padding:6px 16px;margin-bottom:12px}
.phead h1{font-size:clamp(26px,6vw,42px);margin-bottom:6px}
.phead h1 em{font-style:normal;color:var(--orange-deep)}
.phead p{font-size:14px;font-weight:600;max-width:520px;margin:0 auto}

/* ===== stepper ===== */
.stepper{max-width:640px;margin:22px auto 6px;padding:0 20px;display:flex;align-items:center}
.snode{display:flex;flex-direction:column;align-items:center;gap:5px;position:relative;z-index:2;background:var(--bg);padding:0 6px;cursor:pointer}
.snode .c{width:34px;height:34px;border-radius:50%;border:2.5px solid var(--gray-3);background:#fff;display:grid;place-items:center;font-family:var(--mono);font-size:13px;font-weight:700;color:var(--muted);transition:.25s}
.snode span{font-size:10.5px;font-weight:900;color:var(--muted);white-space:nowrap}
.snode.cur .c{border-color:var(--orange);background:var(--orange-soft);color:var(--orange-deep);box-shadow:0 0 0 4px rgba(240,127,45,.14)}
.snode.cur span{color:var(--navy)}
.snode.ok .c{border-color:var(--green);background:var(--green);color:#fff}
.snode.ok .c::before{content:"✓"}
.snode.ok .c b{display:none}
.sline{flex:1;height:2.5px;background:var(--gray-3);margin-top:-18px;min-width:14px}
.sline.ok{background:var(--green)}
.snode.lock{pointer-events:none}
/* Seven nodes do not fit next to their labels on a phone; the step title carries the name there. */
@media(max-width:600px){.stepper{padding:0 12px}.snode{padding:0 3px}.snode span:not(.c){display:none}}

/* ===== wizard steps ===== */
.wwrap{max-width:900px;width:100%;margin:0 auto;padding:18px 20px 10px;position:relative;flex:1 0 auto}
.wstep{display:block}
.js .wstep{display:none}
.js .wstep.active{display:block;animation:stepIn .4s cubic-bezier(.2,.7,.2,1)}
@keyframes stepIn{from{opacity:0;transform:translateX(-26px)}to{opacity:1;transform:none}}
.wstep .step-h{text-align:center;margin-bottom:20px}
.wstep .step-h h2{font-size:clamp(21px,5vw,30px);margin-bottom:4px}
.wstep .step-h small{display:block;font-size:13px;color:var(--muted);font-weight:700}
.hint{text-align:center;font-size:11.5px;font-weight:800;color:var(--muted);margin-top:16px}
.hint b{color:var(--orange-deep)}

/* 9 plans grid — photo cards */
.plans9{display:grid;gap:12px;grid-template-columns:repeat(2,1fr)}
@media(min-width:700px){.plans9{grid-template-columns:repeat(3,1fr)}}
.p9{background:#fff;border:2px solid var(--gray-2);border-radius:18px;padding:0;text-align:start;transition:.2s;position:relative;cursor:pointer;overflow:hidden}
.p9:hover{border-color:var(--gray-3);transform:translateY(-2px)}
.p9.on{border-color:var(--orange);box-shadow:0 0 0 4px rgba(240,127,45,.12),0 16px 36px rgba(18,43,74,.1)}
.p9 .img{aspect-ratio:16/9;position:relative;overflow:hidden;background:var(--tile);display:block}
@supports not (aspect-ratio:1){.p9 .img{height:0;padding-bottom:56%}}
.p9 .img img{transition:transform .45s ease}
.p9:hover .img img{transform:scale(1.06)}
.p9 .tick{position:absolute;top:10px;inset-inline-end:10px;width:24px;height:24px;border-radius:50%;background:#fff;border:2px solid var(--gray-3);display:grid;place-items:center;color:#fff;transition:.2s;z-index:2;box-shadow:0 4px 12px rgba(18,43,74,.15)}
.p9.on .tick{background:var(--orange);border-color:var(--orange)}
.p9.on .tick::after{content:"✓";font-size:12px;font-weight:900}
.p9 .body{display:block;padding:12px 15px 15px;position:relative}
.p9 .ic{position:absolute;top:-19px;inset-inline-start:13px;width:38px;height:38px;border-radius:11px;background:var(--orange-soft);border:2px solid #fff;color:var(--orange-deep);display:grid;place-items:center;box-shadow:0 8px 18px rgba(18,43,74,.12)}
.p9 .ic .i{width:18px;height:18px}
.p9 h3{font-size:15px;margin:14px 0 2px}
.p9 p{font-size:11px;font-weight:600;color:var(--muted);line-height:1.6}
.p9 .pop{position:absolute;top:10px;inset-inline-start:10px;background:var(--grad);color:#fff;font-size:9.5px;font-weight:900;border-radius:999px;padding:3px 11px;box-shadow:0 6px 14px rgba(240,127,45,.4);z-index:2}
.macros3{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:14px;max-width:520px;margin-inline:auto}
.m3{background:#fff;border:1.5px solid var(--gray-2);border-radius:14px;padding:11px;text-align:center}
.m3 b{display:block;font-family:var(--mono);font-size:14px;color:var(--navy)}
.m3 span{font-size:10px;color:var(--muted);font-weight:800}

/* segments */
.mealgrid{display:grid;gap:10px;grid-template-columns:repeat(2,1fr);max-width:560px;margin:0 auto}
@media(min-width:640px){.mealgrid{grid-template-columns:repeat(4,1fr)}}
.mt{background:#fff;border:2px solid var(--gray-2);border-radius:16px;padding:16px 10px;text-align:center;transition:.2s;position:relative;cursor:pointer}
.mt .ic{width:40px;height:40px;border-radius:12px;background:var(--orange-soft);color:var(--orange-deep);display:grid;place-items:center;margin:0 auto 8px}
.mt .ic .i{width:19px;height:19px}
.mt b{display:block;font-size:13.5px;color:var(--navy);font-weight:900}
.mt small{font-size:10px;color:var(--muted);font-weight:800}
.mt .tk{position:absolute;top:8px;inset-inline-end:8px;width:20px;height:20px;border-radius:50%;border:2px solid var(--gray-3);background:#fff;display:grid;place-items:center;color:#fff;font-size:10px;font-weight:900;transition:.2s}
.mt.on{border-color:var(--orange);background:var(--orange-soft)}
.mt.on .tk{background:var(--orange);border-color:var(--orange)}
.mt.on .tk::after{content:"✓"}
.mt .req{position:absolute;top:-8px;inset-inline-start:10px;background:var(--navy);color:#fff;font-size:8.5px;font-weight:900;border-radius:999px;padding:2px 8px}
/* rollover menu preview on plan cards */
/* menu modal */
.menu-bd{position:fixed;inset:0;z-index:230;background:rgba(10,20,35,.45);opacity:0;pointer-events:none;transition:opacity .3s}
.menu-bd.show{opacity:1;pointer-events:auto}
.menu-md{position:fixed;inset-inline:0;bottom:0;z-index:240;max-width:640px;margin:0 auto;background:var(--bg);border-radius:26px 26px 0 0;transform:translateY(105%);transition:transform .4s cubic-bezier(.32,.72,.28,1);max-height:86vh;max-height:86svh;overflow-y:auto;-webkit-overflow-scrolling:touch;padding:10px 20px calc(24px + var(--sab));box-shadow:0 -20px 60px rgba(10,20,35,.25)}
@media(min-width:700px){.menu-md{bottom:auto;top:50%;inset-inline:0;border-radius:26px;transform:translate(0,-45%) scale(.95);opacity:0;max-height:82vh}
.menu-md.show{transform:translate(0,-50%) scale(1);opacity:1}}
.menu-md.show{transform:translateY(0)}
.menu-md .grab{width:40px;height:5px;border-radius:99px;background:var(--gray-3);margin:4px auto 14px}
.menu-md .mm-top{display:flex;justify-content:space-between;align-items:flex-start;gap:10px;margin-bottom:6px}
.menu-md h3{font-size:21px}
.menu-md h3 em{font-style:normal;color:var(--orange-deep)}
.menu-md .mm-x{width:38px;height:38px;border-radius:50%;border:1.5px solid var(--gray-2);background:#fff;color:var(--navy);font-size:16px;font-weight:900;display:grid;place-items:center;flex-shrink:0}
.menu-md .mm-target{display:inline-flex;background:var(--navy);color:#fff;border-radius:999px;padding:6px 16px;font-size:11px;font-weight:800;margin-bottom:14px}
.menu-md .mm-target b{font-family:var(--mono);color:var(--orange-hi);font-weight:700;margin-inline-start:5px}
/* dish-pick link under each meal type */
.mt .mtp{display:none;margin-top:10px;align-items:center;justify-content:center;gap:5px;font-size:10px;font-weight:900;color:var(--orange-deep);border-top:1px dashed var(--gray-3);padding-top:9px;width:100%;cursor:pointer}
.mt.on .mtp{display:flex}
.mt .mtp .pc{background:var(--navy);color:#fff;border-radius:999px;padding:2px 9px;font-size:8.5px;font-weight:900}
.mt .mtp .pc.has{background:var(--green)}
/* dish picker rows (inside modal) */
.seg{display:grid;gap:12px;grid-template-columns:repeat(3,1fr);max-width:560px;margin:0 auto}
.seg button{background:#fff;border:2px solid var(--gray-2);border-radius:18px;padding:22px 10px;font-weight:800;color:var(--ink);transition:.2s;text-align:center;position:relative}
.seg button:hover{border-color:var(--gray-3)}
.seg button b{display:block;font-size:30px;font-family:var(--mono);color:var(--navy);line-height:1.2}
.seg button small{font-size:11.5px;color:var(--muted);font-weight:700}
.seg button.on{border-color:var(--orange);background:var(--orange-soft);box-shadow:0 0 0 4px rgba(240,127,45,.12)}
.seg button .d{display:inline-block;background:var(--green);color:#fff;font-size:9.5px;font-weight:900;border-radius:999px;padding:2px 9px;margin-top:6px}

/* days */
.days{display:flex;gap:9px;flex-wrap:wrap;justify-content:center;max-width:600px;margin:0 auto}
.day{width:72px;background:#fff;border:2px solid var(--gray-2);border-radius:14px;padding:12px 4px;text-align:center;font-weight:800;transition:.2s}
.day b{display:block;font-size:13px;color:var(--navy)}
.day small{font-size:9.5px;color:var(--muted);font-weight:800;font-family:var(--mono)}
.day.on{border-color:var(--orange);background:var(--orange-soft)}
.days-note{margin-top:14px;font-size:12.5px;font-weight:800;color:var(--muted);text-align:center}
.days-note.err{color:#C33}
.days-note b{color:var(--navy)}

/* ===== review step ===== */
.review{max-width:560px;margin:0 auto}
.sel-chips{display:grid;gap:8px;margin-bottom:16px}
.sel-chip{background:#fff;border:1.5px solid var(--gray-2);border-radius:14px;padding:11px 14px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:800;color:var(--ink)}
.sel-chip .i{width:17px;height:17px;color:var(--orange-deep);flex-shrink:0}
.sel-chip b{color:var(--navy)}
.sel-chip .edit{margin-inline-start:auto;font-size:11.5px;font-weight:900;color:var(--orange-deep);border-bottom:1.5px solid var(--orange);cursor:pointer;white-space:nowrap}
.buy-card{background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;overflow:hidden;box-shadow:0 20px 50px rgba(18,43,74,.1)}
.buy-body{padding:18px}
.cycle{border:2px solid var(--navy);border-radius:16px;padding:14px;margin-bottom:12px;box-shadow:0 0 0 3px rgba(18,43,74,.08)}
.cycle .top{display:flex;align-items:flex-start;gap:10px}
.cycle h3{font-size:16.5px}
.cycle .meals-n{margin-inline-start:auto;font-size:12px;color:var(--muted);font-weight:800;white-space:nowrap}
.cycle .priceline{margin:6px 0 2px}
.cycle .now{display:inline-block;background:var(--green-soft);color:#1F7A4D;font-weight:900;font-size:15px;border-radius:8px;padding:3px 10px}
.cpn{margin:12px 0 2px}
.cpn-form{display:flex;gap:7px;align-items:stretch}
.cpn-form input{flex:1;min-width:0;font-family:var(--mono);font-size:12.5px;font-weight:700;color:var(--navy);background:var(--tile);border:1.5px solid var(--gray-2);border-radius:10px;padding:9px 12px;letter-spacing:.06em;text-transform:uppercase}
.cpn-form input:focus{outline:none;border-color:var(--orange);background:#fff}
.cpn-form input::placeholder{color:var(--muted);font-weight:700;letter-spacing:0;text-transform:none;font-family:var(--font)}
.cpn-form button{flex-shrink:0;border:1.5px solid var(--gray-3);background:#fff;color:var(--navy);font-weight:800;font-size:12.5px;border-radius:10px;padding:9px 15px}
.cpn-form button:hover{border-color:var(--navy)}
.cpn-on{display:flex;align-items:center;justify-content:space-between;gap:8px;background:var(--green-soft);border:1.5px solid rgba(57,180,120,.35);border-radius:10px;padding:8px 12px}
.cpn-tag b{font-family:var(--mono);letter-spacing:.06em;color:var(--green-ink);font-size:12.5px}
.cpn-on button{border:none;background:none;color:var(--muted);font-size:11.5px;font-weight:800;padding:2px}
.cpn-on button:hover{color:#C0392B}
.cpn-err{margin-top:7px;color:#C0392B;font-size:12px;font-weight:700}
.cpn-form[hidden],.cpn-on[hidden],.cpn-err[hidden],.sumrows .r[hidden]{display:none}

.sumrows{border-top:1.5px solid var(--gray-2);padding-top:12px;display:grid;gap:7px;font-size:13px;font-weight:700;color:var(--ink)}
.sumrows .r{display:flex;justify-content:space-between;gap:10px}
.sumrows .r span:last-child{font-family:var(--mono);font-weight:600}
.sumrows .r.save span{color:var(--green);font-weight:900}
.sumrows .r.total{border-top:1.5px solid var(--gray-2);margin-top:5px;padding-top:11px;font-size:16px;font-weight:900}
.sumrows .r.total span:last-child{font-family:var(--mono);color:var(--navy);font-weight:900;font-size:18px}
.perday{text-align:center;font-size:11.5px;font-weight:800;color:var(--muted);margin-top:6px}
.perday b{color:var(--orange-deep)}
.paybadges{display:flex;justify-content:center;gap:7px;flex-wrap:wrap;margin-top:13px}
.pb{height:32px;min-width:52px;padding:0 10px;border:1.5px solid var(--gray-2);border-radius:8px;background:#fff;display:grid;place-items:center;font-weight:900;font-size:11px;color:var(--navy);font-family:var(--font)}
.pb.visa{color:#1A1F71;font-style:italic;letter-spacing:.02em;font-size:12.5px}
.pb.mc span{display:flex}
.pb.mc i{width:15px;height:15px;border-radius:50%;display:block}
.pb.mc i:first-child{background:#EB001B}
.pb.mc i:last-child{background:#F79E1B;margin-inline-start:-6px;mix-blend-mode:multiply}
.pb.apay{font-size:12.5px}.pb.apay b{font-weight:900}
.pb.mada{color:#259BD6;font-size:12.5px}
.pb.stc{color:#4F008C}
.pb.tabby{color:#22C69B}
.buy-trust{display:grid;gap:6px;margin-top:14px;font-size:11.5px;font-weight:800;color:var(--muted)}
.buy-trust span{display:flex;align-items:center;gap:7px}
.buy-trust .i{width:15px;height:15px;color:var(--green)}
.helpline{text-align:center;margin-top:16px;font-size:12.5px;font-weight:800;color:var(--muted)}
.helpline a{color:var(--orange-deep);border-bottom:1.5px solid var(--orange)}

/* ===== wizard bottom bar ===== */
.wbar{position:fixed;bottom:0;inset-inline:0;z-index:95;background:rgba(247,245,241,.97);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-top:1px solid var(--gray-2);padding:11px 16px calc(11px + var(--sab))}
.wbar .inner{max-width:900px;margin:0 auto;display:flex;align-items:center;gap:12px}
.wbar .back{width:48px;height:48px;border-radius:50%;border:1.5px solid var(--gray-3);background:#fff;display:grid;place-items:center;font-size:18px;color:var(--navy);flex-shrink:0;transition:.2s}
.wbar .back[disabled]{opacity:.3;pointer-events:none}
.wbar .tot{flex:1;min-width:0}
.wbar .tot .wbar-amount{display:flex;align-items:baseline;gap:8px}
.wbar .tot .wbar-label{font-size:12px;font-weight:800;color:var(--muted);font-family:var(--font);flex-shrink:0}
.wbar .tot b{display:block;font-size:16px;color:var(--navy);font-weight:900;font-family:var(--mono);line-height:1.3}
.wbar .btn{min-width:150px;min-height:48px;padding:12px 22px;font-size:14px}
@media(min-width:700px){.wbar .btn{min-width:220px}}

/* footer */
footer.w-foot-full{width:100%;margin-top:auto}
footer{background:#0C1F38;color:#9FB4D2;padding:36px 20px 40px;text-align:center;margin-top:auto}
footer .flinks{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;font-size:13px;font-weight:800;color:#9FB4D2;margin-bottom:12px}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:11px;font-weight:600;color:#6E84A5;line-height:2}

@media (prefers-reduced-motion: reduce){
  .js .wstep.active{animation:none}
}

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

/* ===== duration options (DB-driven) ===== */
.dur-opts{display:grid;gap:10px;max-width:520px;margin:0 auto}
.dur-opt{background:#fff;border:2px solid var(--gray-2);border-radius:16px;padding:15px 16px;display:flex;align-items:center;justify-content:space-between;gap:12px;cursor:pointer;transition:.2s;width:100%;text-align:start}
.dur-opt:hover{border-color:var(--gray-3)}
.dur-opt.on{border-color:var(--orange);background:var(--orange-soft);box-shadow:0 0 0 4px rgba(240,127,45,.12)}
.dur-opt .dl{font-size:16px;font-weight:900;color:var(--navy)}
.dur-opt .dl .dd{display:inline-block;background:var(--green);color:#fff;font-size:9.5px;font-weight:900;border-radius:999px;padding:2px 8px;margin-inline-start:8px;vertical-align:middle}
.dur-opt .dp{font-family:var(--mono);font-weight:700;color:var(--orange-deep);font-size:15px;white-space:nowrap}
.dur-empty{text-align:center;color:var(--muted);font-weight:800;font-size:13px;padding:20px 0}

/* ===== per-day dishes ===== */
.ddays{display:grid;gap:12px;max-width:640px;margin:0 auto}
.dday{background:#fff;border:1.5px solid var(--gray-2);border-radius:16px;padding:14px 16px}
.dday .dh{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:11px;font-weight:900;color:var(--navy);font-size:14px}
.dday .dh small{color:var(--muted);font-family:var(--mono);font-weight:700;font-size:11px}
.dpick{display:grid;gap:9px}
.dpick .prow{display:flex;align-items:center;gap:10px}
.dpick .prow .lbl{font-size:12px;font-weight:900;color:var(--orange-deep);min-width:54px}
.dpick select{flex:1;font-family:var(--font);font-weight:800;font-size:13px;color:var(--ink);padding:10px 12px;border:2px solid var(--gray-2);border-radius:12px;background:#fff;appearance:none;-webkit-appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2312233B' stroke-width='2' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:left 12px center}
.ddays-note{text-align:center;font-size:12px;font-weight:800;color:var(--muted);margin-top:6px}

/* ===== start date ===== */
.startdate{max-width:340px;margin:0 auto 18px;text-align:center}
.startdate label{display:block;font-size:13px;font-weight:900;color:var(--navy);margin-bottom:7px}
.startdate input{width:100%;font-family:var(--font);font-weight:800;font-size:14px;color:var(--ink);padding:13px 14px;border:2px solid var(--gray-2);border-radius:14px;background:#fff;text-align:center}
.startdate input:focus{outline:none;border-color:var(--orange)}
.startdate small{display:block;margin-top:8px;font-size:11.5px;font-weight:800;color:var(--muted)}
.startdate small b{color:var(--orange-deep)}

/* ===== health step ===== */
.health{display:grid;gap:15px;max-width:520px;margin:0 auto}
.hfield label{display:block;font-size:13px;font-weight:900;color:var(--navy);margin-bottom:7px}
.hfield label i{font-style:normal;font-weight:800;color:var(--muted)}
.hfield input,.hfield textarea{width:100%;font-family:var(--font);font-weight:800;font-size:14px;color:var(--ink);padding:13px 14px;border:2px solid var(--gray-2);border-radius:14px;background:#fff}
.hfield textarea{resize:vertical;min-height:82px;line-height:1.7}
.hfield input:focus,.hfield textarea:focus{outline:none;border-color:var(--orange)}
.hfield input::placeholder,.hfield textarea::placeholder{color:var(--muted);font-weight:700}
.hfield .hnote{display:block;margin-top:7px;font-size:11.5px;font-weight:800;color:var(--muted)}
.hfield .hnote.err{color:#C33}
.hfield .hnote b{color:var(--orange-deep)}
.hprivacy{display:flex;gap:9px;align-items:flex-start;background:var(--tile);border-radius:14px;padding:12px 14px;font-size:12px;font-weight:700;color:var(--ink)}
.hprivacy .i{width:17px;height:17px;color:var(--green);flex-shrink:0;margin-top:2px}
@endverbatim
</style>
@endpush

@section('content')
@php
  $meals = [
    ['key' => 'breakfast', 'icon' => 'i-bowl', 'on' => false, 'req' => false],
    ['key' => 'lunch', 'icon' => 'i-flame', 'on' => true, 'req' => true],
    ['key' => 'dinner', 'icon' => 'i-target', 'on' => true, 'req' => true],
    ['key' => 'snack', 'icon' => 'i-leaf', 'on' => false, 'req' => false],
  ];
  $dayCodes = ['SUN','MON','TUE','WED','THU','FRI','SAT'];
@endphp
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-bolt" viewBox="0 0 24 24"><path d="M13 2 4.5 13.5H10L9 22l8.5-11.5H12L13 2z"/></symbol>
<symbol id="i-dumbbell" viewBox="0 0 24 24"><path d="M2 10h2v4H2v-4zm18 0h2v4h-2v-4zM5 7.5h3v9H5v-9zm11 0h3v9h-3v-9zM8 11h8v2H8v-2z"/></symbol>
<symbol id="i-drop" viewBox="0 0 24 24"><path d="M12 2.5c3.8 5.4 6 8.6 6 11.5a6 6 0 0 1-12 0c0-2.9 2.2-6.1 6-11.5z"/></symbol>
<symbol id="i-flame" viewBox="0 0 24 24"><path d="M12 2c.8 3.8 5 6.2 5 11a5 5 0 0 1-10 0c0-1.8.8-3.1 1.8-4.6.2 1.6.9 2.6 2 3.1-.9-3.2-.2-6.6 1.2-9.5z"/></symbol>
<symbol id="i-wheat" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 22V6"/><path d="M12 9C9.5 9 8 7.5 8 5c2.5 0 4 1.5 4 4zM12 9c2.5 0 4-1.5 4-4-2.5 0-4 1.5-4 4zM12 14c-2.5 0-4-1.5-4-4 2.5 0 4 1.5 4 4zM12 14c2.5 0 4-1.5 4-4-2.5 0-4 1.5-4 4z"/></symbol>
<symbol id="i-bowl" viewBox="0 0 24 24"><path d="M3 11h18c0 4.4-3.2 8-9 8s-9-3.6-9-8zm5 9.5h8v1.5H8v-1.5z"/></symbol>
<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2l8 3v6.2c0 4.8-3.3 8.3-8 10.8-4.7-2.5-8-6-8-10.8V5l8-3zm-1.2 13.4 5.4-5.4-1.4-1.4-4 4-1.8-1.8-1.4 1.4 3.2 3.2z"/></symbol>
<symbol id="i-target" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1.2" fill="currentColor" stroke="none"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><path d="M9.5 16.2 5.3 12l-1.4 1.4 5.6 5.6 12-12L20.1 5.6z"/></symbol>
<symbol id="i-leaf" viewBox="0 0 24 24"><path d="M20 4c.5 8-2.5 15-10 15-3 0-5-1.5-6-3.5C8 16 10 15 12 13c-2 .5-4 .5-6 2 .5-6 5-11 14-11z"/></symbol>
<symbol id="i-heart" viewBox="0 0 24 24"><path d="M12 21c-5.5-3.6-9-6.9-9-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 4.1-3.5 7.4-9 11z"/></symbol>
<symbol id="i-lock" viewBox="0 0 24 24"><path d="M7 10V8a5 5 0 0 1 10 0v2h1a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h1zm2 0h6V8a3 3 0 0 0-6 0v2z"/></symbol>
<symbol id="i-cal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M8 3v4M16 3v4M3.5 10h17" stroke-linecap="round"/></symbol>
</defs></svg>

<!-- ANNOUNCEMENT -->
<div class="announce">{!! __('website.subscribe.announce') !!}</div>

<!-- NAV -->
@include('website.partials.nav', ['active' => 'subscribe', 'showCart' => false])

<!-- PAGE HEAD -->
<header class="phead">
  <span class="off-pill">{{ __('website.subscribe.off_pill') }}</span>
  <h1>{!! __('website.subscribe.heading') !!}</h1>
  <p>{{ __('website.subscribe.lead') }}</p>
</header>

<!-- STEPPER -->
<div class="stepper" id="stepper">
  <div class="snode cur" data-go="1"><span class="c"><b>1</b></span><span>{{ __('website.subscribe.steps.1') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="2"><span class="c"><b>2</b></span><span>{{ __('website.subscribe.steps.2') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="3"><span class="c"><b>3</b></span><span>{{ __('website.subscribe.steps.3') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="4"><span class="c"><b>4</b></span><span>{{ __('website.subscribe.steps.4') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="5"><span class="c"><b>5</b></span><span>{{ __('website.subscribe.steps.5') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="6"><span class="c"><b>6</b></span><span>{{ __('website.subscribe.steps.6') }}</span></div>
  <div class="sline"></div>
  <div class="snode lock" data-go="7"><span class="c"><b>7</b></span><span>{{ __('website.subscribe.steps.7') }}</span></div>
</div>

<div class="wwrap" id="wwrap">

  <!-- STEP 1 -->
  <section class="wstep active" data-step="1">
    <div class="step-h"><h2>{{ __('website.subscribe.step1.title') }}</h2><small>{{ trans_choice('website.subscribe.step1.sub', count($plans)) }}</small></div>
    <div class="plans9" id="plans9">
      @foreach ($plans as $plan)
        <button class="p9" data-plan="{{ $plan['key'] }}" data-f="{{ $plan['f'] }}">
          <span class="img">
            @if($plan['image_url'])
              <img class="aiimg" src="{{ $plan['image_url'] }}" alt="" onerror="this.remove()">
            @endif
            @if($plan['pop'])
              <span class="pop">{{ __('website.subscribe.most_chosen') }}</span>
            @endif
            <span class="tick"></span>
          </span>
          <span class="body"><span class="ic"><svg class="i"><use href="#{{ $plan['icon'] }}"/></svg></span><h3>{{ $plan['name'] }}</h3><p>{{ $plan['desc'] }}</p></span>
        </button>
      @endforeach
    </div>
    <div class="macros3">
      <div class="m3"><b>20–35%</b><span>{{ __('website.subscribe.macros.protein') }}</span></div>
      <div class="m3"><b>40–55%</b><span>{{ __('website.subscribe.macros.carbs') }}</span></div>
      <div class="m3"><b>20–30%</b><span>{{ __('website.subscribe.macros.fat') }}</span></div>
    </div>
  </section>

  <!-- STEP 2 -->
  <section class="wstep" data-step="2">
    <div class="step-h"><h2>{{ __('website.subscribe.step2.title') }}</h2><small>{{ __('website.subscribe.step2.sub') }}</small></div>
    <div class="mealgrid" id="mealGrid">
      @foreach ($meals as $meal)
        <button class="mt{{ $meal['on'] ? ' on' : '' }}" data-meal="{{ $meal['key'] }}">@if($meal['req'])<span class="req">{{ __('website.subscribe.meal_req') }}</span>@endif<span class="tk"></span><span class="ic"><svg class="i"><use href="#{{ $meal['icon'] }}"/></svg></span><b>{{ __('website.subscribe.meals.'.$meal['key'].'.name') }}</b><small>{{ __('website.subscribe.meals.'.$meal['key'].'.sub') }}</small></button>
      @endforeach
    </div>
    <div class="days-note" id="mealNote">{!! __('website.subscribe.js.meal_note_ok_dual', ['n' => 2]) !!}</div>
    
  </section>

  <!-- STEP 4: DELIVERY DAYS -->
  <section class="wstep" data-step="4">
    <div class="step-h"><h2>{{ __('website.subscribe.step3.title') }}</h2><small>{{ __('website.subscribe.step3.sub') }}</small></div>
    <div class="startdate">
      <label for="startDate">{{ __('website.subscribe.start_date') }}</label>
      <input type="date" id="startDate">
      <small id="startEnd"></small>
    </div>
    <div class="days" id="daysWrap">
      @foreach ($dayCodes as $i => $code)
        <button class="day{{ $i < 5 ? ' on' : '' }}" data-day="{{ $i }}"><small>{{ $code }}</small><b>{{ __('website.subscribe.days.'.$i) }}</b></button>
      @endforeach
    </div>
    <div class="days-note" id="daysNote">{!! __('website.subscribe.js.days_note', ['n' => 5]) !!}</div>
  </section>

  <!-- STEP 3: DURATION (from the plan's pricing for the chosen meal types) -->
  <section class="wstep" data-step="3">
    <div class="step-h"><h2>{{ __('website.subscribe.step4.title') }}</h2><small>{{ __('website.subscribe.step4.sub') }}</small></div>
    <div class="dur-opts" id="durOpts"></div>
    <div class="hint">{{ __('website.subscribe.step4.hint') }}</div>
  </section>

  <!-- STEP 5: HEALTH PROFILE -->
  <section class="wstep" data-step="5">
    <div class="step-h"><h2>{{ __('website.subscribe.step_health.title') }}</h2><small>{{ __('website.subscribe.step_health.sub') }}</small></div>
    <div class="health">
      <div class="hfield">
        <label for="hBirth">{{ __('website.subscribe.step_health.birth_date') }}</label>
        <input type="date" id="hBirth" min="{{ $birthDateRange['min'] }}" max="{{ $birthDateRange['max'] }}">
        <small class="hnote" id="hBirthNote">{{ __('website.subscribe.js.birth_note', $ageLimits) }}</small>
      </div>
      <div class="hfield">
        <label for="hAllergies">{{ __('website.subscribe.step_health.allergies') }} <i>{{ __('website.subscribe.step_health.optional') }}</i></label>
        <textarea id="hAllergies" rows="3" maxlength="500" placeholder="{{ __('website.subscribe.step_health.allergies_placeholder') }}"></textarea>
      </div>
      <div class="hfield">
        <label for="hMeds">{{ __('website.subscribe.step_health.medications') }} <i>{{ __('website.subscribe.step_health.optional') }}</i></label>
        <textarea id="hMeds" rows="3" maxlength="500" placeholder="{{ __('website.subscribe.step_health.medications_placeholder') }}"></textarea>
      </div>
      <p class="hprivacy"><svg class="i"><use href="#i-lock"/></svg> {{ __('website.subscribe.step_health.privacy') }}</p>
    </div>
  </section>

  <!-- STEP 6: DISHES PER DELIVERY DAY -->
  <section class="wstep" data-step="6">
    <div class="step-h"><h2>{{ __('website.subscribe.step_dishes.title') }}</h2><small>{{ __('website.subscribe.step_dishes.sub') }}</small></div>
    <div class="ddays" id="dayDishes"></div>
  </section>

  <!-- STEP 7: REVIEW -->
  <section class="wstep" data-step="7">
    <div class="step-h"><h2>{{ __('website.subscribe.step5.title') }}</h2><small>{{ __('website.subscribe.step5.sub') }}</small></div>
    <div class="review">
      <div class="sel-chips">
        <div class="sel-chip"><svg class="i"><use href="#i-target"/></svg> {{ __('website.subscribe.chip_program') }} <b id="chipPlan">{{ $defaultPlan['name'] ?? '' }}</b><span class="edit" data-go="1">{{ __('website.subscribe.edit') }}</span></div>
        <div class="sel-chip"><svg class="i"><use href="#i-bowl"/></svg> <b id="chipDishes">—</b><span class="edit" data-go="2">{{ __('website.subscribe.edit') }}</span></div>
        <div class="sel-chip"><svg class="i"><use href="#i-bolt"/></svg> {{ __('website.subscribe.chip_duration') }} <b id="chipWeeks">—</b><span class="edit" data-go="3">{{ __('website.subscribe.edit') }}</span></div>
        <div class="sel-chip"><svg class="i"><use href="#i-cal"/></svg> <b id="chipDays">{{ __('website.subscribe.js.chip_days', ['n' => 5]) }}</b><span class="edit" data-go="4">{{ __('website.subscribe.edit') }}</span></div>
        <div class="sel-chip"><svg class="i"><use href="#i-heart"/></svg> <b id="chipHealth">—</b><span class="edit" data-go="5">{{ __('website.subscribe.edit') }}</span></div>
      </div>

      <div class="buy-card">
        <div class="buy-body">
          <div class="cycle">
            <div class="top">
              <div style="flex:1">
                <h3>{{ __('website.subscribe.cycle_title') }}</h3>
                <div class="priceline"><span class="now" id="cyclePrice">—</span></div>
              </div>
              <span class="meals-n" id="mealsN">—</span>
            </div>
          </div>
          <div class="cpn" id="couponBox">
            <div class="cpn-form" id="couponForm">
              <input type="text" id="couponInput" dir="ltr" autocomplete="off"
                     placeholder="{{ __('website.subscribe.coupon_placeholder') }}"
                     aria-label="{{ __('website.subscribe.coupon_label') }}">
              <button type="button" id="couponApply">{{ __('website.subscribe.coupon_apply') }}</button>
            </div>
            <div class="cpn-on" id="couponOn" hidden>
              <span class="cpn-tag"><b id="couponCode"></b></span>
              <button type="button" id="couponClear">{{ __('website.subscribe.coupon_remove') }}</button>
            </div>
            <p class="cpn-err" id="couponError" hidden></p>
          </div>
          <div class="sumrows">
            <div class="r"><span>{{ __('website.subscribe.sum_meals') }}</span><span id="sumMeals">—</span></div>
            <div class="r"><span>{{ __('website.subscribe.sum_base') }}</span><span id="sumGross">—</span></div>
            <div class="r save"><span>{{ __('website.subscribe.sum_duration') }}</span><span id="sumDur">—</span></div>
            <div class="r save" id="rowCoupon" hidden><span>{{ __('website.subscribe.sum_coupon') }}</span><span id="sumCoupon">—</span></div>
            <div class="r save"><span>{{ __('website.subscribe.sum_save') }}</span><span id="sumSave">—</span></div>
            <div class="r"><span>{{ __('website.subscribe.sum_tax') }}</span><span id="sumTax">—</span></div>
            <div class="r total"><span>{{ __('website.subscribe.sum_total') }}</span><span id="sumTotal">—</span></div>
          </div>
          <div class="perday">{!! __('website.subscribe.per_day') !!}</div>
          <div class="paybadges" aria-label="{{ __('website.subscribe.pay_aria') }}">
            <span class="pb mada">{{ __('website.subscribe.mada') }}</span>
            <span class="pb visa">VISA</span>
            <span class="pb mc"><span><i></i><i></i></span></span>
            <span class="pb apay"> <b>Pay</b></span>
            <span class="pb stc">stc pay</span>
            <span class="pb tabby">{{ __('website.subscribe.tabby') }}</span>
          </div>
          <div class="buy-trust">
            <span><svg class="i"><use href="#i-lock"/></svg> {{ __('website.subscribe.trust_secure') }}</span>
            <span><svg class="i"><use href="#i-shield"/></svg> {{ __('website.subscribe.trust_refund') }}</span>
            <span><svg class="i"><use href="#i-check"/></svg> {{ __('website.subscribe.trust_cancel') }}</span>
          </div>
        </div>
      </div>
      <div class="helpline">{!! __('website.subscribe.helpline') !!}</div>
    </div>
  </section>
</div>

<!-- WIZARD BOTTOM BAR -->
<div class="wbar">
  <div class="inner">
    <button class="back" id="wBack" disabled aria-label="{{ __('website.subscribe.back_aria') }}">→</button>
    <div class="tot">
      <div class="wbar-amount">
        <span class="wbar-label">{{ __('website.subscribe.sum_total') }}</span>
        <b id="wTotal">—</b>
      </div>
    </div>
    <button class="btn" id="wNext">{{ __('website.subscribe.next') }}</button>
  </div>
</div>

<!-- FOOTER -->
@include('website.partials.footer', ['variant' => 'full'])




@include('website.partials.mobile-menu')

@endsection

@push('scripts')
<script>
window.NM_I18N = @json(__('website.subscribe.js'));
window.NM_I18N.plans = @json($planNames);
window.NM_PLAN_SLUGS = @json($planSlugs);
window.NM_DEFAULT_PLAN = @json($defaultPlan['key'] ?? 'balance');
window.NM_PLANS = @json($plansData);
window.NM_FINANCE = @json($finance);
window.NM_OPS = @json($operations);
window.NM_DAY_NAMES = @json(array_values(__('website.subscribe.days')));
window.NM_CHECKOUT_MEAL_DAYS = {{ \App\Modules\Subscriptions\Support\MealSchedule::CHECKOUT_PICK_DAYS }};
window.NM_PLAN_IDS = @json($planIds);
window.NM_BIRTH_RANGE = @json($birthDateRange);
window.NM_AGE_LIMITS = @json($ageLimits);
window.NM_HEALTH = @json($healthProfile);
window.NM_CHECKOUT_URL = @json(route('website.checkout.subscription'));
window.NM_QUOTE_URL = @json(url('api/v1/plans/__PLAN__/quote'));
window.NM_CSRF = @json(csrf_token());
</script>
<script>
@verbatim

function failOpen(){
  try{
    document.querySelectorAll('.wstep').forEach(function(s){s.classList.add('active');});
    document.querySelectorAll('img.aiimg').forEach(function(i){i.classList.add('loaded');});
  }catch(_){}
}
window.addEventListener('error',failOpen);
try{
'use strict';

var I18N=window.NM_I18N||{};
var PLANS=window.NM_PLANS||{};
var FIN=window.NM_FINANCE||{tax_rate:0,include_tax:false,currency:''};
var PLAN_SLUGS=window.NM_PLAN_SLUGS||[];
var DAY_NAMES=window.NM_DAY_NAMES||[];
var DEFAULT_PLAN=window.NM_DEFAULT_PLAN||PLAN_SLUGS[0]||'balance';
var MT_ORDER=['breakfast','lunch','dinner','snack'];

function t(key, vars){
  var s=I18N[key];
  if(s==null)return key;
  if(vars){Object.keys(vars).forEach(function(k){s=String(s).split(':'+k).join(String(vars[k]));});}
  return s;
}
function planName(k){return (I18N.plans&&I18N.plans[k])||(PLANS[k]&&PLANS[k].name)||k;}

var MEAL_LABELS={};
document.querySelectorAll('#mealGrid .mt').forEach(function(b){
  var k=b.getAttribute('data-meal'),lab=b.querySelector('b');
  if(k&&lab)MEAL_LABELS[k]=lab.textContent.trim();
});
function mealName(k){return MEAL_LABELS[k]||k;}

/* Health details already on the account, so a returning customer only confirms them. */
function healthSeed(){
  var saved=window.NM_HEALTH||{},seed={};
  ['birth_date','allergies','medications'].forEach(function(k){if(saved[k])seed[k]=String(saved[k]);});
  return seed;
}

var state={
  plan:DEFAULT_PLAN,
  mtypes:['lunch','dinner'],
  durIndex:null,
  days:[0,1,2,3,4],
  startDate:null,
  dishSel:{},
  health:Object.assign({birth_date:'',allergies:'',medications:''},healthSeed()),
  // Coupon rules live on the server; we only cache the amount it quoted back.
  coupon:null,
  couponDiscount:0
};
var cur=1, maxVisited=1, TOTAL=7;
var BIRTH=window.NM_BIRTH_RANGE||{};
var AGE_LIMITS=window.NM_AGE_LIMITS||{min:10,max:100};

function planData(){return PLANS[state.plan]||{};}
function minDays(){var m=planData().min_days;return (m&&m>0)?m:1;}
function mealsKey(){
  return state.mtypes.slice().sort(function(a,b){return MT_ORDER.indexOf(a)-MT_ORDER.indexOf(b);}).join(',');
}
function durOptions(){var p=planData();return (p.pricing&&p.pricing[mealsKey()])||[];}
function selectedRule(){var o=durOptions();return (state.durIndex!=null&&o[state.durIndex])?o[state.durIndex]:null;}
function mealsOk(){return state.mtypes.length>=1&&durOptions().length>0;}
function durOk(){return selectedRule()!=null;}
function daysOk(){return state.days.length>=minDays();}
function birthDate(){return (state.health.birth_date||'').slice(0,10);}
/* ISO dates compare correctly as plain strings, so the accepted window is a range check. */
function ageOk(){
  var d=birthDate();
  return d.length===10&&(!BIRTH.min||d>=BIRTH.min)&&(!BIRTH.max||d<=BIRTH.max);
}
function age(){
  var p=birthDate().split('-');
  if(p.length!==3)return null;
  var now=new Date(),years=now.getFullYear()-(+p[0]);
  var beforeBirthday=(now.getMonth()+1)<(+p[1])||((now.getMonth()+1)===(+p[1])&&now.getDate()<(+p[2]));
  return beforeBirthday?years-1:years;
}

function fmt(n){return Math.round(n).toLocaleString('en-US');}
function fmt1(n){return (Math.round(n*10)/10).toLocaleString('en-US');}
var SAR=' <span class="icon-saudi-riyal" aria-hidden="true"></span>';
function money(n){return fmt(n)+SAR;}
function pad(n){return (n<10?'0':'')+n;}
function escHtml(s){return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
function escAttr(s){return escHtml(s).replace(/"/g,'&quot;');}
function setTxt(id,v){var e=document.getElementById(id);if(e)e.textContent=v;}
function setHtml(id,v){var e=document.getElementById(id);if(e)e.innerHTML=v;}

function earliestStart(){
  // Server-computed floor from operations.subscription_min_start_days.
  var iso=(window.NM_OPS&&window.NM_OPS.min_start_date)||'';
  if(iso){
    var p=iso.split('-');
    var fromOps=new Date(+p[0],+p[1]-1,+p[2]);
    fromOps.setHours(0,0,0,0);
    return fromOps;
  }
  var d=new Date();d.setHours(0,0,0,0);d.setDate(d.getDate()+1);return d;
}
function toISO(d){return d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate());}
function startDateObj(){
  var min=earliestStart(), d;
  if(state.startDate){var p=state.startDate.split('-');d=new Date(+p[0],+p[1]-1,+p[2]);}
  else d=new Date(min.getTime());
  d.setHours(0,0,0,0);
  if(d.getTime()<min.getTime())d=new Date(min.getTime());
  return d;
}
function deliveryDates(){
  var rule=selectedRule(); if(!rule)return [];
  var total=rule.total_days||0, out=[], d=startDateObj(), guard=0;
  // Keep walking the calendar until we have every delivery day in the cycle.
  while(out.length<total && guard<800){
    guard++;
    if(state.days.indexOf(d.getDay())>-1)out.push(new Date(d.getTime()));
    d.setDate(d.getDate()+1);
  }
  return out;
}
function checkoutDishDates(){
  var n=parseInt(window.NM_CHECKOUT_MEAL_DAYS,10);
  if(!n||n<1)n=2;
  return deliveryDates().slice(0,n);
}

function calcRule(rule,withCoupon){
  if(!rule)return null;
  var subtotal=rule.price;
  var discBp=Math.round(parseFloat(rule.discount||'0')*100);
  var discount=Math.round(subtotal*discBp/10000);
  var afterDiscount=subtotal-discount;
  // Mirrors the server: the coupon reduces the taxable base.
  var coupon=withCoupon===false?0:Math.min(state.couponDiscount||0,afterDiscount);
  var afterCoupon=afterDiscount-coupon;
  var delivery=planData().delivery_fee||0;
  var gross=afterCoupon+delivery;
  var taxBp=Math.round((FIN.tax_rate||0)*100);
  var tax,total,taxable;
  if(FIN.include_tax){total=gross;taxable=Math.round(gross*10000/(10000+taxBp));tax=gross-taxable;}
  else{taxable=gross;tax=Math.round(gross*taxBp/10000);total=gross+tax;}
  return {
    subtotal:subtotal/100, discount:discount/100, afterDiscount:afterDiscount/100,
    coupon:coupon/100, afterCoupon:afterCoupon/100,
    delivery:delivery/100, tax:tax/100, total:total/100,
    totalDays:rule.total_days||1
  };
}
function calc(){
  var c=calcRule(selectedRule());
  if(!c)return null;
  var dates=deliveryDates();
  c.deliveries=dates.length;
  c.meals=dates.length*state.mtypes.length;
  c.perDay=dates.length?(c.afterCoupon/dates.length):(c.afterCoupon/c.totalDays);
  return c;
}

function renderDurations(){
  var wrap=document.getElementById('durOpts'); if(!wrap)return;
  var opts=durOptions();
  wrap.innerHTML='';
  if(!opts.length){wrap.innerHTML='<div class="dur-empty">'+t('no_durations')+'</div>';return;}
  if(state.durIndex==null||!opts[state.durIndex])state.durIndex=0;
  opts.forEach(function(o,i){
    var btn=document.createElement('button');
    btn.type='button';
    btn.className='dur-opt'+(i===state.durIndex?' on':'');
    var disc=parseFloat(o.discount||'0');
    // Durations advertise their list price; a coupon applies to the chosen one.
    var cr=calcRule(o,false);
    btn.innerHTML='<span class="dl">'+escHtml(o.label)+(disc>0?'<span class="dd">'+t('disc_off',{n:Math.round(disc)})+'</span>':'')+'</span><span class="dp">'+money(cr.total)+'</span>';
    btn.addEventListener('click',function(){state.durIndex=i;renderDurations();render();refreshCoupon();autoNext();});
    wrap.appendChild(btn);
  });
}

function renderDayDishes(){
  var wrap=document.getElementById('dayDishes'); if(!wrap)return;
  wrap.innerHTML='';
  var all=deliveryDates(), dates=checkoutDishDates(), p=planData();
  if(!dates.length){wrap.innerHTML='<div class="dur-empty">'+t('no_days')+'</div>';return;}
  dates.forEach(function(dt,idx){
    var card=document.createElement('div');
    card.className='dday';
    var dayLabel=DAY_NAMES[dt.getDay()]||'';
    var dateStr=dt.getFullYear()+'-'+pad(dt.getMonth()+1)+'-'+pad(dt.getDate());
    var rows='';
    state.mtypes.forEach(function(mt){
      var meals=(p.meals&&p.meals[mt])||[];
      var selName=(state.dishSel[idx]&&state.dishSel[idx][mt])||'';
      var optsHtml='<option value="">'+escHtml(t('chef_choice'))+'</option>';
      meals.forEach(function(m){
        optsHtml+='<option value="'+escAttr(m.name)+'"'+(m.name===selName?' selected':'')+'>'+escHtml(m.name)+' · '+m.calories+' '+escHtml(t('kcal'))+'</option>';
      });
      rows+='<div class="prow"><span class="lbl">'+escHtml(mealName(mt))+'</span><select data-di="'+idx+'" data-mt="'+mt+'">'+optsHtml+'</select></div>';
    });
    card.innerHTML='<div class="dh"><span>'+escHtml(dayLabel)+'</span><small>'+dateStr+'</small></div><div class="dpick">'+rows+'</div>';
    wrap.appendChild(card);
  });
  wrap.querySelectorAll('select').forEach(function(sel){
    sel.addEventListener('change',function(){
      var di=sel.getAttribute('data-di'),mt=sel.getAttribute('data-mt');
      if(!state.dishSel[di])state.dishSel[di]={};
      state.dishSel[di][mt]=sel.value;
    });
  });
  var note=document.createElement('div');
  note.className='ddays-note';
  note.innerHTML=t('dishes_note',{n:all.length,picked:dates.length});
  wrap.appendChild(note);
}

function render(){
  var c=calc();
  var rule=selectedRule();
  setTxt('chipPlan',planName(state.plan));
  setTxt('chipDishes',state.mtypes.length?state.mtypes.map(mealName).join(' + '):'—');
  setTxt('chipWeeks',rule?rule.label:'—');
  setTxt('chipDays',t('chip_days',{n:state.days.length}));

  var mn=document.getElementById('mealNote');
  if(mn){var mOk=mealsOk();mn.innerHTML=mOk?t('meal_note_ok',{n:state.mtypes.length}):t('meal_note_err');mn.classList.toggle('err',!mOk);}
  var dn=document.getElementById('daysNote');
  if(dn){var dOk=daysOk();dn.innerHTML=t('days_note',{n:state.days.length});dn.classList.toggle('err',!dOk);}
  setTxt('chipHealth',ageOk()?t('chip_age',{n:age()}):t('chip_age_missing'));
  var bn=document.getElementById('hBirthNote');
  if(bn){
    var bOk=ageOk();
    bn.innerHTML=bOk?t('birth_note_ok',{n:age()}):t('birth_note',AGE_LIMITS);
    bn.classList.toggle('err',birthDate()!==''&&!bOk);
  }
  updStartEnd();

  if(c){
    var mealWord=c.meals===1?t('meal'):t('meals');
    setTxt('mealsN',fmt(c.meals)+' '+mealWord);
    var perMeal=c.meals?fmt1(c.total/c.meals):'0';
    setHtml('cyclePrice',money(c.total)+' | '+perMeal+SAR+' '+t('per_meal'));
    setTxt('sumMeals',fmt(c.meals)+' '+mealWord);
    setHtml('sumGross',money(c.subtotal));
    var discPct=rule?Math.round(parseFloat(rule.discount||'0')):0;
    setHtml('sumDur','− '+money(c.discount)+(discPct>0?' ('+discPct+'%)':''));
    var rc=document.getElementById('rowCoupon');
    if(rc)rc.hidden=!(c.coupon>0);
    setHtml('sumCoupon','− '+money(c.coupon));
    setHtml('sumSave','− '+money(c.discount+c.coupon));
    setHtml('sumTax','+ '+money(c.tax));
    setHtml('sumTotal',money(c.total));
    setTxt('perDay',fmt1(c.perDay));
    setHtml('wTotal',money(c.total));
  }else{
    setHtml('wTotal','—');
  }

  var next=document.getElementById('wNext');
  if(next){
    if(cur===TOTAL&&c){next.innerHTML=t('add_sub')+money(c.total);}
    else{next.textContent=t('next');}
  }
  next.disabled=(cur===2&&!mealsOk())||(cur===3&&!durOk())||(cur===4&&!daysOk())||(cur===5&&!ageOk())||(cur===6&&!c)||(cur===TOTAL&&!c);
  document.getElementById('wBack').disabled=(cur===1);
}

/* ---- Coupon: the server owns the rules, the wizard just asks for a quote ---- */
function couponError(message){
  var el=document.getElementById('couponError');
  if(!el)return;
  el.textContent=message||'';
  el.hidden=!message;
}
function renderCoupon(){
  var form=document.getElementById('couponForm'),on=document.getElementById('couponOn');
  var active=!!state.coupon;
  if(form)form.hidden=active;
  if(on)on.hidden=!active;
  if(active)setTxt('couponCode',state.coupon);
}
function dropCoupon(message){
  state.coupon=null;
  state.couponDiscount=0;
  renderCoupon();
  couponError(message);
  render();
}
function requestQuote(code){
  var rule=selectedRule();
  var planId=(window.NM_PLAN_IDS&&window.NM_PLAN_IDS[state.plan])||'';
  if(!rule||!planId)return Promise.reject(null);

  return fetch(String(window.NM_QUOTE_URL).replace('__PLAN__',encodeURIComponent(planId)),{
    method:'POST',
    headers:{'Content-Type':'application/json','Accept':'application/json','X-Requested-With':'XMLHttpRequest'},
    body:JSON.stringify({
      meal_types:mealsKey().split(','),
      duration_unit:rule.unit,
      duration_length:rule.length,
      selected_days:state.days,
      coupon_code:code
    })
  }).then(function(r){return r.ok?r.json():Promise.reject(r);})
    .then(function(body){
      var b=body&&body.data&&body.data.breakdown;
      return b?b:Promise.reject(null);
    });
}
function applyCoupon(code){
  couponError('');
  requestQuote(code).then(function(b){
    if(!b.coupon_code){dropCoupon(t('coupon_invalid'));return;}
    state.coupon=b.coupon_code;
    state.couponDiscount=(b.coupon_discount&&b.coupon_discount.minor)||0;
    renderCoupon();
    render();
  }).catch(function(){dropCoupon(t('coupon_invalid'));});
}
/* A coupon quoted for one selection may not hold for another, so re-ask. */
var couponTimer=null;
function refreshCoupon(){
  if(!state.coupon)return;
  var code=state.coupon;
  clearTimeout(couponTimer);
  couponTimer=setTimeout(function(){applyCoupon(code);},350);
}
(function bindCoupon(){
  var input=document.getElementById('couponInput'),apply=document.getElementById('couponApply');
  if(!input||!apply)return;
  function submit(){
    var code=(input.value||'').trim();
    if(!code)return;
    input.value='';
    applyCoupon(code);
  }
  apply.addEventListener('click',submit);
  input.addEventListener('keydown',function(e){if(e.key==='Enter'){e.preventDefault();submit();}});
  var clear=document.getElementById('couponClear');
  if(clear)clear.addEventListener('click',function(){dropCoupon('');});
})();

function goStep(n){
  if(n<1||n>TOTAL)return;
  if(n>cur){
    if(n>2&&!mealsOk())return;
    if(n>3&&!durOk())return;
    if(n>4&&!daysOk())return;
    if(n>5&&!ageOk())return;
  }
  cur=n; if(n>maxVisited)maxVisited=n;
  document.querySelectorAll('.wstep').forEach(function(s){
    s.classList.toggle('active',+s.getAttribute('data-step')===n);
  });
  document.querySelectorAll('#stepper .snode').forEach(function(nd,i){
    var s=i+1;
    nd.classList.toggle('cur',s===cur);
    nd.classList.toggle('ok',s<cur);
    nd.classList.toggle('lock',s>maxVisited);
  });
  document.querySelectorAll('#stepper .sline').forEach(function(l,i){l.classList.toggle('ok',i+1<cur);});
  if(n===3)renderDurations();
  if(n===6)renderDayDishes();
  window.scrollTo({top:0,behavior:'smooth'});
  render();
}
function autoNext(){setTimeout(function(){if(cur<TOTAL)goStep(cur+1);},380);}

document.querySelectorAll('#plans9 .p9').forEach(function(b){
  b.addEventListener('click',function(){
    document.querySelectorAll('#plans9 .p9').forEach(function(x){x.classList.remove('on');});
    b.classList.add('on');
    state.plan=b.getAttribute('data-plan');
    state.durIndex=null;
    render(); refreshCoupon(); autoNext();
  });
});
document.querySelectorAll('#mealGrid .mt').forEach(function(b){
  b.addEventListener('click',function(){
    b.classList.toggle('on');
    state.mtypes=Array.prototype.map.call(document.querySelectorAll('#mealGrid .mt.on'),function(x){return x.getAttribute('data-meal');});
    state.durIndex=null;
    render(); refreshCoupon();
  });
});
document.querySelectorAll('#daysWrap .day').forEach(function(b){
  b.addEventListener('click',function(){
    b.classList.toggle('on');
    state.days=Array.prototype.map.call(document.querySelectorAll('#daysWrap .day.on'),function(x){return parseInt(x.getAttribute('data-day'),10);});
    render();
    if(cur===6)renderDayDishes();
  });
});
var startInput=document.getElementById('startDate');
if(startInput){
  var minISO=toISO(earliestStart());
  startInput.min=minISO;
  if(!state.startDate||state.startDate<minISO)state.startDate=minISO;
  startInput.value=state.startDate;
  startInput.addEventListener('change',function(){
    state.startDate=startInput.value||minISO;
    if(state.startDate<minISO){state.startDate=minISO;startInput.value=minISO;}
    render();
    if(cur===6)renderDayDishes();
  });
}
(function bindHealth(){
  var fields={birth_date:'hBirth',allergies:'hAllergies',medications:'hMeds'};
  Object.keys(fields).forEach(function(key){
    var el=document.getElementById(fields[key]);
    if(!el)return;
    el.value=state.health[key];
    ['input','change'].forEach(function(evt){
      el.addEventListener(evt,function(){state.health[key]=el.value;render();});
    });
  });
})();
function updStartEnd(){
  var el=document.getElementById('startEnd'); if(!el)return;
  var dates=deliveryDates();
  if(!dates.length){el.innerHTML='';return;}
  var last=dates[dates.length-1];
  el.innerHTML=t('start_range',{start:toISO(startDateObj()),end:toISO(last),n:dates.length});
}
document.getElementById('wBack').addEventListener('click',function(){goStep(cur-1);});
function mealSchedulePayload(){
  var dates=checkoutDishDates(), out=[];
  dates.forEach(function(dt,idx){
    var meals={};
    state.mtypes.forEach(function(mt){
      var name=(state.dishSel[idx]&&state.dishSel[idx][mt])||'';
      meals[mt]=name;
    });
    out.push({date:toISO(dt),meals:meals});
  });
  return out;
}

document.getElementById('wNext').addEventListener('click',function(){
  if(cur<TOTAL){goStep(cur+1);return;}
  var rule=selectedRule(); if(!rule)return;
  var next=this; if(next.disabled)return; next.disabled=true;
  var payload={
    plan_public_id:(window.NM_PLAN_IDS&&window.NM_PLAN_IDS[state.plan])||'',
    meal_types:mealsKey().split(','),
    duration_unit:rule.unit,
    duration_length:rule.length,
    selected_days:state.days,
    start_date:state.startDate,
    coupon_code:state.coupon,
    health:{
      birth_date:birthDate(),
      allergies:(state.health.allergies||'').trim()||null,
      medications:(state.health.medications||'').trim()||null
    },
    meal_schedule:mealSchedulePayload()
  };
  // Park the selection and continue to checkout; guests are sent to sign in
  // first and land back on the checkout with the draft intact.
  fetch(window.NM_CHECKOUT_URL,{
    method:'POST',
    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':window.NM_CSRF,'Accept':'application/json','X-Requested-With':'XMLHttpRequest'},
    body:JSON.stringify(payload)
  }).then(function(r){return r.ok?r.json():Promise.reject(r);})
    .then(function(res){window.location.href=res.redirect;})
    .catch(function(){next.disabled=false;});
});
document.querySelectorAll('#stepper .snode').forEach(function(nd){
  nd.addEventListener('click',function(){
    var n=+nd.getAttribute('data-go');
    if(n<=maxVisited)goStep(n);
  });
});
document.querySelectorAll('.sel-chip .edit').forEach(function(e){
  e.addEventListener('click',function(){goStep(+e.getAttribute('data-go'));});
});

document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy'; img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});

render();

(function(){
  var h=(location.hash||'').replace('#','');
  var mp=h.match(/plan=([^&]+)/);
  if(mp){
    var known={};PLAN_SLUGS.forEach(function(s){known[s]=1;});
    var name=decodeURIComponent(mp[1]);
    if(!known[name])name=DEFAULT_PLAN;
    document.querySelectorAll('#plans9 .p9').forEach(function(b){
      var on=b.getAttribute('data-plan')===name;
      b.classList.toggle('on',on);
      if(on)state.plan=name;
    });
    state.durIndex=null;
    render();
  }
})();
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

/* GSAP enhancement layer — wizard works fully without it */
try{
if(window.gsap){
  document.documentElement.classList.add('gs');
  var st=document.createElement('style');
  st.textContent='html.gs .wstep.active{animation:none}';
  document.head.appendChild(st);
  var reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;
  if(!reduce){

  var KIDS='.step-h,.p9,.seg button,.dur-opt,.dday,.day,.days-note,.macros3 .m3,.sel-chip,.buy-card,.helpline,.hint';
  function animStep(step){
    var kids=step.querySelectorAll(KIDS);
    if(!kids.length)return;
    gsap.fromTo(kids,{y:28,opacity:0},{y:0,opacity:1,duration:.55,stagger:.045,ease:'power3.out',clearProps:'all',overwrite:true});
  }

  /* animate steps when they become active */
  var steps=document.querySelectorAll('.wstep');
  steps.forEach(function(sp){sp._act=sp.classList.contains('active');});
  var mo=new MutationObserver(function(muts){
    muts.forEach(function(m){
      var t=m.target;
      if(!t.classList)return;
      var now=t.classList.contains('active');
      if(now&&!t._act)animStep(t);
      t._act=now;
    });
  });
  steps.forEach(function(sp){mo.observe(sp,{attributes:true,attributeFilter:['class']});});

  /* price pulse when totals change */
  function pulse(sel){
    var el=document.querySelector(sel);
    if(!el)return;
    new MutationObserver(function(){
      gsap.fromTo(el,{scale:1.14},{scale:1,duration:.4,ease:'power2.out',overwrite:true});
    }).observe(el,{childList:true,characterData:true,subtree:true});
    el.style.display='inline-block';
  }
  pulse('#wTotal');pulse('#sumTotal .v');pulse('#sumTotal');

  /* stepper checkmark pop */
  document.querySelectorAll('#stepper .snode').forEach(function(nd){
    var was=nd.classList.contains('ok');
    new MutationObserver(function(){
      var now=nd.classList.contains('ok');
      if(now&&!was)gsap.fromTo(nd.querySelector('.c'),{scale:.45},{scale:1,duration:.55,ease:'back.out(2.6)',overwrite:true});
      was=now;
    }).observe(nd,{attributes:true,attributeFilter:['class']});
  });

  /* springy punch on any selection */
  document.addEventListener('click',function(e){
    var el=e.target.closest('.p9,.seg button,.day');
    if(el)gsap.fromTo(el,{scale:.96},{scale:1,duration:.38,ease:'back.out(2.4)',clearProps:'transform',overwrite:true});
  },true);

  /* entrance of step 1 */
  var first=document.querySelector('.wstep.active');
  if(first)animStep(first);
  gsap.from('#stepper .snode,#stepper .sline',{y:-14,opacity:0,duration:.5,stagger:.05,ease:'power2.out',clearProps:'all'});
  gsap.from('.wbar .inner',{y:60,duration:.6,delay:.3,ease:'power3.out',clearProps:'all'});
  }
}
}catch(_){}

@endverbatim
</script>
@endpush
