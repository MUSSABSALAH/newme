<?php

declare(strict_types=1);

return [
    'accepted' => 'يجب قبول حقل :attribute.',
    'after' => 'يجب أن يكون حقل :attribute تاريخاً بعد :date.',
    'after_or_equal' => 'يجب أن يكون حقل :attribute تاريخاً بعد أو يساوي :date.',
    'alpha_dash' => 'يجوز أن يحتوي حقل :attribute على حروف وأرقام وشرطات فقط.',
    'array' => 'يجب أن يكون حقل :attribute قائمة.',
    'before' => 'يجب أن يكون حقل :attribute تاريخاً قبل :date.',
    'before_or_equal' => 'يجب أن يكون حقل :attribute تاريخاً قبل أو يساوي :date.',
    'boolean' => 'يجب أن تكون قيمة حقل :attribute صحيحة أو خاطئة.',
    'confirmed' => 'تأكيد حقل :attribute غير متطابق.',
    'current_password' => 'كلمة المرور الحالية غير صحيحة.',
    'date' => 'حقل :attribute ليس تاريخاً صالحاً.',
    'date_format' => 'حقل :attribute لا يطابق الصيغة :format.',
    'digits' => 'يجب أن يتكون حقل :attribute من :digits أرقام.',
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
    'email' => 'يجب أن يكون حقل :attribute بريداً إلكترونياً صالحاً.',
    'exists' => 'قيمة حقل :attribute غير صحيحة.',
    'gte' => [
        'numeric' => 'يجب ألا يقل حقل :attribute عن :value.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'قيمة حقل :attribute غير صحيحة.',
    'integer' => 'يجب أن يكون حقل :attribute رقماً صحيحاً.',
    'max' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصر.',
        'file' => 'يجب ألا يزيد حجم حقل :attribute عن :max كيلوبايت.',
        'numeric' => 'يجب ألا تزيد قيمة حقل :attribute عن :max.',
        'string' => 'يجب ألا يزيد حقل :attribute عن :max حرفاً.',
    ],
    'mimes' => 'يجب أن يكون حقل :attribute ملفاً من نوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :min عنصر على الأقل.',
        'numeric' => 'يجب ألا تقل قيمة حقل :attribute عن :min.',
        'string' => 'يجب ألا يقل حقل :attribute عن :min حرفاً.',
    ],
    'numeric' => 'يجب أن يكون حقل :attribute رقماً.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف كبير وحرف صغير.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'ظهرت قيمة حقل :attribute في تسريب بيانات. اختر قيمة أخرى.',
    ],
    'regex' => 'صيغة حقل :attribute غير صحيحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب.',
    'required_with' => 'حقل :attribute مطلوب عند إدخال :values.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'string' => 'يجب أن يكون حقل :attribute نصاً.',
    'unique' => 'قيمة حقل :attribute مستخدمة من قبل.',
    'url' => 'صيغة حقل :attribute غير صحيحة.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'name' => 'الاسم',
        'phone' => 'رقم الجوال',
        'phone_dial' => 'مفتاح الدولة',
        'phone_national' => 'رقم الجوال',
        'birth_date' => 'تاريخ الميلاد',
        'allergies' => 'الحساسية',
        'medications' => 'الأدوية',
        'current_password' => 'كلمة المرور الحالية',
    ],
];
