<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Consultations\UpdateConsultationStatusRequest;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Consultations\Services\ConsultationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ConsultationController extends Controller
{
    public function __construct(private readonly ConsultationService $consultations) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Consultation::class);

        $status = ConsultationStatus::tryFrom((string) $request->query('status', ''));

        $consultations = Consultation::query()
            ->when($status !== null, fn ($query) => $query->where('status', $status->value))
            ->orderByDesc('scheduled_on')
            ->orderBy('starts_at')
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.consultations.index', [
            'consultations' => $consultations,
            'statuses' => ConsultationStatus::cases(),
            'activeStatus' => $status,
        ]);
    }

    public function show(Consultation $consultation): View
    {
        $this->authorize('view', $consultation);

        return view('admin.consultations.show', [
            'consultation' => $consultation,
            'statusOptions' => [$consultation->status, ...$consultation->status->nextStatuses()],
        ]);
    }

    public function updateStatus(UpdateConsultationStatusRequest $request, Consultation $consultation): RedirectResponse
    {
        $this->authorize('update', $consultation);

        $this->consultations->updateDetails(
            $consultation,
            $request->status(),
            $request->notes(),
        );

        return back()->with('success', __('consultations.messages.status_updated'));
    }
}
