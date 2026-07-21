<x-layouts.admin :title="__('roles.title')" :heading="__('roles.title')" :subtitle="__('roles.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Identity\Models\Role::class)
            <x-ui.button :href="route('admin.roles.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('roles.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($roles->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('roles.no_roles') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('roles.name'), __('roles.permissions_count'), __('roles.users_count'), '']">
            @foreach ($roles as $role)
                <tr>
                    <td>
                        <div class="row">
                            <strong>{{ $role->label() }}</strong>
                            @if ($roleService->isSystemRole($role))
                                <x-ui.badge variant="neutral">{{ __('roles.system') }}</x-ui.badge>
                            @endif
                        </div>
                    </td>
                    <td>{{ $role->permissions_count }}</td>
                    <td>{{ $role->users_count }}</td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $role)
                                <x-ui.button :href="route('admin.roles.edit', $role)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $role)
                                @unless ($roleService->isSystemRole($role))
                                    <form
                                        method="POST"
                                        action="{{ route('admin.roles.destroy', $role) }}"
                                        data-confirm
                                        data-confirm-type="danger"
                                        data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                        data-confirm-text="{{ __('roles.confirm_delete') }}"
                                        data-confirm-button="{{ __('messages.confirm.delete_confirm') }}"
                                        data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <x-ui.button type="submit" variant="danger" class="btn--sm" title="{{ __('messages.actions.delete') }}">
                                            <x-ui.icon name="trash-2" size="sm" />
                                        </x-ui.button>
                                    </form>
                                @endunless
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>
    @endif
</x-layouts.admin>
