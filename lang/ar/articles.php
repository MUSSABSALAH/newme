<?php

declare(strict_types=1);

return [
    'title' => 'المقالات',
    'subtitle' => 'إدارة مقالات المدونة الصحية.',
    'add' => 'إضافة مقال',
    'create_title' => 'إنشاء مقال',
    'edit_title' => 'تعديل مقال',
    'no_articles' => 'لا توجد مقالات بعد.',
    'confirm_delete' => 'هل تريد أرشفة هذا المقال؟',

    'columns' => [
        'article' => 'المقال',
        'category' => 'التصنيف',
        'status' => 'الحالة',
    ],

    'status' => [
        'active' => 'منشور',
        'inactive' => 'مخفي',
    ],

    'sections' => [
        'basics' => 'المعلومات الأساسية',
        'content' => 'المحتوى',
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
        'author_ar' => 'الكاتب (عربي)',
        'author_en' => 'الكاتب (إنجليزي)',
        'read_time_ar' => 'وقت القراءة (عربي)',
        'read_time_en' => 'وقت القراءة (إنجليزي)',
        'body_1_ar' => 'الفقرة ١ (عربي)',
        'body_1_en' => 'الفقرة ١ (إنجليزي)',
        'body_2_ar' => 'الفقرة ٢ (عربي)',
        'body_2_en' => 'الفقرة ٢ (إنجليزي)',
        'highlight_ar' => 'الإبراز (عربي)',
        'highlight_en' => 'الإبراز (إنجليزي)',
        'body_3_ar' => 'الفقرة ٣ (عربي)',
        'body_3_en' => 'الفقرة ٣ (إنجليزي)',
        'cta_label_ar' => 'نص الزر (عربي)',
        'cta_label_en' => 'نص الزر (إنجليزي)',
        'cta_url' => 'رابط الزر',
        'image' => 'الصورة',
        'is_active' => 'منشور',
        'sort_order' => 'ترتيب العرض',
    ],

    'hints' => [
        'slug' => 'اتركه فارغاً ليُولَّد من العنوان الإنجليزي.',
        'cta_url' => 'مثال: /store أو /subscribe#plan=muscle',
    ],

    'messages' => [
        'created' => 'تم إنشاء المقال بنجاح.',
        'updated' => 'تم تحديث المقال بنجاح.',
        'archived' => 'تمت أرشفة المقال بنجاح.',
    ],
];
