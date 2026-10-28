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
        'settings_saved' => 'Email notification settings saved.',
    ],

    'kpi' => [
        'unread' => 'Unread',
        'sent_today' => 'Emails today',
        'remaining' => 'Remaining today',
        'unlimited' => 'No cap',
        'recipients' => 'Staff receiving email',
    ],

    'settings' => [
        'title' => 'Staff email notifications',
        'intro' => 'Choose which staff are emailed for a store order, a new subscription, a pause or a meal change. This page is separate from the bell notifications in the top bar.',
        'master' => 'Send staff emails',
        'master_hint' => 'When off, no staff email is sent at all; the choices below are kept.',
        'master_off' => 'Staff emails are currently turned off.',
        'quota_reached_title' => 'Daily email limit reached',
        'quota_reached' => ':sent of :limit emails allowed today have been sent. Staff will not receive any email alerts until the next day starts. Login codes and customer emails still go out as usual.',
        'recipients_title' => 'Who gets what',
        'matrix_hint' => 'Tick each type a staff member should get by email. "On" in a column header turns that type on or off for everyone.',
        'staff' => 'Staff member',
        'staff_hint' => 'Active staff with an email address are listed. Login codes and customer emails are not affected by this page.',
        'no_staff' => 'There are no active staff with an email address.',
        'enabled' => 'On',
        'columns' => [
            'email_order_placed' => 'Store order',
            'email_subscription_started' => 'New subscription',
            'email_subscription_paused' => 'Subscription paused',
            'email_subscription_meals_changed' => 'Meals changed',
        ],
    ],

    'mail' => [
        'action' => 'Open in the admin panel',
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
