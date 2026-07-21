<x-layouts.admin :title="__('dashboard.title')" :heading="__('dashboard.title')" :subtitle="__('dashboard.subtitle')">
    <div class="grid grid--4">
        <x-ui.stat-card :label="__('dashboard.active_users')" value="—" accent="primary">
            <x-slot:icon><x-ui.icon name="users" /></x-slot:icon>
        </x-ui.stat-card>
        <x-ui.stat-card :label="__('dashboard.roles')" value="—" accent="dark">
            <x-slot:icon><x-ui.icon name="shield-check" /></x-slot:icon>
        </x-ui.stat-card>
        <x-ui.stat-card :label="__('dashboard.pending_invitations')" value="—" accent="accent">
            <x-slot:icon><x-ui.icon name="mail" /></x-slot:icon>
        </x-ui.stat-card>
        <x-ui.stat-card :label="__('dashboard.audit_events')" value="—" accent="dark">
            <x-slot:icon><x-ui.icon name="history" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    <x-ui.card :title="__('dashboard.getting_started')">
        <p class="text-muted" style="margin: 0;">
            {{ __('dashboard.getting_started_body') }}
        </p>
    </x-ui.card>
</x-layouts.admin>
