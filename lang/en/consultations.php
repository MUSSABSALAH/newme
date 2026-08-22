<?php

declare(strict_types=1);

return [
    'title' => 'Consultations',
    'subtitle' => 'Consultation bookings submitted from the website.',
    'no_consultations' => 'No consultations yet.',

    'filter_status' => 'Status',
    'all_statuses' => 'All statuses',

    'messages' => [
        'booked' => 'Your consultation was booked successfully.',
        'status_updated' => 'Consultation saved.',
    ],

    'mail' => [
        'subject' => 'Your consultation is booked — :when',
        'greeting' => 'Hello :name,',
        'intro' => 'Your nutrition consultation is reserved. We look forward to seeing you.',
        'when' => 'Appointment: :when',
        'reference' => 'Reference: :reference',
        'goal' => 'Goal: :goal',
        'call_ahead' => 'We will call you 15 minutes before the appointment.',
        'action' => 'View my consultations',
        'outro' => 'Need to change the time? Reply to this email or contact us.',
    ],

    'errors' => [
        'invalid_slot' => 'The selected slot is not available in the consultation schedule.',
        'slot_taken' => 'This slot is already booked. Please choose another time.',
        'non_working_day' => 'The selected day is not a consultation working day.',
        'invalid_transition' => 'Cannot move the consultation from “:from” to “:to”.',
    ],

    'statuses' => [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'completed' => 'Consultation completed',
        'no_show' => 'Client no-show',
        'cancelled' => 'Cancelled',
    ],

    'fields' => [
        'reference' => 'Reference',
        'customer_name' => 'Name',
        'customer_email' => 'Email',
        'goal' => 'Goal',
        'scheduled_on' => 'Date',
        'starts_at' => 'Starts',
        'ends_at' => 'Ends',
        'slot' => 'Time',
        'status' => 'Status',
        'notes' => 'Consultant notes',
        'created_at' => 'Requested at',
    ],

    'show' => [
        'schedule' => 'Appointment',
        'customer' => 'Customer',
        'change_status' => 'Change status',
        'status_locked' => 'This consultation is in a final state — you can still update notes.',
        'notes_hint' => 'Internal notes for the consultant (not shown to the customer).',
        'notes_placeholder' => 'e.g. agreed on a two-week plan, or why the client did not attend…',
    ],
];
