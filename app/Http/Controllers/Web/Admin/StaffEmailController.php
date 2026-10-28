<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Notifications\UpdateNotificationSettingsRequest;
use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Services\MailQuota;
use App\Modules\Notifications\Services\StaffMailGate;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Super-admin page that decides which staff are emailed about store activity.
 * It has nothing to do with the topbar inbox, which keeps working as before.
 */
final class StaffEmailController extends Controller
{
    public function __construct(
        private readonly MailQuota $quota,
        private readonly StaffMailGate $gate,
        private readonly SettingsService $settings,
    ) {}

    public function index(Request $request): View
    {
        $this->authorizeSuperAdmin($request);

        return view('admin.staff-emails.index', [
            'quota' => $this->quota->snapshot(),
            'staff' => $this->gate->eligibleStaff(),
            'mailEvents' => NotificationEvent::staffEmailEvents(),
            'recipients' => $this->gate->recipients(),
            'mailSettings' => $this->settings->group('notifications'),
        ]);
    }

    public function update(UpdateNotificationSettingsRequest $request): RedirectResponse
    {
        $this->authorizeSuperAdmin($request);

        $this->settings->update($request->settings());
        $this->gate->syncRecipients($request->recipients());

        return redirect()
            ->route('admin.staff-emails.index')
            ->with('success', __('notifications.messages.settings_saved'));
    }

    private function authorizeSuperAdmin(Request $request): void
    {
        $user = $request->user();

        abort_unless($user instanceof User && $user->hasRole(RoleName::SuperAdmin->value), 403);
    }
}
