<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'practice_id',
        'name',
        'image',
        'description',
        'reference',
        'position'
    ]; 
    
    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
