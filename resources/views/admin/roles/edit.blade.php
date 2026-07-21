<x-layouts.admin :title="__('roles.edit_title')" :heading="__('roles.edit_title')" :subtitle="$role->label()">
    @include('admin.roles._form', [
        'action' => route('admin.roles.update', $role),
        'method' => 'PUT',
        'role' => $role,
        'groups' => $groups,
        'assigned' => $assigned,
        'isSystem' => $isSystem,
        'isSuperAdmin' => $isSuperAdmin,
    ])
</x-layouts.admin>
