@props(['variant' => 'full', 'alt' => null])

@php
    $locale = app()->getLocale();
    $file = $locale === 'ar' ? 'logo_ar.png' : 'logo_en.png';
    $alt = $alt ?? __('messages.app.name');
@endphp

<img
    src="{{ asset('assets/images/logos/' . $file) }}"
    alt="{{ $alt }}"
    {{ $attributes->merge(['class' => 'logo logo--' . $variant]) }}
>
