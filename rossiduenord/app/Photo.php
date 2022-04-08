<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
