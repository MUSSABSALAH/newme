<?php

declare(strict_types=1);

namespace App\Modules\Plans\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Plans\DTOs\PlanData;
use App\Modules\Plans\DTOs\PricingRuleData;
use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Exceptions\PublishedVersionImmutableException;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class PlanService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(PlanData $data): Plan
    {
        return DB::transaction(function () use ($data): Plan {
            $plan = new Plan;
            $this->fill($plan, $data);
            $plan->save();

            $plan->versions()->create([
                'version_number' => 1,
                'status' => PlanVersionStatus::Draft->value,
                'created_by' => Auth::id(),
            ]);

            $this->audit->log(AuditAction::PlanCreated, $plan, [], $this->snapshot($plan));

            return $plan;
        });
    }

    public function update(Plan $plan, PlanData $data): Plan
    {
        return DB::transaction(function () use ($plan, $data): Plan {
            $old = $this->snapshot($plan);

            $this->fill($plan, $data);
            $plan->save();

            $this->audit->log(AuditAction::PlanUpdated, $plan, $old, $this->snapshot($plan->fresh() ?? $plan));

            return $plan;
        });
    }

    /**
     * Soft-delete (archive) a plan and record the action.
     */
    public function delete(Plan $plan): void
    {
        DB::transaction(function () use ($plan): void {
            $old = $this->snapshot($plan);

            $plan->delete();

            $this->audit->log(AuditAction::PlanArchived, $plan, $old);
        });
    }

    /**
     * Open a new editable draft version, cloning the current pricing.
     */
    public function createDraftVersion(Plan $plan): PlanVersion
    {
        return DB::transaction(function () use ($plan): PlanVersion {
            $existingDraft = $plan->draftVersion();

            if ($existingDraft instanceof PlanVersion) {
                return $existingDraft;
            }

            $source = $plan->publishedVersion()
                ?? $plan->versions()->latest('version_number')->first();

            $nextNumber = (int) $plan->versions()->max('version_number') + 1;

            $draft = $plan->versions()->create([
                'version_number' => $nextNumber,
                'status' => PlanVersionStatus::Draft->value,
                'created_by' => Auth::id(),
            ]);

            if ($source instanceof PlanVersion) {
                foreach ($source->pricingRules()->get() as $rule) {
                    $draft->pricingRules()->create($rule->only([
                        'meal_types',
                        'meal_types_key',
                        'duration_unit',
                        'duration_length',
                        'price',
                        'discount_percent',
                        'is_active',
                        'sort_order',
                    ]));
                }
            }

            return $draft;
        });
    }

    /**
     * Persist submitted pricing to the plan, keeping versioning transparent.
     *
     * Nothing happens when the submitted matrix matches the current effective
     * pricing. Otherwise the changes are written to a draft version (creating
     * one from the published pricing when needed).
     *
     * @param  list<PricingRuleData>  $rules
     */
    public function savePlanPricing(Plan $plan, array $rules): void
    {
        $current = $plan->draftVersion() ?? $plan->publishedVersion();

        if ($current instanceof PlanVersion
            && $this->versionSignature($current) === $this->submittedSignature($rules)) {
            return;
        }

        $draft = $this->createDraftVersion($plan);
        $this->updatePricing($draft, $rules);
    }

    /**
     * Replace the pricing rules of a draft version.
     *
     * @param  list<PricingRuleData>  $rules
     *
     * @throws PublishedVersionImmutableException
     */
    public function updatePricing(PlanVersion $version, array $rules): void
    {
        if (! $version->isDraft()) {
            throw new PublishedVersionImmutableException;
        }

        DB::transaction(function () use ($version, $rules): void {
            $version->pricingRules()->delete();

            $sort = 0;
            foreach ($rules as $rule) {
                $attributes = $rule->toAttributes();
                $attributes['sort_order'] = $attributes['sort_order'] !== 0 ? $attributes['sort_order'] : $sort;
                $version->pricingRules()->create($attributes);
                $sort++;
            }

            $this->audit->log(
                AuditAction::PlanPricingUpdated,
                $version->plan,
                [],
                [
                    'version' => $version->version_number,
                    'rules' => count($rules),
                ],
            );
        });
    }

    /**
     * Publish a draft version, superseding any previously published one.
     *
     * @throws PublishedVersionImmutableException
     */
    public function publish(PlanVersion $version): PlanVersion
    {
        if (! $version->isDraft()) {
            throw new PublishedVersionImmutableException;
        }

        return DB::transaction(function () use ($version): PlanVersion {
            $version->plan->versions()
                ->where('status', PlanVersionStatus::Published->value)
                ->update(['status' => PlanVersionStatus::Archived->value]);

            $version->status = PlanVersionStatus::Published;
            $version->published_at = now();
            $version->save();

            $this->audit->log(
                AuditAction::PlanVersionPublished,
                $version->plan,
                [],
                ['version' => $version->version_number],
            );

            return $version;
        });
    }

    /**
     * @param  list<PricingRuleData>  $rules
     */
    private function submittedSignature(array $rules): string
    {
        $rows = [];

        foreach ($rules as $rule) {
            $attributes = $rule->toAttributes();
            $rows[] = implode('|', [
                (string) $attributes['meal_types_key'],
                (string) $attributes['duration_unit'],
                (int) $attributes['duration_length'],
                (int) $attributes['price'],
                number_format((float) $attributes['discount_percent'], 2, '.', ''),
                (int) (bool) $attributes['is_active'],
            ]);
        }

        sort($rows);

        return implode(';', $rows);
    }

    private function versionSignature(PlanVersion $version): string
    {
        $rows = [];

        foreach ($version->pricingRules()->get() as $rule) {
            $rows[] = implode('|', [
                $rule->meal_types_key,
                $rule->duration_unit->value,
                (int) $rule->duration_length,
                (int) $rule->price,
                number_format((float) $rule->discount_percent, 2, '.', ''),
                (int) $rule->is_active,
            ]);
        }

        sort($rows);

        return implode(';', $rows);
    }

    private function fill(Plan $plan, PlanData $data): void
    {
        $plan->goal = $data->goal;
        $plan->setTranslations('name', $data->name);
        $plan->setTranslations('description', $data->description);
        $plan->setTranslations('features', $data->features);
        $plan->requires_day_selection = $data->requiresDaySelection;
        $plan->allows_pause = $data->allowsPause;
        $plan->min_delivery_days_per_week = $data->minDeliveryDaysPerWeek;
        $plan->delivery_fee = $data->deliveryFee;
        $plan->is_active = $data->isActive;
        $plan->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $plan->image_path = $data->imagePath;
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Plan $plan): array
    {
        return [
            'goal' => $plan->goal->value,
            'name' => $plan->getTranslations('name'),
            'is_active' => $plan->is_active,
            'requires_day_selection' => $plan->requires_day_selection,
            'allows_pause' => $plan->allows_pause,
            'min_delivery_days_per_week' => $plan->min_delivery_days_per_week,
            'delivery_fee' => $plan->delivery_fee,
        ];
    }
}
