@php
    use App\Modules\Identity\Enums\UserStatus;

    $statusVariants = [
        UserStatus::Active->value => 'success',
        UserStatus::Inactive->value => 'neutral',
        UserStatus::Invited->value => 'info',
    ];
@endphp

<x-layouts.admin :title="__('users.title')" :heading="__('users.title')" :subtitle="__('users.subtitle')">
    <x-slot:actions>
        @can('invite', \App\Models\User::class)
            <x-ui.button :href="route('admin.users.create')" variant="primary">
                <x-ui.icon name="user-plus" size="sm" /> {{ __('users.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($users->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('users.no_users') }}</div>
        </x-ui.card>
    @else
        @can('deleteAny', \App\Models\User::class)
            <form
                id="user-bulk-form"
                method="POST"
                action="{{ route('admin.users.bulk-destroy') }}"
                data-confirm
                data-confirm-type="danger"
                data-confirm-title="{{ __('users.confirm.delete_title') }}"
                data-confirm-text="{{ __('users.bulk.confirm_delete') }}"
                data-confirm-button="{{ __('users.confirm.delete_confirm') }}"
                data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
            >
                @csrf
                <div class="bulk-bar">
                    <span class="bulk-bar__meta">
                        <span data-user-bulk-count>0</span>
                        {{ __('users.bulk.selected') }}
                    </span>
                    <x-ui.button type="submit" variant="danger" class="btn--sm" data-user-bulk-submit disabled>
                        <x-ui.icon name="trash-2" size="sm" /> {{ __('users.bulk.delete') }}
                    </x-ui.button>
                </div>
            </form>
        @endcan

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        @can('deleteAny', \App\Models\User::class)
                            <th class="table-check-col">
                                <label class="table-check">
                                    <input type="checkbox" data-user-bulk-all aria-label="{{ __('users.bulk.select_all') }}">
                                </label>
                            </th>
                        @endcan
                        <th>{{ __('users.fields.name') }}</th>
                        <th>{{ __('users.fields.email') }}</th>
                        <th>{{ __('users.fields.roles') }}</th>
                        <th>{{ __('users.fields.status') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            @can('delete', $user)
                                <td class="table-check-col">
                                    <label class="table-check">
                                        <input
                                            form="user-bulk-form"
                                            type="checkbox"
                                            name="ids[]"
                                            value="{{ $user->id }}"
                                            data-user-bulk-item
                                            aria-label="{{ $user->name }}"
                                        >
                                    </label>
                                </td>
                            @elsecan('deleteAny', \App\Models\User::class)
                                <td class="table-check-col"></td>
                            @endcan
                            <td>
                                <div class="row" style="gap: 10px;">
                                    <x-ui.avatar :name="$user->name" :size="32" />
                                    <strong>{{ $user->name }}</strong>
                                </div>
                            </td>
                            <td dir="ltr" style="text-align: start;">{{ $user->email }}</td>
                            <td>
                                <div class="row" style="gap: 6px; flex-wrap: wrap;">
                                    @forelse ($user->roles as $role)
                                        <x-ui.badge variant="neutral">{{ $role->label() }}</x-ui.badge>
                                    @empty
                                        <span class="text-muted">—</span>
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <x-ui.badge :variant="$statusVariants[$user->status->value] ?? 'neutral'">
                                    {{ __('users.status.' . $user->status->value) }}
                                </x-ui.badge>
                            </td>
                            <td>
                                <div class="row" style="justify-content: flex-end; gap: 8px;">
                                    @can('invite', \App\Models\User::class)
                                        @if ($user->isInvited() && ($invitation = $user->pendingInvitation()))
                                            <form method="POST" action="{{ route('admin.users.invitations.resend', $invitation) }}">
                                                @csrf
                                                <x-ui.button type="submit" variant="ghost" class="btn--sm" title="{{ __('invitations.resend') }}">
                                                    <x-ui.icon name="send" size="sm" /> {{ __('invitations.resend') }}
                                                </x-ui.button>
                                            </form>
                                        @endif
                                    @endcan

                                    @can('update', $user)
                                        <x-ui.button :href="route('admin.users.edit', $user)" variant="ghost" class="btn--sm">
                                            <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                        </x-ui.button>
                                    @endcan

                                    @can('deactivate', $user)
                                        @if ($user->isActive())
                                            <form
                                                method="POST"
                                                action="{{ route('admin.users.deactivate', $user) }}"
                                                data-confirm
                                                data-confirm-type="danger"
                                                data-confirm-title="{{ __('users.confirm.deactivate_title') }}"
                                                data-confirm-text="{{ __('users.confirm.deactivate_text') }}"
                                                data-confirm-button="{{ __('users.confirm.deactivate_confirm') }}"
                                                data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                                            >
                                                @csrf
                                                <x-ui.button type="submit" variant="ghost" class="btn--sm" title="{{ __('messages.actions.deactivate') }}">
                                                    <x-ui.icon name="user-x" size="sm" /> {{ __('messages.actions.deactivate') }}
                                                </x-ui.button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.users.activate', $user) }}">
                                                @csrf
                                                <x-ui.button type="submit" variant="ghost" class="btn--sm" title="{{ __('messages.actions.activate') }}">
                                                    <x-ui.icon name="user-check" size="sm" /> {{ __('messages.actions.activate') }}
                                                </x-ui.button>
                                            </form>
                                        @endif
                                    @endcan

                                    @can('delete', $user)
                                        <form
                                            method="POST"
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            data-confirm
                                            data-confirm-type="danger"
                                            data-confirm-title="{{ __('users.confirm.delete_title') }}"
                                            data-confirm-text="{{ __('users.confirm.delete_text') }}"
                                            data-confirm-button="{{ __('users.confirm.delete_confirm') }}"
                                            data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.button type="submit" variant="danger" class="btn--sm" title="{{ __('messages.actions.delete') }}">
                                                <x-ui.icon name="trash-2" size="sm" />
                                            </x-ui.button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <script>
    (function () {
        var form = document.getElementById('user-bulk-form');
        if (!form) return;

        var all = document.querySelector('[data-user-bulk-all]');
        var boxes = document.querySelectorAll('[data-user-bulk-item]');
        var count = form.querySelector('[data-user-bulk-count]');
        var submit = form.querySelector('[data-user-bulk-submit]');

        function sync() {
            var n = 0;
            boxes.forEach(function (box) { if (box.checked) n++; });
            if (count) count.textContent = String(n);
            if (submit) submit.disabled = n === 0;
            if (all) {
                all.checked = n > 0 && n === boxes.length;
                all.indeterminate = n > 0 && n < boxes.length;
            }
        }

        if (all) {
            all.addEventListener('change', function () {
                boxes.forEach(function (box) { box.checked = all.checked; });
                sync();
            });
        }

        boxes.forEach(function (box) { box.addEventListener('change', sync); });
        form.addEventListener('submit', function (event) {
            if ([].filter.call(boxes, function (box) { return box.checked; }).length === 0) {
                event.preventDefault();
            }
        });
        sync();
    })();
    </script>
</x-layouts.admin>
