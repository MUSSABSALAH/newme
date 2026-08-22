<div class="mmenu" id="mmenu">
  <button class="mclose" aria-label="{{ __('website.menu.close') }}">×</button>
  <div class="mkick">{{ __('website.menu.kick') }}</div>
  <a class="mlink" href="{{ route('website.main') }}#about">{{ __('website.nav.about') }}</a>
  <a class="mlink" href="{{ route('website.main') }}#journey">{{ __('website.nav.journey') }}</a>
  <a class="mlink" href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
  <a class="mlink" href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
  @if (false)
    <a class="mlink" href="{{ route('website.menu') }}">{{ __('website.nav.menu') }}</a>
  @endif
  <a class="mlink" href="{{ route('website.blog') }}#articles">{{ __('website.nav.articles') }}</a>
  <a class="mlink" href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a>
  <a class="mlink" href="{{ route('website.terms') }}">{{ __('website.nav.terms_full') }}</a>
  @auth
    @if (auth()->user()->isCustomer())
      <a class="mlink" href="{{ route('website.account') }}">{{ __('account.nav.account') }}</a>
    @endif
  @else
    <a class="mlink" href="{{ route('website.login') }}">{{ __('account.nav.login') }}</a>
    <a class="mlink" href="{{ route('website.register') }}">{{ __('account.register.submit') }}</a>
    @unless (app(\App\Modules\Identity\Support\CustomerAuthChannels::class)->otpEnabled())
      <a class="mlink" href="{{ route('website.password.request') }}">{{ __('account.login.forgot') }}</a>
    @endunless
  @endauth
  <a class="mcta" href="{{ route('website.subscribe') }}">{{ __('website.menu.cta') }}</a>
  @include('website.partials.lang-toggle')
  <div class="mfoot">{{ __('website.menu.foot') }} <a href="https://wa.me/966533360317" style="color:#FFA05C">+966 53 336 0317</a></div>
</div>
