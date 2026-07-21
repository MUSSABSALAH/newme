<?php

declare(strict_types=1);

return [
    'required' => 'حقل :attribute مطلوب.',
    'string' => 'يجب أن يكون حقل :attribute نصاً.',
    'integer' => 'يجب أن يكون حقل :attribute رقماً صحيحاً.',
    'boolean' => 'يجب أن تكون قيمة حقل :attribute صحيحة أو خاطئة.',
    'email' => 'يجب أن يكون حقل :attribute بريداً إلكترونياً صالحاً.',
    'max' => [
        'string' => 'يجب ألا يزيد حقل :attribute عن :max حرفاً.',
    ],
    'min' => [
        'string' => 'يجب ألا يقل حقل :attribute عن :min حرفاً.',
    ],

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'name' => 'الاسم',
    ],
];
