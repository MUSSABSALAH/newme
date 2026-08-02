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
    case CategoryCreated = 'category.created';
    case CategoryUpdated = 'category.updated';
    case CategoryArchived = 'category.archived';
    case ProductCreated = 'product.created';
    case ProductUpdated = 'product.updated';
    case ProductArchived = 'product.archived';
    case CustomerRegistered = 'customer.registered';
    case CustomerUpdated = 'customer.updated';
    case OrderPlaced = 'order.placed';
    case OrderStatusUpdated = 'order.status_updated';
    case SubscriptionCreated = 'subscription.created';
    case SubscriptionHandlingUpdated = 'subscription.handling_updated';
    case CouponCreated = 'coupon.created';
    case CouponUpdated = 'coupon.updated';
    case CouponArchived = 'coupon.archived';
    case CouponRedeemed = 'coupon.redeemed';
    case PaymentCaptured = 'payment.captured';
    case PaymentPending = 'payment.pending';
    case PaymentDeclined = 'payment.declined';
    case PaymentConfirmed = 'payment.confirmed';
    case InvoiceIssued = 'invoice.issued';

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
