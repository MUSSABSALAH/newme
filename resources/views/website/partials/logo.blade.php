@props(['variant' => 'full', 'alt' => null, 'href' => null, 'showText' => false])

@php
    $locale = app()->getLocale();
    $file = $locale === 'ar' ? 'ar-logo.png' : 'en-logo.png';
    $alt = $alt ?? __('website.brand');
    $href = $href ?? route('website.main');
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'logo logo--' . $variant]) }}>
    <img
        src="{{ asset('assets/images/logos/' . $file) }}"
        alt="{{ $alt }}"
        class="logo__img"
        width="140"
        height="40"
    >
    @if ($showText)
        <b>{{ __('website.brand') }}</b>
    @endif
</a>
