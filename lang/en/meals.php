<?php

declare(strict_types=1);

return [
    'title' => 'Meals',
    'subtitle' => 'Manage the global meals catalog.',
    'add' => 'Add meal',
    'create_title' => 'Create meal',
    'edit_title' => 'Edit meal',
    'no_meals' => 'No meals yet.',
    'confirm_delete' => 'Archive this meal? It will be removed from plans.',

    'columns' => [
        'meal' => 'Meal',
        'type' => 'Type',
        'calories' => 'Calories',
        'status' => 'Status',
    ],

    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],

    'sections' => [
        'basics' => 'Basics',
        'nutrition' => 'Nutrition',
        'media' => 'Media',
    ],

    'fields' => [
        'meal_type' => 'Meal type',
        'name_ar' => 'Meal name (Arabic)',
        'name_en' => 'Meal name (English)',
        'calories' => 'Calories (kcal)',
        'protein_g' => 'Protein (g)',
        'carbs_g' => 'Carbs (g)',
        'fat_g' => 'Fat (g)',
        'image' => 'Image',
        'is_active' => 'Active',
        'sort_order' => 'Sort order',
    ],

    'types' => [
        'breakfast' => 'Breakfast',
        'lunch' => 'Lunch',
        'dinner' => 'Dinner',
        'snack' => 'Snack',
    ],

    'units' => [
        'kcal' => 'kcal',
    ],

    'messages' => [
        'created' => 'Meal created successfully.',
        'updated' => 'Meal updated successfully.',
        'archived' => 'Meal archived successfully.',
    ],
];
