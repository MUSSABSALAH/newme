<?php

declare(strict_types=1);

/**
 * Downloads seeded meal images into storage/app/public/meals.
 *
 * Usage: php scripts/download_meal_images.php
 */

$root = dirname(__DIR__);
$dest = $root.'/storage/app/public/meals';

if (! is_dir($dest) && ! mkdir($dest, 0755, true) && ! is_dir($dest)) {
    fwrite(STDERR, "Cannot create {$dest}\n");
    exit(1);
}

$meals = [
    ['file' => 'breakfast-01.jpg', 'seed' => 201, 'prompt' => 'shakshuka eggs in tomato sauce skillet with seeded bread'],
    ['file' => 'breakfast-02.jpg', 'seed' => 202, 'prompt' => 'avocado toast with boiled egg and flax seeds'],
    ['file' => 'breakfast-03.jpg', 'seed' => 203, 'prompt' => 'oatmeal bowl with dates and almonds'],
    ['file' => 'breakfast-04.jpg', 'seed' => 204, 'prompt' => 'protein pancakes with fresh berries'],
    ['file' => 'breakfast-05.jpg', 'seed' => 205, 'prompt' => 'labneh with olive oil zaatar and seeded bread'],
    ['file' => 'breakfast-06.jpg', 'seed' => 206, 'prompt' => 'vegetable omelette with spinach and mushrooms'],
    ['file' => 'lunch-01.jpg', 'seed' => 207, 'prompt' => 'grilled chicken breast with brown rice and vegetables'],
    ['file' => 'lunch-02.jpg', 'seed' => 208, 'prompt' => 'baked salmon fillet with quinoa and broccoli'],
    ['file' => 'lunch-03.jpg', 'seed' => 209, 'prompt' => 'light chicken kabsa rice dish'],
    ['file' => 'lunch-04.jpg', 'seed' => 210, 'prompt' => 'healthy beef burger in artisan bun with salad'],
    ['file' => 'lunch-05.jpg', 'seed' => 211, 'prompt' => 'whole wheat pasta with chicken and tomato sauce'],
    ['file' => 'lunch-06.jpg', 'seed' => 212, 'prompt' => 'lupin quinoa salad bowl with grilled chicken'],
    ['file' => 'dinner-01.jpg', 'seed' => 213, 'prompt' => 'grilled steak with sauteed vegetables'],
    ['file' => 'dinner-02.jpg', 'seed' => 214, 'prompt' => 'chicken tikka with yogurt sauce'],
    ['file' => 'dinner-03.jpg', 'seed' => 215, 'prompt' => 'grilled white fish with roasted sweet potato'],
    ['file' => 'dinner-04.jpg', 'seed' => 216, 'prompt' => 'lean meatballs in tomato sauce'],
    ['file' => 'dinner-05.jpg', 'seed' => 217, 'prompt' => 'oven baked chicken tray with vegetables'],
    ['file' => 'dinner-06.jpg', 'seed' => 218, 'prompt' => 'lentil soup with toasted bread'],
    ['file' => 'snack-01.jpg', 'seed' => 219, 'prompt' => 'greek yogurt with seed granola'],
    ['file' => 'snack-02.jpg', 'seed' => 220, 'prompt' => 'raw nuts and dates snack'],
    ['file' => 'snack-03.jpg', 'seed' => 221, 'prompt' => 'zaatar crackers with hummus dip'],
    ['file' => 'snack-04.jpg', 'seed' => 222, 'prompt' => 'oat date energy balls'],
    ['file' => 'snack-05.jpg', 'seed' => 223, 'prompt' => 'berry yogurt parfait in glass'],
    ['file' => 'snack-06.jpg', 'seed' => 224, 'prompt' => 'vegetable sticks with labneh dip'],
];

$ok = 0;
$fail = 0;

foreach ($meals as $meal) {
    $out = $dest.'/'.$meal['file'];

    if (is_file($out) && filesize($out) > 5000) {
        echo "SKIP {$meal['file']}\n";
        $ok++;

        continue;
    }

    $fullPrompt = 'hyperrealistic editorial food photography, '.$meal['prompt'].', plated beautifully, soft natural window light, premium minimal styling, appetizing, 8k photorealistic';
    $url = 'https://image.pollinations.ai/prompt/'.rawurlencode($fullPrompt)
        .'?width=640&height=400&nologo=true&seed='.$meal['seed'].'&model=flux';

    $ctx = stream_context_create([
        'http' => [
            'timeout' => 90,
            'header' => "User-Agent: NewMeMealSeeder/1.0\r\n",
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
        ],
    ]);

    echo "GET {$meal['file']}...\n";
    $bytes = @file_get_contents($url, false, $ctx);

    if ($bytes === false || strlen($bytes) < 5000) {
        echo "FAIL {$meal['file']}\n";
        $fail++;

        continue;
    }

    file_put_contents($out, $bytes);
    echo 'OK '.$meal['file'].' ('.strlen($bytes)." bytes)\n";
    $ok++;
}

echo "done ok={$ok} fail={$fail}\n";
exit($fail > 0 ? 1 : 0);
