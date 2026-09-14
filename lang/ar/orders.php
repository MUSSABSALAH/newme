<?php

declare(strict_types=1);

return [
    'title' => 'الطلبات',
    'subtitle' => 'طلبات المتجر التي أنشأها العملاء.',
    'no_orders' => 'لا توجد طلبات بعد.',

    'filter_status' => 'الحالة',
    'all_statuses' => 'كل الحالات',

    'messages' => [
        'placed' => 'تم إنشاء طلبك. سنتواصل معك لترتيب التوصيل.',
        'placed_pickup' => 'تم إنشاء طلبك. جاهز للاستلام من الفرع.',
        'status_updated' => 'تم تحديث حالة الطلب.',
    ],

    'mail' => [
        'subject' => 'تم تأكيد طلبك :reference',
        'greeting' => 'مرحبًا :name،',
        'intro' => 'شكرًا لطلبك. استلمنا الطلب :reference وبدأنا في تجهيزه.',
        'total' => 'إجمالي الطلب: :total :currency',
        'payment' => 'طريقة الدفع: :method',
        'cash_on_delivery' => 'يرجى تجهيز المبلغ عند استلام الطلب.',
        'action' => 'عرض طلبك',
        'outro' => 'سنتواصل معك لترتيب التوصيل.',
    ],

    'errors' => [
        'empty_cart' => 'سلة التسوق فارغة.',
        'invalid_transition' => 'لا يمكن نقل الطلب من «:from» إلى «:to».',
    ],

    'statuses' => [
        'pending' => 'قيد الانتظار',
        'confirmed' => 'مؤكّد',
        'preparing' => 'قيد التجهيز',
        'out_for_delivery' => 'خرج للتوصيل',
        'delivered' => 'تم التوصيل',
        'cancelled' => 'ملغى',
    ],

    'fields' => [
        'reference' => 'المرجع',
        'customer' => 'العميل',
        'items' => 'الأصناف',
        'total' => 'الإجمالي',
        'status' => 'الحالة',
        'placed_at' => 'تاريخ الإنشاء',
        'subtotal' => 'المجموع',
        'discount' => 'الخصم',
        'coupon' => 'كود الخصم',
        'product' => 'المنتج',
        'quantity' => 'الكمية',
        'unit_price' => 'سعر الوحدة',
        'line_total' => 'الإجمالي',
        'note' => 'ملاحظة العميل',
        'fulfillment_method' => 'طريقة الاستلام',
        'delivery_fee' => 'رسوم التوصيل',
    ],

    'show' => [
        'subtitle' => 'تفاصيل الطلب',
        'summary' => 'الملخّص',
        'fulfillment' => 'حالة التوصيل',
        'change_status' => 'تغيير الحالة',
        'status_locked' => 'هذه الحالة نهائية ولا يمكن تغييرها.',
        'customer' => 'العميل',
        'items' => 'الأصناف',
        'pricing' => 'التسعير',
        'note' => 'ملاحظة',
        'delivery' => 'التوصيل والدفع',
        'no_address' => 'لا يوجد عنوان توصيل مسجَّل.',
    ],
];
