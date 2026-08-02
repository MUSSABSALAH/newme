<?php

declare(strict_types=1);

namespace App\Modules\Identity\Enums;

enum RoleName: string
{
    case SuperAdmin = 'super_admin';
    case OperationsManager = 'operations_manager';
    case StoreManager = 'store_manager';
    case InventoryOfficer = 'inventory_officer';
    case OrderOfficer = 'order_officer';
    case SubscriptionOfficer = 'subscription_officer';
    case Nutritionist = 'nutritionist';
    case KitchenStaff = 'kitchen_staff';
    case DeliveryCoordinator = 'delivery_coordinator';
    case Driver = 'driver';
    case Accountant = 'accountant';
    case CustomerSupport = 'customer_support';
    case AppointmentOfficer = 'appointment_officer';
    case ContentEditor = 'content_editor';
    case ReportViewer = 'report_viewer';

    // Public store customer (not a staff role; never shown in staff pickers).
    case Customer = 'customer';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $role): string => $role->value, self::cases());
    }

    /**
     * Staff-assignable role identifiers (everything except the customer role).
     *
     * @return list<string>
     */
    public static function staffValues(): array
    {
        return array_values(array_filter(
            self::values(),
            static fn (string $role): bool => $role !== self::Customer->value,
        ));
    }
}
