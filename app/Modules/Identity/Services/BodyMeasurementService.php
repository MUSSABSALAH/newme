<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Identity\DTOs\BodyMeasurementData;
use App\Modules\Identity\Models\BodyMeasurement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class BodyMeasurementService
{
    /**
     * The customer's readings, newest first.
     *
     * @return Collection<int, BodyMeasurement>
     */
    public function historyFor(User $user): Collection
    {
        return BodyMeasurement::query()
            ->where('user_id', $user->id)
            ->orderByDesc('measured_on')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * Save a reading. A second reading on a date already logged corrects that
     * entry rather than adding a duplicate day to the history.
     */
    public function record(User $user, BodyMeasurementData $data): BodyMeasurement
    {
        return DB::transaction(function () use ($user, $data): BodyMeasurement {
            $measurement = BodyMeasurement::query()->firstOrNew([
                'user_id' => $user->id,
                'measured_on' => $data->measuredOn->toDateString(),
            ]);

            $measurement->fill($data->toColumns());
            $measurement->user_id = $user->id;

            // Height rarely changes, so a blank one falls back to what we know.
            $measurement->height_cm ??= $this->lastKnownHeight($user);

            $measurement->save();

            return $measurement;
        });
    }

    public function delete(BodyMeasurement $measurement): void
    {
        $measurement->delete();
    }

    private function lastKnownHeight(User $user): ?float
    {
        $height = BodyMeasurement::query()
            ->where('user_id', $user->id)
            ->whereNotNull('height_cm')
            ->orderByDesc('measured_on')
            ->orderByDesc('id')
            ->value('height_cm');

        return $height === null ? null : (float) $height;
    }
}
