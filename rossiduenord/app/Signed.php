<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signed extends Model
{
    protected $fillable = [
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
