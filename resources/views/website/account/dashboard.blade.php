@extends('website.layouts.app')

@section('title', __('account.dashboard.title'))
@section('theme', '#122B4A')

@push('styles')
@include('website.account._styles')
@endpush

@section('content')
@php
  $tabs = [
      'profile' => ['label' => __('account.tabs.profile'), 'count' => null],
      'measurements' => ['label' => __('account.tabs.measurements'), 'count' => $measurements->count()],
      'addresses' => ['label' => __('account.tabs.addresses'), 'count' => $addresses->count()],
      'subscriptions' => ['label' => __('account.tabs.subscriptions'), 'count' => $subscriptions->count()],
      'orders' => ['label' => __('account.tabs.orders'), 'count' => $orders->count()],
      'consultations' => ['label' => __('account.tabs.consultations'), 'count' => $consultations->count()],
  ];
  $initial = mb_strtoupper(mb_substr($user->name, 0, 1));
@endphp

<div class="announce">{!! __('website.store.announce') !!}</div>
@include('website.partials.nav', ['active' => null, 'showCart' => true])

<div class="cowrap">
  <div class="cohead">
    <div class="kick">{{ __('account.nav.account') }}</div>
    <h1>{{ __('account.dashboard.greeting', ['name' => $user->name]) }}</h1>
    <p>{{ __('account.dashboard.profile_hint') }}</p>
  </div>

  @if (session('success'))
    <div class="alert ok">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert bad">{{ session('error') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert bad">{{ $errors->first() }}</div>
  @endif

  <div class="acc-layout">
    <aside class="acc-side">
      <div class="acc-user">
        <div class="acc-user__av" aria-hidden="true">{{ $initial }}</div>
        <div class="acc-user__meta">
          <b>{{ $user->name }}</b>
          <span>{{ $user->email }}</span>
          @if ($user->phone)<span dir="ltr">{{ $user->phone }}</span>@endif
        </div>
      </div>

      <div class="acc-nav-stick">
        <nav class="acc-nav" aria-label="{{ __('account.dashboard.title') }}">
          @foreach ($tabs as $key => $tab)
            <a href="{{ route('website.account', ['tab' => $key]) }}"
               class="{{ $activeTab === $key ? 'on' : '' }}">
              {{ $tab['label'] }}
              @if ($tab['count'] !== null)
                <span class="badge">{{ $tab['count'] }}</span>
              @endif
            </a>
          @endforeach
        </nav>
      </div>

      <div class="acc-side-foot">
        <form method="POST" action="{{ route('website.logout') }}">
          @csrf
          <button type="submit">{{ __('account.dashboard.logout') }}</button>
        </form>
      </div>
    </aside>

    <div class="acc-main">
      {{-- Profile --}}
      <section class="acc-panel {{ $activeTab === 'profile' ? 'on' : '' }}" id="panel-profile">
        <div class="card">
          <h2><span class="n">1</span>{{ __('account.tabs.profile') }}</h2>
          <p class="hint">{{ __('account.dashboard.profile_hint') }}</p>

          <form method="POST" action="{{ route('website.account.profile') }}" data-validate novalidate>
            @csrf
            @method('PUT')

            <div class="f">
              <label for="name">{{ __('account.fields.name') }}</label>
              <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                     class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                     @if ($errors->has('name')) aria-invalid="true" @endif>
              @error('name')<div class="err">{{ $message }}</div>@enderror
            </div>

            <div class="frow">
              <div class="f">
                <label for="email">
                  {{ __('account.fields.email') }}
                  @unless ($channels->requiresEmailOnProfile())
                    <span class="muted-note" style="display:inline;font-weight:700">({{ __('account.fields.optional') }})</span>
                  @endunless
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                       class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                       @required($channels->requiresEmailOnProfile())
                       @if ($errors->has('email')) aria-invalid="true" @endif
                       dir="ltr">
                @error('email')<div class="err">{{ $message }}</div>@enderror
              </div>

              <div class="f">
                <label for="phone">
                  {{ __('account.fields.phone') }}
                  @unless ($channels->requiresPhoneOnProfile())
                    <span class="muted-note" style="display:inline;font-weight:700">({{ __('account.fields.optional') }})</span>
                  @endunless
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
                       pattern="[0-9+() \-]{6,32}"
                       @required($channels->requiresPhoneOnProfile())
                       @if ($errors->has('phone')) aria-invalid="true" @endif
                       dir="ltr">
                @error('phone')<div class="err">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="divider-label">{{ __('account.dashboard.health_hint') }}</div>

            <div class="f">
              <label for="birth_date">{{ __('account.fields.birth_date') }}</label>
              <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date?->toDateString()) }}"
                     class="{{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                     min="{{ $birthDateRange['min'] }}" max="{{ $birthDateRange['max'] }}" dir="ltr"
                     @if ($errors->has('birth_date')) aria-invalid="true" @endif>
              @error('birth_date')<div class="err">{{ $message }}</div>@enderror
            </div>

            <div class="frow">
              <div class="f">
                <label for="allergies">{{ __('account.fields.allergies') }}</label>
                <textarea id="allergies" name="allergies" rows="3" maxlength="500"
                          class="{{ $errors->has('allergies') ? 'is-invalid' : '' }}"
                          @if ($errors->has('allergies')) aria-invalid="true" @endif>{{ old('allergies', $user->allergies) }}</textarea>
                @error('allergies')<div class="err">{{ $message }}</div>@enderror
              </div>

              <div class="f">
                <label for="medications">{{ __('account.fields.medications') }}</label>
                <textarea id="medications" name="medications" rows="3" maxlength="500"
                          class="{{ $errors->has('medications') ? 'is-invalid' : '' }}"
                          @if ($errors->has('medications')) aria-invalid="true" @endif>{{ old('medications', $user->medications) }}</textarea>
                @error('medications')<div class="err">{{ $message }}</div>@enderror
              </div>
            </div>

            @if ($channels->asksPassword())
              <div class="divider-label">{{ __('account.dashboard.password_hint') }}</div>

              <div class="f">
                <label for="current_password">{{ __('account.fields.current_password') }}</label>
                <input type="password" id="current_password" name="current_password" autocomplete="current-password"
                       class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                       @if ($errors->has('current_password')) aria-invalid="true" @endif>
                @error('current_password')<div class="err">{{ $message }}</div>@enderror
              </div>

              <div class="frow">
                <div class="f">
                  <label for="password">{{ __('account.fields.new_password') }}</label>
                  <input type="password" id="password" name="password" autocomplete="new-password" minlength="8"
                         class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                         @if ($errors->has('password')) aria-invalid="true" @endif>
                  @error('password')<div class="err">{{ $message }}</div>@enderror
                </div>

                <div class="f">
                  <label for="password_confirmation">{{ __('account.fields.password_confirm') }}</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                         data-match="password"
                         class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                </div>
              </div>
            @endif

            <button type="submit" class="w-btn">{{ __('account.dashboard.save_profile') }}</button>
          </form>
        </div>
      </section>

      {{-- Body measurements --}}
      <section class="acc-panel {{ $activeTab === 'measurements' ? 'on' : '' }}" id="panel-measurements">
        @include('website.account._measurements')
      </section>

      {{-- Addresses --}}
      <section class="acc-panel {{ $activeTab === 'addresses' ? 'on' : '' }}" id="panel-addresses">
        @forelse ($addresses as $address)
          <div class="card address-card">
            <div class="address-card__head">
              <div>
                <b>{{ $address->label }}</b>
                @if ($address->is_default)
                  <span class="pill active">{{ __('addresses.default') }}</span>
                @endif
              </div>
              <div class="address-card__actions">
                @unless ($address->is_default)
                  <form method="POST" action="{{ route('website.account.addresses.default', $address) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="link-quiet">{{ __('account.dashboard.set_default') }}</button>
                  </form>
                @endunless
                <button type="button" class="link-quiet" data-edit-address="{{ $address->public_id }}">{{ __('account.dashboard.edit_address') }}</button>
                <form method="POST" action="{{ route('website.account.addresses.destroy', $address) }}" onsubmit="return confirm(@json(__('account.dashboard.delete_address').'?'))">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="link-quiet danger">{{ __('account.dashboard.delete_address') }}</button>
                </form>
              </div>
            </div>
            <p class="address-card__body">
              {{ $address->recipient_name }} · <span dir="ltr">{{ $address->phone }}</span><br>
              {{ $address->summary() }}
              @if ($address->national_address)
                <br><span dir="ltr">{{ __('addresses.fields.national_address') }}: {{ $address->national_address }}</span>
              @endif
              @if ($address->details)<br>{{ $address->details }}@endif
            </p>

            <form method="POST" action="{{ route('website.account.addresses.update', $address) }}" class="address-edit" id="edit-{{ $address->public_id }}" hidden data-validate novalidate>
              @csrf
              @method('PUT')
              @include('website.account._address-fields', ['address' => $address])
              <button type="submit" class="w-btn sm">{{ __('account.dashboard.save_profile') }}</button>
            </form>
          </div>
        @empty
          <div class="empty">{{ __('account.dashboard.no_addresses') }}</div>
        @endforelse

        <div class="card">
          <h2><span class="n">+</span>{{ __('account.dashboard.add_address') }}</h2>
          <form method="POST" action="{{ route('website.account.addresses.store') }}" data-validate novalidate>
            @csrf
            @include('website.account._address-fields', ['address' => null])
            <button type="submit" class="w-btn">{{ __('account.dashboard.add_address') }}</button>
          </form>
        </div>
      </section>

      {{-- Subscriptions --}}
      <section class="acc-panel {{ $activeTab === 'subscriptions' ? 'on' : '' }}" id="panel-subscriptions">
        @forelse ($subscriptions as $subscription)
          <div class="pick-row pick-row--actions">
            <a class="pick-row__main" href="{{ route('website.account.subscription', ['subscription' => $subscription->public_id]) }}">
              <div class="body">
                <b>{{ $subscription->plan_name }}</b>
                <small>
                  {{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}
                  · {{ $subscription->created_at?->translatedFormat('d M Y') }}
                </small>
                @if ($subscriptionInvoices->has($subscription->id))
                  <span class="tag">{{ __('account.dashboard.has_invoice') }}</span>
                @endif
              </div>
              <div class="side">
                <span class="pill {{ $subscription->status->value }}">{{ $subscription->status->label() }}</span>
                <span class="amt">{{ $subscription->totalDisplay() }} <x-ui.sar /></span>
              </div>
            </a>
            <div class="pick-row__actions">
              @if ($subscription->status === \App\Modules\Subscriptions\Enums\SubscriptionStatus::Active && $subscription->allowsPause())
                <button type="button"
                        class="w-btn sm ghost"
                        data-open-pause
                        data-pause-action="{{ route('website.account.subscriptions.pause', $subscription) }}"
                        data-pause-name="{{ $subscription->plan_name }}">
                  {{ __('account.subscription.pause_action') }}
                </button>
              @elseif ($subscription->isPaused())
                <button type="button"
                        class="w-btn sm"
                        data-open-resume
                        data-resume-action="{{ route('website.account.subscriptions.resume', $subscription) }}"
                        data-resume-name="{{ $subscription->plan_name }}">
                  {{ __('account.subscription.resume_action') }}
                </button>
              @endif
              <a class="link-quiet" href="{{ route('website.account.subscription', $subscription) }}">{{ __('account.dashboard.view') }}</a>
            </div>
          </div>
        @empty
          <div class="empty">
            {{ __('account.dashboard.no_subscriptions') }}
            <div style="margin-top:14px"><a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a></div>
          </div>
        @endforelse
      </section>

      {{-- Orders --}}
      <section class="acc-panel {{ $activeTab === 'orders' ? 'on' : '' }}" id="panel-orders">
        @forelse ($orders as $order)
          <a class="pick-row" href="{{ route('website.account.order', ['order' => $order->public_id]) }}">
            <div class="body">
              <b>{{ __('account.order.ref') }} #{{ $order->reference() }}</b>
              <small>
                {{ $order->placed_at?->translatedFormat('d M Y') }} · {{ $order->items_count }} {{ __('account.order.items') }}
              </small>
              @if ($orderInvoices->has($order->id))
                <span class="tag">{{ __('account.dashboard.has_invoice') }}</span>
              @endif
            </div>
            <div class="side">
              <span class="pill {{ $order->status->value }}">{{ $order->status->label() }}</span>
              <span class="amt">{{ $order->totalDisplay() }} <x-ui.sar /></span>
            </div>
          </a>
        @empty
          <div class="empty">
            {{ __('account.dashboard.no_orders') }}
            <div style="margin-top:14px"><a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a></div>
          </div>
        @endforelse
      </section>

      {{-- Consultations --}}
      <section class="acc-panel {{ $activeTab === 'consultations' ? 'on' : '' }}" id="panel-consultations">
        @forelse ($consultations as $consultation)
          <div class="pick-row">
            <div class="body">
              <b>{{ __('consultations.fields.reference') }} #{{ $consultation->reference() }}</b>
              <small>{{ $consultation->whenLabel() }}</small>
              @if ($consultation->goal)
                <span class="tag">{{ $consultation->goal }}</span>
              @endif
            </div>
            <div class="side">
              <span class="pill {{ $consultation->status->value }}">{{ $consultation->status->label() }}</span>
            </div>
          </div>
        @empty
          <div class="empty">
            {{ __('account.dashboard.no_consultations') }}
            <div style="margin-top:14px"><a href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a></div>
          </div>
        @endforelse
      </section>
    </div>
  </div>
</div>

@include('website.partials.footer', ['variant' => 'full'])
@include('website.partials.mobile-menu')

@php
  $canPauseAny = $subscriptions->contains(
      fn ($subscription) => $subscription->status === \App\Modules\Subscriptions\Enums\SubscriptionStatus::Active
          && $subscription->allowsPause()
  );
  $canResumeAny = $subscriptions->contains(fn ($subscription) => $subscription->isPaused());
@endphp

@if ($canPauseAny || $errors->has('pause_from'))
{{-- Pause subscription confirm --}}
<div class="acc-modal" id="pauseSubModal" hidden @if ($errors->has('pause_from')) data-auto-open="pause" @endif>
  <div class="acc-modal__backdrop" data-close-modal></div>
  <div class="acc-modal__panel" role="dialog" aria-modal="true" aria-labelledby="pauseSubTitle">
    <div class="acc-modal__head">
      <div>
        <div class="kick">{{ __('account.tabs.subscriptions') }}</div>
        <h3 id="pauseSubTitle">{{ __('account.subscription.pause_action') }}</h3>
      </div>
      <button type="button" class="acc-modal__close" data-close-modal aria-label="{{ __('account.subscription.close_editor') }}">×</button>
    </div>
    <p class="acc-modal__plan" id="pauseSubPlan" hidden></p>

    <div class="alert warn" role="alert">
      {{ __('account.subscription.pause_notice', [
        'days' => $pauseLeadDays,
      ]) }}
    </div>

    <form method="POST" action="{{ old('_pause_action') }}" id="pauseSubForm" class="acc-modal__form">
      @csrf
      <input type="hidden" name="_pause_action" id="pauseSubActionField" value="{{ old('_pause_action') }}">
      <div class="pause-datebar">
        <label class="pause-datebar__label" for="pause_from">{{ __('account.subscription.pause_from') }}</label>
        <div class="pause-datebar__row">
          <input type="date"
                 id="pause_from"
                 name="pause_from"
                 value="{{ old('pause_from', $earliestPauseDate) }}"
                 min="{{ $earliestPauseDate }}"
                 required>
          <button type="submit">{{ __('account.subscription.pause_confirm') }}</button>
        </div>
        @error('pause_from')
          <div class="err">{{ $message }}</div>
        @enderror
      </div>
      <button type="button" class="link-quiet acc-modal__dismiss" data-close-modal>{{ __('account.subscription.modal_cancel') }}</button>
    </form>
  </div>
</div>
@endif

@if ($canResumeAny)
{{-- Resume subscription confirm --}}
<div class="acc-modal" id="resumeSubModal" hidden>
  <div class="acc-modal__backdrop" data-close-modal></div>
  <div class="acc-modal__panel" role="dialog" aria-modal="true" aria-labelledby="resumeSubTitle">
    <div class="acc-modal__head">
      <div>
        <div class="kick">{{ __('account.tabs.subscriptions') }}</div>
        <h3 id="resumeSubTitle">{{ __('account.subscription.resume_action') }}</h3>
      </div>
      <button type="button" class="acc-modal__close" data-close-modal aria-label="{{ __('account.subscription.close_editor') }}">×</button>
    </div>
    <p class="acc-modal__plan" id="resumeSubPlan" hidden></p>
    <div class="alert ok" role="status">{{ __('account.subscription.resume_hint', ['days' => $resumeLeadDays]) }}</div>
    <form method="POST" action="#" id="resumeSubForm" class="acc-modal__form">
      @csrf
      <div class="pause-datebar pause-datebar--resume">
        <button type="submit" class="pause-datebar__solo">{{ __('account.subscription.resume_confirm') }}</button>
      </div>
      <button type="button" class="link-quiet acc-modal__dismiss" data-close-modal>{{ __('account.subscription.modal_cancel') }}</button>
    </form>
  </div>
</div>
@endif
@endsection

@push('scripts')
<script src="{{ asset('js/validation.js') }}" defer></script>
<script>
document.querySelectorAll('[data-edit-address]').forEach(function(btn){
  btn.addEventListener('click',function(){
    var form=document.getElementById('edit-'+btn.getAttribute('data-edit-address'));
    if(form)form.hidden=!form.hidden;
  });
});

(function(){
  var pauseModal=document.getElementById('pauseSubModal');
  var resumeModal=document.getElementById('resumeSubModal');
  var pauseForm=document.getElementById('pauseSubForm');
  var resumeForm=document.getElementById('resumeSubForm');
  var pausePlan=document.getElementById('pauseSubPlan');
  var resumePlan=document.getElementById('resumeSubPlan');
  var pauseActionField=document.getElementById('pauseSubActionField');

  function openModal(modal){
    if(!modal)return;
    modal.hidden=false;
    document.body.classList.add('acc-modal-open');
  }
  function closeModal(modal){
    if(!modal)return;
    modal.hidden=true;
    if((!pauseModal||pauseModal.hidden)&&(!resumeModal||resumeModal.hidden)){
      document.body.classList.remove('acc-modal-open');
    }
  }

  document.querySelectorAll('[data-close-modal]').forEach(function(el){
    el.addEventListener('click',function(){
      closeModal(el.closest('.acc-modal'));
    });
  });

  document.querySelectorAll('[data-open-pause]').forEach(function(btn){
    btn.addEventListener('click',function(){
      var action=btn.getAttribute('data-pause-action');
      var name=btn.getAttribute('data-pause-name')||'';
      if(pauseForm)pauseForm.action=action;
      if(pauseActionField)pauseActionField.value=action;
      if(pausePlan){
        pausePlan.textContent=name;
        pausePlan.hidden=!name;
      }
      openModal(pauseModal);
    });
  });

  document.querySelectorAll('[data-open-resume]').forEach(function(btn){
    btn.addEventListener('click',function(){
      var action=btn.getAttribute('data-resume-action');
      var name=btn.getAttribute('data-resume-name')||'';
      if(resumeForm)resumeForm.action=action;
      if(resumePlan){
        resumePlan.textContent=name;
        resumePlan.hidden=!name;
      }
      openModal(resumeModal);
    });
  });

  document.addEventListener('keydown',function(e){
    if(e.key!=='Escape')return;
    closeModal(pauseModal);
    closeModal(resumeModal);
  });

  if(pauseModal&&pauseModal.getAttribute('data-auto-open')==='pause'){
    var savedAction=pauseActionField&&pauseActionField.value;
    if(savedAction&&pauseForm)pauseForm.action=savedAction;
    openModal(pauseModal);
  }
})();
</script>
@endpush
