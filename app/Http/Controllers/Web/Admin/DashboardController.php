<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Dashboard\Services\DashboardService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class DashboardController extends Controller
{
    public function __construct(private readonly DashboardService $dashboard) {}

    public function index(Request $request): View
    {
        /** @var User $user */
        $user = $request->user();

        return view('admin.dashboard', [
            'stats' => $this->dashboard->snapshot($user),
        ]);
    }
}
