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
    ],
    'errors' => [
        'self_deactivate' => 'You cannot deactivate your own account.',
        'last_super_admin' => 'The last active Super Admin cannot be removed or deactivated.',
        'roles_required' => 'Please assign at least one role to the user.',
    ],
    'confirm' => [
        'deactivate_title' => 'Deactivate user',
        'deactivate_text' => 'This user will lose access until reactivated.',
        'deactivate_confirm' => 'Yes, deactivate',
    ],
];
