<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Articles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->input('slug') === '') {
            $this->merge(['slug' => null]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $article = $this->route('article');

        return [
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('articles', 'slug')->ignore($article),
            ],
            'category' => ['required', 'array'],
            'category.ar' => ['required', 'string', 'max:100'],
            'category.en' => ['required', 'string', 'max:100'],
            'title' => ['required', 'array'],
            'title.ar' => ['required', 'string', 'max:255'],
            'title.en' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'array'],
            'excerpt.ar' => ['nullable', 'string', 'max:1000'],
            'excerpt.en' => ['nullable', 'string', 'max:1000'],
            'author' => ['nullable', 'array'],
            'author.ar' => ['nullable', 'string', 'max:255'],
            'author.en' => ['nullable', 'string', 'max:255'],
            'read_time' => ['nullable', 'array'],
            'read_time.ar' => ['nullable', 'string', 'max:100'],
            'read_time.en' => ['nullable', 'string', 'max:100'],
            'body_1' => ['nullable', 'array'],
            'body_1.ar' => ['nullable', 'string'],
            'body_1.en' => ['nullable', 'string'],
            'body_2' => ['nullable', 'array'],
            'body_2.ar' => ['nullable', 'string'],
            'body_2.en' => ['nullable', 'string'],
            'highlight' => ['nullable', 'array'],
            'highlight.ar' => ['nullable', 'string'],
            'highlight.en' => ['nullable', 'string'],
            'body_3' => ['nullable', 'array'],
            'body_3.ar' => ['nullable', 'string'],
            'body_3.en' => ['nullable', 'string'],
            'cta_label' => ['nullable', 'array'],
            'cta_label.ar' => ['nullable', 'string', 'max:255'],
            'cta_label.en' => ['nullable', 'string', 'max:255'],
            'cta_url' => ['nullable', 'string', 'max:500'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'slug' => (string) __('articles.fields.slug'),
            'category.ar' => (string) __('articles.fields.category_ar'),
            'category.en' => (string) __('articles.fields.category_en'),
            'title.ar' => (string) __('articles.fields.title_ar'),
            'title.en' => (string) __('articles.fields.title_en'),
            'excerpt.ar' => (string) __('articles.fields.excerpt_ar'),
            'excerpt.en' => (string) __('articles.fields.excerpt_en'),
            'sort_order' => (string) __('articles.fields.sort_order'),
        ];
    }
}
