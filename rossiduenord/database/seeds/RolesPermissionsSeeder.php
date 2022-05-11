<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        // ROLES
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

        // PERMISSIONS
        $permissions = [
            // Practice
            'create_practices',
            'edit_practices',
            'show_practices',
            'show_child_practices',
            'delete_practices',
            'access_practices',
            // Anagrafiche
            'create_anagrafiche',
            'edit_anagrafiche',
            'show_anagrafiche',
            'delete_anagrafiche',
            'access_anagrafiche',
            // Users
            'create_admin_users',
            'create_financial_users',
            'create_bank_users',
            'create_collaborator_users',
            'create_consultant_users',
            'create_technical_asseverator_users',
            'create_fiscal_asseverator_users',
            'create_manager_users',
            'access_users',
            // Files
            'create_files',
            'edit_files',
            'show_files',
            'delete_files',
            'download_files',
            'upload_files',
            'access_files',
            // Folders
            'create_folders',
            'edit_folders',
            'show_folders',
            'delete_folders',
            'access_folders',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // Business base permissions
        $business->givePermissionTo([
            'access_practices',
            'create_practices',
			'access_users',
            'create_collaborator_users',
            'create_consultant_users',
            'show_files',
            'upload_files',
            'download_files',
            'create_folders',
        ]);
    }
}
