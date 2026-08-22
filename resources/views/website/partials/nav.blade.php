@php($active = $active ?? null)
@php($showCart = $showCart ?? false)
<nav class="main">
  <div class="bar">
    @include('website.partials.logo')
    <div class="nav-links">
      <a href="{{ route('website.main') }}#about">{{ __('website.nav.about') }}</a>
      <a href="{{ route('website.main') }}#journey">{{ __('website.nav.journey') }}</a>
      <a href="{{ route('website.store') }}" class="{{ $active === 'store' ? 'on' : '' }}">{{ __('website.nav.store') }}</a>
      <a href="{{ route('website.subscribe') }}" class="{{ $active === 'subscribe' ? 'on' : '' }}">{{ __('website.nav.subscribe') }}</a>
      @if (false)
        <a href="{{ route('website.menu') }}" class="{{ $active === 'menu' ? 'on' : '' }}">{{ __('website.nav.menu') }}</a>
      @endif
      <a href="{{ route('website.blog') }}#articles" class="{{ $active === 'blog' ? 'on' : '' }}">{{ __('website.nav.articles') }}</a>
      <a href="{{ route('website.consult') }}" class="{{ $active === 'consult' ? 'on' : '' }}">{{ __('website.nav.consult') }}</a>
      <a href="{{ route('website.terms') }}" class="{{ $active === 'terms' ? 'on' : '' }}">{{ __('website.nav.terms') }}</a>
    </div>
    <button class="burger" id="mBurger" aria-label="{{ __('website.nav.menu') }}"><svg viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
    @if ($showCart)
      <div class="nav-right">
        @include('website.partials.lang-toggle')
        @include('website.partials.account-link')
        <a href="{{ route('website.cart') }}" class="cart" aria-label="{{ __('website.nav.cart') }}"><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg><i data-cart-count @class(['is-empty' => ($cartCount ?? 0) < 1])>{{ $cartCount ?? 0 }}</i></a>
        <a href="{{ route('website.subscribe') }}" class="w-btn sm">{{ __('website.nav.cta') }}</a>
      </div>
    @else
      <div class="nav-right">
        @include('website.partials.lang-toggle')
        @include('website.partials.account-link')
        <a href="{{ route('website.subscribe') }}" class="nav-cta">{{ __('website.nav.cta') }}</a>
      </div>
    @endif
  </div>
</nav>
