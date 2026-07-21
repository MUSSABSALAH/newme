<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SetWebLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

final class LocaleController extends Controller
{
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, SetWebLocale::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $locale);

            // Persist as a long-lived cookie so the choice survives logout,
            // where the session is invalidated.
            Cookie::queue(Cookie::forever(SetWebLocale::COOKIE, $locale));
        }

        return back();
    }
}
