<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder_Document extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
