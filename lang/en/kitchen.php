<?php

declare(strict_types=1);

return [
    'title' => 'Meal prep',
    'subtitle' => 'Subscription dishes to prepare for the day, grouped by dish.',

    'board' => [
        'today' => 'Today',
        'tomorrow' => 'Tomorrow',
        'previous_day' => 'Previous day',
        'next_day' => 'Next day',
        'go' => 'Show',
        'pdf' => 'Export PDF',
        'empty_title' => 'No subscription meals on this day',
        'empty_body' => 'No active subscription has a delivery on this date.',
    ],

    'kpi' => [
        'subscriptions' => 'Subscriptions delivering',
        'portions' => 'Total meals',
        'dishes' => 'Different dishes',
    ],

    'section' => [
        'portions' => ':count meals',
    ],

    'fields' => [
        'dish' => 'Dish',
        'count' => 'Count',
        'customer' => 'Customer',
        'phone' => 'Phone',
        'subscription' => 'Subscription',
        'plan' => 'Plan',
        'allergies' => 'Allergies',
    ],

    'show_customers' => 'Click to see the customers',

    'pdf' => [
        'title' => 'Meal prep :date',
        'summary' => 'Cooking list',
        'details' => 'Dishes and customers',
    ],
];
