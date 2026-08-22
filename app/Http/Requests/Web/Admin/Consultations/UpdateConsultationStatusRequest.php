<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Consultations;

use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

final class UpdateConsultationStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        /** @var Consultation|null $consultation */
        $consultation = $this->route('consultation');
        $terminal = $consultation instanceof Consultation && $consultation->status->isTerminal();

        return [
            'status' => [
                Rule::requiredIf(! $terminal),
                'nullable',
                Rule::enum(ConsultationStatus::class),
            ],
            'notes' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            /** @var Consultation|null $consultation */
            $consultation = $this->route('consultation');
            $raw = $this->input('status');

            if (! $consultation instanceof Consultation || $raw === null || $raw === '') {
                return;
            }

            $status = ConsultationStatus::tryFrom((string) $raw);

            if ($status === null) {
                return;
            }

            if (! $consultation->status->canTransitionTo($status)) {
                $validator->errors()->add(
                    'status',
                    (string) __('consultations.errors.invalid_transition', [
                        'from' => $consultation->status->label(),
                        'to' => $status->label(),
                    ]),
                );
            }
        });
    }

    public function status(): ?ConsultationStatus
    {
        $raw = $this->validated('status') ?? null;

        return is_string($raw) && $raw !== ''
            ? ConsultationStatus::from($raw)
            : null;
    }

    public function notes(): ?string
    {
        $notes = $this->validated('notes') ?? null;

        return is_string($notes) ? $notes : null;
    }
}
