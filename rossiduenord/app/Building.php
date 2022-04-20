<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //fillable items
    protected $guarded = [];

    //todo     relations
    public function practice(){
        return $this->belongsTo(Practice::class);
    }
}
