@php
  $active = $active ?? null;
  $showCart = $showCart ?? false;
  $links = [
    'home' => ['route' => 'website.main', 'label' => __('website.site.nav.home')],
    'about' => ['route' => 'website.about', 'label' => __('website.site.nav.about')],
    'make' => ['route' => 'website.make', 'label' => __('website.site.nav.make')],
    'blog' => ['route' => 'website.blog', 'label' => __('website.site.nav.kitchen')],
    'store' => ['route' => 'website.store', 'label' => __('website.site.nav.store')],
    'subscribe' => ['route' => 'website.subscribe', 'label' => __('website.site.nav.subscribe')],
    'help' => ['route' => 'website.help', 'label' => __('website.site.nav.faq')],
    'terms' => ['route' => 'website.terms', 'label' => __('website.site.nav.terms')],
  ];
@endphp
<nav class="main">
  <div class="bar">
    @include('website.partials.logo')
    <div class="nav-links">
      @foreach ($links as $key => $link)
        <a href="{{ route($link['route']) }}" @class(['active' => $active === $key])>{{ $link['label'] }}</a>
      @endforeach
    </div>
    <div class="nav-right">
      @include('website.partials.lang-toggle')
      @include('website.partials.account-link')
      @if ($showCart)
        <a href="{{ route('website.cart') }}" class="cart" aria-label="{{ __('website.nav.cart') }}">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4h2.4L8 15h10l2.2-8H6"/><circle cx="9.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/><circle cx="16.5" cy="19.5" r="1.6" fill="currentColor" stroke="none"/></svg>
          <i data-cart-count @class(['is-empty' => ($cartCount ?? 0) < 1])>{{ $cartCount ?? 0 }}</i>
        </a>
      @endif
      <a href="{{ route('website.subscribe') }}" class="btn sm">{{ __('website.site.nav.cta') }}</a>
    </div>
  </div>
</nav>
