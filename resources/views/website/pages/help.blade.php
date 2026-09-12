@extends('website.layouts.app')

@section('title', __('website.site.faq.title'))
@section('theme', '#122B4A')

@push('styles')
<style>
@media (max-width: 819.98px) {
  .v30-page { padding: 16px 16px 56px; }
  .v30-page .rv { opacity: 1 !important; transform: none !important; }
  .v30-page .sec-head { margin-bottom: 12px; text-align: center; }
  .v30-page h1, .v30-page h2 { font-size: 1.55rem; }
  .v30-page h2 em { font-style: normal; color: #DD6516; }
  .v30-page .kick { display: block; margin-bottom: 6px; }
  .v30-page .section { padding: 24px 0 28px; }
  .v30-page .faq-wrap { max-width: none; padding: 0; margin: 0; }
  .v30-page .fitem { border-bottom: 1px solid #E8E4DC; }
  .v30-page .fq {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 16px 4px;
    text-align: start;
    font-size: 15px;
    font-weight: 900;
    color: #122B4A;
    line-height: 1.45;
    min-height: 52px;
  }
  .v30-page .fq .x {
    color: #DD6516;
    font-size: 22px;
    font-weight: 900;
    flex: none;
    line-height: 1;
    transition: transform .25s ease;
  }
  .v30-page .fitem.open .fq .x { transform: rotate(45deg); }
  .v30-page .fa {
    max-height: 0;
    overflow: hidden;
    transition: max-height .32s ease;
  }
  .v30-page .fitem.open .fa { max-height: 960px; }
  .v30-page .fa p {
    font-size: 13.5px;
    color: #43536A;
    font-weight: 600;
    line-height: 1.9;
    padding: 0 4px 16px;
  }
  .v30-page .consult {
    background: #122B4A;
    color: #fff;
    padding: 28px 16px 32px;
    margin: 8px -16px 0;
    position: relative;
    overflow: hidden;
  }
  .v30-page .consult .in { display: grid; gap: 16px; padding: 0; position: relative; z-index: 2; }
  .v30-page .consult .kick { color: #FFA05C; }
  .v30-page .consult h3 { color: #fff; font-size: 1.25rem; margin: 6px 0 8px; }
  .v30-page .consult p { color: #B9C9E2; font-size: 13.5px; font-weight: 600; line-height: 1.85; margin: 0; }
}
</style>
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page nm-ip">
  <section class="section alt" id="faq">
    <div class="sec-head rv">
      <span class="kick">{{ __('website.site.faq.kick') }}</span>
      <h2>{!! __('website.site.faq.h2') !!}</h2>
    </div>
    <div class="faq-wrap rv">
      @foreach (__('website.site.faq.items') as $i => $item)
      <div class="fitem{{ $i === 0 ? ' open' : '' }}">
        <button class="fq" type="button">{{ $item['q'] }}<span class="x">+</span></button>
        <div class="fa"><p>{{ $item['a'] }}</p></div>
      </div>
      @endforeach
    </div>
  </section>

  <section class="consult" id="consult">
    <div class="in">
      <div>
        <span class="kick">{{ __('website.footer.link_consult') }}</span>
        <h3>{{ __('website.main.consult.title') }}</h3>
        <p>{{ __('website.main.consult.text') }}</p>
      </div>
      <a href="{{ route('website.consult') }}" class="btn">{{ __('website.main.consult.cta') }}</a>
    </div>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@push('scripts')
<script>
(function(){
  function sizeOpen(){
    document.querySelectorAll('#faq .fitem').forEach(function(item){
      var ans = item.querySelector('.fa');
      if (!ans) return;
      if (item.classList.contains('open')) {
        ans.style.maxHeight = 'none';
        ans.style.maxHeight = ans.scrollHeight + 'px';
      } else {
        ans.style.maxHeight = '0px';
      }
    });
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', sizeOpen);
  } else {
    sizeOpen();
  }
  window.addEventListener('load', sizeOpen);
})();
</script>
@endpush
@endsection
