@props(['name', 'size' => null])

@php
    $sizeClass = match ($size) {
        'sm' => ' icon--sm',
        'lg' => ' icon--lg',
        default => '',
    };
@endphp

<i data-lucide="{{ $name }}" {{ $attributes->merge(['class' => 'icon' . $sizeClass]) }}></i>
