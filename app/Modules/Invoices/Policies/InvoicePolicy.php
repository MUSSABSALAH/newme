<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Invoices\Models\Invoice;

final class InvoicePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::InvoicesView->value);
    }

    public function view(User $user, Invoice $invoice): bool
    {
        return $user->can(PermissionName::InvoicesView->value);
    }

    /**
     * A customer may only ever reach their own invoice.
     */
    public function download(User $user, Invoice $invoice): bool
    {
        return $invoice->user_id === $user->getKey()
            || $user->can(PermissionName::InvoicesView->value);
    }
}
