<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Roles;

use App\Modules\Identity\Enums\PermissionName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateRoleRequest extends FormRequest
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
        return [
            'display_name' => ['required', 'array'],
            'display_name.ar' => ['required', 'string', 'max:255'],
            'display_name.en' => ['required', 'string', 'max:255'],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => [Rule::in(PermissionName::values())],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'display_name.ar' => (string) __('roles.name_ar'),
            'display_name.en' => (string) __('roles.name_en'),
        ];
    }
}
