<?php

declare(strict_types=1);

return [
    'title' => 'Audit log',
    'subtitle' => 'A trail of sensitive changes across the platform.',
    'no_logs' => 'No audit entries yet.',
    'filter_by_action' => 'Filter by action',
    'all_actions' => 'All actions',
    'system_actor' => 'System',
    'target_line' => ':type #:id',

    'fields' => [
        'time' => 'When',
        'actor' => 'Performed by',
        'action' => 'Action',
        'target' => 'Target',
        'request_id' => 'Request ID',
    ],

    'targets' => [
        'user' => 'User',
        'role' => 'Role',
        'invitation' => 'Invitation',
        'plan' => 'Plan',
        'meal' => 'Meal',
    ],

    'actions' => [
        'role' => [
            'created' => 'Role created',
            'updated' => 'Role updated',
            'deleted' => 'Role deleted',
        ],
        'user' => [
            'invited' => 'User invited',
            'updated' => 'User updated',
            'activated' => 'User activated',
            'deactivated' => 'User deactivated',
            'password_reset' => 'Password reset',
        ],
        'invitation' => [
            'resent' => 'Invitation resent',
            'accepted' => 'Invitation accepted',
        ],
        'settings' => [
            'updated' => 'Settings updated',
        ],
        'plan' => [
            'created' => 'Plan created',
            'updated' => 'Plan updated',
            'archived' => 'Plan archived',
        ],
        'plan_version' => [
            'published' => 'Plan version published',
        ],
        'plan_pricing' => [
            'updated' => 'Plan pricing updated',
        ],
        'plan_meals' => [
            'updated' => 'Plan meals updated',
        ],
        'meal' => [
            'created' => 'Meal created',
            'updated' => 'Meal updated',
            'archived' => 'Meal archived',
        ],
    ],
];
