<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\VerifyOtpRequest;
use App\Models\User;
use App\Modules\Identity\Enums\OtpPurpose;
use App\Modules\Identity\Models\CustomerOtp;
use App\Modules\Identity\Services\CustomerOtpService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class VerifyOtpController extends Controller
{
    public function __construct(private readonly CustomerOtpService $otp) {}

    public function create(Request $request): View|RedirectResponse
    {
        $challenge = $this->challenge($request);

        if ($challenge === null || ! $challenge->user instanceof User) {
            return redirect()->route('website.login');
        }

        return view('website.account.verify-otp', [
            'otp' => $challenge,
            'destinations' => $this->otp->destinations($challenge->user),
        ]);
    }

    public function store(VerifyOtpRequest $request): RedirectResponse
    {
        $challenge = $this->challenge($request);

        if ($challenge === null) {
            return redirect()->route('website.login');
        }

        $user = $this->otp->verify($challenge, $request->validated('code'));

        $request->session()->forget('customer_otp');

        Auth::login($user, $challenge->remember);
        $request->session()->regenerate();

        $message = $challenge->purpose === OtpPurpose::Register
            ? __('account.messages.registered')
            : null;

        $redirect = redirect()->intended(route('website.account'));

        return $message === null ? $redirect : $redirect->with('success', $message);
    }

    public function resend(Request $request): RedirectResponse
    {
        $challenge = $this->challenge($request);

        if ($challenge === null) {
            return redirect()->route('website.login');
        }

        $this->otp->resend($challenge);

        return redirect()
            ->route('website.otp.create')
            ->with('success', __('account.otp.sent'));
    }

    private function challenge(Request $request): ?CustomerOtp
    {
        $id = $request->session()->get('customer_otp');

        if (! is_string($id) || $id === '') {
            return null;
        }

        return CustomerOtp::query()
            ->with('user')
            ->where('public_id', $id)
            ->whereNull('consumed_at')
            ->first();
    }
}
