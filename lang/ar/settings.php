<?php

declare(strict_types=1);

return [
    'title' => 'الإعدادات',
    'subtitle' => 'إدارة الإعدادات العامة للمنصّة.',

    'messages' => [
        'saved' => 'تم حفظ الإعدادات بنجاح.',
    ],

    'groups' => [
        'company' => 'بيانات الشركة',
        'localization' => 'اللغة والتوقيت',
        'finance' => 'المالية والضريبة',
        'operations' => 'العمليات',
        'policies' => 'السياسات',
    ],

    'fields' => [
        'company' => [
            'name_ar' => 'اسم الشركة (بالعربية)',
            'name_en' => 'اسم الشركة (بالإنجليزية)',
            'tax_number' => 'الرقم الضريبي',
            'email' => 'البريد الإلكتروني للتواصل',
            'phone' => 'رقم الهاتف للتواصل',
            'address_ar' => 'العنوان (بالعربية)',
            'address_en' => 'العنوان (بالإنجليزية)',
        ],
        'localization' => [
            'default_locale' => 'اللغة الافتراضية',
            'timezone' => 'المنطقة الزمنية',
        ],
        'finance' => [
            'currency' => 'العملة',
            'tax_rate' => 'نسبة الضريبة (%)',
            'prices_include_tax' => 'الأسعار شاملة الضريبة',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'مهلة حجز المخزون (دقائق)',
            'payment_timeout_minutes' => 'مهلة الدفع (دقائق)',
            'subscription_min_start_days' => 'أقل مدة قبل بدء الاشتراك (أيام)',
            'meal_change_lead_days' => 'مهلة تغيير الوجبات (أيام)',
        ],
        'policies' => [
            'cancellation_ar' => 'سياسة الإلغاء (بالعربية)',
            'cancellation_en' => 'سياسة الإلغاء (بالإنجليزية)',
            'refund_ar' => 'سياسة الاسترجاع (بالعربية)',
            'refund_en' => 'سياسة الاسترجاع (بالإنجليزية)',
        ],
    ],

    'hints' => [
        'finance' => [
            'tax_rate' => 'تُطبَّق على المبالغ الخاضعة للضريبة أثناء التسعير.',
            'prices_include_tax' => 'عند التفعيل، تُعامَل الأسعار المُدخَلة كشاملة للضريبة.',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'مدة بقاء المخزون محجوزًا لطلب غير مدفوع.',
            'payment_timeout_minutes' => 'مدة صلاحية عملية الدفع المعلّقة.',
            'subscription_min_start_days' => 'أقل عدد أيام من اليوم يقدر العميل يختار بعده تاريخ البداية (مثلاً 1 = بكرة).',
            'meal_change_lead_days' => 'عدد الأيام قبل يوم التوصيل اللي يُسمح فيه بتغيير الوجبة.',
        ],
    ],

    'options' => [
        'localization' => [
            'default_locale' => [
                'ar' => 'العربية',
                'en' => 'الإنجليزية',
            ],
        ],
    ],
];
