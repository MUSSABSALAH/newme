<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Notifications\Support\NotificationPresenter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

final class NotificationController extends Controller
{
    /**
     * Notifications are personal, so there is no permission to check beyond
     * being signed-in staff: every query is scoped to the current user.
     */
    public function index(Request $request): View
    {
        $user = $this->user($request);

        $filter = in_array($request->query('filter'), ['unread', 'read'], true)
            ? (string) $request->query('filter')
            : 'all';

        $notifications = $user->notifications()
            ->when($filter === 'unread', fn ($query) => $query->whereNull('read_at'))
            ->when($filter === 'read', fn ($query) => $query->whereNotNull('read_at'))
            ->latest()
            ->paginate(20)
            ->withQueryString()
            ->through(static fn (DatabaseNotification $note): array => NotificationPresenter::describe($note));

        return view('admin.notifications.index', [
            'notifications' => $notifications,
            'filter' => $filter,
            'unreadCount' => $user->unreadNotifications()->count(),
        ]);
    }

    /**
     * Mark one as read and continue to whatever it is about.
     */
    public function read(Request $request, string $notification): RedirectResponse
    {
        /** @var DatabaseNotification $record */
        $record = $this->user($request)->notifications()->findOrFail($notification);

        $record->markAsRead();

        return redirect(NotificationPresenter::url($record) ?? route('admin.notifications.index'));
    }

    public function readAll(Request $request): RedirectResponse
    {
        $this->user($request)->unreadNotifications->markAsRead();

        return back()->with('success', __('notifications.messages.all_read'));
    }

    private function user(Request $request): User
    {
        /** @var User $user */
        $user = $request->user();

        return $user;
    }
}
