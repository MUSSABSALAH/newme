<?php

declare(strict_types=1);

return [

    'title' => 'Checkout',
    'heading' => 'Complete your order',
    'subtitle' => 'Confirm the delivery address, choose how to pay, then place your order.',
    'sign_in_required' => 'Sign in or create an account to complete your order — we need your details for delivery.',

    'sources' => [
        'cart' => 'Store order',
        'subscription' => 'Subscription',
    ],

    'steps' => [
        'account' => 'Account',
        'address' => 'Delivery address',
        'payment' => 'Payment',
        'review' => 'Review & place',
    ],

    'account' => [
        'signed_in_as' => 'Signed in as',
        'change' => 'Not you?',
        'logout' => 'Sign out',
    ],

    'address' => [
        'heading' => 'Where should we deliver?',
        'choose' => 'Deliver here',
        'selected' => 'Delivering here',
        'add' => 'Add a new address',
        'empty' => 'You have no saved addresses yet — add the first one to continue.',
        'save' => 'Save address',
        'cancel' => 'Cancel',
    ],

    'payment' => [
        'heading' => 'How would you like to pay?',
        'card_details' => 'Card details',
        'simulated_note' => 'Payments are simulated for now — no real charge is made and no card details are stored.',
        'hosted_note' => 'You will be redirected to our payment partner to pay securely. We never see your full card number.',
        'test_hint' => 'Try 4242 4242 4242 4242 for an approval, or a number ending in 0002 for a decline.',
        'cod_note' => 'Pay the courier when your order arrives.',
    ],

    'review' => [
        'heading' => 'Review and place your order',
        'terms' => 'I agree to the terms and the refund policy.',
        'note' => 'Order note (optional)',
        'note_placeholder' => 'Anything we should know about the delivery?',
        'place' => 'Place order',
        'pay' => 'Pay securely',
        'placing' => 'Placing your order…',
        'redirecting' => 'Redirecting to payment…',
        'edit' => 'Edit',
    ],

    'summary' => [
        'heading' => 'Order summary',
        'cart_title' => ':count item(s) from the store',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'plan_discount' => 'Plan discount (:percent%)',
        'delivery' => 'Delivery',
        'tax' => 'VAT (:rate%)',
        'total' => 'Total',
        'meals' => 'Meals',
        'duration' => 'Duration',
        'days' => ':count day(s)',
        'coupon' => 'Coupon',
        'change_plan' => 'Change plan',
        'back_to_cart' => 'Back to cart',
    ],

    'fields' => [
        'address' => 'delivery address',
        'payment_method' => 'payment method',
        'card_number' => 'card number',
        'card_holder' => 'name on card',
        'card_expiry_month' => 'expiry month',
        'card_expiry_year' => 'expiry year',
        'card_cvv' => 'CVV',
    ],

    'messages' => [
        'address_saved' => 'Address saved.',
    ],

    'errors' => [
        'nothing_to_checkout' => 'There is nothing to check out yet.',
        'terms' => 'Please agree to the terms before placing your order.',
        'address_required' => 'Add a delivery address to continue.',
    ],

];
