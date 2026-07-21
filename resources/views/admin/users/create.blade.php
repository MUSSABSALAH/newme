<x-layouts.admin :title="__('users.create_title')" :heading="__('users.create_title')" :subtitle="__('users.create_subtitle')">
    @php
        $selectedRoles = old('roles', $assigned ?? []);
    @endphp

    <form action="{{ route('admin.users.store') }}" method="POST" data-validate novalidate class="stack">
        @csrf

        <x-ui.card :title="__('users.account')">
            <div class="form-grid-2">
                <x-form.field :label="__('users.fields.name')" name="name">
                    <x-form.input name="name" :value="old('name')" required minlength="2" />
                </x-form.field>

                <x-form.field :label="__('users.fields.email')" name="email" :hint="__('invitations.email_hint')">
                    <x-form.input
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        dir="ltr"
                        autocomplete="email"
                    />
                </x-form.field>
            </div>
        </x-ui.card>

        <x-ui.card :title="__('users.access')">
            @if ($roles->isEmpty())
                <div class="dropdown__empty">{{ __('roles.no_roles') }}</div>
            @else
                <div class="field" data-require-one="roles[]" data-message="{{ __('users.errors.roles_required') }}">
                    <div class="perm-grid">
                        @foreach ($roles as $role)
                            <label class="perm-item">
                                <input
                                    type="checkbox"
                                    name="roles[]"
                                    value="{{ $role->name }}"
                                    @checked(in_array($role->name, $selectedRoles, true))
                                >
                                <span class="perm-item__text">
                                    <span class="perm-item__title">{{ $role->label() }}</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @error('roles')
                        <span class="field__error">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </x-ui.card>

        <div class="row" style="gap: 12px;">
            <x-ui.button type="submit" variant="primary">
                <x-ui.icon name="user-plus" size="sm" /> {{ __('users.add') }}
            </x-ui.button>
            <x-ui.button :href="route('admin.users.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
        </div>
    </form>
</x-layouts.admin>
