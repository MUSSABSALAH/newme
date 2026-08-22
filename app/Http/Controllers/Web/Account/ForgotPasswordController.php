<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\ForgotPasswordRequest;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Services\PasswordResetService;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ForgotPasswordController extends Controller
{
    public function __construct(
        private readonly PasswordResetService $passwordResetService,
        private readonly CustomerAuthChannels $channels,
    ) {}

    public function create(): View|RedirectResponse
    {
        if ($this->channels->otpEnabled()) {
            return redirect()->route('website.login');
        }

        return view('website.account.forgot-password');
    }

    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        if ($this->channels->otpEnabled()) {
            return redirect()->route('website.login');
        }

        $this->passwordResetService->sendResetLink(
            $request->validated('email'),
            UserType::Customer,
        );

        // Always report the same outcome to avoid leaking which emails exist.
        return back()->with('status', __('auth.passwords.sent'));
    }
}
