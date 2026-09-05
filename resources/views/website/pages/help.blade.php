@extends('website.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'الأسئلة الشائعة — نيومي' : 'FAQ — New Me')
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
<style>
@media (max-width: 819.98px) {
  .v30-page { padding: 20px 16px 48px; }
  .v30-page .sec-head { margin-bottom: 20px; }
  .v30-page h1, .v30-page h2 { font-size: 1.6rem; }
  .v30-page .section { padding: 48px 0; }
  .v30-page .faq-wrap { max-width: none; }
  .v30-page .fitem { border-bottom: 1px solid #E8E4DC; }
  .v30-page .consult .in { display: grid; gap: 16px; }
}
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page nm-ip">
  <section class="section alt" id="faq">
    <div class="sec-head rv">
      <span class="kick">الأسئلة الشائعة</span>
      <h2>عندك <em>سؤال؟</em></h2>
    </div>
    <div class="faq-wrap rv">
      <div class="fitem open">
        <button class="fq" type="button">ما نطاق التوصيل؟<span class="x">+</span></button>
        <div class="fa"><p>يوصّل أسطولنا الخاص داخل مدينة الرياض مباشرة. وتتوفر مخبوزاتنا في فروع دايت سنتر بالمنطقة الشرقية ومدينة جدة، وعبر منصات التوصيل الشريكة: جاهز، هنقرستيشن، كيتا، ذا شيفز، نينجا.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">كيف تُحسب القيم الغذائية؟<span class="x">+</span></button>
        <div class="fa"><p>تُعاير كل وصفة بإشراف خبير تغذية متخصص، وتُطبع القيم كاملة — السعرات والبروتين والكربوهيدرات والدهون والألياف وأوميغا-3 — على بطاقة كل منتج، إلى جانب رقم التشغيلة وتاريخ الإنتاج.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">هل يمكن تعديل الاشتراك أو إيقافه؟<span class="x">+</span></button>
        <div class="fa"><p>نعم. يمكنك الترقية أو الإيقاف أو الإلغاء من حسابك مباشرة، دون رسوم أو شروط معقّدة.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">ما الذي يميّز الدقيق الصحي الخاص بنيومي؟<span class="x">+</span></button>
        <div class="fa"><p>هو مكوّن مطوَّر داخلياً من بذور الترمس والكتان العضوية، منخفض النشويات وغني بالبروتين والألياف وأوميغا-3. ويبدأ التميّز من المادة الخام ذاتها، لا من الوصفة وحدها.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">هل منتجاتكم مناسبة لمرضى السكري؟<span class="x">+</span></button>
        <div class="fa"><p>صُمّمت منتجاتنا في المقام الأول لتلبية احتياجات مرضى السكري والسمنة، وتحمل كل عبوة قيمها الغذائية كاملة. ومع ذلك نوصي دائماً بمراجعة الطبيب أو أخصائي التغذية المتابع للحالة قبل تعديل النظام الغذائي.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">متى يُخبز المنتج قبل وصوله؟<span class="x">+</span></button>
        <div class="fa"><p>تُخبز المخبوزات وتُحضَّر الوجبات في اليوم ذاته، وتُوزَّع مبرَّدة ضمن سلسلة تبريد متكاملة. ويحمل كل صندوق رقم تشغيلته وتاريخ إنتاجه.</p></div>
      </div>
      <div class="fitem">
        <button class="fq" type="button">هل تناسب المنتجات نظام الكيتو؟<span class="x">+</span></button>
        <div class="fa"><p>نعم. تشمل التشكيلة خيارات منخفضة جداً في النشويات تناسب متّبعي النظام منخفض الكربوهيدرات، إلى جانب خيارات النظام الصحي العام.</p></div>
      </div>
    </div>
  </section>

  <section class="consult" id="consult">
    <div class="in">
      <div>
        <span class="kick">الاستشارة المجانية</span>
        <h3>لم تحسم اختيارك بعد؟</h3>
        <p>احجز استشارة مجانية مع أخصائي تغذية — حدّد اسمك وتاريخك ووقتك، ونساعدك على اختيار ما يلائم هدفك ونمط يومك.</p>
      </div>
      <a href="{{ route('website.consult') }}" class="btn">احجز استشارتك</a>
    </div>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@push('scripts')
<script>
(function(){
  var first = document.querySelector('.fitem.open .fa');
  if (first) first.style.maxHeight = first.scrollHeight + 'px';
})();
</script>
@endpush
@endsection
