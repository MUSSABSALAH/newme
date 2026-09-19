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
        'social' => 'Social media',
        'localization' => 'Localization',
        'authentication' => 'Authentication',
        'finance' => 'Finance & Tax',
        'delivery' => 'Delivery fees',
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
        'social' => [
            'whatsapp' => 'WhatsApp',
            'instagram' => 'Instagram',
            'tiktok' => 'TikTok',
            'snapchat' => 'Snapchat',
            'x' => 'X (Twitter)',
            'linkedin' => 'LinkedIn',
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
        'delivery' => [
            'fee_mode' => 'How the fee is calculated',
            'free_above' => 'Free delivery when the invoice reaches',
            'fixed_amount' => 'Fixed amount',
            'included_km' => 'Included distance (km)',
            'included_price' => 'Price for the included distance',
            'price_per_km' => 'Price per kilometre after that',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'Stock reservation (minutes)',
            'payment_timeout_minutes' => 'Payment timeout (minutes)',
            'subscription_min_start_days' => 'Minimum days before subscription start',
            'meal_change_lead_days' => 'Meal change window (days)',
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
        'social' => [
            'whatsapp' => 'Full link such as https://wa.me/9665xxxxxxxx. Leave empty to hide the icon.',
            'instagram' => 'Full profile URL. Leave empty to hide the icon.',
            'tiktok' => 'Full profile URL. Leave empty to hide the icon.',
            'snapchat' => 'Full profile URL. Leave empty to hide the icon.',
            'x' => 'Full profile URL. Leave empty to hide the icon.',
            'linkedin' => 'Full page URL. The NewMeKSA company page is used when this is empty.',
        ],
        'authentication' => [
            'sms_otp' => 'When enabled, a one-time code is sent by SMS to verify the customer’s phone.',
            'email_otp' => 'When enabled, a one-time code is sent by email to verify the customer’s address.',
        ],
        'finance' => [
            'tax_rate' => 'Applied to taxable amounts during pricing.',
            'prices_include_tax' => 'When enabled, entered prices are treated as tax-inclusive.',
        ],
        'delivery' => [
            'fee_mode' => 'Fixed = the same amount on every order. By distance = a price for the first kilometres, then a per-km rate after that.',
            'free_above' => 'Delivery is free once the invoice reaches this amount or more. 0 = no free-delivery threshold. In SAR.',
            'fixed_amount' => 'The same amount on every order, regardless of distance. In SAR.',
            'included_km' => 'Leave at 0 to charge every kilometre from the start. Example: 15 means the first 15 km are a flat price.',
            'included_price' => 'Amount for the included distance. 0 = those kilometres are free.',
            'price_per_km' => 'Charged on kilometres beyond the included distance. In SAR per km.',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'How long stock stays reserved for an unpaid order.',
            'payment_timeout_minutes' => 'How long a pending payment stays valid.',
            'subscription_min_start_days' => 'Earliest start is today plus this many days (e.g. 1 = tomorrow).',
            'meal_change_lead_days' => 'How many upcoming days the customer may change meals for, starting tomorrow. 2 = tomorrow and the day after. Today is not included.',
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
        'delivery' => [
            'fee_mode' => [
                'fixed' => 'Fixed amount',
                'distance' => 'By distance',
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
