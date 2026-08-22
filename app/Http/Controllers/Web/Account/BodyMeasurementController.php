<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\BodyMeasurementRequest;
use App\Models\User;
use App\Modules\Identity\DTOs\BodyMeasurementData;
use App\Modules\Identity\Models\BodyMeasurement;
use App\Modules\Identity\Services\BodyMeasurementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class BodyMeasurementController extends Controller
{
    public function __construct(private readonly BodyMeasurementService $measurements) {}

    public function store(BodyMeasurementRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $this->measurements->record($user, BodyMeasurementData::fromArray($request->validated()));

        return $this->backToTab(__('account.messages.measurement_saved'));
    }

    public function destroy(BodyMeasurement $measurement): RedirectResponse
    {
        abort_unless($measurement->user_id === Auth::id(), 404);

        $this->measurements->delete($measurement);

        return $this->backToTab(__('account.messages.measurement_deleted'));
    }

    private function backToTab(string $message): RedirectResponse
    {
        return redirect()
            ->route('website.account', ['tab' => 'measurements'])
            ->with('success', $message);
    }
}
