@props(['title' => 'New Me Admin'])

@php
    $locale = app()->getLocale();
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
@endphp

<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    @include('partials.favicons')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @php($assetVersion = static fn (string $path): string => asset($path).'?v='.(@filemtime(public_path($path)) ?: '1'))
    <link rel="stylesheet" href="{{ $assetVersion('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ $assetVersion('js/app.js') }}" defer></script>
    <script src="{{ $assetVersion('js/validation.js') }}" defer></script>
    <script src="{{ $assetVersion('js/confirm.js') }}" defer></script>
    @stack('styles')
</head>
<body>
    {{ $slot }}

    <script src="{{ asset('js/vendor/lucide.min.js') }}"></script>
    <script>
        window.lucide && window.lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>
