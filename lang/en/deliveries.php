<?php

declare(strict_types=1);

return [
    'title' => 'Shipments',
    'subtitle' => 'What has to go out today: store orders and subscription deliveries.',

    'board' => [
        'today' => 'Today',
        'previous_day' => 'Previous day',
        'next_day' => 'Next day',
        'go' => 'Show',
        'empty_title' => 'Nothing to deliver on this day',
        'empty_body' => 'No orders are waiting and no subscription deliveries are scheduled for this date.',
    ],

    'kpi' => [
        'total' => 'Shipments',
        'remaining' => 'Still to deliver',
        'done' => 'Completed',
    ],

    'sections' => [
        'subscriptions' => 'Subscription deliveries',
        'orders' => 'Store orders',
        'no_stops' => 'No subscription deliveries on this day.',
        'no_orders' => 'No orders are waiting for delivery.',
        'stop_count' => '{0} no deliveries|{1} one delivery|[2,*] :count deliveries',
        'order_count' => '{0} no orders|{1} one order|[2,*] :count orders',
    ],

    'fields' => [
        'address' => 'Address',
        'no_address' => 'No address on file',
        'phone' => 'Phone',
        'meals' => 'Meals',
        'parcel' => 'Order',
        'item_count' => '{0} no items|{1} one item|[2,*] :count items',
        'collect_cash' => 'Collect cash on delivery',
        'reason_placeholder' => 'Why it was not delivered',
    ],

    'actions' => [
        'dispatch' => 'Out for delivery',
        'deliver' => 'Delivered',
        'fail' => 'Not delivered',
        'confirm_fail' => 'Confirm',
    ],

    'statuses' => [
        'pending' => 'Waiting',
        'dispatched' => 'Out for delivery',
        'delivered' => 'Delivered',
        'failed' => 'Not delivered',
    ],

    'messages' => [
        'stop_updated' => 'Delivery updated.',
        'order_updated' => 'Order updated.',
    ],

    'errors' => [
        'not_scheduled' => 'This subscription has no delivery scheduled on that date.',
        'invalid_transition' => 'Cannot move the delivery from “:from” to “:to”.',
    ],
];
