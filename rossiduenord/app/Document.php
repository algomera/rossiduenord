<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'folder_id',
        'role',
        'allega',
        'status',
        'description',
        'note',
        'type',
    ];
    public function folder() {
        return $this->belongsTo(FolderDocument::class);
    }
}
