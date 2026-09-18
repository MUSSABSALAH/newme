<?php

declare(strict_types=1);

return [
    'title' => 'Users',
    'subtitle' => 'Manage user accounts, roles, and access',
    'add' => 'Add user',
    'create_title' => 'Add user',
    'create_subtitle' => 'An invitation email will be sent so the user can set their own password.',
    'edit_title' => 'Edit user',
    'no_users' => 'No users yet.',
    'account' => 'Account details',
    'access' => 'Roles & access',
    'fields' => [
        'name' => 'Full name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
        'status' => 'Status',
        'roles' => 'Roles',
    ],
    'hints' => [
        'password_optional' => 'Leave blank to keep the current password.',
    ],
    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'invited' => 'Invited',
    ],
    'messages' => [
        'created' => 'User created successfully.',
        'updated' => 'User updated successfully.',
        'activated' => 'User activated successfully.',
        'deactivated' => 'User deactivated successfully.',
        'deleted' => 'Staff member deleted successfully.',
        'bulk_deleted' => ':count staff members deleted.',
        'bulk_blocked' => 'These could not be deleted: :people',
        'bulk_none' => 'No staff members were deleted.',
    ],
    'blockers' => [
        'self' => 'your own account',
        'last_super_admin' => 'last Super Admin',
        'active_subscription' => 'active subscription',
        'incomplete_order' => 'incomplete order',
    ],
    'bulk' => [
        'select_all' => 'Select all',
        'selected' => 'selected',
        'delete' => 'Delete selected',
        'confirm_delete' => 'This deletion is final. Selected staff will disappear from the list and cannot be restored from the admin panel. Anyone with an active subscription or an incomplete order will be kept.',
    ],
    'errors' => [
        'self_deactivate' => 'You cannot deactivate your own account.',
        'self' => 'You cannot delete your own account.',
        'last_super_admin' => 'The last active Super Admin cannot be removed or deactivated.',
        'active_subscription' => '“:name” cannot be deleted because they have an active subscription.',
        'incomplete_order' => '“:name” cannot be deleted because they have an incomplete order.',
        'roles_required' => 'Please assign at least one role to the user.',
    ],
    'confirm' => [
        'deactivate_title' => 'Deactivate user',
        'deactivate_text' => 'This user will lose access until reactivated.',
        'deactivate_confirm' => 'Yes, deactivate',
        'delete_title' => 'Permanent deletion',
        'delete_text' => 'This deletion is final. The staff member will disappear from the list and cannot be restored from the admin panel. They will not be deleted if they have an active subscription or an incomplete order.',
        'delete_confirm' => 'Yes, delete permanently',
    ],
];
