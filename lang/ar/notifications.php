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
        'settings_saved' => 'تم حفظ إعدادات إشعارات البريد.',
    ],

    'kpi' => [
        'unread' => 'غير مقروءة',
        'sent_today' => 'إيميلات اليوم',
        'remaining' => 'المتبقي اليوم',
        'unlimited' => 'بدون حد',
        'recipients' => 'موظفون يستلمون البريد',
    ],

    'settings' => [
        'title' => 'إشعارات البريد للموظفين',
        'intro' => 'حدد أي موظف يستلم إيميل عند طلب متجر أو اشتراك جديد أو إيقاف أو تغيير وجبات. هذه الصفحة منفصلة عن إشعارات الجرس أعلى لوحة التحكم.',
        'master' => 'تفعيل إيميلات الموظفين',
        'master_hint' => 'عند الإيقاف لا يُرسل أي إيميل للموظفين نهائياً، مع الإبقاء على الاختيارات أدناه كما هي.',
        'master_off' => 'إيميلات الموظفين متوقفة حالياً.',
        'quota_reached_title' => 'بلغ البريد الحد اليومي',
        'quota_reached' => 'أُرسلت :sent رسالة من أصل :limit مسموح بها اليوم، ولن يستلم الموظفون أي إشعارات بالبريد حتى بداية اليوم التالي. أما رموز الدخول ورسائل العملاء فتُرسل كالمعتاد.',
        'recipients_title' => 'من يستلم ماذا',
        'matrix_hint' => 'ضع علامة تحت كل نوع يستلمه الموظف بالبريد. «مفعّل» في رأس العمود يشغّل أو يوقف هذا النوع للجميع.',
        'staff' => 'الموظف',
        'staff_hint' => 'يظهر هنا الموظفون النشطون الذين لديهم بريد. رمز التحقق وإيميلات العملاء لا تتأثر بهذه الصفحة.',
        'no_staff' => 'لا يوجد موظفون نشطون لديهم بريد.',
        'enabled' => 'مفعّل',
        'columns' => [
            'email_order_placed' => 'طلب متجر',
            'email_subscription_started' => 'اشتراك جديد',
            'email_subscription_paused' => 'إيقاف اشتراك',
            'email_subscription_meals_changed' => 'تغيير وجبات',
        ],
    ],

    'mail' => [
        'action' => 'فتح في لوحة التحكم',
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
            'paused' => [
                'title' => 'إيقاف اشتراك',
                'body' => 'أوقف :customer الاشتراك رقم :reference ابتداءً من :date.',
            ],
            'resumed' => [
                'title' => 'استئناف اشتراك',
                'body' => 'استأنف :customer الاشتراك رقم :reference — يرجع التوصيل من :date.',
            ],
            'meals_changed' => [
                'title' => 'تغيير وجبات اشتراك',
                'body' => 'غيّر :customer وجبات الاشتراك رقم :reference — عدد الأيام المتغيرة: :count، ابتداءً من :date.',
            ],
        ],
        'consultation' => [
            'booked' => [
                'title' => 'استشارة جديدة',
                'body' => 'استشارة رقم :reference من :customer — :when.',
            ],
        ],
        'shipment' => [
            'alert' => [
                'title' => 'تنبيه شحنة والم',
                'body' => 'الشحنة :reference (:customer): :problem',
            ],
        ],
    ],

    'shipment_problems' => [
        'failed' => 'تعذّر التسليم للعميل',
        'pickup_failed' => 'تعذّر الاستلام من الفرع',
        'cancelled' => 'أُلغيت المهمة من جهة والم',
        'cancel_failed' => 'أُلغي الطلب هنا لكن تعذّر إلغاء المهمة في والم — ألغها يدوياً',
    ],
];
