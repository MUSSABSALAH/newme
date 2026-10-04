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
            'paused' => [
                'title' => 'Subscription paused',
                'body' => ':customer paused subscription #:reference from :date.',
            ],
            'resumed' => [
                'title' => 'Subscription resumed',
                'body' => ':customer resumed subscription #:reference — deliveries restart :date.',
            ],
            'meals_changed' => [
                'title' => 'Subscription meals changed',
                'body' => ':customer changed the dishes of subscription #:reference — days changed: :count, starting :date.',
            ],
        ],
        'consultation' => [
            'booked' => [
                'title' => 'New consultation',
                'body' => 'Consultation #:reference from :customer — :when.',
            ],
        ],
        'shipment' => [
            'alert' => [
                'title' => 'Walim shipment alert',
                'body' => 'Shipment #:reference (:customer): :problem',
            ],
        ],
    ],

    'shipment_problems' => [
        'failed' => 'could not be delivered to the customer',
        'pickup_failed' => 'could not be picked up from the branch',
        'cancelled' => 'the task was cancelled on Walim’s side',
        'cancel_failed' => 'the order was cancelled here but the Walim task could not be cancelled — cancel it by hand',
    ],
];
