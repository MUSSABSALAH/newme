<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\KitchenPrepPdfRenderer;
use App\Modules\Subscriptions\Services\KitchenPrepService;
use App\Support\Time\DisplayTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

/**
 * The kitchen's prep sheet: which subscription dishes to cook on a day.
 */
final class KitchenController extends Controller
{
    public function index(Request $request, KitchenPrepService $prep): View
    {
        $this->authorize('viewAny', Subscription::class);

        $date = $this->date($request->query('date'));

        return view('admin.kitchen.index', [
            'date' => $date,
            'prep' => $prep->forDate($date),
        ]);
    }

    public function pdf(Request $request, KitchenPrepPdfRenderer $renderer): Response
    {
        $this->authorize('viewAny', Subscription::class);

        $date = $this->date($request->query('date'));

        return response($renderer->render($date), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="kitchen-'.$date->toDateString().'.pdf"',
        ]);
    }

    /**
     * Defaults to tomorrow: the kitchen plans the day ahead.
     */
    private function date(mixed $value): Carbon
    {
        if (is_string($value) && trim($value) !== '') {
            try {
                return Carbon::parse(trim($value))->startOfDay();
            } catch (\Throwable) {
                // Fall through to the default.
            }
        }

        return DisplayTime::today()->addDay();
    }
}
