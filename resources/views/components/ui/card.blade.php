@props(['title' => null, 'variant' => 'light'])

<div {{ $attributes->merge(['class' => 'card' . ($variant !== 'light' ? ' card--' . $variant : '')]) }}>
    @if ($title || isset($actions))
        <div class="card__header">
            <div class="card__title">{{ $title }}</div>
            @isset($actions)
                <div class="row">{{ $actions }}</div>
            @endisset
        </div>
    @endif

    {{ $slot }}
</div>
