<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =[];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
