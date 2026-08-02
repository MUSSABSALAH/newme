<?php

declare(strict_types=1);

return [
    'title' => 'Discount codes',
    'subtitle' => 'Create and manage coupon codes for the store and subscriptions.',
    'add' => 'Add code',
    'create_title' => 'Create discount code',
    'edit_title' => 'Edit discount code',
    'no_coupons' => 'No discount codes yet.',
    'confirm_delete' => 'Archive this discount code?',

    'filter_scope' => 'Filter by scope',
    'all_scopes' => 'All scopes',

    'columns' => [
        'code' => 'Code',
        'value' => 'Discount',
        'scope' => 'Scope',
        'usage' => 'Used',
        'window' => 'Valid',
        'status' => 'Status',
    ],

    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],

    'window' => [
        'always' => 'No time limit',
    ],

    'sections' => [
        'basics' => 'Basics',
        'discount' => 'Discount',
        'limits' => 'Limits & validity',
    ],

    'fields' => [
        'code' => 'Code',
        'code_hint' => 'Letters, numbers, dashes. Saved in upper case.',
        'name_ar' => 'Campaign name (Arabic)',
        'name_en' => 'Campaign name (English)',
        'type' => 'Discount type',
        'scope' => 'Where it applies',
        'percent_off' => 'Percentage off (%)',
        'amount_off' => 'Amount off',
        'amount_off_hint' => 'In <span class="icon-saudi-riyal" aria-hidden="true"></span>, e.g. 25.00',
        'max_discount' => 'Maximum discount',
        'max_discount_hint' => 'Caps a percentage code. Leave empty for no cap.',
        'min_subtotal' => 'Minimum basket',
        'min_subtotal_hint' => 'The code is rejected below this subtotal. 0 = no minimum.',
        'max_redemptions' => 'Total uses',
        'max_redemptions_hint' => 'Leave empty for unlimited.',
        'max_redemptions_per_user' => 'Uses per customer',
        'max_redemptions_per_user_hint' => 'Leave empty for unlimited.',
        'starts_at' => 'Starts at',
        'expires_at' => 'Expires at',
        'timezone_hint' => ':timezone time.',
        'is_active' => 'Active',
        'redemptions_count' => 'Times used',
    ],

    'types' => [
        'percentage' => 'Percentage',
        'fixed' => 'Fixed amount',
    ],

    'scopes' => [
        'store' => 'Store only',
        'subscriptions' => 'Subscriptions only',
        'all' => 'Store and subscriptions',
    ],

    'rejections' => [
        'not_found' => 'This discount code is not valid.',
        'not_started' => 'This discount code is not active yet.',
        'expired' => 'This discount code has expired.',
        'exhausted' => 'This discount code has reached its usage limit.',
        'already_used' => 'You have already used this discount code.',
        'below_minimum' => 'This code requires a minimum of :amount SAR.',
        'scope_mismatch' => 'This discount code cannot be used here.',
    ],

    'messages' => [
        'created' => 'Discount code created successfully.',
        'updated' => 'Discount code updated successfully.',
        'archived' => 'Discount code archived successfully.',
        'applied' => 'Discount code applied.',
        'removed' => 'Discount code removed.',
    ],
];
