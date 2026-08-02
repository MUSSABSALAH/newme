<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\LoginRequest;
use App\Modules\Identity\DTOs\LoginData;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Exceptions\InactiveUserException;
use App\Modules\Identity\Exceptions\InvalidCredentialsException;
use App\Modules\Identity\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class LoginController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function create(Request $request): View
    {
        $this->rememberIntended($request);

        return view('website.account.login');
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
