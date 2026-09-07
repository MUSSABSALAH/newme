@php
  $variant = $variant ?? 'full';
  $isAr = app()->getLocale() === 'ar';
  $year = now()->year;
  $phones = preg_split('/\s*[·•|]\s*/u', (string) __('website.site.contact.phone')) ?: [];
  $phones = array_values(array_filter(array_map('trim', $phones)));
@endphp
@once
<style>
footer.w-foot-full.site-footer,
footer.w-foot-simple.site-footer {
  text-align: start !important;
}
footer.w-foot-full.site-footer .f-grid,
footer.w-foot-full.site-footer .f-brand,
footer.w-foot-full.site-footer .f-col,
footer.w-foot-full.site-footer .f-bottom,
footer.w-foot-full.site-footer h4,
footer.w-foot-full.site-footer p,
footer.w-foot-full.site-footer b,
footer.w-foot-full.site-footer a,
footer.w-foot-full.site-footer span,
footer.w-foot-simple.site-footer .flinks,
footer.w-foot-simple.site-footer .legal {
  text-align: start !important;
}
footer.w-foot-full.site-footer .f-brand .logo {
  display: inline-flex;
  justify-content: flex-start;
}
footer.w-foot-full.site-footer .f-phones {
  display: block;
  max-width: 100%;
  line-height: 1.7;
}
footer.w-foot-full.site-footer .f-num,
footer.w-foot-full.site-footer .f-vat-num,
footer.w-foot-full.site-footer .f-web {
  white-space: nowrap;
  display: inline-block;
  max-width: 100%;
}
footer.w-foot-full.site-footer .f-phone-sep {
  display: inline;
  white-space: normal;
}
footer.w-foot-full.site-footer .f-bottom {
  justify-content: space-between !important;
}
footer.w-foot-simple.site-footer .flinks {
  justify-content: flex-start !important;
}
</style>
@endonce
@if ($variant === 'full')
<footer class="w-foot-full site-footer" dir="{{ $isAr ? 'rtl' : 'ltr' }}">
  <div class="f-grid">
    <div class="f-brand">
      @include('website.partials.logo', ['tone' => 'light'])
      <b>{{ __('website.site.contact.tagline') }}</b>
      <p>{{ __('website.site.contact.about') }}</p>
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
      <a href="https://wa.me/966539603302">{{ __('website.site.contact.phone_label') }}</a>
      <span class="f-muted f-phones">
        @foreach ($phones as $i => $phone)
          @if ($i > 0)<span class="f-phone-sep"> · </span>@endif
          <bdi class="f-num" dir="ltr">{{ $phone }}</bdi>
        @endforeach
      </span>
      <a class="f-web" href="https://www.newme.com.sa" dir="ltr" rel="noopener" target="_blank">{{ __('website.site.contact.web') }}</a>
      <a href="{{ route('website.consult') }}">{{ __('website.footer.link_consult') }}</a>
      <span class="f-muted">{{ __('website.site.contact.address') }}</span>
      <a href="https://www.instagram.com/newme.forever" rel="noopener" target="_blank">{{ __('website.site.contact.social_ig') }}</a>
      <a href="https://www.snapchat.com/add/newmeforever20" rel="noopener" target="_blank">{{ __('website.site.contact.social_snap') }}</a>
      <span class="f-muted">{{ __('website.site.contact.vat_label') }} <bdi class="f-vat-num" dir="ltr">{{ __('website.site.contact.vat') }}</bdi></span>
    </div>
  </div>

  <div class="f-bottom">
    <span>{{ __('website.site.contact.copyright', ['year' => $year]) }}</span>
    <span>{{ __('website.site.contact.tagline') }}</span>
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
<footer class="w-foot-simple site-footer" dir="{{ $isAr ? 'rtl' : 'ltr' }}">
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
