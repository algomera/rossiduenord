<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_folders extends Model
{
    protected $guarded = [];

    public function folder() {
        return $this->belongsTo(FolderDocument::class);
    }

}
