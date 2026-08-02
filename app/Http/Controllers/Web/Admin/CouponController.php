<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Coupons\StoreCouponRequest;
use App\Http\Requests\Web\Admin\Coupons\UpdateCouponRequest;
use App\Modules\Promotions\DTOs\CouponData;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Promotions\Services\CouponService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CouponController extends Controller
{
    public function __construct(private readonly CouponService $coupons) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Coupon::class);

        $scope = CouponScope::tryFrom((string) $request->query('scope', ''));

        $coupons = Coupon::query()
            ->when($scope !== null, fn ($query) => $query->where('scope', $scope->value))
            ->orderByDesc('is_active')
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.coupons.index', [
            'coupons' => $coupons,
            'scopes' => CouponScope::cases(),
            'activeScope' => $scope,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Coupon::class);

        return view('admin.coupons.create', $this->formData(null));
    }

    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $this->authorize('create', Coupon::class);

        $this->coupons->create(CouponData::fromArray($request->validated()));

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', __('coupons.messages.created'));
    }

    public function edit(Coupon $coupon): View
    {
        $this->authorize('update', $coupon);

        return view('admin.coupons.edit', $this->formData($coupon));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $this->authorize('update', $coupon);

        $this->coupons->update($coupon, CouponData::fromArray($request->validated()));

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', __('coupons.messages.updated'));
    }

    public function destroy(Coupon $coupon): RedirectResponse
    {
        $this->authorize('delete', $coupon);

        $this->coupons->delete($coupon);

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', __('coupons.messages.archived'));
    }

    /**
     * @return array<string, mixed>
     */
    private function formData(?Coupon $coupon): array
    {
        return [
            'coupon' => $coupon,
            'types' => CouponType::cases(),
            'scopes' => CouponScope::cases(),
        ];
    }
}
