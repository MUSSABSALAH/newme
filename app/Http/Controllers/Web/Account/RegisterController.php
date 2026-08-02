<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\RegisterRequest;
use App\Modules\Identity\DTOs\RegisterCustomerData;
use App\Modules\Identity\Services\CustomerAuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class RegisterController extends Controller
{
    public function __construct(private readonly CustomerAuthService $customers) {}

    public function create(Request $request): View
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

        return view('website.account.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = $this->customers->register(
            RegisterCustomerData::fromArray($request->validated()),
        );

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()
            ->intended(route('website.account'))
            ->with('success', __('account.messages.registered'));
    }
}
