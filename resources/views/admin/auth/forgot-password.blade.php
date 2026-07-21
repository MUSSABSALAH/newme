<x-layouts.auth :title="__('auth.passwords.request_title')">
    <h1 style="font-size: 1.3rem; margin-bottom: 4px;">{{ __('auth.passwords.request_heading') }}</h1>
    <p class="text-muted" style="margin: 0 0 20px;">{{ __('auth.passwords.request_subtitle') }}</p>

    <form action="{{ route('admin.password.email') }}" method="POST" data-validate novalidate>
        @csrf

        <x-form.field :label="__('messages.fields.email')" name="email">
            <x-form.input
                name="email"
                type="email"
                placeholder="name@newme.sa"
                required
                autofocus
                dir="ltr"
                autocomplete="username"
            />
        </x-form.field>

        <x-ui.button variant="primary" type="submit" class="w-full">{{ __('auth.passwords.send_link') }}</x-ui.button>
    </form>

    <p style="margin-top: 20px; text-align: center; font-size: 0.9rem;">
        <a href="{{ route('admin.login') }}" class="link">{{ __('auth.passwords.back_to_login') }}</a>
    </p>
</x-layouts.auth>
