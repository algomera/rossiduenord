<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'practice_id',
        'name',
        'video',
        'description',
        'reference',
        'inspection_date',
    ];

    public function practice(){
        return $this->belongsTo(Practice::class);
    }
}
