<?php

declare(strict_types=1);

return [
    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'inactive' => 'This account is not active.',
    'logged_out' => 'Logged out successfully.',

    'login_title' => 'Admin Login',
    'welcome_back' => 'Welcome back',
    'login_subtitle' => 'Sign in to the New Me control panel.',
    'remember_me' => 'Remember me',
    'sign_in' => 'Sign in',

    'passwords' => [
        'forgot' => 'Forgot password?',
        'back_to_login' => 'Back to login',

        'request_title' => 'Reset password',
        'request_heading' => 'Forgot your password?',
        'request_subtitle' => "Enter your email and we'll send you a reset link.",
        'send_link' => 'Send reset link',

        'reset_title' => 'Reset password',
        'reset_heading' => 'Choose a new password',
        'reset_subtitle' => 'Enter a new password for your account.',
        'reset_action' => 'Reset password',

        'sent' => 'If that email belongs to an active account, a reset link has been sent.',
        'reset' => 'Your password has been reset.',
        'invalid' => 'This password reset link is invalid or has expired.',

        'mail' => [
            'subject' => 'Reset your :app password',
            'greeting' => 'Hello,',
            'intro' => 'You are receiving this email because we received a password reset request for your account.',
            'action' => 'Reset password',
            'expiry' => 'This link will expire in :count minutes.',
            'ignore' => 'If you did not request a password reset, no further action is required.',
        ],
    ],
];
