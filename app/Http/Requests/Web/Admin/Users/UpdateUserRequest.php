<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Users;

use App\Models\User;
use App\Modules\Identity\Enums\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        $userId = $user instanceof User ? $user->getKey() : null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'status' => ['required', Rule::in([UserStatus::Active->value, UserStatus::Inactive->value])],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => [Rule::exists('roles', 'name')],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'roles.required' => (string) __('users.errors.roles_required'),
            'roles.min' => (string) __('users.errors.roles_required'),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => (string) __('users.fields.name'),
            'email' => (string) __('users.fields.email'),
            'password' => (string) __('users.fields.password'),
            'status' => (string) __('users.fields.status'),
            'roles' => (string) __('users.fields.roles'),
        ];
    }
}
