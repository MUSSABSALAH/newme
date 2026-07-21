<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Users\UpdateUserRequest;
use App\Models\User;
use App\Modules\Identity\DTOs\UserData;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Services\UserService;
use App\Support\Exceptions\DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class UserController extends Controller
{
    public function __construct(private readonly UserService $userService) {}

    public function index(): View
    {
        $this->authorize('viewAny', User::class);

        $users = User::query()
            ->with(['roles', 'invitations'])
            ->orderBy('name')
            ->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user): View
    {
        $this->authorize('update', $user);

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $this->roles(),
            'assigned' => $user->roles->pluck('name')->all(),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        try {
            $this->userService->update($user, UserData::fromArray($request->validated()));
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('users.messages.updated'));
    }

    public function activate(User $user): RedirectResponse
    {
        $this->authorize('deactivate', $user);

        $this->userService->activate($user);

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('users.messages.activated'));
    }

    public function deactivate(User $user): RedirectResponse
    {
        $this->authorize('deactivate', $user);

        try {
            $this->userService->deactivate($user, (int) Auth::id());
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('users.messages.deactivated'));
    }

    /**
     * @return \Illuminate\Support\Collection<int, Role>
     */
    private function roles(): \Illuminate\Support\Collection
    {
        return Role::query()->orderBy('name')->get();
    }
}
