@php
    /**
     * The rail is icon-only, so anything nested lives in a flyout panel that
     * opens beside the trigger. Groups keep the rail short as sections grow.
     */
    $groups = [
        [
            'label' => __('messages.nav.dashboard'),
            'icon' => 'layout-grid',
            'route' => 'admin.dashboard',
        ],
        [
            'label' => __('messages.nav.groups.catalog'),
            'icon' => 'shopping-bag',
            'items' => [
                ['label' => __('messages.nav.orders'), 'route' => 'admin.orders.index', 'icon' => 'package'],
                ['label' => __('messages.nav.products'), 'route' => 'admin.products.index', 'icon' => 'shopping-bag'],
                ['label' => __('messages.nav.categories'), 'route' => 'admin.categories.index', 'icon' => 'folder-tree'],
                ['label' => __('messages.nav.coupons'), 'route' => 'admin.coupons.index', 'icon' => 'ticket-percent'],
            ],
        ],
        [
            'label' => __('messages.nav.groups.subscriptions'),
            'icon' => 'calendar-check',
            'items' => [
                ['label' => __('messages.nav.subscriptions'), 'route' => 'admin.subscriptions.index', 'icon' => 'repeat'],
                ['label' => __('messages.nav.plans'), 'route' => 'admin.plans.index', 'icon' => 'clipboard-list'],
                ['label' => __('messages.nav.meals'), 'route' => 'admin.meals.index', 'icon' => 'utensils'],
            ],
        ],
        [
            'label' => __('messages.nav.groups.people'),
            'icon' => 'users',
            'items' => [
                ['label' => __('messages.nav.customers'), 'route' => 'admin.customers.index', 'icon' => 'users-round'],
                ['label' => __('messages.nav.users'), 'route' => 'admin.users.index', 'icon' => 'user-cog'],
                ['label' => __('messages.nav.roles'), 'route' => 'admin.roles.index', 'icon' => 'shield-check'],
            ],
        ],
        [
            'label' => __('messages.nav.groups.system'),
            'icon' => 'sliders-horizontal',
            'items' => [
                ['label' => __('messages.nav.invoices'), 'route' => 'admin.invoices.index', 'icon' => 'file-text'],
                ['label' => __('messages.nav.settings'), 'route' => 'admin.settings.edit', 'icon' => 'settings'],
                ['label' => __('messages.nav.audit'), 'route' => 'admin.audit.index', 'icon' => 'history'],
            ],
        ],
    ];

    $isActive = function (string $route): bool {
        if (! Route::has($route)) {
            return false;
        }

        $base = preg_replace('/\.(index|edit|show|create)$/', '.*', $route) ?: $route;

        return request()->routeIs($route) || request()->routeIs($base);
    };
@endphp

<aside class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar__brand" aria-label="{{ __('messages.app.name') }}">
        <x-ui.logo variant="mark" />
    </a>

    <nav class="sidebar__nav">
        @foreach ($groups as $group)
            @php
                $children = collect($group['items'] ?? [])
                    ->filter(fn (array $item): bool => Route::has($item['route']))
                    ->values();
            @endphp

            @if ($children->isNotEmpty())
                @php
                    $groupActive = $children->contains(fn (array $item): bool => $isActive($item['route']));
                @endphp

                <div class="sidebar__group" data-nav-group>
                    <button
                        type="button"
                        class="sidebar__item sidebar__item--group {{ $groupActive ? 'is-active' : '' }}"
                        data-nav-trigger
                        data-tooltip="{{ $group['label'] }}"
                        aria-label="{{ $group['label'] }}"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <x-ui.icon :name="$group['icon']" />
                    </button>

                    <div class="sidebar__flyout" data-nav-flyout hidden>
                        <p class="sidebar__flyout-title">{{ $group['label'] }}</p>
                        @foreach ($children as $item)
                            <a
                                href="{{ route($item['route']) }}"
                                class="sidebar__sublink {{ $isActive($item['route']) ? 'is-active' : '' }}"
                            >
                                <x-ui.icon :name="$item['icon']" size="sm" />
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @elseif (Route::has($group['route'] ?? ''))
                <a
                    href="{{ route($group['route']) }}"
                    class="sidebar__item {{ $isActive($group['route']) ? 'is-active' : '' }}"
                    data-tooltip="{{ $group['label'] }}"
                    aria-label="{{ $group['label'] }}"
                >
                    <x-ui.icon :name="$group['icon']" />
                </a>
            @endif
        @endforeach
    </nav>
</aside>
