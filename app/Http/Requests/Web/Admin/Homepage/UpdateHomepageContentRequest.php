<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Homepage;

use App\Modules\Cms\Support\HomepageContentRegistry;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateHomepageContentRequest extends FormRequest
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
        $rules = [];

        foreach (HomepageContentRegistry::keys() as $key) {
            $rules[$key] = ['required', 'array'];
            $rules[$key.'.ar'] = ['required', 'string', 'max:800'];
            $rules[$key.'.en'] = ['required', 'string', 'max:800'];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $attributes = [];

        foreach (HomepageContentRegistry::keys() as $key) {
            $attributes[$key.'.ar'] = (string) __('homepage.fields.'.$key.'_ar');
            $attributes[$key.'.en'] = (string) __('homepage.fields.'.$key.'_en');
        }

        return $attributes;
    }

    /**
     * @return array<string, mixed>
     */
    public function contents(): array
    {
        return $this->validated();
    }
}
