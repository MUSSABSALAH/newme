@props(['label' => true])

<span
    {{ $attributes->merge(['class' => 'icon-saudi-riyal']) }}
    @if ($label)
        role="img"
        aria-label="SAR"
    @else
        aria-hidden="true"
    @endif
></span>
