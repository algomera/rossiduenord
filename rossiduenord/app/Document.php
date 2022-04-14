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
    public function sub_folders() {
        return $this->belongsTo(Sub_folders::class);
    }
}
