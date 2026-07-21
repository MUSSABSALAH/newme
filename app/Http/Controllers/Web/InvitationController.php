<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Invitations\AcceptInvitationRequest;
use App\Modules\Identity\Services\InvitationService;
use App\Support\Exceptions\DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class InvitationController extends Controller
{
    public function __construct(private readonly InvitationService $invitationService) {}

    public function create(string $token): View|RedirectResponse
    {
        try {
            $invitation = $this->invitationService->resolve($token);
        } catch (DomainException $e) {
            return redirect()->route('admin.login')->with('error', $e->getMessage());
        }

        return view('auth.accept-invitation', [
            'token' => $token,
            'user' => $invitation->user,
        ]);
    }

    public function store(AcceptInvitationRequest $request, string $token): RedirectResponse
    {
        try {
            $user = $this->invitationService->accept($token, $request->validated('password'));
        } catch (DomainException $e) {
            return redirect()->route('admin.login')->with('error', $e->getMessage());
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', __('invitations.messages.accepted'));
    }
}
