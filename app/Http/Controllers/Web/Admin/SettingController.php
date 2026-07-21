<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Settings\UpdateSettingsRequest;
use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class SettingController extends Controller
{
    public function __construct(private readonly SettingsService $settings) {}

    public function edit(): View
    {
        $this->authorize('manage', Setting::class);

        return view('admin.settings.edit', [
            'groups' => SettingsRegistry::grouped(),
            'values' => $this->settings->all(),
        ]);
    }

    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        $this->authorize('manage', Setting::class);

        $this->settings->update($request->settings());

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', __('settings.messages.saved'));
    }
}
