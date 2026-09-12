@php
  $rtl = app()->getLocale() === 'ar';
  $siteCss = [];
  foreach (['website.css', 'website-v30.css', 'website-iphone.css'] as $cssFile) {
      $cssPath = 'assets/css/'.$cssFile;
      $version = is_file(public_path($cssPath)) ? filemtime(public_path($cssPath)) : time();
      $siteCss[$cssFile] = asset($cssPath).'?v='.$version;
  }
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
@media (max-width: 819.98px) {
  :root {
    --font: 'Cairo', Tahoma, Arial, sans-serif;
    --w-font: 'Cairo', Tahoma, Arial, sans-serif;
    --mono: 'Cairo', Tahoma, Arial, sans-serif;
    --w-mono: 'Cairo', Tahoma, Arial, sans-serif;
  }
  html[lang="ar"],
  html[lang="ar"] body,
  html[lang="ar"] button,
  html[lang="ar"] input,
  html[lang="ar"] textarea,
  html[lang="ar"] select,
  html[lang="ar"] .nm-ip,
  html[lang="ar"] .nm-chrome,
  html[lang="ar"] .v30-mob-only {
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
<script src="{{ asset('assets/js/website.js') }}" defer></script>
@stack('scripts')
</body>
</html>
