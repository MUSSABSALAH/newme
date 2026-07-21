<?php

declare(strict_types=1);

namespace App\Modules\Settings\Support;

use App\Modules\Settings\Enums\SettingGroup;
use App\Modules\Settings\Enums\SettingType;

/**
 * Central catalog of every platform setting (BRD §9.20).
 *
 * Adding a setting here is all that is required: validation, casting, defaults,
 * and the admin UI are all driven from these definitions.
 */
final class SettingsRegistry
{
    /**
     * @var array<string, SettingDefinition>|null
     */
    private static ?array $cache = null;

    /**
     * @return array<string, SettingDefinition>
     */
    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        $definitions = [];

        foreach (self::definitions() as $definition) {
            $definitions[$definition->key] = $definition;
        }

        return self::$cache = $definitions;
    }

    public static function find(string $key): ?SettingDefinition
    {
        return self::all()[$key] ?? null;
    }

    /**
     * Definitions grouped by their {@see SettingGroup}, preserving order.
     *
     * @return array<string, list<SettingDefinition>>
     */
    public static function grouped(): array
    {
        $groups = [];

        foreach (SettingGroup::cases() as $group) {
            $groups[$group->value] = [];
        }

        foreach (self::all() as $definition) {
            $groups[$definition->group->value][] = $definition;
        }

        return $groups;
    }

    /**
     * @return list<SettingDefinition>
     */
    private static function definitions(): array
    {
        return [
            // Company
            new SettingDefinition('company.name_ar', SettingGroup::Company, SettingType::String, 'نيو مي', ['nullable', 'string', 'max:255']),
            new SettingDefinition('company.name_en', SettingGroup::Company, SettingType::String, 'New Me', ['nullable', 'string', 'max:255']),
            new SettingDefinition('company.tax_number', SettingGroup::Company, SettingType::String, null, ['nullable', 'string', 'max:50']),
            new SettingDefinition('company.email', SettingGroup::Company, SettingType::String, null, ['nullable', 'email', 'max:255']),
            new SettingDefinition('company.phone', SettingGroup::Company, SettingType::String, null, ['nullable', 'string', 'max:50']),
            new SettingDefinition('company.address_ar', SettingGroup::Company, SettingType::Text, null, ['nullable', 'string', 'max:1000']),
            new SettingDefinition('company.address_en', SettingGroup::Company, SettingType::Text, null, ['nullable', 'string', 'max:1000']),

            // Localization
            new SettingDefinition('localization.default_locale', SettingGroup::Localization, SettingType::Select, 'ar', ['required', 'in:ar,en'], ['ar', 'en']),
            new SettingDefinition('localization.timezone', SettingGroup::Localization, SettingType::Select, 'Asia/Riyadh', ['required', 'timezone'], ['Asia/Riyadh', 'Asia/Dubai', 'UTC']),

            // Finance
            new SettingDefinition('finance.currency', SettingGroup::Finance, SettingType::Select, 'SAR', ['required', 'in:SAR'], ['SAR']),
            new SettingDefinition('finance.tax_rate', SettingGroup::Finance, SettingType::Decimal, '15.00', ['required', 'numeric', 'min:0', 'max:100']),
            new SettingDefinition('finance.prices_include_tax', SettingGroup::Finance, SettingType::Boolean, false, ['boolean']),

            // Operations
            new SettingDefinition('operations.stock_reservation_minutes', SettingGroup::Operations, SettingType::Integer, 30, ['required', 'integer', 'min:1', 'max:1440']),
            new SettingDefinition('operations.payment_timeout_minutes', SettingGroup::Operations, SettingType::Integer, 30, ['required', 'integer', 'min:1', 'max:1440']),
            new SettingDefinition('operations.subscription_cutoff_hours', SettingGroup::Operations, SettingType::Integer, 24, ['required', 'integer', 'min:0', 'max:168']),

            // Policies
            new SettingDefinition('policies.cancellation_ar', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.cancellation_en', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.refund_ar', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.refund_en', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
        ];
    }
}
