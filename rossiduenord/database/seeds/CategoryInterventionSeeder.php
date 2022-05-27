<?php

use Illuminate\Database\Seeder;
use App\CategoryIntervention;
class CategoryInterventionSeeder extends Seeder
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
                'name' => 'Isolamento Termico',
                'type_id' => 1,
            ],
            [
                'name' => 'Sostituzione degli Impianti',
                'type_id' => 1,

            ],
            [
                'name' => 'Interventi di miglioramento Sismico',
                'type_id' => 1,
            ],
            [
                'name' => 'Isolamento Termico',
                'type_id' => 2,
            ],
            [
                'name' => 'Sostituzione degli infissi',
                'type_id' => 2,
            ],
            [
                'name' => 'Schermature solari e chiusure oscuranti',
                'type_id' => 2,
            ],
            [
                'name' => 'Sostituzione degli Impianti',
                'type_id' => 2,
            ],
            [
                'name' => 'Sistemi di microgenerazione',
                'type_id' => 2,
            ],
            [
                'name' => 'Generatori a biomassa',
                'type_id' => 2,
            ],
            [
                'name' => 'Building Automation',
                'type_id' => 2,
            ],
            [
                'name' => 'Collettori Solari',
                'type_id' => 2,
            ],
            [
                'name' => 'Fotovoltaio',
                'type_id' => 2,
            ],
            [
                'name' => 'Sistema di Accumulo',
                'type_id' => 2,
            ],
            [
                'name' => 'Infrastrutture di ricarica',
                'type_id' => 2,
            ],
            [
                'name' => 'Eliminazione barriere architettoniche',
                'type_id' => 2,
            ],

        ];

        for ($i = 0; $i < 15; $i++) {
            $d = new CategoryIntervention;
            $d->typeIntervention_id = $name[$i]['type_id'];
            $d->name = $name[$i]['name'];
            $d->save();
        }

    }
}
