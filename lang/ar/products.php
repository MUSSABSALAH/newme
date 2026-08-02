<?php

declare(strict_types=1);

return [
    'title' => 'المنتجات',
    'subtitle' => 'إدارة كتالوج منتجات المتجر.',
    'add' => 'إضافة منتج',
    'create_title' => 'إنشاء منتج',
    'edit_title' => 'تعديل منتج',
    'no_products' => 'لا توجد منتجات بعد.',
    'confirm_delete' => 'هل تريد أرشفة هذا المنتج؟',
    'currency' => '<span class="icon-saudi-riyal" aria-hidden="true"></span>',

    'filter_category' => 'تصفية حسب الفئة',
    'all_categories' => 'كل الفئات',
    'select_category' => 'اختر فئة',
    'flag_none' => 'بدون شارة',
    'serving_none' => 'غير محدد',
    'note_none' => 'غير محدد',

    'columns' => [
        'product' => 'المنتج',
        'category' => 'الفئة',
        'price' => 'السعر',
        'flag' => 'الشارة',
        'status' => 'الحالة',
    ],

    'status' => [
        'active' => 'مفعّل',
        'inactive' => 'غير مفعّل',
        'featured' => 'مميّز',
    ],

    'sections' => [
        'basics' => 'المعلومات الأساسية',
        'pricing' => 'التسعير والروابط',
        'nutrition' => 'القيم الغذائية',
        'media' => 'الوسائط',
    ],

    'fields' => [
        'category' => 'الفئة',
        'slug' => 'المُعرّف (slug)',
        'name_ar' => 'الاسم (بالعربية)',
        'name_en' => 'الاسم (بالإنجليزية)',
        'description_ar' => 'الوصف (بالعربية)',
        'description_en' => 'الوصف (بالإنجليزية)',
        'price' => 'السعر',
        'price_hint' => 'بالريال، مثال: 23.00',
        'external_url' => 'رابط المنتج',
        'calories' => 'السعرات (سعرة)',
        'serving_size' => 'حجم الحصة',
        'protein_g' => 'البروتين (جم)',
        'carbs_g' => 'الكربوهيدرات (جم)',
        'fat_g' => 'الدهون (جم)',
        'nutrition_note' => 'ملاحظة القيم الغذائية',
        'flag' => 'الشارة',
        'image' => 'الصورة',
        'is_featured' => 'مميّز',
        'is_active' => 'مفعّل',
        'sort_order' => 'ترتيب العرض',
    ],

    'flags' => [
        'sale' => 'خصم',
        'bestseller' => 'الأكثر مبيعًا',
        'occasions' => 'للمناسبات',
    ],

    'notes' => [
        'est' => 'قيم تقديرية',
        'real' => 'من صفحة المنتج الرسمية',
    ],

    'servings' => [
        'per_30g' => 'لكل حصة 30 جم',
        'per_45g' => 'لكل حصة 45 جم',
        'per_serving' => 'لكل حصة',
        'per_2_pieces' => 'لكل قطعتين',
        'per_piece' => 'لكل قطعة',
        'per_slice' => 'لكل شريحة',
        'per_half' => 'لكل نصف',
        'per_loaf' => 'لكل رغيف',
        'per_100g' => 'لكل 100 جم',
    ],

    'messages' => [
        'created' => 'تم إنشاء المنتج بنجاح.',
        'updated' => 'تم تحديث المنتج بنجاح.',
        'archived' => 'تمت أرشفة المنتج بنجاح.',
    ],
];
