<?php

declare(strict_types=1);

return [
    'title' => 'سجل التدقيق',
    'subtitle' => 'سجل بالتغييرات الحساسة عبر المنصّة.',
    'no_logs' => 'لا توجد سجلات تدقيق بعد.',
    'filter_by_action' => 'تصفية حسب الإجراء',
    'all_actions' => 'كل الإجراءات',
    'system_actor' => 'النظام',
    'target_line' => ':type رقم :id',

    'fields' => [
        'time' => 'التوقيت',
        'actor' => 'بواسطة',
        'action' => 'الإجراء',
        'target' => 'العنصر',
        'request_id' => 'معرّف الطلب',
    ],

    'targets' => [
        'user' => 'مستخدم',
        'role' => 'دور',
        'invitation' => 'دعوة',
        'plan' => 'باقة',
        'meal' => 'وجبة',
    ],

    'actions' => [
        'role' => [
            'created' => 'إنشاء دور',
            'updated' => 'تعديل دور',
            'deleted' => 'حذف دور',
        ],
        'user' => [
            'invited' => 'دعوة مستخدم',
            'updated' => 'تعديل مستخدم',
            'activated' => 'تفعيل مستخدم',
            'deactivated' => 'تعطيل مستخدم',
            'password_reset' => 'إعادة تعيين كلمة المرور',
        ],
        'invitation' => [
            'resent' => 'إعادة إرسال دعوة',
            'accepted' => 'قبول دعوة',
        ],
        'settings' => [
            'updated' => 'تحديث الإعدادات',
        ],
        'plan' => [
            'created' => 'إنشاء باقة',
            'updated' => 'تعديل باقة',
            'archived' => 'أرشفة باقة',
        ],
        'plan_version' => [
            'published' => 'نشر إصدار باقة',
        ],
        'plan_pricing' => [
            'updated' => 'تحديث أسعار باقة',
        ],
        'plan_meals' => [
            'updated' => 'تحديث وجبات باقة',
        ],
        'meal' => [
            'created' => 'إنشاء وجبة',
            'updated' => 'تعديل وجبة',
            'archived' => 'أرشفة وجبة',
        ],
    ],
];
