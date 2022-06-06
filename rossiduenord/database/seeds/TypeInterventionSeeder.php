<?php

use Illuminate\Database\Seeder;
use App\TypeIntervention;
class TypeInterventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            [
                'name' => 'Interventi Trainanti'
            ],
            [
                'name' => 'Interventi Trainati'
            ],
        ];

        for ($i = 0; $i < 2; $i++) {
            $d = new TypeIntervention;
            $d->name = $name[$i]['name'];
            $d->save();
        }

    }
}
