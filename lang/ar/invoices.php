<?php

declare(strict_types=1);

return [
    'title' => 'الفواتير',
    'subtitle' => 'الفواتير الضريبية الصادرة بعد تأكيد الدفع.',
    'no_invoices' => 'لا توجد فواتير بعد.',
    'download' => 'تنزيل PDF',
    'pending' => 'تُصدر بعد تأكيد الدفع.',
    'issued_total' => 'إجمالي الصادر',

    'filter_source' => 'المصدر',
    'all_sources' => 'كل المصادر',
    'search' => 'البحث بالرقم',
    'search_placeholder' => 'INV-…',

    'sources' => [
        'order' => 'طلب متجر',
        'subscription' => 'اشتراك',
    ],

    'fields' => [
        'number' => 'رقم الفاتورة',
        'customer' => 'العميل',
        'source' => 'المصدر',
        'issued_at' => 'تاريخ الإصدار',
        'total' => 'الإجمالي',
        'reference' => 'مرتبطة بـ',
    ],

    'card' => [
        'title' => 'الفاتورة',
    ],

    'mail' => [
        'subject' => 'فاتورتك :number',
        'greeting' => 'مرحبًا،',
        'intro' => 'فاتورتك :number بمبلغ :total ريال جاهزة.',
        'attached' => 'ملف PDF مرفق بهذا البريد.',
        'action' => 'تنزيل الفاتورة',
    ],

    'pdf' => [
        'title' => 'فاتورة ضريبية',
        'number' => 'رقم الفاتورة',
        'issued_at' => 'تاريخ الإصدار',
        'seller' => 'البائع',
        'buyer' => 'المشتري',
        'vat_number' => 'الرقم الضريبي',
        'description' => 'الوصف',
        'quantity' => 'الكمية',
        'unit_price' => 'سعر الوحدة',
        'line_total' => 'المبلغ',
        'lines_total' => 'مجموع البنود',
        'discount' => 'الخصم',
        'net' => 'المبلغ الخاضع للضريبة',
        'tax' => 'ضريبة القيمة المضافة (:rate%)',
        'total' => 'الإجمالي',
        'currency' => 'ريال',
        'qr_hint' => 'رمز ZATCA',
        'reference' => 'المرجع #:reference',
        'generated' => 'صادرة من New Me',
        'delivery_line' => 'رسوم التوصيل',
        'subscription_line' => ':plan — :days يوم توصيل',
    ],
];
