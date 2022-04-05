<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Folder_Document::class);
    }
}
