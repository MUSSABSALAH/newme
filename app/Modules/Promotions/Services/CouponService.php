<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Promotions\DTOs\CouponData;
use App\Modules\Promotions\Models\Coupon;
use Illuminate\Support\Facades\DB;

final class CouponService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(CouponData $data): Coupon
    {
        return DB::transaction(function () use ($data): Coupon {
            $coupon = new Coupon;
            $this->fill($coupon, $data);
            $coupon->save();

            $this->audit->log(AuditAction::CouponCreated, $coupon, [], $this->snapshot($coupon));

            return $coupon;
        });
    }

    public function update(Coupon $coupon, CouponData $data): Coupon
    {
        return DB::transaction(function () use ($coupon, $data): Coupon {
            $old = $this->snapshot($coupon);

            $this->fill($coupon, $data);
            $coupon->save();

            $this->audit->log(AuditAction::CouponUpdated, $coupon, $old, $this->snapshot($coupon->fresh() ?? $coupon));

            return $coupon;
        });
    }

    public function delete(Coupon $coupon): void
    {
        DB::transaction(function () use ($coupon): void {
            $old = $this->snapshot($coupon);

            $coupon->delete();

            $this->audit->log(AuditAction::CouponArchived, $coupon, $old);
        });
    }

    private function fill(Coupon $coupon, CouponData $data): void
    {
        $coupon->code = $data->code;
        $coupon->setTranslations('name', $data->name);
        $coupon->type = $data->type;
        $coupon->scope = $data->scope;
        $coupon->percent_off = $data->percentOff;
        $coupon->amount_off_minor = $data->amountOffMinor;
        $coupon->min_subtotal_minor = $data->minSubtotalMinor;
        $coupon->max_discount_minor = $data->maxDiscountMinor;
        $coupon->max_redemptions = $data->maxRedemptions;
        $coupon->max_redemptions_per_user = $data->maxRedemptionsPerUser;
        $coupon->starts_at = $data->startsAt;
        $coupon->expires_at = $data->expiresAt;
        $coupon->is_active = $data->isActive;
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Coupon $coupon): array
    {
        return [
            'code' => $coupon->code,
            'type' => $coupon->type->value,
            'scope' => $coupon->scope->value,
            'percent_off' => $coupon->percent_off,
            'amount_off_minor' => $coupon->amount_off_minor,
            'min_subtotal_minor' => $coupon->min_subtotal_minor,
            'max_discount_minor' => $coupon->max_discount_minor,
            'max_redemptions' => $coupon->max_redemptions,
            'max_redemptions_per_user' => $coupon->max_redemptions_per_user,
            'starts_at' => $coupon->starts_at?->toDateTimeString(),
            'expires_at' => $coupon->expires_at?->toDateTimeString(),
            'is_active' => $coupon->is_active,
        ];
    }
}
