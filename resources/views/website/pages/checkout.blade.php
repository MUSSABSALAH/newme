@extends('website.layouts.app')

@section('title', __('checkout.title'))
@section('theme', '#122B4A')

@php
  use App\Modules\Checkout\Enums\CheckoutSource;

  $isSubscription = $summary->source === CheckoutSource::Subscription;
  $chosen = old('address', $selectedAddress?->public_id);
  $chosenMethod = old('payment_method', $methods[0]->value ?? 'mada');
  $hasAddress = $addresses->isNotEmpty();
  $hostedCheckout = $hostedCheckout ?? false;
@endphp

@push('styles')
<style>
@verbatim
:root{
  --navy:#122B4A; --navy-3:#24487A;
  --bg:#F7F5F1; --tile:#F0EDE6; --gray-2:#E8E4DC; --gray-3:#D5D0C6;
  --ink:#12233B; --body:#43536A; --muted:#7C8799;
  --orange:#F07F2D; --orange-deep:#DD6516; --orange-hi:#FFA05C; --orange-soft:#FFF0E1;
  --green:#39B478; --green-soft:#E9F7F0; --green-ink:#1F7A4D;
  --grad:linear-gradient(105deg,var(--orange-hi),var(--orange) 55%,var(--orange-deep));
  --font:'Cairo',-apple-system,BlinkMacSystemFont,"Segoe UI",Tahoma,Arial,sans-serif;
  --mono:ui-monospace,SFMono-Regular,Menlo,monospace;
  --sat:env(safe-area-inset-top,0px); --sab:env(safe-area-inset-bottom,0px);
}
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--body);line-height:1.75;font-size:15.5px;overflow-x:hidden}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{color:var(--navy);font-weight:900;line-height:1.2;letter-spacing:-.015em}
button{font-family:var(--font);cursor:pointer}
img{display:block;width:100%;height:100%;object-fit:cover}

.announce{background:var(--navy);color:#fff;text-align:center;padding:calc(9px + var(--sat)) 14px 9px;font-size:12.5px;font-weight:700}
.announce b{color:var(--orange-hi)}
nav.main{position:sticky;top:0;z-index:90;background:rgba(247,245,241,.92);backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);border-bottom:1px solid var(--gray-2)}
nav.main .bar{max-width:1220px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;gap:12px}
.logo{display:flex;align-items:center;gap:10px}.logo b{font-size:18px;color:var(--navy);font-weight:900}
.nav-links{display:none;gap:20px;font-weight:800;font-size:13.5px;color:var(--ink)}
.nav-links a{padding:6px 0;border-bottom:2.5px solid transparent;white-space:nowrap}
.nav-links a:hover,.nav-links a.on{border-color:var(--orange)}
@media(min-width:960px){.nav-links{display:flex}}

.cowrap{max-width:1120px;margin:0 auto;padding:28px 20px 60px}
.cohead{margin-bottom:22px}
.cohead .kick{font-family:var(--mono);font-size:10.5px;letter-spacing:.28em;text-transform:uppercase;color:var(--orange-deep);font-weight:800;margin-bottom:6px}
.cohead h1{font-size:clamp(24px,5vw,34px);margin-bottom:6px}
.cohead p{font-size:14px;font-weight:700;color:var(--muted)}

.costeps{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:24px}
.costep{display:inline-flex;align-items:center;gap:8px;font-size:12.5px;font-weight:800;color:var(--muted)}
.costep .n{display:grid;place-items:center;width:26px;height:26px;border-radius:50%;background:var(--gray-2);color:var(--muted);font-family:var(--mono);font-size:12px;font-weight:900}
.costep.done .n{background:var(--green-soft);color:var(--green-ink)}
.costep.done{color:var(--green-ink)}
.costep.on .n{background:var(--grad);color:#fff}
.costep.on{color:var(--navy)}
.costep .bar{width:22px;height:2px;background:var(--gray-2);border-radius:2px}

.cogrid{display:grid;grid-template-columns:1fr;gap:18px;align-items:start}
@media(min-width:960px){.cogrid{grid-template-columns:1fr 360px}}

.card{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:20px;margin-bottom:16px}
.card > h2{font-size:17px;margin-bottom:4px;display:flex;align-items:center;gap:9px}
.card > h2 .n{display:grid;place-items:center;width:24px;height:24px;border-radius:50%;background:var(--navy);color:#fff;font-family:var(--mono);font-size:11.5px;font-weight:900;flex-shrink:0}
.card > .hint{font-size:13px;font-weight:700;color:var(--muted);margin:0 0 16px 33px}
html[dir="rtl"] .card > .hint{margin:0 33px 16px 0}

.who{display:flex;align-items:center;justify-content:space-between;gap:12px;background:var(--tile);border-radius:14px;padding:12px 14px}
.who .id b{display:block;font-size:14.5px;color:var(--navy)}
.who .id span{font-size:12.5px;font-weight:700;color:var(--muted);font-family:var(--mono)}
.who form{margin:0}
.who button{border:none;background:none;color:var(--muted);font-size:12px;font-weight:800;text-decoration:underline}
.who button:hover{color:#C0392B}

.addr{display:grid;gap:10px}
.pick{display:flex;align-items:flex-start;gap:12px;border:1.5px solid var(--gray-2);border-radius:14px;padding:13px 14px;cursor:pointer;transition:.16s}
.pick:hover{border-color:var(--gray-3)}
.pick.on{border-color:var(--orange);background:var(--orange-soft)}
.pick input{margin-top:5px;accent-color:var(--orange);width:17px;height:17px;flex-shrink:0}
.pick .body{flex:1;min-width:0}
.pick .body b{display:block;font-size:14px;color:var(--navy);margin-bottom:2px}
.pick .body p{font-size:12.5px;font-weight:700;color:var(--body);line-height:1.6}
.pick .body .tel{font-family:var(--mono);font-size:12px;color:var(--muted)}
.pick .flag{font-size:10.5px;font-weight:800;color:var(--green-ink);background:var(--green-soft);border-radius:999px;padding:2px 9px;flex-shrink:0}

.addnew{border:1.5px dashed var(--gray-3);border-radius:14px;background:transparent;color:var(--navy);font-weight:800;font-size:13.5px;padding:12px;width:100%}
.addnew:hover{border-color:var(--orange);color:var(--orange-deep)}
.aform{border-top:1.5px dashed var(--gray-2);margin-top:14px;padding-top:16px}
.aform[hidden]{display:none}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
@media(max-width:560px){.grid2{grid-template-columns:1fr}}
.f{display:flex;flex-direction:column;gap:5px;margin-bottom:12px}
.f label{font-size:12.5px;font-weight:800;color:var(--ink)}
.f input,.f textarea,.f select{font-family:var(--font);font-size:14px;font-weight:700;color:var(--navy);background:var(--tile);border:1.5px solid var(--gray-2);border-radius:12px;padding:11px 13px;width:100%}
.f input:focus,.f textarea:focus,.f select:focus{outline:none;border-color:var(--orange);background:#fff}
.f input.mono{font-family:var(--mono);letter-spacing:.06em}
.f .err{color:#C0392B;font-size:12px;font-weight:700}
.f textarea{resize:vertical;min-height:74px}
.check{display:flex;align-items:flex-start;gap:9px;font-size:13px;font-weight:700;color:var(--ink);cursor:pointer}
.check input{width:17px;height:17px;accent-color:var(--orange);margin-top:3px;flex-shrink:0}

.pays{display:grid;gap:10px}
.pay{display:flex;align-items:center;gap:12px;border:1.5px solid var(--gray-2);border-radius:14px;padding:13px 14px;cursor:pointer;transition:.16s}
.pay:hover{border-color:var(--gray-3)}
.pay.on{border-color:var(--orange);background:var(--orange-soft)}
.pay input{accent-color:var(--orange);width:17px;height:17px;flex-shrink:0}
.pay .body{flex:1;min-width:0}
.pay .body b{display:block;font-size:14px;color:var(--navy)}
.pay .body span{font-size:12px;font-weight:700;color:var(--muted)}
.cardbox{border-top:1.5px dashed var(--gray-2);margin-top:14px;padding-top:16px}
.cardbox[hidden]{display:none}
.note-sim{display:flex;gap:9px;align-items:flex-start;background:var(--tile);border-radius:12px;padding:11px 13px;font-size:12px;font-weight:700;color:var(--body);margin-bottom:14px}
.note-sim .i{width:16px;height:16px;flex-shrink:0;margin-top:3px;fill:var(--orange-deep)}

.sum{background:#fff;border:1.5px solid var(--gray-2);border-radius:18px;padding:20px;position:sticky;top:84px}
.sum h2{font-size:16px;margin-bottom:14px}
.sum .what{background:var(--tile);border-radius:14px;padding:13px;margin-bottom:16px}
.sum .what b.t{display:block;font-size:14px;color:var(--navy);margin-bottom:8px}
.sum .what .li{display:flex;justify-content:space-between;gap:10px;font-size:12.5px;font-weight:700;color:var(--body);padding:3px 0}
.sum .what .li span:last-child{font-family:var(--mono);color:var(--navy);flex-shrink:0}
.sum .r{display:flex;justify-content:space-between;align-items:baseline;font-size:13.5px;font-weight:800;color:var(--ink);margin-bottom:10px}
.sum .r .v{font-family:var(--mono);color:var(--navy)}
.sum .r.tot{padding-top:13px;border-top:1.5px dashed var(--gray-2);font-size:16px;margin-bottom:0}
.sum .r.tot .v{font-size:21px;font-weight:900}
.sum .cpn{display:inline-flex;align-items:center;gap:7px;background:var(--green-soft);border:1.5px solid rgba(57,180,120,.35);border-radius:999px;padding:5px 12px;color:var(--green-ink);font-size:12px;font-weight:800;margin-bottom:14px}
.sum .cpn b{font-family:var(--mono);letter-spacing:.06em}
.sum .back{display:block;margin-top:14px;text-align:center;font-size:12.5px;font-weight:800;color:var(--muted);text-decoration:underline}
.sum .back:hover{color:var(--navy)}

.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:15px;border-radius:999px;padding:15px 22px;min-height:52px;border:2px solid var(--orange);background:var(--grad);color:#fff;transition:.2s;box-shadow:0 12px 28px rgba(240,127,45,.35);width:100%;text-align:center;line-height:1.25}
.btn:hover{filter:brightness(1.06)}
.btn[disabled]{opacity:.6;box-shadow:none;cursor:progress}
.btn.ghost{background:#fff;color:var(--navy);border-color:var(--gray-2);box-shadow:none;min-height:44px;font-size:13.5px;padding:11px 18px}
.btn.ghost:hover{border-color:var(--navy)}
.btn .i{width:17px;height:17px;flex-shrink:0;fill:currentColor}

.alert{border-radius:14px;padding:13px 15px;font-size:13.5px;font-weight:700;margin-bottom:16px}
.alert.bad{background:#FDECEA;color:#A03024;border:1.5px solid #F3C3BD}
.alert.ok{background:var(--green-soft);color:var(--green-ink);border:1.5px solid rgba(57,180,120,.35)}

.w-foot-simple{background:#0C1F38;color:#9FB4D2;padding:36px 20px 40px;text-align:center;margin-top:20px}
.burger{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1.5px solid var(--gray-2);background:transparent;color:var(--navy);flex-shrink:0}
.burger svg{width:20px;height:20px;stroke:currentColor;stroke-width:2;fill:none;stroke-linecap:round}
@media(min-width:960px){.burger{display:none}}
.mmenu{position:fixed;inset:0;z-index:300;background:linear-gradient(160deg,#122B4A,#0A1B31 70%);display:flex;flex-direction:column;justify-content:center;padding:80px 34px 50px;transform:translateY(-102%);transition:transform .5s cubic-bezier(.77,0,.18,1);overflow-y:auto}
.mmenu.open{transform:translateY(0)}
.mmenu .mkick{font-family:var(--mono);font-size:10px;letter-spacing:.34em;color:#FFA05C;text-transform:uppercase;margin-bottom:20px}
.mmenu a.mlink{display:block;color:#EAF1FA;font-size:27px;font-weight:900;padding:10px 0;border-bottom:1px solid rgba(255,255,255,.1)}
.mmenu a.mcta{display:inline-flex;align-items:center;justify-content:center;margin-top:26px;background:linear-gradient(105deg,#FFA05C,#F07F2D 55%,#DD6516);color:#fff;font-weight:900;font-size:15px;border-radius:999px;padding:16px 34px}
.mmenu .mfoot{margin-top:auto;padding-top:28px;font-size:11px;font-weight:700;color:#8FA6C6}
.mclose{position:absolute;top:calc(20px + env(safe-area-inset-top,0px));inset-inline-end:22px;width:44px;height:44px;border-radius:50%;border:1.5px solid rgba(255,255,255,.25);background:none;color:#fff;font-size:20px;font-weight:900;display:grid;place-items:center}
body.menu-open{overflow:hidden}
@endverbatim
</style>
@endpush

@section('content')
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<symbol id="i-lock" viewBox="0 0 24 24"><path d="M7 10V8a5 5 0 0 1 10 0v2h1a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h1zm2 0h6V8a3 3 0 0 0-6 0v2z"/></symbol>
<symbol id="i-info" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></symbol>
<symbol id="i-tag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0l-7.2-7.2a2 2 0 0 1-.6-1.4V4a1 1 0 0 1 1-1h8a2 2 0 0 1 1.4.6l7.4 7.4a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="7.5" r="1.5" fill="currentColor" stroke="none"/></symbol>
</defs></svg>

<div class="announce">{!! __('website.store.announce') !!}</div>

@include('website.partials.nav', ['active' => $isSubscription ? 'subscribe' : 'store', 'showCart' => ! $isSubscription])

<div class="cowrap">
  <div class="cohead">
    <div class="kick">{{ $summary->source->label() }}</div>
    <h1>{{ __('checkout.heading') }}</h1>
    <p>{{ __('checkout.subtitle') }}</p>
  </div>

  <div class="costeps">
    <div class="costep done"><span class="n">✓</span>{{ __('checkout.steps.account') }}</div>
    <span class="bar"></span>
    <div class="costep {{ $hasAddress ? 'done' : 'on' }}"><span class="n">{{ $hasAddress ? '✓' : 2 }}</span>{{ __('checkout.steps.address') }}</div>
    <span class="bar"></span>
    <div class="costep {{ $hasAddress ? 'on' : '' }}"><span class="n">3</span>{{ __('checkout.steps.payment') }}</div>
    <span class="bar"></span>
    <div class="costep"><span class="n">4</span>{{ __('checkout.steps.review') }}</div>
  </div>

  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif
  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif

  <div class="cogrid">
    <div>
      {{-- STEP 1: who is buying --}}
      <div class="card">
        <h2><span class="n">1</span>{{ __('checkout.steps.account') }}</h2>
        <div class="who">
          <div class="id">
            <b>{{ $user->name }}</b>
            <span dir="ltr">{{ $user->email }}@if ($user->phone) · {{ $user->phone }}@endif</span>
          </div>
          <form method="POST" action="{{ route('website.logout') }}">
            @csrf
            <button type="submit">{{ __('checkout.account.logout') }}</button>
          </form>
        </div>
      </div>

      {{-- STEP 2: where it goes --}}
      <div class="card">
        <h2><span class="n">2</span>{{ __('checkout.address.heading') }}</h2>
        <p class="hint">{{ __('checkout.steps.address') }}</p>

        @unless ($hasAddress)
          <div class="alert bad" style="margin-bottom:14px">{{ __('checkout.address.empty') }}</div>
        @endunless

        @error('address')<div class="alert bad" style="margin-bottom:14px">{{ $message }}</div>@enderror

        @if ($hasAddress)
          <div class="addr">
            @foreach ($addresses as $address)
              <label class="pick {{ $chosen === $address->public_id ? 'on' : '' }}" data-pick>
                <input type="radio" name="address" value="{{ $address->public_id }}" form="placeOrder"
                       @checked($chosen === $address->public_id)>
                <span class="body">
                  <b>{{ $address->label }}</b>
                  <p>{{ $address->recipient_name }} — {{ $address->summary() }}@if ($address->national_address) · {{ __('addresses.fields.national_address') }}: <span dir="ltr">{{ $address->national_address }}</span>@endif @if ($address->details) · {{ $address->details }}@endif</p>
                  <span class="tel" dir="ltr">{{ $address->phone }}</span>
                </span>
                @if ($address->is_default)<span class="flag">{{ __('addresses.default') }}</span>@endif
              </label>
            @endforeach
          </div>
        @endif

        <button type="button" class="addnew" data-toggle-address style="margin-top:{{ $hasAddress ? '10px' : '0' }}">
          + {{ __('checkout.address.add') }}
        </button>

        <form class="aform" method="POST" action="{{ route('website.checkout.address.store') }}"
              data-address-form @if ($hasAddress && ! $errors->has('street')) hidden @endif>
          @csrf
          <div class="grid2">
            <div class="f">
              <label for="label">{{ __('addresses.fields.label') }}</label>
              <input type="text" id="label" name="label" value="{{ old('label') }}" placeholder="{{ __('addresses.placeholders.label') }}" required>
              @error('label')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="recipient_name">{{ __('addresses.fields.recipient_name') }}</label>
              <input type="text" id="recipient_name" name="recipient_name" value="{{ old('recipient_name', $user->name) }}" required>
              @error('recipient_name')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="phone">{{ __('addresses.fields.phone') }}</label>
              <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" dir="ltr" required>
              @error('phone')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="city">{{ __('addresses.fields.city') }}</label>
              <input type="text" id="city" name="city" value="{{ old('city') }}" required>
              @error('city')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="district">{{ __('addresses.fields.district') }}</label>
              <input type="text" id="district" name="district" value="{{ old('district') }}" required>
              @error('district')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="street">{{ __('addresses.fields.street') }}</label>
              <input type="text" id="street" name="street" value="{{ old('street') }}" required>
              @error('street')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="national_address">{{ __('addresses.fields.national_address') }}</label>
              <input type="text" id="national_address" name="national_address" value="{{ old('national_address') }}" placeholder="{{ __('addresses.placeholders.national_address') }}" required dir="ltr" autocomplete="off">
              @error('national_address')<span class="err">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="f">
            <label for="details">{{ __('addresses.fields.details') }}</label>
            <input type="text" id="details" name="details" value="{{ old('details') }}" placeholder="{{ __('addresses.placeholders.details') }}">
            @error('details')<span class="err">{{ $message }}</span>@enderror
          </div>
          <label class="check" style="margin-bottom:14px">
            <input type="checkbox" name="is_default" value="1" @checked(old('is_default', ! $hasAddress))>
            <span>{{ __('addresses.fields.is_default') }}</span>
          </label>
          <button type="submit" class="btn ghost" style="width:auto">{{ __('checkout.address.save') }}</button>
        </form>
      </div>

      {{-- STEP 3 + 4: pay and place --}}
      <form method="POST" action="{{ route('website.checkout.store') }}" id="placeOrder" data-place>
        @csrf

        <div class="card">
          <h2><span class="n">3</span>{{ __('checkout.payment.heading') }}</h2>
          <p class="hint">{{ $hostedCheckout ? __('checkout.payment.hosted_note') : __('checkout.payment.simulated_note') }}</p>

          @error('payment_method')<div class="alert bad" style="margin-bottom:14px">{{ $message }}</div>@enderror

          <div class="pays">
            @foreach ($methods as $method)
              <label class="pay {{ $chosenMethod === $method->value ? 'on' : '' }}" data-pay>
                <input type="radio" name="payment_method" value="{{ $method->value }}"
                       data-card="{{ (! $hostedCheckout && $method->requiresCard()) ? '1' : '0' }}"
                       @checked($chosenMethod === $method->value)>
                <span class="body">
                  <b>{{ $method->label() }}</b>
                  <span>{{ __('payments.method_notes.'.$method->value) }}</span>
                </span>
              </label>
            @endforeach
          </div>

          @unless ($hostedCheckout)
          <div class="cardbox" data-cardbox>
            <div class="note-sim">
              <svg class="i"><use href="#i-info"/></svg>
              <span>{{ __('checkout.payment.test_hint') }}</span>
            </div>
            <div class="f">
              <label for="card_number">{{ __('checkout.fields.card_number') }}</label>
              <input type="text" id="card_number" name="card_number" class="mono" dir="ltr"
                     inputmode="numeric" autocomplete="cc-number" placeholder="4242 4242 4242 4242">
              @error('card_number')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="f">
              <label for="card_holder">{{ __('checkout.fields.card_holder') }}</label>
              <input type="text" id="card_holder" name="card_holder" value="{{ old('card_holder', $user->name) }}" autocomplete="cc-name">
              @error('card_holder')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="grid2">
              <div class="f">
                <label for="card_expiry_month">{{ __('checkout.fields.card_expiry_month') }}</label>
                <input type="number" id="card_expiry_month" name="card_expiry_month" class="mono" dir="ltr"
                       min="1" max="12" value="{{ old('card_expiry_month') }}" placeholder="12" autocomplete="cc-exp-month">
                @error('card_expiry_month')<span class="err">{{ $message }}</span>@enderror
              </div>
              <div class="f">
                <label for="card_expiry_year">{{ __('checkout.fields.card_expiry_year') }}</label>
                <input type="number" id="card_expiry_year" name="card_expiry_year" class="mono" dir="ltr"
                       min="2000" max="2100" value="{{ old('card_expiry_year') }}" placeholder="{{ now()->addYears(2)->year }}" autocomplete="cc-exp-year">
                @error('card_expiry_year')<span class="err">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="f">
              <label for="card_cvv">{{ __('checkout.fields.card_cvv') }}</label>
              <input type="text" id="card_cvv" name="card_cvv" class="mono" dir="ltr"
                     inputmode="numeric" maxlength="4" placeholder="123" autocomplete="cc-csc" style="max-width:130px">
              @error('card_cvv')<span class="err">{{ $message }}</span>@enderror
            </div>
          </div>
          @endunless
        </div>

        <div class="card">
          <h2><span class="n">4</span>{{ __('checkout.review.heading') }}</h2>
          <p class="hint">{{ __('checkout.subtitle') }}</p>

          <div class="f">
            <label for="note">{{ __('checkout.review.note') }}</label>
            <textarea id="note" name="note" placeholder="{{ __('checkout.review.note_placeholder') }}">{{ old('note') }}</textarea>
            @error('note')<span class="err">{{ $message }}</span>@enderror
          </div>

          <label class="check" style="margin-bottom:16px">
            <input type="checkbox" name="terms" value="1" @checked(old('terms'))>
            <span>{{ __('checkout.review.terms') }}</span>
          </label>
          @error('terms')<div class="alert bad" style="margin-bottom:14px">{{ $message }}</div>@enderror

          <button type="submit" class="btn" @disabled(! $hasAddress) data-submit data-busy="{{ $hostedCheckout ? __('checkout.review.redirecting') : __('checkout.review.placing') }}">
            <svg class="i"><use href="#i-lock"/></svg>
            <span data-submit-label>{{ $hostedCheckout ? __('checkout.review.pay') : __('checkout.review.place') }}</span>
          </button>
        </div>
      </form>
    </div>

    {{-- SUMMARY --}}
    <aside>
      <div class="sum">
        <h2>{{ __('checkout.summary.heading') }}</h2>

        <div class="what">
          <b class="t">{{ $summary->title }}</b>
          @foreach ($summary->items as $item)
            <div class="li"><span>{{ $item['label'] }}</span><span>{{ $item['value'] }}</span></div>
          @endforeach
        </div>

        @if ($summary->couponCode)
          <span class="cpn"><svg class="i" width="14" height="14" style="fill:none;stroke:currentColor;stroke-width:2"><use href="#i-tag"/></svg> <b>{{ $summary->couponCode }}</b></span>
        @endif

        @foreach ($summary->lines as $line)
          <div class="r"><span>{{ $line['label'] }}</span><span class="v">{{ $line['value'] }} <x-ui.sar /></span></div>
        @endforeach

        <div class="r tot">
          <span>{{ __('checkout.summary.total') }}</span>
          <span class="v">{{ $summary->totalDisplay() }} <x-ui.sar /></span>
        </div>

        @if ($isSubscription)
          <form method="POST" action="{{ route('website.checkout.subscription.destroy') }}" style="margin-top:14px">
            @csrf
            @method('DELETE')
            <button type="submit" class="back" style="border:none;background:none;width:100%">{{ __('checkout.summary.change_plan') }}</button>
          </form>
        @else
          <a class="back" href="{{ route('website.cart') }}">{{ __('checkout.summary.back_to_cart') }}</a>
        @endif
      </div>
    </aside>
  </div>
</div>

@include('website.partials.footer', ['variant' => 'simple'])
@include('website.partials.mobile-menu')
@endsection

@push('scripts')
<script>
@verbatim
try{
  'use strict';

  // Highlight the chosen address / payment tile.
  function group(selector){
    var tiles=Array.prototype.slice.call(document.querySelectorAll(selector));
    tiles.forEach(function(tile){
      tile.addEventListener('click',function(){
        var input=tile.querySelector('input[type="radio"]');
        if(!input)return;
        input.checked=true;
        tiles.forEach(function(t){t.classList.toggle('on',t===tile);});
        input.dispatchEvent(new Event('change',{bubbles:true}));
      });
    });
  }
  group('[data-pick]');
  group('[data-pay]');

  // Card fields only matter for card methods.
  var box=document.querySelector('[data-cardbox]');
  function syncCard(){
    if(!box)return;
    var on=document.querySelector('input[name="payment_method"]:checked');
    box.hidden=!(on&&on.getAttribute('data-card')==='1');
  }
  document.querySelectorAll('input[name="payment_method"]').forEach(function(i){
    i.addEventListener('change',syncCard);
  });
  syncCard();

  // Reveal the new-address form on demand.
  var toggle=document.querySelector('[data-toggle-address]');
  var aform=document.querySelector('[data-address-form]');
  if(toggle&&aform){
    toggle.addEventListener('click',function(){
      aform.hidden=!aform.hidden;
      if(!aform.hidden){
        var first=aform.querySelector('input');
        if(first)first.focus();
      }
    });
  }

  // Group the card number as the customer types.
  var number=document.getElementById('card_number');
  if(number){
    number.addEventListener('input',function(){
      var digits=(number.value||'').replace(/\D/g,'').slice(0,19);
      number.value=digits.replace(/(.{4})/g,'$1 ').trim();
    });
  }

  // Guard against a double submission while the gateway answers.
  var form=document.querySelector('[data-place]');
  if(form){
    form.addEventListener('submit',function(){
      var button=form.querySelector('[data-submit]');
      var label=form.querySelector('[data-submit-label]');
      if(!button)return;
      window.setTimeout(function(){
        button.disabled=true;
        if(label)label.textContent=button.getAttribute('data-busy')||label.textContent;
      },0);
    });
  }
}catch(_){}
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
