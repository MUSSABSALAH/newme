<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\LoginRequest;
use App\Modules\Identity\DTOs\LoginData;
use App\Modules\Identity\Enums\OtpPurpose;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Exceptions\InactiveUserException;
use App\Modules\Identity\Exceptions\InvalidCredentialsException;
use App\Modules\Identity\Services\AuthService;
use App\Modules\Identity\Services\CustomerOtpService;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class LoginController extends Controller
{
    public function __construct(
        private readonly AuthService $authService,
        private readonly CustomerAuthChannels $channels,
        private readonly CustomerOtpService $otp,
    ) {}

    public function create(Request $request): View
    {
        $this->rememberIntended($request);

        return view('website.account.login', [
            'channels' => $this->channels,
        ]);
    }

    /**
     * Store a safe post-login destination based on a ?next= hint.
     */
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

    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if ($this->channels->otpEnabled()) {
            $data = $request->validated();

            $user = $this->otp->findCustomer(
                isset($data['email']) && is_string($data['email']) ? $data['email'] : null,
                isset($data['phone']) && is_string($data['phone']) ? $data['phone'] : null,
            );

            $challenge = $this->otp->issue($user, OtpPurpose::Login, $request->boolean('remember'));
            $request->session()->put('customer_otp', $challenge->public_id);

            return redirect()
                ->route('website.otp.create')
                ->with('success', __('account.otp.sent'));
        }

        $data = LoginData::fromArray([
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
            'device_name' => 'web',
        ]);

        try {
            $user = $this->authService->attempt($data, UserType::Customer);
        } catch (InvalidCredentialsException|InactiveUserException $e) {
            throw ValidationException::withMessages([
                'email' => $e->getMessage(),
            ]);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('website.account'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('website.home');
    }
}
