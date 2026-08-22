<?php

declare(strict_types=1);

return [
    'fields' => [
        'measured_on' => 'Measured on',
        'weight_kg' => 'Weight',
        'height_cm' => 'Height',
        'waist_cm' => 'Waist',
        'hip_cm' => 'Hips',
        'chest_cm' => 'Chest',
        'arm_cm' => 'Arm',
        'neck_cm' => 'Neck',
        'body_fat_percent' => 'Body fat',
        'bmi' => 'BMI',
        'notes' => 'Notes',
    ],

    'units' => [
        'kg' => 'kg',
        'cm' => 'cm',
        'percent' => '%',
    ],

    'bmi' => [
        'underweight' => 'Underweight',
        'normal' => 'Healthy weight',
        'overweight' => 'Overweight',
        'obese' => 'Obese',
    ],

    'account' => [
        'progress' => 'Your progress',
        'progress_hint' => 'Every reading you logged, spaced by the dates you took them.',
        'current_weight' => 'Current weight',
        'measured_on' => 'Recorded on :date',
        'total_change' => 'Change since your first reading',
        'no_change' => 'No change',
        'since' => 'Since :date',
        'empty' => 'No readings yet. Start with today’s weight to follow your progress through every plan.',
        'add' => 'Log a new reading',
        'add_hint' => 'Only the weight is required; the rest are optional. Logging a date you already recorded updates that reading instead of repeating it.',
        'save' => 'Save reading',
        'delete' => 'Delete',
        'delete_confirm' => 'Delete this reading from the history?',
    ],

    'admin' => [
        'title' => 'Body measurements',
        'empty' => 'This customer has not recorded any measurements yet.',
        'change' => 'Change',
        'summary' => ':count readings · latest :date',
    ],
];
