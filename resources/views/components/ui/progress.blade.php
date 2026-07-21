@props(['value' => 0, 'max' => 100, 'label' => null])

@php
    $percent = $max > 0 ? min(100, (int) round(((float) $value / (float) $max) * 100)) : 0;
@endphp

<div {{ $attributes->merge(['class' => 'progress']) }}>
    @if ($label !== null)
        <div class="progress__head">
            <span>{{ $label }}</span>
            <span>{{ $percent }}%</span>
        </div>
    @endif
    <div class="progress__track">
        <div class="progress__bar" style="width: {{ $percent }}%;"></div>
    </div>
</div>
