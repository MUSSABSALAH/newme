{{-- Desktop subscription plan cards from DB — links into the existing wizard. --}}
@php
  $plans = $plans ?? [];
  $isAr = app()->getLocale() === 'ar';
@endphp

<section class="subs" id="subs" style="border-top:1px solid rgba(255,255,255,.12)">
  <div class="inner">
    <div class="sec-head rv">
      <span class="kick">{{ $isAr ? 'الاشتراكات' : 'Subscriptions' }}</span>
      <h2>{!! $isAr ? 'اختر <em style="color:var(--orange-hi)">باقتك</em>' : 'Choose your <em style="color:var(--orange-hi)">plan</em>' !!}</h2>
      <p>{{ $isAr
        ? 'هذه هي الخطوة الأولى — اختر الباقة ثم ننتقل مباشرة لاختيار الوجبات.'
        : 'This is step one — pick your plan, then continue to meals.' }}</p>
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
            <span class="tag">★ {{ $isAr ? 'الأكثر اختياراً' : 'Most popular' }}</span>
          @endif
          <h3>{{ $plan['name'] }}</h3>
          @if (!empty($plan['desc']))
            <div class="goal"><svg class="i"><use href="{{ $icon }}"/></svg> {{ $plan['desc'] }}</div>
          @endif
          @if ($kcal)
            <div class="pline"><b>{{ $kcal }}</b><small>kcal</small></div>
            <span class="per">{{ $isAr ? 'هدف يومي تقريبي' : 'Approx. daily target' }}</span>
            <div class="plan-fuel">
              <div class="hd"><span>{{ $isAr ? 'الطاقة اليومية' : 'Daily energy' }}</span><b>{{ $kcal }} KCAL</b></div>
              <div class="fuel-bar fuel" data-v="{{ $fuel }}" style="--v: {{ $fuel }}%"><i></i></div>
            </div>
          @endif
          <a href="#wizard" class="btn{{ $pop ? '' : ' navy' }} full" data-plan-pick="{{ $plan['key'] }}">
            {{ $isAr ? 'اختر هذه الباقة' : 'Choose this plan' }}
          </a>
        </div>
      @endforeach
    </div>
    @endif

    <div class="sub-guarantee">
      <svg class="i"><use href="#i-shield"/></svg>
      {{ $isAr
        ? 'ضماننا: طلبك الأول على مسؤوليتنا — إن لم يحُز رضاك، نعيد إليك المبلغ كاملاً دون استفسار.'
        : 'First-order guarantee — if you’re not satisfied, we refund in full.' }}
    </div>
    <div class="sub-trust">
      <span><b>✓</b> {{ $isAr ? 'إلغاء أو إيقاف في أي وقت' : 'Cancel anytime' }}</span>
      <span><b>✓</b> {{ $isAr ? 'تبديل الباقة بضغطة' : 'Switch plans easily' }}</span>
      <span><b>✓</b> {{ $isAr ? 'دفع آمن' : 'Secure payment' }}</span>
    </div>
  </div>
</section>
