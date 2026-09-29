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
            new SettingDefinition('company.address_ar', SettingGroup::Company, SettingType::Text, 'المعذر سكوير، شارع التخصصي، الرياض، المملكة العربية السعودية.', ['nullable', 'string', 'max:1000']),
            new SettingDefinition('company.address_en', SettingGroup::Company, SettingType::Text, 'Ma’ather Square, Takhassusi Street, Riyadh, Saudi Arabia', ['nullable', 'string', 'max:1000']),

            // Social — empty URL hides that icon in the site footer.
            new SettingDefinition('social.whatsapp', SettingGroup::Social, SettingType::String, 'https://wa.me/966533360317', ['nullable', 'string', 'max:500', 'url:http,https']),
            new SettingDefinition('social.instagram', SettingGroup::Social, SettingType::String, 'https://www.instagram.com/NewMeKSA', ['nullable', 'string', 'max:500', 'url:http,https']),
            new SettingDefinition('social.tiktok', SettingGroup::Social, SettingType::String, 'https://www.tiktok.com/@NewMeKSA', ['nullable', 'string', 'max:500', 'url:http,https']),
            new SettingDefinition('social.snapchat', SettingGroup::Social, SettingType::String, 'https://www.snapchat.com/add/NewMeKSA', ['nullable', 'string', 'max:500', 'url:http,https']),
            new SettingDefinition('social.x', SettingGroup::Social, SettingType::String, 'https://x.com/NewMeKSA', ['nullable', 'string', 'max:500', 'url:http,https']),
            new SettingDefinition('social.linkedin', SettingGroup::Social, SettingType::String, 'https://www.linkedin.com/company/newmeksa', ['nullable', 'string', 'max:500', 'url:http,https']),

            // Localization
            new SettingDefinition('localization.default_locale', SettingGroup::Localization, SettingType::Select, 'ar', ['required', 'in:ar,en'], ['ar', 'en']),
            new SettingDefinition('localization.timezone', SettingGroup::Localization, SettingType::Select, 'Asia/Riyadh', ['required', 'timezone'], ['Asia/Riyadh', 'Asia/Dubai', 'UTC']),

            // Authentication
            new SettingDefinition('authentication.sms_otp', SettingGroup::Authentication, SettingType::Boolean, (bool) config('auth.otp.sms'), ['boolean']),
            new SettingDefinition('authentication.email_otp', SettingGroup::Authentication, SettingType::Boolean, (bool) config('auth.otp.email'), ['boolean']),

            // Finance
            new SettingDefinition('finance.currency', SettingGroup::Finance, SettingType::Select, 'SAR', ['required', 'in:SAR'], ['SAR']),
            new SettingDefinition('finance.tax_rate', SettingGroup::Finance, SettingType::Decimal, '15.00', ['required', 'numeric', 'min:0', 'max:100']),
            new SettingDefinition('finance.prices_include_tax', SettingGroup::Finance, SettingType::Boolean, false, ['boolean']),

            // Shipping — who delivers store orders and how distance is measured.
            new SettingDefinition(
                'shipping.store_provider',
                SettingGroup::Shipping,
                SettingType::Select,
                'internal',
                ['required', 'in:internal,walim'],
                ['internal', 'walim'],
            ),
            new SettingDefinition(
                'shipping.subscription_provider',
                SettingGroup::Shipping,
                SettingType::Select,
                'internal',
                ['required', 'in:internal,walim'],
                ['internal', 'walim'],
            ),
            new SettingDefinition(
                'shipping.distance_method',
                SettingGroup::Shipping,
                SettingType::Select,
                'haversine',
                ['required', 'in:haversine,google'],
                ['haversine', 'google'],
            ),
            new SettingDefinition(
                'shipping.road_factor',
                SettingGroup::Shipping,
                SettingType::Decimal,
                '1.30',
                ['required', 'numeric', 'min:1', 'max:3'],
            ),
            new SettingDefinition(
                'shipping.google_route_preference',
                SettingGroup::Shipping,
                SettingType::Select,
                'shortest',
                ['required', 'in:shortest,fastest'],
                ['shortest', 'fastest'],
            ),
            new SettingDefinition(
                'shipping.google_traffic',
                SettingGroup::Shipping,
                SettingType::Select,
                'unaware',
                ['required', 'in:unaware,aware'],
                ['unaware', 'aware'],
            ),
            new SettingDefinition(
                'shipping.google_avoid_highways',
                SettingGroup::Shipping,
                SettingType::Boolean,
                false,
                ['boolean'],
            ),
            new SettingDefinition(
                'shipping.google_avoid_tolls',
                SettingGroup::Shipping,
                SettingType::Boolean,
                false,
                ['boolean'],
            ),
            new SettingDefinition(
                'shipping.google_maps_key',
                SettingGroup::Shipping,
                SettingType::String,
                null,
                ['nullable', 'string', 'max:255'],
                encrypted: true,
            ),
            new SettingDefinition(
                'shipping.origin_lat',
                SettingGroup::Shipping,
                SettingType::String,
                null,
                ['nullable', 'numeric', 'between:-90,90'],
            ),
            new SettingDefinition(
                'shipping.origin_lng',
                SettingGroup::Shipping,
                SettingType::String,
                null,
                ['nullable', 'numeric', 'between:-180,180'],
            ),

            // Delivery — the in-house fee set.
            new SettingDefinition(
                'delivery.fee_mode',
                SettingGroup::Delivery,
                SettingType::Select,
                'fixed',
                ['required', 'in:fixed,distance'],
                ['fixed', 'distance'],
            ),
            new SettingDefinition(
                'delivery.free_above',
                SettingGroup::Delivery,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0'],
            ),
            new SettingDefinition(
                'delivery.fixed_amount',
                SettingGroup::Delivery,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0'],
            ),
            new SettingDefinition(
                'delivery.included_km',
                SettingGroup::Delivery,
                SettingType::Decimal,
                '0',
                ['required', 'numeric', 'min:0'],
            ),
            new SettingDefinition(
                'delivery.included_price',
                SettingGroup::Delivery,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0'],
            ),
            new SettingDefinition(
                'delivery.price_per_km',
                SettingGroup::Delivery,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0'],
            ),

            // Delivery by Walim — same fields as the in-house set, own amounts.
            new SettingDefinition(
                'delivery_walim.fee_mode',
                SettingGroup::DeliveryWalim,
                SettingType::Select,
                'distance',
                ['required', 'in:fixed,distance'],
                ['fixed', 'distance'],
            ),
            new SettingDefinition(
                'delivery_walim.free_above',
                SettingGroup::DeliveryWalim,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0', 'decimal:0,2'],
            ),
            new SettingDefinition(
                'delivery_walim.fixed_amount',
                SettingGroup::DeliveryWalim,
                SettingType::Decimal,
                '0.00',
                ['required', 'numeric', 'min:0', 'decimal:0,2'],
            ),
            new SettingDefinition(
                'delivery_walim.included_km',
                SettingGroup::DeliveryWalim,
                SettingType::Decimal,
                '15',
                ['required', 'numeric', 'min:0'],
            ),
            new SettingDefinition(
                'delivery_walim.included_price',
                SettingGroup::DeliveryWalim,
                SettingType::Decimal,
                '24.00',
                ['required', 'numeric', 'min:0', 'decimal:0,2'],
            ),
            new SettingDefinition(
                'delivery_walim.price_per_km',
                SettingGroup::DeliveryWalim,
                SettingType::Decimal,
                '1.50',
                ['required', 'numeric', 'min:0', 'decimal:0,2'],
            ),

            // Walim — API access and the pickup point sent with every task.
            new SettingDefinition(
                'walim.api_key',
                SettingGroup::Walim,
                SettingType::String,
                null,
                ['nullable', 'string', 'max:255'],
                encrypted: true,
            ),
            new SettingDefinition(
                'walim.shared_secret',
                SettingGroup::Walim,
                SettingType::String,
                null,
                ['nullable', 'string', 'max:255'],
                encrypted: true,
            ),
            new SettingDefinition(
                'walim.team_id',
                SettingGroup::Walim,
                SettingType::String,
                null,
                ['nullable', 'integer', 'min:1'],
            ),
            new SettingDefinition(
                'walim.auto_assignment',
                SettingGroup::Walim,
                SettingType::Boolean,
                true,
                ['boolean'],
            ),
            new SettingDefinition(
                'walim.pickup_name',
                SettingGroup::Walim,
                SettingType::String,
                'نيو مي',
                ['nullable', 'string', 'max:255'],
            ),
            new SettingDefinition(
                'walim.pickup_phone',
                SettingGroup::Walim,
                SettingType::String,
                null,
                ['nullable', 'string', 'max:30'],
            ),
            new SettingDefinition(
                'walim.pickup_address',
                SettingGroup::Walim,
                SettingType::Text,
                null,
                ['nullable', 'string', 'max:500'],
            ),
            new SettingDefinition(
                'walim.pickup_lead_minutes',
                SettingGroup::Walim,
                SettingType::Integer,
                30,
                ['required', 'integer', 'min:0', 'max:1440'],
            ),
            new SettingDefinition(
                'walim.delivery_window_minutes',
                SettingGroup::Walim,
                SettingType::Integer,
                120,
                ['required', 'integer', 'min:15', 'max:1440'],
            ),
            new SettingDefinition(
                'walim.subscription_pickup_time',
                SettingGroup::Walim,
                SettingType::Time,
                '07:00',
                ['required', 'date_format:H:i'],
            ),

            // Operations
            new SettingDefinition('operations.stock_reservation_minutes', SettingGroup::Operations, SettingType::Integer, 30, ['required', 'integer', 'min:1', 'max:1440']),
            new SettingDefinition('operations.payment_timeout_minutes', SettingGroup::Operations, SettingType::Integer, 30, ['required', 'integer', 'min:1', 'max:1440']),
            new SettingDefinition('operations.subscription_min_start_days', SettingGroup::Operations, SettingType::Integer, 1, ['required', 'integer', 'min:0', 'max:30']),
            new SettingDefinition('operations.meal_change_lead_days', SettingGroup::Operations, SettingType::Integer, 1, ['required', 'integer', 'min:0', 'max:30']),
            new SettingDefinition('operations.subscription_pause_lead_days', SettingGroup::Operations, SettingType::Integer, 1, ['required', 'integer', 'min:0', 'max:30']),
            new SettingDefinition('operations.subscription_resume_lead_days', SettingGroup::Operations, SettingType::Integer, 1, ['required', 'integer', 'min:0', 'max:30']),
            new SettingDefinition(
                'operations.consultation_working_days',
                SettingGroup::Operations,
                SettingType::MultiSelect,
                ['sun', 'mon', 'tue', 'wed', 'thu'],
                ['required', 'array', 'min:1'],
                ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'],
            ),
            new SettingDefinition(
                'operations.consultation_hours_start',
                SettingGroup::Operations,
                SettingType::Time,
                '10:00',
                ['required', 'date_format:H:i'],
            ),
            new SettingDefinition(
                'operations.consultation_hours_end',
                SettingGroup::Operations,
                SettingType::Time,
                '20:00',
                ['required', 'date_format:H:i'],
            ),
            new SettingDefinition(
                'operations.consultation_duration_minutes',
                SettingGroup::Operations,
                SettingType::Integer,
                60,
                ['required', 'integer', 'min:5', 'max:240'],
            ),

            // Policies
            new SettingDefinition('policies.cancellation_ar', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.cancellation_en', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.refund_ar', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
            new SettingDefinition('policies.refund_en', SettingGroup::Policies, SettingType::Text, null, ['nullable', 'string', 'max:5000']),
        ];
    }
}
