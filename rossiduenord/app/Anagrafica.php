<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anagrafica extends Model
{
    protected $guarded = [];
    protected $table = 'anagrafiche';

	public function scopeWithParents($query, $ids) {
		return $query->whereIn('user_id', $ids)->orWhere('user_id', auth()->id());
	}

    public function roles() {
        return $this->belongsToMany(SubjectRole::class, 'anagrafiche_roles');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
