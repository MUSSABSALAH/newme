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
body.is-auth-page{min-height:100vh;min-height:100dvh;display:flex;flex-direction:column}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;max-width:100%}

.cowrap{max-width:1120px;width:100%;margin:0 auto;padding:36px 20px 72px}
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
.acc-user__out{display:none}

.acc-nav{display:flex;flex-direction:column;gap:4px}
.acc-nav a{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:12px 13px;border-radius:13px;font-weight:800;font-size:13.5px;color:var(--body);border:1.5px solid transparent;transition:.15s}
.acc-nav a:hover{background:var(--tile);color:var(--navy)}
.acc-nav a.on{background:var(--orange-soft);color:var(--orange-deep);border-color:rgba(240,127,45,.28)}
.acc-nav .badge{font-family:var(--mono);font-size:11px;font-weight:900;background:var(--tile);color:var(--muted);padding:2px 8px;border-radius:999px;min-width:24px;text-align:center}
.acc-nav a.on .badge{background:#fff;color:var(--orange-deep)}
.acc-nav__ico{display:none}
.acc-nav__lbl{flex:1;min-width:0}
.acc-nav-stick{min-width:0}

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
.sub-meta__amount{display:inline-flex!important;align-items:center;gap:6px;flex-wrap:wrap}
.sub-meta__amount .icon-saudi-riyal{width:1.05em;height:1.15em;color:currentColor;flex-shrink:0}
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
.addr-grid{display:grid;grid-template-columns:1fr;column-gap:16px}
@media(min-width:640px){.addr-grid{grid-template-columns:1fr 1fr}}
.f label,.field label{font-size:12.5px;font-weight:800;color:var(--ink)}
.f input,.f select,.f textarea,.field input,.field select{font-family:var(--font);font-size:14px;font-weight:700;color:var(--navy);background:var(--tile);border:1.5px solid var(--gray-2);border-radius:12px;padding:12px 14px;width:100%;transition:.15s}
.f input:focus,.f select:focus,.f textarea:focus,.field input:focus,.field select:focus{outline:none;border-color:var(--orange);background:#fff;box-shadow:0 0 0 3px rgba(240,127,45,.12)}
.f textarea{resize:vertical;min-height:80px;line-height:1.7}
.f .err,.field .err,.f .field__error,.field .field__error{color:#C0392B;font-size:12px;font-weight:700}
.field > input.is-invalid,.f > input.is-invalid,.f > textarea.is-invalid,.field > textarea.is-invalid{
  border-color:#C0392B;background:#FDECEA;
  box-shadow:0 0 0 3px rgba(192,57,43,.12)
}
.field > input.is-invalid:focus,.f > input.is-invalid:focus,.f > textarea.is-invalid:focus,.field > textarea.is-invalid:focus{
  border-color:#C0392B;background:#FDECEA;
  box-shadow:0 0 0 3px rgba(192,57,43,.16)
}
.check{display:flex;align-items:flex-start;gap:9px;font-size:13px;font-weight:700;color:var(--ink);cursor:pointer;margin-bottom:12px}
.check input{width:17px;height:17px;accent-color:var(--orange);margin-top:3px;flex-shrink:0}

.btn,.card .w-btn,.acc-main .w-btn,.acc-wrap .w-btn,.cowrap > .w-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-family:var(--font);font-weight:800;font-size:15px;border-radius:999px;padding:14px 24px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.32);width:100%;text-align:center;cursor:pointer}
.btn:hover,.card .w-btn:hover,.acc-main .w-btn:hover,.acc-wrap .w-btn:hover,.cowrap > .w-btn:hover{filter:brightness(1.06)}
.btn.ghost,.card .w-btn.ghost{background:#fff;color:var(--navy);border-color:var(--gray-2);box-shadow:none;width:auto}
.btn.sm,.card .w-btn.sm,.acc-main .w-btn.sm{min-height:42px;padding:8px 18px;font-size:13.5px;width:auto}
.acc-wrap .w-btn:disabled,.acc-wrap .w-btn[aria-busy="true"]{opacity:.7;cursor:progress;filter:none;box-shadow:none;pointer-events:none}
.acc-wrap .w-btn[aria-busy="true"]::before{
  content:"";width:16px;height:16px;border-radius:50%;flex-shrink:0;
  border:2px solid rgba(255,255,255,.35);border-top-color:#fff;
  animation:otpSpin .7s linear infinite
}
@keyframes otpSpin{to{transform:rotate(360deg)}}
.acc-wrap .link-quiet:disabled{opacity:.55;cursor:progress;text-decoration:none}

.alert{border-radius:14px;padding:13px 16px;font-weight:700;font-size:13.5px;margin-bottom:18px}
.alert.ok{background:var(--green-soft);color:var(--green-ink);border:1px solid rgba(57,180,120,.35)}
.alert.bad{background:#FDECEA;color:#C0392B;border:1px solid rgba(192,57,43,.25)}

.divider-label{margin:6px 0 16px;padding-top:16px;border-top:1.5px dashed var(--gray-2);color:var(--muted);font-weight:800;font-size:12.5px}
.muted-note{color:var(--muted);font-weight:700;font-size:13px;margin:0}

.pick-row{display:flex;align-items:flex-start;gap:14px;border:1.5px solid var(--gray-2);border-radius:16px;padding:16px 18px;margin-bottom:10px;background:#fff;transition:.16s;box-shadow:0 6px 18px rgba(18,43,74,.03)}
a.pick-row:hover{border-color:var(--orange);background:var(--orange-soft);transform:translateY(-1px)}
.pick-row--actions{flex-direction:column;gap:12px}
.pick-row__main{display:flex;align-items:flex-start;gap:14px;width:100%;color:inherit;text-decoration:none}
.pick-row__main:hover .body b{color:var(--orange-deep)}
.pick-row__actions{display:flex;flex-wrap:wrap;align-items:center;gap:10px;padding-top:2px;border-top:1px dashed var(--gray-2)}
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
.pill.cancelled,.pill.paused,.pill.no_show{background:#EFF1F4;color:var(--muted)}

body.acc-modal-open{overflow:hidden}
.acc-modal{position:fixed;inset:0;z-index:300;display:flex;align-items:center;justify-content:center;padding:18px}
.acc-modal[hidden]{display:none!important}
.acc-modal__backdrop{position:absolute;inset:0;background:rgba(18,35,59,.5)}
.acc-modal__panel{position:relative;z-index:1;width:min(420px,100%);max-height:min(88vh,640px);overflow:auto;background:#fff;border-radius:18px;padding:22px 20px 20px;border:1.5px solid var(--gray-2);box-shadow:0 24px 60px rgba(18,43,74,.22)}
.acc-modal__head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:14px}
.acc-modal__head .kick{margin-bottom:4px}
.acc-modal__head h3{margin:0;font-size:20px;font-weight:900;color:var(--navy);line-height:1.25}
.acc-modal__close{width:36px;height:36px;border-radius:50%;border:1.5px solid var(--gray-2);background:var(--tile);font-size:22px;line-height:1;color:var(--muted);cursor:pointer;flex-shrink:0}
.acc-modal__close:hover{border-color:var(--orange);color:var(--orange-deep)}
.acc-modal__plan{margin:0 0 12px;font-size:14px;font-weight:800;color:var(--navy)}
.acc-modal .alert{margin-bottom:16px}
.acc-modal .alert.warn{background:#FFF4E8;color:#9A4B12;border:1.5px solid #F5C89A;padding:14px 15px;border-radius:14px;font-weight:800;font-size:13.5px;line-height:1.65}
.acc-modal__form .err{color:#C0392B;font-size:12.5px;font-weight:700;margin:8px 0 0}
.acc-modal__dismiss{display:block;width:100%;text-align:center;margin-top:16px;padding:8px;background:none;border:0}
.acc-modal__form .pause-datebar--resume{margin-inline:auto}

/* Unified date + confirm control */
.pause-datebar{width:100%;max-width:420px}
.pause-datebar__label{display:block;font-size:12.5px;font-weight:800;color:var(--muted);margin-bottom:8px}
.pause-datebar__row{
  display:flex;align-items:stretch;width:100%;
  border:1.5px solid var(--gray-2);border-radius:14px;background:var(--tile);
  overflow:hidden;transition:border-color .15s,box-shadow .15s
}
.pause-datebar__row:focus-within{
  border-color:var(--orange);background:#fff;
  box-shadow:0 0 0 3px rgba(240,127,45,.12)
}
.pause-datebar__row input[type=date]{
  flex:1;min-width:0;border:0;background:transparent;outline:none;
  font-family:var(--font);font-size:15px;font-weight:700;color:var(--ink);
  padding:13px 14px;min-height:50px;box-sizing:border-box
}
.pause-datebar__row button{
  flex:0 0 auto;border:0;border-inline-start:1.5px solid var(--gray-2);
  background:var(--grad);color:#fff;cursor:pointer;
  font-family:var(--font);font-size:13.5px;font-weight:900;
  padding:0 18px;white-space:nowrap;transition:filter .15s
}
.pause-datebar__row button:hover{filter:brightness(1.06)}
.pause-datebar__solo{
  width:100%;min-height:50px;border:0;border-radius:14px;cursor:pointer;
  background:var(--grad);color:#fff;font-family:var(--font);
  font-size:15px;font-weight:900;box-shadow:0 10px 22px rgba(240,127,45,.28)
}
.pause-datebar__solo:hover{filter:brightness(1.06)}
.pause-datebar--resume{max-width:280px;margin-inline:auto}
.pause-datebar .err{margin-top:8px}

.sub-pause{margin:18px 0}
.sub-pause h2{font-size:17px;font-weight:900;color:var(--navy);margin:0 0 12px}
.sub-pause .alert{margin-bottom:14px}
.pause-banner{margin-bottom:16px}
.alert.warn{background:#FFF4E8;color:#9A4B12;border:1.5px solid #F5C89A;padding:14px 15px;border-radius:14px;font-weight:800;font-size:13.5px;line-height:1.65}

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

/* ===== body measurements ===== */
.ms-summary{display:grid;grid-template-columns:1fr;gap:14px}
@media(min-width:640px){.ms-summary{grid-template-columns:repeat(3,1fr)}}
.ms-stat{display:flex;flex-direction:column;gap:3px;padding:14px 16px;border-radius:16px;background:var(--tile);border:1.5px solid var(--gray-2)}
.ms-stat > span{font-size:12px;font-weight:800;color:var(--muted)}
.ms-stat > b{font-family:var(--mono);font-size:22px;font-weight:900;color:var(--navy);line-height:1.25}
.ms-stat > small{font-size:11.5px;font-weight:700;color:var(--muted)}

.line-chart{margin:0}
.line-chart__head{display:flex;justify-content:space-between;align-items:baseline;gap:12px;margin-bottom:6px}
.line-chart__head span{font-size:12.5px;font-weight:800;color:var(--muted)}
.line-chart__head b{font-family:var(--mono);font-size:16px;font-weight:900}

.ms-row{margin-bottom:12px}
.ms-row__head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;flex-wrap:wrap;margin-bottom:12px}
.ms-row__date{display:flex;align-items:center;gap:9px;flex-wrap:wrap}
.ms-row__date b{color:var(--navy);font-size:15px}
.ms-delta,.ms-tag{font-family:var(--mono);font-size:11.5px;font-weight:900;border-radius:999px;padding:3px 10px}
.ms-delta{background:var(--tile);color:var(--body)}
.ms-tag{background:var(--orange-soft);color:var(--orange-deep)}
.ms-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px}
@media(min-width:560px){.ms-grid{grid-template-columns:repeat(4,1fr)}}
.ms-cell{display:flex;flex-direction:column;gap:2px}
.ms-cell span{font-size:11.5px;font-weight:800;color:var(--muted)}
.ms-cell b{font-family:var(--mono);font-size:14.5px;font-weight:900;color:var(--ink)}
.ms-note{margin:12px 0 0;padding-top:12px;border-top:1.5px dashed var(--gray-2);font-size:13px;font-weight:700;color:var(--body);line-height:1.7}

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
.acc-wrap{max-width:440px;width:100%;margin:0 auto;padding:48px 20px 72px;flex:1 0 auto}
body.is-auth-page footer.w-foot-full{margin-top:auto}
.acc-wrap.narrow{max-width:420px}
.acc-head{margin-bottom:22px}
.acc-head h1{font-size:clamp(26px,5vw,34px);margin-bottom:8px}
.acc-head p{font-size:14px;font-weight:700;color:var(--muted)}
.field-row{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}
.field-row .check{margin:0}
.aside-note{margin-top:18px;text-align:center;font-size:13.5px;font-weight:700;color:var(--muted)}
.aside-note a{color:var(--orange-deep);font-weight:900}

.otp-field{margin-bottom:20px}
.otp-wrap{position:relative;width:100%}
.otp-cells{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:8px;pointer-events:none}
.otp-cell{
  height:56px;display:grid;place-items:center;
  border:1.5px solid var(--gray-2);border-radius:14px;background:var(--tile);
  font-family:var(--mono);font-size:22px;font-weight:900;color:var(--navy);
  transition:border-color .15s,background .15s,box-shadow .15s
}
.otp-cell.is-filled{background:#fff;border-color:rgba(18,43,74,.18)}
.otp-cell.is-on{border-color:var(--orange);background:#fff;box-shadow:0 0 0 3px rgba(240,127,45,.12)}
.otp-wrap .otp-input{
  position:absolute;inset:0;z-index:2;width:100%;height:100%;
  opacity:1;border:0!important;padding:0!important;margin:0;
  background:transparent!important;box-shadow:none!important;
  color:transparent;-webkit-text-fill-color:transparent;caret-color:transparent;
  font-size:16px;letter-spacing:0;text-align:left;direction:ltr
}
@media(max-width:379px){
  .otp-cells{gap:5px}
  .otp-cell{height:48px;font-size:18px;border-radius:12px}
}

/* Meal calendar */
body.meal-cal-open{overflow:hidden}
.meal-cal-legend{display:flex;flex-wrap:wrap;gap:14px;margin-bottom:16px}
.meal-cal-legend__item{display:inline-flex;align-items:center;gap:7px;font-size:12px;font-weight:800;color:var(--muted)}
.dot{width:9px;height:9px;border-radius:50%}
.dot--open{background:var(--green);box-shadow:0 0 0 3px var(--green-soft)}
.dot--locked{background:var(--gray-3)}
.dot--paused{background:#C4A35A;box-shadow:0 0 0 3px #F5EBD6}

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
.meal-cal-cell.is-paused{border-color:rgba(196,163,90,.55);background:linear-gradient(180deg,#fff,#FBF6EA);opacity:1}
.meal-cal-cell__num{font-size:12px;font-weight:900;color:var(--navy);margin-bottom:3px}
.meal-cal-cell__badge{display:inline-block;align-self:flex-start;font-size:9px;font-weight:900;padding:2px 7px;border-radius:999px;background:#EFF1F4;color:var(--muted);margin-bottom:3px}
.meal-cal-cell.is-paused .meal-cal-cell__badge{background:#F5EBD6;color:#8A6B2A}
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
  .cowrap{padding:18px 16px 96px}
  .cohead{margin-bottom:14px}
  .cohead h1{font-size:clamp(22px,6.5vw,28px);margin-bottom:4px}
  .cohead p{display:none}
  .co-back{margin-bottom:8px}

  .acc-layout{gap:14px}
  .acc-side{
    position:static;padding:0;border:0;background:transparent;box-shadow:none;border-radius:0
  }

  .acc-user{
    background:#fff;border:1.5px solid var(--gray-2);border-radius:16px;
    padding:12px;margin-bottom:10px;gap:10px;
    box-shadow:0 6px 18px rgba(18,43,74,.04)
  }
  .acc-user__av{width:40px;height:40px;font-size:15px}
  .acc-user__meta{flex:1;min-width:0}
  .acc-user__meta b{font-size:13.5px}
  .acc-user__meta span{font-size:11px}

  .acc-nav-stick{
    background:#fff;border:1.5px solid var(--gray-2);border-radius:16px;
    padding:8px;margin-bottom:10px;
    box-shadow:0 6px 18px rgba(18,43,74,.04)
  }
  .acc-nav{
    flex-direction:row;flex-wrap:nowrap;gap:6px;
    overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;
    margin:0;padding:0 2px
  }
  .acc-nav::-webkit-scrollbar{display:none}
  .acc-nav a{
    flex:0 0 auto;justify-content:center;gap:6px;
    padding:9px 14px;white-space:nowrap;font-size:13px;
    border-radius:999px;background:var(--tile);border-color:transparent
  }
  .acc-nav a.on{border-color:rgba(240,127,45,.35)}
  .acc-nav .badge{
    display:inline-grid;place-items:center;min-width:20px;height:20px;
    padding:0 6px;font-size:10px;line-height:1
  }

  .acc-side-foot{
    margin:0 0 4px;padding:0;border:0;text-align:center
  }
  .acc-side-foot button{
    width:auto;padding:8px 12px;font-size:12.5px;color:#C0392B
  }

  .card{padding:16px;border-radius:16px;margin-bottom:12px}
  .card > h2,.card-head h2{font-size:15.5px}
  .card > .hint,.card-head .hint{margin:0 0 14px 32px;font-size:12.5px}
  html[dir="rtl"] .card > .hint,html[dir="rtl"] .card-head .hint{margin:0 32px 14px 0}

  .f,.field{margin-bottom:11px}
  .f input,.f select,.f textarea,.field input,.field select{padding:11px 12px;font-size:16px;border-radius:11px}
  .btn,.card .w-btn,.acc-main .w-btn,.acc-wrap .w-btn,.cowrap > .w-btn{min-height:48px;padding:12px 18px;font-size:14.5px}

  .pick-row{padding:14px;border-radius:14px;gap:10px}
  .pick-row,.pick-row__main{flex-wrap:wrap}
  .pick-row .side,.pick-row__main .side{
    width:100%;flex-direction:row;align-items:center;justify-content:space-between;
    text-align:start;padding-top:8px;border-top:1px dashed var(--gray-2)
  }
  .pick-row__actions{gap:8px}
  .pick-row .body b{font-size:14px}
  .pick-row .amt{font-size:13.5px}

  .address-card__head{flex-direction:column;align-items:stretch;gap:8px}
  .address-card__actions{gap:8px 12px}

  .ms-summary{gap:10px}
  .ms-stat{padding:12px 14px;border-radius:14px}
  .ms-stat > b{font-size:20px}
  .ms-grid{grid-template-columns:1fr 1fr;gap:8px}

  .sub-overview{gap:12px;margin-bottom:20px}
  .kv{font-size:13.5px;padding:8px 0}

  .acc-modal{align-items:flex-end;padding:0}
  .acc-modal__panel{
    width:100%;max-height:min(90vh,720px);border-radius:20px 20px 0 0;
    padding:18px 16px calc(18px + env(safe-area-inset-bottom,0px))
  }

  .meal-cal-grid{gap:3px}
  .meal-cal-cell{min-height:68px;padding:4px}
  .meal-cal-cell__meal{font-size:8.5px}
}

@media(max-width:819.98px){
  body:has(.cowrap) footer.w-foot-full{display:none!important}
  .cowrap{padding:14px 16px calc(28px + var(--ip-tabbar, 70px))}

  .acc-dash .cohead{display:none}
  .acc-dash .acc-side{display:contents}
  .acc-dash .acc-side-head{
    order:0;background:#fff;border:1.5px solid var(--gray-2);border-radius:20px;
    box-shadow:0 8px 22px rgba(18,43,74,.05);overflow:hidden;margin-bottom:14px
  }
  .acc-dash .acc-user{
    align-items:center;border:0;box-shadow:none;border-radius:0;margin:0;
    padding:14px 14px 12px;border-bottom:1.5px solid var(--gray-2)
  }
  .acc-dash .acc-user__out{display:block;margin-inline-start:auto;flex-shrink:0}
  .acc-dash .acc-user__out button{
    border:0;background:var(--tile);color:#C0392B;
    font-size:12px;font-weight:800;border-radius:999px;padding:8px 12px
  }
  .acc-dash .acc-side-foot{display:none}

  .acc-dash .acc-nav-stick{
    position:static;margin:0;padding:10px;border:0;border-radius:0;
    box-shadow:none;background:transparent;backdrop-filter:none
  }
  .acc-dash .acc-nav{
    display:grid;grid-template-columns:repeat(3,minmax(0,1fr));
    gap:6px;overflow:visible;flex-wrap:unset
  }
  .acc-dash .acc-nav a{
    position:relative;flex:unset;flex-direction:column;justify-content:center;
    align-items:center;gap:5px;min-height:74px;padding:12px 4px 10px;
    white-space:normal;text-align:center;font-size:11.5px;line-height:1.25;
    border-radius:14px;background:var(--tile);border-color:transparent;color:var(--navy)
  }
  .acc-dash .acc-nav a.on{background:var(--orange-soft);color:var(--orange-deep);border-color:transparent}
  .acc-dash .acc-nav__ico{
    display:grid;place-items:center;width:22px;height:22px;flex-shrink:0;color:inherit
  }
  .acc-dash .acc-nav__ico svg{
    width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.9;
    stroke-linecap:round;stroke-linejoin:round
  }
  .acc-dash .acc-nav__lbl{flex:none}
  .acc-dash .acc-nav .badge{
    position:absolute;top:6px;inset-inline-end:6px;min-width:16px;height:16px;
    padding:0 4px;font-size:9px;background:#fff;color:var(--orange-deep)
  }
  .acc-dash .acc-main{order:2}

  .acc-dash .card{padding:18px 16px 20px;border-radius:18px}
  .acc-dash .card > h2 .n{display:none}
  .acc-dash .card > h2{font-size:20px;margin-bottom:6px}
  .acc-dash .card > .hint,
  html[dir="rtl"] .acc-dash .card > .hint{margin:0 0 16px;font-size:13px;line-height:1.7}
  .acc-dash .frow{grid-template-columns:1fr}
  .acc-dash .divider-label{font-size:12px;line-height:1.7;padding-top:14px}
  .acc-dash .acc-save{
    position:sticky;bottom:calc(var(--ip-tabbar, 70px) + 8px);z-index:70;
    margin-top:12px;box-shadow:0 10px 24px rgba(240,127,45,.35)
  }
}
@media(min-width:960px){
  .meal-cal-drawer{align-items:center}
  .meal-cal-drawer__panel{border-radius:18px;max-height:80vh;margin:20px}
}
@endverbatim
</style>
