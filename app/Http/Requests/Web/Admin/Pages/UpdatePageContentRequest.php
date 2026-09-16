<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Pages;

use App\Modules\Cms\Support\PageContentRegistry;
use Illuminate\Foundation\Http\FormRequest;

final class UpdatePageContentRequest extends FormRequest
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
        $page = (string) $this->route('page');
        $rules = [];

        foreach (PageContentRegistry::fields($page) as $field) {
            $key = $field['key'];
            $max = (int) ($field['max'] ?? 800);

            if ($field['type'] === 'image') {
                $rules[$key] = ['nullable', 'image', 'max:4096'];

                continue;
            }

            $rules[$key] = ['required', 'array'];
            $rules[$key.'.ar'] = ['required', 'string', 'max:'.$max];
            $rules[$key.'.en'] = ['required', 'string', 'max:'.$max];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $page = (string) $this->route('page');
        $attributes = [];

        foreach (PageContentRegistry::fields($page) as $field) {
            $label = (string) __('cms.fields.'.$field['key']);
            if ($label === 'cms.fields.'.$field['key']) {
                $label = $field['key'];
            }
            $attributes[$field['key']] = $label;
            $attributes[$field['key'].'.ar'] = $label.' ('.__('cms.locale_ar').')';
            $attributes[$field['key'].'.en'] = $label.' ('.__('cms.locale_en').')';
        }

        return $attributes;
    }

    /**
     * @return array<string, mixed>
     */
    public function contents(): array
    {
        $page = (string) $this->route('page');
        $validated = $this->validated();
        $contents = [];

        foreach (PageContentRegistry::fields($page) as $field) {
            if ($field['type'] === 'image') {
                continue;
            }
            $contents[$field['key']] = $validated[$field['key']] ?? [];
        }

        return $contents;
    }
}
