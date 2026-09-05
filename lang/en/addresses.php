<?php

declare(strict_types=1);

return [

    'title' => 'Delivery addresses',
    'default' => 'Default',

    'fields' => [
        'address' => 'Delivery address',
        'label' => 'Address name',
        'recipient_name' => 'Recipient name',
        'phone' => 'Mobile number',
        'city' => 'City',
        'district' => 'District',
        'street' => 'Street and building',
        'national_address' => 'National address',
        'details' => 'Extra details',
        'is_default' => 'Make this my default address',
    ],

    'placeholders' => [
        'label' => 'Home, Work…',
        'national_address' => 'e.g. RRRD2929',
        'details' => 'Floor, apartment, landmark…',
    ],

    'map' => [
        'pick' => 'Choose on the map',
        'hint' => 'Move the pin inside Riyadh city to fill the address and national address.',
        'locating' => 'Finding your location…',
    ],

    'errors' => [
        'outside_riyadh' => 'We cannot deliver your order',
    ],

];
