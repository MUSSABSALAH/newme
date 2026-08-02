<?php

declare(strict_types=1);

return [
    'title' => 'Dashboard',
    'subtitle' => 'Sales, orders and subscriptions at a glance.',

    'kpi' => [
        'sales_today' => 'Sales today',
        'sales_month' => 'Sales this month',
        'orders_month' => 'Orders this month',
        'orders_today' => 'Orders today',
        'orders_pending' => 'Pending orders',
        'subscriptions_active' => 'Active subscriptions',
        'needs_handling' => 'Need handling',
        'invoices_month' => 'Invoices this month',
        'sales_hint' => 'From confirmed invoices',
    ],

    'sections' => [
        'orders' => 'Recent orders',
        'subscriptions' => 'Recent subscriptions',
        'order_status' => 'Orders by status',
        'subscription_status' => 'Subscriptions by status',
        'view_all_orders' => 'All orders',
        'view_all_subscriptions' => 'All subscriptions',
        'empty_orders' => 'No orders yet.',
        'empty_subscriptions' => 'No subscriptions yet.',
    ],
];
