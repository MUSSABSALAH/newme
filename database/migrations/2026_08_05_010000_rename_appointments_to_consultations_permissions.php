<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    public function up(): void
    {
        $this->renamePermission('appointments.view', 'consultations.view');
        $this->renamePermission('appointments.manage', 'consultations.manage');
        $this->renameRole('appointment_officer', 'consultant');

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function down(): void
    {
        $this->renamePermission('consultations.view', 'appointments.view');
        $this->renamePermission('consultations.manage', 'appointments.manage');
        $this->renameRole('consultant', 'appointment_officer');

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    private function renamePermission(string $from, string $to): void
    {
        if (! DB::table('permissions')->where('name', $from)->exists()) {
            return;
        }

        if (DB::table('permissions')->where('name', $to)->exists()) {
            DB::table('permissions')->where('name', $from)->delete();

            return;
        }

        DB::table('permissions')->where('name', $from)->update(['name' => $to]);
    }

    private function renameRole(string $from, string $to): void
    {
        if (! DB::table('roles')->where('name', $from)->exists()) {
            return;
        }

        if (DB::table('roles')->where('name', $to)->exists()) {
            DB::table('roles')->where('name', $from)->delete();

            return;
        }

        DB::table('roles')->where('name', $from)->update(['name' => $to]);
    }
};
