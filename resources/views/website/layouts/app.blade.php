@php
  $rtl = app()->getLocale() === 'ar';
  $siteCss = [];
  foreach (['website.css', 'website-v30.css', 'website-iphone.css'] as $cssFile) {
      $siteCss[$cssFile] = \App\Support\VersionedAsset::url('assets/css/'.$cssFile);
  }
  $siteJs = \App\Support\VersionedAsset::url('assets/js/website.js');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="@yield('theme', '#122B4A')">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="cart-url" content="{{ route('website.cart.store') }}">
<title>@yield('title', __('website.home.title'))</title>
@include('partials.favicons')
<script>document.documentElement.classList.add('js');</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ $siteCss['website.css'] }}">
<link rel="stylesheet" href="{{ $siteCss['website-v30.css'] }}">
<link rel="stylesheet" href="{{ $siteCss['website-iphone.css'] }}">
@stack('styles')
<style>
@media (max-width: 1179.98px) {
  :root {
    --font: 'Cairo', Tahoma, Arial, sans-serif;
    --w-font: 'Cairo', Tahoma, Arial, sans-serif;
    --mono: 'Cairo', Tahoma, Arial, sans-serif;
    --w-mono: 'Cairo', Tahoma, Arial, sans-serif;
  }
  html,
  body,
  .nm-ip,
  .nm-chrome,
  .nm-tabbar,
  .nm-tabbar .tab,
  .v30-mob-only {
    font-family: 'Cairo', Tahoma, Arial, sans-serif;
  }
}
</style>
@if ($rtl)
<style>
html[lang="ar"]{
  --font:'Cairo',Tahoma,Arial,sans-serif;
  --w-font:'Cairo',Tahoma,Arial,sans-serif;
  --mono:'Cairo',Tahoma,Arial,sans-serif;
  --w-mono:'Cairo',Tahoma,Arial,sans-serif;
  font-family:'Cairo',Tahoma,Arial,sans-serif;
}
html[lang="ar"] body,
html[lang="ar"] button,
html[lang="ar"] input,
html[lang="ar"] textarea,
html[lang="ar"] select{
  font-family:'Cairo',Tahoma,Arial,sans-serif;
}
html[lang="ar"] .kick,
html[lang="ar"] .mkick,
html[lang="ar"] .eh-kick,
html[lang="ar"] .dp-kick,
html[lang="ar"] .wh-kick,
html[lang="ar"] .mmenu .mkick,
html[lang="ar"] .closing .tag,
html[lang="ar"] .chapter,
html[lang="ar"] .toc h3,
html[lang="ar"] .thero .kick,
html[lang="ar"] .tnote,
html[lang="ar"] .meta .cat,
html[lang="ar"] .p-flag,
html[lang="ar"] .flag,
html[lang="ar"] .kchip,
html[lang="ar"] .kit-rbox h2,
html[lang="ar"] .step .n,
html[lang="ar"] .cohead .kick,
html[lang="ar"] .copy .kick,
html[lang="ar"] .mono{
  font-family:'Cairo',Tahoma,Arial,sans-serif !important;
  letter-spacing:0 !important;
  text-transform:none !important;
}
</style>
@endif
</head>
<body class="@yield('body_class')">
@if (trim($__env->yieldContent('hide_site_header')) === '')
  @include('website.partials.site-header')
@endif
@yield('content')
@if (trim($__env->yieldContent('hide_site_footer')) === '')
  @include('website.partials.footer', ['variant' => 'full'])
@endif
@php
  $nmI18n = [
      'cartAdded' => __('website.cart.added'),
      'cartView' => __('website.cart.view'),
      'cartUrl' => route('website.cart'),
  ];
@endphp
<script>
window.NM_I18N = @json($nmI18n);
window.nmStoreLineGroups = @json(\App\Modules\Store\Support\StoreCatalogLines::groups());
</script>
<script src="{{ $siteJs }}" defer></script>
@stack('scripts')
</body>
</html>
