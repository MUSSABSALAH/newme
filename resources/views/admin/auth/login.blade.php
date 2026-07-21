<x-layouts.auth :title="__('auth.login_title')">
    <h1 style="font-size: 1.3rem; margin-bottom: 4px;">{{ __('auth.welcome_back') }}</h1>
    <p class="text-muted" style="margin: 0 0 20px;">{{ __('auth.login_subtitle') }}</p>

    <form action="{{ route('admin.login') }}" method="POST" data-validate novalidate>
        @csrf

        <x-form.field :label="__('messages.fields.email')" name="email">
            <x-form.input
                name="email"
                type="email"
                placeholder="name@newme.sa"
                required
                autofocus
                autocomplete="username"
            />
        </x-form.field>

        <x-form.field :label="__('messages.fields.password')" name="password">
            <x-form.input
                name="password"
                type="password"
                placeholder="••••••••"
                required
                autocomplete="current-password"
            />
        </x-form.field>

        <div class="row row--between" style="margin-bottom: 20px; font-size: 0.9rem;">
            <label class="row" style="gap: 8px; cursor: pointer;">
                <input type="checkbox" name="remember" value="1">
                <span>{{ __('auth.remember_me') }}</span>
            </label>
            <a href="{{ route('admin.password.request') }}" class="link">{{ __('auth.passwords.forgot') }}</a>
        </div>

        <x-ui.button variant="primary" type="submit" class="w-full">{{ __('auth.sign_in') }}</x-ui.button>
    </form>
</x-layouts.auth>
