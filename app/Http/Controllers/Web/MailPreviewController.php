<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Notifications\Support\MailPreviewCatalog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use InvalidArgumentException;

/**
 * Renders the branded emails as HTML pages so a design can be checked
 * before anything is sent.
 */
final class MailPreviewController extends Controller
{
    public function index(): View
    {
        return view('mail.preview.index', [
            'templates' => MailPreviewCatalog::all(),
        ]);
    }

    public function show(string $template): View|Response
    {
        try {
            $entry = MailPreviewCatalog::find($template);
        } catch (InvalidArgumentException) {
            abort(404);
        }

        return view($entry['view'], $entry['data']);
    }
}
