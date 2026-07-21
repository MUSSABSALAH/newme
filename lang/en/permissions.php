<?php

declare(strict_types=1);

return [
    'groups' => [
        'users' => 'Users',
        'roles' => 'Roles',
        'audit' => 'Audit',
        'catalog' => 'Catalog',
        'inventory' => 'Inventory',
        'customers' => 'Customers',
        'orders' => 'Orders',
        'payments' => 'Payments',
        'plans' => 'Plans',
        'subscriptions' => 'Subscriptions',
        'appointments' => 'Appointments',
        'delivery' => 'Delivery',
        'cms' => 'Content (CMS)',
        'notifications' => 'Notifications',
        'reports' => 'Reports',
        'settings' => 'Settings',
    ],
    'items' => [
        'users' => [
            'view' => 'View users',
            'create' => 'Create users',
            'update' => 'Update users',
            'deactivate' => 'Deactivate users',
            'invite' => 'Invite users',
        ],
        'roles' => [
            'view' => 'View roles',
            'manage' => 'Manage roles',
        ],
        'audit' => [
            'view' => 'View audit log',
        ],
        'catalog' => [
            'view' => 'View catalog',
            'create' => 'Create products',
            'update' => 'Update products',
            'delete' => 'Delete products',
        ],
        'inventory' => [
            'view' => 'View inventory',
            'adjust' => 'Adjust stock',
        ],
        'customers' => [
            'view' => 'View customers',
            'create' => 'Create customers',
            'update' => 'Update customers',
        ],
        'orders' => [
            'view' => 'View orders',
            'create' => 'Create orders',
            'update' => 'Update orders',
            'cancel' => 'Cancel orders',
            'refund' => 'Refund orders',
        ],
        'payments' => [
            'view' => 'View payments',
            'refund' => 'Refund payments',
        ],
        'plans' => [
            'view' => 'View plans',
            'manage' => 'Manage plans',
        ],
        'subscriptions' => [
            'view' => 'View subscriptions',
            'manage' => 'Manage subscriptions',
            'pause' => 'Pause subscriptions',
            'cancel' => 'Cancel subscriptions',
        ],
        'appointments' => [
            'view' => 'View appointments',
            'manage' => 'Manage appointments',
        ],
        'delivery' => [
            'view' => 'View deliveries',
            'assign' => 'Assign deliveries',
        ],
        'cms' => [
            'view' => 'View content',
            'manage' => 'Manage content',
        ],
        'notifications' => [
            'send' => 'Send notifications',
            'manage' => 'Manage notifications',
        ],
        'reports' => [
            'view' => 'View reports',
            'export' => 'Export reports',
        ],
        'settings' => [
            'manage' => 'Manage settings',
        ],
    ],
    'descriptions' => [
        'users' => [
            'view' => 'See the list and details of users.',
            'create' => 'Add new users to the system.',
            'update' => "Edit existing users' information.",
            'deactivate' => 'Activate or deactivate user accounts.',
            'invite' => 'Send invitations to join the platform.',
        ],
        'roles' => [
            'view' => 'See the list of roles and their permissions.',
            'manage' => 'Create, edit, and delete roles.',
        ],
        'audit' => [
            'view' => 'View the activity and audit log.',
        ],
        'catalog' => [
            'view' => 'Browse products and categories.',
            'create' => 'Add new products and categories.',
            'update' => 'Edit products, prices, and categories.',
            'delete' => 'Remove products and categories.',
        ],
        'inventory' => [
            'view' => 'View stock levels and movements.',
            'adjust' => 'Increase or decrease stock quantities.',
        ],
        'customers' => [
            'view' => 'See the list and details of customers.',
            'create' => 'Add new customer accounts.',
            'update' => 'Edit customer information.',
        ],
        'orders' => [
            'view' => 'See the list and details of orders.',
            'create' => 'Place new orders.',
            'update' => 'Edit order details and status.',
            'cancel' => 'Cancel existing orders.',
            'refund' => 'Issue refunds for orders.',
        ],
        'payments' => [
            'view' => 'See payment transactions.',
            'refund' => 'Process payment refunds.',
        ],
        'plans' => [
            'view' => 'See subscription plans.',
            'manage' => 'Create and edit subscription plans.',
        ],
        'subscriptions' => [
            'view' => 'See the list and details of subscriptions.',
            'manage' => 'Create and edit subscriptions.',
            'pause' => 'Temporarily pause subscriptions.',
            'cancel' => 'Cancel active subscriptions.',
        ],
        'appointments' => [
            'view' => 'See the appointments calendar.',
            'manage' => 'Book, reschedule, and cancel appointments.',
        ],
        'delivery' => [
            'view' => 'See delivery tasks and routes.',
            'assign' => 'Assign deliveries to drivers.',
        ],
        'cms' => [
            'view' => 'View website content and pages.',
            'manage' => 'Create and edit website content.',
        ],
        'notifications' => [
            'send' => 'Send notifications to users and customers.',
            'manage' => 'Manage notification templates and settings.',
        ],
        'reports' => [
            'view' => 'View dashboards and reports.',
            'export' => 'Export report data.',
        ],
        'settings' => [
            'manage' => 'Manage system-wide settings.',
        ],
    ],
];
