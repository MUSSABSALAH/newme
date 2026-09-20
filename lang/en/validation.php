<?php

declare(strict_types=1);

return [
    'accepted' => 'The :attribute must be accepted.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The current password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'digits' => 'The :attribute must be :digits digits.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute field must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'integer' => 'The :attribute field must be an integer.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute field must not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute field must be at least :min characters.',
    ],
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'same' => 'The :attribute and :other must match.',
    'string' => 'The :attribute field must be a string.',
    'unique' => 'The :attribute has already been taken.',
    'url' => 'The :attribute format is invalid.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'email' => 'email',
        'password' => 'password',
        'name' => 'name',
        'phone' => 'phone number',
        'phone_dial' => 'country code',
        'phone_national' => 'phone number',
        'birth_date' => 'date of birth',
        'allergies' => 'allergies',
        'medications' => 'medications',
        'current_password' => 'current password',
    ],
];
