@php
  $active = $active ?? null;
  $showCart = $showCart ?? false;
  $isAr = app()->getLocale() === 'ar';
  $links = [
    'home' => ['route' => 'website.main', 'label' => $isAr ? 'الرئيسة' : 'Home'],
    'store' => ['route' => 'website.store', 'label' => $isAr ? 'المتجر' : __('website.nav.store')],
    'make' => ['route' => 'website.make', 'label' => $isAr ? 'صناعتنا' : 'Our craft'],
    'subscribe' => ['route' => 'website.subscribe', 'label' => $isAr ? 'الاشتراكات' : __('website.nav.subscribe')],
    'about' => ['route' => 'website.about', 'label' => $isAr ? 'عن نيومي' : __('website.nav.about')],
    'blog' => ['route' => 'website.blog', 'label' => $isAr ? 'مطبخنا' : __('website.nav.articles')],
    'help' => ['route' => 'website.help', 'label' => $isAr ? 'الأسئلة' : 'FAQ'],
    'terms' => ['route' => 'website.terms', 'label' => $isAr ? 'الشروط' : __('website.nav.terms')],
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
      <a href="{{ route('website.subscribe') }}" class="btn sm">{{ $isAr ? 'ابدأ اشتراكك' : __('website.nav.cta') }}</a>
    </div>
  </div>
</nav>
