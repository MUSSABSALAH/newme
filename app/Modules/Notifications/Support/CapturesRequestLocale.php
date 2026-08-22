<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use Illuminate\Support\Facades\App;

/**
 * The queue worker has no browser session, so the language has to be stored
 * on the notification when it is created — otherwise every email falls back
 * to APP_LOCALE (English in this app).
 */
trait CapturesRequestLocale
{
    private function captureRequestLocale(): void
    {
        $this->locale(App::getLocale());
    }
}
