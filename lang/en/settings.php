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
        'shipping' => 'Delivery & distance',
        'delivery' => 'In-house delivery fees',
        'delivery_walim' => 'Walim delivery fees',
        'walim' => 'Walim connection (API)',
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
        'shipping' => [
            'store_provider' => 'Store orders are delivered by',
            'subscription_provider' => 'Subscriptions are delivered by',
            'distance_method' => 'Distance method',
            'road_factor' => 'Road factor (Haversine)',
            'google_route_preference' => 'Route choice (Google)',
            'google_traffic' => 'Traffic (Google)',
            'google_avoid_highways' => 'Avoid highways (Google)',
            'google_avoid_tolls' => 'Avoid toll roads (Google)',
            'google_maps_key' => 'Google Maps API key',
            'origin_lat' => 'New Me branch latitude',
            'origin_lng' => 'New Me branch longitude',
        ],
        'delivery_walim' => [
            'fee_mode' => 'How the fee is calculated',
            'free_above' => 'Free delivery when the invoice reaches',
            'fixed_amount' => 'Fixed amount',
            'included_km' => 'Included distance (km)',
            'included_price' => 'Price for the included distance',
            'price_per_km' => 'Price per kilometre after that',
        ],
        'walim' => [
            'api_key' => 'Walim API key',
            'shared_secret' => 'Webhook shared secret',
            'team_id' => 'Team ID',
            'auto_assignment' => 'Auto-assign tasks to drivers',
            'pickup_name' => 'Pickup point name',
            'pickup_phone' => 'Pickup point phone',
            'pickup_address' => 'Pickup point address',
            'pickup_lead_minutes' => 'Pickup lead time from the New Me branch (minutes)',
            'delivery_window_minutes' => 'Delivery window after pickup (minutes)',
            'subscription_pickup_time' => 'Subscription pickup time',
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
        'shipping' => [
            'store_provider' => 'Chooses which fee set applies to store orders. Not shown to customers. With Walim, a “Send to Walim” button appears on the shipments board.',
            'subscription_provider' => 'With Walim, each subscription delivery gets a send button, plus one to send all of the day’s deliveries at once.',
            'distance_method' => 'Haversine = straight-line distance × road factor, free of charge. Google = actual driving distance from the Google Routes API (chosen by the route settings below). If Google is unavailable, Haversine is used automatically.',
            'road_factor' => 'Multiplies the straight-line distance to approximate the road distance. Example: 1.30.',
            'google_route_preference' => 'Google suggests several routes. Shortest = fewest kilometres (best for fees). Fastest = least time, which can be longer in km because it prefers ring roads and highways.',
            'google_traffic' => 'Ignore traffic = a stable distance that does not change with the time of day (recommended). Current traffic = Google may pick a different route depending on traffic at measuring time, so the same address can get a different distance, and it may cost more on Google.',
            'google_avoid_highways' => 'Leaves highways out when choosing the route. Often fewer km inside the city, but it can take longer.',
            'google_avoid_tolls' => 'Leaves toll roads out, if any.',
            'google_maps_key' => 'Only needed for the Google method. Stored encrypted; leave empty to keep the current key.',
            'origin_lat' => 'Where deliveries start. Example: 24.7136',
            'origin_lng' => 'Where deliveries start. Example: 46.6753',
        ],
        'delivery_walim' => [
            'fee_mode' => 'Fixed = the same amount on every order. By distance = a price for the first kilometres, then a per-km rate after that.',
            'free_above' => 'Delivery is free once the invoice reaches this amount or more. 0 = no free-delivery threshold. In SAR.',
            'fixed_amount' => 'The same amount on every order, regardless of distance. In SAR.',
            'included_km' => 'Example: 15 means the first 15 km are a flat price.',
            'included_price' => 'Amount for the included distance.',
            'price_per_km' => 'Charged pro rata on the distance beyond the included kilometres (no rounding up). In SAR per km.',
        ],
        'walim' => [
            'api_key' => 'From the Walim dashboard: Settings > API Keys. Stored encrypted; leave blank to keep the current key.',
            'shared_secret' => 'A secret value you choose (e.g. 32 random characters). Walim sends it with every status update and requests without it are rejected. After saving, press “Register the secret with Walim”.',
            'team_id' => 'From the Walim dashboard: More > Teams. Leave blank if you do not use teams.',
            'auto_assignment' => 'When on, Walim assigns the task to a driver of the team; otherwise it is created unassigned.',
            'pickup_name' => 'The name the driver sees for the pickup. The location comes from the New Me branch coordinates.',
            'pickup_phone' => 'Leave blank to use the company phone.',
            'pickup_address' => 'Leave blank to use the company address.',
            'pickup_lead_minutes' => 'Pickup time = time sent + this many minutes.',
            'delivery_window_minutes' => 'Deliver-by time = pickup time + this many minutes.',
            'subscription_pickup_time' => 'Planned pickup time for subscription deliveries on the delivery day. If it has passed, now + the pickup lead time is used.',
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

    'secret' => [
        'saved' => '•••••••• (saved — leave empty to keep it)',
        'empty' => 'Not set',
    ],

    'walim_secret' => [
        'webhook_url' => 'Webhook URL (paste it into the Walim dashboard)',
        'intro' => 'Add this URL in the Walim dashboard (Notifications > Webhook) so every task status update reaches us.',
        'run' => 'Register the secret with Walim',
        'running' => 'Registering…',
        'done' => 'The shared secret is registered with Walim.',
        'missing' => 'Enter the API key and the shared secret first.',
        'failed' => 'Registration failed. Please try again.',
    ],

    'distance_test' => [
        'intro' => 'Key and distance test: measures from the New Me branch to a sample point with both methods, using the values typed in the form (even before saving); empty fields fall back to the saved settings.',
        'lat' => 'Sample point latitude',
        'lng' => 'Sample point longitude',
        'run' => 'Test distance',
        'running' => 'Measuring…',
        'haversine' => 'Haversine',
        'google' => 'Google',
        'google_failed' => 'Google unavailable',
        'failed' => 'The test failed. Check the coordinates.',
        'no_origin' => 'Set the New Me branch location and save the settings first.',
        'km' => 'km',
        'minutes' => 'min',
        'routes' => 'suggested routes',
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
        'delivery_walim' => [
            'fee_mode' => [
                'fixed' => 'Fixed amount',
                'distance' => 'By distance',
            ],
        ],
        'shipping' => [
            'store_provider' => [
                'internal' => 'In-house delivery',
                'walim' => 'Walim',
            ],
            'subscription_provider' => [
                'internal' => 'In-house delivery',
                'walim' => 'Walim',
            ],
            'distance_method' => [
                'haversine' => 'Haversine (straight line × road factor)',
                'google' => 'Google (actual driving distance)',
            ],
            'google_route_preference' => [
                'shortest' => 'Shortest distance',
                'fastest' => 'Fastest time',
            ],
            'google_traffic' => [
                'unaware' => 'Ignore traffic',
                'aware' => 'Use current traffic',
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
