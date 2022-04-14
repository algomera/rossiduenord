<?php 

namespace App\Helpers;

use App\Contract;

class Contracts{
    //create practice default contract
    public static function createInitialContracts($id){

        $data = [
            'practice_id' => $id, 
            'name' => 'Basecontract.pdf',
            'tipology' => 'Contratto banca'
        ];

        Contract::create($data);
    }
}

?>