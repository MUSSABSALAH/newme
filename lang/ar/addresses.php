<?php

declare(strict_types=1);

return [

    'title' => 'عناوين التوصيل',
    'default' => 'الافتراضي',

    'fields' => [
        'address' => 'عنوان التوصيل',
        'label' => 'اسم العنوان',
        'recipient_name' => 'اسم المستلم',
        'phone' => 'رقم الجوال',
        'city' => 'المدينة',
        'district' => 'الحي',
        'street' => 'الشارع والمبنى',
        'national_address' => 'العنوان الوطني',
        'details' => 'تفاصيل إضافية',
        'is_default' => 'اجعله عنواني الافتراضي',
    ],

    'placeholders' => [
        'label' => 'المنزل، العمل…',
        'national_address' => 'مثال: RRRD2929',
        'details' => 'الدور، الشقة، علامة مميزة…',
    ],

    'map' => [
        'pick' => 'اختر من الخريطة',
        'hint' => 'حرّك الدبوس داخل مدينة الرياض لتعبئة العنوان والعنوان الوطني.',
        'locating' => 'جاري تحديد موقعك…',
    ],

    'errors' => [
        'outside_riyadh' => 'لا يمكن توصيل طلبك',
    ],

];
