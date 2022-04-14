<?php 

namespace App\Helpers;

use App\Contract;

class Contracts{
    //create practice default contract
    public static function createInitialContracts($id){
        $data = [
            [
                'practice_id' => $id, 
                 'name' => 'contratto.pdf',
                'tipology' => 'originals',
                 'path'=> 'practices/default/contratto.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'contratto.pdf',
                'tipology' => 'originals',
                 'path'=> 'practices/default/contratto.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'contratto.pdf',
                'tipology' => 'originals',
                 'path'=> 'practices/default/contratto.pdf'
            ]
        ];

        foreach ($data as $d) {
            Contract::create($d);
        }
    }
}

?>