<?php

use App\User;
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
        // Create impresa user
        User::create([
            'created_by' => 'Admin',
            'name' => 'Impresa',
            'email' => 'impresa@example.test',
            'password' => bcrypt('password'),
            'role' => 'business'
        ]);
        // $this->call(UsersTableSeeder::class);
        //$this->call(UserSeeder::class);
        //$this->call(FolderSeeder::class);
    }
}
