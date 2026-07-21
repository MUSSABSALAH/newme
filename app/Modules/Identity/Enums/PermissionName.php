<?php

declare(strict_types=1);

namespace App\Modules\Identity\Enums;

/**
 * Central permission catalog for the platform.
 *
 * Permissions are grouped by their module prefix (the part before the dot).
 * The Identity module owns the users/roles/audit permissions; the remaining
 * groups are declared up-front so administrators can configure roles for every
 * business module. Each permission is enforced by its module as it is built.
 */
enum PermissionName: string
{
    // Identity
    case UsersView = 'users.view';
    case UsersCreate = 'users.create';
    case UsersUpdate = 'users.update';
    case UsersDeactivate = 'users.deactivate';
    case UsersInvite = 'users.invite';
    case RolesView = 'roles.view';
    case RolesManage = 'roles.manage';
    case AuditView = 'audit.view';

    // Catalog
    case CatalogView = 'catalog.view';
    case CatalogCreate = 'catalog.create';
    case CatalogUpdate = 'catalog.update';
    case CatalogDelete = 'catalog.delete';

    // Inventory
    case InventoryView = 'inventory.view';
    case InventoryAdjust = 'inventory.adjust';

    // Customers
    case CustomersView = 'customers.view';
    case CustomersCreate = 'customers.create';
    case CustomersUpdate = 'customers.update';

    // Orders
    case OrdersView = 'orders.view';
    case OrdersCreate = 'orders.create';
    case OrdersUpdate = 'orders.update';
    case OrdersCancel = 'orders.cancel';
    case OrdersRefund = 'orders.refund';

    // Payments
    case PaymentsView = 'payments.view';
    case PaymentsRefund = 'payments.refund';

    // Plans
    case PlansView = 'plans.view';
    case PlansManage = 'plans.manage';

    // Subscriptions
    case SubscriptionsView = 'subscriptions.view';
    case SubscriptionsManage = 'subscriptions.manage';
    case SubscriptionsPause = 'subscriptions.pause';
    case SubscriptionsCancel = 'subscriptions.cancel';

    // Appointments
    case AppointmentsView = 'appointments.view';
    case AppointmentsManage = 'appointments.manage';

    // Delivery
    case DeliveryView = 'delivery.view';
    case DeliveryAssign = 'delivery.assign';

    // CMS
    case CmsView = 'cms.view';
    case CmsManage = 'cms.manage';

    // Notifications
    case NotificationsSend = 'notifications.send';
    case NotificationsManage = 'notifications.manage';

    // Reports
    case ReportsView = 'reports.view';
    case ReportsExport = 'reports.export';

    // Settings
    case SettingsManage = 'settings.manage';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $permission): string => $permission->value, self::cases());
    }

    /**
     * Permissions grouped by their module prefix (the part before the dot).
     *
     * @return array<string, list<string>>
     */
    public static function grouped(): array
    {
        $groups = [];

        foreach (self::cases() as $permission) {
            $group = explode('.', $permission->value, 2)[0];
            $groups[$group][] = $permission->value;
        }

        return $groups;
    }
}
