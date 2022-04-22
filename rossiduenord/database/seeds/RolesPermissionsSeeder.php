<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $financial = Role::create(['name' => 'financial']);
        $bank = Role::create(['name' => 'bank']);
        $business = Role::create(['name' => 'business']);
        $collaborator = Role::create(['name' => 'collaborator']);
        $consultant = Role::create(['name' => 'consultant']);
        $technical_asseverator = Role::create(['name' => 'technical_asseverator']);
        $fiscal_asseverator = Role::create(['name' => 'fiscal_asseverator']);
        $manager = Role::create(['name' => 'manager']);
//        $provider = Role::create(['name' => 'provider']);
//        $lv1_agent = Role::create(['name' => 'lv1_agent']);
//        $lv2_agent = Role::create(['name' => 'lv2_agent']);
//        $condomimium = Role::create(['name' => 'condomimium']);
    }
}
