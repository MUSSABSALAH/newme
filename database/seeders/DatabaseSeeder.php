<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Cms\Seeders\CmsContentSeeder;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Identity\Seeders\SuperAdminSeeder;
use App\Modules\Plans\Seeders\MealSeeder;
use App\Modules\Plans\Seeders\PlanSeeder;
use App\Modules\Store\Seeders\StoreCatalogSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            SuperAdminSeeder::class,
            MealSeeder::class,
            PlanSeeder::class,
            StoreCatalogSeeder::class,
            CmsContentSeeder::class,
        ]);
    }
}
