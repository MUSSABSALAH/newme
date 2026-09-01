@php($rtl = app()->getLocale() === 'ar')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="@yield('theme', '#122B4A')">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="cart-url" content="{{ route('website.cart.store') }}">
<title>@yield('title', __('website.home.title'))</title>
<script>document.documentElement.classList.add('js');</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/website.css') }}">
@stack('styles')
</head>
<body class="@yield('body_class')">
@if (trim($__env->yieldContent('hide_mobile_chrome')) === '')
  @include('website.partials.mobile-chrome')
@endif
@yield('content')
<script src="{{ asset('assets/js/website.js') }}" defer></script>
@stack('scripts')
</body>
</html>
