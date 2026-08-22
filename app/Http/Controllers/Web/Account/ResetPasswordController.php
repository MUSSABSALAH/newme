<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\ResetPasswordRequest;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Exceptions\PasswordResetInvalidException;
use App\Modules\Identity\Services\PasswordResetService;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class ResetPasswordController extends Controller
{
    public function __construct(
        private readonly PasswordResetService $passwordResetService,
        private readonly CustomerAuthChannels $channels,
    ) {}

    public function create(Request $request, string $token): View|RedirectResponse
    {
        if ($this->channels->otpEnabled()) {
            return redirect()->route('website.login');
        }

        return view('website.account.reset-password', [
            'token' => $token,
            'email' => (string) $request->query('email', ''),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        if ($this->channels->otpEnabled()) {
            return redirect()->route('website.login');
        }

        try {
            $user = $this->passwordResetService->reset(
                $request->validated('email'),
                $request->validated('token'),
                $request->validated('password'),
                UserType::Customer,
            );
        } catch (PasswordResetInvalidException $e) {
            throw ValidationException::withMessages([
                'email' => $e->getMessage(),
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('website.account')
            ->with('success', __('auth.passwords.reset'));
    }
}
