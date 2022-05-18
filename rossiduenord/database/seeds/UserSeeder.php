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
        $novello = User::create([
            'email' => 'p.novello@integrabusiness.net',
            'password' => bcrypt('mtmopx9m'),
        ]);
        $tasrl = User::create([
            'email' => 'tasrl1202@gmail.com',
            'password' => bcrypt('mtmopx9m'),
        ]);
        $mulas = User::create([
            'email' => 'stefano.mulas@ibigroup.it',
            'password' => bcrypt('stefano001'),
        ]);

        // Creo UserData per admin
        UserData::create([
            'user_id' => $admin->id,
            'parent' => null,
            'name' => "Administrator",
        ]);

        // Creo UserData per imprese
        UserData::create([
            'user_id' => $primehub->id,
            'parent' => $admin->id,
            'name' => "Impresa Example",
            'referent' => $faker->name(),
        ]);
        UserData::create([
            'user_id' => $edrasis->id,
            'parent' => $admin->id,
            'name' => "Edrasis Group",
            'referent' => $faker->name(),
        ]);

        UserData::create([
            'user_id' => $mulas->id,
            'parent' => $admin->id,
            'name' => "Ibi Group",
            'referent' => $faker->name(),
        ]);

        // Creo UserData per Banche
        UserData::create([
            'user_id' => $novello->id,
            'parent' => $admin->id,
            'name' => "Integrabusiness",
        ]);
        UserData::create([
            'user_id' => $tasrl->id,
            'parent' => $admin->id,
            'name' => "Ta S.r.l",
        ]);

        // Assegno ruolo "business" all'utente "Administrator"
        $admin->assignRole(Role::findByName('admin'));

        // Assegno ruolo "business" all'utente "Primehub"
        $primehub->assignRole(Role::findByName('business'));

        // Assegno ruolo "business" all'utente "Edrasis"
        $edrasis->assignRole(Role::findByName('business'));

        // Assegno ruolo "business" all'utente "Mulas"
        $mulas->assignRole(Role::findByName('business'));

        // Assegno ruolo "bank" all'utente "Novello"
        $novello->assignRole(Role::findByName('bank'));

        // Assegno ruolo "bank" all'utente "Ta S.r.l"
        $tasrl->assignRole(Role::findByName('bank'));
    }
}
