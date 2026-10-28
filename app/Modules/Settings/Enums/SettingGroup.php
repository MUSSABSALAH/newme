<?php

declare(strict_types=1);

namespace App\Modules\Settings\Enums;

enum SettingGroup: string
{
    case Company = 'company';
    case Social = 'social';
    case Localization = 'localization';
    case Authentication = 'authentication';
    case Finance = 'finance';
    case Shipping = 'shipping';
    case Delivery = 'delivery';
    case DeliveryWalim = 'delivery_walim';
    case Walim = 'walim';
    case Operations = 'operations';
    case Notifications = 'notifications';
    case Policies = 'policies';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $group): string => $group->value, self::cases());
    }

    /**
     * Staff email alerts are run from their own super-admin page, so the
     * general settings form neither shows nor validates them.
     */
    public function onSettingsPage(): bool
    {
        return $this !== self::Notifications;
    }

    public function label(): string
    {
        return (string) __('settings.groups.'.$this->value);
    }
}
