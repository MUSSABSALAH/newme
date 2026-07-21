<x-layouts.admin :title="__('users.edit_title')" :heading="__('users.edit_title')" :subtitle="$user->name">
    @include('admin.users._form', [
        'action' => route('admin.users.update', $user),
        'method' => 'PUT',
        'user' => $user,
        'roles' => $roles,
        'assigned' => $assigned,
    ])
</x-layouts.admin>
