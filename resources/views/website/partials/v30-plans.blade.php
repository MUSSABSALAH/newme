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
          $kcalValue = (int) ($plan['kcal_value'] ?? 0);
          $kcalFrom = (int) ($plan['kcal_from'] ?? 0);
          $kcalTo = (int) ($plan['kcal_to'] ?? 0);
          $isRange = $kcalFrom > 0 && $kcalTo > 0 && $kcalFrom !== $kcalTo;
          $kcalLow = $isRange ? min($kcalFrom, $kcalTo) : null;
          $kcalHigh = $isRange ? max($kcalFrom, $kcalTo) : null;
          $barHigh = $isRange ? $kcalHigh : max($kcalValue, 0);
          $fuelSpan = min(100, max(8, (int) round(($barHigh / 2000) * 100)));
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
            <div class="pline">
              <span class="kcal-run">
                @if ($isRange)
                  <b>{{ $kcalLow }}</b><span class="kcal-dash">-</span><b>{{ $kcalHigh }}</b>
                @else
                  <b>{{ $kcal }}</b>
                @endif
                <small>kcal</small>
              </span>
            </div>
            <span class="per">{{ __('website.subscribe.daily_target') }}</span>
            <div class="plan-fuel">
              <div class="hd">
                <span class="fuel-lbl">{{ __('website.subscribe.daily_energy') }}</span>
                <span class="kcal-run">
                  @if ($isRange)
                    <b>{{ $kcalLow }}</b><span class="kcal-dash">-</span><b>{{ $kcalHigh }}</b>
                  @else
                    <b>{{ $kcal }}</b>
                  @endif
                  <small>kcal</small>
                </span>
              </div>
              <div class="fuel-bar"><span class="fuel-fill" style="width: {{ $fuelSpan }}%"></span></div>
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
