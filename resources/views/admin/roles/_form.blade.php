@php
    $isSystem = $isSystem ?? false;
    $isSuperAdmin = $isSuperAdmin ?? false;
    $selected = old('permissions', $assigned ?? []);
@endphp

<form action="{{ $action }}" method="POST" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card>
        <div class="form-grid-2">
            <x-form.field :label="__('roles.name_ar')" name="display_name.ar">
                <x-form.input
                    name="display_name[ar]"
                    :value="old('display_name.ar', $role?->label('ar') ?? '')"
                    required
                    minlength="2"
                    :readonly="$isSystem"
                />
            </x-form.field>

            <x-form.field :label="__('roles.name_en')" name="display_name.en">
                <x-form.input
                    name="display_name[en]"
                    :value="old('display_name.en', $role?->label('en') ?? '')"
                    required
                    minlength="2"
                    dir="ltr"
                    :readonly="$isSystem"
                />
            </x-form.field>
        </div>

        @if ($role)
            <p class="field__hint">{{ __('roles.identifier') }}: <code>{{ $role->name }}</code></p>
        @endif
    </x-ui.card>

    <x-ui.card :title="__('roles.permissions')">
        @if ($isSuperAdmin)
            <x-ui.alert type="info">{{ __('roles.super_admin_note') }}</x-ui.alert>
        @endif

        <div class="stack">
            @foreach ($groups as $group => $permissions)
                <div class="perm-group">
                    <div class="perm-group__head">
                        <h3>{{ __('permissions.groups.' . $group) }}</h3>
                    </div>
                    <div class="perm-grid">
                        @foreach ($permissions as $permission)
                            <label class="perm-item">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission }}"
                                    @checked($isSuperAdmin || in_array($permission, $selected, true))
                                    @disabled($isSuperAdmin)
                                >
                                <span class="perm-item__text">
                                    <span class="perm-item__title">{{ __('permissions.items.' . $permission) }}</span>
                                    <span class="perm-item__desc">{{ __('permissions.descriptions.' . $permission) }}</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.roles.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
