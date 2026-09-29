<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Settings\UpdateSettingsRequest;
use App\Modules\Delivery\Distance\DeliveryDistance;
use App\Modules\Delivery\Distance\GeoPoint;
use App\Modules\Delivery\Distance\GoogleRouteOptions;
use App\Modules\Delivery\Walim\WalimClient;
use App\Modules\Delivery\Walim\WalimException;
use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class SettingController extends Controller
{
    public function __construct(private readonly SettingsService $settings) {}

    public function edit(): View
    {
        $this->authorize('manage', Setting::class);

        return view('admin.settings.edit', [
            'groups' => SettingsRegistry::grouped(),
            'values' => $this->settings->all(),
        ]);
    }

    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        $this->authorize('manage', Setting::class);

        $this->settings->update($request->settings());

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', __('settings.messages.saved'));
    }

    /**
     * Branch-to-sample-point distance with both methods.
     *
     * Values typed in the form but not saved yet are used when given; blank
     * fields fall back to the saved settings.
     */
    public function testDistance(Request $request, DeliveryDistance $distances): JsonResponse
    {
        $this->authorize('manage', Setting::class);

        $data = $request->validate([
            'lat' => ['required', 'numeric', 'between:-90,90'],
            'lng' => ['required', 'numeric', 'between:-180,180'],
            'origin_lat' => ['nullable', 'numeric', 'between:-90,90'],
            'origin_lng' => ['nullable', 'numeric', 'between:-180,180'],
            'road_factor' => ['nullable', 'numeric', 'min:1', 'max:3'],
            'api_key' => ['nullable', 'string', 'max:255'],
            'route_preference' => ['nullable', 'in:shortest,fastest'],
            'traffic' => ['nullable', 'in:unaware,aware'],
            'avoid_highways' => ['nullable', 'boolean'],
            'avoid_tolls' => ['nullable', 'boolean'],
        ]);

        $options = isset($data['route_preference'])
            ? new GoogleRouteOptions(
                preference: $data['route_preference'],
                trafficAware: ($data['traffic'] ?? null) === 'aware',
                avoidHighways: (bool) ($data['avoid_highways'] ?? false),
                avoidTolls: (bool) ($data['avoid_tolls'] ?? false),
            )
            : null;

        $origin = GeoPoint::tryFrom($data['origin_lat'] ?? null, $data['origin_lng'] ?? null)
            ?? $distances->origin();

        if (! $origin instanceof GeoPoint) {
            return response()->json(['message' => __('settings.distance_test.no_origin')], 422);
        }

        $destination = GeoPoint::tryFrom($data['lat'], $data['lng']);

        if (! $destination instanceof GeoPoint) {
            return response()->json(['message' => __('settings.distance_test.failed')], 422);
        }

        return response()->json($distances->compare(
            $origin,
            $destination,
            isset($data['api_key']) ? trim((string) $data['api_key']) : null,
            isset($data['road_factor']) ? (float) $data['road_factor'] : null,
            $options,
        ));
    }

    /**
     * Register the webhook shared secret with Walim, using the values typed
     * in the form when given and the saved ones otherwise.
     */
    public function registerWalimSecret(Request $request, WalimClient $walim): JsonResponse
    {
        $this->authorize('manage', Setting::class);

        $data = $request->validate([
            'api_key' => ['nullable', 'string', 'max:255'],
            'shared_secret' => ['nullable', 'string', 'max:255'],
        ]);

        $apiKey = trim((string) ($data['api_key'] ?? '')) ?: trim((string) $this->settings->get('walim.api_key'));
        $secret = trim((string) ($data['shared_secret'] ?? '')) ?: trim((string) $this->settings->get('walim.shared_secret'));

        if ($apiKey === '' || $secret === '') {
            return response()->json(['message' => __('settings.walim_secret.missing')], 422);
        }

        try {
            $walim->setSharedSecret($secret, $apiKey);
        } catch (WalimException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return response()->json(['message' => __('settings.walim_secret.done')]);
    }
}
