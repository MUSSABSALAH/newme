<?php

declare(strict_types=1);

return [

    'title' => 'Payment',

    'methods' => [
        'mada' => 'mada',
        'visa' => 'Visa / Mastercard',
        'apple_pay' => 'Apple Pay',
        'cash_on_delivery' => 'Cash on delivery',
    ],

    'method_notes' => [
        'mada' => 'Saudi debit cards',
        'visa' => 'Credit and debit cards',
        'apple_pay' => 'Confirm with Face ID or Touch ID',
        'cash_on_delivery' => 'Pay when it arrives',
    ],

    'statuses' => [
        'pending' => 'Awaiting payment',
        'paid' => 'Paid',
        'failed' => 'Payment failed',
        'refunded' => 'Refunded',
    ],

    'declines' => [
        'card_declined' => 'Your bank declined this card. Try another card or payment method.',
        'insufficient_funds' => 'There are not enough funds on this card.',
        'expired_card' => 'This card has expired. Check the expiry date or use another card.',
        'invalid_card' => 'Those card details do not look right. Please check and try again.',
        'gateway_error' => 'We could not reach the payment provider. Please try again in a moment.',
    ],

    'labels' => [
        'method' => 'Payment method',
        'status' => 'Payment status',
        'reference' => 'Reference',
        'card' => 'Card',
    ],

    'actions' => [
        'confirm' => 'Confirm payment received',
    ],

    'messages' => [
        'confirmed' => 'Payment confirmed. The invoice has been issued.',
        'already_confirmed' => 'This payment was already confirmed.',
        'paid' => 'Payment received. Thank you.',
        'awaiting' => 'Your payment is still being confirmed.',
        'return_failed' => 'The payment did not go through. You can try again from a new checkout.',
        'return_invalid' => 'We could not verify the payment response. If you were charged, it will appear on your order shortly.',
        'return_unknown' => 'We could not match this payment to an order.',
    ],

];
