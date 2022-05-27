<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryIntervention extends Model
{
    public function TypeIntervention()
    {
        return $this->belongsTo(TypeIntervention::class, 'typeIntervention_id');
    }
}
