<?php

use App\UserData;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Utente Admin
        $admin = User::create([
            'email' => 'admin@example.test',
            'password' => bcrypt('password'),
        ]);

        // Utenti Impresa
        $primehub = User::create([
            'email' => 'info@primehub.it',
            'password' => bcrypt('mtmopx9m'),
        ]);
        $edrasis = User::create([
            'email' => 'info@edrasis.it',
            'password' => bcrypt('mtmopx9m'),
        ]);

        // Creo UserData per admin
        UserData::create([
            'user_id' => $admin->id,
            'created_by' => null,
            'name' => "Administrator",
        ]);

        // Creo UserData per imprese
        UserData::create([
            'user_id' => $primehub->id,
            'created_by' => $admin->id,
            'name' => "Impresa Example",
            'referent' => $faker->name(),
        ]);
        UserData::create([
            'user_id' => $edrasis->id,
            'created_by' => $admin->id,
            'name' => "Edrasis Group",
            'referent' => $faker->name(),
        ]);

        // Assegno ruolo "business" all'utente "Administrator"
        $admin->assignRole(Role::findByName('admin'));

        // Assegno ruolo "business" all'utente "Primehub"
        $primehub->assignRole(Role::findByName('business'));

        // Assegno ruolo "business" all'utente "Edrasis"
        $edrasis->assignRole(Role::findByName('business'));
    }
}
