<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Auth\ForgotPasswordRequest;
use App\Modules\Identity\Services\PasswordResetService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ForgotPasswordController extends Controller
{
    public function __construct(private readonly PasswordResetService $passwordResetService) {}

    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        $this->passwordResetService->sendResetLink($request->validated('email'));

        // Always report the same outcome to avoid leaking which emails exist.
        return back()->with('status', __('auth.passwords.sent'));
    }
}
