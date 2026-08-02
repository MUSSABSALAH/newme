@props(['variant' => 'full', 'alt' => null, 'href' => null, 'tone' => 'dark'])

@php
    $locale = app()->getLocale();
    $tone = in_array($tone, ['dark', 'light'], true) ? $tone : 'dark';
    // light = dark page backgrounds → white logo; dark = light page backgrounds → dark logo
    $file = $tone === 'light'
        ? ($locale === 'ar' ? 'white_logo_ar.png' : 'white_logo_en.png')
        : ($locale === 'ar' ? 'logo_ar.png' : 'logo_en.png');
    $alt = $alt ?? __('website.brand');
    $href = $href ?? route('website.main');
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'logo logo--'.$variant.' logo--'.$tone]) }}>
    <img
        src="{{ asset('assets/images/logos/'.$file) }}"
        alt="{{ $alt }}"
        class="logo__img"
        width="140"
        height="40"
    >
</a>
