<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computo_priceList extends Model
{
    public function SubFolder(){
        return $this->belongsTo(ComputoSubFolder::class);
    }

}
