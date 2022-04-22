<?php

use App\UserData;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\User;
use App\Bank;
use App\Business;
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
        // Creo ruoli
        $business_role = Role::create(['name' => 'business']);
        $bank_role = Role::create(['name' => 'bank']);

        // Utenti Impresa
        $primehub = User::create([
            'email' => 'info@primehub.it',
            'password' => bcrypt('mtmopx9m'),
        ]);
        $edrasis = User::create([
            'email' => 'info@edrasis.it',
            'password' => bcrypt('mtmopx9m'),
        ]);

        // Creo UserData per imprese
        UserData::create([
            'user_id' => $primehub->id,
            'created_by' => 'financial',
            'name' => "Impresa Example",
            'referent' => $faker->name(),
        ]);
        UserData::create([
            'user_id' => $edrasis->id,
            'created_by' => 'financial',
            'name' => "Edrasis Group",
            'referent' => $faker->name(),
        ]);

        // Assegno ruolo "business" all'utente "Primehub"
        $primehub->assignRole($business_role);

        // Assegno ruolo "business" all'utente "Edrasis"
        $edrasis->assignRole($business_role);



        // Utente Banca
//        $bank = User::create([
//            'created_by' => 'financial',
//            'name' => "Banca Prova",
//            'referent' => $faker->name(),
//            'email' => 'bancaprova@mail.com',
//            'password' => bcrypt('password'),
//            'role' => 'bank',
//        ]);
//        Bank::create([
//            'created_by' => 'financial',
//            'user_id' => $bank->id,
//            'name' => "Banca Prova",
//            'email' => 'bancaprova@mail.com',
//            'password' => bcrypt('password'),
//        ]);
    }
}
