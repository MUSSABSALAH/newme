<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Delivery\Walim\WalimShipmentService;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Task status updates pushed by Walim.
 *
 * Walim signs nothing; it echoes the shared secret we registered with it, so
 * a request is only trusted when that secret is set and matches exactly.
 */
final class WalimWebhookController extends Controller
{
    public function __invoke(
        Request $request,
        SettingsService $settings,
        WalimShipmentService $shipments,
    ): JsonResponse {
        $secret = $settings->get('walim.shared_secret');
        $given = $request->input('Walim_shared_secret');

        if (! is_string($secret) || $secret === '' || ! is_string($given) || ! hash_equals($secret, $given)) {
            Log::warning('Rejected Walim webhook with a missing or wrong shared secret.', [
                'ip' => $request->ip(),
            ]);

            return response()->json(['ok' => false], 403);
        }

        $shipments->handleWebhook($request->except('Walim_shared_secret'));

        return response()->json(['ok' => true]);
    }
}
