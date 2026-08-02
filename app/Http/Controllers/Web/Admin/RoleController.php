<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Roles\StoreRoleRequest;
use App\Http\Requests\Web\Admin\Roles\UpdateRoleRequest;
use App\Modules\Identity\DTOs\RoleData;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Services\RoleService;
use App\Support\Exceptions\DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService) {}

    public function index(): View
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::query()
            ->where('name', '!=', RoleName::Customer->value)
            ->withCount(['permissions', 'users'])
            ->orderBy('name')
            ->get();

        return view('admin.roles.index', [
            'roles' => $roles,
            'roleService' => $this->roleService,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Role::class);

        return view('admin.roles.create', [
            'groups' => PermissionName::grouped(),
            'assigned' => [],
        ]);
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $this->authorize('create', Role::class);

        $this->roleService->create(RoleData::fromArray($request->validated()));

        return redirect()
            ->route('admin.roles.index')
            ->with('success', __('roles.messages.created'));
    }

    public function edit(Role $role): View
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'groups' => PermissionName::grouped(),
            'assigned' => $role->permissions->pluck('name')->all(),
            'isSystem' => $this->roleService->isSystemRole($role),
            'isSuperAdmin' => $this->roleService->isSuperAdmin($role),
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $this->authorize('update', $role);

        $this->roleService->update($role, RoleData::fromArray($request->validated()));

        return redirect()
            ->route('admin.roles.index')
            ->with('success', __('roles.messages.updated'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        $this->authorize('delete', $role);

        try {
            $this->roleService->delete($role);
        } catch (DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('success', __('roles.messages.deleted'));
    }
}
