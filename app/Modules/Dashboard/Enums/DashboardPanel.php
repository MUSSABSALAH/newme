<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\Enums;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;

/**
 * The blocks the admin home screen is made of.
 *
 * Each panel is tied to the permissions of the module it reports on, so the
 * dashboard an accountant lands on is assembled from the same rules that guard
 * the invoice pages themselves — there is no second list of roles to maintain.
 */
enum DashboardPanel: string
{
    // Deliveries lead the screen: the shipping team's whole day is on it.
    case Deliveries = 'deliveries';
    case Finance = 'finance';
    case Orders = 'orders';
    case Subscriptions = 'subscriptions';
    case Consultations = 'consultations';
    case Catalog = 'catalog';
    case Customers = 'customers';
    case Content = 'content';

    /**
     * Holding any one of these permissions is enough to see the panel.
     *
     * @return list<PermissionName>
     */
    public function permissions(): array
    {
        return match ($this) {
            self::Deliveries => [PermissionName::DeliveryView],
            // Deliberately not reports.view: that permission is broad enough
            // that roles such as the store manager hold it for their own
            // module figures, and revenue is not theirs to read.
            self::Finance => [
                PermissionName::InvoicesView,
                PermissionName::PaymentsView,
            ],
            self::Orders => [PermissionName::OrdersView],
            self::Subscriptions => [
                PermissionName::SubscriptionsView,
                PermissionName::PlansView,
            ],
            self::Consultations => [PermissionName::ConsultationsView],
            self::Catalog => [
                PermissionName::CatalogView,
                PermissionName::InventoryView,
            ],
            self::Customers => [PermissionName::CustomersView],
            self::Content => [PermissionName::CmsView],
        };
    }

    public function isVisibleTo(User $user): bool
    {
        foreach ($this->permissions() as $permission) {
            if ($user->can($permission->value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return list<self>
     */
    public static function visibleTo(User $user): array
    {
        return array_values(array_filter(
            self::cases(),
            static fn (self $panel): bool => $panel->isVisibleTo($user),
        ));
    }
}
