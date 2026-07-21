<?php

declare(strict_types=1);

return [
    'title' => 'Invite user',
    'subtitle' => 'Send an invitation to join the control panel',
    'send' => 'Send invitation',
    'resend' => 'Resend',
    'email_hint' => 'The invitation link will be sent to this email.',

    'accept_title' => 'Accept invitation',
    'accept_heading' => 'Set your password',
    'accept_subtitle' => 'Welcome, :name. Choose a password to activate your account.',
    'accept_action' => 'Activate account',

    'messages' => [
        'sent' => 'Invitation sent successfully.',
        'resent' => 'Invitation resent successfully.',
        'accepted' => 'Welcome! Your account is now active.',
    ],

    'errors' => [
        'invalid' => 'This invitation link is invalid or has expired.',
        'already_accepted' => 'This invitation has already been accepted.',
    ],

    'mail' => [
        'subject' => 'You have been invited to :app',
        'greeting' => 'Hello,',
        'intro' => ':inviter has invited you to join :app.',
        'action' => 'Accept invitation',
        'expiry' => 'This invitation link will expire in 48 hours.',
        'ignore' => 'If you did not expect this invitation, you can ignore this email.',
    ],
];
