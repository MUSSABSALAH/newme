<?php

declare(strict_types=1);

namespace App\Modules\Audit\Enums;

enum AuditAction: string
{
    case RoleCreated = 'role.created';
    case RoleUpdated = 'role.updated';
    case RoleDeleted = 'role.deleted';
    case UserInvited = 'user.invited';
    case UserUpdated = 'user.updated';
    case UserActivated = 'user.activated';
    case UserDeactivated = 'user.deactivated';
    case InvitationResent = 'invitation.resent';
    case InvitationAccepted = 'invitation.accepted';
    case PasswordReset = 'user.password_reset';
    case SettingsUpdated = 'settings.updated';
    case PlanCreated = 'plan.created';
    case PlanUpdated = 'plan.updated';
    case PlanArchived = 'plan.archived';
    case PlanVersionPublished = 'plan_version.published';
    case PlanPricingUpdated = 'plan_pricing.updated';
    case PlanMealsUpdated = 'plan_meals.updated';
    case MealCreated = 'meal.created';
    case MealUpdated = 'meal.updated';
    case MealArchived = 'meal.archived';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $action): string => $action->value, self::cases());
    }

    /**
     * Localized, human-readable label for this action.
     */
    public function label(): string
    {
        return (string) __('audit.actions.'.$this->value);
    }
}
