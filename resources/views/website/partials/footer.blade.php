@php
  $variant = $variant ?? 'full';
  $isAr = app()->getLocale() === 'ar';
  $year = now()->year;
  $phones = preg_split('/\s*[·•|]\s*/u', (string) __('website.site.contact.phone')) ?: [];
  $phones = array_values(array_filter(array_map('trim', $phones)));
  $socialHandle = __('website.site.contact.social_handle');
  $linkedinUrl = trim((string) __('website.site.contact.social_linkedin_url'));
  $socials = [
    ['url' => 'https://wa.me/966533360317', 'aria' => __('website.site.contact.social_whatsapp_aria'), 'icon' => 'whatsapp'],
    ['url' => 'https://www.instagram.com/'.$socialHandle, 'aria' => __('website.site.contact.social_instagram_aria', ['handle' => $socialHandle]), 'icon' => 'instagram'],
    ['url' => 'https://www.tiktok.com/@'.$socialHandle, 'aria' => __('website.site.contact.social_tiktok_aria', ['handle' => $socialHandle]), 'icon' => 'tiktok'],
    ['url' => 'https://www.snapchat.com/add/'.$socialHandle, 'aria' => __('website.site.contact.social_snapchat_aria', ['handle' => $socialHandle]), 'icon' => 'snapchat'],
    ['url' => 'https://x.com/'.$socialHandle, 'aria' => __('website.site.contact.social_x_aria', ['handle' => $socialHandle]), 'icon' => 'x'],
    ['url' => $linkedinUrl !== '' ? $linkedinUrl : route('website.main'), 'aria' => __('website.site.contact.social_linkedin_aria'), 'icon' => 'linkedin'],
  ];
@endphp
@once
<style>
footer.w-foot-full.site-footer,
footer.w-foot-simple.site-footer {
  text-align: start !important;
  font-family: 'Cairo', Tahoma, Arial, sans-serif;
}
footer.site-footer a,
footer.site-footer a:hover,
footer.site-footer a:focus,
footer.site-footer a:active,
footer.site-footer a:visited {
  text-decoration: none !important;
  border-bottom: none !important;
}
html[lang="ar"] footer.site-footer,
html[lang="ar"] footer.site-footer h4,
html[lang="ar"] footer.site-footer p,
html[lang="ar"] footer.site-footer b,
html[lang="ar"] footer.site-footer a,
html[lang="ar"] footer.site-footer span,
html[lang="ar"] footer.site-footer .legal {
  font-family: 'Cairo', Tahoma, Arial, sans-serif !important;
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
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 2px;
  max-width: 100%;
  line-height: 1.7;
}
footer.w-foot-full.site-footer .f-num,
footer.w-foot-full.site-footer .f-vat-num {
  white-space: nowrap;
  display: inline-block;
  max-width: 100%;
}
footer.w-foot-full.site-footer .f-bottom {
  justify-content: space-between !important;
}
footer.w-foot-simple.site-footer .flinks {
  justify-content: flex-start !important;
}
footer.w-foot-full.site-footer .f-social {
  margin-top: 4px;
}
footer.w-foot-full.site-footer .f-social-label {
  display: block;
  margin-bottom: 8px;
}
footer.w-foot-full.site-footer .f-social-icons {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 8px;
}
footer.w-foot-full.site-footer .f-social-icons a {
  display: inline-grid;
  place-items: center;
  width: 38px;
  height: 38px;
  padding: 0 !important;
  border-radius: 999px;
  border: 1px solid rgba(255,255,255,.16);
  color: #C7D6EC;
  background: rgba(255,255,255,.04);
  transition: color .2s, border-color .2s, background .2s, transform .2s;
}
footer.w-foot-full.site-footer .f-social-icons a:hover {
  color: #fff;
  border-color: #F07F2D;
  background: rgba(240,127,45,.14);
  transform: translateY(-1px);
}
footer.w-foot-full.site-footer .f-social-icons svg {
  width: 18px;
  height: 18px;
  display: block;
}
footer.w-foot-full.site-footer .f-social-icons a[data-net="snapchat"] svg {
  width: 20px;
  height: 20px;
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
      <a href="https://wa.me/966533360317">{{ __('website.site.contact.phone_label') }}</a>
      <span class="f-muted f-phones">
        @foreach ($phones as $phone)
          <bdi class="f-num" dir="ltr">{{ $phone }}</bdi>
        @endforeach
      </span>
      <a href="{{ route('website.consult') }}">{{ __('website.footer.link_consult') }}</a>
      <span class="f-muted">{{ __('website.site.contact.address') }}</span>
      <div class="f-social">
        <span class="f-muted f-social-label">{{ __('website.site.contact.social_label') }}</span>
        <div class="f-social-icons">
          @foreach ($socials as $social)
          <a href="{{ $social['url'] }}" rel="noopener noreferrer" target="_blank" aria-label="{{ $social['aria'] }}"@if($social['icon'] === 'snapchat') data-net="snapchat"@endif>
            @if ($social['icon'] === 'whatsapp')
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.04 0C5.5 0 .16 5.33.16 11.88c0 2.1.55 4.14 1.6 5.95L0 24l6.3-1.65a11.9 11.9 0 0 0 5.73 1.46h.01c6.54 0 11.88-5.33 11.88-11.88 0-3.17-1.24-6.16-3.4-8.45zM12.04 21.8h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.74.98 1-3.64-.24-.37a9.86 9.86 0 0 1-1.51-5.3C2.14 6.44 6.59 2 12.04 2c2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.98c0 5.45-4.44 9.92-9.88 9.92zm5.43-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.06 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35z"/></svg>
            @elseif ($social['icon'] === 'instagram')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
            @elseif ($social['icon'] === 'tiktok')
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
            @elseif ($social['icon'] === 'snapchat')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c3.7 0 6.4 3.2 6.4 7.3c0 1.5-.2 2.6.9 3.2c.9.5 1.5 1.1 1.5 2c0 1.3-1.8 2-4 2.4c-.5 1.5-2.3 3.1-4.8 3.1s-4.3-1.6-4.8-3.1c-2.2-.4-4-1.1-4-2.4c0-.9.6-1.5 1.5-2c1.1-.6.9-1.7.9-3.2C5.6 6.2 8.3 3 12 3z"/></svg>
            @elseif ($social['icon'] === 'linkedin')
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.73V1.73C24 .77 23.21 0 22.23 0z"/></svg>
            @else
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.451-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
            @endif
          </a>
          @endforeach
        </div>
      </div>
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
    <a href="https://wa.me/966533360317">{{ __('website.footer.whatsapp') }}</a>
  </div>
  <div class="legal">{!! __('website.footer.legal') !!}</div>
</footer>
@endif
