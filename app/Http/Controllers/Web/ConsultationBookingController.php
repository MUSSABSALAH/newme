<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Consultations\StoreConsultationRequest;
use App\Models\User;
use App\Modules\Consultations\DTOs\ConsultationData;
use App\Modules\Consultations\Exceptions\ConsultationSlotUnavailableException;
use App\Modules\Consultations\Services\ConsultationService;
use Illuminate\Http\JsonResponse;

final class ConsultationBookingController extends Controller
{
    public function __construct(private readonly ConsultationService $consultations) {}

    public function store(StoreConsultationRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        $email = is_string($user->email) && $user->email !== ''
            ? $user->email
            : (string) $request->validated('email');

        try {
            $consultation = $this->consultations->book(ConsultationData::fromArray([
                'name' => $user->name,
                'email' => $email,
                'goal' => $request->validated('goal'),
                'date' => $request->validated('date'),
                'starts_at' => $request->validated('starts_at'),
                'ends_at' => $request->validated('ends_at'),
            ]));
        } catch (ConsultationSlotUnavailableException $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage(),
            ], 422);
        }

        return response()->json([
            'ok' => true,
            'message' => __('consultations.messages.booked'),
            'reference' => $consultation->reference(),
            'when' => $consultation->whenLabel(),
        ]);
    }
}
