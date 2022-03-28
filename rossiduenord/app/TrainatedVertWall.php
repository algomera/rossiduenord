<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainatedVertWall extends Model
{
    protected $guarded = [];

    protected $table = 'trainatedvertwalls';

    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
