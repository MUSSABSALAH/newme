<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Homepage\UpdateHomepageContentRequest;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Services\HomepageContentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class HomepageContentController extends Controller
{
    public function __construct(private readonly HomepageContentService $homepage) {}

    public function edit(): View
    {
        $this->authorize('viewAny', PageContent::class);

        return view('admin.homepage.edit', [
            'values' => $this->homepage->formValues(),
        ]);
    }

    public function update(UpdateHomepageContentRequest $request): RedirectResponse
    {
        $this->authorize('manage', PageContent::class);

        $this->homepage->update($request->contents());

        return redirect()
            ->route('admin.homepage.edit')
            ->with('success', __('homepage.messages.saved'));
    }
}
