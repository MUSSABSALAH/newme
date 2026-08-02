<?php

declare(strict_types=1);

return [
    'title' => 'Categories',
    'subtitle' => 'Organize the store into categories and subcategories.',
    'add' => 'Add category',
    'create_title' => 'Create category',
    'edit_title' => 'Edit category',
    'no_categories' => 'No categories yet.',
    'confirm_delete' => 'Archive this category? Its products will be archived with it.',
    'parent_none' => 'None (top-level category)',

    'columns' => [
        'name' => 'Category',
        'parent' => 'Parent',
        'products' => 'Products',
        'status' => 'Status',
    ],

    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],

    'sections' => [
        'basics' => 'Basics',
        'media' => 'Media',
    ],

    'fields' => [
        'parent' => 'Parent category',
        'slug' => 'Slug',
        'name_ar' => 'Name (Arabic)',
        'name_en' => 'Name (English)',
        'description_ar' => 'Description (Arabic)',
        'description_en' => 'Description (English)',
        'image' => 'Image',
        'is_active' => 'Active',
        'sort_order' => 'Sort order',
    ],

    'messages' => [
        'created' => 'Category created successfully.',
        'updated' => 'Category updated successfully.',
        'archived' => 'Category archived successfully.',
    ],
];
