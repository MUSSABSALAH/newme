@props(['title', 'subtitle' => null])

<div class="page-header">
    <div>
        <h2 class="page-header__title">{{ $title }}</h2>
        @if ($subtitle)
            <p class="page-header__subtitle">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="row">{{ $actions }}</div>
    @endisset
</div>
