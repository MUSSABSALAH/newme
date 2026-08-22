<?php

declare(strict_types=1);

return [
    'title' => 'Recipes',
    'subtitle' => 'Manage kitchen recipes.',
    'add' => 'Add recipe',
    'create_title' => 'Create recipe',
    'edit_title' => 'Edit recipe',
    'no_recipes' => 'No recipes yet.',
    'confirm_delete' => 'Archive this recipe?',

    'columns' => [
        'recipe' => 'Recipe',
        'category' => 'Category',
        'status' => 'Status',
    ],

    'status' => [
        'active' => 'Published',
        'inactive' => 'Hidden',
    ],

    'sections' => [
        'basics' => 'Basics',
        'meta' => 'Details',
        'lists' => 'Ingredients & method',
        'cta' => 'Call to action',
        'media' => 'Media',
    ],

    'fields' => [
        'slug' => 'Slug',
        'category_ar' => 'Category (AR)',
        'category_en' => 'Category (EN)',
        'title_ar' => 'Title (AR)',
        'title_en' => 'Title (EN)',
        'excerpt_ar' => 'Excerpt (AR)',
        'excerpt_en' => 'Excerpt (EN)',
        'meta_title_ar' => 'Subtitle (AR)',
        'meta_title_en' => 'Subtitle (EN)',
        'time_label_ar' => 'Time (AR)',
        'time_label_en' => 'Time (EN)',
        'kcal_label_ar' => 'Calories (AR)',
        'kcal_label_en' => 'Calories (EN)',
        'protein_label_ar' => 'Protein (AR)',
        'protein_label_en' => 'Protein (EN)',
        'servings_label_ar' => 'Servings (AR)',
        'servings_label_en' => 'Servings (EN)',
        'ingredients_ar' => 'Ingredients (AR — one per line)',
        'ingredients_en' => 'Ingredients (EN — one per line)',
        'steps_ar' => 'Steps (AR — one per line)',
        'steps_en' => 'Steps (EN — one per line)',
        'cta_label_ar' => 'CTA label (AR)',
        'cta_label_en' => 'CTA label (EN)',
        'cta_url' => 'CTA URL',
        'image' => 'Image',
        'is_active' => 'Published',
        'sort_order' => 'Sort order',
    ],

    'hints' => [
        'slug' => 'Leave blank to generate from the English title.',
        'lists' => 'One item per line.',
        'cta_url' => 'Example: /store or /product',
    ],

    'messages' => [
        'created' => 'Recipe created successfully.',
        'updated' => 'Recipe updated successfully.',
        'archived' => 'Recipe archived successfully.',
    ],
];
