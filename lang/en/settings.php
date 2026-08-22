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
        'authentication' => 'Authentication',
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
        'authentication' => [
            'sms_otp' => 'SMS OTP',
            'email_otp' => 'Email OTP',
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
            'subscription_pause_lead_days' => 'Subscription pause lead time (days before delivery)',
            'subscription_resume_lead_days' => 'Meal restart lead time after resume (days)',
            'consultation_working_days' => 'Consultation working days',
            'consultation_hours_start' => 'Consultations start at',
            'consultation_hours_end' => 'Consultations end at',
            'consultation_duration_minutes' => 'Consultation duration (minutes)',
        ],
        'policies' => [
            'cancellation_ar' => 'Cancellation policy (Arabic)',
            'cancellation_en' => 'Cancellation policy (English)',
            'refund_ar' => 'Refund policy (Arabic)',
            'refund_en' => 'Refund policy (English)',
        ],
    ],

    'hints' => [
        'authentication' => [
            'sms_otp' => 'When enabled, a one-time code is sent by SMS to verify the customer’s phone.',
            'email_otp' => 'When enabled, a one-time code is sent by email to verify the customer’s address.',
        ],
        'finance' => [
            'tax_rate' => 'Applied to taxable amounts during pricing.',
            'prices_include_tax' => 'When enabled, entered prices are treated as tax-inclusive.',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'How long stock stays reserved for an unpaid order.',
            'payment_timeout_minutes' => 'How long a pending payment stays valid.',
            'subscription_min_start_days' => 'Earliest start is today plus this many days (e.g. 1 = tomorrow).',
            'meal_change_lead_days' => 'Days before a delivery day when meal changes are still allowed.',
            'subscription_pause_lead_days' => 'Days before a delivery day when the customer may still pause or freeze the subscription.',
            'subscription_resume_lead_days' => 'Days after resume before delivery days start again on the calendar (e.g. 1 = tomorrow).',
            'consultation_working_days' => 'Weekdays available for booking consultations on the website.',
            'consultation_hours_start' => 'Earliest time a consultation may start.',
            'consultation_hours_end' => 'Latest time consultations must finish by (slots are generated so each visit ends at or before this time).',
            'consultation_duration_minutes' => 'Length of each bookable slot — appointments are generated from start to end using this duration.',
        ],
    ],

    'validation' => [
        'consultation_end_after_start' => 'End time must be after start time.',
        'consultation_duration_too_long' => 'Consultation duration is longer than the working window.',
    ],

    'options' => [
        'localization' => [
            'default_locale' => [
                'ar' => 'Arabic',
                'en' => 'English',
            ],
        ],
        'operations' => [
            'consultation_working_days' => [
                'sun' => 'Sunday',
                'mon' => 'Monday',
                'tue' => 'Tuesday',
                'wed' => 'Wednesday',
                'thu' => 'Thursday',
                'fri' => 'Friday',
                'sat' => 'Saturday',
            ],
        ],
    ],
];
