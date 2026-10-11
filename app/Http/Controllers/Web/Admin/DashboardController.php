<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Dashboard\Services\DashboardService;
use App\Modules\Subscriptions\Services\SubscriptionExpiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class DashboardController extends Controller
{
    public function __construct(
        private readonly DashboardService $dashboard,
        private readonly SubscriptionExpiry $expiry,
    ) {}

    public function index(Request $request): View
    {
        /** @var User $user */
        $user = $request->user();

        $this->expiry->sweepIfDue();

        return view('admin.dashboard', [
            'stats' => $this->dashboard->snapshot($user),
        ]);
    }
}
