<x-layouts.admin :title="__('roles.create_title')" :heading="__('roles.create_title')">
    @include('admin.roles._form', [
        'action' => route('admin.roles.store'),
        'method' => 'POST',
        'role' => null,
        'groups' => $groups,
        'assigned' => $assigned,
        'isSystem' => false,
        'isSuperAdmin' => false,
    ])
</x-layouts.admin>
