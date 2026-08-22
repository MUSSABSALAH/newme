<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Consultations\DTOs\ConsultationData;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Exceptions\ConsultationSlotUnavailableException;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Notifications\Services\AdminNotifier;
use App\Modules\Notifications\Services\CustomerNotifier;
use App\Modules\Settings\Support\ConsultationSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

final class ConsultationService
{
    public function __construct(
        private readonly AuditService $audit,
        private readonly ConsultationSchedule $schedule,
        private readonly AdminNotifier $notifier,
        private readonly CustomerNotifier $customers,
    ) {}

    public function book(ConsultationData $data): Consultation
    {
        $date = Carbon::parse($data->scheduledOn)->startOfDay();

        if (! $this->schedule->isWorkingDay($date)) {
            throw ConsultationSlotUnavailableException::nonWorkingDay();
        }

        $allowed = collect($this->schedule->slots())
            ->first(fn (array $slot): bool => $slot['start'] === $data->startsAt && $slot['end'] === $data->endsAt);

        if ($allowed === null) {
            throw ConsultationSlotUnavailableException::invalid();
        }

        $consultation = DB::transaction(function () use ($data, $date): Consultation {
            $taken = Consultation::query()
                ->whereDate('scheduled_on', $date->toDateString())
                ->where(function ($query) use ($data): void {
                    // TIME columns may be stored as H:i or H:i:s depending on the driver.
                    $query->where('starts_at', $data->startsAt)
                        ->orWhere('starts_at', $data->startsAt.':00');
                })
                ->whereIn('status', ConsultationStatus::occupyingValues())
                ->lockForUpdate()
                ->exists();

            if ($taken) {
                throw ConsultationSlotUnavailableException::taken();
            }

            $consultation = new Consultation;
            $consultation->customer_name = $data->customerName;
            $consultation->customer_email = $data->customerEmail;
            $consultation->goal = $data->goal;
            $consultation->scheduled_on = $date->toDateString();
            $consultation->starts_at = $data->startsAt;
            $consultation->ends_at = $data->endsAt;
            $consultation->status = ConsultationStatus::Pending;
            $consultation->save();

            $this->audit->log(AuditAction::ConsultationCreated, $consultation, [], $this->snapshot($consultation));
            $this->notifier->consultationBooked($consultation);

            return $consultation;
        });

        $this->customers->consultationBooked($consultation);

        return $consultation;
    }

    public function updateDetails(
        Consultation $consultation,
        ?ConsultationStatus $status = null,
        ?string $notes = null,
        ?User $actor = null,
    ): Consultation {
        $nextStatus = $status ?? $consultation->status;

        if (! $consultation->status->canTransitionTo($nextStatus)) {
            throw new InvalidArgumentException(
                (string) __('consultations.errors.invalid_transition', [
                    'from' => $consultation->status->label(),
                    'to' => $nextStatus->label(),
                ]),
            );
        }

        $normalizedNotes = $notes !== null ? (trim($notes) !== '' ? trim($notes) : null) : $consultation->notes;
        $statusChanged = $consultation->status !== $nextStatus;
        $notesChanged = $consultation->notes !== $normalizedNotes;

        if (! $statusChanged && ! $notesChanged) {
            return $consultation;
        }

        return DB::transaction(function () use ($consultation, $nextStatus, $normalizedNotes): Consultation {
            $old = $this->snapshot($consultation);

            $consultation->status = $nextStatus;
            $consultation->notes = $normalizedNotes;
            $consultation->save();

            $this->audit->log(
                AuditAction::ConsultationStatusUpdated,
                $consultation,
                $old,
                $this->snapshot($consultation->fresh() ?? $consultation),
            );

            return $consultation;
        });
    }

    public function updateStatus(Consultation $consultation, ConsultationStatus $status, ?User $actor = null): Consultation
    {
        return $this->updateDetails($consultation, $status, $consultation->notes, $actor);
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Consultation $consultation): array
    {
        return [
            'public_id' => $consultation->public_id,
            'customer_email' => $consultation->customer_email,
            'scheduled_on' => $consultation->scheduled_on?->toDateString(),
            'starts_at' => $consultation->startsAtDisplay(),
            'ends_at' => $consultation->endsAtDisplay(),
            'status' => $consultation->status->value,
            'notes' => $consultation->notes,
        ];
    }
}
