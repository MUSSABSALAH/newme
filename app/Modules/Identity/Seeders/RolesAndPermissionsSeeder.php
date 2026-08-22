<?php

declare(strict_types=1);

namespace App\Modules\Identity\Seeders;

use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

final class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (PermissionName::values() as $permission) {
            Permission::findOrCreate($permission);
        }

        foreach (RoleName::values() as $role) {
            Role::findOrCreate($role);
        }

        // Super Admin holds every permission that currently exists.
        Role::findOrCreate(RoleName::SuperAdmin->value)
            ->syncPermissions(Permission::all());

        $this->seedDefaults();
    }

    /**
     * Give each staff role a workable starting point.
     *
     * Roles an administrator has already tailored are left alone: defaults are
     * only written to roles that still hold no permissions at all, so re-running
     * the seeder never undoes a hand-made setup.
     */
    private function seedDefaults(): void
    {
        foreach ($this->defaults() as $roleName => $permissions) {
            $role = Role::findOrCreate($roleName);

            if ($role->permissions()->exists()) {
                continue;
            }

            $role->syncPermissions(array_map(
                static fn (PermissionName $permission): string => $permission->value,
                $permissions,
            ));
        }
    }

    /**
     * @return array<string, list<PermissionName>>
     */
    private function defaults(): array
    {
        return [
            RoleName::OperationsManager->value => [
                PermissionName::OrdersView,
                PermissionName::OrdersUpdate,
                PermissionName::OrdersCancel,
                PermissionName::SubscriptionsView,
                PermissionName::SubscriptionsManage,
                PermissionName::SubscriptionsPause,
                PermissionName::SubscriptionsCancel,
                PermissionName::PlansView,
                PermissionName::CatalogView,
                PermissionName::InventoryView,
                PermissionName::CustomersView,
                PermissionName::ConsultationsView,
                PermissionName::ConsultationsManage,
                PermissionName::DeliveryView,
                PermissionName::DeliveryUpdate,
                PermissionName::DeliveryAssign,
                PermissionName::ReportsView,
            ],
            RoleName::StoreManager->value => [
                PermissionName::CatalogView,
                PermissionName::CatalogCreate,
                PermissionName::CatalogUpdate,
                PermissionName::CatalogDelete,
                PermissionName::CouponsView,
                PermissionName::CouponsCreate,
                PermissionName::CouponsUpdate,
                PermissionName::CouponsDelete,
                PermissionName::InventoryView,
                PermissionName::InventoryAdjust,
                PermissionName::OrdersView,
                PermissionName::OrdersUpdate,
                PermissionName::OrdersCancel,
                PermissionName::CustomersView,
                PermissionName::ReportsView,
            ],
            RoleName::InventoryOfficer->value => [
                PermissionName::CatalogView,
                PermissionName::InventoryView,
                PermissionName::InventoryAdjust,
            ],
            RoleName::OrderOfficer->value => [
                PermissionName::OrdersView,
                PermissionName::OrdersCreate,
                PermissionName::OrdersUpdate,
                PermissionName::OrdersCancel,
                PermissionName::CustomersView,
                PermissionName::DeliveryView,
            ],
            RoleName::SubscriptionOfficer->value => [
                PermissionName::SubscriptionsView,
                PermissionName::SubscriptionsManage,
                PermissionName::SubscriptionsPause,
                PermissionName::SubscriptionsCancel,
                PermissionName::PlansView,
                PermissionName::CustomersView,
            ],
            RoleName::Nutritionist->value => [
                PermissionName::PlansView,
                PermissionName::PlansManage,
                PermissionName::SubscriptionsView,
                PermissionName::ConsultationsView,
                PermissionName::ConsultationsManage,
                PermissionName::CmsView,
            ],
            RoleName::KitchenStaff->value => [
                PermissionName::PlansView,
                PermissionName::SubscriptionsView,
            ],
            RoleName::ShippingOfficer->value => [
                PermissionName::DeliveryView,
                PermissionName::DeliveryUpdate,
            ],
            RoleName::DeliveryCoordinator->value => [
                PermissionName::DeliveryView,
                PermissionName::DeliveryUpdate,
                PermissionName::DeliveryAssign,
                PermissionName::OrdersView,
                PermissionName::SubscriptionsView,
            ],
            RoleName::Driver->value => [
                PermissionName::DeliveryView,
                PermissionName::DeliveryUpdate,
            ],
            RoleName::Accountant->value => [
                PermissionName::InvoicesView,
                PermissionName::PaymentsView,
                PermissionName::PaymentsConfirm,
                PermissionName::PaymentsRefund,
                PermissionName::OrdersView,
                PermissionName::OrdersRefund,
                PermissionName::SubscriptionsView,
                PermissionName::ReportsView,
                PermissionName::ReportsExport,
            ],
            RoleName::CustomerSupport->value => [
                PermissionName::CustomersView,
                PermissionName::CustomersCreate,
                PermissionName::CustomersUpdate,
                PermissionName::OrdersView,
                PermissionName::SubscriptionsView,
                PermissionName::ConsultationsView,
            ],
            RoleName::Consultant->value => [
                PermissionName::ConsultationsView,
                PermissionName::ConsultationsManage,
                PermissionName::CustomersView,
            ],
            RoleName::ContentEditor->value => [
                PermissionName::CmsView,
                PermissionName::CmsManage,
            ],
            RoleName::ReportViewer->value => [
                PermissionName::ReportsView,
                PermissionName::ReportsExport,
                PermissionName::InvoicesView,
                PermissionName::OrdersView,
                PermissionName::SubscriptionsView,
            ],
        ];
    }
}
