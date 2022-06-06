<?php

use Illuminate\Database\Seeder;
use App\Computo_folder;

class ComputoFolderSeeder extends Seeder
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
                'name' => 'Prezziario 2021 - Impianti Elettrici'
            ],
            [
                'name' => 'Prezziario 2021 - Impianti Tecnlogici'
            ],
            [
                'name' => 'Prezziario 2021 - Recupero, Ristrutturazione e Manutenzione'
            ]
        ];

        for ($i = 0; $i < 3; $i++) {
            $c = new Computo_folder;
            $c->name = $name[$i]['name'];
            $c->save();
        }

    }
}
