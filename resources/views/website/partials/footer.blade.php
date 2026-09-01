@php($variant = $variant ?? 'simple')
@if ($variant === 'full')
<footer class="w-foot-full">
  <div class="f-grid">
    <div class="f-news">
      <div style="margin-bottom:14px">@include('website.partials.logo', ['tone' => 'light'])</div>
      <p class="f-about">{!! __('website.footer.about') !!}</p>
    </div>
    <div class="f-col">
      <h4>{{ __('website.footer.sections_title') }}</h4>
      <a href="{{ route('website.main') }}#about">{{ __('website.nav.about') }}</a>
      <a href="{{ route('website.main') }}#journey">{{ __('website.nav.journey') }}</a>
      <a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
      <a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
    </div>
    <div class="f-col">
      <h4>{{ __('website.footer.content_title') }}</h4>
      <a href="{{ route('website.blog') }}#articles">{{ __('website.footer.health_articles') }}</a>
      <a href="{{ route('website.blog') }}#recipes">{{ __('website.footer.recipes') }}</a>
      <a href="{{ route('website.menu') }}">{{ __('website.nav.menu') }}</a>
      <a href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a>
    </div>
    <div class="f-col">
      <h4>{{ __('website.footer.contact_title') }}</h4>
      <a href="https://wa.me/966533360317">{{ __('website.footer.whatsapp') }} 966533360317+</a>
      <a href="mailto:info@newmeforever.com">{{ __('website.footer.email') }}</a>
      <a href="{{ route('website.terms') }}">{{ __('website.nav.terms_full') }}</a>
    </div>
  </div>
  <div class="f-bottom">
    <span>{{ __('website.footer.copyright') }}</span>
    <span>{{ __('website.footer.tagline') }}</span>
  </div>
</footer>
@else
<footer class="w-foot-simple">
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
