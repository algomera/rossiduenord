<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\User;
use App\Bank;
use App\Business;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Utente Impresa
        $business = User::create([
            'created_by' => 'financial',
            'name' => "Impresa Example",
            'referent' => $faker->name(),
            'email' => 'info@primehub.it',
            'password' => bcrypt('mtmopx9m'),
            'role' => 'business',
        ]);
        Business::create([
            'created_by' => 'financial',
            'user_id' => $business->id,
            'name' => "Impresa Example",
            'email' => 'info@primehub.it',
            'password' => bcrypt('mtmopx9m'),
        ]);

        // Utente Banca
        $bank = User::create([
            'created_by' => 'financial',
            'name' => "Banca Prova",
            'referent' => $faker->name(),
            'email' => 'bancaprova@mail.com',
            'password' => bcrypt('password'),
            'role' => 'bank',
        ]);
        Bank::create([
            'created_by' => 'financial',
            'user_id' => $bank->id,
            'name' => "Banca Prova",
            'email' => 'bancaprova@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
