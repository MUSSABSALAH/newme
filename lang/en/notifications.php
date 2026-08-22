<?php

declare(strict_types=1);

return [
    'title' => 'Notifications',
    'subtitle' => 'Store activity that needs your attention.',
    'view_all' => 'View all notifications',
    'unknown_event' => 'Notification',
    'unknown_customer' => 'a customer',

    'filters' => [
        'all' => 'All',
        'unread' => 'Unread',
        'read' => 'Read',
    ],

    'status' => [
        'unread' => 'Unread',
        'read' => 'Read',
    ],

    'messages' => [
        'all_read' => 'All notifications marked as read.',
    ],

    // Nested to match the dotted NotificationEvent values (events.order.placed).
    'events' => [
        'order' => [
            'placed' => [
                'title' => 'New order',
                'body' => 'Order #:reference from :customer — :total SAR.',
            ],
        ],
        'subscription' => [
            'started' => [
                'title' => 'New subscription',
                'body' => 'Subscription #:reference from :customer — :total SAR.',
            ],
        ],
        'consultation' => [
            'booked' => [
                'title' => 'New consultation',
                'body' => 'Consultation #:reference from :customer — :when.',
            ],
        ],
    ],
];
