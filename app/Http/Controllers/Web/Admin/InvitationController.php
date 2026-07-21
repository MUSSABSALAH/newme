<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Users\SendInvitationRequest;
use App\Models\User;
use App\Modules\Identity\DTOs\InvitationData;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Models\UserInvitation;
use App\Modules\Identity\Services\InvitationService;
use App\Support\Exceptions\DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class InvitationController extends Controller
{
    public function __construct(private readonly InvitationService $invitationService) {}

    public function create(): View
    {
        $this->authorize('invite', User::class);

        return view('admin.users.create', [
            'roles' => Role::query()->orderBy('name')->get(),
            'assigned' => [],
        ]);
    }

    public function store(SendInvitationRequest $request): RedirectResponse
    {
        $this->authorize('invite', User::class);

        /** @var User $inviter */
        $inviter = Auth::user();

        $this->invitationService->invite(
            InvitationData::fromArray($request->validated()),
            $inviter,
        );

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('invitations.messages.sent'));
    }

    public function resend(UserInvitation $invitation): RedirectResponse
    {
        $this->authorize('invite', User::class);

        /** @var User $inviter */
        $inviter = Auth::user();

        try {
            $this->invitationService->resend($invitation, $inviter);
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('invitations.messages.resent'));
    }
}
