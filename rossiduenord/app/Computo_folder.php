<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computo_folder extends Model
{
    public function subFolder(){
        return $this->hasMany(ComputoSubFolder::class);
    }

}
