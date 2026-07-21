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
        <x-ui.table :headers="[__('users.fields.name'), __('users.fields.email'), __('users.fields.roles'), __('users.fields.status'), '']">
            @foreach ($users as $user)
                <tr>
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
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>
    @endif
</x-layouts.admin>
