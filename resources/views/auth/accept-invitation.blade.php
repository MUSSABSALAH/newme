<x-layouts.auth :title="__('invitations.accept_title')">
    <h1 style="font-size: 1.3rem; margin-bottom: 4px;">{{ __('invitations.accept_heading') }}</h1>
    <p class="text-muted" style="margin: 0 0 20px;">
        {{ __('invitations.accept_subtitle', ['name' => $user->name]) }}
    </p>

    <form action="{{ route('invitations.accept', ['token' => $token]) }}" method="POST" data-validate novalidate>
        @csrf

        <x-form.field :label="__('users.fields.email')" name="email">
            <x-form.input name="email" type="email" :value="$user->email" dir="ltr" readonly />
        </x-form.field>

        <x-form.field :label="__('users.fields.password')" name="password">
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

        <x-ui.button variant="primary" type="submit" class="w-full">{{ __('invitations.accept_action') }}</x-ui.button>
    </form>
</x-layouts.auth>
