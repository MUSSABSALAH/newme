<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\RegisterRequest;
use App\Modules\Identity\DTOs\RegisterCustomerData;
use App\Modules\Identity\Enums\OtpPurpose;
use App\Modules\Identity\Services\CustomerAuthService;
use App\Modules\Identity\Services\CustomerOtpService;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class RegisterController extends Controller
{
    public function __construct(
        private readonly CustomerAuthService $customers,
        private readonly CustomerAuthChannels $channels,
        private readonly CustomerOtpService $otp,
    ) {}

    public function create(Request $request): View
    {
        $this->rememberIntended($request);

        return view('website.account.register', [
            'channels' => $this->channels,
        ]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = $this->customers->register(
            RegisterCustomerData::fromArray($request->validated()),
        );

        if ($this->channels->otpEnabled()) {
            $challenge = $this->otp->issue($user, OtpPurpose::Register, true);
            $request->session()->put('customer_otp', $challenge->public_id);

            return redirect()
                ->route('website.otp.create')
                ->with('success', __('account.otp.sent'));
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()
            ->intended(route('website.account'))
            ->with('success', __('account.messages.registered'));
    }

    private function rememberIntended(Request $request): void
    {
        $targets = [
            'cart' => route('website.cart'),
            'subscribe' => route('website.subscribe'),
            'checkout' => route('website.checkout'),
            'consult' => route('website.consult'),
        ];

        $next = $request->query('next');

        if (is_string($next) && isset($targets[$next])) {
            redirect()->setIntendedUrl($targets[$next]);
        }
    }
}
