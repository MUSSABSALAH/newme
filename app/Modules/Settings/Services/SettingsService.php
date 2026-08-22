<?php

declare(strict_types=1);

namespace App\Modules\Settings\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Support\SettingDefinition;
use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

final class SettingsService
{
    private const CACHE_KEY = 'settings.resolved';

    private const REDACTED = '********';

    public function __construct(private readonly AuditService $audit) {}

    /**
     * All settings as typed values, merging stored rows over registry defaults.
     *
     * @return array<string, string|int|bool|array|null>
     */
    public function all(): array
    {
        $stored = $this->storedValues();

        $resolved = [];

        foreach (SettingsRegistry::all() as $key => $definition) {
            $resolved[$key] = array_key_exists($key, $stored)
                ? $definition->type->cast($stored[$key])
                : $definition->type->cast($definition->type->serialize($definition->default));
        }

        return $resolved;
    }

    public function get(string $key): string|int|bool|array|null
    {
        return $this->all()[$key] ?? null;
    }

    /**
     * Typed values for a single group, keyed by setting key.
     *
     * @return array<string, string|int|bool|array|null>
     */
    public function group(string $group): array
    {
        $all = $this->all();
        $values = [];

        foreach (SettingsRegistry::all() as $key => $definition) {
            if ($definition->group->value === $group) {
                $values[$key] = $all[$key] ?? null;
            }
        }

        return $values;
    }

    /**
     * Persist a batch of settings.
     *
     * Only keys present in the registry are accepted; each value is serialized,
     * optionally encrypted, and the change set is recorded in the audit trail
     * (encrypted values are redacted from the audit payload).
     *
     * @param  array<string, mixed>  $input
     */
    public function update(array $input): void
    {
        $before = $this->all();
        $changed = [];

        DB::transaction(function () use ($input, &$changed): void {
            foreach ($input as $key => $value) {
                $definition = SettingsRegistry::find($key);

                if (! $definition instanceof SettingDefinition) {
                    continue;
                }

                $serialized = $definition->type->serialize($value);
                $stored = $definition->encrypted && $serialized !== null
                    ? Crypt::encryptString($serialized)
                    : $serialized;

                Setting::query()->updateOrCreate(
                    ['key' => $key],
                    ['value' => $stored, 'is_encrypted' => $definition->encrypted],
                );

                $changed[$key] = $definition;
            }
        });

        Cache::forget(self::CACHE_KEY);

        $this->recordAudit($before, $changed);
    }

    /**
     * @return array<string, string|null>
     */
    private function storedValues(): array
    {
        /** @var array<string, string|null> $values */
        $values = Cache::rememberForever(self::CACHE_KEY, function (): array {
            $resolved = [];

            foreach (Setting::query()->get() as $setting) {
                $value = $setting->value;

                if ($setting->is_encrypted && $value !== null) {
                    $value = Crypt::decryptString($value);
                }

                $resolved[$setting->key] = $value;
            }

            return $resolved;
        });

        return $values;
    }

    /**
     * @param  array<string, string|int|bool|null>  $before
     * @param  array<string, SettingDefinition>  $changed
     */
    private function recordAudit(array $before, array $changed): void
    {
        if ($changed === []) {
            return;
        }

        $after = $this->all();
        $old = [];
        $new = [];

        foreach ($changed as $key => $definition) {
            $oldValue = $before[$key] ?? null;
            $newValue = $after[$key] ?? null;

            if ($oldValue === $newValue) {
                continue;
            }

            $old[$key] = $definition->encrypted ? self::REDACTED : $oldValue;
            $new[$key] = $definition->encrypted ? self::REDACTED : $newValue;
        }

        if ($new === []) {
            return;
        }

        $this->audit->log(AuditAction::SettingsUpdated, null, $old, $new);
    }
}
