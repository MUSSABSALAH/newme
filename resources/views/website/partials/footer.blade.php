@php
  $variant = $variant ?? 'full';
  $isAr = app()->getLocale() === 'ar';
  $year = now()->year;
@endphp
@if ($variant === 'full')
<footer class="w-foot-full site-footer">
  <div class="f-grid">
    <div class="f-brand">
      @include('website.partials.logo', ['tone' => 'light'])
      <b>{{ __('website.footer.brand_title') }}</b>
      <p>{{ __('website.footer.brand_text') }}</p>
    </div>

    <div class="f-col">
      <h4>{{ __('website.footer.company_title') }}</h4>
      <a href="{{ route('website.about') }}">{{ __('website.footer.link_about') }}</a>
      <a href="{{ route('website.about') }}#about">{{ __('website.footer.link_story') }}</a>
      <a href="{{ route('website.terms') }}">{{ __('website.footer.link_terms') }}</a>
      <a href="{{ route('website.terms') }}#returns">{{ __('website.footer.link_returns') }}</a>
      <a href="{{ route('website.terms') }}#privacy">{{ __('website.footer.link_privacy') }}</a>
    </div>

    <div class="f-col">
      <h4>{{ __('website.footer.products_title') }}</h4>
      <a href="{{ route('website.store') }}">{{ __('website.footer.link_bakery') }}</a>
      <a href="{{ route('website.store') }}">{{ __('website.footer.link_support') }}</a>
      <a href="{{ route('website.subscribe') }}">{{ __('website.footer.link_subs') }}</a>
    </div>

    <div class="f-col">
      <h4>{{ __('website.footer.content_title') }}</h4>
      <a href="{{ route('website.blog') }}">{{ __('website.footer.link_articles') }}</a>
      <a href="{{ route('website.blog') }}#recipes">{{ __('website.footer.recipes') }}</a>
      <a href="{{ route('website.make') }}">{{ __('website.footer.link_craft') }}</a>
      <a href="{{ route('website.help') }}">{{ __('website.footer.link_faq') }}</a>
    </div>

    <div class="f-col">
      <h4>{{ __('website.footer.contact_title') }}</h4>
      <a href="https://wa.me/966539603302" dir="ltr">{{ __('website.footer.whatsapp') }} +966539603302</a>
      <a href="tel:+966532406566" dir="ltr">+966532406566</a>
      <a href="https://newmeksa.com" dir="ltr" rel="noopener" target="_blank">newmeksa.com</a>
      <a href="{{ route('website.consult') }}">{{ __('website.footer.link_consult') }}</a>
      <span class="f-muted">{{ __('website.footer.address') }}</span>
      <a href="https://www.instagram.com/newme.forever" rel="noopener" target="_blank">{{ __('website.footer.social_ig') }}</a>
      <a href="https://www.snapchat.com/add/newmeforever20" rel="noopener" target="_blank">{{ __('website.footer.social_snap') }}</a>
    </div>
  </div>

  <div class="f-bottom">
    <span>{{ __('website.footer.copyright', ['year' => $year]) }}</span>
    <span>{{ __('website.footer.tagline') }}</span>
  </div>
</footer>

@once
<button type="button" class="totop" id="totop" aria-label="{{ $isAr ? 'أعلى الصفحة' : 'Back to top' }}">
  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>
@push('scripts')
<script>
(function(){
  var btn=document.getElementById('totop');
  if(!btn)return;
  function sync(){btn.classList.toggle('show', window.scrollY>480);}
  window.addEventListener('scroll',sync,{passive:true});
  sync();
  btn.addEventListener('click',function(){window.scrollTo({top:0,behavior:'smooth'});});
})();
</script>
@endpush
@endonce
@else
<footer class="w-foot-simple">
  <div class="flinks">
    <a href="{{ route('website.main') }}">{{ __('website.footer.home') }}</a>
    <a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
    <a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
    <a href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a>
    <a href="https://wa.me/966539603302">{{ __('website.footer.whatsapp') }}</a>
  </div>
  <div class="legal">{!! __('website.footer.legal') !!}</div>
</footer>
@endif
