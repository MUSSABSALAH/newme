<?php

declare(strict_types=1);

return [
    'title' => 'الاستشارات',
    'subtitle' => 'حجوزات الاستشارات الواردة من الموقع.',
    'no_consultations' => 'لا توجد استشارات بعد.',

    'filter_status' => 'الحالة',
    'all_statuses' => 'كل الحالات',

    'messages' => [
        'booked' => 'تم تأكيد حجز استشارتك بنجاح.',
        'status_updated' => 'تم حفظ الاستشارة.',
    ],

    'mail' => [
        'subject' => 'تم حجز استشارتك — :when',
        'greeting' => 'مرحبًا :name،',
        'intro' => 'حُجز موعد استشارتك الغذائية. نتطلع للقائك.',
        'when' => 'الموعد: :when',
        'reference' => 'المرجع: :reference',
        'goal' => 'الهدف: :goal',
        'call_ahead' => 'سنتصل بك قبل الموعد بـ 15 دقيقة.',
        'action' => 'عرض استشاراتي',
        'outro' => 'تحتاج تغيير الوقت؟ رد على هذا البريد أو تواصل معنا.',
    ],

    'errors' => [
        'invalid_slot' => 'الموعد المختار غير متاح ضمن جدول الاستشارات.',
        'slot_taken' => 'هذا الموعد محجوز مسبقاً. اختر وقتاً آخر.',
        'non_working_day' => 'اليوم المختار ليس ضمن أيام عمل الاستشارات.',
        'invalid_transition' => 'لا يمكن نقل الاستشارة من «:from» إلى «:to».',
    ],

    'statuses' => [
        'pending' => 'قيد الانتظار',
        'confirmed' => 'مؤكّدة',
        'completed' => 'تمّت الاستشارة',
        'no_show' => 'العميل لم يحضر',
        'cancelled' => 'ملغاة',
    ],

    'fields' => [
        'reference' => 'المرجع',
        'customer_name' => 'الاسم',
        'customer_email' => 'البريد الإلكتروني',
        'goal' => 'الهدف',
        'scheduled_on' => 'التاريخ',
        'starts_at' => 'تبدأ',
        'ends_at' => 'تنتهي',
        'slot' => 'الوقت',
        'status' => 'الحالة',
        'notes' => 'ملاحظات المستشار',
        'created_at' => 'تاريخ الطلب',
    ],

    'show' => [
        'schedule' => 'الموعد',
        'customer' => 'بيانات العميل',
        'change_status' => 'تغيير الحالة',
        'status_locked' => 'هذه الاستشارة في حالة نهائية — يمكنك تحديث الملاحظات فقط.',
        'notes_hint' => 'ملاحظات داخلية للمستشار (لا تظهر للعميل).',
        'notes_placeholder' => 'مثال: تم الاتفاق على خطة أسبوعين، أو سبب عدم الحضور…',
    ],
];
