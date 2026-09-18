<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Users\BulkDestroyUsersRequest;
use App\Http\Requests\Web\Admin\Users\UpdateUserRequest;
use App\Models\User;
use App\Modules\Identity\DTOs\UserData;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Services\UserService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
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

        // Staff only — customers live under admin.customers.*
        $users = User::query()
            ->staff()
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

    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);
        abort_unless($user->isStaff(), 404);

        $reason = $this->userService->deletionBlocker($user, (int) Auth::id());

        if ($reason !== null) {
            return back()->with('error', $this->userService->deletionErrorMessage($user, $reason));
        }

        $this->userService->delete($user, (int) Auth::id());

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('users.messages.deleted'));
    }

    public function bulkDestroy(BulkDestroyUsersRequest $request): RedirectResponse
    {
        $this->authorize('deleteAny', User::class);

        $users = User::query()
            ->staff()
            ->whereIn('id', $request->userIds())
            ->withCount([
                'subscriptions as active_subscriptions_count' => static fn ($query) => $query
                    ->where('status', SubscriptionStatus::Active),
                'orders as incomplete_orders_count' => static fn ($query) => $query
                    ->whereNotIn('status', [
                        OrderStatus::Delivered->value,
                        OrderStatus::Cancelled->value,
                    ]),
            ])
            ->orderBy('id')
            ->get();

        foreach ($users as $user) {
            $this->authorize('delete', $user);
        }

        $result = $this->userService->deleteMany($users, (int) Auth::id());

        return $this->bulkRedirect('admin.users.index', 'users', $result);
    }

    /**
     * @param  array{deleted: \Illuminate\Support\Collection<int, User>, blocked: \Illuminate\Support\Collection<int, array{user: User, reason: string}>}  $result
     */
    private function bulkRedirect(string $route, string $lang, array $result): RedirectResponse
    {
        $redirect = redirect()->route($route);

        if ($result['deleted']->isNotEmpty()) {
            $redirect->with('success', __($lang.'.messages.bulk_deleted', [
                'count' => $result['deleted']->count(),
            ]));
        }

        if ($result['blocked']->isNotEmpty()) {
            $people = $result['blocked']
                ->map(function (array $item) use ($lang): string {
                    $name = $item['user']->name;
                    $reason = __($lang.'.blockers.'.$item['reason']);

                    return $name.' ('.(is_string($reason) ? $reason : $item['reason']).')';
                })
                ->filter()
                ->values()
                ->all();

            $redirect->with('warning', __($lang.'.messages.bulk_blocked', [
                'people' => implode(', ', $people),
            ]));
        }

        if ($result['deleted']->isEmpty() && $result['blocked']->isEmpty()) {
            $redirect->with('error', __($lang.'.messages.bulk_none'));
        }

        return $redirect;
    }

    /**
     * @return \Illuminate\Support\Collection<int, Role>
     */
    private function roles(): \Illuminate\Support\Collection
    {
        return Role::query()
            ->where('name', '!=', RoleName::Customer->value)
            ->orderBy('name')
            ->get();
    }
}
