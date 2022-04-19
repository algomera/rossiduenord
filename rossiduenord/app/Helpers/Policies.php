<?php 

namespace App\Helpers;

use App\Policy;

class Policies{
    //create practice default contract
    public static function createInitialPolicies($id){
        $data = [
            [
                'practice_id' => $id, 
                 'name' => 'polizza.pdf',
                 'path'=> 'default/polizza.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'polizza.pdf',
                 'path'=> 'default/polizza.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'polizza.pdf',
                 'path'=> 'default/polizza.pdf'
            ]
        ];

        foreach ($data as $d) {
            Policy::create($d);
        };
    }
}

?>