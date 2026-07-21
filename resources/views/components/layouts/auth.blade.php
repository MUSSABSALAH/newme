@props(['title' => 'New Me Admin'])

<x-layouts.base :title="$title">
    <div class="auth">
        <div class="auth__card">
            <div class="auth__brand">
                <x-ui.logo variant="full" />
            </div>

            <x-ui.flash />
            {{ $slot }}
        </div>
    </div>
</x-layouts.base>
