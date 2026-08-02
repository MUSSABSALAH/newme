<?php

declare(strict_types=1);

return [
    'title' => 'الفئات',
    'subtitle' => 'تنظيم المتجر في فئات وفئات فرعية.',
    'add' => 'إضافة فئة',
    'create_title' => 'إنشاء فئة',
    'edit_title' => 'تعديل فئة',
    'no_categories' => 'لا توجد فئات بعد.',
    'confirm_delete' => 'هل تريد أرشفة هذه الفئة؟ ستتم أرشفة منتجاتها معها.',
    'parent_none' => 'بدون (فئة رئيسية)',

    'columns' => [
        'name' => 'الفئة',
        'parent' => 'الفئة الأم',
        'products' => 'المنتجات',
        'status' => 'الحالة',
    ],

    'status' => [
        'active' => 'مفعّلة',
        'inactive' => 'غير مفعّلة',
    ],

    'sections' => [
        'basics' => 'المعلومات الأساسية',
        'media' => 'الوسائط',
    ],

    'fields' => [
        'parent' => 'الفئة الأم',
        'slug' => 'المُعرّف (slug)',
        'name_ar' => 'الاسم (بالعربية)',
        'name_en' => 'الاسم (بالإنجليزية)',
        'description_ar' => 'الوصف (بالعربية)',
        'description_en' => 'الوصف (بالإنجليزية)',
        'image' => 'الصورة',
        'is_active' => 'مفعّلة',
        'sort_order' => 'ترتيب العرض',
    ],

    'messages' => [
        'created' => 'تم إنشاء الفئة بنجاح.',
        'updated' => 'تم تحديث الفئة بنجاح.',
        'archived' => 'تمت أرشفة الفئة بنجاح.',
    ],
];
