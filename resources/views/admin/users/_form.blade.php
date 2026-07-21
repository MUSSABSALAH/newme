@php
    use App\Modules\Identity\Enums\UserStatus;

    $user = $user ?? null;
    $selectedRoles = old('roles', $assigned ?? []);
    $statusValue = old('status', $user?->status?->value ?? UserStatus::Active->value);

    $statuses = [
        UserStatus::Active->value => __('users.status.active'),
        UserStatus::Inactive->value => __('users.status.inactive'),
    ];
@endphp

<form action="{{ $action }}" method="POST" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('users.account')">
        <div class="form-grid-2">
            <x-form.field :label="__('users.fields.name')" name="name">
                <x-form.input
                    name="name"
                    :value="old('name', $user?->name ?? '')"
                    required
                    minlength="2"
                />
            </x-form.field>

            <x-form.field :label="__('users.fields.email')" name="email">
                <x-form.input
                    type="email"
                    name="email"
                    :value="old('email', $user?->email ?? '')"
                    required
                    dir="ltr"
                    autocomplete="email"
                />
            </x-form.field>

            <x-form.field :label="__('users.fields.password')" name="password" :hint="$user ? __('users.hints.password_optional') : null">
                <x-form.input
                    type="password"
                    name="password"
                    :required="$user === null"
                    minlength="8"
                    dir="ltr"
                    autocomplete="new-password"
                />
            </x-form.field>

            <x-form.field :label="__('users.fields.password_confirmation')" name="password_confirmation">
                <x-form.input
                    type="password"
                    name="password_confirmation"
                    :required="$user === null"
                    minlength="8"
                    data-match="password"
                    dir="ltr"
                    autocomplete="new-password"
                />
            </x-form.field>

            <x-form.field :label="__('users.fields.status')" name="status">
                <x-form.select name="status" :options="$statuses" :selected="$statusValue" />
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
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.users.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
