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
        $name = [
            [
                'name' => 'Mps'
            ],
            [
                'name' => 'Unicredit'
            ],
            [
                'name' => 'San Paolo'
            ],
            [
                'name' => 'Poste'
            ],
            [
                'name' => 'Widiba'
            ],
        ];

        for ($i = 0; $i < 1; $i++) {
            $d = new User;
            $d->created_by = 'financial';
            $d->name = $name[$i]['name'];
            $d->referent = $faker->name();
            $d->email = 'impresa@example.test';
            $d->password = bcrypt('password');
            $d->role = 'business';
            $d->save();
        }
    }
}
