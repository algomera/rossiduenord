<?php

use App\Computo_priceList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(SubjectRoleSeeder::class);
        $this->call(ComputoFolderSeeder::class);
        $this->call(ComputoSubFolderSeeder::class);
        $this->call(ComputoPriceListSeeder::class);
        $this->call(TypeInterventionSeeder::class);
        $this->call(CategoryInterventionSeeder::class);
    }
}
