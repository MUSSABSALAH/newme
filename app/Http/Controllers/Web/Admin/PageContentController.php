<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Pages\UpdatePageContentRequest;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Services\PageContentService;
use App\Modules\Cms\Support\PageContentRegistry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class PageContentController extends Controller
{
    public function __construct(private readonly PageContentService $pages) {}

    public function index(): View
    {
        $this->authorize('viewAny', PageContent::class);

        return view('admin.pages.index', [
            'pages' => PageContentRegistry::pages(),
        ]);
    }

    public function edit(string $page): View
    {
        $this->authorize('viewAny', PageContent::class);
        $this->assertKnown($page);

        return view('admin.pages.edit', [
            'page' => $page,
            'meta' => PageContentRegistry::pages()[$page],
            'sections' => PageContentRegistry::groupedFields($page),
            'values' => $this->pages->formValues($page),
        ]);
    }

    public function update(UpdatePageContentRequest $request, string $page): RedirectResponse
    {
        $this->authorize('manage', PageContent::class);
        $this->assertKnown($page);

        $images = [];
        foreach (PageContentRegistry::fields($page) as $field) {
            if ($field['type'] !== 'image') {
                continue;
            }
            $file = $request->file($field['key']);
            $images[$field['key']] = $file instanceof UploadedFile ? $file : null;
        }

        $this->pages->update($page, $request->contents(), $images);

        return redirect()
            ->route('admin.pages.edit', $page)
            ->with('success', __('cms.messages.saved'));
    }

    private function assertKnown(string $page): void
    {
        if (! PageContentRegistry::isKnown($page)) {
            throw new NotFoundHttpException;
        }
    }
}
