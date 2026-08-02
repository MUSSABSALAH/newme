<?php

declare(strict_types=1);

return [
    'title' => 'Subscriptions',
    'subtitle' => 'Meal-plan subscriptions requested by customers.',
    'no_subscriptions' => 'No subscriptions yet.',

    'filter_status' => 'Status',
    'all_statuses' => 'All statuses',

    'messages' => [
        'created' => 'Your subscription request has been created.',
        'handling_updated' => 'Handling state updated.',
    ],

    // How far the team has got, kept separate from the subscription's own status.
    'handling' => [
        'title' => 'Handling',
        'column' => 'Handling',
        'filter' => 'Handling state',
        'all' => 'All handling states',
        'change' => 'Change handling state',
        'last_action' => 'Last action',
        'by_at' => ':name — :at',
        'untouched' => 'Nobody has looked at it yet',
        'pending_hint' => 'You have :count subscription(s) waiting to be handled.',
        'statuses' => [
            'new' => 'New',
            'viewed' => 'Viewed',
            'contacted' => 'Customer contacted',
            'handled' => 'Handled',
            'on_hold' => 'On hold',
        ],
    ],

    'statuses' => [
        'pending' => 'Pending',
        'active' => 'Active',
        'paused' => 'Paused',
        'cancelled' => 'Cancelled',
    ],

    'fields' => [
        'reference' => 'Reference',
        'customer' => 'Customer',
        'plan' => 'Plan',
        'duration' => 'Duration',
        'total' => 'Total',
        'status' => 'Status',
        'created_at' => 'Created',
        'meal_types' => 'Daily meals',
        'selected_days' => 'Delivery weekdays',
        'mode' => 'Delivery pattern',
        'total_days' => 'Delivery days',
        'start_date' => 'Starts on',
        'per_day' => 'Per day',
        'subtotal' => 'Subtotal',
        'discount' => 'Plan discount',
        'coupon' => 'Discount code',
        'delivery_fee' => 'Delivery fee',
        'tax' => 'VAT',
    ],

    'modes' => [
        'flex' => 'Flexible (renews)',
        'once' => 'One cycle',
        'daily' => 'Daily',
    ],

    'show' => [
        'subtitle' => 'Subscription details',
        'summary' => 'Summary',
        'customer' => 'Customer',
        'plan' => 'Plan',
        'meals' => 'Daily meal selection',
        'pricing' => 'Pricing',
        'delivery' => 'Delivery & payment',
        'no_address' => 'No delivery address recorded.',
        'no_meals' => 'No meal types recorded.',
        'no_days' => 'No weekdays selected.',
    ],

    'schedule' => [
        'title' => 'Daily dishes',
        'subtitle' => 'What the customer picked for each delivery day.',
        'download_pdf' => 'Download PDF',
        'chef_choice' => 'Chef’s pick',
        'empty' => 'No dish calendar was saved with this subscription.',
        'pdf_title' => 'Meal calendar — #:reference',
    ],
];
