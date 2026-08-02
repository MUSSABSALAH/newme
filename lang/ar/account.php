<?php

declare(strict_types=1);

return [
    'back' => 'العودة إلى حسابي',

    'nav' => [
        'account' => 'حسابي',
        'login' => 'تسجيل الدخول',
    ],

    'tabs' => [
        'profile' => 'بياناتي',
        'addresses' => 'عناويني',
        'subscriptions' => 'اشتراكاتي',
        'orders' => 'طلباتي',
    ],

    'fields' => [
        'name' => 'الاسم الكامل',
        'email' => 'البريد الإلكتروني',
        'phone' => 'رقم الجوال',
        'password' => 'كلمة المرور',
        'password_confirm' => 'تأكيد كلمة المرور',
        'current_password' => 'كلمة المرور الحالية',
        'new_password' => 'كلمة المرور الجديدة',
        'remember' => 'إبقائي مسجّل الدخول',
    ],

    'login' => [
        'title' => 'تسجيل الدخول',
        'heading' => 'أهلاً بعودتك',
        'subtitle' => 'سجّل دخولك لإتمام الطلب وإدارة اشتراكاتك.',
        'submit' => 'تسجيل الدخول',
        'no_account' => 'ليس لديك حساب؟',
        'register_link' => 'أنشئ حساباً',
        'forgot' => 'نسيت كلمة المرور؟',
    ],

    'passwords' => [
        'request_title' => 'استعادة كلمة المرور',
        'request_heading' => 'نسيت كلمة المرور؟',
        'request_subtitle' => 'أدخل بريدك الإلكتروني وسنرسل لك رابط استعادة.',
        'send_link' => 'إرسال رابط الاستعادة',
        'back_to_login' => 'العودة لتسجيل الدخول',

        'reset_title' => 'تعيين كلمة مرور جديدة',
        'reset_heading' => 'اختر كلمة مرور جديدة',
        'reset_subtitle' => 'أدخل كلمة مرور جديدة لحسابك.',
        'reset_action' => 'تعيين كلمة المرور',
    ],

    'register' => [
        'title' => 'إنشاء حساب',
        'heading' => 'أنشئ حسابك',
        'subtitle' => 'لن يستغرق الأمر سوى دقيقة للبدء.',
        'submit' => 'إنشاء الحساب',
        'have_account' => 'لديك حساب بالفعل؟',
        'login_link' => 'تسجيل الدخول',
    ],

    'messages' => [
        'registered' => 'أهلاً بك في New Me! حسابك جاهز.',
        'profile_updated' => 'تم تحديث بياناتك.',
        'address_saved' => 'تم حفظ العنوان.',
        'address_deleted' => 'تم حذف العنوان.',
        'address_default' => 'تم تعيين العنوان الافتراضي.',
        'meals_updated' => 'تم حفظ اختيار الوجبات.',
    ],

    'dashboard' => [
        'title' => 'حسابي',
        'greeting' => 'مرحباً، :name',
        'logout' => 'تسجيل الخروج',
        'orders' => 'طلباتي',
        'subscriptions' => 'اشتراكاتي',
        'no_orders' => 'لا توجد لديك طلبات بعد.',
        'no_subscriptions' => 'لا توجد لديك اشتراكات بعد.',
        'no_addresses' => 'لا توجد عناوين محفوظة بعد.',
        'profile_hint' => 'حدّث اسمك ورقم جوالك وبريدك.',
        'password_hint' => 'اترك الحقول فارغة للإبقاء على كلمة المرور الحالية.',
        'save_profile' => 'حفظ البيانات',
        'add_address' => 'إضافة عنوان',
        'edit_address' => 'تعديل',
        'delete_address' => 'حذف',
        'set_default' => 'جعله افتراضياً',
        'has_invoice' => 'فاتورة',
        'view' => 'عرض',
    ],

    'delivery' => [
        'title' => 'التوصيل والدفع',
        'address' => 'عنوان التوصيل',
    ],

    'order' => [
        'title' => 'تفاصيل الطلب',
        'ref' => 'طلب',
        'items' => 'صنف',
        'subtotal' => 'المجموع',
        'discount' => 'الخصم',
        'total' => 'الإجمالي',
        'whatsapp' => 'التأكيد عبر واتساب',
    ],

    'subscription' => [
        'title' => 'تفاصيل الاشتراك',
        'meals' => 'الوجبات',
        'duration' => 'المدة',
        'total_days' => 'إجمالي الأيام',
        'start' => 'تاريخ البدء',
        'subtotal' => 'المجموع الفرعي',
        'discount' => 'الخصم',
        'coupon' => 'كود الخصم',
        'delivery' => 'التوصيل',
        'tax' => 'ضريبة القيمة المضافة',
        'total' => 'الإجمالي',
        'schedule' => 'أطباق كل يوم',
        'schedule_hint' => 'يمكنك تغيير الوجبات حتى قبل :days يوم/أيام من التوصيل.',
        'schedule_locked' => 'مقفل — داخل مهلة التغيير.',
        'legend_editable' => 'اضغط للتعديل',
        'legend_locked' => 'يوم مقفل',
        'tap_to_edit' => 'اضغط للتعديل',
        'close_editor' => 'إغلاق',
        'chef_choice' => 'اختيار الشيف',
        'save_meals' => 'حفظ اختيار الوجبات',
        'save_day' => 'حفظ هذا اليوم',
        'no_schedule' => 'لا يوجد تقويم وجبات لهذا الاشتراك.',
    ],

    'invoice' => [
        'title' => 'الفاتورة',
        'download' => 'تنزيل PDF',
        'none' => 'لا توجد فاتورة لهذا الطلب بعد.',
        'none_subscription' => 'لا توجد فاتورة لهذا الاشتراك بعد.',
    ],
];
