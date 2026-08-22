@props(['title', 'icon' => null])

<div class="dash-section">
    @if ($icon)
        <span class="dash-section__icon"><x-ui.icon :name="$icon" size="sm" /></span>
    @endif
    <h2 class="dash-section__title">{{ $title }}</h2>
</div>
