@props(['title' => 'New Me Admin', 'heading' => null, 'subtitle' => null])

<x-layouts.base :title="$title">
    <div class="app-shell" data-app-shell>
        <x-ui.sidebar />
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <div class="main">
            <header class="topbar">
                <div class="topbar__lead">
                    <button type="button" class="icon-btn sidebar-toggle" data-sidebar-toggle aria-label="Menu">
                        <x-ui.icon name="menu" />
                    </button>
                    <div class="topbar__title">
                        <h1>{{ $heading ?? $title }}</h1>
                        @if ($subtitle)
                            <p>{{ $subtitle }}</p>
                        @endif
                    </div>
                </div>

                <div class="topbar__actions">
                    @isset($actions)
                        {{ $actions }}
                    @endisset

                    @auth
                        @php $currentLocale = app()->getLocale(); @endphp

                        {{-- Notifications --}}
                        <x-ui.dropdown align="end" width="320px">
                            <x-slot:trigger>
                                <span class="icon-btn" title="{{ __('messages.ui.notifications') }}" aria-label="{{ __('messages.ui.notifications') }}">
                                    <x-ui.icon name="bell" />
                                </span>
                            </x-slot:trigger>

                            <div class="dropdown__head">
                                <strong>{{ __('messages.ui.notifications') }}</strong>
                            </div>
                            <div class="dropdown__empty">
                                <x-ui.icon name="bell-off" /><br>
                                {{ __('messages.ui.no_notifications') }}
                            </div>
                        </x-ui.dropdown>

                        {{-- Language switcher --}}
                        <x-ui.dropdown align="end" width="180px">
                            <x-slot:trigger>
                                <span class="topbar-btn" title="{{ __('messages.ui.language') }}">
                                    <x-ui.icon name="languages" size="sm" />
                                    <span class="lang-code">{{ $currentLocale }}</span>
                                </span>
                            </x-slot:trigger>

                            <a href="{{ route('locale.switch', 'ar') }}" class="dropdown__item {{ $currentLocale === 'ar' ? 'is-active' : '' }}">
                                {{ __('messages.ui.arabic') }}
                                @if ($currentLocale === 'ar')
                                    <x-ui.icon name="check" size="sm" style="margin-inline-start: auto;" />
                                @endif
                            </a>
                            <a href="{{ route('locale.switch', 'en') }}" class="dropdown__item {{ $currentLocale === 'en' ? 'is-active' : '' }}">
                                {{ __('messages.ui.english') }}
                                @if ($currentLocale === 'en')
                                    <x-ui.icon name="check" size="sm" style="margin-inline-start: auto;" />
                                @endif
                            </a>
                        </x-ui.dropdown>

                        {{-- Account --}}
                        <x-ui.dropdown align="end" width="240px">
                            <x-slot:trigger>
                                <span class="user-chip">
                                    <x-ui.avatar :name="auth()->user()->name" :size="34" />
                                    <span class="user-chip__meta">
                                        <strong>{{ auth()->user()->name }}</strong>
                                        <span class="text-muted">{{ auth()->user()->email }}</span>
                                    </span>
                                    <x-ui.icon name="chevron-down" size="sm" />
                                </span>
                            </x-slot:trigger>

                            <div class="dropdown__head">
                                <div>
                                    <strong>{{ auth()->user()->name }}</strong>
                                    <span class="text-muted">{{ auth()->user()->email }}</span>
                                </div>
                            </div>

                            <a href="#" class="dropdown__item">
                                <x-ui.icon name="user" size="sm" /> {{ __('messages.ui.profile') }}
                            </a>
                            <a href="#" class="dropdown__item">
                                <x-ui.icon name="settings" size="sm" /> {{ __('messages.ui.settings') }}
                            </a>

                            <div class="dropdown__divider"></div>

                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown__item dropdown__item--danger">
                                    <x-ui.icon name="log-out" size="sm" /> {{ __('messages.ui.logout') }}
                                </button>
                            </form>
                        </x-ui.dropdown>
                    @endauth
                </div>
            </header>

            <main class="content">
                <x-ui.flash />
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layouts.base>
