<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use InvalidArgumentException;

/**
 * Sample payloads for the HTML preview pages. Nothing here is sent.
 */
final class MailPreviewCatalog
{
    /**
     * @return array<string, array{label: string, view: string, data: array<string, mixed>}>
     */
    public static function all(): array
    {
        return [
            'invoice' => [
                'label' => (string) __('mail.catalog.invoice'),
                'view' => 'mail.operations.invoice-issued',
                'data' => [
                    'title' => __('invoices.mail.subject', ['number' => 'INV-2026-000007']),
                    'heading' => __('mail.headings.invoice'),
                    'subheading' => __('mail.headings.invoice_sub'),
                    'greeting' => __('invoices.mail.greeting'),
                    'intro' => __('invoices.mail.intro', ['number' => 'INV-2026-000007', 'total' => '138.00']),
                    'introTotal' => __('invoices.mail.intro', ['number' => 'INV-2026-000007', 'total' => '138.00']),
                    'number' => 'INV-2026-000007',
                    'total' => '138.00',
                    'currency' => __('invoices.pdf.currency'),
                    'attached' => __('invoices.mail.attached'),
                    'actionLabel' => __('invoices.mail.action'),
                    'actionUrl' => url('/account'),
                ],
            ],
            'order' => [
                'label' => (string) __('mail.catalog.order'),
                'view' => 'mail.operations.order-confirmation',
                'data' => [
                    'title' => __('orders.mail.subject', ['reference' => 'ORD-2026-00012']),
                    'heading' => __('mail.headings.order'),
                    'subheading' => __('mail.headings.order_sub'),
                    'greeting' => __('orders.mail.greeting', ['name' => 'مصعب']),
                    'intro' => __('orders.mail.intro', ['reference' => 'ORD-2026-00012']),
                    'items' => [
                        ['name' => 'بقسماط مطحون سادة', 'quantity' => 1, 'total' => '15.00'],
                        ['name' => 'زيتون أسود', 'quantity' => 2, 'total' => '24.00'],
                    ],
                    'totalLine' => __('orders.mail.total', ['total' => '39.00', 'currency' => __('invoices.pdf.currency')]),
                    'paymentLine' => __('orders.mail.payment', ['method' => __('payments.methods.mada')]),
                    'deferredLine' => null,
                    'actionLabel' => __('orders.mail.action'),
                    'actionUrl' => url('/account'),
                    'outro' => __('orders.mail.outro'),
                ],
            ],
            'subscription' => [
                'label' => (string) __('mail.catalog.subscription'),
                'view' => 'mail.operations.subscription-confirmation',
                'data' => [
                    'title' => __('subscriptions.mail.subject', ['plan' => 'بناء العضلات']),
                    'heading' => __('mail.headings.subscription'),
                    'subheading' => __('mail.headings.subscription_sub'),
                    'greeting' => __('subscriptions.mail.greeting', ['name' => 'مصعب']),
                    'intro' => __('subscriptions.mail.intro', ['plan' => 'بناء العضلات']),
                    'plan' => 'بناء العضلات',
                    'referenceLine' => __('subscriptions.mail.reference', ['reference' => 'SUB-2026-00009']),
                    'durationLine' => __('subscriptions.mail.duration', ['days' => 28]),
                    'startLine' => __('subscriptions.mail.start', ['date' => '24 Aug 2026']),
                    'totalLine' => __('subscriptions.mail.total', [
                        'total' => '414.00',
                        'per_day' => '14.79',
                        'currency' => __('invoices.pdf.currency'),
                    ]),
                    'paymentLine' => __('subscriptions.mail.payment', ['method' => __('payments.methods.visa')]),
                    'deferredLine' => null,
                    'actionLabel' => __('subscriptions.mail.action'),
                    'actionUrl' => url('/account'),
                    'outro' => __('subscriptions.mail.outro'),
                ],
            ],
            'consultation' => [
                'label' => (string) __('mail.catalog.consultation'),
                'view' => 'mail.operations.consultation-booked',
                'data' => [
                    'title' => __('consultations.mail.subject', ['when' => '24 Aug 2026 · 10:00 – 11:00']),
                    'heading' => __('mail.headings.consultation'),
                    'subheading' => __('mail.headings.consultation_sub'),
                    'greeting' => __('consultations.mail.greeting', ['name' => 'سارة']),
                    'intro' => __('consultations.mail.intro'),
                    'whenLine' => __('consultations.mail.when', ['when' => '24 Aug 2026 · 10:00 – 11:00']),
                    'referenceLine' => __('consultations.mail.reference', ['reference' => 'A1B2C3D4']),
                    'goalLine' => __('consultations.mail.goal', ['goal' => 'خسارة الوزن']),
                    'callAhead' => __('consultations.mail.call_ahead'),
                    'actionLabel' => __('consultations.mail.action'),
                    'actionUrl' => url('/account?tab=consultations'),
                    'outro' => __('consultations.mail.outro'),
                ],
            ],
            'otp' => [
                'label' => (string) __('mail.catalog.otp'),
                'view' => 'mail.operations.email-otp',
                'data' => [
                    'title' => __('account.otp.mail.subject'),
                    'heading' => __('mail.headings.otp'),
                    'subheading' => __('mail.headings.otp_sub'),
                    'greeting' => __('account.otp.mail.greeting', ['name' => 'مصعب']),
                    'intro' => __('account.otp.mail.intro'),
                    'code' => '482917',
                    'expiry' => __('account.otp.mail.expiry', ['minutes' => 10]),
                    'ignore' => __('account.otp.mail.ignore'),
                ],
            ],
            'password' => [
                'label' => (string) __('mail.catalog.password'),
                'view' => 'mail.operations.password-reset',
                'data' => [
                    'title' => __('auth.passwords.mail.subject', ['app' => config('app.name')]),
                    'heading' => __('mail.headings.password'),
                    'subheading' => __('mail.headings.password_sub'),
                    'greeting' => __('auth.passwords.mail.greeting'),
                    'intro' => __('auth.passwords.mail.intro'),
                    'actionLabel' => __('auth.passwords.mail.action'),
                    'actionUrl' => url('/reset-password/preview-token'),
                    'expiry' => __('auth.passwords.mail.expiry', ['count' => 60]),
                    'ignore' => __('auth.passwords.mail.ignore'),
                ],
            ],
            'invitation' => [
                'label' => (string) __('mail.catalog.invitation'),
                'view' => 'mail.operations.user-invitation',
                'data' => [
                    'title' => __('invitations.mail.subject', ['app' => config('app.name')]),
                    'heading' => __('mail.headings.invitation'),
                    'subheading' => __('mail.headings.invitation_sub'),
                    'greeting' => __('invitations.mail.greeting'),
                    'intro' => __('invitations.mail.intro', [
                        'inviter' => 'نيومي',
                        'app' => config('app.name'),
                    ]),
                    'actionLabel' => __('invitations.mail.action'),
                    'actionUrl' => url('/invitations/preview-token'),
                    'expiry' => __('invitations.mail.expiry'),
                    'ignore' => __('invitations.mail.ignore'),
                ],
            ],
        ];
    }

    /**
     * @return array{label: string, view: string, data: array<string, mixed>}
     */
    public static function find(string $key): array
    {
        $all = self::all();

        if (! isset($all[$key])) {
            throw new InvalidArgumentException("Unknown mail preview: {$key}");
        }

        return $all[$key];
    }
}
