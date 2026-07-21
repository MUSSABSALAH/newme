@props(['label', 'value', 'unit' => null, 'accent' => 'primary'])

<div {{ $attributes->merge(['class' => 'stat']) }}>
    <div class="stat__top">
        <span class="stat__label">{{ $label }}</span>
        @isset($icon)
            <span class="stat__icon stat__icon--{{ $accent }}">{{ $icon }}</span>
        @endisset
    </div>
    <div>
        <span class="stat__value">{{ $value }}</span>
        @if ($unit)
            <span class="stat__unit">{{ $unit }}</span>
        @endif
    </div>
</div>
