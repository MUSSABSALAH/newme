<?php

declare(strict_types=1);

return [
    'title' => 'Settings',
    'subtitle' => 'Manage general platform configuration.',

    'messages' => [
        'saved' => 'Settings saved successfully.',
    ],

    'groups' => [
        'company' => 'Company',
        'localization' => 'Localization',
        'finance' => 'Finance & Tax',
        'operations' => 'Operations',
        'policies' => 'Policies',
    ],

    'fields' => [
        'company' => [
            'name_ar' => 'Company name (Arabic)',
            'name_en' => 'Company name (English)',
            'tax_number' => 'Tax number',
            'email' => 'Contact email',
            'phone' => 'Contact phone',
            'address_ar' => 'Address (Arabic)',
            'address_en' => 'Address (English)',
        ],
        'localization' => [
            'default_locale' => 'Default language',
            'timezone' => 'Timezone',
        ],
        'finance' => [
            'currency' => 'Currency',
            'tax_rate' => 'Tax rate (%)',
            'prices_include_tax' => 'Prices include tax',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'Stock reservation (minutes)',
            'payment_timeout_minutes' => 'Payment timeout (minutes)',
            'subscription_min_start_days' => 'Minimum days before subscription start',
            'meal_change_lead_days' => 'Meal change lead time (days)',
        ],
        'policies' => [
            'cancellation_ar' => 'Cancellation policy (Arabic)',
            'cancellation_en' => 'Cancellation policy (English)',
            'refund_ar' => 'Refund policy (Arabic)',
            'refund_en' => 'Refund policy (English)',
        ],
    ],

    'hints' => [
        'finance' => [
            'tax_rate' => 'Applied to taxable amounts during pricing.',
            'prices_include_tax' => 'When enabled, entered prices are treated as tax-inclusive.',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'How long stock stays reserved for an unpaid order.',
            'payment_timeout_minutes' => 'How long a pending payment stays valid.',
            'subscription_min_start_days' => 'Earliest start is today plus this many days (e.g. 1 = tomorrow).',
            'meal_change_lead_days' => 'Days before a delivery day when meal changes are still allowed.',
        ],
    ],

    'options' => [
        'localization' => [
            'default_locale' => [
                'ar' => 'Arabic',
                'en' => 'English',
            ],
        ],
    ],
];
