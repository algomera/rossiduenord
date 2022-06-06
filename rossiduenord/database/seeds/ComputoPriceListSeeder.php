<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\Computo_priceList;
class ComputoPriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $parent = [
            [
                'computo_sub_folder_id' => 1
            ],
            [
                'computo_sub_folder_id' => 2
            ],
            [
                'computo_sub_folder_id' => 3
            ]
        ];

        for ($i = 0; $i < 3; $i++) {
            $p = new Computo_priceList;
            $p->computo_sub_folder_id = $parent[$i]['computo_sub_folder_id'];
            $p->e_p = $faker->numerify('F01-#-0#-0##');
            $p->description = $faker->sentence(4);
            $p->description_extended = $faker->sentence(8);
            $p->description_complete = $faker->sentence(15);
            $p->u_m = 'cad';
            $p->price = $faker->randomFloat(2, 1, 999);
            $p->work = $faker->randomFloat(2, 30, 50);
            $p->save();
        }

        for ($i = 0; $i < 3; $i++) {
            $p = new Computo_priceList;
            $p->computo_sub_folder_id = $parent[$i]['computo_sub_folder_id'];
            $p->e_p = $faker->numerify('F01-#-0#-0##');
            $p->description = $faker->sentence(4);
            $p->description_extended = $faker->sentence(8);
            $p->description_complete = $faker->sentence(15);
            $p->u_m = 'cad';
            $p->price = $faker->randomFloat(2, 1, 999);
            $p->save();
        }

        for ($i = 0; $i < 3; $i++) {
            $p = new Computo_priceList;
            $p->computo_sub_folder_id = $parent[$i]['computo_sub_folder_id'];
            $p->e_p = $faker->numerify('F01-#-0#-0##');
            $p->description = $faker->sentence(4);
            $p->description_extended = $faker->sentence(8);
            $p->description_complete = $faker->sentence(15);
            $p->u_m = 'cad';
            $p->price = $faker->randomFloat(2, 1, 999);
            $p->work = $faker->randomFloat(2, 30, 50);
            $p->save();
        }

        for ($i = 0; $i < 3; $i++) {
            $p = new Computo_priceList;
            $p->computo_sub_folder_id = $parent[$i]['computo_sub_folder_id'];
            $p->e_p = $faker->numerify('F01-#-0#-0##');
            $p->description = $faker->sentence(4);
            $p->description_extended = $faker->sentence(8);
            $p->description_complete = $faker->sentence(15);
            $p->u_m = 'cad';
            $p->price = $faker->randomFloat(2, 1, 999);
            $p->work = $faker->randomFloat(2, 30, 50);
            $p->save();
        }
    }
}
