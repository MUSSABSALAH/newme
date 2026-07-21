<x-layouts.auth :title="__('auth.passwords.reset_title')">
    <h1 style="font-size: 1.3rem; margin-bottom: 4px;">{{ __('auth.passwords.reset_heading') }}</h1>
    <p class="text-muted" style="margin: 0 0 20px;">{{ __('auth.passwords.reset_subtitle') }}</p>

    <form action="{{ route('admin.password.update') }}" method="POST" data-validate novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <x-form.field :label="__('messages.fields.email')" name="email">
            <x-form.input
                name="email"
                type="email"
                placeholder="name@newme.sa"
                :value="$email"
                required
                dir="ltr"
                autocomplete="username"
            />
        </x-form.field>

        <x-form.field :label="__('messages.fields.password')" name="password">
            <x-form.input
                name="password"
                type="password"
                placeholder="••••••••"
                required
                minlength="8"
                dir="ltr"
                autocomplete="new-password"
            />
        </x-form.field>

        <x-form.field :label="__('users.fields.password_confirmation')" name="password_confirmation">
            <x-form.input
                name="password_confirmation"
                type="password"
                placeholder="••••••••"
                required
                minlength="8"
                data-match="password"
                dir="ltr"
                autocomplete="new-password"
            />
        </x-form.field>

        <x-ui.button variant="primary" type="submit" class="w-full">{{ __('auth.passwords.reset_action') }}</x-ui.button>
    </form>
</x-layouts.auth>
