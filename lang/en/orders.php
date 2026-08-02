<?php

declare(strict_types=1);

return [
    'title' => 'Orders',
    'subtitle' => 'Store orders placed by customers.',
    'no_orders' => 'No orders yet.',

    'filter_status' => 'Status',
    'all_statuses' => 'All statuses',

    'messages' => [
        'placed' => 'Your order has been placed. We will contact you to arrange delivery.',
        'status_updated' => 'Order status updated.',
    ],

    'errors' => [
        'empty_cart' => 'Your cart is empty.',
        'invalid_transition' => 'Cannot move the order from “:from” to “:to”.',
    ],

    'statuses' => [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'preparing' => 'Preparing',
        'out_for_delivery' => 'Out for delivery',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled',
    ],

    'fields' => [
        'reference' => 'Reference',
        'customer' => 'Customer',
        'items' => 'Items',
        'total' => 'Total',
        'status' => 'Status',
        'placed_at' => 'Placed',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'coupon' => 'Discount code',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'unit_price' => 'Unit price',
        'line_total' => 'Line total',
        'note' => 'Customer note',
    ],

    'show' => [
        'subtitle' => 'Order details',
        'summary' => 'Summary',
        'fulfillment' => 'Fulfillment',
        'change_status' => 'Change status',
        'status_locked' => 'This status is final and cannot be changed.',
        'customer' => 'Customer',
        'items' => 'Items',
        'pricing' => 'Pricing',
        'note' => 'Note',
        'delivery' => 'Delivery & payment',
        'no_address' => 'No delivery address recorded.',
    ],
];
