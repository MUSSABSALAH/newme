<style>
@verbatim
/* Account area — shared shell with website chrome */
:root{
  --navy:var(--w-navy); --navy-2:var(--w-navy-2); --navy-3:var(--w-navy-3);
  --bg:var(--w-bg); --tile:var(--w-tile); --gray-2:var(--w-gray-2); --gray-3:var(--w-gray-3);
  --ink:var(--w-ink); --body:var(--w-body); --muted:var(--w-muted);
  --orange:var(--w-orange); --orange-deep:var(--w-orange-deep); --orange-hi:var(--w-orange-hi); --orange-soft:var(--w-orange-soft);
  --green:var(--w-green); --green-soft:#E9F7F0; --green-ink:#1F7A4D;
  --grad:var(--w-grad); --font:var(--w-font); --mono:var(--w-mono);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;max-width:100%}

.cowrap{max-width:1120px;margin:0 auto;padding:36px 20px 72px}
.cohead{margin-bottom:26px;position:relative}
.kick,.cohead .kick{font-family:var(--mono);font-size:10.5px;letter-spacing:.28em;text-transform:uppercase;color:var(--orange-deep);font-weight:800;margin-bottom:8px}
.cohead h1{font-size:clamp(26px,5vw,36px);margin-bottom:8px}
.cohead p{font-size:14px;font-weight:700;color:var(--muted);max-width:520px}
.co-back{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:800;color:var(--muted);margin-bottom:12px}
.co-back:hover{color:var(--orange-deep)}

.acc-layout{display:grid;grid-template-columns:1fr;gap:20px;align-items:start}
@media(min-width:960px){.acc-layout{grid-template-columns:240px minmax(0,1fr);gap:24px}}

.acc-side{background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;padding:12px;position:sticky;top:88px;box-shadow:0 10px 28px rgba(18,43,74,.04)}
.acc-user{display:flex;align-items:center;gap:12px;padding:10px 10px 14px;border-bottom:1.5px solid var(--gray-2);margin-bottom:8px}
.acc-user__av{width:44px;height:44px;border-radius:50%;background:linear-gradient(145deg,var(--navy),var(--navy-3));color:#fff;display:grid;place-items:center;font-weight:900;font-size:16px;flex-shrink:0;box-shadow:0 6px 16px rgba(18,43,74,.18)}
.acc-user__meta{min-width:0}
.acc-user__meta b{display:block;font-size:14px;color:var(--navy);margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.acc-user__meta span{display:block;font-size:11.5px;font-weight:700;color:var(--muted);line-height:1.45;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.acc-user__meta span[dir=ltr]{font-family:var(--mono)}

.acc-nav{display:flex;flex-direction:column;gap:4px}
.acc-nav a{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:12px 13px;border-radius:13px;font-weight:800;font-size:13.5px;color:var(--body);border:1.5px solid transparent;transition:.15s}
.acc-nav a:hover{background:var(--tile);color:var(--navy)}
.acc-nav a.on{background:var(--orange-soft);color:var(--orange-deep);border-color:rgba(240,127,45,.28)}
.acc-nav .badge{font-family:var(--mono);font-size:11px;font-weight:900;background:var(--tile);color:var(--muted);padding:2px 8px;border-radius:999px;min-width:24px;text-align:center}
.acc-nav a.on .badge{background:#fff;color:var(--orange-deep)}

.acc-side-foot{padding:10px 8px 4px;border-top:1.5px solid var(--gray-2);margin-top:8px}
.acc-side-foot button{width:100%;border:none;background:none;color:var(--muted);font-size:12.5px;font-weight:800;text-decoration:underline;padding:8px 4px}
.acc-side-foot button:hover{color:#C0392B}

.acc-main{min-width:0}
.acc-panel{display:none}
.acc-panel.on{display:block;animation:accFade .22s ease}
@keyframes accFade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}

.card{background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;padding:22px;margin-bottom:16px;box-shadow:0 8px 24px rgba(18,43,74,.03)}
.card:last-child{margin-bottom:0}
.card > h2,.card-head h2{font-size:17px;margin-bottom:4px;display:flex;align-items:center;gap:9px}
.card > h2 .n,.card-head h2 .n{display:grid;place-items:center;width:26px;height:26px;border-radius:50%;background:var(--navy);color:#fff;font-family:var(--mono);font-size:11.5px;font-weight:900;flex-shrink:0}
.card > .hint,.card-head .hint{font-size:13px;font-weight:700;color:var(--muted);margin:0 0 18px 35px}
html[dir="rtl"] .card > .hint,html[dir="rtl"] .card-head .hint{margin:0 35px 18px 0}
.card-head{margin-bottom:14px}

.cogrid{display:grid;grid-template-columns:1fr;gap:18px;align-items:start}
@media(min-width:960px){.cogrid{grid-template-columns:1fr 1fr}}

/* Subscription detail */
.sub-meta{display:flex;flex-wrap:wrap;align-items:stretch;gap:0;margin:0 0 22px;padding:4px 0;border-block:1.5px solid var(--gray-2)}
.sub-meta__item{flex:1 1 140px;padding:14px 18px;min-width:0}
.sub-meta__item + .sub-meta__item{border-inline-start:1.5px solid var(--gray-2)}
.sub-meta__item span{display:block;font-family:var(--mono);font-size:10.5px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);margin-bottom:6px}
.sub-meta__item b{display:block;font-size:17px;font-weight:900;color:var(--navy);line-height:1.25}
.sub-meta__item--accent b{color:var(--orange-deep);font-family:var(--mono);font-size:20px}
@media(max-width:719px){
  .sub-meta{display:grid;grid-template-columns:1fr 1fr;border:1.5px solid var(--gray-2);border-radius:16px;padding:0;background:#fff}
  .sub-meta__item{padding:14px 16px}
  .sub-meta__item + .sub-meta__item{border-inline-start:none}
  .sub-meta__item:nth-child(odd){border-inline-end:1.5px solid var(--gray-2)}
  .sub-meta__item:nth-child(-n+2){border-bottom:1.5px solid var(--gray-2)}
  .sub-meta__item--accent{grid-column:1/-1;border-bottom:none;border-inline-end:none;background:var(--orange-soft)}
}

.sub-overview{display:grid;grid-template-columns:1fr;gap:14px;margin-bottom:28px;align-items:stretch}
@media(min-width:720px){.sub-overview{grid-template-columns:1fr 1fr}}
.sub-overview > .card{margin-bottom:0}
.sub-overview .card > h2{margin-bottom:14px}

.sub-schedule{margin-top:8px;padding-top:8px}
.sub-schedule__head{margin-bottom:14px}
.sub-schedule__head .kick{margin-bottom:6px}
.sub-schedule__head h2{font-size:clamp(20px,3.5vw,26px);margin-bottom:6px}
.sub-schedule__head p{font-size:13.5px;font-weight:700;color:var(--muted);max-width:560px}
.sub-schedule__card{margin-bottom:0}

.frow{display:grid;grid-template-columns:1fr;gap:0 14px}
@media(min-width:640px){.frow{grid-template-columns:1fr 1fr}}

.f,.field{display:flex;flex-direction:column;gap:5px;margin-bottom:13px}
.f label,.field label{font-size:12.5px;font-weight:800;color:var(--ink)}
.f input,.f select,.f textarea,.field input,.field select{font-family:var(--font);font-size:14px;font-weight:700;color:var(--navy);background:var(--tile);border:1.5px solid var(--gray-2);border-radius:12px;padding:12px 14px;width:100%;transition:.15s}
.f input:focus,.f select:focus,.field input:focus,.field select:focus{outline:none;border-color:var(--orange);background:#fff;box-shadow:0 0 0 3px rgba(240,127,45,.12)}
.f .err,.field .err{color:#C0392B;font-size:12px;font-weight:700}
.check{display:flex;align-items:flex-start;gap:9px;font-size:13px;font-weight:700;color:var(--ink);cursor:pointer;margin-bottom:12px}
.check input{width:17px;height:17px;accent-color:var(--orange);margin-top:3px;flex-shrink:0}

.btn,.card .w-btn,.acc-main .w-btn,.acc-wrap .w-btn,.cowrap > .w-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-family:var(--font);font-weight:800;font-size:15px;border-radius:999px;padding:14px 24px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.32);width:100%;text-align:center;cursor:pointer}
.btn:hover,.card .w-btn:hover,.acc-main .w-btn:hover,.acc-wrap .w-btn:hover,.cowrap > .w-btn:hover{filter:brightness(1.06)}
.btn.ghost,.card .w-btn.ghost{background:#fff;color:var(--navy);border-color:var(--gray-2);box-shadow:none;width:auto}
.btn.sm,.card .w-btn.sm,.acc-main .w-btn.sm{min-height:42px;padding:8px 18px;font-size:13.5px;width:auto}

.alert{border-radius:14px;padding:13px 16px;font-weight:700;font-size:13.5px;margin-bottom:18px}
.alert.ok{background:var(--green-soft);color:var(--green-ink);border:1px solid rgba(57,180,120,.35)}
.alert.bad{background:#FDECEA;color:#C0392B;border:1px solid rgba(192,57,43,.25)}

.divider-label{margin:6px 0 16px;padding-top:16px;border-top:1.5px dashed var(--gray-2);color:var(--muted);font-weight:800;font-size:12.5px}
.muted-note{color:var(--muted);font-weight:700;font-size:13px;margin:0}

.pick-row{display:flex;align-items:flex-start;gap:14px;border:1.5px solid var(--gray-2);border-radius:16px;padding:16px 18px;margin-bottom:10px;background:#fff;transition:.16s;box-shadow:0 6px 18px rgba(18,43,74,.03)}
a.pick-row:hover{border-color:var(--orange);background:var(--orange-soft);transform:translateY(-1px)}
.pick-row .body{flex:1;min-width:0}
.pick-row .body b{display:block;font-size:15px;color:var(--navy);margin-bottom:3px}
.pick-row .body small{display:block;font-size:12.5px;font-weight:700;color:var(--muted);line-height:1.5}
.pick-row .side{text-align:end;display:flex;flex-direction:column;align-items:flex-end;gap:7px;flex-shrink:0}
.pick-row .tag{display:inline-block;font-size:10.5px;font-weight:800;color:var(--green-ink);background:var(--green-soft);border-radius:999px;padding:2px 9px;margin-top:6px}
.pick-row .amt{font-family:var(--mono);font-weight:900;color:var(--navy);font-size:14px;white-space:nowrap}

.pill{display:inline-block;font-size:11px;font-weight:900;padding:4px 10px;border-radius:999px}
.pill.pending,.pill.out_for_delivery{background:var(--orange-soft);color:var(--orange-deep)}
.pill.confirmed,.pill.preparing{background:#E8F0FE;color:#1B4F9C}
.pill.active,.pill.completed,.pill.delivered{background:var(--green-soft);color:var(--green-ink)}
.pill.cancelled,.pill.paused{background:#EFF1F4;color:var(--muted)}

.empty{text-align:center;padding:40px 22px;color:var(--muted);font-weight:800;border:1.5px dashed var(--gray-3);border-radius:18px;background:var(--tile)}
.empty a{color:var(--orange-deep);text-decoration:underline}

.kv{display:flex;justify-content:space-between;gap:12px;padding:9px 0;border-bottom:1px solid var(--gray-2);font-size:14px}
.kv:last-child{border-bottom:none}
.kv span{color:var(--muted);font-weight:700;flex-shrink:0}
.kv b{color:var(--ink);font-weight:800;font-family:var(--mono);text-align:end}
.kv--total{margin-top:4px;padding-top:12px;border-top:2px solid var(--gray-2)}

.link-quiet{font-weight:800;font-size:13px;color:var(--orange-deep);white-space:nowrap;background:none;border:0;padding:0;cursor:pointer}
.link-quiet:hover{text-decoration:underline}
.link-quiet.danger{color:#C0392B}

.inv-card{display:flex;flex-direction:column}
.inv-card__body{flex:1}
.inv-dl{display:inline-flex;align-items:center;justify-content:center;gap:8px;margin-top:auto;padding:11px 16px;border-radius:12px;border:1.5px solid var(--gray-2);background:var(--tile);color:var(--navy);font-weight:800;font-size:13.5px;transition:.15s;width:100%}
.inv-dl svg{width:16px;height:16px;flex-shrink:0;stroke:var(--orange-deep)}
.inv-dl:hover{border-color:var(--orange);background:var(--orange-soft);color:var(--orange-deep)}
.inv-card > .inv-dl{margin-top:auto;padding-top:14px}

.address-card{margin-bottom:12px}
.address-card__head{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:8px}
.address-card__head b{color:var(--navy);font-size:15px;margin-inline-end:8px}
.address-card__actions{display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.address-card__body{color:var(--body);font-weight:700;font-size:13.5px;line-height:1.65}
.address-edit{margin-top:14px;padding-top:14px;border-top:1.5px dashed var(--gray-2)}

.oitem{display:flex;justify-content:space-between;gap:12px;padding:10px 0;border-bottom:1px solid var(--gray-2)}
.oitem:last-child{border-bottom:none}
.oitem .q{color:var(--muted);font-weight:800;font-family:var(--mono)}
.oitem .amt{font-family:var(--mono);font-weight:900;color:var(--navy)}

/* Auth pages (login / register / password) */
.acc-wrap{max-width:440px;margin:0 auto;padding:48px 20px 72px}
.acc-wrap.narrow{max-width:420px}
.acc-head{margin-bottom:22px}
.acc-head h1{font-size:clamp(26px,5vw,34px);margin-bottom:8px}
.acc-head p{font-size:14px;font-weight:700;color:var(--muted)}
.field-row{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}
.field-row .check{margin:0}
.aside-note{margin-top:18px;text-align:center;font-size:13.5px;font-weight:700;color:var(--muted)}
.aside-note a{color:var(--orange-deep);font-weight:900}

/* Meal calendar */
body.meal-cal-open{overflow:hidden}
.meal-cal-legend{display:flex;flex-wrap:wrap;gap:14px;margin-bottom:16px}
.meal-cal-legend__item{display:inline-flex;align-items:center;gap:7px;font-size:12px;font-weight:800;color:var(--muted)}
.dot{width:9px;height:9px;border-radius:50%}
.dot--open{background:var(--green);box-shadow:0 0 0 3px var(--green-soft)}
.dot--locked{background:var(--gray-3)}

.meal-cal-month{margin-bottom:20px}
.meal-cal-month:last-child{margin-bottom:0}
.meal-cal-month__title{font-size:15px;font-weight:900;color:var(--navy);margin-bottom:10px;padding-bottom:8px;border-bottom:1.5px solid var(--gray-2)}

.meal-cal-grid{display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:5px}
.meal-cal-grid__wd{text-align:center;font-size:10.5px;font-weight:900;color:var(--muted);padding:4px 2px}

.meal-cal-cell{min-height:84px;border-radius:12px;border:1.5px solid var(--gray-2);background:#fff;padding:5px;display:flex;flex-direction:column;text-align:start;font:inherit;color:inherit}
.meal-cal-cell--blank,.meal-cal-cell--empty{background:transparent;border-color:transparent;min-height:0;padding:0}
.meal-cal-cell--empty .meal-cal-cell__num{color:var(--gray-3);font-weight:800;font-size:11px;padding:3px}
.meal-cal-cell--delivery{cursor:pointer;transition:.15s}
.meal-cal-cell--delivery:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(18,43,74,.08)}
.meal-cal-cell.is-editable{border-color:rgba(57,180,120,.4);background:linear-gradient(180deg,#fff,#F6FDF9)}
.meal-cal-cell.is-editable:hover{border-color:var(--green)}
.meal-cal-cell.is-locked{opacity:.75;background:var(--tile);cursor:pointer}
.meal-cal-cell__num{font-size:12px;font-weight:900;color:var(--navy);margin-bottom:3px}
.meal-cal-cell__meals{flex:1;display:flex;flex-direction:column;gap:2px;overflow:hidden}
.meal-cal-cell__meal{font-size:9.5px;font-weight:700;color:var(--ink);line-height:1.25;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.meal-cal-cell__meal em{font-style:normal;font-weight:900;color:var(--orange-deep);margin-inline-end:2px}
.meal-cal-cell__meal.chef{color:var(--muted);font-style:italic;font-weight:600}
.meal-cal-cell__edit{margin-top:auto;font-size:9px;font-weight:900;color:var(--green-ink)}

.meal-cal-drawer{position:fixed;inset:0;z-index:200;display:flex;align-items:flex-end;justify-content:center}
.meal-cal-drawer[hidden]{display:none!important}
.meal-cal-drawer__backdrop{position:absolute;inset:0;background:rgba(18,35,59,.4);backdrop-filter:blur(2px)}
.meal-cal-drawer__panel{position:relative;z-index:1;width:min(440px,100%);max-height:85vh;overflow:auto;background:#fff;border-radius:20px 20px 0 0;padding:20px 18px 24px;box-shadow:0 -10px 36px rgba(0,0,0,.12);animation:drawerUp .22s ease}
@keyframes drawerUp{from{transform:translateY(100%)}to{transform:none}}
.meal-cal-drawer__save{margin-top:14px}

.meal-cal-editor__head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:14px;padding-bottom:12px;border-bottom:1.5px solid var(--gray-2)}
.meal-cal-editor__head strong{display:block;color:var(--navy);font-size:16px;font-weight:900}
.meal-cal-editor__head span{color:var(--muted);font-size:12.5px;font-weight:700}
.meal-cal-editor__close{width:34px;height:34px;border-radius:50%;border:1.5px solid var(--gray-2);background:#fff;font-size:20px;line-height:1;color:var(--muted);cursor:pointer}
.meal-cal-editor__row{margin-bottom:12px}
.meal-cal-editor__row label{display:block;font-size:12px;font-weight:800;color:var(--muted);margin-bottom:5px}
.meal-cal-editor__row select{width:100%;font-family:var(--font);font-size:14px;font-weight:700;padding:11px 13px;border-radius:12px;border:1.5px solid var(--gray-2);background:var(--tile)}
.meal-cal-editor__locked-note{font-size:12.5px;font-weight:800;color:var(--orange-deep);margin-bottom:10px}
.meal-cal-editor__readonly{display:flex;justify-content:space-between;gap:10px;padding:9px 0;border-bottom:1px solid var(--gray-2);font-size:13.5px}
.meal-cal-editor__readonly span{color:var(--muted);font-weight:700}
.meal-cal-editor__readonly b{font-weight:800;color:var(--ink)}
.meal-cal-editor__readonly b.chef{font-style:italic;color:var(--muted)}

@media(max-width:959px){
  .acc-side{position:static;padding:10px}
  .acc-nav{flex-direction:row;flex-wrap:nowrap;gap:6px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;padding-bottom:2px}
  .acc-nav::-webkit-scrollbar{display:none}
  .acc-nav a{flex:0 0 auto;justify-content:center;padding:10px 14px;white-space:nowrap}
  .acc-nav .badge{display:none}
  .acc-user{padding-bottom:12px}
  .meal-cal-grid{gap:3px}
  .meal-cal-cell{min-height:68px;padding:4px}
  .meal-cal-cell__meal{font-size:8.5px}
}
@media(min-width:960px){
  .meal-cal-drawer{align-items:center}
  .meal-cal-drawer__panel{border-radius:18px;max-height:80vh;margin:20px}
}
@endverbatim
</style>
