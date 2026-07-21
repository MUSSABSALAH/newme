@php
    $items = [
        ['label' => __('messages.nav.dashboard'), 'route' => 'admin.dashboard', 'icon' => 'layout-grid'],
        ['label' => __('messages.nav.users'), 'route' => 'admin.users.index', 'icon' => 'users'],
        ['label' => __('messages.nav.roles'), 'route' => 'admin.roles.index', 'icon' => 'shield-check'],
        ['label' => __('messages.nav.plans'), 'route' => 'admin.plans.index', 'icon' => 'clipboard-list'],
        ['label' => __('messages.nav.meals'), 'route' => 'admin.meals.index', 'icon' => 'utensils'],
        ['label' => __('messages.nav.audit'), 'route' => 'admin.audit.index', 'icon' => 'history'],
        ['label' => __('messages.nav.settings'), 'route' => 'admin.settings.edit', 'icon' => 'settings'],
    ];
@endphp

<aside class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar__brand" aria-label="{{ __('messages.app.name') }}">
        <x-ui.logo variant="mark" />
    </a>

    <nav class="sidebar__nav">
        @foreach ($items as $item)
            @php $active = Route::has($item['route']) && request()->routeIs($item['route']); @endphp
            <a
                href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                class="sidebar__item {{ $active ? 'is-active' : '' }}"
                data-tooltip="{{ $item['label'] }}"
                aria-label="{{ $item['label'] }}"
            >
                <x-ui.icon :name="$item['icon']" />
            </a>
        @endforeach
    </nav>
</aside>
