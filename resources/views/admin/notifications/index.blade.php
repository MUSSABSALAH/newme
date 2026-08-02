@php
    $filters = ['all', 'unread', 'read'];
@endphp

<x-layouts.admin :title="__('notifications.title')" :heading="__('notifications.title')" :subtitle="__('notifications.subtitle')">
    <x-slot:actions>
        @if ($unreadCount > 0)
            <form method="POST" action="{{ route('admin.notifications.read-all') }}">
                @csrf
                <x-ui.button type="submit" variant="ghost">
                    <x-ui.icon name="check-check" size="sm" /> {{ __('messages.ui.mark_all_read') }}
                </x-ui.button>
            </form>
        @endif
    </x-slot:actions>

    <x-ui.card>
        <div class="row" style="gap: 8px; flex-wrap: wrap;">
            @foreach ($filters as $option)
                <a
                    href="{{ route('admin.notifications.index', $option === 'all' ? [] : ['filter' => $option]) }}"
                    class="btn btn--{{ $filter === $option ? 'primary' : 'ghost' }} btn--sm"
                >
                    {{ __('notifications.filters.'.$option) }}
                    @if ($option === 'unread' && $unreadCount > 0)
                        ({{ $unreadCount }})
                    @endif
                </a>
            @endforeach
        </div>
    </x-ui.card>

    @if ($notifications->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">
                <x-ui.icon name="bell-off" /><br>
                {{ __('messages.ui.no_notifications') }}
            </div>
        </x-ui.card>
    @else
        <x-ui.card>
            <div class="stack" style="gap: 8px;">
                @foreach ($notifications as $note)
                    <form method="POST" action="{{ route('admin.notifications.read', $note['id']) }}">
                        @csrf
                        <button type="submit" class="notif-row {{ $note['unread'] ? 'notif-row--unread' : '' }}">
                            <span class="notif-row__icon">
                                <x-ui.icon :name="$note['icon']" size="sm" />
                            </span>

                            <span class="notif__copy">
                                <strong>{{ $note['title'] }}</strong>
                                <span class="text-muted">{{ $note['body'] }}</span>
                            </span>

                            <span class="notif-row__meta">
                                <x-ui.badge :variant="$note['unread'] ? 'info' : 'neutral'">
                                    {{ $note['unread'] ? __('notifications.status.unread') : __('notifications.status.read') }}
                                </x-ui.badge>
                                <span class="notif__time">{{ $note['time'] }}</span>
                            </span>
                        </button>
                    </form>
                @endforeach
            </div>
        </x-ui.card>

        <x-ui.pagination :paginator="$notifications" />
    @endif
</x-layouts.admin>
