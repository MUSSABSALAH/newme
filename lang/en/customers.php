<?php

declare(strict_types=1);

return [
    'title' => 'Customers',
    'subtitle' => 'People who registered on the store to order and subscribe.',
    'no_customers' => 'No customers yet.',

    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'phone' => 'Mobile',
        'orders' => 'Orders',
        'subscriptions' => 'Subscriptions',
        'joined' => 'Joined',
        'birth_date' => 'Date of birth',
        'allergies' => 'Allergies',
        'medications' => 'Medications',
    ],

    'show' => [
        'subtitle' => 'Customer profile, measurements, orders and subscriptions.',
        'contact' => 'Contact details',
        'health' => 'Health profile',
        'orders' => 'Orders',
        'subscriptions' => 'Subscriptions',
        'no_health' => 'This customer has not shared any health details.',
        'no_orders' => 'This customer has no orders yet.',
        'no_subscriptions' => 'This customer has no subscriptions yet.',
        'none_reported' => 'None',
        'age_years' => ':n years old',
    ],

    'bulk' => [
        'select_all' => 'Select all',
        'selected' => 'selected',
        'delete' => 'Delete selected',
        'confirm_delete' => 'This deletion is final. Selected customers will disappear from the list and cannot be restored from the admin panel. Anyone with an active subscription or an incomplete order will be kept.',
    ],

    'blockers' => [
        'self' => 'your own account',
        'last_super_admin' => 'last Super Admin',
        'active_subscription' => 'active subscription',
        'incomplete_order' => 'incomplete order',
    ],

    'confirm' => [
        'delete_title' => 'Permanent deletion',
        'delete_text' => 'This deletion is final. The customer will disappear from the list and cannot be restored from the admin panel. They will not be deleted if they have an active subscription or an incomplete order.',
        'delete_confirm' => 'Yes, delete permanently',
    ],

    'messages' => [
        'deleted' => 'Customer deleted successfully.',
        'bulk_deleted' => ':count customers deleted.',
        'bulk_blocked' => 'These could not be deleted: :people',
        'bulk_none' => 'No customers were deleted.',
    ],
];
