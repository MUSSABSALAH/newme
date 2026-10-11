<?php

declare(strict_types=1);

use App\Modules\Subscriptions\Services\SubscriptionExpiry;
use App\Support\Time\DisplayTime;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('subscriptions:expire', function (SubscriptionExpiry $expiry) {
    $this->info('Expired subscriptions: '.$expiry->sweep());
})->purpose('Mark active subscriptions whose last delivery day has passed as expired');

Schedule::command('subscriptions:expire')->dailyAt('00:05')->timezone(DisplayTime::timezone());

$local = __DIR__.DIRECTORY_SEPARATOR.'console.local.php';

if (is_file($local)) {
    require $local;
}
