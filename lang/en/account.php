<?php

declare(strict_types=1);

return [
    'back' => 'Back to account',

    'nav' => [
        'account' => 'My account',
        'login' => 'Sign in',
    ],

    'tabs' => [
        'profile' => 'My details',
        'addresses' => 'My addresses',
        'subscriptions' => 'My subscriptions',
        'orders' => 'My orders',
    ],

    'fields' => [
        'name' => 'Full name',
        'email' => 'Email',
        'phone' => 'Mobile number',
        'password' => 'Password',
        'password_confirm' => 'Confirm password',
        'current_password' => 'Current password',
        'new_password' => 'New password',
        'remember' => 'Keep me signed in',
    ],

    'login' => [
        'title' => 'Sign in',
        'heading' => 'Welcome back',
        'subtitle' => 'Sign in to check out and manage your subscriptions.',
        'submit' => 'Sign in',
        'no_account' => "Don't have an account?",
        'register_link' => 'Create one',
        'forgot' => 'Forgot your password?',
    ],

    'passwords' => [
        'request_title' => 'Reset password',
        'request_heading' => 'Forgot your password?',
        'request_subtitle' => "Enter your email and we'll send you a reset link.",
        'send_link' => 'Send reset link',
        'back_to_login' => 'Back to sign in',

        'reset_title' => 'Reset password',
        'reset_heading' => 'Choose a new password',
        'reset_subtitle' => 'Enter a new password for your account.',
        'reset_action' => 'Reset password',
    ],

    'register' => [
        'title' => 'Create account',
        'heading' => 'Create your account',
        'subtitle' => 'It only takes a minute to get started.',
        'submit' => 'Create account',
        'have_account' => 'Already have an account?',
        'login_link' => 'Sign in',
    ],

    'messages' => [
        'registered' => 'Welcome to New Me! Your account is ready.',
        'profile_updated' => 'Your details were updated.',
        'address_saved' => 'Address saved.',
        'address_deleted' => 'Address deleted.',
        'address_default' => 'Default address updated.',
        'meals_updated' => 'Your meal choices were saved.',
    ],

    'dashboard' => [
        'title' => 'My account',
        'greeting' => 'Hello, :name',
        'logout' => 'Sign out',
        'orders' => 'My orders',
        'subscriptions' => 'My subscriptions',
        'no_orders' => 'You have no orders yet.',
        'no_subscriptions' => 'You have no subscriptions yet.',
        'no_addresses' => 'You have no saved addresses yet.',
        'profile_hint' => 'Update your name, phone, and email.',
        'password_hint' => 'Leave blank to keep your current password.',
        'save_profile' => 'Save details',
        'add_address' => 'Add address',
        'edit_address' => 'Edit',
        'delete_address' => 'Delete',
        'set_default' => 'Make default',
        'has_invoice' => 'Invoice',
        'view' => 'View',
    ],

    'delivery' => [
        'title' => 'Delivery & payment',
        'address' => 'Delivery address',
    ],

    'order' => [
        'title' => 'Order details',
        'ref' => 'Order',
        'items' => 'items',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'total' => 'Total',
        'whatsapp' => 'Confirm on WhatsApp',
    ],

    'subscription' => [
        'title' => 'Subscription details',
        'meals' => 'Meals',
        'duration' => 'Duration',
        'total_days' => 'Total days',
        'start' => 'Start date',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'coupon' => 'Discount code',
        'delivery' => 'Delivery',
        'tax' => 'VAT',
        'total' => 'Total',
        'schedule' => 'Daily dishes',
        'schedule_hint' => 'You can change meals up to :days day(s) before delivery.',
        'schedule_locked' => 'Locked — inside the change window.',
        'legend_editable' => 'Tap to edit',
        'legend_locked' => 'Locked day',
        'tap_to_edit' => 'Tap to edit',
        'close_editor' => 'Close',
        'chef_choice' => 'Chef’s pick',
        'save_meals' => 'Save meal choices',
        'save_day' => 'Save this day',
        'no_schedule' => 'No meal calendar for this subscription.',
    ],

    'invoice' => [
        'title' => 'Invoice',
        'download' => 'Download PDF',
        'none' => 'No invoice yet for this order.',
        'none_subscription' => 'No invoice yet for this subscription.',
    ],
];
