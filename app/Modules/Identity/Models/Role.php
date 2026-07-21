<?php

declare(strict_types=1);

namespace App\Modules\Identity\Models;

use App\Modules\Identity\Enums\RoleName;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Translatable\HasTranslations;

/**
 * @property array<string, string> $display_name
 */
class Role extends SpatieRole
{
    use HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['display_name'];

    /**
     * Human-readable, localized name for display in the UI.
     *
     * System roles (declared in the RoleName enum) are labelled from the
     * translation files; custom roles use their stored bilingual display name
     * and fall back to the machine identifier when a translation is missing.
     */
    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        if (in_array($this->name, RoleName::values(), true)) {
            $key = 'roles.names.'.$this->name;

            return Lang::has($key, $locale) ? (string) __($key, [], $locale) : $this->name;
        }

        $value = $this->getTranslation('display_name', $locale, false);

        return is_string($value) && $value !== '' ? $value : $this->name;
    }

    /**
     * System roles are managed by the platform and cannot be renamed or deleted.
     */
    public function isSystem(): bool
    {
        return in_array($this->name, RoleName::values(), true);
    }
}
