{{-- Desktop subscription plan cards from DB — links into the existing wizard. --}}
@php
  $plans = $plans ?? [];
@endphp

<section class="subs" id="subs" style="border-top:1px solid rgba(255,255,255,.12)">
  <div class="inner">
    <div class="sec-head rv">
      <span class="kick">{{ __('website.subscribe.kick') }}</span>
      <h2>{!! __('website.subscribe.heading') !!}</h2>
      <p>{{ __('website.subscribe.lead') }}</p>
    </div>

    @if (count($plans) > 0)
    <div class="sub-grid">
      @foreach ($plans as $i => $plan)
        @php
          $pop = !empty($plan['pop']);
          $icon = '#'.($plan['icon'] ?? 'i-target');
          $kcal = $plan['kcal'] ?? null;
          $fuel = $kcal ? min(100, (int) round(((int) $kcal / 2000) * 100)) : 40;
        @endphp
        <div class="splan rv{{ $pop ? ' pop' : '' }}">
          @if ($pop)
            <span class="tag">{{ __('website.subscribe.most_chosen') }}</span>
          @endif
          <h3>{{ $plan['name'] }}</h3>
          @if (!empty($plan['hook']))
            <div class="goal"><svg class="i"><use href="{{ $icon }}"/></svg> {{ $plan['hook'] }}</div>
          @endif
          @if (!empty($plan['desc']))
            <p class="splan-lead">{{ $plan['desc'] }}</p>
          @endif
          @if ($kcal)
            <div class="pline"><b>{{ $kcal }}</b><small>kcal</small></div>
            <span class="per">{{ __('website.subscribe.daily_target') }}</span>
            <div class="plan-fuel">
              <div class="hd"><span>{{ __('website.subscribe.daily_energy') }}</span><b>{{ $kcal }} KCAL</b></div>
              <div class="fuel-bar fuel" data-v="{{ $fuel }}" style="--v: {{ $fuel }}%"><i></i></div>
            </div>
          @endif
          <a href="#wizard" class="btn{{ $pop ? '' : ' navy' }} full" data-plan-pick="{{ $plan['key'] }}">
            {{ __('website.subscribe.choose_plan') }}
          </a>
        </div>
      @endforeach
    </div>
    @endif

    <div class="sub-trust">
      <span><b>✓</b> {{ __('website.subscribe.trust.cancel') }}</span>
      <span><b>✓</b> {{ __('website.subscribe.trust.switch') }}</span>
      <span><b>✓</b> {{ __('website.subscribe.trust.pay') }}</span>
    </div>
  </div>
</section>
