<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signed extends Model
{
    protected $fillbale = [
        'contract_id',
        'name',
        'typology',
        'path'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
