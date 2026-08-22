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
        'authentication' => 'المصادقة',
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
        'authentication' => [
            'sms_otp' => 'رمز التحقق عبر الرسائل النصية',
            'email_otp' => 'رمز التحقق عبر البريد الإلكتروني',
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
            'subscription_pause_lead_days' => 'مهلة إيقاف الاشتراك (أيام قبل التوصيل)',
            'subscription_resume_lead_days' => 'مهلة تفعيل الوجبات بعد الاستئناف (أيام)',
            'consultation_working_days' => 'أيام عمل الاستشارات',
            'consultation_hours_start' => 'تبدأ الاستشارات من',
            'consultation_hours_end' => 'تنتهي الاستشارات في',
            'consultation_duration_minutes' => 'مدة كل استشارة (دقائق)',
        ],
        'policies' => [
            'cancellation_ar' => 'سياسة الإلغاء (بالعربية)',
            'cancellation_en' => 'سياسة الإلغاء (بالإنجليزية)',
            'refund_ar' => 'سياسة الاسترجاع (بالعربية)',
            'refund_en' => 'سياسة الاسترجاع (بالإنجليزية)',
        ],
    ],

    'hints' => [
        'authentication' => [
            'sms_otp' => 'عند التفعيل يُرسل رمز لمرة واحدة برسالة نصية للتحقق من جوال العميل.',
            'email_otp' => 'عند التفعيل يُرسل رمز لمرة واحدة بالبريد للتحقق من عنوان العميل.',
        ],
        'finance' => [
            'tax_rate' => 'تُطبَّق على المبالغ الخاضعة للضريبة أثناء التسعير.',
            'prices_include_tax' => 'عند التفعيل، تُعامَل الأسعار المُدخَلة كشاملة للضريبة.',
        ],
        'operations' => [
            'stock_reservation_minutes' => 'مدة بقاء المخزون محجوزًا لطلب غير مدفوع.',
            'payment_timeout_minutes' => 'مدة صلاحية عملية الدفع المعلّقة.',
            'subscription_min_start_days' => 'أقل عدد أيام من اليوم يقدر العميل يختار بعده تاريخ البداية (مثلاً 1 = بكرة).',
            'meal_change_lead_days' => 'عدد الأيام قبل يوم التوصيل اللي يُسمح فيه بتغيير الوجبة.',
            'subscription_pause_lead_days' => 'عدد الأيام قبل يوم التوصيل اللي يُسمح فيه للعميل بتجميد أو إيقاف الاشتراك.',
            'subscription_resume_lead_days' => 'عدد الأيام بعد التفعيل قبل ما ترجع أيام التوصيل تشتغل على التقويم (مثلاً 1 = بكرة).',
            'consultation_working_days' => 'الأيام المتاحة لحجز الاستشارات في الواجهة.',
            'consultation_hours_start' => 'أول موعد ممكن لبدء استشارة.',
            'consultation_hours_end' => 'آخر وقت تنتهي فيه الاستشارات (السلوت يُحسب بحيث تنتهي قبل أو عند هذا الوقت).',
            'consultation_duration_minutes' => 'مدة السلوت الواحد — تظهر المواعيد من وقت البداية حتى النهاية بهذه المدة.',
        ],
    ],

    'validation' => [
        'consultation_end_after_start' => 'وقت الانتهاء يجب أن يكون بعد وقت البداية.',
        'consultation_duration_too_long' => 'مدة الاستشارة أطول من نافذة العمل المحددة.',
    ],

    'options' => [
        'localization' => [
            'default_locale' => [
                'ar' => 'العربية',
                'en' => 'الإنجليزية',
            ],
        ],
        'operations' => [
            'consultation_working_days' => [
                'sun' => 'الأحد',
                'mon' => 'الإثنين',
                'tue' => 'الثلاثاء',
                'wed' => 'الأربعاء',
                'thu' => 'الخميس',
                'fri' => 'الجمعة',
                'sat' => 'السبت',
            ],
        ],
    ],
];
