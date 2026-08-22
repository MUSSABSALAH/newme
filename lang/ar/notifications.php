<?php

declare(strict_types=1);

return [
    'title' => 'الإشعارات',
    'subtitle' => 'ما يحتاج انتباهك من نشاط المتجر.',
    'view_all' => 'عرض كل الإشعارات',
    'unknown_event' => 'إشعار',
    'unknown_customer' => 'أحد العملاء',

    'filters' => [
        'all' => 'الكل',
        'unread' => 'غير المقروءة',
        'read' => 'المقروءة',
    ],

    'status' => [
        'unread' => 'غير مقروء',
        'read' => 'مقروء',
    ],

    'messages' => [
        'all_read' => 'تم تعليم كل الإشعارات كمقروءة.',
    ],

    // Nested to match the dotted NotificationEvent values (events.order.placed).
    'events' => [
        'order' => [
            'placed' => [
                'title' => 'طلب جديد',
                'body' => 'الطلب رقم :reference من :customer — :total ريال.',
            ],
        ],
        'subscription' => [
            'started' => [
                'title' => 'اشتراك جديد',
                'body' => 'الاشتراك رقم :reference من :customer — :total ريال.',
            ],
        ],
        'consultation' => [
            'booked' => [
                'title' => 'استشارة جديدة',
                'body' => 'استشارة رقم :reference من :customer — :when.',
            ],
        ],
    ],
];
