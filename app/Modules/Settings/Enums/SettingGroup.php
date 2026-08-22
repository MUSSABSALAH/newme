<?php

declare(strict_types=1);

namespace App\Modules\Settings\Enums;

enum SettingGroup: string
{
    case Company = 'company';
    case Localization = 'localization';
    case Authentication = 'authentication';
    case Finance = 'finance';
    case Operations = 'operations';
    case Policies = 'policies';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $group): string => $group->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('settings.groups.'.$this->value);
    }
}
