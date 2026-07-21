<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Models\AuditLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class AuditController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', AuditLog::class);

        $action = $request->string('action')->toString();

        $logs = AuditLog::query()
            ->with('actor')
            ->when(
                in_array($action, AuditAction::values(), true),
                fn ($query) => $query->where('action', $action),
            )
            ->latest('created_at')
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.audit.index', [
            'logs' => $logs,
            'actions' => AuditAction::cases(),
            'selectedAction' => $action,
        ]);
    }
}
