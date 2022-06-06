<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeIntervention extends Model
{
    public function categoryIntervetion()
    {
        return $this->hasMany(CategoryIntervention::class);
    }
}
