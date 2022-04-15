<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'practice_id',
        'sub_folder_id',
        'allega',
        'note',
        'type',
    ];
    public function sub_folder() {
        return $this->belongsTo(Sub_folder::class);
    }
}
