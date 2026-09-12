<?php

declare(strict_types=1);

return [
    'title' => 'Homepage',
    'subtitle' => 'Update the public homepage content.',
    'sections' => [
        'announce' => 'Top announcement bar',
    ],
    'slides' => [
        'n' => 'Slide :n',
        'announce_shipping' => 'Shipping',
        'announce_partners' => 'Partners',
        'announce_consult' => 'Consultation',
    ],
    'fields' => [
        'announce_shipping_ar' => 'Shipping text (Arabic)',
        'announce_shipping_en' => 'Shipping text (English)',
        'announce_partners_ar' => 'Partners text (Arabic)',
        'announce_partners_en' => 'Partners text (English)',
        'announce_consult_ar' => 'Consultation text (Arabic)',
        'announce_consult_en' => 'Consultation text (English)',
    ],
    'hints' => [
        'announce' => 'These three lines rotate in the top bar (web and mobile).',
        'highlight' => 'Wrap the highlighted amount in <b>...</b> so it shows in orange.',
    ],
    'messages' => [
        'saved' => 'Homepage content saved.',
    ],
];
