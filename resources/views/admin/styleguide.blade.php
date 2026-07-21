@php
    $users = [
        ['name' => 'Amanda Cooper', 'email' => 'amanda@newme.sa', 'role' => 'Super Admin', 'status' => ['Active', 'success']],
        ['name' => 'Khalid Al-Harbi', 'email' => 'khalid@newme.sa', 'role' => 'Operations Manager', 'status' => ['Active', 'success']],
        ['name' => 'Sara Ahmed', 'email' => 'sara@newme.sa', 'role' => 'Nutritionist', 'status' => ['Invited', 'warning']],
        ['name' => 'John Cooper', 'email' => 'john@newme.sa', 'role' => 'Driver', 'status' => ['Inactive', 'neutral']],
    ];
@endphp

<x-layouts.admin title="Design System" heading="Design System" subtitle="Reusable components — New Me Admin">
    <x-slot:actions>
        <x-ui.button variant="ghost"><x-ui.icon name="download" size="sm" /> Export</x-ui.button>
        <x-ui.button variant="primary"><x-ui.icon name="plus" size="sm" /> Add New</x-ui.button>
    </x-slot:actions>

    {{-- Stat cards --}}
    <div class="grid grid--4">
        <x-ui.stat-card label="Today's Sales" value="12,480" unit="SAR" accent="primary" />
        <x-ui.stat-card label="Active Subscriptions" value="326" accent="dark" />
        <x-ui.stat-card label="Pending Deliveries" value="48" accent="accent" />
        <x-ui.stat-card label="Low Stock Items" value="7" accent="accent" />
    </div>

    <div class="grid grid--3">
        {{-- Users table spanning two columns --}}
        <div style="grid-column: span 2;">
            <x-ui.card title="Recent Users">
                <x-slot:actions>
                    <x-ui.button variant="ghost" class="btn--sm">View all</x-ui.button>
                </x-slot:actions>

                <x-ui.table :headers="['User', 'Role', 'Status']">
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="row">
                                    <x-ui.avatar :name="$user['name']" :size="38" />
                                    <div>
                                        <strong>{{ $user['name'] }}</strong>
                                        <div class="text-muted" style="font-size: 0.82rem;">{{ $user['email'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user['role'] }}</td>
                            <td><x-ui.badge :variant="$user['status'][1]">{{ $user['status'][0] }}</x-ui.badge></td>
                        </tr>
                    @endforeach
                </x-ui.table>
            </x-ui.card>
        </div>

        {{-- Right column: form + progress --}}
        <div class="stack">
            <x-ui.card title="Quick Form">
                <form action="#" method="post" data-validate novalidate>
                    <x-form.field label="Full name" name="name">
                        <x-form.input name="name" placeholder="e.g. Amanda Cooper" required minlength="3" />
                    </x-form.field>

                    <x-form.field label="Email" name="email">
                        <x-form.input name="email" type="email" placeholder="name@newme.sa" required />
                    </x-form.field>

                    <x-form.field label="Role" name="role">
                        <x-form.select name="role" :options="['super_admin' => 'Super Admin', 'nutritionist' => 'Nutritionist', 'driver' => 'Driver']" />
                    </x-form.field>

                    <x-ui.button variant="primary" type="submit" class="w-full">Save</x-ui.button>
                </form>
            </x-ui.card>

            <x-ui.card title="Weight Loss Plan" variant="dark">
                <x-ui.progress :value="68" :max="100" label="Completed" />
            </x-ui.card>
        </div>
    </div>

    {{-- Buttons & badges reference --}}
    <x-ui.card title="Buttons & Badges">
        <div class="row" style="flex-wrap: wrap; gap: 12px; margin-bottom: 16px;">
            <x-ui.button variant="primary">Primary</x-ui.button>
            <x-ui.button variant="dark">Dark</x-ui.button>
            <x-ui.button variant="ghost">Ghost</x-ui.button>
            <x-ui.button variant="danger">Danger</x-ui.button>
        </div>
        <div class="row" style="flex-wrap: wrap; gap: 12px;">
            <x-ui.badge variant="success">Active</x-ui.badge>
            <x-ui.badge variant="warning">Invited</x-ui.badge>
            <x-ui.badge variant="danger">Failed</x-ui.badge>
            <x-ui.badge variant="info">Processing</x-ui.badge>
            <x-ui.badge variant="neutral">Inactive</x-ui.badge>
        </div>
    </x-ui.card>

    {{-- Lucide icons --}}
    <x-ui.card title="Icons (Lucide)">
        <div class="row" style="flex-wrap: wrap; gap: 20px;">
            <x-ui.icon name="layout-grid" size="lg" />
            <x-ui.icon name="users" size="lg" />
            <x-ui.icon name="shield-check" size="lg" />
            <x-ui.icon name="history" size="lg" />
            <x-ui.icon name="settings" size="lg" />
            <x-ui.icon name="bell" size="lg" />
            <x-ui.icon name="search" size="lg" />
            <x-ui.icon name="trash-2" size="lg" />
            <x-ui.icon name="pencil" size="lg" />
        </div>
    </x-ui.card>
</x-layouts.admin>
