<?php

declare(strict_types=1);

return [
    'title' => 'الوصفات',
    'subtitle' => 'إدارة وصفات المطبخ.',
    'add' => 'إضافة وصفة',
    'create_title' => 'إنشاء وصفة',
    'edit_title' => 'تعديل وصفة',
    'no_recipes' => 'لا توجد وصفات بعد.',
    'confirm_delete' => 'هل تريد أرشفة هذه الوصفة؟',

    'columns' => [
        'recipe' => 'الوصفة',
        'category' => 'التصنيف',
        'status' => 'الحالة',
    ],

    'status' => [
        'active' => 'منشورة',
        'inactive' => 'مخفية',
    ],

    'sections' => [
        'basics' => 'المعلومات الأساسية',
        'meta' => 'التفاصيل',
        'lists' => 'المكونات والطريقة',
        'cta' => 'دعوة الإجراء',
        'media' => 'الوسائط',
    ],

    'fields' => [
        'slug' => 'المعرّف (slug)',
        'category_ar' => 'التصنيف (عربي)',
        'category_en' => 'التصنيف (إنجليزي)',
        'title_ar' => 'العنوان (عربي)',
        'title_en' => 'العنوان (إنجليزي)',
        'excerpt_ar' => 'المقتطف (عربي)',
        'excerpt_en' => 'المقتطف (إنجليزي)',
        'meta_title_ar' => 'عنوان فرعي (عربي)',
        'meta_title_en' => 'عنوان فرعي (إنجليزي)',
        'time_label_ar' => 'الوقت (عربي)',
        'time_label_en' => 'الوقت (إنجليزي)',
        'kcal_label_ar' => 'السعرات (عربي)',
        'kcal_label_en' => 'السعرات (إنجليزي)',
        'protein_label_ar' => 'البروتين (عربي)',
        'protein_label_en' => 'البروتين (إنجليزي)',
        'servings_label_ar' => 'الحصص (عربي)',
        'servings_label_en' => 'الحصص (إنجليزي)',
        'ingredients_ar' => 'المكونات (عربي — سطر لكل عنصر)',
        'ingredients_en' => 'المكونات (إنجليزي — سطر لكل عنصر)',
        'steps_ar' => 'الخطوات (عربي — سطر لكل خطوة)',
        'steps_en' => 'الخطوات (إنجليزي — سطر لكل خطوة)',
        'cta_label_ar' => 'نص الزر (عربي)',
        'cta_label_en' => 'نص الزر (إنجليزي)',
        'cta_url' => 'رابط الزر',
        'image' => 'الصورة',
        'is_active' => 'منشورة',
        'sort_order' => 'ترتيب العرض',
    ],

    'hints' => [
        'slug' => 'اتركه فارغاً ليُولَّد من العنوان الإنجليزي.',
        'lists' => 'سطر واحد لكل عنصر.',
        'cta_url' => 'مثال: /store أو /product',
    ],

    'messages' => [
        'created' => 'تم إنشاء الوصفة بنجاح.',
        'updated' => 'تم تحديث الوصفة بنجاح.',
        'archived' => 'تمت أرشفة الوصفة بنجاح.',
    ],
];
