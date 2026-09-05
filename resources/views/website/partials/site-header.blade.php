{{-- Single site header: desktop v30 chrome + mobile top bar / drawer / tab bar. --}}
@php
  $headerActive = trim($__env->yieldContent('header_active'));
  if ($headerActive === '') {
      $headerActive = match (true) {
          request()->routeIs('website.main') => 'home',
          request()->routeIs('website.store', 'website.product', 'website.product.show', 'website.cart') => 'store',
          request()->routeIs('website.subscribe') => 'subscribe',
          request()->routeIs('website.about') => 'about',
          request()->routeIs('website.make') => 'make',
          request()->routeIs('website.blog', 'website.article', 'website.recipe') => 'blog',
          request()->routeIs('website.help') => 'help',
          request()->routeIs('website.terms') => 'terms',
          request()->routeIs('website.menu') => 'menu',
          request()->routeIs('website.consult') => 'consult',
          default => null,
      };
  }
  $showCart = trim($__env->yieldContent('header_cart')) !== '0'
    && ! request()->routeIs('website.subscribe', 'website.menu', 'website.terms', 'website.consult');
@endphp
<div class="v30-desk site-header-desk">
  @include('website.partials.v30-header', [
    'active' => $headerActive,
    'showCart' => $showCart,
  ])
</div>
@include('website.partials.mobile-chrome', [
  'active' => $headerActive,
  'showCart' => $showCart,
])
@once
  @include('website.partials.v30-scripts')
@endonce
