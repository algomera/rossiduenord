<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condomini extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }

    public function condensing_boilers() {
        return $this->hasMany(CondensingBoiler::class, 'condomino_id', 'id');
    }

    public function heat_pumps() {
        return $this->hasMany(HeatPump::class, 'condomino_id', 'id');
    }
}
