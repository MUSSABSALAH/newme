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
        'confirm' => 'Confirmed',
        'dispatch' => 'Out for delivery',
        'deliver' => 'Delivered',
        'fail' => 'Not delivered',
        'confirm_fail' => 'Confirm',
    ],

    'statuses' => [
        'pending' => 'Waiting',
        'confirmed' => 'Confirmed',
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

    'walim' => [
        'title' => 'Walim',
        'send' => 'Send to Walim',
        'resend' => 'Send to Walim again',
        'send_all' => 'Send today’s deliveries to Walim',
        'send_all_confirm' => 'Every unsent delivery of this day will be sent to Walim. Continue?',
        'cancel' => 'Cancel at Walim',
        'cancel_confirm' => 'The delivery task will be cancelled at Walim. Continue?',
        'track' => 'Track',
        'waybill' => 'Waybill',
        'waybills' => 'Waybills for the day',
        'failed_reason' => 'Walim: delivery failed (driver: :fleet)',
        'statuses' => [
            'pending' => 'Not sent',
            'sent' => 'Sent',
            'on_the_way' => 'On the way',
            'delivered' => 'Delivered',
            'failed' => 'Failed',
            'cancelled' => 'Cancelled',
        ],
        'job_statuses' => [
            0 => 'Assigned',
            1 => 'Started',
            2 => 'Successful',
            3 => 'Failed',
            4 => 'Arrived',
            6 => 'Unassigned',
            7 => 'Accepted',
            8 => 'Declined',
            9 => 'Cancelled',
            10 => 'Deleted',
        ],
        'task' => [
            'order' => 'Store order #:reference · :items items',
            'subscription' => 'Subscription #:reference · :date',
            'collect' => 'Collect on delivery: SAR :amount',
            'paid' => 'Prepaid',
        ],
        'messages' => [
            'sent' => 'Shipment sent to Walim.',
            'cancelled' => 'Shipment cancelled at Walim.',
            'batch' => ':sent sent, :skipped skipped (already sent or done), :failed failed.',
        ],
        'errors' => [
            'not_configured' => 'Enter the Walim API key in settings first.',
            'not_enabled' => 'Sending to Walim is not enabled for this kind of shipment in settings.',
            'unreachable' => 'Walim could not be reached. Please try again.',
            'unexpected' => 'Unexpected response from Walim (:code).',
            'rejected' => 'Walim rejected the request: :message',
            'no_address' => 'There is no delivery address on file.',
            'pickup_order' => 'This order is picked up at the branch and needs no delivery.',
            'order_not_open' => 'Only confirmed orders that are not finished or cancelled can be sent.',
            'stop_settled' => 'This delivery is already settled.',
            'already_sent' => 'This shipment was already sent to Walim.',
            'busy' => 'This shipment is being sent right now; wait a moment.',
            'not_created' => 'Walim did not create a task for this delivery.',
        ],
    ],

    'waybill' => [
        'title' => 'Waybill',
        'store_order' => 'Store order',
        'subscription' => 'Subscription',
        'recipient' => 'Recipient',
        'contents' => 'Contents',
        'note' => 'Note',
        'collect' => 'Amount to collect',
        'sar' => 'SAR',
        'paid' => 'Paid — nothing to collect',
        'job_id' => 'Walim task no.',
        'empty' => 'No shipments have been sent to Walim.',
    ],
];
