<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'practice_id',
        'name',
        'description',
        'refreence',
        'position'
    ]; 
    
    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
