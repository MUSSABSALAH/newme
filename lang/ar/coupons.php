<?php

declare(strict_types=1);

return [
    'title' => 'أكواد الخصم',
    'subtitle' => 'إنشاء وإدارة أكواد الخصم للمتجر والاشتراكات.',
    'add' => 'إضافة كود',
    'create_title' => 'إنشاء كود خصم',
    'edit_title' => 'تعديل كود الخصم',
    'no_coupons' => 'لا توجد أكواد خصم بعد.',
    'confirm_delete' => 'أرشفة كود الخصم هذا؟',

    'filter_scope' => 'تصفية بالنطاق',
    'all_scopes' => 'كل النطاقات',

    'columns' => [
        'code' => 'الكود',
        'value' => 'الخصم',
        'scope' => 'النطاق',
        'usage' => 'الاستخدام',
        'window' => 'الصلاحية',
        'status' => 'الحالة',
    ],

    'status' => [
        'active' => 'نشط',
        'inactive' => 'غير نشط',
    ],

    'window' => [
        'always' => 'بلا حد زمني',
    ],

    'sections' => [
        'basics' => 'الأساسيات',
        'discount' => 'الخصم',
        'limits' => 'الحدود والصلاحية',
    ],

    'fields' => [
        'code' => 'الكود',
        'code_hint' => 'حروف وأرقام وشرطات. يُحفظ بأحرف كبيرة.',
        'name_ar' => 'اسم الحملة (عربي)',
        'name_en' => 'اسم الحملة (إنجليزي)',
        'type' => 'نوع الخصم',
        'scope' => 'مكان التطبيق',
        'percent_off' => 'نسبة الخصم (%)',
        'amount_off' => 'مبلغ الخصم',
        'amount_off_hint' => 'بالـ <span class="icon-saudi-riyal" aria-hidden="true"></span>، مثال 25.00',
        'max_discount' => 'أقصى خصم',
        'max_discount_hint' => 'سقف للخصم النسبي. اتركه فارغاً لبلا سقف.',
        'min_subtotal' => 'أدنى قيمة للسلة',
        'min_subtotal_hint' => 'يُرفض الكود تحت هذا المجموع. 0 = بلا حد أدنى.',
        'max_redemptions' => 'إجمالي مرات الاستخدام',
        'max_redemptions_hint' => 'اتركه فارغاً لاستخدام غير محدود.',
        'max_redemptions_per_user' => 'مرات الاستخدام لكل عميل',
        'max_redemptions_per_user_hint' => 'اتركه فارغاً لاستخدام غير محدود.',
        'starts_at' => 'يبدأ في',
        'expires_at' => 'ينتهي في',
        'timezone_hint' => 'بتوقيت :timezone.',
        'is_active' => 'نشط',
        'redemptions_count' => 'عدد مرات الاستخدام',
    ],

    'types' => [
        'percentage' => 'نسبة مئوية',
        'fixed' => 'مبلغ ثابت',
    ],

    'scopes' => [
        'store' => 'المتجر فقط',
        'subscriptions' => 'الاشتراكات فقط',
        'all' => 'المتجر والاشتراكات',
    ],

    'rejections' => [
        'not_found' => 'كود الخصم هذا غير صحيح.',
        'not_started' => 'كود الخصم هذا لم يبدأ بعد.',
        'expired' => 'انتهت صلاحية كود الخصم هذا.',
        'exhausted' => 'وصل كود الخصم هذا إلى حدّ الاستخدام.',
        'already_used' => 'لقد استخدمت كود الخصم هذا مسبقاً.',
        'below_minimum' => 'يتطلب هذا الكود مجموعاً لا يقل عن :amount ريال.',
        'scope_mismatch' => 'لا يمكن استخدام كود الخصم هذا هنا.',
    ],

    'messages' => [
        'created' => 'تم إنشاء كود الخصم بنجاح.',
        'updated' => 'تم تحديث كود الخصم بنجاح.',
        'archived' => 'تم أرشفة كود الخصم بنجاح.',
        'applied' => 'تم تطبيق كود الخصم.',
        'removed' => 'تم إزالة كود الخصم.',
    ],
];
