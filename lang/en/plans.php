<?php

declare(strict_types=1);

return [
    'title' => 'Plans',
    'subtitle' => 'Manage meal plans and their pricing.',
    'add' => 'Add plan',
    'create_title' => 'Create plan',
    'edit_title' => 'Edit plan',
    'details' => 'Plan details',
    'no_plans' => 'No plans yet.',
    'confirm_delete' => 'Archive this plan? It will no longer be available to customers.',

    'tabs' => [
        'pricing' => 'Versions & pricing',
        'meals' => 'Available meals',
    ],

    'columns' => [
        'plan' => 'Plan',
        'goal' => 'Goal',
        'status' => 'Status',
        'version' => 'Published version',
    ],

    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],

    'sections' => [
        'basics' => 'Basics',
        'basics_desc' => 'Choose the dietary goal and the plan name shown to customers.',
        'content' => 'Description & features',
        'content_desc' => 'A short description and the highlighted features (one per line).',
        'delivery' => 'Delivery',
        'delivery_desc' => 'Delivery day rules, fees and the cover image.',
    ],

    'fields' => [
        'goal' => 'Dietary goal',
        'name_ar' => 'Plan name (Arabic)',
        'name_en' => 'Plan name (English)',
        'description_ar' => 'Description (Arabic)',
        'description_en' => 'Description (English)',
        'features_ar' => 'Features (Arabic)',
        'features_en' => 'Features (English)',
        'features_hint' => 'One feature per line.',
        'image' => 'Cover image',
        'requires_day_selection' => 'Require delivery day selection',
        'requires_day_selection_hint' => 'Customers must choose which weekdays they receive meals.',
        'allows_pause' => 'Allow temporary pause',
        'allows_pause_hint' => 'When off, subscribers on this plan cannot pause their subscription.',
        'min_delivery_days_per_week' => 'Minimum delivery days per week',
        'min_delivery_days_hint' => 'Between 1 and 7 days.',
        'delivery_fee' => 'Delivery fee',
        'delivery_fee_hint' => 'Set 0 for free delivery.',
        'is_active' => 'Active',
        'is_active_hint' => 'Inactive plans are hidden from customers.',
        'sort_order' => 'Sort order',
        'image_hint' => 'PNG or JPG, up to 2 MB.',
    ],

    'goals' => [
        'weight_loss' => 'Weight Loss',
        'muscle_building' => 'Muscle Building',
        'diabetic' => 'Diabetic',
        'breastfeeding' => 'Breastfeeding',
        'balanced' => 'Balanced',
        'digestive_health' => 'Digestive Health',
        'carnivore' => 'Carnivore',
        'low_carb' => 'Low Carb',
        'vegan' => 'Vegan',
        'keto' => 'Keto',
    ],

    'units' => [
        'day' => 'Day(s)',
        'week' => 'Week(s)',
        'month' => 'Month(s)',
    ],

    'versions' => [
        'title' => 'Pricing versions',
        'label' => 'Version :number',
        'none' => 'No versions yet.',
        'current_draft' => 'Draft version being edited',
        'create_version' => 'New pricing version',
        'create_version_hint' => 'Publishing prices locks the version. Create a new one to change prices.',
        'publish' => 'Publish',
        'publish_confirm' => 'Publish this version? It will replace the current published pricing.',
        'published_at' => 'Published :date',
        'statuses' => [
            'draft' => 'Draft',
            'published' => 'Published',
            'archived' => 'Archived',
        ],
    ],

    'pricing' => [
        'title' => 'Pricing matrix',
        'subtitle' => 'Set a price and optional discount for each meal-types and duration combination.',
        'meal_types' => 'Meal types',
        'duration_unit' => 'Unit',
        'duration_length' => 'Length',
        'price' => 'Price',
        'discount' => 'Discount %',
        'add_row' => 'Add pricing row',
        'remove_row' => 'Remove',
        'empty_hint' => 'No pricing rows yet. Click “Add pricing row” to create one.',
        'no_rules' => 'No pricing rows yet.',
        'save' => 'Save pricing',
        'locked' => 'This version is published and cannot be edited.',
        'publish_title' => 'Publish pricing',
        'publish_hint' => 'Saved prices stay in a draft until published. Publishing makes them live for customers and protects existing subscriptions.',
    ],

    'meals' => [
        'title' => 'Available meals',
        'subtitle' => 'Choose which meals from the catalog customers can pick for this plan.',
        'empty' => 'No meals in the catalog yet. ',
        'save_button' => 'Save available meals',
        'saved' => 'Available meals updated successfully.',
        'none_selected' => 'No meals selected for this plan yet.',
        'select_all' => 'Select all',
    ],

    'messages' => [
        'created' => 'Plan created successfully.',
        'updated' => 'Plan updated successfully.',
        'archived' => 'Plan archived successfully.',
        'version_created' => 'A new draft pricing version was created.',
        'published' => 'Pricing version published successfully.',
        'pricing_saved' => 'Pricing saved successfully.',
    ],

    'errors' => [
        'not_available' => 'This plan is not available.',
        'rule_not_found' => 'No pricing is available for the selected options.',
        'invalid_days' => 'Please choose at least :min delivery days.',
        'published_immutable' => 'Published pricing cannot be changed. Create a new version instead.',
    ],
];
