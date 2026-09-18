<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

final class BulkDestroyUsersRequest extends FormRequest
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
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct', 'exists:users,id'],
        ];
    }

    /**
     * @return list<int>
     */
    public function userIds(): array
    {
        /** @var list<int> $ids */
        $ids = array_values(array_unique(array_map(
            static fn (mixed $id): int => (int) $id,
            $this->validated('ids'),
        )));

        return $ids;
    }
}
