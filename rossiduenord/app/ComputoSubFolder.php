<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputoSubFolder extends Model
{
    public function folder(){
        return $this->belongsTo(Computo_folder::class);
    }

    public function priceList(){
        return $this->hasMany(Computo_priceList::class);
    }

}
