<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolderDocument extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class, 'practice_id');
    }
}
