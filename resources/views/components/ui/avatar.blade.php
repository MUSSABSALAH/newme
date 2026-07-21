@props(['name' => '', 'src' => null, 'size' => 40])

@php
    $initials = collect(explode(' ', trim((string) $name)))
        ->filter()
        ->take(2)
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->implode('');
    $fontSize = (int) round($size / 2.5);
@endphp

<span {{ $attributes->merge(['class' => 'avatar']) }}
      style="width: {{ $size }}px; height: {{ $size }}px; font-size: {{ $fontSize }}px;">
    @if ($src)
        <img src="{{ $src }}" alt="{{ $name }}">
    @else
        {{ $initials !== '' ? $initials : '?' }}
    @endif
</span>
