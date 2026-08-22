<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Articles\StoreArticleRequest;
use App\Http\Requests\Web\Admin\Articles\UpdateArticleRequest;
use App\Modules\Cms\DTOs\ArticleData;
use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ArticleController extends Controller
{
    public function __construct(private readonly ArticleService $articles) {}

    public function index(): View
    {
        $this->authorize('viewAny', Article::class);

        $articles = Article::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.articles.index', [
            'articles' => $articles,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Article::class);

        return view('admin.articles.create', [
            'article' => null,
        ]);
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $this->authorize('create', Article::class);

        $this->articles->create(ArticleData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.articles.index')
            ->with('success', __('articles.messages.created'));
    }

    public function edit(Article $article): View
    {
        $this->authorize('update', $article);

        return view('admin.articles.edit', [
            'article' => $article,
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $this->authorize('update', $article);

        $this->articles->update($article, ArticleData::fromArray($this->withImage($request)));

        return redirect()
            ->route('admin.articles.index')
            ->with('success', __('articles.messages.updated'));
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->authorize('delete', $article);

        $this->articles->delete($article);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', __('articles.messages.archived'));
    }

    /**
     * @return array<string, mixed>
     */
    private function withImage(StoreArticleRequest|UpdateArticleRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('cms/articles', 'public');
        }

        return $data;
    }
}
