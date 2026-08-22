<?php

declare(strict_types=1);

return [
    'title' => 'Articles',
    'subtitle' => 'Manage health blog articles.',
    'add' => 'Add article',
    'create_title' => 'Create article',
    'edit_title' => 'Edit article',
    'no_articles' => 'No articles yet.',
    'confirm_delete' => 'Archive this article?',

    'columns' => [
        'article' => 'Article',
        'category' => 'Category',
        'status' => 'Status',
    ],

    'status' => [
        'active' => 'Published',
        'inactive' => 'Hidden',
    ],

    'sections' => [
        'basics' => 'Basics',
        'content' => 'Content',
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
        'author_ar' => 'Author (AR)',
        'author_en' => 'Author (EN)',
        'read_time_ar' => 'Read time (AR)',
        'read_time_en' => 'Read time (EN)',
        'body_1_ar' => 'Paragraph 1 (AR)',
        'body_1_en' => 'Paragraph 1 (EN)',
        'body_2_ar' => 'Paragraph 2 (AR)',
        'body_2_en' => 'Paragraph 2 (EN)',
        'highlight_ar' => 'Highlight (AR)',
        'highlight_en' => 'Highlight (EN)',
        'body_3_ar' => 'Paragraph 3 (AR)',
        'body_3_en' => 'Paragraph 3 (EN)',
        'cta_label_ar' => 'CTA label (AR)',
        'cta_label_en' => 'CTA label (EN)',
        'cta_url' => 'CTA URL',
        'image' => 'Image',
        'is_active' => 'Published',
        'sort_order' => 'Sort order',
    ],

    'hints' => [
        'slug' => 'Leave blank to generate from the English title.',
        'cta_url' => 'Example: /store or /subscribe#plan=muscle',
    ],

    'messages' => [
        'created' => 'Article created successfully.',
        'updated' => 'Article updated successfully.',
        'archived' => 'Article archived successfully.',
    ],
];
