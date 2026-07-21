<?php

declare(strict_types=1);

namespace App\Modules\Audit\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Models\AuditLog;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

final class AuditService
{
    /**
     * Record an audited action.
     *
     * The actor and correlation request id are resolved from the current
     * context, so callers only describe *what* happened.
     *
     * @param  array<string, mixed>  $old
     * @param  array<string, mixed>  $new
     */
    public function log(AuditAction $action, ?Model $auditable = null, array $old = [], array $new = []): AuditLog
    {
        $log = new AuditLog;
        $log->actor_id = Auth::id();
        $log->action = $action->value;

        if ($auditable instanceof Model) {
            $log->auditable_type = $auditable::class;
            $log->auditable_id = (int) $auditable->getKey();
        }

        $log->old_values = $old === [] ? null : $old;
        $log->new_values = $new === [] ? null : $new;
        $log->request_id = $this->requestId();
        $log->save();

        return $log;
    }

    private function requestId(): ?string
    {
        if (! app()->bound('request')) {
            return null;
        }

        $id = request()->attributes->get(ApiResponse::REQUEST_ID_ATTRIBUTE);

        return is_string($id) ? $id : null;
    }
}
