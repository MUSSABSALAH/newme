@extends('website.layouts.app')

@section('title', __('website.consult.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-2:#1B3A61; --navy-3:#24487A;
  --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478; --green-soft:#E9F7F0; --red:#D64545;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img:not(.logo__img){display:block;width:100%;height:100%;object-fit:cover}
.logo__img{display:block;height:40px;width:auto;max-width:160px;object-fit:contain}
.aiimg{transition:opacity .9s ease}
.js .aiimg{opacity:0}
.js .aiimg.loaded{opacity:1}
.i{width:1.05em;height:1.05em;fill:currentColor;vertical-align:-0.14em;display:inline-block}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:15px;border-radius:999px;padding:15px 30px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.35)}
.btn:active{transform:scale(.97)}
.btn.sm{padding:11px 20px;min-height:44px;font-size:13.5px}
.btn.navy{background:var(--navy);border-color:var(--navy);box-shadow:0 12px 28px rgba(18,43,74,.3)}

.announce{background:var(--navy);color:#fff;text-align:center;padding:9px 14px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2);padding-top:var(--sat)}
nav.main .bar{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:inline-flex;align-items:center;gap:10px;line-height:0}
.nav-links{display:none;gap:18px;font-weight:800;font-size:13px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}
.nav-right{display:flex;align-items:center;gap:8px}
.nav-cta{font-size:12px;font-weight:900;color:var(--ink);border:1.5px solid var(--ink);border-radius:999px;padding:6px 16px;height:36px;display:inline-flex;align-items:center;transition:.2s;line-height:1}
.nav-cta:hover{background:var(--ink);color:#fff}
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}

/* ===== booking layout ===== */
.wrap{max-width:1160px;margin:0 auto;padding:44px 20px 70px;display:grid;gap:34px;position:relative}
@media(min-width:960px){.wrap{grid-template-columns:1fr 1.05fr;align-items:start}}
.wrap::before{content:"";position:absolute;top:-140px;inset-inline-end:-160px;width:440px;height:440px;border-radius:50%;background:radial-gradient(circle,rgba(240,127,45,.13),transparent 65%);pointer-events:none}

.copy .kick{font-family:var(--mono);font-size:10.5px;letter-spacing:.28em;color:var(--orange-deep);text-transform:uppercase;font-weight:800}
.copy h1{font-size:clamp(32px,6.5vw,56px);margin:10px 0 12px}
.copy h1 em{font-style:normal;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.copy .lead{font-size:15px;font-weight:600;max-width:440px}
.ticks{margin-top:22px;display:grid;gap:11px}
.tick{display:flex;gap:11px;align-items:flex-start;font-size:13.5px;font-weight:800;color:var(--ink)}
.tick .c{width:24px;height:24px;border-radius:50%;background:var(--green-soft);color:var(--green);display:grid;place-items:center;flex-shrink:0;font-size:12px;font-weight:900}
.tick small{display:block;font-size:11.5px;color:var(--muted);font-weight:700}
.expert{margin-top:26px;background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:16px;display:flex;gap:14px;align-items:center;max-width:420px}
.expert .av{width:58px;height:58px;border-radius:50%;overflow:hidden;flex-shrink:0;border:2.5px solid var(--orange-soft)}
.expert b{display:block;font-size:14px;color:var(--navy);font-weight:900}
.expert span{font-size:11px;color:var(--muted);font-weight:800}
.expert .stars{color:var(--orange);font-size:11px;letter-spacing:1px}

/* ===== booking card ===== */
.book{background:#fff;border:1.5px solid var(--gray-2);border-radius:24px;box-shadow:0 26px 64px rgba(18,43,74,.12);overflow:hidden;position:relative}
.book .head{background:var(--navy);color:#fff;padding:16px 22px;display:flex;justify-content:space-between;align-items:center}
.book .head b{font-size:15px;font-weight:900}
.book .head span{font-family:var(--mono);font-size:10px;letter-spacing:.2em;color:var(--orange-hi)}
.book .bodyc{padding:22px}
.f{margin-bottom:16px}
.f label{display:block;font-size:12.5px;font-weight:900;color:var(--navy);margin-bottom:7px}
.f label i{font-style:normal;color:var(--red)}
.f input,.f select{width:100%;font-family:var(--font);font-weight:700;font-size:14px;color:var(--ink);padding:13px 15px;border:2px solid var(--gray-2);border-radius:14px;background:#fff;transition:.2s;outline:none;appearance:none;-webkit-appearance:none}
.f input:focus,.f select:focus{border-color:var(--orange);box-shadow:0 0 0 3px rgba(240,127,45,.12)}
.f input[readonly]{background:var(--tile);color:var(--muted);cursor:default}
.f input.bad{border-color:var(--red)}
.f .err{display:none;font-size:11px;font-weight:800;color:var(--red);margin-top:5px}
.f.bad .err{display:block}
.f select{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2312233B' stroke-width='2' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:left 15px center}
.frow{display:grid;gap:12px}
@media(min-width:560px){.frow{grid-template-columns:1fr 1fr}}
/* date chips — thin horizontal scroll for ~30 days */
.dates{display:flex;gap:8px;overflow-x:auto;overflow-y:hidden;padding:10px 2px 10px;margin:0 -2px;scrollbar-width:thin;scrollbar-color:var(--gray-3) transparent;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain}
.dates::-webkit-scrollbar{height:4px;display:block}
.dates::-webkit-scrollbar-track{background:transparent}
.dates::-webkit-scrollbar-thumb{background:var(--gray-3);border-radius:999px}
.dates::-webkit-scrollbar-thumb:hover{background:var(--muted)}
.dt{flex:0 0 74px;background:#fff;border:2px solid var(--gray-2);border-radius:15px;padding:10px 4px;text-align:center;transition:.2s;position:relative}
.dt small{display:block;font-size:9px;color:var(--muted);font-weight:800;font-family:var(--mono)}
.dt b{display:block;font-size:19px;color:var(--navy);font-family:var(--mono);font-weight:700;line-height:1.3}
.dt span{display:block;font-size:9.5px;color:var(--muted);font-weight:900}
.dt.on{border-color:var(--orange);background:var(--orange-soft)}
.dt.off{opacity:.38;pointer-events:none;cursor:not-allowed}
/* slots */
.slots{display:grid;grid-template-columns:repeat(3,1fr);gap:9px}
@media(min-width:560px){.slots{grid-template-columns:repeat(5,1fr)}}
.slot{background:#fff;border:2px solid var(--gray-2);border-radius:12px;padding:10px 4px;text-align:center;font-family:var(--mono);font-size:12.5px;font-weight:700;color:var(--navy);transition:.2s;position:relative}
.slot.on{border-color:var(--orange);background:var(--orange-soft);box-shadow:0 0 0 3px rgba(240,127,45,.12)}
.slot.busy{opacity:.35;pointer-events:none;text-decoration:line-through}
.slotnote{font-size:10.5px;font-weight:800;color:var(--muted);margin-top:8px;font-family:var(--mono)}
/* summary + submit */
.sumline{margin:18px 0 14px;background:var(--tile);border-radius:14px;padding:13px 16px;font-size:12.5px;font-weight:800;color:var(--ink);display:flex;align-items:center;gap:9px}
.sumline .i{color:var(--orange-deep);flex-shrink:0}
.sumline b{color:var(--navy)}
.book .btn{width:100%;border:none}
.book .btn:disabled{opacity:.45;cursor:not-allowed;box-shadow:none;filter:none;transform:none}
.privacy{margin-top:12px;font-size:10.5px;font-weight:700;color:var(--muted);text-align:center}
.privacy a{color:var(--orange-deep);border-bottom:1px solid var(--orange)}
/* success state */
.done-view{display:none;padding:44px 26px;text-align:center}
.book.ok .bodyc,.book.ok .head{display:none}
.book.ok .done-view{display:block}
.ring{width:96px;height:96px;margin:0 auto 18px;border-radius:50%;background:var(--green-soft);display:grid;place-items:center;position:relative}
.ring::before{content:"";position:absolute;inset:-10px;border-radius:50%;border:2px dashed var(--green);opacity:.4;animation:spin 14s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.ring svg{width:44px;height:44px}
.ring path{stroke:var(--green);stroke-width:3;fill:none;stroke-linecap:round;stroke-dasharray:60;stroke-dashoffset:60;animation:draw .7s .25s ease forwards}
@keyframes draw{to{stroke-dashoffset:0}}
.done-view h2{font-size:24px;margin-bottom:6px}
.done-view p{font-size:13.5px;font-weight:700}
.done-sum{margin:18px auto;max-width:340px;background:var(--tile);border-radius:16px;padding:16px;display:grid;gap:8px;text-align:start}
.done-sum .r{display:flex;justify-content:space-between;font-size:12.5px;font-weight:800;color:var(--ink)}
.done-sum .r span:last-child{font-family:var(--mono);color:var(--navy);font-weight:700}
.done-acts{display:grid;gap:10px;max-width:340px;margin:0 auto}

footer{background:#0C1F38;color:#9FB4D2;padding:34px 20px calc(38px + var(--sab));text-align:center}
footer .flinks{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;font-size:13px;font-weight:800;margin-bottom:12px}
footer .flinks a:hover{color:var(--orange-hi)}
footer .legal{font-size:11px;font-weight:600;color:#6E84A5;line-height:2}

/* mobile menu */
.mmenu{position:fixed;inset:0;z-index:220;background:var(--bg);display:flex;flex-direction:column;padding:calc(16px + var(--sat)) 24px calc(28px + var(--sab));transform:translateY(-103%);transition:transform .55s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:none}
.mmenu .mtop{display:flex;justify-content:space-between;align-items:center;margin-bottom:6vh}
.mclose{width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);font-size:20px;font-weight:900;display:grid;place-items:center}
.mlink{display:flex;justify-content:space-between;align-items:baseline;padding:14px 2px;border-bottom:1px solid var(--gray-2);font-size:clamp(23px,6.4vw,32px);font-weight:900;color:var(--navy)}
.mlink small{font-family:var(--mono);font-size:11px;color:var(--orange-deep);font-weight:700;letter-spacing:.14em}
body.mlock{overflow:hidden}
.js .rv{opacity:0;transform:translateY(20px);transition:opacity .6s ease,transform .6s ease}
.js .rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion: reduce){.js .rv{opacity:1;transform:none;transition:none}.ring::before,.ring path{animation:none;stroke-dashoffset:0}}
@endverbatim
</style>
@endpush

@section('content')
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-cal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M8 3v4M16 3v4M3.5 10h17" stroke-linecap="round"/></symbol>
</defs></svg>

<div class="announce">{!! __('website.consult.announce') !!}</div>

@include('website.partials.nav', ['active' => 'consult', 'showCart' => false])

<div class="wrap">
  <div class="copy rv">
    <span class="kick">{{ __('website.consult.kick') }}</span>
    <h1>{!! __('website.consult.h1') !!}</h1>
    <p class="lead">{{ __('website.consult.lead') }}</p>
    <div class="ticks">
      <div class="tick"><span class="c">✓</span><div>{{ __('website.consult.tick1') }}<small>{{ __('website.consult.tick1_sub') }}</small></div></div>
      <div class="tick"><span class="c">✓</span><div>{{ __('website.consult.tick2') }}<small>{{ __('website.consult.tick2_sub') }}</small></div></div>
      <div class="tick"><span class="c">✓</span><div>{{ __('website.consult.tick3') }}<small>{{ __('website.consult.tick3_sub') }}</small></div></div>
    </div>
    <div class="expert">
      <span class="av"><img class="aiimg" src="{{ asset('assets/images/p211_200x200.jpg') }}" alt="{{ __('website.consult.expert_alt') }}" onerror="this.remove()"></span>
      <div><b>{{ __('website.consult.expert_name') }}</b><span>{{ __('website.consult.expert_sub') }}</span><div class="stars">★★★★★</div></div>
    </div>
  </div>

  <div class="book rv" id="book">
    <div class="head"><b>{{ __('website.consult.book_title') }}</b><span>{{ __('website.consult.book_step') }}</span></div>
    <div class="bodyc">
      <div class="frow">
        <div class="f" id="fName">
          <label>{{ __('website.consult.label_name') }} <i>*</i></label>
          <input type="text" id="inName" value="{{ $customer->name }}" readonly autocomplete="name">
          <div class="err">{{ __('website.consult.err_name') }}</div>
        </div>
        <div class="f" id="fMail">
          <label>{{ __('website.consult.label_email') }} <i>*</i></label>
          <input type="email" id="inMail" value="{{ $customer->email }}"
                 placeholder="you@example.com" autocomplete="email" dir="ltr" style="text-align:end"
                 @readonly(filled($customer->email))>
          <div class="err">{{ __('website.consult.err_email') }}</div>
        </div>
      </div>
      <div class="f">
        <label>{{ __('website.consult.label_goal') }}</label>
        <select id="inGoal">
          <option value="">{{ __('website.consult.goal_placeholder') }}</option>
          @foreach (__('website.consult.goals') as $goal)
          <option>{{ $goal }}</option>
          @endforeach
        </select>
      </div>
      <div class="f" id="fDate">
        <label>{{ __('website.consult.label_date') }} <i>*</i></label>
        <div class="dates" id="dates"></div>
        <div class="err">{{ __('website.consult.err_date') }}</div>
      </div>
      <div class="f" id="fSlot">
        <label>{{ __('website.consult.label_slot') }} <i>*</i></label>
        <div class="slots" id="slots"></div>
        <div class="slotnote" id="slotNote">{{ __('website.consult.slot_note_empty') }}</div>
        <div class="err">{{ __('website.consult.err_slot') }}</div>
      </div>
      <div class="sumline"><svg class="i"><use href="#i-cal"/></svg><span id="sumTxt">{{ __('website.consult.sum_empty') }}</span></div>
      <button class="btn" id="submit" type="button" disabled>{{ __('website.consult.submit') }}</button>
      <div class="privacy">{!! __('website.consult.privacy', ['url' => route('website.terms')]) !!}</div>
    </div>
    <div class="done-view">
      <div class="ring"><svg viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7"/></svg></div>
      <h2>{{ __('website.consult.done_h2') }}</h2>
      <p>{{ __('website.consult.done_p') }}</p>
      <div class="done-sum">
        <div class="r"><span>{{ __('website.consult.done_name') }}</span><span id="dName">—</span></div>
        <div class="r"><span>{{ __('website.consult.done_email') }}</span><span id="dMail">—</span></div>
        <div class="r"><span>{{ __('website.consult.done_when') }}</span><span id="dWhen">—</span></div>
      </div>
      <div class="done-acts">
        <a class="btn" href="{{ route('website.subscribe') }}">{{ __('website.consult.done_plans') }}</a>
      </div>
    </div>
  </div>
</div>

@include('website.partials.footer', ['variant' => 'simple'])

@include('website.partials.mobile-menu')

@endsection

@push('scripts')
<script>
window.NM_I18N = @json(__('website.consult.js'));
window.NM_CONSULT = @json($consultationSchedule);
window.NM_CONSULT_STORE = @json(route('website.consult.store'));
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
var DAYS=I18N.days||[];
var MONTHS=I18N.months||[];
var CONSULT=window.NM_CONSULT||{};
var WORK_DAYS=(CONSULT.working_days||['sun','mon','tue','wed','thu']).slice();
var SLOT_DEFS=(CONSULT.slots&&CONSULT.slots.length)?CONSULT.slots.slice():(function(){
  var starts=CONSULT.time_slots||['10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'];
  var dur=CONSULT.duration_minutes||60;
  return starts.map(function(s){
    var p=s.split(':'); var m=(+p[0])*60+(+p[1]||0)+dur;
    return {start:s,end:((m/60|0)<10?'0':'')+(m/60|0)+':'+((m%60)<10?'0':'')+(m%60)};
  });
})();
var DAY_KEYS=['sun','mon','tue','wed','thu','fri','sat'];
var DAY_SHORT=['SUN','MON','TUE','WED','THU','FRI','SAT'];
var DAYS_AHEAD=Math.max(1,parseInt(CONSULT.days_ahead,10)||30);
var BOOKED=CONSULT.booked||{};
function tpl(s,vars){return String(s||'').replace(/:([a-z_]+)/g,function(_,k){return vars[k]!=null?vars[k]:'';});}
function slotLabel(slot){return slot.start+' – '+slot.end;}
function isoLocal(d){
  var y=d.getFullYear(),m=d.getMonth()+1,day=d.getDate();
  return y+'-'+(m<10?'0':'')+m+'-'+(day<10?'0':'')+day;
}
var pick={date:null,slot:'',starts_at:'',ends_at:''};

var wrap=document.getElementById('dates'), today=new Date();
today.setHours(0,0,0,0);
for(var i=1;i<=DAYS_AHEAD;i++){
  var d=new Date(today); d.setDate(today.getDate()+i);
  var key=DAY_KEYS[d.getDay()];
  var off=WORK_DAYS.indexOf(key)===-1;
  var b=document.createElement('button');
  b.type='button';
  b.className='dt'+(off?' off':'');
  if(off)b.setAttribute('disabled','disabled');
  b.innerHTML='<small>'+DAY_SHORT[d.getDay()]+'</small><b>'+d.getDate()+'</b><span>'+(DAYS[d.getDay()]||'')+'</span>';
  b.setAttribute('data-iso',isoLocal(d));
  wrap.appendChild(b);
}
function fmtDate(iso){var d=new Date(iso+'T12:00:00');return DAYS[d.getDay()]+' '+d.getDate()+' '+MONTHS[d.getMonth()];}

function buildSlots(iso){
  var sw=document.getElementById('slots'); sw.innerHTML='';
  var taken=BOOKED[iso]||[];
  var free=0;
  for(var i=0;i<SLOT_DEFS.length;i++){
    var slot=SLOT_DEFS[i];
    var busy=taken.indexOf(slot.start)!==-1;
    if(!busy)free++;
    var b=document.createElement('button');
    b.type='button';
    b.className='slot'+(busy?' busy':'');
    b.textContent=slotLabel(slot);
    b.setAttribute('data-start',slot.start);
    b.setAttribute('data-end',slot.end);
    if(busy)b.setAttribute('disabled','disabled');
    sw.appendChild(b);
  }
  document.getElementById('slotNote').textContent=tpl(I18N.slots_note,{n:free,date:fmtDate(iso)});
  document.getElementById('slotNote').style.color='';
  pick.slot=''; pick.starts_at=''; pick.ends_at=''; sum();
}
document.getElementById('dates').addEventListener('click',function(e){
  var b=e.target.closest('.dt'); if(!b||b.classList.contains('off'))return;
  document.querySelectorAll('.dt').forEach(function(x){x.classList.remove('on');});
  b.classList.add('on'); pick.date=b.getAttribute('data-iso');
  document.getElementById('fDate').classList.remove('bad');
  buildSlots(pick.date);
});
document.getElementById('slots').addEventListener('click',function(e){
  var b=e.target.closest('.slot'); if(!b||b.classList.contains('busy'))return;
  document.querySelectorAll('.slot').forEach(function(x){x.classList.remove('on');});
  b.classList.add('on');
  pick.slot=slotLabel({start:b.getAttribute('data-start'),end:b.getAttribute('data-end')});
  pick.starts_at=b.getAttribute('data-start');
  pick.ends_at=b.getAttribute('data-end');
  document.getElementById('fSlot').classList.remove('bad');
  sum();
});
function sum(){
  var t=document.getElementById('sumTxt');
  if(pick.date&&pick.slot)t.innerHTML=tpl(I18N.sum_full,{date:fmtDate(pick.date),time:pick.slot});
  else if(pick.date)t.textContent=tpl(I18N.sum_date,{date:fmtDate(pick.date)});
  else t.textContent=I18N.sum_empty||'';
  syncSubmit();
}
function formReady(){
  var name=document.getElementById('inName');
  var mail=document.getElementById('inMail');
  return name.value.trim().length>=2
    && /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(mail.value.trim())
    && !!pick.date
    && !!pick.starts_at
    && !!pick.ends_at;
}
function syncSubmit(){
  var btn=document.getElementById('submit');
  if(!btn||btn.getAttribute('data-busy')==='1')return;
  btn.disabled=!formReady();
}
function csrfToken(){
  var m=document.querySelector('meta[name="csrf-token"]');
  return m?m.getAttribute('content'):'';
}
function showBookError(msg){
  var note=document.getElementById('slotNote');
  if(note){note.textContent=msg||(I18N.book_error||''); note.style.color='#C0382B';}
}
['inName','inMail','inGoal'].forEach(function(id){
  var el=document.getElementById(id);
  if(!el)return;
  el.addEventListener('input',syncSubmit);
  el.addEventListener('change',syncSubmit);
});
document.getElementById('submit').addEventListener('click',function(){
  var btn=document.getElementById('submit');
  if(btn.disabled||btn.getAttribute('data-busy')==='1')return;
  var name=document.getElementById('inName'), mail=document.getElementById('inMail');
  var goal=document.getElementById('inGoal');
  var ok=true;
  function mark(f,cond){document.getElementById(f).classList.toggle('bad',!cond); if(!cond)ok=false;}
  mark('fName',name.value.trim().length>=2);
  mark('fMail',/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(mail.value.trim()));
  mark('fDate',!!pick.date);
  mark('fSlot',!!pick.starts_at&&!!pick.ends_at);
  if(!ok){syncSubmit(); return;}
  btn.setAttribute('data-busy','1');
  btn.disabled=true;
  var prev=btn.textContent;
  btn.textContent=I18N.booking||prev;
  fetch(window.NM_CONSULT_STORE,{
    method:'POST',
    headers:{
      'Content-Type':'application/json',
      'Accept':'application/json',
      'X-CSRF-TOKEN':csrfToken(),
      'X-Requested-With':'XMLHttpRequest'
    },
    body:JSON.stringify({
      name:name.value.trim(),
      email:mail.value.trim(),
      goal:goal&&goal.value?goal.value:'',
      date:pick.date,
      starts_at:pick.starts_at,
      ends_at:pick.ends_at
    })
  }).then(function(r){
    return r.json().then(function(data){return {ok:r.ok,status:r.status,data:data};});
  }).then(function(res){
    if(!res.ok||!res.data||!res.data.ok){
      btn.removeAttribute('data-busy');
      btn.textContent=prev;
      syncSubmit();
      var msg=(res.data&&res.data.message)||(res.data&&res.data.errors&&Object.values(res.data.errors)[0]&&Object.values(res.data.errors)[0][0])||(I18N.book_error||'');
      showBookError(msg);
      return;
    }
    // Stay disabled after success to avoid duplicate bookings.
    btn.textContent=prev;
    document.getElementById('dName').textContent=name.value.trim();
    document.getElementById('dMail').textContent=mail.value.trim();
    document.getElementById('dWhen').textContent=res.data.when||(fmtDate(pick.date)+' · '+pick.slot);
    document.getElementById('book').classList.add('ok');
    window.scrollTo({top:0,behavior:'smooth'});
  }).catch(function(){
    btn.removeAttribute('data-busy');
    btn.textContent=prev;
    syncSubmit();
    showBookError(I18N.book_error||'');
  });
});
syncSubmit();
document.querySelectorAll('img.aiimg').forEach(function(img){
  img.loading='lazy';img.decoding='async';
  if(img.complete&&img.naturalWidth>0)img.classList.add('loaded');
  else img.addEventListener('load',function(){img.classList.add('loaded');});
});
if('IntersectionObserver' in window){
  var rio=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');rio.unobserve(e.target);}});},{threshold:.15});
  document.querySelectorAll('.rv').forEach(function(el){rio.observe(el);});
}else{failOpen();}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
@verbatim

try{
if(window.gsap&&!(window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches)){
  var tk=function(sel){gsap.utils.toArray(sel).forEach(function(e){e.classList.add('in');e.style.transition='none';});};
  tk('.copy,.book');
  gsap.timeline({defaults:{ease:'power3.out'}})
    .from('.copy > *',{y:26,opacity:0,duration:.6,stagger:.08,clearProps:'all'})
    .from('.book',{y:40,opacity:0,duration:.8,clearProps:'all'},'-=.5')
    .from('.dt',{y:14,opacity:0,duration:.4,stagger:.04,clearProps:'all'},'-=.4');
  document.addEventListener('click',function(e){
    var el=e.target.closest('.dt,.slot');
    if(el&&!el.classList.contains('busy')&&!el.classList.contains('off'))
      gsap.fromTo(el,{scale:.93},{scale:1,duration:.32,ease:'back.out(2.4)',clearProps:'transform',overwrite:true});
  },true);
}
}catch(_){}

@endverbatim
</script>
@endpush
