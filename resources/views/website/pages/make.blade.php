@extends('website.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'صناعتنا — نيومي' : 'Our craft — New Me')
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
<style>
@media (max-width: 819.98px) {
  .v30-page { padding: 20px 16px 48px; }
  .v30-page .sec-head { margin-bottom: 20px; }
  .v30-page h1, .v30-page h2 { font-size: 1.6rem; }
  .v30-page .section { padding: 48px 0; }
  .v30-page .steps, .v30-page .specstrip { display: grid; gap: 14px; }
  .v30-page .tcard, .v30-page .spec { background: #fff; border: 1px solid #E8E4DC; border-radius: 16px; padding: 16px; }
}
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page nm-ip">
  <section class="section tile" id="journey">
    <div class="sec-head rv">
      <span class="chapter">الفصل <b>03</b> · صناعتنا</span>
      <span class="kick">صناعتنا</span>
      <h2>من المكوّن — <em>إلى بابك</em></h2>
      <p>أربع مراحل موثّقة تمرّ بها كل تشغيلة قبل أن تصلك.</p>
    </div>
    <div class="wide-hero rv">
      <div class="ph"><svg><use href="#i-bread"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-journey.jpg') }}" alt="توصيل نيومي إلى باب العميل" onerror="this.remove()">
      <div class="wh-in">
        <span class="wh-kick">من المكوّن إلى بابك</span>
        <b>أربع مراحل · تشغيلة واحدة · معيار لا يتغيّر</b>
      </div>
    </div>
    <div class="steps">
      <div class="tcard rv"><span class="n">01</span>
        <span class="ic"><svg class="i"><use href="#i-wheat"/></svg></span>
        <h4>المكوّن</h4>
        <p>بذور الترمس المستوردة من أستراليا وبذور الكتان العضوية، تُطحن لإنتاج الدقيق الصحي الخاص بالشركة.</p>
      </div>
      <div class="tcard rv"><span class="n">02</span>
        <span class="ic"><svg class="i"><use href="#i-bread"/></svg></span>
        <h4>الخَبز والتحضير</h4>
        <p>تُخبز المنتجات وتُحضَّر الوجبات يومياً وفق وصفات ثابتة ومعايير إنتاج منضبطة، ويحمل كل صندوق رقم تشغيلته وتاريخ إنتاجه.</p>
      </div>
      <div class="tcard rv"><span class="n">03</span>
        <span class="ic"><svg class="i"><use href="#i-clipboard"/></svg></span>
        <h4>المعايرة والتوثيق</h4>
        <p>تُراجَع القيم الغذائية لكل وصفة بإشراف خبير التغذية، وتُطبع على بطاقة المنتج قبل خروجه من المصنع.</p>
      </div>
      <div class="tcard rv"><span class="n">04</span>
        <span class="ic"><svg class="i"><use href="#i-box"/></svg></span>
        <h4>التوصيل</h4>
        <p>تُوصَّل الطلبات مبرَّدة عبر شبكة شركاء التوصيل، بسلسلة تبريد متكاملة وتتبّع لحظي للطلب.</p>
      </div>
    </div>
  </section>

  <section class="flourshow" id="flour">
    <div class="fs-banner rv">
      <div class="ph"><svg><use href="#i-wheat"/></svg></div>
      <img class="aiimg" loading="lazy" decoding="async" src="{{ asset('assets/images/v30-flour.jpg') }}" alt="الدقيق الصحي من نيومي داخل المخبز" onerror="this.remove()">
      <div class="fsb-in">
        <span class="kick">الدقيق الصحي</span>
        <h2>ابتكار <em>نيومي</em></h2>
        <p>دقيق صحي مبتكر منخفض النشويات، مصنوع من بذور الترمس وبذور الكتان العضوية — يجمع بين القيمة الغذائية العالية والطعم المتوازن. هو المكوّن الذي تُبنى عليه تشكيلاتنا كافة.</p>
        <span class="fsb-stamp"><b>ملكية خاصة</b><small>مطوَّر داخل الشركة</small></span>
      </div>
    </div>

    <div class="fs-kpis rv">
      <div><b>منخفض</b><span>النشويات</span></div>
      <div><b>عالي</b><span>البروتين والألياف</span></div>
      <div><b>أوميغا-3</b><span>من الكتان العضوي</span></div>
    </div>

    <div class="specstrip rv">
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-wheat"/></svg></span>
        <b>بذور الترمس الأسترالية</b><span>من أغنى المصادر النباتية بالبروتين والألياف، وتسهم في دعم صحة القلب وتنظيم مستوى السكر في الدم.</span></div>
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-drop"/></svg></span>
        <b>بذور الكتان العضوية</b><span>من أفضل المصادر النباتية لأوميغا-3، وتسهم في دعم صحة القلب وتقليل الالتهابات.</span></div>
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-protein"/></svg></span>
        <b>بروتين مرتفع</b><span>داعم للرياضيين ولكل من يسعى إلى زيادة مدخوله البروتيني.</span></div>
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-leaf"/></svg></span>
        <b>ألياف مرتفعة</b><span>تسهم في تحسين الهضم ودعم حركة الأمعاء.</span></div>
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-shield"/></svg></span>
        <b>مضادات الأكسدة</b><span>تسهم في حماية الخلايا من الإجهاد التأكسدي.</span></div>
      <div class="spec"><span class="ic"><svg class="i"><use href="#i-clock"/></svg></span>
        <b>شبع أطول</b><span>يساعد على التحكم في الشهية وتنظيم مستويات السكر في الدم.</span></div>
    </div>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@endsection
