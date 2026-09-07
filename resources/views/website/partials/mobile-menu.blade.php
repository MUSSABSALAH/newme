<div class="mmenu" id="mmenu">
  <button class="mclose" aria-label="{{ __('website.menu.close') }}">×</button>
  <div class="mkick">{{ __('website.menu.kick') }}</div>
  <a class="mlink" href="{{ route('website.main') }}">{{ __('website.site.nav.home') }}</a>
  <a class="mlink" href="{{ route('website.about') }}">{{ __('website.site.nav.about') }}</a>
  <a class="mlink" href="{{ route('website.make') }}">{{ __('website.site.nav.make') }}</a>
  <a class="mlink" href="{{ route('website.blog') }}">{{ __('website.site.nav.kitchen') }}</a>
  <a class="mlink" href="{{ route('website.store') }}">{{ __('website.site.nav.store') }}</a>
  <a class="mlink" href="{{ route('website.subscribe') }}">{{ __('website.site.nav.subscribe') }}</a>
  <a class="mlink" href="{{ route('website.help') }}">{{ __('website.site.nav.faq') }}</a>
  <a class="mlink" href="{{ route('website.terms') }}">{{ __('website.site.nav.terms') }}</a>
  @if (auth()->check() && auth()->user()->isCustomer())
    <a class="mlink" href="{{ route('website.account') }}">{{ __('account.nav.account') }}</a>
  @else
    <a class="mlink" href="{{ route('website.login') }}">{{ __('account.nav.login') }}</a>
    <a class="mlink" href="{{ route('website.register') }}">{{ __('account.register.submit') }}</a>
    @unless (app(\App\Modules\Identity\Support\CustomerAuthChannels::class)->otpEnabled())
      <a class="mlink" href="{{ route('website.password.request') }}">{{ __('account.login.forgot') }}</a>
    @endunless
  @endif
  <a class="mcta" href="{{ route('website.subscribe') }}">{{ __('website.menu.cta') }}</a>
  @include('website.partials.lang-toggle')
  <div class="mfoot">{{ __('website.menu.foot') }} <a href="https://wa.me/966539603302" style="color:#FFA05C">+966 53 960 3302</a></div>
</div>
