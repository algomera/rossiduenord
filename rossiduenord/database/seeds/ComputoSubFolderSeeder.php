<?php

use Illuminate\Database\Seeder;
use App\ComputoSubFolder;
class ComputoSubFolderSeeder extends Seeder
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
                'name' => 'Manodopera'
            ],
            [
                'name' => 'Materiali'
            ],
            [
                'name' => 'Opere Compiute'
            ]
        ];

        $parent = [
            [
                'computo_folder_id' => 1
            ],
            [
                'computo_folder_id' => 2
            ],
            [
                'computo_folder_id' => 3
            ]
        ];

        for ($i = 0; $i < 3; $i++) {
            $c = new ComputoSubFolder;
            $c->name = $name[$i]['name'];
            $c->computo_folder_id = $parent[$i]['computo_folder_id'];
            $c->save();
        }

    }
}
